<?php

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;
    public $search = '';
    public $filter = -1;
    protected $paginationTheme = 'bootstrap';

    public function changeStatus(Comment $comment)
    {
        $comment->status = $comment->status == 0 ? 1 : 0;
        $comment->save();
    }

    public function with()
    {
        return [
            'comments' => Comment::when($this->search, function ($query) {
                $query->where('body', 'like', '%' . $this->search . '%');
            })
                ->when($this->filter != -1, function ($query) {
                    $query->where('status', $this->filter);
                })
                ->with(['user', 'room'])
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
                <input type="text" class="form-control form-control-solid w-250px ps-14" wire:model.live="search"
                    placeholder="جستجو نظر" />

            </div>
        </div>
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <div class="w-100 mw-150px">
                <select id="filterSelect" class="form-select form-select-solid" wire:model.live="filter">
                    <option value="-1">همه</option>
                    <option value="1">تایید شده</option>
                    <option value="0">رد شده</option>
                    <option value="2">در انتظار بررسی</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_محصولات_table">
            <thead>
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">#</th>
                    <th colspan="2" class="text-start min-w-100px">نظر</th>
                    <th class="text-start min-w-90 ms-5">نویسنده</th>
                    <th class="text-end min-w-100px">اتاق مربوطه</th>
                    <th class="text-end min-w-100px">وضعیت کامنت</th>
                    <th class="text-end min-w-70px">تغییر وضعیت</th>
                </tr>
            </thead>
            <tbody class="fw-bold text-gray-600">

                @foreach ($comments as $comment)
                    <tr>
                        <td>
                            {{ $loop->iteration }}-
                        </td>

                        <td colspan="2">
                            <div class="d-flex align-items-center">

                                <div class="ms-5">
                                    <a href="" class="text-gray-800 text-hover-primary fs-5 fw-bolder"
                                        data-kt-ecommerce-product-filter="product_name">{!! $comment->body !!}</a>
                                </div>

                            </div>
                        </td>

                        <td class="text-start">
                            <span class="fw-bolder text-dark">{{ $comment->user->full_name }}</span>
                        </td>

                        <td class="text-center pe-0" data-order="rating-3">
                            <span class="fw-bolder">{{ $comment->room->name }}</span>
                        </td>

                        <td class="text-center pe-0" data-order="در انتظار">
                            <div class="badge badge-light-{{ $comment->color_status_comment }} fw-bolder">
                                {{ $comment->status_comment }}
                            </div>
                        </td>

                        <td class="text-end">
                            <div class="menu-item px-3">
                                <button type="button" wire:click="changeStatus({{ $comment->id }})"
                                    class="btn btn-sm btn-light-primary"
                                    data-kt-ecommerce-product-filter="delete_row">تغییر وضعیت</button>
                            </div>
                        </td>
                    </tr>
                @endforeach

                @if ($comments->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center py-5">نظری وجود ندارد</td>
                    </tr>
                @endif


            </tbody>
        </table>
        {{ $comments->links() }}
    </div>
</div>
