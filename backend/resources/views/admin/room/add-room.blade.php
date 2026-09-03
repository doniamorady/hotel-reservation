@extends('admin.layouts.master')
@section('title', 'ایجاد اتاق')

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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">افزودن اتاق</h1>
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
                        <li class="breadcrumb-item text-dark">افزودن اتاق</li>
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


                <form id="kt_ecommerce_add_category_form" action="{{ route('admin.room.store') }}" method="POST"
                    class="form" data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/categories.html"
                    enctype="multipart/form-data">
                    @csrf
                    <!--begin::کناری column-->
                    <div class="row">
                        <div class="col-4">

                            <div class="d-flex flex-column w-100 mb-7 me-lg-5">
                                <!--begin::Thumbnail settings-->
                                <div class="card card-flush py-4">

                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2> تصویر شاخص </h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body text-center pt-0">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-empty image-input-outline mb-3"
                                            data-kt-image-input="true"
                                            style="background-image: url({{ asset('images/no_image.png') }})">
                                            <!--begin::نمایش existing avatar-->
                                            <div class="image-input-wrapper w-150px h-150px"></div>
                                            <!--end::نمایش existing avatar-->
                                            <!--begin::Tags-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="تعویض آواتار">
                                                <!--begin::Icon-->
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--end::Icon-->
                                                <!--begin::Inputs-->
                                                <input type="file" name="cover_image" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="cover_image" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Tags-->
                                            <!--begin::انصراف-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="انصراف avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::انصراف-->
                                            <!--begin::حذف-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="حذف آواتار">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::حذف-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::توضیحات-->
                                        <div class="text-muted fs-7"> فقط فایل های تصویری *.png،
                                            *.jpg و *.webp.* , *.jpeg پذیرفته می شوند
                                        </div>
                                        <!--end::توضیحات-->

                                        @error('cover_image')
                                            <span>
                                                <strong style="color: red; font-size: 10px">
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!--end::Card body-->
                                </div>
                                <!--end::Thumbnail settings-->

                            </div>

                        </div>
                        <!--end::کناری column-->

                        <div class="col-8">
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
                                            <label class="required form-label">نام اتاق</label>
                                            <!--end::Tags-->
                                            <!--begin::Input-->
                                            <input type="text" name="name" class="form-control mb-2"
                                                placeholder="اتاق 123456" value="{{ old('name') }}" />
                                            <!--end::Input-->

                                            @error('name')
                                                <span>
                                                    <strong style="color: red; font-size: 10px">
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="d-flex w-100">
                                            <div class="mb-10 w-50 me-5">
                                                <!--begin::Tags-->
                                                <label class="required form-label">قیمت(به ازای هر شب)</label>
                                                <!--end::Tags-->
                                                <!--begin::Input-->
                                                <input type="text" name="price" class="form-control mb-2"
                                                    placeholder="500,000" value="{{ old('price') }}" />
                                                <!--end::Input-->

                                                @error('price')
                                                    <span>
                                                        <strong style="color: red; font-size: 10px">
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                                @enderror

                                            </div>
                                            <div class="mb-10 w-50 ms-5">
                                                <!--begin::Tags-->
                                                <label class="required form-label">ظرفیت(به ازای هر نفر)</label>
                                                <!--end::Tags-->
                                                <!--begin::Input-->
                                                <input type="number" name="capacity" class="form-control mb-2"
                                                    placeholder="2" value="{{ old('capacity') }}" />
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
                                        <div>
                                            <!--begin::Tags-->
                                            <label class="required form-label">توضیحات</label>
                                            <!--end::Tags-->
                                            <textarea id="description" name="description" class="mb-2 form-control" style="width: 100%">
                                                {{ old('description') }}
                                            </textarea>

                                            @error('description')
                                                <span>
                                                    <strong style="color: red; font-size: 10px">
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::عمومی options-->

                            </div>
                            <!--end::Main column-->
                        </div>
                    </div>

                    <div class="d-flex">


                        {{-- gallery --}}
                        <div class="card card-flush p-4 mt-10 w-50">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>گالری تصاویر اتاق</h2>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column gap-3">
                                <!-- input فایل -->
                                <input type="file" id="galleryInput" name="gallery_images[]" class="form-control"
                                    multiple accept=".png,.jpg,.jpeg,.webp">
                                <div class="text-muted fs-7">
                                    می‌توانید چند تصویر انتخاب کنید.
                                </div>

                                <!-- پیش‌نمایش تصاویر -->
                                <div id="gallery-preview" class="d-flex flex-wrap gap-2 border p-2"
                                    style="min-height: 200px;">
                                    <!-- تصاویر اینجا رندر می‌شوند -->
                                </div>
                            </div>
                        </div>

                        {{-- number of beds --}}
                        <div class="card card-flush p-4 mt-10 w-50">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>تعداد تخت</h2>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="card-body pt-0">
                                        <select class="form-select mb-2" name="beds[]" data-control="select2"
                                            data-hide-search="true" data-placeholder="انتخاب"
                                            id="kt_ecommerce_add_category_status_select" multiple>

                                            @foreach ($beds as $bed)
                                                <option value="{{ $bed->id }}"
                                                    {{ in_array($bed->id, old('beds', [])) ? 'selected' : '' }}>

                                                    {{ $bed->type }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('beds')
                                            <span>
                                                <strong style="color: red; font-size: 10px">
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                    @if (count($beds) === 0)
                                        <div class="alert alert-info">
                                            تختی تعریف نشده است. لطفاً ابتدا تخت‌ها را در بخش مدیریت تخت‌ها اضافه کنید.
                                        </div>
                                    @endif
                                </div>
                            </div>
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
        CKEDITOR.replace('description');
    </script>


    <script>
        let selectedGalleryFiles = [];

        const galleryInput = document.getElementById('galleryInput');
        const form = document.getElementById('kt_ecommerce_add_category_form');

        // وقتی فایل جدید انتخاب میشه
        galleryInput.addEventListener('change', function(e) {
            const newFiles = Array.from(e.target.files);

            newFiles.forEach(file => {
                if (!file.type.startsWith('image/')) return;

                // جلوگیری از تکراری شدن فایل
                const exists = selectedGalleryFiles.some(
                    f => f.name === file.name && f.size === file.size
                );

                if (!exists) {
                    selectedGalleryFiles.push(file);
                }
            });

            renderGalleryPreview();

            // پاک کردن input تا دوباره بتونه همون فایل رو انتخاب کنه
            galleryInput.value = '';
        });

        // پیش‌نمایش تصاویر
        function renderGalleryPreview() {
            const preview = document.getElementById('gallery-preview');
            preview.innerHTML = '';

            selectedGalleryFiles.forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.className = 'col-12 col-md-6 col-lg-2 mb-5';

                    col.innerHTML = `
                    <div class="card card-bordered position-relative">
                        <div class="card-body p-3">
                            <img src="${e.target.result}"
                                 class="img-fluid rounded"
                                 style="max-height:200px; object-fit:cover;">
                            <button type="button"
                                    class="btn btn-icon btn-sm btn-danger position-absolute top-0 end-0 m-2"
                                    onclick="removeGalleryImage(${index})">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    </div>
                `;

                    preview.appendChild(col);
                };

                reader.readAsDataURL(file);
            });
        }

        // حذف عکس از لیست و بازسازی پیش‌نمایش
        function removeGalleryImage(index) {
            selectedGalleryFiles.splice(index, 1);
            renderGalleryPreview();
        }

        // قبل از ارسال فرم، فایل‌ها رو به input اضافه کن
        form.addEventListener('submit', function(e) {
            const dataTransfer = new DataTransfer();

            selectedGalleryFiles.forEach(file => {
                dataTransfer.items.add(file);
            });

            galleryInput.files = dataTransfer.files; // همه فایل‌ها اضافه شدن
        });
    </script>

@endsection
