export default function BookingNotice() {
  return (
    <div className="col-12">
      <div
        className="rounded-3 p-3"
        style={{
          backgroundColor: "#fff8e6",
          border: "1px solid #ffe3a3",
        }}
      >
        <div className="d-flex align-items-start">
          <i className="fa-solid fa-triangle-exclamation text-warning ms-3 mt-1"></i>

          <div>
            <div className="fw-medium text-dark mb-1">قبل از ثبت رزرو</div>

            <div className="text-muted small">
              لطفاً اطلاعات اقامت و مبلغ پرداختی را بررسی کنید. پس از ثبت رزرو،
              هماهنگی‌های لازم توسط هتل انجام خواهد شد.
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
