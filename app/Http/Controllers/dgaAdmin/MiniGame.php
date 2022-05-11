<?php

namespace App\Http\Controllers\dgaAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Momo;
use Illuminate\Support\Facades\Http;
use App\Models\HistoryPlay;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\HistoryDayMission;

class MiniGame extends Controller
{

    private $comment = array(
        'MINIGAMECL' => array(
            'chan' => 'C',
            'le' => 'L'
        ),
        'MINIGAMECL2' => array(
            'chan' => '2',
            'le' => '1'
        ),
        'MINIGAMETX' => array(
            'tai' => 'T',
            'xiu' => 'X'
        ),
        'MINIGAMETX2' => array(
            'tai' => '4',
            'xiu' => '3'
        ),
        'MINIGAME1P3' => array(
            'n0' => 'N0',
            'n1' => 'N1',
            'n2' => 'N2',
            'n3' => 'N3',
        ),
        'MINIGAMELO' => array(
            'lo' => 'LO'
        ),
        'MINIGAMEH3' => array(
            'h3' => 'H3'
        ),
        'MINIGAMEG3' => array(
            'g3' => 'G3'
        )
    );

    public function logicMinigame($tranId, $comment, $game)
    {
        if ($game == 'CL') {
            $number = substr((string) $tranId, -1);
            if ($number == 0 || $number == 9) {
                $rs = 3; // THUA
            } else {
                if ($number == 2 || $number == 4 || $number == 6 || $number == 8) {
                    $rs = $this->comment['MINIGAMECL']['chan']; // CHẴN
                } else {
                    $rs = $this->comment['MINIGAMECL']['le']; // LẺ
                }
            }

            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'CL2') {
            $number = substr((string) $tranId, -1);
            if ($number == 0 || $number == 2 || $number == 4 || $number == 6 || $number == 8) {
                $rs = $this->comment['MINIGAMECL2']['chan']; // CHẴN 2
            } else {
                $rs = $this->comment['MINIGAMECL2']['le']; // LẺ 2
            }

            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'TX') {
            $number = substr((string) $tranId, -1);
            if ($number == 0 || $number == 9) {
                $rs = 3; // THUA
            } else {
                if ($number >= 5) {
                    $rs = $this->comment['MINIGAMETX']['tai']; // TÀI
                } else {
                    $rs = $this->comment['MINIGAMETX']['xiu']; // XỈU
                }
            }

            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'TX2') {
            $number = substr((string) $tranId, -1);

            if ($number >= 5) {
                $rs = $this->comment['MINIGAMETX2']['tai']; // TÀI
            } else {
                $rs = $this->comment['MINIGAMETX2']['xiu']; // XỈU
            }

            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == '1P3') {
            $number = substr((string) $tranId, -1);
            if ($number == '0') {
                $rs = $this->comment['MINIGAME1P3']['n0']; // N0
            } else if ($number == '1' || $number == '2' || $number == '3') {
                $rs = $this->comment['MINIGAME1P3']['n1']; // N1
            } else if ($number == '4' || $number == '5' || $number == '6') {
                $rs = $this->comment['MINIGAME1P3']['n2']; // N2
            } else if ($number == '7' || $number == '8' || $number == '9') {
                $rs = $this->comment['MINIGAME1P3']['n3']; // N3
            }
            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'LO') {
            $number = substr((string) $tranId, -2);
            if ($number == 01 || $number == 03 || $number == 12 || $number == 19 || $number == 23 || $number == 24 || $number == 30 || $number == 33 || $number == 39 || $number == 48 || $number == 54 || $number == 55 || $number == 60 || $number == 61 || $number == 71 || $number == 77 || $number == 81 || $number == 82 || $number == 83 || $number == 67 || $number == 88 || $number == 76 || $number == 64 || $number == 79 || $number == 29 || $number == 99) {
                $rs = $this->comment['MINIGAMELO']['lo']; // LO
            }
            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'H3') {
            $number1 = substr((string) $tranId, -1);
            $number2 = substr((string) $tranId, -2, 1);
            $number = $number2 - $number1;
            if ($number == 9 || $number == 7 || $number == 5 || $number == 3) {
                $rs = $this->comment['MINIGAMEH3']['h3']; // H3
            }
            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } else if ($game == 'G3') {
            $number1 = substr((string) $tranId, -2);
            $number2 = substr((string) $tranId, -3);
            if ($number1 == 02 || $number1 == 13 || $number1 == 17 || $number1 == 19 || $number1 == 21 || $number1 == 29 || $number1 == 35 || $number1 == 37 || $number1 == 47 || $number1 == 49 || $number1 == 51 || $number1 == 54 || $number1 == 57 || $number1 == 63 || $number1 == 64 || $number1 == 74 || $number1 == 83 || $number1 == 91 || $number1 == 95 || $number1 == 96) {
                $rs = $this->comment['MINIGAMEG3']['g3']; // G3
            } else if ($number1 == 66 || $number1 == 99) {
                $rs = $this->comment['MINIGAMEG3']['g3']; // G3
            } else if ($number2 == 123 || $number2 == 234 || $number2 == 456 || $number2 == 678 || $number2 == 789) {
                $rs = $this->comment['MINIGAMEG3']['g3']; // G3
            }
            if ($rs == $comment) {
                return true;
            } else {
                return false;
            }
        } 
    }

    public function XuLiMiniGame()
    {
        $momo = Momo::where('status', 1)->get();
        $setting = Setting::first();
        foreach ($momo as $row) {
            $url = route('admin.historyMomo', ['phone' => $row->phone]);
            $response = Http::get($url)->json();

            if (!empty($response['data'])) {
                foreach ($response['data'] as $data) {
                    $comment = $data['comment'];
                    $amount = $data['amount'];
                    $partnerId = $data['patnerID'];
                    $partnerName = $data['partnerName'];
                    $tranId = $data['tranId'];
                    $history = HistoryPlay::where('tranId', $tranId)->first();
                    if (!$history) {
                        if (Str::upper($comment) == $this->comment['MINIGAMECL']['chan'] || Str::upper($comment) == $this->comment['MINIGAMECL']['le']) { // MINIGAME CHẴN LẺ
                            $game = 'CL';
                            if ($amount >= $row->min && $amount <= $row->max) {
                                if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                    $receive = $amount * $setting->ratioCL; // TIỀN NHẬN KHI THẮN
                                    $status = 1; // THẮNG
                                    $pay = 0; // CHƯA CHUYỂN
                                } else {
                                    $receive = 0;
                                    $status = 0; // THUA
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else {
                                $receive = 0; // THUA
                                $status = 3; // GIỚI HẠN
                                $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                            }
                        } else if (Str::upper($comment) == $this->comment['MINIGAMECL2']['chan'] || Str::upper($comment) == $this->comment['MINIGAMECL2']['le']) { // MINIGAME CHẴN LẺ 2
                            $game = 'CL2';
                            if ($amount >= $row->min && $amount <= $row->max) {
                                if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                    $receive = $amount * $setting->ratioCL2; // TIỀN NHẬN KHI THẮN
                                    $status = 1; // THẮNG
                                    $pay = 0; // CHƯA CHUYỂN
                                } else {
                                    $receive = 0;
                                    $status = 0; // THUA
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else {
                                $receive = 0; // THUA
                                $status = 3; // GIỚI HẠN
                                $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                            }
                        } else if (Str::upper($comment) == $this->comment['MINIGAMETX']['tai'] || Str::upper($comment) == $this->comment['MINIGAMETX']['xiu']) { // MINIGAME TÀI XỈU
                            $game = 'TX';
                            if ($amount >= $row->min && $amount <= $row->max) {
                                if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                    $receive = $amount * $setting->ratioTX; // TIỀN NHẬN KHI THẮN
                                    $status = 1; // THẮNG
                                    $pay = 0; // CHƯA CHUYỂN
                                } else {
                                    $receive = 0;
                                    $status = 0; // THUA
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else {
                                $receive = 0; // THUA
                                $status = 3; // GIỚI HẠN
                                $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                            }
                        } else if (Str::upper($comment) == $this->comment['MINIGAMETX2']['tai'] || Str::upper($comment) == $this->comment['MINIGAMETX2']['xiu']) { // MINIGAME TÀI XỈU 2
                            $game = 'TX2';
                            if ($amount >= $row->min && $amount <= $row->max) {
                                if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                    $receive = $amount * $setting->ratioTX2; // TIỀN NHẬN KHI THẮN
                                    $status = 1; // THẮNG
                                    $pay = 0; // CHƯA CHUYỂN
                                } else {
                                    $receive = 0;
                                    $status = 0; // THUA
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else {
                                $receive = 0; // THUA
                                $status = 3; // GIỚI HẠN
                                $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                            }
                        } else if (Str::upper($comment) == $this->comment['MINIGAME1P3']['n0'] || Str::upper($comment) == $this->comment['MINIGAME1P3']['n1'] || Str::upper($comment) == $this->comment['MINIGAME1P3']['n2'] || Str::upper($comment) == $this->comment['MINIGAME1P3']['n3']) { // MINIGAME 1 PHẦN 3
                            $game = '1P3';
                            if ($amount >= $row->min && $amount <= $row->max) {
                                if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                    if ($comment != 'N0') {
                                        $receive = $amount * explode('|', $setting->ratio1P3)[0]; // TIỀN NHẬN KHI THẮN
                                    } else {
                                        $receive = $amount * explode('|', $setting->ratio1P3)[1]; // TIỀN NHẬN KHI THẮN
                                    }
                                    $status = 1; // THẮNG
                                    $pay = 0; // CHƯA CHUYỂN
                                } else {
                                    $receive = 0;
                                    $status = 0; // THUA
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else {
                                $receive = 0; // THUA
                                $status = 3; // GIỚI HẠN
                                $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                            }
                        } else if (Str::upper($comment) == $this->comment['MINIGAMELO']['lo']) { // MINIGAME LO
                            $game = 'LO';
                            if ($amount >= $row->min && $amount <= $row->max) {
                                if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                    $receive = $amount * $setting->ratioLO; // TIỀN NHẬN KHI THẮN
                                    $status = 1; // THẮNG
                                    $pay = 0; // CHƯA CHUYỂN
                                } else {
                                    $receive = 0;
                                    $status = 0; // THUA
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else {
                                $receive = 0; // THUA
                                $status = 3; // GIỚI HẠN
                                $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                            }
                        } else if (Str::upper($comment) == $this->comment['MINIGAMEH3']['h3']) { // MINIGAME H3
                            $game = 'H3';
                            if ($amount >= $row->min && $amount <= $row->max) {
                                if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                    $number1 = substr((string) $tranId, -1);
                                    $number2 = substr((string) $tranId, -2, 1);
                                    $number = $number2 - $number1;
                                    if ($number == 3) {
                                        $receive = $amount * explode('|', $setting->ratioH3)[0];; // TIỀN NHẬN KHI THẮNG
                                    } else if ($number == 5) {
                                        $receive = $amount * explode('|', $setting->ratioH3)[1];; // TIỀN NHẬN KHI THẮNG
                                    } else if ($number == 7) {
                                        $receive = $amount * explode('|', $setting->ratioH3)[2];; // TIỀN NHẬN KHI THẮNG
                                    } else if ($number == 9) {
                                        $receive = $amount * explode('|', $setting->ratioH3)[3];; // TIỀN NHẬN KHI THẮNG
                                    }
                                    $status = 1; // THẮNG
                                    $pay = 0; // CHƯA CHUYỂN
                                } else {
                                    $receive = 0;
                                    $status = 0; // THUA
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else {
                                $receive = 0; // THUA
                                $status = 3; // GIỚI HẠN
                                $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                            }
                        } else if (Str::upper($comment) == $this->comment['MINIGAMEH3']['h3']) { // MINIGAME H3
                            $game = 'G3';
                            if ($amount >= $row->min && $amount <= $row->max) {
                                if ($this->logicMinigame($tranId, Str::upper($comment), $game) == true) { // THẮNG
                                    $number1 = substr((string) $tranId, -1);
                                    $number2 = substr((string) $tranId, -3);
                                    if ($number1 == 02 || $number1 == 13 || $number1 == 17 || $number1 == 19 || $number1 == 21 || $number1 == 29 || $number1 == 35 || $number1 == 37 || $number1 == 47 || $number1 == 49 || $number1 == 51 || $number1 == 54 || $number1 == 57 || $number1 == 63 || $number1 == 64 || $number1 == 74 || $number1 == 83 || $number1 == 91 || $number1 == 95 || $number1 == 96) {
                                        $receive = $amount * explode('|', $setting->ratioG3)[0];; // TIỀN NHẬN KHI THẮNG
                                    } else if ($number1 == 66 || $number1 == 99) {
                                        $receive = $amount * explode('|', $setting->ratioG3)[1];; // TIỀN NHẬN KHI THẮNG
                                    } else if ($number2 == 123 || $number2 == 234 || $number2 == 456 || $number2 == 678 || $number2 == 789) {
                                        $receive = $amount * explode('|', $setting->ratioG3)[2];; // TIỀN NHẬN KHI THẮNG
                                    }
                                    $status = 1; // THẮNG
                                    $pay = 0; // CHƯA CHUYỂN
                                } else {
                                    $receive = 0;
                                    $status = 0; // THUA
                                    $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                                }
                            } else {
                                $receive = 0; // THUA
                                $status = 3; // GIỚI HẠN
                                $pay = 1; // THUA ĐỂ LÀ ĐÃ CHUYỂN
                            }
                        }
                        HistoryPlay::create([
                            'tranId'    => $tranId,
                            'partnerName' => $partnerName,
                            'partnerId' => $partnerId,
                            'comment' => $comment,
                            'amount' => $amount,
                            'receive' => $receive,
                            'status' => $status,
                            'pay' => $pay,
                            'game' => $game,
                            'phoneSend' => $row->phone
                        ]);
                    }
                }
            }
        }
    }

    public function payMoneyMiniGame() {
        $setting = Setting::first();
        $history = HistoryPlay::where(['status' => 1, 'pay' => 0])->orWhere('pay', 100)->get();
        foreach ($history as $row) {
            $info = HistoryPlay::where(['tranId' => $row->tranId])->first();
            $url = route('admin.sendMoneyMomo', ['phone' => $info->phoneSend, 'amount' => $info->receive, 'comment' => $setting->content.$row->tranId, 'receiver' => $info->partnerId]);
            $response = Http::get($url)->json();
            if ($response['status'] != 'success') { // CHUYỂN TIỀN LỖI
                $info->pay = 100;
                $info->save();
            } else {
                $momo = Momo::where('phone', $info->phoneSend)->first();
                $momo->times = $momo->times + 1;
                $momo->amount = $momo->amount + $info->receive;
                $momo->save();
                $info->pay = 1;
                $info->save();
            }
        }
    }

    public function payDayMission() {
        $setting = Setting::first();
        $history = HistoryDayMission::where(['status' => 1, 'pay' => 0])->get();
        $phone = Momo::where('status', 1)->inRandomOrder()->first()->phone;
        foreach ($history as $row) {
            $info = HistoryDayMission::where(['status' => 1, 'pay' => 0, 'id' => $row->id])->first();
            $url = route('admin.sendMoneyMomo', ['phone' => $phone, 'amount' => $info->receive, 'comment' => $setting->content_day.' '.Str::upper(Str::random(6)), 'receiver' => $info->phone]);
            $response = Http::get($url)->json();
            if ($response['status'] != 'success') { // CHUYỂN TIỀN LỖI
                $info->pay = 100;
                $info->save();
            } else {
                $momo = Momo::where('phone', $phone)->first();
                $momo->times = $momo->times + 1;
                $momo->amount = $momo->amount + $info->receive;
                $momo->save();
                $info->pay = 1;
                $info->save();
            }
        }
    }

}
