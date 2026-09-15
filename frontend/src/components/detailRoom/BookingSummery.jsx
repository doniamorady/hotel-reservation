export default function BookingSummery({
  numNights,
  roomPrice,
  breakfastPrice,
  totalPrice,
}) {
  return (
    <div className="col-12 mt-3 pt-3 border-top">
      <div className="d-flex align-items-center mb-3">
        <div className="square--30 rounded bg-light-primary text-primary d-flex align-items-center justify-content-center ms-2">
          <i className="fa-solid fa-receipt"></i>
        </div>

        <div className="fw-medium text-dark">خلاصه رزرو</div>
      </div>

      <div className="bg-light rounded-3 px-3 py-2">
        <div className="d-flex justify-content-between mb-2">
          <span className="text-muted small">{numNights} شب اقامت</span>

          <span className="text-dark small fw-medium">
            {roomPrice.toLocaleString()} ریال
          </span>
        </div>

        {breakfastPrice > 0 && (
          <div className="d-flex justify-content-between mb-2">
            <span className="text-muted small">صبحانه</span>

            <span className="text-dark small fw-medium">
              {breakfastPrice.toLocaleString()} ریال
            </span>
          </div>
        )}

        <div className="d-flex justify-content-between pt-2 mt-2 border-top">
          <span className="fw-medium text-dark">مبلغ نهایی</span>

          <span className="fw-bold text-primary">
            {totalPrice.toLocaleString()} ریال
          </span>
        </div>
      </div>
    </div>
  );
}
