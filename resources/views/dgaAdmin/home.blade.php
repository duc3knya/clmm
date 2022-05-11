@extends('dgaAdmin.app') @section('main')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Trang quản trị</h3>
                            <div class="nk-block-des text-soft">
                                <p>Đây là trang quản trị - hệ thống được làm bới DUNGA.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Tổng số tiền chơi</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">
                                                    {{ number_format($total['amount']) }}
                                                </div>
                                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Số tiền thắng</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">
                                                    {{ number_format($total['amountWin']) }}
                                                </div>
                                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Số tiền thua</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">
                                                    {{ number_format($total['amountLose']) }}
                                                </div>
                                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Số tiền đã trả</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">
                                                    {{ number_format($total['amountSend']) }}
                                                </div>
                                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Số lượt thắng</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">
                                                    {{ number_format($total['turnWin']) }}
                                                </div>
                                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Số lượt thua</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">
                                                    {{ number_format($total['turnLose']) }}
                                                </div>
                                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="title nk-block-title">Thông số</h4>
                        </div>
                    </div>
                    <ul class="nav nav-tabs nav-tabs-s2 mt-n2">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#chanle">Chẵn lẻ</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#chanle2">Chẵn lẻ 2</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#taixiu">Tài xỉu</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#taixiu2">Tài xỉu 2</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#phan3">1 Phần 3</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#gap3">Gấp 3</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#h3">H3</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#lo">LO</a></li>
                    </ul>
                    <div class="tab-content py-2">
                        <div class="tab-pane active" id="chanle">
                            <div class="row">
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số ngày</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendCLDay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountCLDay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseCLDay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinCLDay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tuần</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendCLWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountCLWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseCLWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinCLWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tháng</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendCLMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountCLMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseCLMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinCLMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="chanle2">
                            <div class="row">
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số ngày</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendCL2Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountCL2Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseCL2Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinCL2Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tuần</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendCL2Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountCL2Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseCL2Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinCL2Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tháng</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendCL2Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountCL2Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseCL2Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinCL2Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="taixiu">
                            <div class="row">
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số ngày</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendTXDay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountTXDay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseTXDay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinTXDay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tuần</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendTXWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountTXWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseTXWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinTXWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tháng</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendTXMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountTXMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseTXMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinTXMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="taixiu2">
                            <div class="row">
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số ngày</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendTX2Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountTX2Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseTX2Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinTX2Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tuần</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendTX2Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountTX2Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseTX2Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinTX2Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tháng</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendTX2Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountTX2Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseTX2Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinTX2Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="phan3">
                            <div class="row">
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số ngày</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSend1P3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amount1P3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLose1P3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWin1P3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tuần</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSend1P3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amount1P3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLose1P3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWin1P3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tháng</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSend1P3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amount1P3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLose1P3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWin1P3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="gap3">
                            <div class="row">
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số ngày</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendG3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountG3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseG3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinG3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tuần</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendG3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountG3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseG3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinG3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tháng</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendG3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountG3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseG3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinG3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="h3">
                            <div class="row">
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số ngày</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendH3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountH3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseH3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinH3Day']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tuần</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendH3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountH3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseH3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinH3Week']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tháng</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendH3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountH3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseH3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinH3Month']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="lo">
                            <div class="row">
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số ngày</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendLODay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountLODay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseLODay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinLODay']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tuần</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendLOWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountLOWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseLOWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinLOWeek']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title"><h6 class="title">Thông số tháng</h6></div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền chuyển</div>
                                                        <div class="count">{{ number_format($total['amountSendLOMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-wallet-out"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Tiền nhận</div>
                                                        <div class="count">{{ number_format($total['amountLOMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-wallet-in"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thua</div>
                                                        <div class="count">{{ number_format($total['turnLoseLOMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Lượt thắng</div>
                                                        <div class="count">{{ number_format($total['turnWinLOMonth']) }}</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="row g-gs">
                        <div class="col-md-12">
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <div class="card-head"><h6 class="title">Thông số Tiền chuyển - Tiền nhận 7 ngày gần nhất</h6></div>
                                    <div class="nk-ck-sm">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                                            <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
                                        </div>
                                        <canvas class="bar-chart chartjs-render-monitor" id="barChartStacked" style="display: block; height: 180px; width: 346px;" width="692" height="360"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    !(function (NioApp, $) {
        var barChartStacked = {
            labels: ["{{ $day['7'] }}", "{{ $day['6'] }}", "{{ $day['5'] }}", "{{ $day['4'] }}", "{{ $day['3'] }}", "{{ $day['2'] }}", "{{ $day['1'] }}"],
            stacked: !0,
            dataUnit: "VND",
            datasets: [
                { label: "Tiền nhận", color: "#b695ff", data: [{{ $moneyDay['7'] }}, {{ $moneyDay['6'] }}, {{ $moneyDay['5'] }}, {{ $moneyDay['4'] }}, {{ $moneyDay['3'] }}, {{ $moneyDay['2'] }}, {{ $moneyDay['1'] }}] },
                { label: "Tiền chuyển", color: "#f4aaa4", data: [{{ $receiveDay['7'] }}, {{ $receiveDay['6'] }}, {{ $receiveDay['5'] }}, {{ $receiveDay['4'] }}, {{ $receiveDay['3'] }}, {{ $receiveDay['2'] }}, {{ $receiveDay['1'] }}] },
            ],
        };
    function barChart(selector, set_data) {
        var $selector = $(selector || ".bar-chart");
            $selector.each(function () {
                for (
                    var $self = $(this),
                        _self_id = $self.attr("id"),
                        _get_data = void 0 === set_data ? eval(_self_id) : set_data,
                        _d_legend = void 0 !== _get_data.legend && _get_data.legend,
                        selectCanvas = document.getElementById(_self_id).getContext("2d"),
                        chart_data = [],
                        i = 0;
                    i < _get_data.datasets.length;
                    i++
                )
                    chart_data.push({
                        label: _get_data.datasets[i].label,
                        data: _get_data.datasets[i].data,
                        backgroundColor: _get_data.datasets[i].color,
                        borderWidth: 2,
                        borderColor: "transparent",
                        hoverBorderColor: "transparent",
                        borderSkipped: "bottom",
                        barPercentage: 0.6,
                        categoryPercentage: 0.7,
                    });
                var chart = new Chart(selectCanvas, {
                    type: "bar",
                    data: { labels: _get_data.labels, datasets: chart_data },
                    options: {
                        legend: { display: _get_data.legend || !1, rtl: NioApp.State.isRTL, labels: { boxWidth: 30, padding: 20, fontColor: "#6783b8" } },
                        maintainAspectRatio: !1,
                        tooltips: {
                            enabled: !0,
                            rtl: NioApp.State.isRTL,
                            callbacks: {
                                title: function (a, t) {
                                    return t.datasets[a[0].datasetIndex].label;
                                },
                                label: function (a, t) {
                                    return t.datasets[a.datasetIndex].data[a.index] + " " + _get_data.dataUnit;
                                },
                            },
                            backgroundColor: "#eff6ff",
                            titleFontSize: 13,
                            titleFontColor: "#6783b8",
                            titleMarginBottom: 6,
                            bodyFontColor: "#9eaecf",
                            bodyFontSize: 12,
                            bodySpacing: 4,
                            yPadding: 10,
                            xPadding: 10,
                            footerMarginTop: 0,
                            displayColors: !1,
                        },
                        scales: {
                            yAxes: [
                                {
                                    display: !0,
                                    stacked: _get_data.stacked || !1,
                                    position: NioApp.State.isRTL ? "right" : "left",
                                    ticks: { beginAtZero: !0, fontSize: 12, fontColor: "#9eaecf" },
                                    gridLines: { color: NioApp.hexRGB("#526484", 0.2), tickMarkLength: 0, zeroLineColor: NioApp.hexRGB("#526484", 0.2) },
                                },
                            ],
                            xAxes: [
                                {
                                    display: !0,
                                    stacked: _get_data.stacked || !1,
                                    ticks: { fontSize: 12, fontColor: "#9eaecf", source: "auto", reverse: NioApp.State.isRTL },
                                    gridLines: { color: "transparent", tickMarkLength: 10, zeroLineColor: "transparent" },
                                },
                            ],
                        },
                    },
                });
            });
        }
        barChart();
    })(NioApp, jQuery);
</script>
@endsection