<?php

namespace App\Http\Controllers\dgaAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\HistoryPlay;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home() {
        $setting = Setting::first();
        $total = array(
            'amount' => HistoryPlay::sum('amount'),
            'amountWin' => HistoryPlay::where('status', 1)->sum('amount'),
            'amountLose'=> HistoryPlay::where('status', 0)->sum('amount'),
            'amountSend' => HistoryPlay::sum('receive'),
            'turnWin' => HistoryPlay::where('status', 1)->count(),
            'turnLose' => HistoryPlay::where('status', 0)->count(),
            //CHANLE
            'amountSendCLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'CL')->sum('receive'),
            'amountCLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'CL')->sum('amount'),
            'turnLoseCLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'CL', 'status' => 0])->count(),
            'turnWinCLDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'CL', 'status' => 1])->count(),
            'amountSendCLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('game', 'CL')->sum('receive'),
            'amountCLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'CL', 'status' => 0])->sum('amount'),
            'turnLoseCLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'CL', 'status' => 0])->count(),
            'turnWinCLWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'CL', 'status' => 1])->count(),
            'amountSendCLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'CL')->sum('receive'),
            'amountCLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL', 'status' => 0])->sum('amount'),
            'turnLoseCLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL', 'status' => 0])->count(),
            'turnWinCLMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL', 'status' => 1])->count(),
            // CHANLE2
            'amountSendCL2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'CL2')->sum('receive'),
            'amountCL2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'CL2')->sum('amount'),
            'turnLoseCL2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'CL2', 'status' => 0])->count(),
            'turnWinCL2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'CL2', 'status' => 1])->count(),
            'amountSendCL2Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('game', 'CL2')->sum('receive'),
            'amountCL2Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'CL2', 'status' => 0])->sum('amount'),
            'turnLoseCL2Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'CL2', 'status' => 0])->count(),
            'turnWinCL2Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'CL2', 'status' => 1])->count(),
            'amountSendCL2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'CL2')->sum('receive'),
            'amountCL2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL2', 'status' => 0])->sum('amount'),
            'turnLoseCL2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL2', 'status' => 0])->count(),
            'turnWinCL2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'CL2', 'status' => 1])->count(),
            // TÀI XỈU
            'amountSendTXDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'TX')->sum('receive'),
            'amountTXDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'TX')->sum('amount'),
            'turnLoseTXDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'TX', 'status' => 0])->count(),
            'turnWinTXDay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'TX', 'status' => 1])->count(),
            'amountSendTXWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('game', 'TX')->sum('receive'),
            'amountTXWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'TX', 'status' => 0])->sum('amount'),
            'turnLoseTXWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'TX', 'status' => 0])->count(),
            'turnWinTXWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'TX', 'status' => 1])->count(),
            'amountSendTXMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'TX')->sum('receive'),
            'amountTXMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX', 'status' => 0])->sum('amount'),
            'turnLoseTXMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX', 'status' => 0])->count(),
            'turnWinTXMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX', 'status' => 1])->count(),
            // TÀI XỈU 2
            'amountSendTX2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'TX2')->sum('receive'),
            'amountTX2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'TX2')->sum('amount'),
            'turnLoseTX2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'TX2', 'status' => 0])->count(),
            'turnWinTX2Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'TX2', 'status' => 1])->count(),
            'amountSendTX2Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('game', 'TX2')->sum('receive'),
            'amountTX2Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'TX2', 'status' => 0])->sum('amount'),
            'turnLoseTX2Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'TX2', 'status' => 0])->count(),
            'turnWinTX2Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'TX2', 'status' => 1])->count(),
            'amountSendTX2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'TX2')->sum('receive'),
            'amountTX2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX2', 'status' => 0])->sum('amount'),
            'turnLoseTX2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX2', 'status' => 0])->count(),
            'turnWinTX2Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'TX2', 'status' => 1])->count(),
            // 1 Phần 3
            'amountSend1P3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', '1P3')->sum('receive'),
            'amount1P3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', '1P3')->sum('amount'),
            'turnLose1P3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => '1P3', 'status' => 0])->count(),
            'turnWin1P3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => '1P3', 'status' => 1])->count(),
            'amountSend1P3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('game', '1P3')->sum('receive'),
            'amount1P3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => '1P3', 'status' => 0])->sum('amount'),
            'turnLose1P3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => '1P3', 'status' => 0])->count(),
            'turnWin1P3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => '1P3', 'status' => 1])->count(),
            'amountSend1P3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', '1P3')->sum('receive'),
            'amount1P3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => '1P3', 'status' => 0])->sum('amount'),
            'turnLose1P3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => '1P3', 'status' => 0])->count(),
            'turnWin1P3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => '1P3', 'status' => 1])->count(),
            // GẤP 3
            'amountSendG3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'G3')->sum('receive'),
            'amountG3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'G3')->sum('amount'),
            'turnLoseG3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'G3', 'status' => 0])->count(),
            'turnWinG3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'G3', 'status' => 1])->count(),
            'amountSendG3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('game', 'G3')->sum('receive'),
            'amountG3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'G3', 'status' => 0])->sum('amount'),
            'turnLoseG3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'G3', 'status' => 0])->count(),
            'turnWinG3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'G3', 'status' => 1])->count(),
            'amountSendG3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'G3')->sum('receive'),
            'amountG3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'G3', 'status' => 0])->sum('amount'),
            'turnLoseG3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'G3', 'status' => 0])->count(),
            'turnWinG3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'G3', 'status' => 1])->count(),
            // H3
            'amountSendH3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'H3')->sum('receive'),
            'amountH3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'H3')->sum('amount'),
            'turnLoseH3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'H3', 'status' => 0])->count(),
            'turnWinH3Day' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'H3', 'status' => 1])->count(),
            'amountSendH3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('game', 'H3')->sum('receive'),
            'amountH3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'H3', 'status' => 0])->sum('amount'),
            'turnLoseH3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'H3', 'status' => 0])->count(),
            'turnWinH3Week' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'H3', 'status' => 1])->count(),
            'amountSendH3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'H3')->sum('receive'),
            'amountH3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'H3', 'status' => 0])->sum('amount'),
            'turnLoseH3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'H3', 'status' => 0])->count(),
            'turnWinH3Month' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'H3', 'status' => 1])->count(),
            // LO
            'amountSendLODay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'LO')->sum('receive'),
            'amountLODay' => HistoryPlay::whereDate('created_at', Carbon::today())->where('game', 'LO')->sum('amount'),
            'turnLoseLODay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'LO', 'status' => 0])->count(),
            'turnWinLODay' => HistoryPlay::whereDate('created_at', Carbon::today())->where(['game' => 'LO', 'status' => 1])->count(),
            'amountSendLOWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('game', 'LO')->sum('receive'),
            'amountLOWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'LO', 'status' => 0])->sum('amount'),
            'turnLoseLOWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'LO', 'status' => 0])->count(),
            'turnWinLOWeek' => HistoryPlay::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where(['game' => 'LO', 'status' => 1])->count(),
            'amountSendLOMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where('game', 'LO')->sum('receive'),
            'amountLOMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'LO', 'status' => 0])->sum('amount'),
            'turnLoseLOMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'LO', 'status' => 0])->count(),
            'turnWinLOMonth' => HistoryPlay::whereMonth('created_at', date('m'))->where(['game' => 'LO', 'status' => 1])->count(),
        );
        $day = array(
            '1' => Carbon::now()->toDateString(), 
            '2' => Carbon::now()->subDay(1)->toDateString(),
            '3' => Carbon::now()->subDay(2)->toDateString(),
            '4' => Carbon::now()->subDay(3)->toDateString(),
            '5' => Carbon::now()->subDay(4)->toDateString(),
            '6' => Carbon::now()->subDay(5)->toDateString(),
            '7' => Carbon::now()->subDay(6)->toDateString(),
        );
        $moneyDay = array(
            '1' => HistoryPlay::whereDate('created_at', Carbon::now()->toDateString())->sum('amount') / 1000,
            '2' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(1)->toDateString())->sum('amount') / 1000,
            '3' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(2)->toDateString())->sum('amount') / 1000,
            '4' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(3)->toDateString())->sum('amount') / 1000,
            '5' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(4)->toDateString())->sum('amount') / 1000,
            '6' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(5)->toDateString())->sum('amount') / 1000,
            '7' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(6)->toDateString())->sum('amount') / 1000,
        );
        $receiveDay = array(
            '1' => HistoryPlay::whereDate('created_at', Carbon::now()->toDateString())->sum('receive') / 1000,
            '2' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(1)->toDateString())->sum('receive') / 1000,
            '3' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(2)->toDateString())->sum('receive') / 1000,
            '4' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(3)->toDateString())->sum('receive') / 1000,
            '5' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(4)->toDateString())->sum('receive') / 1000,
            '6' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(5)->toDateString())->sum('receive') / 1000,
            '7' => HistoryPlay::whereDate('created_at', Carbon::now()->subDay(6)->toDateString())->sum('receive') / 1000,
        );
        return view('dgaAdmin.home', compact('setting', 'total', 'day', 'moneyDay', 'receiveDay'));
    }

    public function setting() {
        $setting = Setting::first();
        return view('dgaAdmin.setting', compact('setting'));
    }

    public function settingEdit(Request $request) {
        $setting = Setting::first();
        $setting->update($request->all());
        return redirect()->back();
    }
}
