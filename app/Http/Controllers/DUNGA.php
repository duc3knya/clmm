<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Http\Resources\MomoResource;
use App\Models\Momo;

class DUNGA extends Controller
{
    public function settings() {
        return response()->json(array(
            'status'    => true,
            'message'   => 'Thành công',
            'contacts'  => ContactResource::collection(Contact::where('status', 1)->get()),
            'note'      => '<p style="margin-right: 0px; margin-bottom: 3px; margin-left: 0px; background-color: rgb(247, 247, 247);"><span style="font-weight: 600; background-color: rgb(255, 255, 255);"><span style="font-size: 15px;"><font color="#ff0000">HỆ THỐNG CHẲN LẺ TÀI XỈU UY TÍN AUTO THANH TOÁN TỰ ĐỘNG</font></span></span></p><p style="margin-right: 0px; margin-bottom: 3px; margin-left: 0px; background-color: rgb(247, 247, 247);"><span style="font-weight: 600; background-color: rgb(255, 255, 255);"><span style="font-size: 15px;"><font color="#ff0000"><br></font></span></span></p><p style="margin-right: 0px; margin-bottom: 3px; margin-left: 0px; background-color: rgb(247, 247, 247);"><span style="font-weight: 600; background-color: rgb(255, 255, 255);"><span style="font-size: 15px;"><font color="#ff0000"><br></font></span></span></p><h5 style="font-family: Tahoma; line-height: 1.1; color: rgb(51, 51, 51); margin-bottom: 10px; font-size: 14px; text-align: center; text-size-adjust: 100%;"><p style="margin-right: 0px; margin-bottom: 3px; margin-left: 0px; font-family: Tahoma, Verdana, Helvetica, sans-serif; caret-color: rgb(51, 51, 51); text-size-adjust: 100%; text-align: justify;"><span style="color: rgb(255, 0, 0); font-weight: bold;">ĐỌC THÔNG BÁO TRÁNH MẤT TIỀN : (MỚI)</span><br></p><p style="margin-right: 0px; margin-bottom: 3px; margin-left: 0px; font-family: Tahoma, Verdana, Helvetica, sans-serif; caret-color: rgb(51, 51, 51); text-size-adjust: 100%; text-align: justify;"><font style="text-align: left; -webkit-tap-highlight-color: transparent; font-weight: bold;">-</font><font style="text-align: left; -webkit-tap-highlight-color: transparent; font-weight: bold;"> </font><font color="#000000" style="text-align: left; -webkit-tap-highlight-color: transparent; font-weight: bold;">CHÚ Ý</font><font style="text-align: left; -webkit-tap-highlight-color: transparent; font-weight: bold;">: </font><font color="#000000" style="text-align: left; -webkit-tap-highlight-color: transparent;"><span style="font-weight: 600;">KHÔNG NÊN MÃI CHƠI 1 SỐ VÌ SỐ THAY ĐỔI LIÊN TỤC , NÊN TẢI LẠI TRANG SAU 10-20P VÀ LẤY SỐ HẠN MỨC THẤP CHƠI TIẾP . NẾU SỐ TRÊN WED ĐÃ TẮT VUI LÒNG KHÔNG CHƠI , KHI CHƠI TRÁNH KHÔNG TRẢ ĐƠN </span></font></p><p style="margin-right: 0px; margin-bottom: 3px; margin-left: 0px; font-family: Tahoma, Verdana, Helvetica, sans-serif; caret-color: rgb(51, 51, 51); text-size-adjust: 100%; text-align: justify;"><br></p><p style="margin-right: 0px; margin-bottom: 3px; margin-left: 0px; font-family: Tahoma, Verdana, Helvetica, sans-serif; caret-color: rgb(51, 51, 51); text-size-adjust: 100%; text-align: justify;"><span style="font-weight: bold;"><font color="#ff0000">- <span style="background-color: rgb(255, 255, 0);">Lỗi phải báo ngay trong 6 tiếng , tránh mất giao dịch sẽ không xữ lý được</span></font></span></p></h5><p style="margin-right: 0px; margin-bottom: 3px; margin-left: 0px;"><br style="color: rgb(51, 51, 51); font-family: Tahoma, Verdana, Helvetica, sans-serif; font-size: 14px;"></p>',
            'ads'       => '',
            'active'    => 1,
            'history'   => 1,
            'only_win'  => 1,
            'limit'     => 10,
            'week_top'  => 1,
            'day_mission'  => array(
                'active'    => 1,
            )
        ));
    }

    public function momo() {
        return response()->json(array(
            'status'    => true,
            'message'   => 'Thành công',
            'data_momo' => MomoResource::collection(Momo::where('status', 1)->get()),
            'game'      => array(
                'active' => array('chanle2', 'chanle', 'taixiu2', 'taixiu', 'x3', 'hieu2so', 'lo', 'gap3'),
                'html'   => view('game')->render()
            )
        ));
    }

    public function minigame(Request $request) {
        if ($request->game == 'day_mission') {
            $game = view('dayMission')->render();
        }
        return response()->json(array(
            'message' => 'Thành công',
            'html'    => $game,
            'game'    => $request->game  
        ));
    }
}
