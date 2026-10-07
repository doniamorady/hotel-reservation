export default function Header({ length }) {
  const filters = [
    {
      id: "all",
      title: "همه",
      count: length,
    },
    {
      id: "pending",
      title: "در انتظار",
      count: 2,
    },
    {
      id: "confirmed",
      title: "تایید شده",
      count: 8,
    },
    {
      id: "cancelled",
      title: "لغو شده",
      count: 1,
    },
    {
      id: "completed",
      title: "پایان یافته",
      count: 5,
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
        {/* Header Top */}

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

        {/* Filters */}

        <div
          className="d-flex flex-wrap gap-3 mt-4 pt-3"
          style={{
            borderTop: "1px solid #f0f2f5",
          }}
        >
          {filters.map((item, index) => (
            <button
              key={item.id}
              className="d-flex align-items-center gap-2 rounded-pill"
              style={{
                border: index === 0 ? "1px solid #1d6fdc" : "1px solid #e4e9f0",

                background: index === 0 ? "#1d6fdc" : "#fff",

                color: index === 0 ? "#fff" : "#556070",

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

                  background: index === 0 ? "rgba(255,255,255,.18)" : "#f1f4f8",

                  color: index === 0 ? "#fff" : "#667085",

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
