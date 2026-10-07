import { toPersian } from "../../../utils/date";
import Item from "./Item";

export default function SingleBooking({ booking }) {
  console.log(booking)
  const status = {
    confirmed: {
      text: "تایید شده",
      color: "#198754",
      bg: "#eef8f1",
    },
    pending: {
      text: "در انتظار",
      color: "#b58105",
      bg: "#fff8e6",
    },
    cancelled: {
      text: "لغو شده",
      color: "#dc3545",
      bg: "#fff0f1",
    },
  };

  const currentStatus = status[booking.status] || status.pending;

  return (
    <div className="card border rounded-4 mb-3 bg-white">
      <div className="card-body p-3">
        {/* Header */}
        <div className="d-flex justify-content-between align-items-center mb-3">
          <div className="d-flex align-items-center gap-3">
            <img
              src={booking.room.cover_image}
              alt={booking.room.name}
              className="rounded-3"
              style={{
                width: "75px",
                height: "65px",
                objectFit: "cover",
              }}
            />

            <div>
              <h6 className="mb-1 fw-semibold">{booking.room.name}</h6>

              <span
                style={{
                  fontSize: "12px",
                  color: "#777",
                }}
              >
                کد رزرو:
                <span className="text-dark me-1">#{booking.id}</span>
              </span>
            </div>
          </div>

          <span
            className="rounded-pill px-3 py-1"
            style={{
              fontSize: "12px",
              background: currentStatus.bg,
              color: currentStatus.color,
            }}
          >
            {currentStatus.text}
          </span>
        </div>

        {/* Details */}

        <div className="row g-2">
          <Item label="ورود" value={toPersian(booking.start_date)} />

          <Item label="خروج" value={toPersian(booking.end_date)} />

          <Item label="اقامت" value={`${booking.num_nights} شب`} />

          <Item label="مهمان" value={`${booking.num_guests} نفر`} />

          <Item
            label="صبحانه"
            value={booking.has_breakfast ? "دارد" : "ندارد"}
          />

          <Item
            label="مبلغ"
            value={`${booking.total_price.toLocaleString()} تومان`}
          />
        </div>
      </div>
    </div>
  );
}
