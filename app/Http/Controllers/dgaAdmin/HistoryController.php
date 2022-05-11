<?php

namespace App\Http\Controllers\dgaAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\HistoryPlay;

class HistoryController extends Controller
{
    public function historyPlay($game) {
        $setting = Setting::first();
        $history = HistoryPlay::where('game', $game)->limit(500)->get();
        return view('dgaAdmin.history', compact('setting', 'history'));
    }
}
