<!DOCTYPE html>

<html direction="rtl" dir="rtl" style="direction: rtl">

<head>

    @include('admin.layouts.head-tag')

    <title>@yield('title', 'عنوان صفحه')</title>

    @yield('head-tag')
    @livewireStyles()

</head>

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

    <div class="d-flex flex-column flex-root">

        <div class="page d-flex flex-row flex-column-fluid">

            @include('admin.layouts.aside')

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                @include('admin.layouts.header')

                @yield('content')

                @include('admin.layouts.footer')

            </div>
        </div>
    </div>



    @include('admin.layouts.scripts')
    @yield('script')


    <div class="toast-wrapper flex-row-reverse">
        @include('alerts.toast.error')
        @include('alerts.toast.success')
        @include('alerts.toast.update')
    </div>

    @include('alerts.sweetalert.error')
    @include('alerts.sweetalert.success')
    @include('alerts.sweetalert.delete-confirm')


    @livewireScripts()
</body>

</html>
