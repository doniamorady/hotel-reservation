import persian_fa from "react-date-object/locales/persian_fa";
import persian from "react-date-object/calendars/persian";
import DateObject from "react-date-object";
import { useState } from "react";
import BookingSummery from "./BookingSummery";
import DateSection from "./DateSection";
import GuestsSection from "./GuestsSection";
import BreakfastSection from "./BreakfastSection";
import { useRoomAvailability } from "../../hooks/useRoomAvailability";
import BookingButton from "./BookingButton";
import { calculateNights, calculateBookingPrice } from "../../utils/booking";
import { useSettings } from "../../hooks/useSettings";
import { useMe } from "../../hooks/useMe";
import { toGregorian } from "../../utils/date";

export default function BookingCard({ room }) {
  const [hasBreakfast, setHasBreakfast] = useState(false);
  const [numGuests, setNumGuests] = useState(1);

  const today = new DateObject({ calendar: persian, locale: persian_fa });
  const tomorrow = new DateObject({
    calendar: persian,
    locale: persian_fa,
  }).add(1, "day");

  const [startDate, setStartDate] = useState(today);
  const [endDate, setEndDate] = useState(tomorrow);
  const { data: settingsData } = useSettings();
  const settings = settingsData?.data;
  const { data: userData } = useMe();
  const user = userData?.user ?? null;

  //check room availability
  const errors = useRoomAvailability(startDate, endDate, room);
  const numNights = calculateNights(startDate, endDate);

  const { breakfastPrice, totalPrice } = calculateBookingPrice(
    hasBreakfast,
    settings?.breakfast_unit_price,
    numGuests,
    numNights,
    room.price,
  );
  const bookingData = {
    roomName: room.name,
    room_id: room.id,
    user_id: user?.id,
    roomImage: room.cover_image,
    start_date: toGregorian(startDate),
    end_date: toGregorian(endDate),
    num_guests: numGuests,
    num_nights: numNights,
    has_breakfast: hasBreakfast,
    breakfast_unit_price: settings?.breakfast_unit_price,
    total_breakfast_price: breakfastPrice,
    room_unit_price: room.price,
    total_room_price: numNights * room.price,
    totalPrice,
  };
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
            <div className="row g-3">
              <DateSection
                label="تاریخ شروع اقامت"
                startDate={startDate}
                setStartDate={setStartDate}
              />

              <DateSection
                label="تاریخ پایان اقامت"
                startDate={endDate}
                setStartDate={setEndDate}
              />

              {(errors.availability || errors.startDate) && (
                <div className="col-12">
                  <div className="d-flex align-items-center gap-2 py-2 px-3 rounded-3 bg-light-danger">
                    <i className="fa-solid fa-calendar-xmark text-danger"></i>

                    <span className="text-danger text-sm">
                      {errors.availability
                        ? errors.availability
                        : errors.startDate}
                    </span>
                  </div>
                </div>
              )}

              {/* Guests */}
              <GuestsSection
                room={room}
                numGuests={numGuests}
                setNumGuests={setNumGuests}
              />

              {/* Breakfast */}
              <BreakfastSection
                hasBreakfast={hasBreakfast}
                breakfast_unit_price={settings?.breakfast_unit_price}
                setHasBreakfast={setHasBreakfast}
              />

              {numNights > 0 && (
                <BookingSummery
                  numNights={numNights}
                  roomPrice={numNights * room.price}
                  breakfastPrice={breakfastPrice}
                  totalPrice={totalPrice}
                />
              )}
              <BookingButton
                bookingData={bookingData}
                errors={errors}
                user={user}
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
