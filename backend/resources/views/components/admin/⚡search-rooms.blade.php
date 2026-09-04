<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;

new class extends Component {
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function with()
    {
        return [
            'rooms' => Room::with(['beds'])
                ->when($this->search, function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->orderBy('created_at', 'desc')
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
                    wire:model.live.debounce.300ms="search" placeholder="جستجو اتاق" />

            </div>
        </div>
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

            <a href="{{ route('admin.room.create') }}" class="btn btn-primary">افزودن اتاق</a>
        </div>
    </div>
    <div class="card-body pt-0">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_محصولات_table">
            <thead>
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        #
                    </th>
                    <th class="min-w-200px">نام اتاق</th>
                    <th class="text-start min-w-100px">وضعیت</th>
                    <th class="text-start min-w-100px">قیمت(به تومان)</th>
                    <th class="text-center min-w-100px">تخت ها</th>
                    <th class="text-end min-w-100px">ظرفیت اتاق</th>
                    <th class="text-end min-w-70px">عملیات</th>
                </tr>
            </thead>
            <tbody class="fw-bold text-gray-600">

                @foreach ($rooms as $room)
                    <tr>
                        <td>
                            {{ $loop->iteration }}-
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.room.edit', $room) }}" class="symbol symbol-50px">
                                    <span class="symbol-label"
                                        style="background-image:url({{ $room->cover_image ? Storage::url($room->cover_image) : asset('images/no_image.png') }}); width:45px; height:45px"></span>
                                </a>
                                <div class="ms-5">
                                    <a href="{{ route('admin.room.edit', $room) }}"
                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder"
                                        data-kt-ecommerce-product-filter="product_name">{{ $room->name }}</a>

                                    <br>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge {{ $room->status ? 'badge-light-success' : 'badge-light-danger' }}">
                                {{ $room->status ? 'فعال' : 'غیرفعال' }}
                            </span>
                        </td>
                        <td>
                            <span class="fw-bolder">{{ number_format($room->price) }}</span>
                        </td>


                        <td class="text-center pe-0" data-order="rating-3">
                            {{-- {{ var_dump($room->beds) }} --}}
                            @forelse ($room->beds as $bed)
                                <span class="text-dark">
                                    {{ $bed->type }},
                                </span>
                            @empty
                                <span class="text-dark">-</span>
                            @endforelse
                        </td>

                        <td class="text-center">
                            <span class="fw-bolder text-dark">{{ $room->capacity }} نفر</span>
                        </td>

                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">عملیات
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <div class="menu-item px-3">

                                    <form action="{{ route('admin.room.change-status', $room) }}" method="POST"
                                        class="d-inline" style="border: none">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="menu-link px-3 border-0 bg-transparent"
                                            data-kt-ecommerce-product-filter="delete_row">تغییر وضعیت</button>
                                    </form>

                                    <a href="{{ route('admin.room.edit', $room) }}" class="menu-link px-3"
                                        data-kt-ecommerce-product-filter="delete_row">ویرایش</a>

                                    <form action="{{ route('admin.room.delete', $room) }}" method="POST"
                                        class="d-inline" style="border: none">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="menu-link px-3 border-0 bg-transparent delete"
                                            data-kt-ecommerce-product-filter="delete_row">حذف</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

                @if ($rooms->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center py-5">اتاقی وجود ندارد</td>
                    </tr>
                @endif

            </tbody>
        </table>
        {{ $rooms->links() }}
    </div>
</div>
