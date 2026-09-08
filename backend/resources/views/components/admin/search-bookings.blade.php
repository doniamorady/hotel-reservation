<?php

use Livewire\Component;
use App\Models\Booking;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $search = '';
    public $filter = 'all';
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function changeStatus(Booking $booking)
    {
        $status;
        switch ($booking->status) {
            case 'pending':
                $status = 'confirmed';
                break;
            case 'confirmed':
                $status = 'check_in';
                break;
            case 'check_in':
                $status = 'check_out';
                break;
            case 'check_out':
                $status = 'cancelled';
                break;
            case 'cancelled':
                $status = 'pending';
                break;
        }
        $booking->update([
            'status' => $status,
        ]);
    }

    public function with()
    {
        return [
            'bookings' => Booking::query()
                ->when($this->search, function ($q) {
                    $q->whereHas('user', function ($q) {
                        $q->where('first_name', 'like', '%' . $this->search . '%')->orWhere('last_name', 'like', '%' . $this->search . '%');
                    });
                })
                ->when($this->filter !== 'all', function ($query) {
                    $query->where('status', $this->filter);
                })
                ->latest()
                ->paginate(10),
        ];
    }
};
?>

<div class="card card-flush">
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <input type="text" class="form-control form-control-solid w-250px ps-14"
                    wire:model.live.debounce.300ms="search" placeholder="جستجو کاربران" name="search" id="search" />
            </div>
        </div>


        <div class="card-toolbar">

            <di style="margin-left: 1rem">
                <div class="w-100 mw-150px">
                    <select class="form-select form-select-solid" wire:model.live="filter" data-placeholder="وضعیت"
                        name="filter">
                        <option value="all">همه</option>
                        <option value="check_in">check_in</option>
                        <option value="check_out">check_out</option>
                        <option value="pending">pending</option>
                        <option value="cancelled">cancelled</option>
                        <option value="expired">expired</option>

                    </select>
                </div>

            </di>

            <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary"
                style="padding: 8px 14px;font-size: 12px;">ایجاد رزرو</a>

        </div>
    </div>
    <div class="card-body pt-0">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th>رزرو</th>
                        <th>کاربر</th>
                        <th>اتاق</th>
                        <th>تاریخ شروع</th>
                        <th>تاریخ پایان</th>
                        <th>وضعیت</th>
                        <th>جمع کل</th>
                        <th class="text-end">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>#{{ $booking->id }}</td>
                            <td>{{ $booking->user?->full_name ?? 'نامشخص' }}</td>
                            <td>{{ $booking->room?->name ?? 'نامشخص' }}</td>
                            <td>{{ \Illuminate\Support\Facades\Date::parse($booking->start_date)->translatedFormat('Y/m/d') }}
                            </td>
                            <td>{{ \Illuminate\Support\Facades\Date::parse($booking->end_date)->translatedFormat('Y/m/d') }}
                            </td>
                            <td>
                                <span @class([
                                    'badge',
                                    'badge-light' => $booking->status === 'pending',
                                    'badge-light-primary' => $booking->status === 'confirmed',
                                    'badge-light-success' => $booking->status === 'check_in',
                                    'badge-light-warning' => $booking->status === 'check_out',
                                    'badge-light-danger' =>
                                        $booking->status === 'cancelled' || $booking->status === 'expired',
                                ])>
                                    {{ $booking->status }}
                                </span>
                            </td>
                            <td>{{ number_format($booking->total_price) }} تومان</td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">عملیات
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>


                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                    data-kt-menu="true">

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{ route('admin.bookings.show', $booking) }}" class="menu-link px-3"
                                            style="border: none">جزئیات</a>
                                    </div>
                                    <div class="menu-item px-3">


                                        <button wire:click='changeStatus({{ $booking }})' class="menu-link px-3"
                                            style="border: none">تغییر
                                            وضعیت</button>

                                    </div>

                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-10">رزروی ثبت نشده است.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
