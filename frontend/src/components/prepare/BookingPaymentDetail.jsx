export default function BookingPaymentDetail({
  total_room_price,
  has_breakfast,
  total_breakfast_price,
  totalPrice,
}) {
  return (
    <div className="mt-4">
      <div
        className="rounded-4 p-3"
        style={{
          boxShadow: "0 4px 15px rgba(0,0,0,.06)",
          border: "1px solid rgba(0,0,0,.06)",
        }}
      >
        <h6 className="fw-medium mb-3">خلاصه پرداخت</h6>

        <div className="d-flex justify-content-between mb-2">
          <span className="text-muted small">هزینه اتاق</span>

          <span className="small">
            {total_room_price?.toLocaleString()} تومان
          </span>
        </div>

        {has_breakfast && (
          <div className="d-flex justify-content-between mb-2">
            <span className="text-muted small">صبحانه</span>

            <span className="small">
              {total_breakfast_price?.toLocaleString()} تومان
            </span>
          </div>
        )}

        <div className="border-top mt-3 pt-3">
          <div className="d-flex justify-content-between">
            <span className="text-muted small">مبلغ قابل پرداخت</span>

            <span className="fw-semibold fs-5 text-primary">
              {totalPrice?.toLocaleString()} تومان
            </span>
          </div>
        </div>
      </div>
    </div>
  );
}
