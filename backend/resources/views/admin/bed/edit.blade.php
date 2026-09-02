@extends('admin.layouts.master')
@section('title', 'ویرایش اتاق')

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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">ویرایش اتاق</h1>
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

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">اتاق</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">ویرایش اتاق</li>
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


                <form id="kt_ecommerce_add_category_form" action="{{ route('admin.bed.update', $bed) }}" method="POST"
                    class="form" data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/categories.html"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--begin::کناری column-->
                    <div class="row">
                     

                        <div class="col-12">
                            <!--begin::Main column-->
                            <div class="d-flex flex-column flex-row-fluid">
                                <!--begin::عمومی options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>عمومی</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Tags-->
                                            <label class="required form-label">نام تخت</label>
                                            <!--end::Tags-->
                                            <!--begin::Input-->
                                            <input type="text" name="type" class="form-control mb-2"
                                                placeholder="اتاق 123456" value="{{ old('type', $bed->type) }}" />
                                            <!--end::Input-->

                                            @error('type')
                                                <span>
                                                    <strong style="color: red; font-size: 10px">
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="d-flex w-100">
                                         
                                            <div class="mb-10 w-100 ms-5">
                                                <!--begin::Tags-->
                                                <label class="required form-label">ظرفیت اتاق</label>
                                                <!--end::Tags-->
                                                <!--begin::Input-->
                                                <input type="text" name="capacity" class="form-control mb-2"
                                                    placeholder="2" value="{{ old('capacity', $bed->capacity) }}" />
                                                <!--end::Input-->

                                                @error('capacity')
                                                    <span>
                                                        <strong style="color: red; font-size: 10px">
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                    
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::عمومی options-->

                            </div>
                            <!--end::Main column-->
                        </div>
                    </div>



                    <div class="d-flex justify-content-end mt-5">
                        <!--begin::Button-->
                        <a href="" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">انصراف</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">ذخیره تغییرات</span>
                            <span class="indicator-progress">لطفا صبر کنید...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
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
    <script>
        // فعال‌سازی CKEditor روی textarea
        CKEDITOR.replace('description');
    </script>



    <script>
        const galleryInput = document.getElementById('galleryInput');
        const galleryContainer = document.getElementById('galleryContainer');

        galleryInput.addEventListener('change', function() {
            Array.from(this.files).forEach(file => {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.className = 'col-12 col-md-6 col-lg-2 mb-5 gallery-item';
                    col.innerHTML = `
                    <div class="card card-bordered position-relative">
                        <div class="card-body p-3 text-center">
                            <img src="${e.target.result}" class="img-fluid rounded" style="max-height:200px; object-fit:cover;">
                        </div>
                    </div>
                `;
                    galleryContainer.appendChild(col);
                };
                reader.readAsDataURL(file);
            });

        });
    </script>


@endsection
