<script>
$(document).ready(function() {
    $('.delete').on('click', function(e) {
        e.preventDefault();
     
        var form = $(this).closest('form'); 

        Swal.fire({
            title: 'آیا از حذف کردن داده مطمئن هستید؟',
            text: "شما میتوانید درخواست خود را لغو نمایید",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'بله داده حذف شود.',
            cancelButtonText: 'خیر درخواست لغو شود.',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); 
            }
        });
    });
});


</script>
