<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'keywords',
        'logo',
        'description',
        'favicon',
        'background',
        'active',
        'history',
        'only_win',
        'limit',
        'day_mission',
        'week_top',
        'note',
        'ads',
        'gift_day',
        'gift_week',
        'hu',
        'content',
        'content_day',
        'content_week',
        'ratioCL',
        'ratioCL2',
        'ratioTX',
        'ratioTX2',
        'ratio1P3',
        'ratioG3',
        'ratioH3',
        'ratioLO',
        'color',
        'level_day'
    ];
}
