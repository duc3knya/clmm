@extends('dgaAdmin.app')
@section('main')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Cài đặt hệ thống</h3>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <form action="{{ route('admin.settingEdit') }}" method="POST">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h5 class="title nk-block-title">Thông tin</h5>
                                            </div>
                                        </div>
                                        <div class="nk-block">
                                            <div class="row gy-4">
                                                @csrf
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Tên website</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="name"
                                                                value="{{ $setting->name }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Keyworks</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="keywords"
                                                                value="{{ $setting->keywords }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Mô tả</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="description"
                                                                value="{{ $setting->description }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Logo</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="logo"
                                                                value="{{ $setting->logo }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Favicon</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="favicon"
                                                                value="{{ $setting->favicon }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Background</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="background"
                                                                value="{{ $setting->background }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Lưu ý</label>
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control dga-edit" name="note" rows="12">
                                                                {{ $setting->note }}
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Quảng cáo</label>
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control" name="note" rows="4">{{ $setting->ads }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Color</label>
                                                        <div class="form-control-wrap"><input type="color"
                                                                class="form-control" name="color"
                                                                value="{{ $setting->color }}" /></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h5 class="title nk-block-title">Trò chơi</h5>
                                            </div>
                                        </div>
                                        <div class="nk-block">
                                            <div class="row gy-4">
                                                @if ($setting->only_win == 1)
                                                    <div class="col-xxl-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Chỉ hiện thắng</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-placeholder=""
                                                                    name="only_win">
                                                                    <option value="1">ON</option>
                                                                    <option value="0">OFF</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-xxl-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Chỉ hiện thắng</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-placeholder=""
                                                                    name="only_win">
                                                                    <option value="1">OFF</option>
                                                                    <option value="0">ON</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($setting->day_mission == 1)
                                                    <div class="col-xxl-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Nhiệm vụ</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-placeholder=""
                                                                    name="day_mission">
                                                                    <option value="1">ON</option>
                                                                    <option value="0">OFF</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-xxl-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Nhiệm vụ</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-placeholder=""
                                                                    name="day_mission">
                                                                    <option value="1">OFF</option>
                                                                    <option value="0">ON</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($setting->week_top == 1)
                                                    <div class="col-xxl-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Top tuần</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-placeholder=""
                                                                    name="week_top">
                                                                    <option value="1">ON</option>
                                                                    <option value="0">OFF</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-xxl-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Top tuần</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-placeholder=""
                                                                    name="week_top">
                                                                    <option value="1">OFF</option>
                                                                    <option value="0">ON</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Phần thưởng tuần (Tách bởi dấu
                                                            |)</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="gift_week"
                                                                value="{{ $setting->gift_week }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Phần thưởng ngày (Tách bởi dấu
                                                            |)</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="gift_day"
                                                                value="{{ $setting->gift_day }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Chỉ tiêu phần thưởng ngày (Tách bởi dấu
                                                            |)</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="level_day"
                                                                value="{{ $setting->level_day }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Giới hạn lịch sử</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="limit"
                                                                value="{{ $setting->limit }}" /></div>
                                                    </div>
                                                </div>
                                                @if ($setting->hu == 1)
                                                    <div class="col-xxl-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Hũ</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-placeholder=""
                                                                    name="hu">
                                                                    <option value="1">ON</option>
                                                                    <option value="0">OFF</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-xxl-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Hũ</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-placeholder=""
                                                                    name="hu">
                                                                    <option value="0">OFF</option>
                                                                    <option value="1">ON</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Tỉ lệ hũ</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="limit"
                                                                value="{{ $setting->limit }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Tiền nhận Chẵn lẻ</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="ratioCL"
                                                                value="{{ $setting->ratioCL }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Tiền nhận Chẵn lẻ 2</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="ratioCL2"
                                                                value="{{ $setting->ratioCL2 }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Tiền nhận Tài xỉu</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="ratioTX"
                                                                value="{{ $setting->ratioTX }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Tiền nhận Tài xỉu 2</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="ratioTX2"
                                                                value="{{ $setting->ratioTX2 }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Tiền nhận 1 phần 3</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="ratio1P3"
                                                                value="{{ $setting->ratio1P3 }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Tiền nhận Gấp 3</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="ratioG3"
                                                                value="{{ $setting->ratioG3 }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Tiền nhận H3</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="ratioH3"
                                                                value="{{ $setting->ratioH3 }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Tiền nhận Lô</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="ratioLO"
                                                                value="{{ $setting->ratioLO }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Nội dung trả thưởng</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="content"
                                                                value="{{ $setting->content }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Nội dung trả thưởng nhiệm vụ</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="content_day"
                                                                value="{{ $setting->content_day }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Nội dung trả thưởng tuần</label>
                                                        <div class="form-control-wrap"><input type="text"
                                                                class="form-control" name="content_week"
                                                                value="{{ $setting->content_week }}" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group"><button type="submit"
                                                            class="btn btn-primary">Xác nhận</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
