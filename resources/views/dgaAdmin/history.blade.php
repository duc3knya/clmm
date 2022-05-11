@extends('dgaAdmin.app') @section('main')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Lịch sử chơi game</h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col sorting"><span class="sub-text">ID</span></th>
                                        <th class="nk-tb-col sorting"><span class="sub-text">Số điện thoại</span></th>
                                        <th class="nk-tb-col tb-col-mb sorting">
                                            <span class="sub-text">Người chuyển</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting">
                                            <span class="sub-text">Số tiền</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting">
                                            <span class="sub-text">Tiền nhận</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting">
                                            <span class="sub-text">Nội dung</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting">
                                            <span class="sub-text">Trạng thái</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting">
                                            <span class="sub-text">Trả tiền</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting">
                                            <span class="sub-text">Số chuyển</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-md sorting">
                                            <span class="sub-text">Ngày chơi</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($history as $row)
                                    <tr class="nk-tb-item odd" id="td_{{ $row->phone }}">
                                        <td class="nk-tb-col tb-col-mb">
                                            <span class="tb-amount">{{ $row->id }}</span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ $row->partnerId }} <span class="dot dot-warning d-md-none ms-1"></span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb">
                                            <span class="tb-amount">{{ $row->partnerName }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="{{ number_format($row->amount) }}">
                                            <span class="tb-amount">{{ number_format($row->amount) }} <span class="currency">VND</span></span>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="{{ number_format($row->receive) }}">
                                            <span class="tb-amount">{{ number_format($row->receive) }} <span class="currency">VND</span></span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md"><span class="tb-amount">{{ $row->comment }}</span></td>
                                        <td class="nk-tb-col tb-col-md">@if ($row->status == 1) <span class="badge bg-primary">Thắng</span> @else <span class="badge bg-danger">Thua</span> @endif</td>
                                        <td class="nk-tb-col tb-col-md">@if ($row->pay == 1) <span class="badge bg-primary">Đã trả</span> @elseif($row->pay == 100) <span class="badge bg-danger">Chuyển lỗi</span> @else <span class="badge bg-warning">Đợi chuyển</span>  @endif</td>
                                        <td class="nk-tb-col tb-col-mb">
                                            <span class="tb-amount">{{ $row->phoneSend }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb">
                                            <span class="tb-amount">{{ $row->created_at }}</span>
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
@endsection
