export default function BookingGuest({ num_guests, has_breakfast }) {
  return (
    <div className="border-top pt-3">
      <div className="d-flex align-items-center mb-3">
        <div
          className="rounded-circle d-flex align-items-center justify-content-center ms-3"
          style={{
            width: "34px",
            height: "34px",
            background: "#f3f4f6",
          }}
        >
          <i className="fa-solid fa-user text-muted"></i>
        </div>

        <div>
          <div className="text-muted small">تعداد مهمان</div>

          <div className="small fw-medium">{num_guests} نفر</div>
        </div>
      </div>

      {/* Breakfast */}

      <div
        className="rounded-3 p-3 d-flex justify-content-between align-items-center"
        style={{
          backgroundColor: has_breakfast ? "#ecfdf3" : "#fafafa",

          border: has_breakfast ? "1px solid #bbf7d0" : "1px solid #e5e7eb",
        }}
      >
        <div className="d-flex align-items-center">
          <div
            className="rounded-circle d-flex align-items-center justify-content-center ms-3"
            style={{
              width: "36px",
              height: "36px",
              backgroundColor: has_breakfast ? "#dcfce7" : "#f9f6f1",
            }}
          >
            <i
              className={`fa-solid fa-mug-hot ${
                has_breakfast ? "text-success" : "text-muted"
              }`}
            ></i>
          </div>

          <div>
            <div className="small fw-medium">صبحانه</div>

            <div className="text-muted small">
              {has_breakfast
                ? "برای تمام شب‌های اقامت"
                : "در این رزرو وجود ندارد"}
            </div>
          </div>
        </div>

        {has_breakfast ? (
          <span className="text-success small fw-medium">شامل می‌شود</span>
        ) : (
          <span className="text-muted small">ندارد</span>
        )}
      </div>
    </div>
  );
}
