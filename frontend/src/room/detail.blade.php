@extends('site.layouts.master')

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('title', 'مشخصات اتاق')

@section('content')
    <!-- ============================ Hotel Details Start ================================== -->
    <section class="pt-3 gray-simple">
        <div class="container">
            <div class="row">

                <!-- Breadcrumb -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="text-primary">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-primary">جزئیات اتاق</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $room->name }}</li>
                        </ol>
                    </nav>
                </div>

                <!-- Gallery & Info -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card border-0 p-3 mb-4">

                        <div class="crd-heaader d-md-flex align-items-center justify-content-between mb-3">
                            <div class="crd-heaader-first">
                                <div class="d-block">
                                    <div class="d-inline-block me-2">
                                        <i class="fa fa-star text-warning text-xs"></i>
                                        <i class="fa fa-star text-warning text-xs"></i>
                                        <i class="fa fa-star text-warning text-xs"></i>
                                        <i class="fa fa-star text-warning text-xs"></i>
                                        <i class="fa fa-star text-warning text-xs"></i>
                                    </div>
                                </div>
                                <div class="d-inline-flex align-items-center mb-1">
                                    <span class="label bg-light-success text-success">سرویس نظافت روزانه</span>
                                </div>
                            </div>
                            <div class="crd-heaader-last my-md-0 my-2">
                                <div class="drix-wrap d-flex flex-column align-items-md-end align-items-start text-end">
                                    <div class="drix-first d-flex align-items-center text-end mb-2">
                                        <a href="{{ route('site.room.favorite-change', $room) }}"
                                            class="{{ $room->is_favorite == true ? 'bg-danger text-white' : 'bg-light-danger text-danger' }}  rounded-1 fw-medium text-sm px-3 py-2 lh-base"
                                            wire:click="favorite"><i
                                                class="{{ $room->is_favorite == true ? 'fas fa-heart  text-white' : 'far fa-heart text-danger' }}  ms-2"></i>

                                            {{ $room->is_favorite == true ? ' حذف از علاقه‌مندی' : '  افزودن به علاقه' }}

                                        </a>

                                    </div>
                                    <div class="drix-last">
                                        <span class="label bg-light-success text-success">
                                            امکان استرداد وجه تا 1 ساعت بعد از رزرو
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="crd-body">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-xl-8 col-lg-7 col-md-12">
                                    <div class="galleryGrid typeGrid_2 mb-lg-0 mb-3">
                                        <div class="galleryGrid__item relative d-flex">
                                            <a href="assets/img/hotel/hotel-3.jpg" data-lightbox="roadtrip">
                                                <img src="{{ asset($room->cover_image) }}" alt="image"
                                                    class="rounded-2 img-fluid"></a>
                                        </div>


                                        {{-- {{ $gallery}} --}}
                                        @if ($gallery->count() > 0)
                                            <div class="galleryGrid__item position-relative">
                                                <a href="assets/img/hotel/hotel-7.jpg" data-lightbox="roadtrip">
                                                    <img src="{{ asset($gallery[0]->path) }}" alt="image"
                                                        class="rounded-2 img-fluid">
                                                </a>
                                                <div class="position-absolute start-0 bottom-0 mb-3 ms-3">
                                                    <a href="assets/img/hotel/hotel-1.jpg" data-lightbox="roadtrip"
                                                        class="btn btn-md btn-whites fw-medium text-dark"><i
                                                            class="fa-solid fa-caret-left ms-1"></i>{{ $gallery->count() }}
                                                        تصویر</a>
                                                </div>
                                            </div>
                                            @if ($gallery->count() >= 2)
                                                <div class="galleryGrid__item">
                                                    <a href="assets/img/hotel/hotel-6.jpg" data-lightbox="roadtrip">
                                                        <img src="{{ asset($gallery[1]->path) }}"
                                                            class="rounded-2 img-fluid">
                                                    </a>
                                                </div>
                                            @endif
                                            @if ($gallery->count() >= 3)
                                                <div class="galleryGrid__item">
                                                    <a href="assets/img/hotel/hotel-8.jpg" data-lightbox="roadtrip">
                                                        <img src="{{ asset($gallery[2]->path) }}"
                                                            class="rounded-2 img-fluid">
                                                    </a>
                                                </div>
                                            @endif

                                        @endif


                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-5 col-md-12">
                                    <div class="card border br-dashed">


                                        <div class="card-body">

                                            <div class="d-block">

                                                <form action="{{ route('site.reserve.show-prepare-booking', $room) }}" method="get">

                                                    <div class="form-group mb-3">
                                                        <label for="check_in_view" class="required form-label">تاریخ شروع
                                                            اقامت</label>

                                                        <div class="inputIicon">
                                                            <div class="myIcon">

                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    class="fill-primary" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3"
                                                                        d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" />
                                                                    <path
                                                                        d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" />
                                                                    <path
                                                                        d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" />
                                                                </svg>
                                                            </div>
                                                            <div class="input-box">
                                                                <input type="text" name="check_in" id="check_in"
                                                                    class="form-control form-control-sm d-none mb-2">

                                                                <input type="text" id="check_in_view"
                                                                    class="form-control form-control-sm mb-2"
                                                                    value="{{ old('check_in') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group mb-3">
                                                        <label for="check_out_view" class="required form-label">تاریخ پایان
                                                            اقامت</label>

                                                        <div class="inputIicon">
                                                            <div class="myIcon">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    class="fill-primary"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3"
                                                                        d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" />
                                                                    <path
                                                                        d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" />
                                                                    <path
                                                                        d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" />
                                                                </svg>
                                                            </div>
                                                            <div class="input-box">
                                                                <input type="text" name="check_out" id="check_out"
                                                                    class="form-control form-control-sm d-none mb-2">
                                                                <input type="text" id="check_out_view"
                                                                    class="form-control form-control-sm mb-2"
                                                                    value="{{ old('check_out') }}">
                                                            </div>
                                                        </div>
                                                        <span class="bolder text-danger pe-2"
                                                            style="font-size: 11px; font-weight:bold">حداکثر زمان
                                                            اقامت 10 روز میباشد</span>
                                                    </div> --}}



                                                    <div class="form-group mb-3">
                                                        <label for="check_out_view" class="required form-label">
                                                            مدت زمان اقامت
                                                        </label>

                                                        <div class="inputIicon">
                                                            <div class="myIcon">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    class="fill-primary"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3"
                                                                        d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" />
                                                                    <path
                                                                        d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" />
                                                                    <path
                                                                        d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" />
                                                                </svg>
                                                            </div>
                                                            <div class="input-box">
                                                                <select class="form-select mb-2" name="check_out"
                                                                    data-control="select2" data-hide-search="true"
                                                                    id="kt_ecommerce_add_category_status_select">

                                                                    <option value="1">1 شب </option>
                                                                    <option value="2">2 شب</option>
                                                                    <option value="3">3 شب</option>
                                                                    <option value="4">4 شب</option>
                                                                    <option value="5">5 شب</option>
                                                                    <option value="6">6 شب</option>
                                                                    <option value="7">7 شب</option>
                                                                    <option value="8">8 شب</option>
                                                                    <option value="9">9 شب</option>
                                                                    <option value="10">10 شب</option>


                                                                </select>
                                                            </div>
                                                        </div>

                                                        <span class="bolder text-danger pe-2"
                                                            style="font-size: 10px; font-weight:bold">حداکثر مدت زمان
                                                            اقامت 10 روز میباشد</span>
                                                    </div>




                                                    <div class="form-group mb-3 mt-5">

                                                        <div class="form-group mb-3">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div
                                                                    class="crd-heady102 d-flex align-items-center justify-content-start">
                                                                    <div
                                                                        class="square--30 circle bg-light-success text-success">
                                                                        <i class="fa-solid fa-percent"></i></div>
                                                                    <div class="crd-heady102Title lh-1 pe-2"><span
                                                                            class="text-sm text-dark lh-1 mb-0">
                                                                            هزینه نهایی :
                                                                         </span></div>
                                                                </div>
                                                                <div class="crd-heady103">
                                                                    <span
                                                                        class="text-dark text-uppercase">1٬450٬000-ریال</span>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group mb-2">
                                                            <button type="submit"
                                                                class="btn btn-primary full-width fw-medium">رزرو اتاق
                                                            </button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="card-footer bg-white">
                                            <div class="row align-items-center justify-content-start gx-2">
                                                <div class="col-6">
                                                    <div class="square--40 rounded-2 bg-seegreen text-light">4.8
                                                    </div>
                                                </div>
                                                <div class="col-6 text-start ">
                                                    <div class="text-md text-dark fw-medium">اقتصادی</div>
                                                    <div class="text-md text-muted-2">{{ $room->comments->count() }}
                                                        دیدگاه
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Cab Details -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <!-- Overview -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="mb-0">توضیحات</h6>
                        </div>

                        <div class="card-body">
                            <p class="mb-0">
                                {!! $room->description !!}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Highlights -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="mb-0">امکانات</h6>
                        </div>

                        <div class="card-body">
                            <ul class="row align-items-center p-0 g-3">
                                @foreach ($room->amenities as $amenity)
                                    <li class="col-md-6">
                                        {{-- <i class="fa-solid fa-check text-success ms-2"></i>  --}}
                                        <img src="{{ asset($amenity->icon ?? 'images/icons/default-icon.svg') }}"
                                            alt="" width="20px" height="20px">
                                        {{ $amenity->name }}
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>



                <!-- Guests Reviews -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fs-5 mb-0">دیدگاه مهمانان</h4>
                        </div>
                        <div class="card-body">


                            <div class="row align-items-center">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="gstRevws-groups">
                                        @foreach ($comments as $comment)
                                            <!-- Single Reviwws -->
                                            <div
                                                class="single-gstRevws rounded-2 border p-2 d-flex align-items-start mb-3">
                                                <div class="single-gstRevws-thumb">
                                                    <div class="rounded-2 overflow-hidden w-25 h-25">
                                                        <img src="assets/img/team-1.jpg" class="img-fluid"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="single-gstRevws-caps pe-3">
                                                    <div
                                                        class="gstRevws-head d-flex align-items-start justify-content-between">
                                                        <div class="dfls-headers">
                                                            <h5 class="h6 text-dark mb-0">{{ $comment->user->full_name }}
                                                            </h5>
                                                        </div>
                                                        <div class="dfls-arrios">
                                                            <span class="text-muted text-md">
                                                                {{ jalaliDate($comment->created_at) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="dfls-secription">
                                                        <p class="mb-0">
                                                            {!! $comment->body !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                        <!-- Single Reviwws -->
                                        <div class="show-morerewsbox mb-3">
                                            <div class="text-center" role="alert">
                                                <a href="#" class="fw-medium text-primary">مشاهده بیشتر<i
                                                        class="fa-solid fa-caret-down me-2"></i></a>
                                            </div>
                                        </div>


                                        @guest

                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div
                                                    class="d-flex align-items-center justify-content-center py-3 px-3 rounded-2 bg-success mb-4">
                                                    <p class="text-light m-0"><i
                                                            class="fa-solid fa-login text-warning ms-2"></i><a href="#"
                                                            class="text-warning text-decoration-underline">ورود </a> یا <a
                                                            href="#"
                                                            class="text-warning text-decoration-underline">ثبت‌نام
                                                        </a>برای
                                                        ثبت دیدگاه
                                                    <p>
                                                </div>
                                            </div>
                                        @endguest



                                        @auth
                                            <div class="card mt-10 comment-form">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">ثبت دیدگاه</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ route('site.room.comment-store', $room->id) }}"
                                                        method="POST">
                                                        @csrf

                                                        <textarea id="body" name="body" class="form-control form-control-solid" rows="5"
                                                            placeholder="دیدگاه خود را بنویسید...">{{ old('body') }}</textarea>

                                                        @error('body')
                                                            <span dir="rtl" class="d-block mt-2" style="margin-right:5px;">
                                                                <strong
                                                                    style="color: rgb(255, 39, 39); font-size: 10px; text-align: right; display: block;">
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror

                                                        <div class="text-end mt-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fas fa-paper-plane ms-1"></i>
                                                                ارسال دیدگاه
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endauth



                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- ============================ Hotel Detail End ================================== -->

    <!-- ============================ Similar Hotels Start ================================== -->
    <section class="py-5">
        <div class="container">

            <div class="row align-items-center justify-content-between mb-3">
                <div class="col-8">
                    <div class="upside-heading">
                        <h5 class="fs-6 m-0">اتاق های مشابه</h5>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-start grpx-btn">
                        <a href="{{ route('site.rooms') }}" class="btn btn-light-primary btn-md fw-medium">مشاهده<i
                                class="fa-solid fa-arrow-trend-up me-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 p-0">
                    <div class="row main-carousel arrow-hide cols-3">
                        @foreach ($freeRooms as $freeRoom)
                            <!-- Single Item -->
                            <div class="carousel-cell">
                                <div class="pop-touritem">
                                    <a href="{{ route('site.room.detail', $freeRoom) }}" class="card rounded-3 m-0">
                                        <div class="flight-thumb-wrapper">
                                            <div class="popFlights-item-overHidden">
                                                <img src="{{ asset($freeRoom->cover_image) }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="touritem-middle position-relative p-3">
                                            <div class="touritem-flexxer">
                                                <div class="d-flex align-items-start justify-content-start flex-column">
                                                    <span class="city-destination label mb-1">
                                                        <div class="d-block" style="margin-right:-15px">
                                                            <div class="d-inline-block ms-5">
                                                                <i class="fa fa-star text-warning text-xs"></i>
                                                                <i class="fa fa-star text-warning text-xs"></i>
                                                                <i class="fa fa-star text-warning text-xs"></i>
                                                                <i class="fa fa-star text-warning text-xs"></i>
                                                                <i class="fa fa-star text-warning text-xs"></i>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <h4 class="city fs-title m-0 mt-2">
                                                        <span>{{ $freeRoom->name }}</span>
                                                    </h4>
                                                </div>
                                                <div class="detail ellipsis-container mt-3">

                                                    @foreach ($freeRoom->amenities as $amenity)
                                                        <span class="ellipsis">{{ $amenity->name }}</span>
                                                    @endforeach


                                                </div>
                                            </div>
                                            <div class="flight-footer">
                                                <div class="epocsic">
                                                    <span class="price">{{ number_format($freeRoom->price_per_night) }}
                                                        تومان</span>
                                                    </h5>
                                                </div>
                                                <div class="rates">
                                                    <div class="star-rates">
                                                        <i class="fa-solid fa-star active"></i><i
                                                            class="fa-solid fa-star active"></i><i
                                                            class="fa-solid fa-star active"></i><i
                                                            class="fa-solid fa-star active"></i><i
                                                            class="fa-solid fa-star active"></i>
                                                    </div>
                                                    <div class="rat-reviews">
                                                        <strong>4.6</strong><span>({{ $freeRoom->comments->count() }}
                                                            دیدگاه)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Similar Hotels End ================================== -->


    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-sort-up"></i></a>
@endsection


@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('body');
    </script>


    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#check_in_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#check_in'
                }),
                $('#check_out_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#check_out'
                })
        });
    </script>


@endsection
