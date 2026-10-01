@extends('admin.layouts.master')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -70px">
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<div id="kt_content_container" class="container-xxl">
			<!--begin::Row-->
			
			
			
	
			<!--end::Row-->

		
			
			
					
			<div class="row g-5 g-xl-10 mb-xl-10">
				
				
					<div class="col-12">
					<!--begin::جداول widget 14-->
					<div class="card card-flush h-xl-100">
						<!--begin::Card header-->
						<div class="card-header pt-7">
							<!--begin::Title-->
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label fw-bolder text-gray-800">جزییات رزرو</span>
								<span class="text-gray-400 mt-1 fw-bold fs-6">10 رزروی که اخیرا ثبت شده</span>
							</h3>
							<!--end::Title-->
							<!--begin::Actions-->
							<div class="card-toolbar">
								<!--begin::فیلترها-->
								<div class="d-flex flex-stack flex-wrap gap-4">
									<!--begin::Destination-->
									<div class="d-flex align-items-center fw-bolder">
										<!--begin::Tags-->
										<div class="text-gray-400 fs-7 me-2">دسته بندی</div>
										<!--end::Tags-->
										<!--begin::انتخاب-->
										<select
											class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bolder py-0 ps-3 w-auto"
											data-control="select2" data-hide-search="true"
											data-dropdown-css-class="w-150px" data-placeholder="انتخاب ">
											<option></option>
											<option value="مشاهده همه" selected="selected">مشاهده همه</option>
											<option value="a">دسته بندی A</option>
											<option value="b">دسته بندی A</option>
										</select>
										<!--end::انتخاب-->
									</div>
									<!--end::Destination-->
									<!--begin::وضعیت-->
									<div class="d-flex align-items-center fw-bolder">
										<!--begin::Tags-->
										<div class="text-gray-400 fs-7 me-2">وضعیت</div>
										<!--end::Tags-->
										<!--begin::انتخاب-->
										<select
											class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto"
											data-control="select2" data-hide-search="true"
											data-dropdown-css-class="w-150px" data-placeholder="انتخاب "
											data-kt-table-widget-4="filter_status">
											<option></option>
											<option value="مشاهده همه" selected="selected">مشاهده همه</option>
											<option value="ارسال شد">ارسال شد</option>
											<option value="تایید شده">تایید شده</option>
											<option value="رد شد">رد شد</option>
											<option value="در انتظار">در انتظار</option>
										</select>
										<!--end::انتخاب-->
									</div>
									<!--end::وضعیت-->
									<!--begin::جستجو-->
									<div class="position-relative my-1">
										<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
										<span
											class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
													rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
												<path
													d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
													fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<input type="text" data-kt-table-widget-4="search"
											class="form-control w-150px fs-7 ps-12" placeholder="جستجو" />
									</div>
									<!--end::جستجو-->
								</div>
								<!--begin::فیلترها-->
							</div>
							<!--end::Actions-->
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-2">
							<!--begin::Table-->
							<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_4_table">
								<!--begin::Table head-->
								<thead>
									<!--begin::Table row-->
									<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
										<th class="min-w-100px">شناسه رزرو</th>
										<th class="text-end min-w-100px">زمان ایجاد</th>
										<th class="text-end min-w-125px">نام رزرو کننده</th>
										<th class="text-end min-w-100px">مبلغ کل</th>
										<th class="text-end min-w-100px">تاریخ اقامت</th>
										<th class="text-end min-w-50px">وضعیت</th>
										<th class="text-end"></th>
									</tr>
									<!--end::Table row-->
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<tbody class="fw-bolder text-gray-600">
									<tr data-kt-table-widget-4="subtable_template" class="d-none">
										<td colspan="2">
											<div class="d-flex align-items-center gap-3">
												<a href="#"
													class="symbol symbol-50px bg-secondary bg-opacity-25 rounded">
													<img src="" data-kt-src-path="assets/media/stock/ecommerce/" alt=""
														data-kt-table-widget-4="template_image" />
												</a>
												<div class="d-flex flex-column text-muted">
													<a href="#" class="text-gray-800 text-hover-primary fw-bolder"
														data-kt-table-widget-4="template_name">نام محصول</a>
													<div class="fs-7" data-kt-table-widget-4="template_description">
														محصولات
														description</div>
												</div>
											</div>
										</td>
										<td class="text-end">
											<div class="text-gray-800 fs-7">Cost</div>
											<div class="text-muted fs-7 fw-bolder"
												data-kt-table-widget-4="template_cost">1</div>
										</td>
										<td class="text-end">
											<div class="text-gray-800 fs-7">تعداد</div>
											<div class="text-muted fs-7 fw-bolder"
												data-kt-table-widget-4="template_qty">1</div>
										</td>
										<td class="text-end">
											<div class="text-gray-800 fs-7">کل</div>
											<div class="text-muted fs-7 fw-bolder"
												data-kt-table-widget-4="template_total">name</div>
										</td>
										<td class="text-end">
											<div class="text-gray-800 fs-7 me-3">On hو</div>
											<div class="text-muted fs-7 fw-bolder"
												data-kt-table-widget-4="template_stock">32</div>
										</td>
										<td></td>
									</tr>
									@foreach ($latestBookings as $booking)

									<tr>
										<td>
											<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
												class="text-gray-800 text-hover-primary">#XGY-346</a>
										</td>
										<td class="text-end">{{ $booking->created_at->diffForHumans() }}  </td>
										<td class="text-end">
											<a href="#" class="text-gray-600 text-hover-primary">{{
												$booking->user->full_name }} </a>
										</td>
										<td class="text-end">{{ number_format($booking->total_price) }}تومان</td>
										<td class="text-end">
											<span class="text-gray-800 fs-8">{{ $booking->start_date_jalali }} - {{ $booking->end_date_jalali }}</span>
										</td>
										<td class="text-end">
											<span @class([ 'badge' , 'badge-light'=> $booking->status ===
												'pending',
												'badge-light-primary' => $booking->status === 'confirmed',
												'badge-light-success' => $booking->status === 'check_in',
												'badge-light-warning' => $booking->status === 'check_out',
												'badge-light-danger' =>
												$booking->status === 'cancelled' || $booking->status === 'expired',
												])>
												{{ $booking->status }}
											</span>
										</td>
										<td class="text-end">
											<button type="button"
												class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
												data-kt-table-widget-4="expو_row">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
												<span class="svg-icon svg-icon-3 m-0 toggle-off">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1"
															transform="rotate(-90 11 18)" fill="currentColor" />
														<rect x="6" y="11" width="12" height="2" rx="1"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
												<span class="svg-icon svg-icon-3 m-0 toggle-on">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														viewBox="0 0 24 24" fill="none">
														<rect x="6" y="11" width="12" height="2" rx="1"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</button>
										</td>
									</tr>
									@endforeach

								</tbody>
								<!--end::Table body-->
							</table>
							<!--end::Table-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::جداول widget 14-->
				</div>
				
				
				
				
				<!--begin::Col-->
				<div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
					<!--begin::Card widget 16-->
					<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center h-md-50 mb-5 mb-xl-10"
						style="background-color: #080655;background-image:url('assets/media/svg/shapes/wave-bg-dark.svg')">
						<!--begin::Header-->
						<div class="card-header pt-5">
							<!--begin::Title-->
							<div class="card-title d-flex flex-column">
								<!--begin::مقدار-->
								<span class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2">{{ $confirmedBookings
									}}</span>
								<!--end::مقدار-->
								<!--begin::Subtitle-->
								<span class="text-white opacity-50 pt-1 fw-bold fs-6">رزروهای تایید شده</span>
								<!--end::Subtitle-->
							</div>
							<!--end::Title-->
						</div>
						<!--end::Header-->
						<!--begin::Card body-->
						<div class="card-body d-flex align-items-end pt-0">
							<!--begin::پردازش-->
							<div class="d-flex align-items-center flex-column mt-3 w-100">
								<div
									class="d-flex justify-content-between fw-bolder fs-6 text-white opacity-50 w-100 mt-auto mb-2">
									<span>{{ $pendingBookings }} در انتظار</span>
									<span>{{ $pendingPercentage }}%</span>
								</div>
								<div class="h-8px mx-3 w-100 bg-light-danger rounded">
									<div class="bg-danger rounded h-8px" role="progressbar"
										style="width: {{ $pendingPercentage }}%;" aria-valuenow="50" aria-valuemin="0"
										aria-valuemax="100"></div>
								</div>
							</div>
							<!--end::پردازش-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card widget 16-->
					<!--begin::Card widget 7-->
					<div class="card card-flush h-md-50 mb-5 mb-xl-10">
						<!--begin::Header-->
						<div class="card-header pt-5">
							<!--begin::Title-->
							<div class="card-title d-flex flex-column">
								<!--begin::مقدار-->
								<span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">357</span>
								<!--end::مقدار-->
								<!--begin::Subtitle-->
								<span class="text-gray-400 pt-1 fw-bold fs-6">حرفه ای</span>
								<!--end::Subtitle-->
							</div>
							<!--end::Title-->
						</div>
						<!--end::Header-->
						<!--begin::Card body-->
						<div class="card-body d-flex flex-column justify-content-end pe-0">
							<!--begin::Title-->
							<span class="fs-6 fw-boldest text-gray-800 d-block mb-2">قهرمانان امروز</span>
							<!--end::Title-->
							<!--begin::کاربران group-->
							<div class="symbol-group symbol-hover flex-nowrap">
								<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="آرش کمری">
									<span class="symbol-label bg-warning text-inverse-warning fw-bolder">A</span>
								</div>
								<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
									title="میکائیل احمدی">
									<img alt="Pic" src="assets/media/avatars/300-11.jpg" />
								</div>
								<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
									title="سوسن موسوی">
									<span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
								</div>
								<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
									title="میلاد مرادی">
									<img alt="Pic" src="assets/media/avatars/300-2.jpg" />
								</div>
								<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="حسینی">
									<span class="symbol-label bg-danger text-inverse-danger fw-bolder">P</span>
								</div>
								<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
									title="بهروز ازادی">
									<img alt="Pic" src="assets/media/avatars/300-12.jpg" />
								</div>
								<a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
									data-bs-target="#kt_modal_view_users">
									<span class="symbol-label bg-dark text-gray-300 fs-8 fw-bolder">+42</span>
								</a>
							</div>
							<!--end::کاربران group-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card widget 7-->
				</div>
				<!--end::Col-->
				<!--begin::Col-->
				<div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
					<!--begin::Card widget 4-->
					<div class="card card-flush h-md-50 mb-5 mb-xl-10">

						<!--begin::Header-->
						<div class="card-header pt-5">
							<div class="card-title d-flex flex-column">

								<div class="d-flex align-items-center">

									<span class="fs-4 fw-bold text-gray-400 me-1 align-self-start"></span>

									<span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">
										{{ number_format($thisMonthIncome) }}
									</span>

									<span
										class="badge badge-{{ $incomeChangePercentage >= 0 ? 'success' : 'danger' }} fs-base">
										{{ $incomeChangePercentage >= 0 ? '↑' : '↓' }}
										{{ abs($incomeChangePercentage) }}%
									</span>

								</div>

								<span class="text-gray-400 pt-1 fw-bold fs-6">
									درآمد هتل در ماه جاری
								</span>

							</div>
						</div>
						<!--end::Header-->


						<!--begin::Card body-->
						<div class="card-body pt-2 pb-4 d-flex align-items-center">

							<!--begin::Chart-->
							<div class="d-flex justify-end me-5 pt-2">

								<div id="hotel_income_chart" style="min-width: 160px; min-height: 160px;">
								</div>

							</div>
							<!--end::Chart-->


							<!--begin::Labels-->
							<!--begin::Labels-->
						<!--	<div class="d-flex flex-column content-justify-center w-100">

								<div class="d-flex fw-bold align-items-center">
									<div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>

									<div class="text-gray-500 flex-grow-1 me-4">
										صبحانه
									</div>

									<div class="fw-boldest text-gray-700 text-xxl-end">
										{{ number_format($thisMonthBreakfastIncome) }} تومان
									</div>
								</div>


								<div class="d-flex fw-bold align-items-center my-3">
									<div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>

									<div class="text-gray-500 flex-grow-1 me-4">
										اتاق
									</div>

									<div class="fw-boldest text-gray-700 text-xxl-end">
										{{ number_format($thisMonthRoomIncome) }} تومان
									</div>
								</div>

							</div>
							-->
							
							<!--end::Labels-->


							<!--begin::Chart-->
							<div class="d-flex flex-center ms-5 pt-2">
								<div id="hotel_income_chart" style="min-width: 140px; min-height: 140px;">
								</div>
							</div>
							<!--end::Chart-->
							<!--end::Labels-->

						</div>
						<!--end::Card body-->

					</div>


					<!--end::Card widget 4-->
					<!--begin::لیست widget 25-->
					<div class="card card-flush h-lg-50">
						<!--begin::Header-->
						<div class="card-header pt-5">
							<!--begin::Title-->
							<h3 class="card-title text-gray-800">هایلایت</h3>
							<!--end::Title-->
							<!--begin::Toolbar-->
							<div class="card-toolbar d-none">
								<!--begin::تاریخrangepicker(defined in src/js/layout/app.js)-->
								<div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
									class="btn btn-sm btn-light d-flex align-items-center px-4">
									<!--begin::Display range-->
									<div class="text-gray-600 fw-bolder">در حال خواندن...</div>
									<!--end::Display range-->
									<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
									<span class="svg-icon svg-icon-1 ms-2 me-0">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none">
											<path opacity="0.3"
												d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
												fill="currentColor" />
											<path
												d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
												fill="currentColor" />
											<path
												d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
												fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
								<!--end::تاریخrangepicker-->
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-5">
							<!--begin::Item-->
							<div class="d-flex flex-stack">
								<!--begin::بخش-->
								<div class="text-gray-700 fw-bold fs-6 me-2">میانگین رتبه بندی مشتری</div>
								<!--end::بخش-->
								<!--begin::امار-->
								<div class="d-flex align-items-senter">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr094.svg-->
									<span class="svg-icon svg-icon-2 svg-icon-success me-2">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="16.9497" y="8.46448" width="13" height="2" rx="1"
												transform="rotate(135 16.9497 8.46448)" fill="currentColor" />
											<path
												d="M14.8284 9.97157L14.8284 15.8891C14.8284 16.4749 15.3033 16.9497 15.8891 16.9497C16.4749 16.9497 16.9497 16.4749 16.9497 15.8891L16.9497 8.05025C16.9497 7.49797 16.502 7.05025 15.9497 7.05025L8.11091 7.05025C7.52512 7.05025 7.05025 7.52513 7.05025 8.11091C7.05025 8.6967 7.52512 9.17157 8.11091 9.17157L14.0284 9.17157C14.4703 9.17157 14.8284 9.52975 14.8284 9.97157Z"
												fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<!--begin::شماره کارت-->
									<span class="text-gray-900 fw-boldest fs-6">7.8</span>
									<!--end::شماره کارت-->
									<span class="text-gray-400 fw-bolder fs-6">/10</span>
								</div>
								<!--end::امار-->
							</div>
							<!--end::Item-->
							<!--begin::Separator-->
							<div class="separator separator-dashed my-3"></div>
							<!--end::Separator-->
							<!--begin::Item-->
							<div class="d-flex flex-stack">
								<!--begin::بخش-->
								<div class="text-gray-700 fw-bold fs-6 me-2">میانگین </div>
								<!--end::بخش-->
								<!--begin::امار-->
								<div class="d-flex align-items-senter">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr093.svg-->
									<span class="svg-icon svg-icon-2 svg-icon-danger me-2">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="7.05026" y="15.5355" width="13" height="2" rx="1"
												transform="rotate(-45 7.05026 15.5355)" fill="currentColor" />
											<path
												d="M9.17158 14.0284L9.17158 8.11091C9.17158 7.52513 8.6967 7.05025 8.11092 7.05025C7.52513 7.05025 7.05026 7.52512 7.05026 8.11091L7.05026 15.9497C7.05026 16.502 7.49797 16.9497 8.05026 16.9497L15.8891 16.9497C16.4749 16.9497 16.9498 16.4749 16.9498 15.8891C16.9498 15.3033 16.4749 14.8284 15.8891 14.8284L9.97158 14.8284C9.52975 14.8284 9.17158 14.4703 9.17158 14.0284Z"
												fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<!--begin::شماره کارت-->
									<span class="text-gray-900 fw-boldest fs-6">730</span>
									<!--end::شماره کارت-->
								</div>
								<!--end::امار-->
							</div>
							<!--end::Item-->
							<!--begin::Separator-->
							<div class="separator separator-dashed my-3"></div>
							<!--end::Separator-->
							<!--begin::Item-->
							<div class="d-flex flex-stack">
								<!--begin::بخش-->
								<div class="text-gray-700 fw-bold fs-6 me-2">میانگین درآمد</div>
								<!--end::بخش-->
								<!--begin::امار-->
								<div class="d-flex align-items-senter">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr094.svg-->
									<span class="svg-icon svg-icon-2 svg-icon-success me-2">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="16.9497" y="8.46448" width="13" height="2" rx="1"
												transform="rotate(135 16.9497 8.46448)" fill="currentColor" />
											<path
												d="M14.8284 9.97157L14.8284 15.8891C14.8284 16.4749 15.3033 16.9497 15.8891 16.9497C16.4749 16.9497 16.9497 16.4749 16.9497 15.8891L16.9497 8.05025C16.9497 7.49797 16.502 7.05025 15.9497 7.05025L8.11091 7.05025C7.52512 7.05025 7.05025 7.52513 7.05025 8.11091C7.05025 8.6967 7.52512 9.17157 8.11091 9.17157L14.0284 9.17157C14.4703 9.17157 14.8284 9.52975 14.8284 9.97157Z"
												fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<!--begin::شماره کارت-->
									<span class="text-gray-900 fw-boldest fs-6">$2,309</span>
									<!--end::شماره کارت-->
								</div>
								<!--end::امار-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::LIst widget 25-->
				</div>
				<!--end::Col-->
				<!--begin::Col-->
					<div class="col-xl-6">
					<!--begin::Chart Widget 35-->
					<div class="card card-flush h-md-100">
						<!--begin::Header-->
						<div class="card-header pt-5 mb-6">
							<!--begin::Title-->
							<h3 class="card-title align-items-start flex-column">
								<!--begin::امار-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::واحد پول-->
									<span class="fs-3 fw-bold text-gray-400 align-self-start me-1">$</span>
									<!--end::واحد پول-->
									<!--begin::Value-->
									<span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2">3,274.94</span>
									<!--end::Value-->
									<!--begin::Tags-->
									<span class="badge badge-success fs-base">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
										<span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
													transform="rotate(90 13 6)" fill="currentColor" />
												<path
													d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
													fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->9.2%
									</span>
									<!--end::Tags-->
								</div>
								<!--end::امار-->
								<!--begin::توضیحات-->
								<span class="fs-6 fw-bold text-gray-400">میانگین درآمد</span>
								<!--end::توضیحات-->
							</h3>
							<!--end::Title-->
							<!--begin::Toolbar-->
							<div class="card-toolbar">
								<!--begin::Menu-->
								<button
									class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
									data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
									data-kt-menu-overflow="true">
									<!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
									<span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none">
											<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4"
												fill="currentColor" />
											<rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
											<rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
											<rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</button>

								<!--end::Menu-->
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-0 px-0">
							<!--begin::Nav-->
							<ul class="nav d-flex justify-content-between mb-3 mx-9">
								<!--begin::Item-->
								<li class="nav-item mb-3">
									<!--begin::Link-->
									<a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px active"
										data-bs-toggle="tab" id="kt_charts_widget_35_tab_1"
										href="#kt_charts_widget_35_tab_content_1">1d</a>
									<!--end::Link-->
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="nav-item mb-3">
									<!--begin::Link-->
									<a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px"
										data-bs-toggle="tab" id="kt_charts_widget_35_tab_2"
										href="#kt_charts_widget_35_tab_content_2">5d</a>
									<!--end::Link-->
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="nav-item mb-3">
									<!--begin::Link-->
									<a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px"
										data-bs-toggle="tab" id="kt_charts_widget_35_tab_3"
										href="#kt_charts_widget_35_tab_content_3">1m</a>
									<!--end::Link-->
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="nav-item mb-3">
									<!--begin::Link-->
									<a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px"
										data-bs-toggle="tab" id="kt_charts_widget_35_tab_4"
										href="#kt_charts_widget_35_tab_content_4">6m</a>
									<!--end::Link-->
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="nav-item mb-3">
									<!--begin::Link-->
									<a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px"
										data-bs-toggle="tab" id="kt_charts_widget_35_tab_5"
										href="#kt_charts_widget_35_tab_content_5">1y</a>
									<!--end::Link-->
								</li>
								<!--end::Item-->
							</ul>
							<!--end::Nav-->
							<!--begin::Tab Content-->
							<div class="tab-content mt-n6">
								<!--begin::Tap pane-->
								<div class="tab-pane fade active show" id="kt_charts_widget_35_tab_content_1">
									<!--begin::Chart-->
									<div id="kt_charts_widget_35_chart_1" data-kt-chart-color="primary"
										class="min-h-auto h-200px ps-3 pe-6"></div>
									<!--end::Chart-->
									<!--begin::Table container-->
									<div class="table-responsive mx-9 mt-n6">
										<!--begin::Table-->
										<table class="table align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
												<tr>
													<th class="min-w-100px"></th>
													<th class="min-w-100px text-end pe-0"></th>
													<th class="text-end min-w-50px"></th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">2:30
															PM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$2,756.26</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-danger">-139.34</span>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">3:10
															PM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$3,207.03</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-success">+576.24</span>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">3:55
															PM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$3,274.94</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-success">+124.03</span>
													</td>
												</tr>
											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Table container-->
								</div>
								<!--end::Tap pane-->
								<!--begin::Tap pane-->
								<div class="tab-pane fade" id="kt_charts_widget_35_tab_content_2">
									<!--begin::Chart-->
									<div id="kt_charts_widget_35_chart_2" data-kt-chart-color="primary"
										class="min-h-auto h-200px ps-3 pe-6"></div>
									<!--end::Chart-->
									<!--begin::Table container-->
									<div class="table-responsive mx-9 mt-n6">
										<!--begin::Table-->
										<table class="table align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
												<tr>
													<th class="min-w-100px"></th>
													<th class="min-w-100px text-end pe-0"></th>
													<th class="text-end min-w-50px"></th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">4:30
															PM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$2,345.45</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-success">+134.02</span>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">11:35
															AM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$756.26</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-primary">-124.03</span>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">3:30
															PM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$1,756.26</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-danger">+144.04</span>
													</td>
												</tr>
											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Table container-->
								</div>
								<!--end::Tap pane-->
								<!--begin::Tap pane-->
								<div class="tab-pane fade" id="kt_charts_widget_35_tab_content_3">
									<!--begin::Chart-->
									<div id="kt_charts_widget_35_chart_3" data-kt-chart-color="primary"
										class="min-h-auto h-200px ps-3 pe-6"></div>
									<!--end::Chart-->
									<!--begin::Table container-->
									<div class="table-responsive mx-9 mt-n6">
										<!--begin::Table-->
										<table class="table align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
												<tr>
													<th class="min-w-100px"></th>
													<th class="min-w-100px text-end pe-0"></th>
													<th class="text-end min-w-50px"></th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">3:20
															AM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$3,756.26</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-primary">+185.03</span>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">12:30
															AM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$2,756.26</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-danger">+124.03</span>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">4:30
															PM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$756.26</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-success">-154.03</span>
													</td>
												</tr>
											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Table container-->
								</div>
								<!--end::Tap pane-->
								<!--begin::Tap pane-->
								<div class="tab-pane fade" id="kt_charts_widget_35_tab_content_4">
									<!--begin::Chart-->
									<div id="kt_charts_widget_35_chart_4" data-kt-chart-color="primary"
										class="min-h-auto h-200px ps-3 pe-6"></div>
									<!--end::Chart-->
									<!--begin::Table container-->
									<div class="table-responsive mx-9 mt-n6">
										<!--begin::Table-->
										<table class="table align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
												<tr>
													<th class="min-w-100px"></th>
													<th class="min-w-100px text-end pe-0"></th>
													<th class="text-end min-w-50px"></th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">2:30
															PM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$2,756.26</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-warning">+124.03</span>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">5:30
															AM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$1,756.26</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-info">+144.65</span>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">4:30
															PM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$2,085.25</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-primary">+154.06</span>
													</td>
												</tr>
											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Table container-->
								</div>
								<!--end::Tap pane-->
								<!--begin::Tap pane-->
								<div class="tab-pane fade" id="kt_charts_widget_35_tab_content_5">
									<!--begin::Chart-->
									<div id="kt_charts_widget_35_chart_5" data-kt-chart-color="primary"
										class="min-h-auto h-200px ps-3 pe-6"></div>
									<!--end::Chart-->
									<!--begin::Table container-->
									<div class="table-responsive mx-9 mt-n6">
										<!--begin::Table-->
										<table class="table align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
												<tr>
													<th class="min-w-100px"></th>
													<th class="min-w-100px text-end pe-0"></th>
													<th class="text-end min-w-50px"></th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">2:30
															PM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$2,045.04</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-warning">+114.03</span>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">3:30
															AM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$756.26</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-primary">-124.03</span>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#" class="text-gray-600 fw-bolder fs-6">10:30
															PM</a>
													</td>
													<td class="pe-0 text-end">
														<span class="text-gray-800 fw-bolder fs-6 me-1">$1.756.26</span>
													</td>
													<td class="pe-0 text-end">
														<span class="fw-bolder fs-6 text-info">+165.86</span>
													</td>
												</tr>
											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Table container-->
								</div>
								<!--end::Tap pane-->
							</div>
							<!--end::Tab Content-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Chart Widget 33-->
				</div>
				<!--end::Col-->
			</div>
			

				<!--begin::Row-->
			<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
				<!--begin::Col-->
			
				<!--end::Col-->
				<!--begin::Col-->
			
				<!--end::Col-->
			</div>
			<!--end::Row-->
			
			
			
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
<!--end::Content-->
<!--begin::Footer-->

</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Root-->
<!--begin::کشوs-->


<!--begin::Modal - نمایش users-->
<div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header pb-0 border-0 justify-content-end">
				<!--begin::Close-->
				<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
					<span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
								transform="rotate(-45 6 17.3137)" fill="currentColor" />
							<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
								fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Close-->
			</div>
			<!--begin::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
				<!--begin::Heading-->
				<div class="text-center mb-13">
					<!--begin::Title-->
					<h1 class="mb-3">مرور کاربران</h1>
					<!--end::Title-->
					<!--begin::توضیحات-->
					<div class="text-muted fw-bold fs-5">اگر به اطلاعات بیشتری نیاز دارید ، لطفاً این مورد را بررسی
						کنید
						<a href="#" class="link-primary fw-bolder">لیست کاربران</a>.
					</div>
					<!--end::توضیحات-->
				</div>
				<!--end::Heading-->
				<!--begin::users-->
				<div class="mb-15">
					<!--begin::لیست-->
					<div class="mh-375px scroll-y me-n7 pe-7">
						<!--begin::user-->
						<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
							<!--begin::Details-->
							<div class="d-flex align-items-center">
								<!--begin::Avatar-->
								<div class="symbol symbol-35px symbol-circle">
									<img alt="Pic" src="assets/media/avatars/300-6.jpg" />
								</div>
								<!--end::Avatar-->
								<!--begin::Details-->
								<div class="ms-6">
									<!--begin::نام-->
									<a href="#"
										class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">مرادی
										نیا
										<span class="badge badge-light fs-8 fw-bold ms-2">کارگردان هنری</span></a>
									<!--end::نام-->
									<!--begin::ایمیل-->
									<div class="fw-bold text-muted">smith@kpmg.com</div>
									<!--end::ایمیل-->
								</div>
								<!--end::Details-->
							</div>
							<!--end::Details-->
							<!--begin::Stats-->
							<div class="d-flex">
								<!--begin::فروش-->
								<div class="text-end">
									<div class="fs-5 fw-bolder text-dark">$23,000</div>
									<div class="fs-7 text-muted">فروش</div>
								</div>
								<!--end::فروش-->
							</div>
							<!--end::Stats-->
						</div>
						<!--end::user-->

						<!--begin::user-->
						<div class="d-flex flex-stack py-5">
							<!--begin::Details-->
							<div class="d-flex align-items-center">
								<!--begin::Avatar-->
								<div class="symbol symbol-35px symbol-circle">
									<span class="symbol-label bg-light-info text-info fw-bold">A</span>
								</div>
								<!--end::Avatar-->
								<!--begin::Details-->
								<div class="ms-6">
									<!--begin::نام-->
									<a href="#"
										class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Robert
										Doe
										<span class="badge badge-light fs-8 fw-bold ms-2">بازاریابی
											Executive</span></a>
									<!--end::نام-->
									<!--begin::ایمیل-->
									<div class="fw-bold text-muted">robert@benko.com</div>
									<!--end::ایمیل-->
								</div>
								<!--end::Details-->
							</div>
							<!--end::Details-->
							<!--begin::Stats-->
							<div class="d-flex">
								<!--begin::فروش-->
								<div class="text-end">
									<div class="fs-5 fw-bolder text-dark">$45,500</div>
									<div class="fs-7 text-muted">فروش</div>
								</div>
								<!--end::فروش-->
							</div>
							<!--end::Stats-->
						</div>
						<!--end::user-->
					</div>
					<!--end::لیست-->
				</div>
				<!--end::users-->
				<!--begin::Notice-->
				<div class="d-flex justify-content-between">
					<!--begin::Tags-->
					<div class="fw-bold">
						<label class="fs-6">افزودن کاربران</label>
						<div class="fs-7 text-muted">اگر به اطلاعات بیشتری نیاز دارید ، لطفا برنامه ریزی بودجه را
							بررسی
							کنید</div>
					</div>
					<!--end::Tags-->
					<!--begin::Switch-->
					<label class="form-check form-switch form-check-custom form-check-solid">
						<input class="form-check-input" type="checkbox" value="" checked="checked" />
						<span class="form-check-label fw-bold text-muted">همه بدهکار هستیم</span>
					</label>
					<!--end::Switch-->
				</div>
				<!--end::Notice-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<!--end::Modal - نمایش users-->


<!--end::Modals-->
<!--begin::Javascript-->

@section('script')
<!--begin::Page Vendors Javascript(used by this page)-->
<script src={{ asset('admin-assets/plugins/custom/datatables/datatables.bundle.js') }}></script>
<script src={{ asset('admin-assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page سفارشی Javascript(used by this page)-->
<script src={{ asset('admin-assets/js/custom/utilities/modals/new-target.js') }}></script>
<script src={{ asset('admin-assets/js/custom/utilities/modals/create-project/type.js') }}></script>
<script src={{ asset('admin-assets/js/custom/utilities/modals/create-project/budget.js') }}></script>
<script src={{ asset('admin-assets/js/custom/utilities/modals/create-project/settings.js') }}></script>
<script src={{ asset('admin-assets/js/custom/utilities/modals/create-project/team.js') }}></script>
<script src={{ asset('admin-assets/js/custom/utilities/modals/create-project/targets.js') }}></script>
<script src={{ asset('admin-assets/js/custom/utilities/modals/create-project/files.js') }}></script>
<script src={{ asset('admin-assets/js/custom/utilities/modals/create-project/complete.js') }}></script>
<script src={{ asset('admin-assets/js/custom/utilities/modals/create-project/main.js') }}></script>
<script src={{ asset('admin-assets/js/custom/utilities/modals/create-app.js') }}></script>
<script src={{ asset('admin-assets/js/custom/utilities/modals/new-address.js') }}></script>
<!--end::Page custom Javascript-->
<!--end::Javascript-->

<script>
	document.addEventListener("DOMContentLoaded", function() {

            const element = document.querySelector("#hotel_income_chart");

            if (!element) {
                return;
            }

            const options = {

                series: [
                    {{ (float) $thisMonthBreakfastIncome }},
                    {{ (float) $thisMonthRoomIncome }}
                ],

                chart: {
                    type: "donut",
                    width: 140,
                    height: 140
                },

                labels: [
                    "صبحانه",
                    "اتاق"
                ],

                colors: [
                    "#50CD89",
                    "#009EF7"
                ],

                legend: {
                    show: false
                },

                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return Math.round(val) + "%";
                    }
                },

                plotOptions: {
                    pie: {
                        donut: {
                            size: "55%"
                        }
                    }
                },

                stroke: {
                    width: 0
                },

                tooltip: {
                    y: {
                        formatter: function(value) {
                            return new Intl.NumberFormat("fa-IR").format(value) + " تومان";
                        }
                    }
                }
            };

            const chart = new ApexCharts(element, options);

            chart.render();
        });
</script>
@endsection
@endsection