<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Http\Resources\MomoResource;
use App\Http\Resources\HistoryResource;
use App\Models\Momo;
use App\Models\Setting;
use App\Models\HistoryPlay;
use App\Models\HistoryDayMission;
use Carbon\Carbon;

class DUNGA extends Controller
{
    public function settings()
    {

        $setting = Setting::first();

        return response()->json(array(
            'status'    => true,
            'message'   => 'Thành công',
            'contacts'  => ContactResource::collection(Contact::where('status', 1)->get()),
            'note'      => $setting->note,
            'ads'       => $setting->ads,
            'active'    => $setting->active,
            'history'   => $setting->history,
            'only_win'  => $setting->only_win,
            'limit'     => $setting->limit,
            'week_top'  => $setting->week_top,
            'day_mission' => $setting->day_mission,
            'hu' => array(
                'active' => $setting->hu,
                'roles' => array(
                    '111'
                ),
                'amount' => 10000
            ),
        ));
    }

    public function momo()
    {
        $setting = Setting::first();
        $momo = Momo::where('status', '!=', 3)->get();
        return response()->json(array(
            'status'    => true,
            'message'   => 'Thành công',
            'data_momo' => MomoResource::collection(Momo::where('status', 1)->get()),
            'game'      => array(
                'active' => array('chanle2', 'chanle', 'taixiu2', 'taixiu', 'x3', 'hieu2so', 'lo', 'gap3'),
                'html'   => view('game', compact('momo', 'setting'))->render()
            )
        ));
    }

    public function minigame(Request $request)
    {
        $setting = Setting::first();
        if ($request->game == 'day_mission') {
            $total = HistoryDayMission::sum('receive');
            $dayLevel = explode('|', $setting->level_day);
            $receiveLevel = explode('|', $setting->gift_day);
            $gift = array();
            for ($i = 0; $i < count($receiveLevel); $i++) {
                $json = array(
                    'level' => $dayLevel[$i],
                    'gift' => $receiveLevel[$i]
                );
                array_push($gift, $json);
            }
            $day_mission = array(
                'data' => $gift
            );
            $game = view('dayMission', compact('day_mission', 'setting', 'total'))->render();
        }
        return response()->json(array(
            'status'  => true,
            'message' => 'Thành công',
            'html'    => $game,
            'game'    => $request->game
        ));
    }

    public function history()
    {
        $setting = Setting::first();
        return response()->json(array(
            'status'    => true,
            'message'   => 'Thành công',
            'history'      => array(
                'status'    => true,
                'message'   => 'SUCCESS',
                'data'      => HistoryResource::collection(HistoryPlay::limit($setting->limit)->get()),
            )
        ));
    }

    public function hu()
    {
        return response()->json(array(
            'status'    => true,
            'message'   => 'Thành công',
            'amount'   => 11111
        ));
    }

    public function checkDayMission(Request $request)
    {
        $setting = Setting::first();
        $phone = HistoryPlay::whereDate('created_at', Carbon::today())->where('partnerId', $request->phone)->count();
        $amount = HistoryPlay::whereDate('created_at', Carbon::today())->where('partnerId', $request->phone)->sum('amount');
        $turn = HistoryDayMission::whereDate('created_at', Carbon::today())->where('phone', $request->phone)->count();
        if ($phone <= 0) {
            return response()->json(array('status' => false, 'message' => 'Oh !! Số điện thoại này chưa chơi game nào, hãy kiểm tra lại'));
        } else {
            $dayLevel = explode('|', $setting->level_day);
            $receiveLevel = explode('|', $setting->gift_day);
            for ($i = 0; $i < count($receiveLevel); $i++) {
                if ($turn < count($receiveLevel) && $amount >= $dayLevel[$i] && $amount >= $dayLevel[$turn]) {
                    HistoryDayMission::create([
                        'phone'    => $request->phone,
                        'amount'   => $amount,
                        'level'    => $dayLevel[$i],
                        'receive'  => $receiveLevel[$i],
                        'status'   => 1,
                        'pay'      => 0
                    ]);
                } else if ($amount < (int)$dayLevel[$i]) {
                    return response()->json(array('status' => false, 'message' => 'Bạn cần chơi '.number_format($dayLevel[$i] - $amount).' nữa !'));
                } 
            }
            return response()->json(array('status' => true, 'html' => 'Thành công vui lòng đợi xử lý'));
        }
    }

    
}
