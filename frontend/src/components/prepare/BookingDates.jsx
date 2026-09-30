import { toPersian } from "../../utils/date";

export default function BookingDates({ bookingData }) {
  return (
    <div className="row g-2 mb-4">
      {[
        {
          icon: "fa-regular fa-calendar",
          title: "ورود",
          value: toPersian(bookingData.start_date),
        },
        {
          icon: "fa-regular fa-calendar-check",
          title: "خروج",
          value: toPersian(bookingData.end_date),
        },
        {
          icon: "fa-regular fa-moon",
          title: "اقامت",
          value: `${bookingData.num_nights} شب`,
        },
      ].map((item) => (
        <div className="col-4" key={item.title}>
          <div className="border rounded-3 p-2 text-center">
            <i className={`${item.icon} text-muted mb-2`}></i>

            <div className="text-muted small">{item.title}</div>

            <div className="small fw-medium">{item.value}</div>
          </div>
        </div>
      ))}
    </div>
  );
}
