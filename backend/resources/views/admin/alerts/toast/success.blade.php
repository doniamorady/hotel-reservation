@if(session('toast-success'))
    <div style="position: fixed; bottom: 1.5rem; left: 1.5rem; z-index: 1080;">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" 
             data-bs-delay="5000"
             {{-- استایل‌های بهتر: حذف Border و استفاده از Shadow ملایم --}}
             style="max-width: 350px; border: none; border-radius: 0.75rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            
            <div class="toast-body p-0">
                <div class="d-flex align-items-center bg-light-success rounded p-5">
                    
        
                    
                    <div class="d-flex flex-column flex-grow-1">
                        <span class="fw-bolder text-success mb-1">✅ عملیات موفقیت‌آمیز</span>
                        <span class="fw-semibold text-gray-600 fs-7">{{ session('toast-success') }}</span>
                    </div>

                    <button type="button" class="btn-close ms-auto p-1" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // اطمینان از تعریف بودن کلاس Bootstrap.Toast قبل از استفاده
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