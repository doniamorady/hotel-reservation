import { useLocation } from "react-router-dom";
import BookingSummary from "../components/prepare/BookingSummary";
import BookerInformation from "../components/prepare/BookerInformation";
import { useMe } from "../hooks/useMe";
import Loader from "../components/Loader";

export default function PrepareBooking() {
  const location = useLocation();
  const bookingData = location.state;

  const { data, isLoading, isError } = useMe();
  
  if (isLoading) return <Loader />;
  if (isError) return <div>خطا در دریافت اطلاعات</div>;
  
  const user = data?.user;

  return (
    <main className="py-5 mb-5">
      <div className="container">
        <div className="row g-4 flex-row-reverse">
          {/* خلاصه رزرو */}

          <div className="col-lg-5">
            <BookingSummary bookingData={bookingData} />
          </div>

          {/* اطلاعات رزرو کننده */}

          <div className="col-lg-7">
            <BookerInformation user={user} bookingData={bookingData} />
          </div>
        </div>
      </div>
    </main>
  );
}
