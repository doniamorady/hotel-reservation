import { useState } from "react";
import Loader from "../components/Loader";
import Header from "../components/panel/bookings/Header";
import SingleBooking from "../components/panel/bookings/singleBooking";
import SideBar from "../components/panel/Sidebar";
import { useGetMyBooking, useStatusBookings } from "../hooks/useBooking";
import FavoriteEmpty from "../components/panel/favorites/FavoriteEmpty";
import BookingEmpty from "../components/panel/bookings/BookingEmpty";
export default function MyBooking() {
  const [status, setStatus] = useState("all");
  const { data: bookings, isLoading } = useGetMyBooking(status);
  const { data: allBookings, isLoading: allBookingsLoading } =
    useGetMyBooking("all");
  const { data: statusBookings, isLoading: statusBookingsLoading } =
    useStatusBookings();

  if (isLoading || statusBookingsLoading || allBookingsLoading)
    return <Loader />;
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
                <Header
                  length={allBookings.length}
                  statusBookings={statusBookings}
                  status={status}
                  setStatus={setStatus}
                />

                <div className="row align-items-center justify-content-start">
                  <div className="col-xl-12 col-lg-12 col-md-12">
                    {bookings?.map((booking) => (
                      <SingleBooking booking={booking} key={booking.id} />
                    ))}
                    {bookings.length === 0 && <BookingEmpty />}
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
