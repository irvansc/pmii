<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle')</title>
    <base href="/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/back/dist/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/back/dist/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/back/dist/vendor/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="/back/dist/vendor/amsify/amsify.suggestags.css">
    <!-- CSS for this page only -->
    <link rel="stylesheet" href="/back/dist/vendor/chart.js/Chart.min.css">
    <!-- End CSS  -->
    <link rel="stylesheet" href="/back/dist/vendor/ijabo/ijabo.min.css">
    <link rel="stylesheet" href="/back/dist/vendor/ijaboCropTool/ijaboCropTool.min.css">
    <link rel="stylesheet" href="/back/dist/assets/css/style.min.css">
    <link rel="stylesheet" href="/back/dist/assets/css/bootstrap-override.min.css">
    <link rel="stylesheet" id="theme-color" href="/back/dist/assets/css/dark.min.css">
    @stack('stylesheets')
    @livewireStyles()
</head>

<body>
    <div id="app">
        <div class="shadow-header"></div>
        @include('back.layouts.inc.header')
        @include('back.layouts.inc.navbar')

        <div class="main-content">
            <x-breadcrumb />
            <div class="content-wrapper">
                <div class="row same-height">
                    @yield('content')

                </div>
            </div>

        </div>

        <div class="settings">
            <div class="settings-icon-wrapper">
                <div class="settings-icon">
                    <i class="ti ti-settings"></i>
                </div>
            </div>
            <div class="settings-content">
                <ul>
                    <li class="fix-header">
                        <div class="fix-header-wrapper">
                            <div class="form-check form-switch lg">
                                <label class="form-check-label" for="settingsFixHeader">Fixed Header</label>
                                <input class="form-check-input toggle-settings" name="Header" type="checkbox"
                                    id="settingsFixHeader">
                            </div>

                        </div>
                    </li>
                    <li class="fix-footer">
                        <div class="fix-footer-wrapper">
                            <div class="form-check form-switch lg">
                                <label class="form-check-label" for="settingsFixFooter">Fixed Footer</label>
                                <input class="form-check-input toggle-settings" name="Footer" type="checkbox"
                                    id="settingsFixFooter">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="theme-switch">
                            <label for="">Theme Color</label>
                            <div>
                                <div class="form-check form-check-inline lg">
                                    <input class="form-check-input lg theme-color" type="radio" name="ThemeColor"
                                        id="light" value="light">
                                    <label class="form-check-label" for="light">Light</label>
                                </div>
                                <div class="form-check form-check-inline lg">
                                    <input class="form-check-input lg theme-color" type="radio" name="ThemeColor"
                                        id="dark" value="dark">
                                    <label class="form-check-label" for="dark">Dark</label>
                                </div>

                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="fix-footer-wrapper">
                            <div class="form-check form-switch lg">
                                <label class="form-check-label" for="settingsFixFooter">Collapse Sidebar</label>
                                <input class="form-check-input toggle-settings" name="Sidebar" type="checkbox"
                                    id="settingsFixFooter">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <footer>
            Copyright © 2022 &nbsp <a href="wkngproject.com" target="_blank" class="ml-1"> WK-PROJECT </a> <span> . All
                rights Reserved</span>
        </footer>
        <div class="overlay action-toggle">
        </div>
    </div>
    <script src="/back/dist/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/back/dist/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/back/dist/vendor/jquery/jquery.min.js"></script>
    <script src="/back/dist/vendor/ijabo/ijabo.min.js"></script>
    <script src="/back/dist/vendor/jquery-ui-1.13.2/jquery-ui.min.js"></script>
    <script src="/back/dist/vendor/amsify/jquery.amsify.suggestags.js"></script>
    <script src="/back/dist/vendor/ijaboCropTool/ijaboCropTool.min.js"></script>
    <script src="/back/dist/vendor/ijaboViewer/jquery.ijaboViewer.min.js"></script>
    <script src="/back/dist/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    @stack('scripts')
    @livewireScripts()
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js"></script>

    <script src="/back/dist/assets/js/pages/element-ui.min.js"></script>
    <!-- js for this page only -->
    <script src="/back/dist/vendor/chart.js/Chart.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    <script src="/back/dist/assets/js/pages/index.min.js"></script>
    <!-- ======= -->
    <script src="/back/dist/assets/js/main.min.js"></script>
    <script>
        Main.init()
    </script>
    <script>
        $('input[name="post_tags"]').amsifySuggestags({
        type: 'amsify'
    });
    </script>
</body>

</html>
