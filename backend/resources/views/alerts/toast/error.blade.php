@if(session('toast-error'))
    <div style="position: fixed; bottom: 1.5rem; left: 1.5rem; z-index: 1080;">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" 
             data-bs-delay="7000"
             style="max-width: 350px; border: none; border-radius: 0.75rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            
            <div class="toast-body p-0">
                <div class="d-flex align-items-center bg-light-danger rounded p-5">
                    
                    <span class="svg-icon svg-icon-3hx svg-icon-danger me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M20.5543 4.31631L12.2858 2.05626C11.8906 1.94098 11.4882 1.94098 11.0929 2.05626L2.82441 4.31631C2.39957 4.43635 2.11543 4.84759 2.11543 5.30541V11.2327C2.11543 17.0371 6.8488 21.6859 12.0001 21.6859C17.1513 21.6859 21.8847 17.0371 21.8847 11.2327V5.30541C21.8847 4.84759 21.6006 4.43635 21.1757 4.31631ZM12.0001 16.5C11.4478 16.5 11.0001 16.0523 11.0001 15.5V9.5C11.0001 8.94772 11.4478 8.5 12.0001 8.5C12.5524 8.5 13.0001 8.94772 13.0001 9.5V15.5C13.0001 16.0523 12.5524 16.5 12.0001 16.5Z" fill="currentColor"/>
                            <rect x="11" y="7" width="2" height="2" rx="1" fill="currentColor"/>
                        </svg>
                    </span>
                    
                    <div class="d-flex flex-column flex-grow-1">
                        {{-- عنوان خطا با رنگ قرمز برای تاکید بیشتر --}}
                        <span class="fw-bolder text-danger mb-1">❌ خطای سیستمی رخ داد</span> 
                        {{-- نمایش پیام خطا از سشن --}}
                        <span class="fw-semibold text-gray-700 fs-7">{{ session('toast-error') }}</span>
                    </div>

                    <button type="button" class="btn-close ms-auto p-1" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof bootstrap !== 'undefined' && bootstrap.Toast) {
                var toastElList = [].slice.call(document.querySelectorAll('.toast'));
                toastElList.forEach(function (toastEl) {
                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();
                });
            }
        });
    </script>
@endif