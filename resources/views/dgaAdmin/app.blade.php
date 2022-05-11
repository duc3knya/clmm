<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="Softnio" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/dgaAdmin/images/favicon.png" />
    <title>Dashboard - Hospital Manegment | DashLite Admin Template</title>
    <link rel="stylesheet" href="/dgaAdmin/assets/css/dashlite.css?ver=3.0.2" />
    <link id="skin-default" rel="stylesheet" href="/dgaAdmin/assets/css/theme.css?ver=3.0.2" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "UA-91615293-4");
    </script>
</head>

<body class="nk-body ui-rounder npc-default has-sidebar">
    <div class="nk-app-root">
        <div class="nk-sidebar" data-content="sidebarMenu">
            <div class="nk-sidebar-bar">
                <div class="nk-apps-brand">
                    <a href="/dgaAdmin/index.html" class="logo-link">
                        <img class="logo-light logo-img" src="/dgaAdmin/images/logo-small.png"
                            srcset="/dgaAdmin/images/logo-small2x.png 2x" alt="logo" />
                        <img class="logo-dark logo-img" src="/dgaAdmin/images/logo-dark-small.png"
                            srcset="/dgaAdmin/images/logo-dark-small2x.png 2x" alt="logo-dark" />
                    </a>
                </div>
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-body">
                        <div class="nk-sidebar-content" data-simplebar>
                            <div class="nk-sidebar-menu">
                                <ul class="nk-menu apps-menu">
                                    <li class="nk-menu-item active">
                                        <a href="#" class="nk-menu-link nk-menu-switch" data-target="navMain">
                                            <span class="nk-menu-icon"><em class="icon ni ni-home-alt"></em></span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="#" class="nk-menu-link nk-menu-switch" data-target="navMomo">
                                            <span class="nk-menu-icon"><em class="icon ni ni-mobile"></em></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nk-sidebar-footer">
                                <ul class="nk-menu nk-menu-md apps-menu">
                                    <li class="nk-menu-item">
                                        <a href="#" class="nk-menu-link" title="Settings">
                                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                            <a href="#" data-bs-toggle="dropdown" data-offset="50,-50">
                                <div class="user-avatar"><span>AB</span></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md ms-4">
                                <div class="dropdown-inner user-card-wrap d-none d-md-block">
                                    <div class="user-card">
                                        <div class="user-avatar"><span>AB</span></div>
                                        <div class="user-info"><span class="lead-text">Abu Bin
                                                Ishtiyak</span><span class="sub-text text-soft">info@softnio.com</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li>
                                            <a href="/dgaAdmin/user-profile.html"><em
                                                    class="icon ni ni-user-alt"></em><span>View Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="/dgaAdmin/user-profile.html"><em
                                                    class="icon ni ni-setting-alt"></em><span>Account Setting</span></a>
                                        </li>
                                        <li>
                                            <a href="/dgaAdmin/user-profile.html"><em
                                                    class="icon ni ni-activity-alt"></em><span>Login Activity</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li>
                                            <a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-sidebar-main is-light">
                <div class="nk-sidebar-inner" data-simplebar>
                    <div class="nk-menu-content menu-active" data-content="navMain">
                        <h5 class="title">{{ $setting->name }}</h5>
                        <ul class="nk-menu">
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.home') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span><span
                                        class="nk-menu-text">Trang chủ</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.setting') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-setting-fill"></em></span><span
                                        class="nk-menu-text">Cài đặt</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-menu-content" data-content="navMomo">
                        <h5 class="title">{{ $setting->name }}</h5>
                        <ul class="nk-menu">
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.addMomo') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-mobile"></em></span><span
                                        class="nk-menu-text">Thêm Momo</span>
                                </a>
                            </li>
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-original-title="" title="">
                                    <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span><span class="nk-menu-text">Lịch sử chơi</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="{{ route('admin.historyPlay', ['game' => 'CL']) }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Chẵn lẻ</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('admin.historyPlay', ['game' => 'CL2']) }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Chẵn lẻ 2</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('admin.historyPlay', ['game' => 'TX']) }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Tài xỉu</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('admin.historyPlay', ['game' => 'TX2']) }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Tài xỉu 2</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('admin.historyPlay', ['game' => '1P3']) }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">1 Phần 3</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('admin.historyPlay', ['game' => 'G3']) }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Gấp 3</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('admin.historyPlay', ['game' => 'H3']) }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">H3</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{ route('admin.historyPlay', ['game' => 'LO']) }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">LÔ</span></a>
                                    </li>
                                </ul>
                            </li>                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-main">
            <div class="nk-wrap">
                <div class="nk-header nk-header-fixed nk-header-fluid">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                                        class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="/dgaAdmin/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="/dgaAdmin/images/logo.png"
                                        srcset="/dgaAdmin/images/logo2x.png 2x" alt="logo" />
                                    <img class="logo-dark logo-img" src="/dgaAdmin/images/logo-dark.png"
                                        srcset="/dgaAdmin/images/logo-dark2x.png 2x" alt="logo-dark" />
                                </a>
                            </div>
                            <div class="nk-header-search ms-3 ms-xl-0"><em class="icon ni ni-search"></em><input
                                    type="text" class="form-control border-transparent form-focus-none"
                                    placeholder="Search anything" /></div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                            <div class="dropdown-head"><span
                                                    class="sub-title nk-dropdown-title">Notifications</span><a
                                                    href="#">Mark All as Read</a></div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon"><em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-foot center"><a href="#">View All</a></div>
                                        </div>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm"><em class="icon ni ni-user-alt"></em>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter">
                                                <div class="user-card">
                                                    <div class="user-avatar"><span>AB</span></div>
                                                    <div class="user-info"><span class="lead-text">Abu Bin
                                                            Ishtiyak</span><span
                                                            class="sub-text">info@softnio.com</span></div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="/dgaAdmin/hospital/user-profile.html"><em
                                                                class="icon ni ni-user-alt"></em><span>View
                                                                Profile</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="/dgaAdmin/hospital/settings.html"><em
                                                                class="icon ni ni-setting-alt"></em><span>Account
                                                                Setting</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="/dgaAdmin/hospital/settings-account-log.html"><em
                                                                class="icon ni ni-activity-alt"></em><span>Login
                                                                Activity</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="#"><em class="icon ni ni-signout"></em><span>Sign
                                                                out</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('main')
            </div>
        </div>
    </div>
    <script src="/dgaAdmin/assets/js/bundle.js?ver=3.0.2"></script>
    <script src="/dgaAdmin/assets/js/scripts.js?ver=3.0.2"></script>
    <script src="/dgaAdmin/assets/js/dunga.js?ver=3.0.2"></script>

    <link rel="stylesheet" href="/dgaAdmin/assets/css/editors/summernote.css?ver=3.0.2" />
    <script src="/dgaAdmin/assets/js/libs/editors/summernote.js?ver=3.0.2"></script>
    <script src="/dgaAdmin/assets/js/libs/datatable-btns.js?ver=3.0.2"></script>
    <script>
        $(document).ready(function() {
            $('.dga-edit').summernote();
        });
    </script>
    @yield('script')
</body>

</html>
