<!DOCTYPE html>
<!--
نویسنده: ساتراس وب
محصولات نام: مترونیک - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin داشبورد Theme
خرید: https://1.envato.market/EA4JP
وب سایت: http://www.keenthemes.com
تماس با ما: support@keenthemes.com
دنبال کردن: www.twitter.com/keenthemes
دریبل: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
لاینسس شده: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html direction="rtl" dir="rtl" style="direction: rtl">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('admin-assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-dark">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::احراز هویت - ورود -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url({{ asset('images/14-dark.png') }})">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                        action="{{ route('admin.auth.login') }}" method="POST">
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <img alt="Logo" src={{ asset('images/logo.png') }} class="h-40px" />
                        </div>
                        <!--begin::Heading-->

                            @csrf

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Tags-->
                                <label class="form-label fs-6 fw-bolder text-dark">تلفن</label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    name="phone" autocomplete="off" value="{{ old('phone') }}" />
                                <!--end::Input-->
                                @error('phone')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Tags-->
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">کلمه عبور</label>
                                    <!--end::Tags-->
                                    <!--begin::Link-->
                                    {{-- <a href="../../demo1/dist/authentication/layouts/dark/password-reset.html"
                                    class="link-primary fs-6 fw-bolder">فراموشی رمز?</a>
                                    <!--end::Link--> --}}
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    name="password" autocomplete="off" />
                                <!--end::Input-->
                                @error('password')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::ثبت button-->
                                <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">ورود</span>
                                    <span class="indicator-progress">لطفا صبر کنید...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::ثبت button-->

                            </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->

        </div>
        <!--end::احراز هویت - ورود-->
    </div>
    <!--end::Root-->
    <!--end::Main-->


</body>
<!--end::Body-->

</html>
