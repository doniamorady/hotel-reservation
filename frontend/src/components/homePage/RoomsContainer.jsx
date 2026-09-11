import { Swiper, SwiperSlide } from "swiper/react";
import { Pagination, Navigation } from "swiper/modules";
import Room from "../../components/Room";
import { Link } from "react-router-dom";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import { useRef } from "react";

export default function RoomsContainer({ rooms }) {
  const prevBtn = useRef(null);
  const nextBtn = useRef(null);

  return (
    <section className="py-0 pt-5">
      <div className="container">
        <div className="row align-items-center justify-content-between mb-3">
          <div className="col-8">
            <div className="upside-heading">
              <h5 className="fw-bold fs-6 m-0">اجاره روزانه در هتل</h5>
            </div>
          </div>
          <div className="col-4">
            <div className="text-start grpx-btn">
              <Link
                to="rooms"
                className="btn btn-light-primary btn-md fw-medium p-3"
              >
                بیشتر
              </Link>
            </div>
          </div>
        </div>

        <div className="row justify-content-center">
          <div className="col-xl-12 col-lg-12 col-md-12 p-0">
            <div className="d-flex justify-content-end gap-2 mb-3">
              <button
                ref={prevBtn}
                className="prev-btn btn btn-light rounded-circle"
              >
                <i className="fa-solid fa-chevron-right"></i>
              </button>

              <button
                ref={nextBtn}
                className="next-btn btn btn-light rounded-circle"
              >
                <i className="fa-solid fa-chevron-left"></i>
              </button>
            </div>

            <Swiper
              modules={[Pagination, Navigation]}
              spaceBetween={20}
              slidesPerView={1}
              onBeforeInit={(swiper) => {
                swiper.params.navigation.prevEl = prevBtn.current;
                swiper.params.navigation.nextEl = nextBtn.current;
              }}
              navigation={{
                prevEl: ".prev-btn",
                nextEl: ".next-btn",
              }}
              pagination={{ clickable: true }}
              dir="rtl"
              breakpoints={{
                576: {
                  slidesPerView: 2,
                },
                992: {
                  slidesPerView: 5,
                },
              }}
            >
              {rooms.map((room) => (
                <SwiperSlide key={room.id}>
                  <Room key={room.id} room={room} />
                </SwiperSlide>
              ))}
            </Swiper>
          </div>
        </div>
      </div>
    </section>
  );
}
