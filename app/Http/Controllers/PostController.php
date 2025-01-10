<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForecastUnit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        // リクエストデータを取得
        $data = $request->all();

        // バリデーション前に pv_capacity と pcs_capacity のカンマを除去
        $data['pv_capacity'] = str_replace(',', '', $data['pv_capacity']);
        $data['pcs_capacity'] = str_replace(',', '', $data['pcs_capacity']);

        // バリデーション
        $validator = \Validator::make($data, [
            'forecast_unit_name' => 'required|string|max:50',
            'pv_capacity'        => 'required|numeric|gt:0',
            'pcs_capacity'       => 'required|numeric|gt:0',
            'pcs_efficiency'     => 'required|integer|between:0,100',
            'loss_rate'          => 'required|integer|between:0,99',
            'direction'          => 'required|integer|between:1,360',
            'angle'              => 'required|integer|between:0,90',
            'latitude'           => 'required|numeric|between:23,47',
            'longitude'          => 'required|numeric|between:123,147',
            'end_at'             => 'nullable|date|after_or_equal:now',
        ]);

        // バリデーションエラーがあれば、エラーメッセージと共にリダイレクト
        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator->errors()->toArray())
                        ->withInput();
        }

        $validatedData = $validator->validated(); // バリデーション済みデータを取得


        // ログインユーザーのIDを取得
        $userId = Auth::id();

        // ForecastUnitモデルのインスタンスを作成し、データを設定
        $forecastUnit = new ForecastUnit();
        $forecastUnit->forecast_unit_name = $validatedData['forecast_unit_name'];
        $forecastUnit->user_id = $userId;
        $forecastUnit->pv_capacity = $data['pv_capacity']; // カンマ除去後の$dataから取得
        $forecastUnit->pcs_capacity = $data['pcs_capacity']; // カンマ除去後の$dataから取得
        $forecastUnit->pcs_efficiency = $validatedData['pcs_efficiency'];
        $forecastUnit->loss_rate = $validatedData['loss_rate'];
        $forecastUnit->direction = $validatedData['direction'];
        $forecastUnit->angle = $validatedData['angle'];
        $forecastUnit->latitude = $validatedData['latitude'];
        $forecastUnit->longitude = $validatedData['longitude'];

        // データをデータベースに保存
        $forecastUnit->save();

        // 保存後のリダイレクト先
        return redirect()->route('dashboard')->with('status', '予測設定を登録しました');
    }
}