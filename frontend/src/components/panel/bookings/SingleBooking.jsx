import { Link } from "react-router-dom";
import { toPersian } from "../../../utils/date";

export default function SingleBooking({ booking }) {
  const status = {
    confirmed: {
      title: "تایید شده",
      bg: "#edf5ff",
      color: "#1d6fdc",
    },
    pending: {
      title: "در انتظار",
      bg: "#fff7e8",
      color: "#b77900",
    },
    cancelled: {
      title: "لغو شده",
      bg: "#fff1f2",
      color: "#dc3545",
    },
  };

  const currentStatus = status[booking.status] || status.pending;

  return (
    <div
      className="bg-white rounded-4 mb-3"
      style={{
        border: "1px solid #e8edf3",
      }}
    >
      <div className="p-3">
        <div className="d-flex align-items-center gap-3">
          {/* Image */}

          <img
            src={booking.room.cover_image}
            alt={booking.room.name}
            className="rounded-3"
            style={{
              width: "120px",
              height: "90px",
              objectFit: "cover",
            }}
          />

          {/* Main Info */}

          <div className="flex-grow-1">
            <div className="d-flex justify-content-between align-items-start">
              <div>
                <h6
                  className="mb-2"
                  style={{
                    fontSize: "15px",
                    fontWeight: 600,
                  }}
                >
                  {booking.room.name}
                </h6>

                <span
                  className="rounded-pill"
                  style={{
                    background: currentStatus.bg,
                    color: currentStatus.color,
                    fontSize: "11px",
                    padding: "4px 10px",
                  }}
                >
                  {currentStatus.title}
                </span>
              </div>

              <div className="text-end">
                <div
                  className="text-muted"
                  style={{
                    fontSize: "11px",
                  }}
                >
                  مبلغ کل
                </div>

                <div
                  style={{
                    color: "#1d6fdc",
                    fontSize: "16px",
                    fontWeight: 600,
                  }}
                >
                  {booking.total_price.toLocaleString()}

                  <span
                    style={{
                      fontSize: "11px",
                      marginRight: "3px",
                    }}
                  >
                    تومان
                  </span>
                </div>
              </div>
            </div>

            <div className="d-flex flex-wrap gap-4 mt-3">
              <SmallInfo
                label="شروع اقامت"
                value={toPersian(booking.start_date)}
              />

              <SmallInfo
                label="پایان اقامت"
                value={toPersian(booking.end_date)}
              />

              <SmallInfo
                label="صبحانه"
                value={booking.has_breakfast ? "دارد" : "ندارد"}
              />
            </div>
          </div>
        </div>

        <div
          className="d-flex justify-content-end mt-3 pt-3"
          style={{
            borderTop: "1px solid #f0f2f5",
          }}
        >
          <Link
            to={`/bookings/${booking.id}`}
            className="text-decoration-none"
            style={{
              fontSize: "12px",
              color: "#1d6fdc",
            }}
          >
            مشاهده جزئیات رزرو
            <i className="fa-solid fa-angle-left me-2"></i>
          </Link>
        </div>
      </div>
    </div>
  );
}

function SmallInfo({ label, value }) {
  return (
    <div>
      <div
        className="text-muted"
        style={{
          fontSize: "11px",
        }}
      >
        {label}
      </div>

      <div
        style={{
          fontSize: "12px",
          fontWeight: 500,
          color: "#273142",
        }}
      >
        {value}
      </div>
    </div>
  );
}
