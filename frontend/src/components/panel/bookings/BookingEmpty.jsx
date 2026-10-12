export default function BookingEmpty() {
  return (
    <div className="card border-0 shadow-sm rounded-4">
      <div className="card-body text-center py-5">
        <div
          className="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center"
          style={{
            width: "70px",
            height: "70px",
            background: "#edf5ff",
          }}
        >
          <i
            className="fa-solid fa-calendar-xmark"
            style={{
              fontSize: "28px",
              color: "#1d6fdc",
            }}
          ></i>
        </div>

        <h6
          className="mb-2"
          style={{
            color: "#172033",
            fontWeight: 600,
          }}
        >
          اتاقی با این وضعیت ثبت نکرده‌اید
        </h6>

        <p
          className="text-muted small mb-4"
          style={{
            lineHeight: "1.8",
          }}
        >
          برای مشاهده هتل‌ها و رزرو اتاق مناسب، می‌توانید از لیست اتاق‌ها شروع
          کنید
        </p>

        <a
          href="/rooms"
          className="btn rounded-3 px-4"
          style={{
            background: "#1d6fdc",
            color: "#fff",
            fontSize: "13px",
          }}
        >
          مشاهده اتاق‌ها
        </a>
      </div>
    </div>
  );
}
