export default function Header({ length, statusBookings, status, setStatus }) {
  const filters = [
    {
      id: "all",
      title: "همه",
      count: length,
    },
    {
      id: "pending",
      title: "در انتظار پرداخت",
      count: statusBookings?.pending ?? 0,
    },
    {
      id: "confirmed",
      title: "تایید شده",
      count: statusBookings?.confirmed ?? 0,
    },
    {
      id: "check_in",
      title: "در حال اقامت",
      count: statusBookings?.checkIn ?? 0,
    },
    {
      id: "check_out",
      title: "پایان اقامت",
      count: statusBookings?.checkOut ?? 0,
    },
    {
      id: "cancelled",
      title: "لغو شده",
      count: statusBookings?.cancelled ?? 0,
    },
    {
      id: "expired",
      title: "منقضی شده",
      count: statusBookings?.expired ?? 0,
    },
  ];

  return (
    <div
      className="bg-white rounded-4 mb-4"
      style={{
        border: "1px solid #e8edf3",
      }}
    >
      <div className="p-3 p-md-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
          <div>
            <h5
              className="mb-1"
              style={{
                fontSize: "16px",
                fontWeight: 600,
                color: "#172033",
              }}
            >
              رزروهای من
            </h5>

            <p
              className="mb-0 text-muted"
              style={{
                fontSize: "12px",
              }}
            >
              مدیریت و مشاهده رزروهای ثبت شده
            </p>
          </div>

          <div
            className="d-flex align-items-center gap-2 rounded-pill px-3 py-2"
            style={{
              background: "#edf5ff",
              color: "#1d6fdc",
              fontSize: "12px",
            }}
          >
            <i className="fa-solid fa-calendar-check"></i>

            <span>{length} رزرو</span>
          </div>
        </div>

        <div
          className="d-flex flex-wrap gap-3 mt-4 pt-3"
          style={{
            borderTop: "1px solid #f0f2f5",
          }}
        >
          {filters.map((item) => (
            <button
              key={item.id}
              onClick={() => setStatus(item.id)}
              className="d-flex align-items-center gap-2 rounded-pill"
              style={{
                border:
                  status === item.id
                    ? "1px solid #1d6fdc"
                    : "1px solid #e4e9fitem.id",

                background: status === item.id ? "#1d6fdc" : "#fff",

                color: status === item.id ? "#fff" : "#556070",

                padding: "6px 12px",

                fontSize: "12px",

                transition: ".2s",
              }}
            >
              <span>{item.title}</span>

              <span
                className="d-flex align-items-center justify-content-center rounded-circle"
                style={{
                  width: "19px",
                  height: "19px",

                  background:
                    status === item.id ? "rgba(255,255,255,.18)" : "#f1f4f8",

                  color: status === item.id ? "#fff" : "#667085",

                  fontSize: "10px",
                }}
              >
                {item.count}
              </span>
            </button>
          ))}
        </div>
      </div>
    </div>
  );
}
