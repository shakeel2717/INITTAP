<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ env('APP_DESC') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-set/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/chart.js/dist/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">
    <script src="./assets/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js"></script>
    <header id="header"
        class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
        <div class="navbar-nav-wrap">
            <div class="navbar-brand-wrapper">
                <!-- Logo -->
                <a class="navbar-brand" href="./index.html" aria-label="Front">
                    <img class="navbar-brand-logo" src="{{ asset('assets/img/brand/logo-dark.svg') }}" alt="Logo">
                    <img class="navbar-brand-logo-mini" src="{{ asset('assets/img/brand/favi.svg') }}" alt="Logo">
                </a>
                <!-- End Logo -->
            </div>

            <div class="navbar-nav-wrap-content-left">
                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
                    <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip"
                        data-placement="right" title="Collapse"></i>
                    <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                        data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                        data-toggle="tooltip" data-placement="right" title="Expand"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->
            </div>

            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-content-right">
                <!-- Navbar -->
                <ul class="navbar-nav align-items-center flex-row">
                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- Notification -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                                href="javascript:;" data-hs-unfold-options='{
                       "target": "#notificationDropdown",
                       "type": "css-animation"
                     }'>
                                <i class="tio-notifications-on-outlined"></i>
                                <span class="btn-status btn-sm-status btn-status-success"></span>
                            </a>

                            <div id="notificationDropdown"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu"
                                style="width: 25rem;">
                                <!-- Header -->
                                <div class="card-header">
                                    <span class="card-title h4">Notifications</span>
                                </div>
                                <!-- End Header -->

                                <!-- Body -->
                                <div class="card-body-height">
                                    <!-- Tab Content -->
                                    <div class="tab-content" id="notificationTabContent">
                                        <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel"
                                            aria-labelledby="notificationNavOne-tab">
                                        </div>
                                    </div>
                                    <!-- End Tab Content -->
                                </div>
                                <!-- End Body -->

                                <!-- Card Footer -->
                                <a class="card-footer text-center" href="#">
                                    View all notifications
                                    <i class="tio-chevron-right"></i>
                                </a>
                                <!-- End Card Footer -->
                            </div>
                        </div>
                        <!-- End Notification -->
                    </li>

                    <li class="nav-item">
                        <!-- Account -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;"
                                data-hs-unfold-options='{
                       "target": "#accountNavbarDropdown",
                       "type": "css-animation"
                     }'>
                                <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img" src="{{ asset('assets/img/160x160/img1.jpg') }}"
                                        alt="Image Description">
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <div id="accountNavbarDropdown"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account"
                                style="width: 16rem;">
                                <div class="dropdown-item-text">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm avatar-circle mr-2">
                                            <img class="avatar-img" src="{{ asset('assets/img/160x160/img1.jpg') }}"
                                                alt="Image Description">
                                        </div>
                                        <div class="media-body">
                                            <span class="card-title h5">{{ Auth::user()->name }}</span>
                                            <span class="card-text">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#">
                                    <span class="text-truncate pr-2" title="Profile &amp; account">Profile &amp;
                                        account</span>
                                </a>

                                <a class="dropdown-item" href="#">
                                    <span class="text-truncate pr-2" title="Settings">Settings</span>
                                </a>

                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sign out</button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <aside
        class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">
                <div class="navbar-brand-wrapper justify-content-between">
                    <a class="navbar-brand" href="./index.html" aria-label="Front">
                        <img class="navbar-brand-logo" src="{{ asset('assets/img/brand/logo-dark.svg') }}" alt="Logo">
                        <img class="navbar-brand-logo-mini" src="{{ asset('assets/img/brand/favi.svg') }}" alt="Logo">
                    </a>
                    <button type="button"
                        class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>
                <div class="navbar-vertical-content">
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <li class="nav-item">
                            <small class="nav-subtitle" title="Layouts">Overview</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link " href="" title="Layouts"
                                data-placement="left">
                                <i class="tio-dashboard-vs-outlined nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Content -->

                <!-- Footer -->
                <div class="navbar-vertical-footer">
                    <ul class="navbar-vertical-footer-list">
                        <li class="navbar-vertical-footer-list-item">
                            <!-- Unfold -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                                    href="javascript:;" data-hs-unfold-options='{
                                        "target": "#styleSwitcherDropdown",
                                        "type": "css-animation",
                                        "animationIn": "fadeInRight",
                                        "animationOut": "fadeOutRight",
                                        "hasOverlay": true,
                                        "smartPositionOff": true
                                    }'>
                                    <i class="tio-tune"></i>
                                </a>
                            </div>
                            <!-- End Unfold -->
                        </li>
                    </ul>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </aside>



    <!-- End Navbar Vertical -->

    <main id="content" role="main" class="main pointer-event">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <h1 class="page-header-title">Dashboard</h1>
                    </div>

                    <div class="col-sm-auto">
                        <a class="btn btn-primary" href="javascript:;" data-toggle="modal"
                            data-target="#inviteUserModal">
                            <i class="tio-user mr-1"></i> Manage Profile
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="footer">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <p class="font-size-sm mb-0">&copy; {{ env('APP_NAME') }}. <span class="d-none d-sm-inline-block">{{ date('Y') }}
                                {{ env('APP_DESC') }}.</span></p>
                    </div>
                </div>
            </div>
            <!-- End Footer -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== SECONDARY CONTENTS ========== -->
    <!-- Keyboard Shortcuts -->
    <div id="keyboardShortcutsSidebar" class="hs-unfold-content sidebar sidebar-bordered sidebar-box-shadow">
        <div class="card card-lg sidebar-card">
            <div class="card-header">
                <h4 class="card-header-title">Keyboard shortcuts</h4>

                <!-- Toggle Button -->
                <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-ghost-dark ml-2" href="javascript:;"
                    data-hs-unfold-options='{
                "target": "#keyboardShortcutsSidebar",
                "type": "css-animation",
                "animationIn": "fadeInRight",
                "animationOut": "fadeOutRight",
                "hasOverlay": true,
                "smartPositionOff": true
               }'>
                    <i class="tio-clear tio-lg"></i>
                </a>
                <!-- End Toggle Button -->
            </div>

            <!-- Body -->
            <div class="card-body sidebar-body sidebar-scrollbar">
                <div class="list-group list-group-sm list-group-flush list-group-no-gutters mb-5">
                    <div class="list-group-item">
                        <h5 class="mb-1">Formatting</h5>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="font-weight-bold">Bold</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">b</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <em>italic</em>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">i</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <u>Underline</u>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">u</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <s>Strikethrough</s>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">Alt</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">s</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="small">Small text</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">s</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <mark>Highlight</mark>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">e</kbd>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group list-group-sm list-group-flush list-group-no-gutters mb-5">
                    <div class="list-group-item">
                        <h5 class="mb-1">Insert</h5>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Mention person <a href="#">(@Brian)</a></span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">@</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Link to doc <a href="#">(+Meeting notes)</a></span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">+</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <a href="#">#hashtag</a>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">#hashtag</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Date</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">/date</kbd>
                                <kbd class="d-inline-block mb-1">Space</kbd>
                                <kbd class="d-inline-block mb-1">/datetime</kbd>
                                <kbd class="d-inline-block mb-1">/datetime</kbd>
                                <kbd class="d-inline-block mb-1">Space</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Time</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">/time</kbd>
                                <kbd class="d-inline-block mb-1">Space</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Note box</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">/note</kbd>
                                <kbd class="d-inline-block mb-1">Enter</kbd>
                                <kbd class="d-inline-block mb-1">/note red</kbd>
                                <kbd class="d-inline-block mb-1">/note red</kbd>
                                <kbd class="d-inline-block mb-1">Enter</kbd>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group list-group-sm list-group-flush list-group-no-gutters mb-5">
                    <div class="list-group-item">
                        <h5 class="mb-1">Editing</h5>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Find and replace</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">r</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Find next</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">n</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Find previous</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">p</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Indent</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Tab</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Un-indent</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Shift</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">Tab</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Move line up</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">Shift</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1"><i class="tio-arrow-large-upward-outlined"></i></kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Move line down</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">Shift</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1"><i
                                        class="tio-arrow-large-downward-outlined font-size-sm"></i></kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Add a comment</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">Alt</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">m</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Undo</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">z</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Redo</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">y</kbd>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group list-group-sm list-group-flush list-group-no-gutters">
                    <div class="list-group-item">
                        <h5 class="mb-1">Application</h5>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Create new doc</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">Alt</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">n</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Present</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">Shift</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">p</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Share</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">Shift</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">s</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Search docs</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">Shift</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">o</kbd>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span>Keyboard shortcuts</span>
                            </div>
                            <div class="col-7 text-right">
                                <kbd class="d-inline-block mb-1">Ctrl</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">Shift</kbd> <small class="text-muted">+</small>
                                <kbd class="d-inline-block mb-1">/</kbd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Body -->
        </div>
    </div>
    <!-- End Keyboard Shortcuts -->
    <!-- Welcome Message Modal -->
    <div class="modal fade" id="welcomeMessageModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-close">
                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal"
                        aria-label="Close">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body p-sm-5">
                    <div class="text-center">
                        <div class="w-75 w-sm-50 mx-auto mb-4">
                            <img class="img-fluid" src="./assets/svg/illustrations/graphs.svg"
                                alt="Image Description">
                        </div>

                        <h4 class="h1">Welcome to Front</h4>

                        <p>We're happy to see you in our community.</p>
                    </div>
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="modal-footer d-block text-center py-sm-5">
                    <small class="text-cap mb-4">Trusted by the world's best teams</small>

                    <div class="w-85 mx-auto">
                        <div class="row justify-content-between">
                            <div class="col">
                                <img class="img-fluid ie-welcome-brands" src="./assets/svg/brands/gitlab-gray.svg"
                                    alt="Image Description">
                            </div>
                            <div class="col">
                                <img class="img-fluid ie-welcome-brands" src="./assets/svg/brands/fitbit-gray.svg"
                                    alt="Image Description">
                            </div>
                            <div class="col">
                                <img class="img-fluid ie-welcome-brands" src="./assets/svg/brands/flow-xo-gray.svg"
                                    alt="Image Description">
                            </div>
                            <div class="col">
                                <img class="img-fluid ie-welcome-brands" src="./assets/svg/brands/layar-gray.svg"
                                    alt="Image Description">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </div>
    <!-- End Welcome Message Modal -->

    <!-- Create a new user Modal -->
    <div class="modal fade" id="inviteUserModal" tabindex="-1" role="dialog" aria-labelledby="inviteUserModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h4 id="inviteUserModalTitle" class="modal-title">Invite users</h4>

                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal"
                        aria-label="Close">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <!-- Form Group -->
                    <div class="form-group">
                        <div class="input-group input-group-merge mb-2 mb-sm-0">
                            <div class="input-group-prepend" id="fullName">
                                <span class="input-group-text">
                                    <i class="tio-search"></i>
                                </span>
                            </div>

                            <input type="text" class="form-control" name="fullName"
                                placeholder="Search name or emails" aria-label="Search name or emails"
                                aria-describedby="fullName">

                            <div class="input-group-append input-group-append-last-sm-down-none">
                                <!-- Select -->
                                <div id="permissionSelect" class="select2-custom select2-custom-right">
                                    <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                        data-hs-select2-options='{
                              "dropdownParent": "#permissionSelect",
                              "minimumResultsForSearch": "Infinity",
                              "dropdownAutoWidth": true,
                              "dropdownWidth": "11rem"
                            }'>
                                        <option value="guest" selected>Guest</option>
                                        <option value="can edit">Can edit</option>
                                        <option value="can comment">Can comment</option>
                                        <option value="full access">Full access</option>
                                    </select>
                                </div>
                                <!-- End Select -->

                                <a class="btn btn-primary d-none d-sm-block" href="javascript:;">Invite</a>
                            </div>
                        </div>

                        <a class="btn btn-block btn-primary d-sm-none" href="javascript:;">Invite</a>
                    </div>
                    <!-- End Form Group -->

                    <div class="form-row">
                        <h5 class="col modal-title">Invite users</h5>

                        <div class="col-auto">
                            <a class="d-flex align-items-center font-size-sm text-body" href="#">
                                <img class="avatar avatar-xss mr-2" src="./assets/svg/brands/gmail.svg"
                                    alt="Image Description">
                                Import contacts
                            </a>
                        </div>
                    </div>

                    <hr class="mt-2">

                    <ul class="list-unstyled list-unstyled-py-4">
                        <!-- List Group Item -->
                        <li>
                            <div class="media">
                                <div class="avatar avatar-sm avatar-circle mr-3">
                                    <img class="avatar-img" src="./assets/img/160x160/img10.jpg"
                                        alt="Image Description">
                                </div>

                                <div class="media-body">
                                    <div class="row align-items-center">
                                        <div class="col-sm">
                                            <h5 class="text-body mb-0">Amanda Harvey <i
                                                    class="tio-verified text-primary" data-toggle="tooltip"
                                                    data-placement="top" title="Top endorsed"></i></h5>
                                            <span class="d-block font-size-sm">amanda@example.com</span>
                                        </div>

                                        <div class="col-sm">
                                            <!-- Select -->
                                            <div id="inviteUserSelect1"
                                                class="select2-custom select2-custom-sm-right d-sm-flex justify-content-sm-end">
                                                <select class="js-select2-custom custom-select-sm" size="1"
                                                    style="opacity: 0;" data-hs-select2-options='{
                                    "dropdownParent": "#inviteUserSelect1",
                                    "minimumResultsForSearch": "Infinity",
                                    "customClass": "custom-select custom-select-sm custom-select-borderless pl-0",
                                    "dropdownAutoWidth": true,
                                    "width": true
                                  }'>
                                                    <option value="guest" selected>Guest</option>
                                                    <option value="can edit">Can edit</option>
                                                    <option value="can comment">Can comment</option>
                                                    <option value="full access">Full access</option>
                                                    <option value="remove"
                                                        data-option-template='<span class="text-danger">Remove</span>'>
                                                        Remove</option>
                                                </select>
                                            </div>
                                            <!-- End Select -->
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </li>
                        <!-- End List Group Item -->

                        <!-- List Group Item -->
                        <li>
                            <div class="media">
                                <div class="avatar avatar-sm avatar-circle mr-3">
                                    <img class="avatar-img" src="./assets/img/160x160/img3.jpg"
                                        alt="Image Description">
                                </div>

                                <div class="media-body">
                                    <div class="row align-items-center">
                                        <div class="col-sm">
                                            <h5 class="text-body mb-0">David Harrison</h5>
                                            <span class="d-block font-size-sm">david@example.com</span>
                                        </div>

                                        <div class="col-sm">
                                            <!-- Select -->
                                            <div id="inviteUserSelect2"
                                                class="select2-custom select2-custom-sm-right d-sm-flex justify-content-sm-end">
                                                <select class="js-select2-custom custom-select-sm" size="1"
                                                    style="opacity: 0;" data-hs-select2-options='{
                                    "dropdownParent": "#inviteUserSelect2",
                                    "minimumResultsForSearch": "Infinity",
                                    "customClass": "custom-select custom-select-sm custom-select-borderless pl-0",
                                    "dropdownAutoWidth": true,
                                    "width": true
                                  }'>
                                                    <option value="guest" selected>Guest</option>
                                                    <option value="can edit">Can edit</option>
                                                    <option value="can comment">Can comment</option>
                                                    <option value="full access">Full access</option>
                                                    <option value="remove"
                                                        data-option-template='<span class="text-danger">Remove</span>'>
                                                        Remove</option>
                                                </select>
                                            </div>
                                            <!-- End Select -->
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </li>
                        <!-- End List Group Item -->

                        <!-- List Group Item -->
                        <li>
                            <div class="media">
                                <div class="avatar avatar-sm avatar-circle mr-3">
                                    <img class="avatar-img" src="./assets/img/160x160/img9.jpg"
                                        alt="Image Description">
                                </div>

                                <div class="media-body">
                                    <div class="row align-items-center">
                                        <div class="col-sm">
                                            <h5 class="text-body mb-0">Ella Lauda <i class="tio-verified text-primary"
                                                    data-toggle="tooltip" data-placement="top" title="Top endorsed"></i>
                                            </h5>
                                            <span class="d-block font-size-sm">Markvt@example.com</span>
                                        </div>

                                        <div class="col-sm">
                                            <!-- Select -->
                                            <div id="inviteUserSelect4"
                                                class="select2-custom select2-custom-sm-right d-sm-flex justify-content-sm-end">
                                                <select class="js-select2-custom custom-select-sm" size="1"
                                                    style="opacity: 0;" data-hs-select2-options='{
                                    "dropdownParent": "#inviteUserSelect4",
                                    "minimumResultsForSearch": "Infinity",
                                    "customClass": "custom-select custom-select-sm custom-select-borderless pl-0",
                                    "dropdownAutoWidth": true,
                                    "width": true
                                  }'>
                                                    <option value="guest" selected>Guest</option>
                                                    <option value="can edit">Can edit</option>
                                                    <option value="can comment">Can comment</option>
                                                    <option value="full access">Full access</option>
                                                    <option value="remove"
                                                        data-option-template='<span class="text-danger">Remove</span>'>
                                                        Remove</option>
                                                </select>
                                            </div>
                                            <!-- End Select -->
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </li>
                        <!-- End List Group Item -->

                        <!-- List Group Item -->
                        <li>
                            <div class="media">
                                <div class="avatar avatar-sm avatar-soft-dark avatar-circle mr-3">
                                    <span class="avatar-initials">B</span>
                                </div>

                                <div class="media-body">
                                    <div class="row align-items-center">
                                        <div class="col-sm">
                                            <h5 class="text-body mb-0">Bob Dean</h5>
                                            <span class="d-block font-size-sm">bob@example.com</span>
                                        </div>

                                        <div class="col-sm">
                                            <!-- Select -->
                                            <div id="inviteUserSelect3"
                                                class="select2-custom select2-custom-sm-right d-sm-flex justify-content-sm-end">
                                                <select class="js-select2-custom custom-select-sm" size="1"
                                                    style="opacity: 0;" data-hs-select2-options='{
                                    "dropdownParent": "#inviteUserSelect3",
                                    "minimumResultsForSearch": "Infinity",
                                    "customClass": "custom-select custom-select-sm custom-select-borderless pl-0",
                                    "dropdownAutoWidth": true,
                                    "width": true
                                  }'>
                                                    <option value="guest" selected>Guest</option>
                                                    <option value="can edit">Can edit</option>
                                                    <option value="can comment">Can comment</option>
                                                    <option value="full access">Full access</option>
                                                    <option value="remove"
                                                        data-option-template='<span class="text-danger">Remove</span>'>
                                                        Remove</option>
                                                </select>
                                            </div>
                                            <!-- End Select -->
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </li>
                        <!-- End List Group Item -->
                    </ul>
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="modal-footer justify-content-start">
                    <div class="row align-items-center flex-grow-1 mx-n2">
                        <div class="col-sm-9 mb-2 mb-sm-0">
                            <input type="hidden" id="inviteUserPublicClipboard"
                                value="https://themes.getbootstrap.com/product/front-multipurpose-responsive-template/">

                            <p class="modal-footer-text">The public share <a href="#">link settings</a>
                                <i class="tio-help-outlined" data-toggle="tooltip" data-placement="top"
                                    title="The public share link allows people to view the project without giving access to full collaboration features."></i>
                            </p>
                        </div>

                        <div class="col-sm-3 text-sm-right">
                            <a class="js-clipboard btn btn-sm btn-white text-nowrap" href="javascript:;"
                                data-toggle="tooltip" data-placement="top" title="Copy to clipboard!"
                                data-hs-clipboard-options='{
                    "type": "tooltip",
                    "successText": "Copied!",
                    "contentTarget": "#inviteUserPublicClipboard",
                    "container": "#inviteUserModal"
                   }'>
                                <i class="tio-link mr-1"></i> Copy link</a>
                        </div>
                    </div>
                </div>
                <!-- End Footer -->
            </form>
        </div>
    </div>
    <!-- End Create a new user Modal -->
    <!-- ========== END SECONDARY CONTENTS ========== -->

    <!-- JS Global Compulsory  -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('assets/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-unfold/dist/hs-unfold.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-form-search/dist/hs-form-search.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js.extensions/chartjs-extensions.js') }}"></script>
    <script src="{{ asset('assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net.extensions/select/select.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/clipboard/dist/clipboard.min.js') }}"></script>


    <!-- JS Front -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // =======================================================


            // BUILDER TOGGLE INVOKER
            // =======================================================
            $('.js-navbar-vertical-aside-toggle-invoker').click(function() {
                $('.js-navbar-vertical-aside-toggle-invoker i').tooltip('hide');
            });




            // INITIALIZATION OF NAVBAR VERTICAL NAVIGATION
            // =======================================================
            var sidebar = $('.js-navbar-vertical-aside').hsSideNav();


            // INITIALIZATION OF TOOLTIP IN NAVBAR VERTICAL MENU
            // =======================================================
            $('.js-nav-tooltip-link').tooltip({
                boundary: 'window'
            })

            $(".js-nav-tooltip-link").on("show.bs.tooltip", function(e) {
                if (!$("body").hasClass("navbar-vertical-aside-mini-mode")) {
                    return false;
                }
            });


            // INITIALIZATION OF UNFOLD
            // =======================================================
            $('.js-hs-unfold-invoker').each(function() {
                var unfold = new HSUnfold($(this)).init();
            });


            // INITIALIZATION OF FORM SEARCH
            // =======================================================
            $('.js-form-search').each(function() {
                new HSFormSearch($(this)).init()
            });


            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function() {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });


            // INITIALIZATION OF CHARTJS
            // =======================================================
            Chart.plugins.unregister(ChartDataLabels);

            $('.js-chart').each(function() {
                $.HSCore.components.HSChartJS.init($(this));
            });

            var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));

            // CALL WHEN TAB IS CLICKED
            // =======================================================
            $('[data-toggle="chart-bar"]').click(function(e) {
                let keyDataset = $(e.currentTarget).attr('data-datasets')

                if (keyDataset === 'lastWeek') {
                    updatingChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27",
                        "Apr 28", "Apr 29", "Apr 30", "Apr 31"
                    ];
                    updatingChart.data.datasets = [{
                            "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                            "backgroundColor": "#377dff",
                            "hoverBackgroundColor": "#377dff",
                            "borderColor": "#377dff"
                        },
                        {
                            "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                            "backgroundColor": "#e7eaf3",
                            "borderColor": "#e7eaf3"
                        }
                    ];
                    updatingChart.update();
                } else {
                    updatingChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6",
                        "May 7", "May 8", "May 9", "May 10"
                    ];
                    updatingChart.data.datasets = [{
                            "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                            "backgroundColor": "#377dff",
                            "hoverBackgroundColor": "#377dff",
                            "borderColor": "#377dff"
                        },
                        {
                            "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                            "backgroundColor": "#e7eaf3",
                            "borderColor": "#e7eaf3"
                        }
                    ]
                    updatingChart.update();
                }
            })


            // INITIALIZATION OF BUBBLE CHARTJS WITH DATALABELS PLUGIN
            // =======================================================
            $('.js-chart-datalabels').each(function() {
                $.HSCore.components.HSChartJS.init($(this), {
                    plugins: [ChartDataLabels],
                    options: {
                        plugins: {
                            datalabels: {
                                anchor: function(context) {
                                    var value = context.dataset.data[context.dataIndex];
                                    return value.r < 20 ? 'end' : 'center';
                                },
                                align: function(context) {
                                    var value = context.dataset.data[context.dataIndex];
                                    return value.r < 20 ? 'end' : 'center';
                                },
                                color: function(context) {
                                    var value = context.dataset.data[context.dataIndex];
                                    return value.r < 20 ? context.dataset.backgroundColor :
                                        context.dataset.color;
                                },
                                font: function(context) {
                                    var value = context.dataset.data[context.dataIndex],
                                        fontSize = 25;

                                    if (value.r > 50) {
                                        fontSize = 35;
                                    }

                                    if (value.r > 70) {
                                        fontSize = 55;
                                    }

                                    return {
                                        weight: 'lighter',
                                        size: fontSize
                                    };
                                },
                                offset: 2,
                                padding: 0
                            }
                        }
                    },
                });
            });


            // INITIALIZATION OF DATERANGEPICKER
            // =======================================================
            $('.js-daterangepicker').daterangepicker();

            $('.js-daterangepicker-times').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });

            var start = moment();
            var end = moment();

            function cb(start, end) {
                $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format(
                    'MMM D') + ' - ' + end.format('MMM D, YYYY'));
            }

            $('#js-daterangepicker-predefined').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);


            // INITIALIZATION OF DATATABLES
            // =======================================================
            var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
                select: {
                    style: 'multi',
                    selector: 'td:first-child input[type="checkbox"]',
                    classMap: {
                        checkAll: '#datatableCheckAll',
                        counter: '#datatableCounter',
                        counterInfo: '#datatableCounterInfo'
                    }
                },
                language: {
                    zeroRecords: '<div class="text-center p-4">' +
                        '<img class="mb-3" src="./assets/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
                        '<p class="mb-0">No data to show</p>' +
                        '</div>'
                }
            });

            $('.js-datatable-filter').on('change', function() {
                var $this = $(this),
                    elVal = $this.val(),
                    targetColumnIndex = $this.data('target-column-index');

                datatable.column(targetColumnIndex).search(elVal).draw();
            });

            $('#datatableSearch').on('mouseup', function(e) {
                var $input = $(this),
                    oldValue = $input.val();

                if (oldValue == "") return;

                setTimeout(function() {
                    var newValue = $input.val();

                    if (newValue == "") {
                        // Gotcha
                        datatable.search('').draw();
                    }
                }, 1);
            });


            // INITIALIZATION OF CLIPBOARD
            // =======================================================
            $('.js-clipboard').each(function() {
                var clipboard = $.HSCore.components.HSClipboard.init(this);
            });
        });
    </script>

    <!-- IE Support -->
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write(
            '<script src="./assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
</body>

</html>
