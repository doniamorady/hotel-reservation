@extends('admin.layouts.master')
@section('title', 'ویرایش رزرو')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">ویرایش رزرو</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.bookings.index') }}" class="text-muted text-hover-primary">رزروها</a>
                        </li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-300 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-dark">ویرایش رزرو</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card card-flush">
                    <div class="card-body">
                        <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-6">
                                <div class="col-md-6">
                                    <label class="form-label">اتاق</label>
                                    <select name="room_id" class="form-select">
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}" {{ $booking->room_id == $room->id ? 'selected' : '' }}>
                                                {{ $room->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">تعداد مهمان</label>
                                    <input type="number" name="num_guests" class="form-control" value="{{ old('num_guests', $booking->num_guests) }}" min="1">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">تاریخ شروع</label>
                                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $booking->start_date) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">تاریخ پایان</label>
                                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $booking->end_date) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">وضعیت</label>
                                    <select name="status" class="form-select">
                                        @foreach(['pending','confirmed','checked_in','checked_out','cancelled'] as $status)
                                            <option value="{{ $status }}" {{ $booking->status === $status ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">صبحانه</label>
                                    <select name="has_breakfast" class="form-select">
                                        <option value="1" {{ old('has_breakfast', $booking->has_breakfast) ? 'selected' : '' }}>بله</option>
                                        <option value="0" {{ !old('has_breakfast', $booking->has_breakfast) ? 'selected' : '' }}>خیر</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-8 d-flex gap-3">
                                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                                <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-light">بازگشت</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
