@extends('admin.layouts.master')
@section('title', 'ویرایش کاربر')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">


        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">ویرایش کاربر </h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">خانه</a>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark"> کاربر </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">ویرایش کاربر </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->



        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">


                <form id="kt_ecommerce_add_category_form" action="{{ route('admin.user.update', $user) }}" method="POST"
                    class="form d-flex flex-column flex-lg-row"
                    data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/categories.html"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!--begin::کناری column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">

                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>پروفایل</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->


                            <!--begin::Card body-->
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <div class="image-input image-input-empty image-input-outline mb-3"
                                    data-kt-image-input="true"
                                    style="background-image: url({{ $user->avatar ? Storage::url($user->avatar) :  asset('images/no-photo.png') }})">
                                    <!--begin::نمایش existing avatar-->
                                    <div class="image-input-wrapper w-150px h-150px"></div>
                                    <!--end::نمایش existing avatar-->
                                    <!--begin::Tags-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعویض آواتار">
                                        <!--begin::Icon-->
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--end::Icon-->
                                        <!--begin::Inputs-->
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Tags-->
                                    <!--begin::انصراف-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="انصراف avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::انصراف-->
                                    <!--begin::حذف-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="حذف آواتار">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::حذف-->
                                </div>
                                <!--end::Image input-->

                                @error('avatar')
                                    <span>
                                        <strong style="color: red; font-size: 10px">
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>نقش</h2>
                                </div>

                            </div>

                            <div class="card-body pt-0">
                                <select class="form-select mb-2" name="roles[]" data-control="select2"
                                    data-hide-search="true" data-placeholder="انتخاب"
                                    id="kt_ecommerce_add_category_status_select" multiple>

                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                           {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            @error('roles')
                                <span>
                                    <strong style="color: red; font-size: 10px">
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                            <!--end::Card body-->
                        </div>
                    </div>


                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>عمومی</h2>
                                </div>
                            </div>


                            <!--begin:: first name  and last name -->
                            <div class="card-body pt-0 d-flex">

                                {{-- begin:: first name --}}
                                <div class="mb-10 fv-row w-50 ">
                                    <label class="required form-label"> نام</label>

                                    <input type="text" name="first_name" class="form-control mb-2" style="width: 90%"
                                        placeholder="نام " value="{{ old('first_name', $user->first_name) }}" />

                                    @error('first_name')
                                        <span>
                                            <strong style="color: red; font-size: 10px">
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror

                                </div>

                                {{-- begin:: last name --}}
                                <div class="mb-10 fv-row w-50">
                                    <label class="required form-label"> نام خانوادگی</label>

                                    <input type="text" name="last_name" class="form-control mb-2" style="width: 90%"
                                        placeholder="نام خانوادگی " value="{{ old('last_name', $user->last_name) }}" />

                                    @error('last_name')
                                        <span>
                                            <strong style="color: red; font-size: 10px">
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror

                                </div>

                            </div>

                            {{-- begin:: email and mobile --}}
                            <div class="card-body pt-0 d-flex">

                               

                                {{-- begin::mobile --}}

                                <div class="mb-10 fv-row w-50">
                                    <label class="required form-label"> شماره تلفن</label>

                                    <input type="text" name="phone" style="width: 90%" class="form-control mb-2"
                                        placeholder="شماره تلفن" value="{{ old('phone', $user->phone) }}" />

                                    @error('phone')
                                        <span>
                                            <strong style="color: red; font-size: 10px">
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror

                                </div>

                            </div>

                            <div class="alert alert-info ms-10 me-20" role="alert">
                                فقط درصورتی که میخواهید رمزعبور جدید بسازید قسمت زیر را تکمیل کنید!
                            </div>
                            {{-- begin:: password --}}
                            <div class="card-body pt-0">

                                <div class="mb-10 fv-row">
                                    <label class="required form-label"> رمز عبورجدید</label>

                                    <input type="password" name="password" style="width: 95%" class="form-control mb-2"
                                        placeholder="رمز عبور" />

                                    @error('password')
                                        <span>
                                            <strong style="color: red; font-size: 10px">
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror

                                </div>

                            </div>


                            {{-- begin:: Button --}}
                            <div class="d-flex justify-content-end">

                                <a href="{{ route('admin.user.index') }}" id="kt_ecommerce_add_product_cancel"
                                    class="btn btn-light me-5">انصراف</a>

                                <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                    <span class="indicator-label">ذخیره تغییرات</span>
                                    <span class="indicator-progress">لطفا صبر کنید...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>

                            </div>


                        </div>
                        <!--end::Main column-->
                </form>


            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection





@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
@endsection
