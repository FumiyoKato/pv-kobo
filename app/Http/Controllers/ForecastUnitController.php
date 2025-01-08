<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForecastUnit;
use Illuminate\Support\Facades\Auth;

class ForecastUnitController extends Controller
{
    /**
     * 予測単位の一覧を表示
     */
    public function index()
    {
        //ログインユーザーに紐づく予測単位を取得
        $forecastUnits = ForecastUnit::where('user_id', Auth::id())->get();

        return view('forecast_units.index', compact('forecastUnits'));
    }

    /**
     * 予測単位を新規登録
     */
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'forecast_unit_name' => 'required|string|max:50',
            'pv_capacity'        => 'required|numeric|min:0',
            'pcs_capacity'       => 'required|numeric|min:0',
            'pcs_efficiency'     => 'required|integer|min:0|max:100',
            'loss_rate'          => 'required|integer|min:0|max:99',
            'direction'          => 'required|integer|min:1|max:360',
            'angle'              => 'required|integer|min:0|max:90',
            'latitude'           => 'required|numeric|between:23,47',
            'longitude'          => 'required|numeric|between:123,147',
            'end_at'             => 'nullable|date|after_or_equal:now',
        ]);

        // コンマを除去
        $pvCapacity = str_replace(',', '', $validated['pv_capacity']);
        if (!is_numeric($pvCapacity)) {
            // エラー処理：数値ではない場合
            return back()->withInput()->withErrors(['pv_capacity' => '設備容量は数値を入力してください！']);
        }
        $pcsCapacity = str_replace(',', '', $validated['pcs_capacity']);
        if (!is_numeric($pcsCapacity)) {
            // エラー処理：数値ではない場合
            return back()->withInput()->withErrors(['pcs_capacity' => 'PCS容量は数値を入力してください！']);
        }

        // 数値に変換（必要に応じて）
        $pvCapacity = (float)$pvCapacity;
        $pcsCapacity = (float)$pcsCapacity;

        //validated配列にコンマを除去した値を代入
        $validated['pv_capacity'] = $pvCapacity;
        $validated['pcs_capacity'] = $pcsCapacity;

        // 新しい予測単位を作成
        ForecastUnit::create($validated);

        return redirect()->route('forecast-units.index')->with('success', '予測設定を登録しました。');
    }
}
