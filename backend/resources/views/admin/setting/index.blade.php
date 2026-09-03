@extends('admin.layouts.master')
@section('title', 'تنظیمات')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">تنظیمات وب‌سایت</h1>
            </div>
        </div>
    </div>

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <form action="{{ route('admin.setting.update') }}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>تنظیمات عمومی</h2>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mb-10">
                            <label class="form-label required">قیمت واحد صبحانه</label>
                            <input type="text" name="breakfast_unit_price" class="form-control" value="{{ old('breakfast_unit_price', $settings->breakfast_unit_price) }}">
                            @error('breakfast_unit_price')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-10">
                            <label class="form-label required">حداکثر شب‌ها</label>
                            <input type="number" name="max_nights" class="form-control" value="{{ old('max_nights', $settings->max_nights) }}">
                            @error('max_nights')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-10">
                            <label class="form-label required">حداکثر مهمانان</label>
                            <input type="number" name="max_guests" class="form-control" value="{{ old('max_guests', $settings->max_guests) }}">
                            @error('max_guests')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary">ذخیره تنظیمات</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
