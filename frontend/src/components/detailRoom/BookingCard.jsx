import DatePickerModule from "react-multi-date-picker";
import persian_fa from "react-date-object/locales/persian_fa";
import persianModule from "react-date-object/calendars/persian";
import DateObject from "react-date-object";
import { useEffect, useState } from "react";
import { getSettings } from "../../services/apiSetting";
import BreakfastInfo from "./BreakfastInfo";
import BookingSummery from "./BookingSummery";
import BookingError from "./BookingError";
import CardFooter from "./CardFooter";

const persian = persianModule.default;
const DatePicker = DatePickerModule.default;

export default function BookingCard({ room }) {
  const [hasBreakfast, setHasBreakfast] = useState(false);
  const [numGuests, setNumGuests] = useState(1);
  const [settings, setSettings] = useState({});
  const [errors, setErrors] = useState({});

  const today = new DateObject({ calendar: persian, locale: persian_fa });
  const tomorrow = new DateObject({
    calendar: persian,
    locale: persian_fa,
  }).add(1, "day");

  const [startDate, setStartDate] = useState(today);
  const [endDate, setEndDate] = useState(tomorrow);

  useEffect(() => {
    async function loadSettings() {
      const res = await getSettings();
      setSettings(res.data);
    }
    loadSettings();
  }, []);

  useEffect(() => {
    const newErrors = {};
    if (endDate.toDate() <= startDate.toDate()) {
      newErrors.startDate = "تاریخ خروج باید بعد از تاریخ ورود باشد";
    }

    if (numGuests > room.capacity) {
      newErrors.numGuests = `حداکثر ظرفیت این اتاق ${room.capacity} نفر است`;
    }
    setErrors(newErrors);
  }, [startDate, endDate, numGuests]);

  const calculateNights = () => {
    if (!startDate || !endDate) return 0;

    const start = startDate.toDate();
    const end = endDate.toDate();
    start.setHours(0, 0, 0, 0);
    end.setHours(0, 0, 0, 0);

    const diffTime = end - start;
    const diffDays = Math.ceil(diffTime / (24 * 60 * 60 * 1000));

    return diffDays;
  };

  const numNights = calculateNights();
  let breakfastPrice = 0;

  if (hasBreakfast)
    breakfastPrice = settings.breakfast_unit_price * numGuests * numNights;

  const totalPrice = numNights * room.price + breakfastPrice;

  return (
    <div className="col-xl-4 col-lg-5 col-md-12">
      <div className="card border br-dashed">
        <div className="card-body">
          <div className="d-block mb-3">
            <div className="d-flex align-items-center justify-content-start">
              <div className="text-dark fs-3 ms-2">
                {room.price.toLocaleString()} تومان
              </div>

              <div className="text-warning">10 درصد مالیات</div>
            </div>
          </div>

          <div className="d-block">
            <form>
              <div className="row g-3">
                <div className="col-12">
                  <label className="form-label text-dark fw-medium mb-1 text-sm">
                    {" "}
                    تاریخ شروع اقامت
                  </label>

                  <DatePicker
                    locale={persian_fa}
                    calendar={persian}
                    value={startDate}
                    onChange={setStartDate}
                    currentDate={new Date()}
                    format="YYYY/MM/DD"
                    inputClass="form-control"
                    containerClassName="w-100"
                    placeholder="انتخاب تاریخ شروع"
                  />
                </div>

                <div className="col-12">
                  <label className="form-label text-dark fw-medium mb-1 text-sm">
                    {" "}
                    تاریخ پایان اقامت
                  </label>

                  <DatePicker
                    locale={persian_fa}
                    calendar={persian}
                    value={endDate}
                    onChange={setEndDate}
                    format="YYYY/MM/DD"
                    inputClass="form-control"
                    containerClassName="w-100"
                    placeholder="انتخاب تاریخ پایان"
                  />
                  {errors?.startDate && (
                    <small className="text-danger d-block mt-1 text-xs">
                      <i className="fa-solid fa-circle-exclamation ms-1"></i>
                      {errors.startDate}
                    </small>
                  )}
                </div>

                <div className="col-12">
                  <label className="form-label text-dark fw-medium mb-1 text-sm">
                    {" "}
                    تعداد مهمان
                  </label>
                  <input
                    type="number"
                    value={numGuests}
                    onChange={(e) => setNumGuests(Number(e.target.value))}
                    min="1"
                    max="10"
                    className="form-control  booking-input"
                  />
            
                    {errors?.numGuests && (
                    <small className="text-danger d-block mt-1 text-xs">
                      <i className="fa-solid fa-circle-exclamation ms-1"></i>
                      {errors.numGuests}
                    </small>
                  )}
                </div>

                <div
                  className={`d-flex align-items-center justify-content-between border rounded-3 px-2 py-1 cursor-pointer  ${
                    hasBreakfast
                      ? "bg-light-warning border-warning"
                      : "bg-light"
                  }`}
                  onClick={() => setHasBreakfast((prev) => !prev)}
                >
                  <div className="d-flex align-items-center">
                    <div className="square--30 rounded bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center ms-2">
                      {" "}
                      <i className="fa-solid fa-mug-hot"></i>
                    </div>

                    <div className="fw-medium text-dark text-xs">صبحانه</div>

                    <small className="text-muted text-xs">هر نفر / شب</small>
                  </div>

                  <div className="d-flex align-items-center gap-5">
                    <span className="fw-bold text-success text-sm">
                      {settings.breakfast_unit_price?.toLocaleString()} ریال
                    </span>

                    <input
                      type="checkbox"
                      checked={hasBreakfast}
                      onChange={(e) => {
                        e.stopPropagation();
                        setHasBreakfast(e.target.checked);
                      }}
                      className="form-check-input"
                    />
                  </div>
                </div>

                {numNights > 0 && (
                  <BookingSummery
                    numNights={numNights}
                    roomPrice={numNights * room.price}
                    breakfastPrice={breakfastPrice}
                    totalPrice={totalPrice}
                  />
                )}

                {/* {error && <BookingError error={error} />} */}

                <div className="col-12">
                  <button
                    type="submit"
                    className="btn btn-primary full-width fw-medium"
                  >
                    رزرو هتل
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
}
