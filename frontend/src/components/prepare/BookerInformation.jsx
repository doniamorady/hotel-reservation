import { useBooking } from "../../hooks/useBooking";
import BookingNotice from "./BookingNotice";
import LoadingButton from "../LoadingButton";
import { useState } from "react";
import { useNavigate } from "react-router-dom";
export default function BookerInformation({ user, bookingData }) {
  const [createBooking] = useBooking(bookingData);
  const [isLoading, setIsLoading] = useState(false);
  const navigate = useNavigate();

  async function handleBooking(e) {
    e.preventDefault();

    setIsLoading(true);

    try {
      const res = await createBooking();
      navigate('/booking-success', {state:res})
    } finally {
      setIsLoading(false);
    }
  }

  return (
    <div className="card border-0 shadow-sm rounded-4">
      <div className="card-body p-4">
        <div className="mb-4">
          <h4 className="fw-bold text-dark mb-2">اطلاعات رزرو کننده</h4>

          <p className="text-muted small mb-0">
            اطلاعات تماس برای تکمیل و پیگیری رزرو استفاده می‌شود.
          </p>
        </div>

        <div className="row g-4">
          <div className="col-md-6">
            <label className="form-label text-dark fw-medium">
              نام و نام خانوادگی
            </label>

            <input
              className="form-control"
              value={
                user?.first_name && user?.last_name
                  ? `${user.first_name} ${user.last_name}`
                  : ""
              }
              readOnly
            />
          </div>

          <div className="col-md-6">
            <label className="form-label text-dark fw-medium">
              شماره موبایل
            </label>

            <input
              className="form-control"
              value={user?.phone || ""}
              readOnly
            />
          </div>

          <div className="col-12">
            <label className="form-label text-dark fw-medium">
              درخواست یا توضیحات برای هتل
            </label>

            <textarea
              className="form-control"
              rows="5"
              placeholder="درخواست خاصی دارید؟ برای مثال اتاق طبقه بالا، تخت اضافه یا ساعت ورود متفاوت..."
            />
          </div>

          <BookingNotice />

          <div className="col-12">
            <LoadingButton
              message1={"تایید و ادامه پرداخت"}
              message2="لطفا صبر کنید"
              isLoading={isLoading}
              onClick={handleBooking}
            />

            {/* <button
              className="btn btn-primary w-100 py-3 rounded-3 fw-semibold"
              onClick={handleBooking}
            >
              تایید رزرو و ادامه پرداخت
            </button> */}
          </div>
        </div>
      </div>
    </div>
  );
}
