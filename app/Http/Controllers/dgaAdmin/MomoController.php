<?php

namespace App\Http\Controllers\dgaAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Controllers\dgaAdmin\MomoApi;
use App\Models\Momo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class MomoController extends Controller
{
    public function addMomo()
    {
        $setting = Setting::first();
        $momo = Momo::get();
        $GetAccountMomo = [];
        $i = 0;
        foreach ($momo as $row) {
            $GetAccountMomo[$i] = $row;
            $GetAccountMomo[$i]['name'] = json_decode($row->info)->name;
            $GetAccountMomo[$i]['balance'] = json_decode($row->info)->balance;
            if ($row->status == 1) {
                $GetAccountMomo[$i]['status_text'] = '<span class="badge badge-dot bg-success" id="status">Hoạt động</span>';
            } else if ($row->status == 2) {
                $GetAccountMomo[$i]['status_text'] = '<span class="badge badge-dot bg-danger" id="status">Ẩn</span>';
            } else if ($row->status == 0) {
                $GetAccountMomo[$i]['status_text'] = '<span class="badge badge-dot bg-danger" id="status">Bảo trì</span>';
            } else if ($row->status == 3) {
                $GetAccountMomo[$i]['status_text'] = '<span class="badge badge-dot bg-warning" id="status">Đang xác thực</span>';
            } 

            $i ++;
            
        }
        return view('dgaAdmin.addMomo', compact('setting', 'GetAccountMomo'));
    }

    public function getOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:11',
            'min'   => 'numeric|required',
            'max'   => 'numeric|required',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        $momo = new MomoApi();
        $data = array(
            'phone'     => $request->phone,
            'device'    => 'iPhone',
            'hardware'  => 'iPhone',
            'facture'   => 'Apple',
            'SECUREID'  => '',
            'MODELID'   => '',
            'imei'      => $momo->generateImei(),
            'rkey'      => $momo->generateRandom(20),
            'AAID'      => '',
            'TOKEN'     => $momo->get_TOKEN(),
        );
        $result = $momo->SendOTP($data);
        if ($result['status'] == "success") {
            $momo = Momo::where('phone', $request->phone)->first();
            if (!$momo) {
                Momo::create([
                    'phone' => $request->phone,
                    'password'  => $request->password,
                    'info' => json_encode($data),
                    'min' => $request->min,
                    'max' => $request->max,
                    'times' => 0,
                    'amount' => 0,
                    'status' => 3,
                ]);
                return response()->json(array('status' => 'success', 'message' => 'Gửi mã OTP về ' . $request->phone . ' thành công'));
            } else {
                $momo->info = json_encode($data);
                $momo->save();
                return response()->json(array('status' => 'success', 'message' => 'Gửi mã OTP về ' . $request->phone . ' thành công'));
            }
        }
    }

    public function verifyMomo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:11',
            'min'   => 'numeric|required',
            'max'   => 'numeric|required',
            'password' => 'required|string|min:6',
            'otp' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(array('status' => 'error', 'message' => $validator->errors()->first()));
        }
        $code = $request->otp;
        $dataMomo = Momo::where('phone', $request->phone)->first();
        $data_old = json_decode($dataMomo->info, true);
        $data = Arr::add($data_old, 'ohash', hash('sha256', $data_old["phone"] . $data_old["rkey"] . $code));
        $momo = new MomoApi();
        $result = $momo->REG_DEVICE_MSG($data);
        $data_new = Arr::add($data, 'setupKey', $result["extra"]["setupKey"]);
        $data_new = Arr::add($data_new, 'setupKeyDecrypt', $momo->get_setupKey($result["extra"]["setupKey"], $data));
        $dataMomo->info = $data_new;
        $dataMomo->save();
        $result = $this->loginMomo($dataMomo->phone);
        return back()->withErrors(['status' => 'success', 'message' => 'Thêm tài khoản thành công']);
    }

    public function loginMomo($phone)
    {
        $dataMomo = Momo::where('phone', $phone)->first();
        $data_old = json_decode($dataMomo->info, true);
        $data_new = Arr::add($data_old, 'agent_id', '');
        $data_new = Arr::add($data_new, 'sessionkey', '');
        $data_new = Arr::add($data_new, 'authorization', '');
        $data_new = Arr::add($data_new, 'password', $dataMomo->password);
        $momo = new MomoApi();
        $result = $momo->USER_LOGIN_MSG($data_new);
        if ($result['errorCode']) {
            return array(
                'author' => 'DUNGA',
                'status' => 'error',
                'message' => 'Thất bại',
                'data' => array(
                    'code' => $result['errorCode'],
                    'desc' => $result['errorDesc']
                )
            );
        } else {
            $data_new = Arr::set($data_old, 'authorization', $result['extra']['AUTH_TOKEN']);
            $data_new = Arr::set($data_new, 'RSA_PUBLIC_KEY', $result['extra']['REQUEST_ENCRYPT_KEY']);
            $data_new = Arr::set($data_new, 'sessionkey', $result['extra']['SESSION_KEY']);
            $data_new = Arr::set($data_new, 'balance', $result['extra']['BALANCE']);
            $data_new = Arr::set($data_new, 'agent_id', $result['momoMsg']['agentId']);
            $data_new = Arr::set($data_new, 'BankVerify', $result['momoMsg']['bankVerifyPersonalid']);
            $data_new = Arr::set($data_new, 'Name', $result['momoMsg']['name']);
            $data_new = Arr::set($data_new, 'password', $dataMomo->password);
            $dataMomo->info = $data_new;
            $dataMomo->save();
            return array(
                'status' => 'success',
                'message' => 'Đăng nhập thành công'
            );
        }
        // dd($result);
    }

    public function historyMomo($phone)
    {
        $dataMomo = Momo::where('phone', $phone)->first();
        $data = json_decode($dataMomo->info, true);
        $momo = new MomoApi();
        $result = $momo->CheckHisNew(1, $data);
        if ($result['status'] != 'error') {
            return $result;
        } else {
            $this->loginMomo($dataMomo->phone);
            return $momo->CheckHisNew(1, $data);
        }
    }

    public function checkMomo($phone, $receiver)
    {
        $dataMomo = Momo::where('phone', $phone)->first();
        $data = json_decode($dataMomo->info, true);
        $momo = new MomoApi();
        $result = $momo->CHECK_USER_PRIVATE($receiver, $data);
        if ($result == null) {
            return array('status' => 'error', 'message' => 'Tài khoản không tồn tại hoặc chưa đăng ký momo', 'author' => 'DUNGA');
        } else {
            return array('status' => 'success', 'message' => 'Thành công', 'author' => 'DUNGA', 'name' => $result['extra']['NAME']);
        }
    }

    public function sendMoneyMomo($phone, $amount, $comment, $receiver)
    {
        $dataMomo = Momo::where('phone', $phone)->first();
        $data = json_decode($dataMomo->info, true);
        $momo = new MomoApi();
        $dataSend = array(
            'comment' => $comment,
            'amount' => $amount,
            'partnerName' => $this->checkMomo($phone, $receiver)['name'],
            'receiver' => $receiver,
        );
        // $data_new = Arr::set($data, 'Name', $this->checkMomo($phone, $phone)['name']);
        $result = $momo->M2MU_INIT($data, $dataSend);
        if (!empty($result["errorCode"]) && $result["errorDesc"] != "Lỗi cơ sở dữ liệu. Quý khách vui lòng thử lại sau") {
            return array(
                "status" => "error",
                "code"   => $result["errorCode"],
                "message" => $result["errorDesc"]
            );
        } else if (is_null($result)) {
            return array(
                "status" => "error",
                "code"   => -5,
                "message" => "Đã xảy ra lỗi ở momo hoặc bạn đã hết hạn truy cập vui lòng đăng nhập lại"
            );
        } else {
            $id = $result["momoMsg"]["replyMsgs"]["0"]["ID"];
            $result = $momo->M2MU_CONFIRM($id, $data, $dataSend);
            if (empty($result['errorCode'])) {
                $balance = $result["extra"]["BALANCE"];
                $tranHisMsg = $result["momoMsg"]["replyMsgs"]["0"]["tranHisMsg"];
                $data_new = Arr::set($data, 'balance', $balance);
                $dataMomo->info = $data_new;
                $dataMomo->save();
                return array(
                    'status' => 'success',
                    'message' => 'Thành công',
                    'author' => 'DUNGA',
                    'data' => array(
                        "balance" => $balance,
                        "ID"   => $tranHisMsg["ID"],
                        "tranId" => $tranHisMsg["tranId"],
                        "partnerId" => $tranHisMsg["partnerId"],
                        "partnerName" => $tranHisMsg["partnerName"],
                        "amount"   => $tranHisMsg["amount"],
                        "comment"  => (empty($tranHisMsg["comment"])) ? "" : $tranHisMsg["comment"],
                        "status"   => $tranHisMsg["status"],
                        "desc"     => $tranHisMsg["desc"],
                        "ownerNumber" => $tranHisMsg["ownerNumber"],
                        "ownerName" => $tranHisMsg["ownerName"],
                        "millisecond" => $tranHisMsg["finishTime"]
                    )
                );
            } else {
                return array(
                    'status' => 'error',
                    'author'  => 'DUNGA',
                    'data' => array(
                        "code"  => $result["errorCode"],
                        "message" => $result["errorDesc"],
                    )
                );
            }
        }
    }

    public function deleteMomo(Request $request) {
        $phone = "0".$request->phone;
        $dataMomo = Momo::where('phone', $phone)->first();
        if ($dataMomo) {
            $dataMomo->delete();
            return response()->json(array('status' => 'success', 'message' => 'Xóa số momo '.$dataMomo->phone.' thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function activeMomo(Request $request) {
        $phone = "0".$request->phone;
        $dataMomo = Momo::where('phone', $phone)->first();
        if ($dataMomo) {
            $dataMomo->status = 1;
            $dataMomo->save();
            return response()->json(array('status' => 'success', 'message' => 'Chỉnh trạng thái hoạt động số momo '.$dataMomo->phone.' thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function hideMomo(Request $request) {
        $phone = "0".$request->phone;
        $dataMomo = Momo::where('phone', $phone)->first();
        if ($dataMomo) {
            $dataMomo->status = 2;
            $dataMomo->save();
            return response()->json(array('status' => 'success', 'message' => 'Chỉnh trạng thái ẩn số momo '.$dataMomo->phone.' thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function maintenanceMomo(Request $request) {
        $phone = "0".$request->phone;
        $dataMomo = Momo::where('phone', $phone)->first();
        if ($dataMomo) {
            $dataMomo->status = 0;
            $dataMomo->save();
            return response()->json(array('status' => 'success', 'message' => 'Chỉnh trạng thái bảo trì số momo '.$dataMomo->phone.' thành công'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function infoMomo(Request $request) {
        $phone = "0".$request->phone;
        $dataMomo = Momo::where('phone', $phone)->first();
        if ($dataMomo) {
            return response()->json(array('status' => 'success', 'message' =>'Thành công', 'html' => '<form action="'.route("admin.editMomo").'" method="POST" class="form-validate is-alter" novalidate="novalidate"> <div class="form-group"> <input type="text" class="form-control" id="_token" name="_token" value="'.csrf_token().'" hidden/> <label class="form-label" for="full-name">Số điện thoại</label> <div class="form-control-wrap"><input type="text" class="form-control" id="phone" name="phone" value="'.$dataMomo->phone.'" disabled/><input type="text" class="form-control" id="id" name="id" value="'.$dataMomo->id.'" hidden/></div></div><div class="form-group"> <label class="form-label" for="email-address">Mật khẩu</label> <div class="form-control-wrap"><input type="password" class="form-control" id="password" name="password"/></div></div><div class="form-group"> <label class="form-label" for="phone-no">Min</label> <div class="form-control-wrap"><input type="text" class="form-control" id="min" name="min" value="'.$dataMomo->min.'"/></div></div><div class="form-group"> <label class="form-label" for="phone-no">Max</label> <div class="form-control-wrap"><input type="text" class="form-control" id="max" name="max" value="'.$dataMomo->max.'"/></div></div><div class="form-group"><button type="submit" class="btn btn-lg btn-primary">Lưu thông tin</button></div></form>'));
        } else {
            return response()->json(array('status' => 'error', 'message' => 'Số momo không có trong hệ thống'));
        }
    }

    public function editMomo(Request $request) {
        $dataMomo = Momo::where('id', $request->id)->first();
        if ($dataMomo) {
            if ($request->password == null) {
                $dataMomo->min = $request->min;
                $dataMomo->max = $request->max;
                $dataMomo->save();
                return back()->withErrors(['status' => 'success', 'message' => 'Sửa thông tin số momo thành công']);
            } else {
                $dataMomo->password = $request->password;
                $dataMomo->min = $request->min;
                $dataMomo->max = $request->max;
                $dataMomo->save();
                return back()->withErrors(['status' => 'success', 'message' => 'Sửa thông tin số momo thành công']);
            }
        } else {
            return back()->withErrors(['status' => 'danger', 'message' => 'Số momo không có trong hệ thống']);

        }
    }
}
