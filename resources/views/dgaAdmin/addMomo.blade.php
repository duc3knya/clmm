@extends('dgaAdmin.app') @section('main')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Thêm momo</h3>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                <div class="alert alert-fill alert-icon alert-{{ $errors->first('status') }}" role="alert"><em class="icon ni ni-alert-circle"></em> <strong>Thông báo</strong>. {{ $errors->first('message') }}.</div>
                @endif
                <div class="nk-block">
                    <div class="card card-bordered">
                        <form action="{{ route('admin.verifyMomo') }}" method="POST">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="title nk-block-title">Thông tin momo (Nhập đầy đủ thông tin rồi hẵn lấy OTP và thêm)</h5>
                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <div class="row gy-4">
                                            @csrf
                                            <div class="col-xxl-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="">Số điện thoại</label>
                                                    <div class="form-control-wrap"><input type="text" class="form-control" name="phone" id="phone" /></div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-md-4">
                                                <label class="form-label" for="">Mã OTP</label>
                                                <div class="input-group">
                                                    <input type="password" id="otp" class="form-control" name="otp" />
                                                    <div class="input-group-append"><button type="button" class="btn btn-outline-primary btn-dim" id="btnGETOTP">GET OTP</button></div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="">Mật khẩu</label>
                                                    <div class="form-control-wrap"><input type="password" id="password" class="form-control" name="password" /></div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="">Tối thiểu tiền cược</label>
                                                    <div class="form-control-wrap"><input type="text" id="min" class="form-control" name="min" /></div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="">Tối đa tiền cược</label>
                                                    <div class="form-control-wrap"><input type="text" id="max" class="form-control" name="max" /></div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="">(Nhập đầy đủ thông tin rồi hẵn lấy OTP và thêm)</label>
                                                    <div class="form-control-wrap"><button type="submit" class="btn btn-outline-primary btn-dim w-100">Xác nhận thêm</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Danh sách số MOMO</h4>
                        </div>
                    </div>
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col sorting"><span class="sub-text">Tên momo</span></th>
                                        <th class="nk-tb-col tb-col-mb sorting">
                                            <span class="sub-text">Số dư</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting">
                                            <span class="sub-text">Số điện thoại</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting">
                                            <span class="sub-text">Lần chuyển</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting">
                                            <span class="sub-text">Hạn mức</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting">
                                            <span class="sub-text">Trạng thái</span>
                                        </th>
                                        <th class="nk-tb-col nk-tb-col-tools text-end sorting"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($GetAccountMomo as $row)
                                    <tr class="nk-tb-item odd" id="td_{{ $row->phone }}">
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ $row->name }} <span class="dot dot-warning d-md-none ms-1"></span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="{{ number_format($row->balance) }}">
                                            <span class="tb-amount">{{ number_format($row->balance) }} <span class="currency">VND</span></span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md"><span>{{ $row->phone }}</span></td>
                                        <td class="nk-tb-col tb-col-md"><span class="tb-amount">{{ $row->times }}</span></td>
                                        <td class="nk-tb-col tb-col-md"><span class="tb-amount">{{ number_format($row->amount) }}</span></td>
                                        <td class="nk-tb-col tb-col-md">{!! $row->status_text !!}</td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                {{-- <li class="nk-tb-action-hidden">
                                                    <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Wallet" aria-label="Wallet">
                                                        <em class="icon ni ni-wallet-fill"></em>
                                                    </a>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Send Email" aria-label="Send Email">
                                                        <em class="icon ni ni-mail-fill"></em>
                                                    </a>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Suspend" aria-label="Suspend">
                                                        <em class="icon ni ni-user-cross-fill"></em>
                                                    </a>
                                                </li> --}}
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li>
                                                                    <a onclick="infoMomo({{ $row->phone }})"><em class="icon ni ni-eye"></em><span>Thông tin</span></a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a onclick="activeMomo({{ $row->phone }})"><em class="icon ni ni-eye"></em><span>Hoạt động</span></a>
                                                                </li>
                                                                <li>
                                                                    <a onclick="deleteMomo({{ $row->phone }})"><em class="icon ni ni-trash"></em><span>Xóa</span></a>
                                                                </li>
                                                                <li>
                                                                    <a onclick="maintenanceMomo({{ $row->phone }})"><em class="icon ni ni-shield-off"></em><span>Bảo trì</span></a>
                                                                </li>
                                                                <li>
                                                                    <a onclick="hideMomo({{ $row->phone }})"><em class="icon ni ni-eye-off"></em><span>Ẩn Momo</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="infoMomo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross"></em> </a>
            <div class="modal-header"><h5 class="modal-title">Thông tin MOMO</h5></div>
            <div class="modal-body" id="showInfo">
                             
            </div>
        </div>
    </div>
</div>
<script>
    $("#btnGETOTP").click(function () {
        var btn = $(this);
        var phone = $("#phone").val();
        var password = $("#password").val();
        var min = $("#min").val();
        var max = $("#max").val();
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "{{ route('admin.getOTP') }}",
            data: {
                _token: "{{ csrf_token() }}",
                phone: phone,
                password: password,
                min: min,
                max: max,
            },
            success: function (data) {
                if (data.status == "success") {
                    swal(data.message, "success");
                } else {
                    swal(data.message, "error");
                }
            },
        });
    });
    function deleteMomo(phone) {
        Swal.fire({
            title: "Bạn chắc chẵn muốn xóa số momo này ?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Xóa",
            cancelButtonText: "Không",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: "{{ route('admin.deleteMomo') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        phone: phone,
                    },
                    success: function (data) {
                        if (data.status == "success") {
                            swal(data.message, "success");
                            document.getElementById("td_" + phone ).remove();
                        } else {
                            swal(data.message, "error");
                        }
                    },
                });
            }
        });
    }

    function activeMomo(phone) {
        Swal.fire({
            title: "Bạn chắc chẵn muốn chỉnh trạng thái hoạt động số momo này ?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Xóa",
            cancelButtonText: "Không",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: "{{ route('admin.activeMomo') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        phone: phone,
                    },
                    success: function (data) {
                        if (data.status == "success") {
                            swal(data.message, "success");
                            document.getElementById("status").className = 'badge badge-dot bg-success';
                            document.getElementById("status").innerHTML = 'Hoạt động';
                        } else {
                            swal(data.message, "error");
                        }
                    },
                });
            }
        });
    }

    function hideMomo(phone) {
        Swal.fire({
            title: "Bạn chắc chẵn muốn chỉnh trạng thái ẩn số momo này ?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Xóa",
            cancelButtonText: "Không",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: "{{ route('admin.hideMomo') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        phone: phone,
                    },
                    success: function (data) {
                        if (data.status == "success") {
                            swal(data.message, "success");
                            document.getElementById("status").className = 'badge badge-dot bg-danger';
                            document.getElementById("status").innerHTML = 'Ẩn';
                        } else {
                            swal(data.message, "error");
                        }
                    },
                });
            }
        });
    }

    function maintenanceMomo(phone) {
        Swal.fire({
            title: "Bạn chắc chẵn muốn chỉnh trạng thái bảo trì số momo này ?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Xóa",
            cancelButtonText: "Không",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: "{{ route('admin.maintenanceMomo') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        phone: phone,
                    },
                    success: function (data) {
                        if (data.status == "success") {
                            swal(data.message, "success");
                            document.getElementById("status").className = 'badge badge-dot bg-danger';
                            document.getElementById("status").innerHTML = 'Bảo trì';
                        } else {
                            swal(data.message, "error");
                        }
                    },
                });
            }
        });
    }

    function infoMomo(phone) {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "{{ route('admin.infoMomo') }}",
            data: {
                _token: "{{ csrf_token() }}",
                phone: phone,
            },
            success: function (data) {
                if (data.status == "success") {
                    $('#showInfo').html(data.html)
                } else {
                    swal(data.message, "error");
                }
            },
        });
        $('#infoMomo').modal('show');
    }

</script>
@endsection
