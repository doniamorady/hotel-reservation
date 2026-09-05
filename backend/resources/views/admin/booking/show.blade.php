@extends('admin.layouts.master')
@section('title', 'جزئیات رزرو')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">جزئیات رزرو</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.bookings.index') }}" class="text-muted text-hover-primary">رزروها</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">#{{ $booking->id }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card card-flush">
                    <div class="card-body">
                        <div class="row mb-8">
                            <div class="col-md-6 mb-6">
                                <div class="fw-bold text-muted mb-2">کاربر</div>
                                <div class="fs-5 fw-bolder">{{ $booking->user?->name ?? 'نامشخص' }}</div>
                            </div>
                            <div class="col-md-6 mb-6">
                                <div class="fw-bold text-muted mb-2">اتاق</div>
                                <div class="fs-5 fw-bolder">{{ $booking->room?->name ?? 'نامشخص' }}</div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <div class="fw-bold text-muted mb-2">تاریخ شروع</div>
                                <div>
                                    {{ \Illuminate\Support\Facades\Date::parse($booking->start_date)->translatedFormat('Y/m/d') }}
                                </div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <div class="fw-bold text-muted mb-2">تاریخ پایان</div>
                                <div>
                                    {{ \Illuminate\Support\Facades\Date::parse($booking->end_date)->translatedFormat('Y/m/d') }}
                                </div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <div class="fw-bold text-muted mb-2">تعداد مهمان‌ها</div>
                                <div>{{ $booking->num_guests }}</div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <div class="fw-bold text-muted mb-2">تعداد شب‌ها</div>
                                <div>{{ $booking->num_nights }}</div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <div class="fw-bold text-muted mb-2">وضعیت</div>
                                <div><span @class([
                                    'badge',
                                    'badge-light-success' => $booking->status === 'check_in',
                                    'badge-light-warning' => $booking->status === 'check_out',
                                    'badge-light-danger' => $booking->status === 'cancelled' || $booking->status === 'expired',
                                    'badge-light-primary' => $booking->status === 'pending',
                                ])>{{ $booking->status }}</span></div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <div class="fw-bold text-muted mb-2">صبحانه</div>
                                <div>{{ $booking->has_breakfast ? 'دارد' : 'ندارد' }}</div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <div class="fw-bold text-muted mb-2">قیمت هر صبحانه</div>
                                <div>{{ number_format($booking->breakfast_unit_price) }} تومان</div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <div class="fw-bold text-muted mb-2">قیمت اتاق</div>
                                <div>{{ number_format($booking->room_unit_price) }} تومان</div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <div class="fw-bold text-muted mb-2">جمع صبحانه</div>
                                <div>{{ number_format($booking->total_breakfast_price) }} تومان</div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <div class="fw-bold text-muted mb-2">جمع اتاق</div>
                                <div>{{ number_format($booking->total_room_price) }} تومان</div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <div class="fw-bold text-muted mb-2">جمع کل</div>
                                <div>{{ number_format($booking->total_price) }} تومان</div>
                            </div>
                        </div>

                        <div class="d-flex gap-3 flex-wrap">
                            @if (!$booking->has_breakfast)
                                <form action="{{ route('admin.bookings.add-breakfast', $booking) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">افزودن صبحانه</button>
                                </form>
                            @endif

                            <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm w-auto d-inline-block">
                                    @foreach (['pending', 'check_in', 'check_out', 'cancelled'] as $status)
                                        <option value="{{ $status }}"
                                            {{ $booking->status === $status ? 'selected' : '' }}>{{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">به‌روزرسانی وضعیت</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
