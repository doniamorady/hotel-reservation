import { useEffect, useState } from "react";
import { useLocation, useParams } from "react-router-dom";
import { getBooking } from "../services/apiRoom";

const formatCurrency = (value) => {
  const number = Number(value ?? 0);
  return `${new Intl.NumberFormat("fa-IR", {
    maximumFractionDigits: 0,
  }).format(number)} تومان`;
};

const formatDate = (value) => {
  if (!value) return "-";

  const date = new Date(value);
  if (Number.isNaN(date.getTime())) return value;

  return new Intl.DateTimeFormat("fa-IR", {
    year: "numeric",
    month: "long",
    day: "numeric",
  }).format(date);
};

export default function BookingInvoice() {
  const { id } = useParams();
  const location = useLocation();
  const [booking, setBooking] = useState(location.state?.booking ?? null);
  const [loading, setLoading] = useState(!location.state?.booking);
  const [error, setError] = useState("");

  useEffect(() => {
    if (location.state?.booking) {
      setBooking(location.state.booking);
      setLoading(false);
      return;
    }

    async function loadBooking() {
      try {
        setLoading(true);
        setError("");
        const data = await getBooking(id);
        setBooking(data);
      } catch (err) {
        setError(
          err?.response?.data?.message ||
            "در بارگذاری فاکتور رزرو مشکلی پیش آمد.",
        );
      } finally {
        setLoading(false);
      }
    }

    if (id) {
      loadBooking();
    }
  }, [id, location.state]);

  if (loading) {
    return (
      <section className="py-5">
        <div className="container text-center">
          <div className="spinner-border text-primary" role="status" />
          <p className="mt-3 mb-0">در حال آماده‌سازی فاکتور رزرو...</p>
        </div>
      </section>
    );
  }

  if (error || !booking) {
    return (
      <section className="py-5">
        <div className="container">
          <div className="alert alert-danger mb-0">
            {error || "رزرو پیدا نشد."}
          </div>
        </div>
      </section>
    );
  }

  const room = booking.room ?? {};

  return (
    <section className="py-5 gray-simple">
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-lg-8">
            <div className="card border-0 shadow-sm">
              <div className="card-header bg-primary text-white">
                <h4 className="mb-0">فاکتور رزرو</h4>
              </div>
              <div className="card-body p-4">
                <div className="row g-3 mb-4">
                  <div className="col-md-6">
                    <div className="text-muted">شماره رزرو</div>
                    <div className="fw-bold">#{booking.id}</div>
                  </div>
                  <div className="col-md-6 text-md-end">
                    <div className="text-muted">وضعیت</div>
                    <span className="badge bg-success">{booking.status}</span>
                  </div>
                </div>

                <div className="border rounded p-3 mb-4">
                  <div className="row g-3">
                    <div className="col-md-6">
                      <div className="text-muted">اتاق</div>
                      <div className="fw-bold">
                        {room.name || "اتاق انتخابی"}
                      </div>
                    </div>
                    <div className="col-md-6 text-md-end">
                      <div className="text-muted">تعداد مهمان</div>
                      <div className="fw-bold">{booking.num_guests ?? 1}</div>
                    </div>
                    <div className="col-md-6">
                      <div className="text-muted">تاریخ شروع</div>
                      <div className="fw-bold">
                        {formatDate(booking.start_date)}
                      </div>
                    </div>
                    <div className="col-md-6 text-md-end">
                      <div className="text-muted">تاریخ پایان</div>
                      <div className="fw-bold">
                        {formatDate(booking.end_date)}
                      </div>
                    </div>
                  </div>
                </div>

                <div className="table-responsive">
                  <table className="table table-borderless align-middle mb-0">
                    <tbody>
                      <tr>
                        <td>قیمت اتاق</td>
                        <td className="text-end">
                          {formatCurrency(
                            booking.total_room_price ?? room.price ?? 0,
                          )}
                        </td>
                      </tr>
                      <tr>
                        <td>صبحانه</td>
                        <td className="text-end">
                          {booking.has_breakfast ? "دارد" : "ندارد"}
                        </td>
                      </tr>
                      {booking.has_breakfast && (
                        <tr>
                          <td>هزینه صبحانه</td>
                          <td className="text-end">
                            {formatCurrency(booking.total_breakfast_price ?? 0)}
                          </td>
                        </tr>
                      )}
                      <tr className="border-top">
                        <td className="fw-bold">مبلغ نهایی</td>
                        <td className="fw-bold text-end">
                          {formatCurrency(booking.total_price ?? 0)}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
