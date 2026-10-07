import Loader from "../components/Loader";
import Header from "../components/panel/bookings/Header";
import SingleBooking from "../components/panel/bookings/singleBooking";
import SideBar from "../components/panel/Sidebar";
import { useGetMyBooking } from "../hooks/useBooking";

export default function MyBooking() {
  const { data: bookings, isLoading } = useGetMyBooking();
  if (isLoading) return <Loader />;
  return (
    <section className="pt-5 gray-simple position-relative">
      <div className="container">
        <div className="row align-items-start justify-content-between gx-xl-4">
          <SideBar />

          <div className="col-xl-9 col-lg-9 col-md-12">
            <div className="card">
              <div className="card-header">
                <h4>
                  <i className="fa-solid fa-ticket ms-2"></i>لیست رزروها
                </h4>
              </div>
              <div className="card-body">
                <Header length={bookings.length} />

                <div className="row align-items-center justify-content-start">
                  <div className="col-xl-12 col-lg-12 col-md-12">
                    {bookings?.map((booking) => (
                      <SingleBooking booking={booking} key={booking.id} />
                    ))}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
