import BookingDates from "./BookingDates";
import BookingGuest from "./BookingGuest";
import BookingImage from "./BookingImage";
import BookingPaymentDetail from "./BookingPaymentDetail";

export default function BookingSummary({ bookingData }) {
  return (
    <div
      className="card border-0 shadow-sm rounded-4 overflow-hidden"
      style={{
        position: "sticky",
        top: "90px",
      }}
    >
      {/* Image */}

      <BookingImage
        roomImage={bookingData.roomImage}
        roomName={bookingData.roomName}
      />

      <div className="card-body p-4">
        <h6 className="fw-semibold text-dark mb-3">خلاصه رزرو</h6>

        {/* Dates */}

        <BookingDates bookingData={bookingData} />

        {/* Guest */}

        <BookingGuest
          num_guests={bookingData.num_guests}
          has_breakfast={bookingData.has_breakfast}
        />

        {/* Payment */}

        <BookingPaymentDetail
          totalPrice={bookingData.totalPrice}
          has_breakfast={bookingData.has_breakfast}
          total_room_price={bookingData.total_room_price}
          total_breakfast_price={bookingData.total_breakfast_price}
        />
      </div>
    </div>
  );
}
