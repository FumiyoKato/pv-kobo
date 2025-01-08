<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ForecastUnit extends Model
{
    use HasFactory;

    protected $table = 'forecast_units';

    protected $fillable = [
        'forecast_unit_name',
        'pv_capacity',
        'pcs_capacity',
        'pcs_efficiency',
        'loss_rate',
        'direction',
        'angle',
        'latitude',
        'longitude',
        'end_at',
    ];

    // ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * モデルイベントによる自動処理
     */
    protected static function booted()
    {
        static::creating(function ($forecastUnit) {
            // ログイン中のユーザーIDを自動設定
            $forecastUnit->user_id = Auth::id();
            // 保存日時を start_at に自動設定
            $forecastUnit->start_at = now();
            // 現在日時の3年後を end_at に自動設定（未指定の場合のみ）
            if (empty($forecastUnit->end_at)) {
                $forecastUnit->end_at = Carbon::now()->addYears(3);
            }
        });
    }    
}