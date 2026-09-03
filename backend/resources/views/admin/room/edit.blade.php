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


                <form id="kt_ecommerce_add_category_form" action="{{ route('admin.room.update', $room) }}" method="POST"
                    class="form" data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/categories.html"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                    {{-- {{ $room->cover_image }} --}}

                                    <!--begin::Card body-->
                                    <div class="card-body text-center pt-0">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-empty image-input-outline mb-3"
                                            data-kt-image-input="true"
                                            style="background-image: url({{ asset(!empty(Storage::url($room->cover_image)) ? Storage::url($room->cover_image) : 'images/no_image.png') }})">
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
                                                <input type="hidden" name="avatar_remove" />
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
                            <!--end::کناری column-->
                        </div>

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
                                                placeholder="اتاق 123456" value="{{ old('name', $room->name) }}" />
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
                                                    placeholder="500,000" value="{{ old('price', $room->price) }}" />
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
                                                <input type="text" name="capacity" class="form-control mb-2"
                                                    placeholder="2" value="{{ old('capacity', $room->capacity) }}" />
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
                                                {{ old('description', $room->description) }}
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
                                <input type="hidden" name="old_gallery_images" id="old_gallery_images"
                                    value="{{ $room->gallery->pluck('id')->implode(',') }}">
                                <!-- پیش‌نمایش تصاویر -->
                                <div id="gallery-preview" class="d-flex flex-wrap gap-2 border p-2"
                                    style="min-height: 200px;">

                                    @foreach ($room->gallery as $image)
                                        <div class="position-relative gallery-item">
                                            <img src="{{ Storage::url($image->path) }}" width="100" height="100"
                                                class="rounded">

                                            <button type="button"
                                                class="btn btn-icon btn-circle btn-color-danger btn-active-color-danger w-25px h-25px bg-body shadow position-absolute top-0 end-0 remove-old-image"
                                                data-id="{{ $image->id }}" aria-label="حذف تصویر">
                                                <i class="bi bi-x fs-5"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                    <div id="new-gallery-preview" class="d-flex flex-wrap gap-2 mt-3">
                                    </div>
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
                                    <div class="mb-10 fv-row card card-flush mt-5 p-3">

                                        <label class="required form-label ms-10 mt-4">تخت </label>

                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::انتخاب2-->
                                            <select class="form-select mb-2" name="beds[]" data-control="select2"
                                                data-hide-search="true" data-placeholder="انتخاب "
                                                id="kt_ecommerce_add_category_status_select" multiple>
                                                @forelse ($beds as $bed)
                                                    <option value="{{ $bed->id }}"
                                                        {{ in_array($bed->id, old('beds', $room->beds->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                        {{ $bed->type }}
                                                    </option>
                                                @empty
                                                    <div class="alert alert-info">
                                                        امکان رفاهی‌ای تعریف نشده است.
                                                    </div>
                                                @endforelse

                                            </select>
                                            <!--end::انتخاب2-->
                                        </div>


                                        @error('beds.*')
                                            <span>
                                                <strong style="color: red; font-size: 10px">
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                        <!--end::Card body-->
                                    </div>
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
        // فعال‌سازی CKEditor روی textarea
        CKEDITOR.replace('description');
    </script>
    
    <script>
        // فعال‌سازی حذف تصاویر قبلی
        document.querySelectorAll('.remove-old-image').forEach(button => {
            button.addEventListener('click', function() {
                let id = this.dataset.id;
                // حذف از UI
                this.closest('.gallery-item').remove();
                // حذف id از input
                let input = document.getElementById('old_gallery_images');
                let ids = input.value ? input.value.split(',') : [];
                ids = ids.filter(item => item != id);
                input.value = ids.join(',');
            });
        });

        // مدیریت آپلود تصاویر جدید با امکان حذف قبل از ارسال
        const galleryInput = document.getElementById('galleryInput');
        const newPreview = document.getElementById('new-gallery-preview');
        // DataTransfer برای مدیریت دستی FileList
        let dt = new DataTransfer();

        function renderNewPreviews() {
            newPreview.innerHTML = '';
            Array.from(dt.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'position-relative gallery-item';
                    div.innerHTML = `
                        <img src="${e.target.result}" width="100" height="100" class="rounded">
                        <button type="button" class="btn btn-icon btn-circle btn-active-color-danger w-25px h-25px bg-body shadow position-absolute top-0 end-0 remove-new-image" data-index="${index}" aria-label="حذف تصویر">
                            <i class="bi bi-x fs-5"></i>
                        </button>
                        <span class="badge bg-success position-absolute top-0 start-0">جدید</span>
                    `;
                    newPreview.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
            attachRemoveNewHandlers();
        }

        // استفاده از delegation برای حذف تصاویر جدید
        newPreview.addEventListener('click', function(e) {
            const btn = e.target.closest('.remove-new-image');
            if (!btn) return;
            const idx = Number(btn.dataset.index);
            const newDt = new DataTransfer();
            Array.from(dt.files).forEach((f, i) => { if (i !== idx) newDt.items.add(f); });
            dt = newDt;
            galleryInput.files = dt.files;
            renderNewPreviews();
        });

        galleryInput.addEventListener('change', function() {
            // اضافه کردن فایل‌های انتخاب‌شده به DataTransfer (منتخب‌ها تجمعی می‌شوند)
            Array.from(this.files).forEach(file => dt.items.add(file));
            // همگام‌سازی input با DataTransfer
            this.files = dt.files;
            renderNewPreviews();
        });
    </script>
@endsection
