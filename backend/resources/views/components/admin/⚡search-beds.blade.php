<?php

use App\Models\Bed;
use Livewire\Component;

new class extends Component {
    public $search = '';

    public function with()
    {
        return [
            'beds' => Bed::query()
                ->when($this->search, function ($query) {
                    $query->where('type', 'like', '%' . $this->search . '%');
                })
                ->get(),
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
                <input type="text" class="form-control form-control-solid w-250px ps-14" wire:model.live.debounce.300ms="search"
                    placeholder="جستجو تخت" />

            </div>
        </div>
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <a href="{{ route('admin.bed.create') }}" class="btn btn-sm btn-primary">افزودن تخت </a>
        </div>
    </div>
    <div class="card-body pt-0">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_محصولات_table">
            <thead>
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        #
                    </th>
                    <th class="min-w-250px">نام</th>
                    <th colspan="2" class="text-start min-w-100px ps-5 pe-5 ">ظرفیت</th>
                    <th class="text-end min-w-100px">عملیات</th>
                </tr>
            </thead>
            <tbody class="fw-bold text-gray-600">

                @foreach ($beds as $bed)
                    <tr>
                        <td>
                            {{ $loop->iteration }}-
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-5">
                                    <a href="{{ route('admin.bed.edit', $bed) }}"
                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder"
                                        data-kt-ecommerce-product-filter="product_name">{{ $bed->type }}</a>
                                </div>
                            </div>
                        </td>

                        <td colspan="2" class="text-start pe-5 ps-5">
                            <span class="fw-bolder">{{ $bed->capacity }}</span>
                        </td>

                        <td class="text-end ">
                            <a class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">عملیات
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
                                    <a href="{{ route('admin.bed.edit', $bed) }}" class="menu-link px-3"
                                        data-kt-ecommerce-product-filter="delete_row">ویرایش</a>

                                    <form action="{{ route('admin.bed.delete', $bed) }}" method="POST" class="d-inline"
                                        style="border: none">
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

                @if ($beds->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center py-5">نظری وجود ندارد</td>
                    </tr>
                @endif


            </tbody>
        </table>
    </div>
</div>
