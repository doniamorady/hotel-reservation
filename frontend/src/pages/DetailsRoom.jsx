import { useEffect, useState } from "react";
import { Link, useNavigate, useParams } from "react-router-dom";
import { getRoom } from "../services/apiRoom";

const toDateInputValue = (date) => {
  const normalized = new Date(date);
  const offset = normalized.getTimezoneOffset();

  const localDate = new Date(normalized.getTime() - offset * 60 * 1000);

  return localDate.toISOString().slice(0, 10);
};

const getDefaultCheckInDate = () => {
  const date = new Date();

  date.setDate(date.getDate() + 1);

  return toDateInputValue(date);
};

const getDefaultCheckOutDate = () => {
  const date = new Date();

  date.setDate(date.getDate() + 2);

  return toDateInputValue(date);
};

export default function DetailsRoom() {
  const navigate = useNavigate();
  const isLoggedIn = Boolean(localStorage.getItem("auth_token"));

  const { id } = useParams();

  const [room, setRoom] = useState({});

  const [bookingForm, setBookingForm] = useState({
    startDate: getDefaultCheckInDate(),

    endDate: getDefaultCheckOutDate(),

    numGuests: 1,

    hasBreakfast: false,
  });

  const [bookingError, setBookingError] = useState("");

  const [isSubmitting, setIsSubmitting] = useState(false);

  useEffect(() => {
    async function loadRoom() {
      const data = await getRoom(id);

      setRoom(data);
    }

    loadRoom();
  }, [id]);

  function handleBookingChange(event) {
    const { name, value, type, checked } = event.target;

    setBookingError("");

    setBookingForm((prev) => {
      const next = {
        ...prev,

        [name]: type === "checkbox" ? checked : value,
      };

      if (name === "startDate" && next.endDate < next.startDate) {
        next.endDate = next.startDate;
      }

      if (name === "endDate" && next.endDate < next.startDate) {
        next.startDate = next.endDate;
      }

      return next;
    });
  }
  async function handleBookingSubmit(event) {
    event.preventDefault();

    if (!room?.id) {
      setBookingError("اتاق پیدا نشد");

      return;
    }

    const startDate = new Date(`${bookingForm.startDate}T00:00:00`);

    const endDate = new Date(`${bookingForm.endDate}T00:00:00`);

    if (endDate <= startDate) {
      setBookingError("تاریخ پایان باید بعد از تاریخ شروع باشد");

      return;
    }

    const payload = {
      start_date: bookingForm.startDate,
      end_date: bookingForm.endDate,

      num_guests: Number(bookingForm.numGuests),
      has_breakfast: Boolean(bookingForm.hasBreakfast),
    };

    navigate(`/prepare/${room.id}`, {
      state: payload,
    });
  }

  return (
    <>
      <section className="pt-3 gray-simple">
        <div className="container">
          <div className="row">
            <div className="col-xl-12 col-lg-12 col-md-12">
              <nav aria-label="breadcrumb">
                <ol className="breadcrumb">
                  <li className="breadcrumb-item">
                    <a href="#" className="text-primary">
                      صفحه اصلی
                    </a>
                  </li>
                  <li className="breadcrumb-item">
                    <a href="#" className="text-primary">
                      جزئیات هتل
                    </a>
                  </li>
                  <li className="breadcrumb-item active" aria-current="page">
                    {room.name}
                  </li>
                </ol>
              </nav>
            </div>

            <div className="col-xl-12 col-lg-12 col-md-12">
              <div className="card border-0 p-3 mb-4">
                <div className="crd-heaader d-md-flex align-items-center justify-content-between mb-3">
                  <div className="crd-heaader-first">
                    <div className="d-inline-flex align-items-center mb-1">
                      <span className="label bg-light-success text-success">
                        سرویس نظافت روزانه
                      </span>
                      <div className="d-inline-block me-2">
                        <i className="fa fa-star text-warning text-xs"></i>
                        <i className="fa fa-star text-warning text-xs"></i>
                        <i className="fa fa-star text-warning text-xs"></i>
                        <i className="fa fa-star text-warning text-xs"></i>
                        <i className="fa fa-star text-warning text-xs"></i>
                      </div>
                    </div>
                    <div className="d-block">
                      <h4 className="mb-0"> {room.name}</h4>
                      <div className="">
                        {/* <p className="text-md m-0">
                          <i className="fa-solid fa-location-dot ms-2"></i>جاده
                          اصلی، خیابان سنگاپور 577{" "}
                          <a href="#" className="text-primary fw-medium me-2">
                            مشاهده روی نقشه
                          </a>
                        </p> */}
                      </div>
                    </div>
                  </div>
                  <div className="crd-heaader-last my-md-0 my-2">
                    <div className="drix-wrap d-flex flex-column align-items-md-end align-items-start text-end">
                      <div className="drix-first d-flex align-items-center text-end mb-2">
                        <a
                          href="#"
                          className="bg-light-info text-info rounded-1 fw-medium text-sm px-3 py-2 lh-base"
                        >
                          <i className="fa-solid fa-bookmark ms-2"></i>افزودن به
                          علاقه مندی
                        </a>
                        <a
                          href="#"
                          className="bg-light-danger text-danger rounded-1 fw-medium text-sm px-3 py-2 lh-base me-2"
                        >
                          <i className="fa-solid fa-share-nodes ms-2"></i>اشتراک
                        </a>
                      </div>
                      <div className="drix-last">
                        <span className="label bg-light-success text-success"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="crd-body">
                  <div className="row align-items-center justify-content-between">
                    <div className="col-xl-8 col-lg-7 col-md-12">
                      <div className="galleryGrid typeGrid_2 mb-lg-0 mb-3">
                        <div className="galleryGrid__item relative d-flex">
                          <a
                            href="assets/img/hotel/hotel-3.jpg"
                            data-lightbox="roadtrip"
                          >
                            <img
                              src={room.cover_image}
                              alt="image"
                              className="rounded-2 img-fluid"
                            />
                          </a>
                        </div>
                        {room.gallery && room.gallery.length > 0 && (
                          <>
                            {room.gallery.slice(0, 3).map((image, index) => (
                              <div
                                key={image.id}
                                className="galleryGrid__item position-relative"
                              >
                                <a href={image.path} data-lightbox="roadtrip">
                                  <img
                                    src={image.path}
                                    alt={`room-gallery-${index}`}
                                    className="rounded-2 img-fluid"
                                  />
                                </a>

                                {index === 0 && room.gallery.length > 3 && (
                                  <div className="position-absolute start-0 bottom-0 mb-3 ms-3">
                                    <a
                                      href={image.path}
                                      data-lightbox="roadtrip"
                                      className="btn btn-md btn-whites fw-medium text-dark"
                                    >
                                      <i className="fa-solid fa-caret-left ms-1"></i>
                                      {room.gallery.length} تصویر
                                    </a>
                                  </div>
                                )}
                              </div>
                            ))}
                          </>
                        )}
                      </div>
                    </div>

                    <div className="col-xl-4 col-lg-5 col-md-12">
                      <div className="card border br-dashed">
                        {!isLoggedIn && (
                          <div className="card-header">
                            <div className="crd-heady102 d-flex align-items-center justify-content-start">
                              <div className="square--30 circle bg-light-primary text-primary flex-shrink-0">
                                <i className="fa-solid fa-percent"></i>
                              </div>
                              <div className="crd-heady102Title lh-1 pe-2">
                                <span className="text-sm text-dark lh-1 mb-0">
                                  برای دریافت تا 20% تخفیف وارد حساب شوید
                                </span>
                              </div>
                            </div>
                            <div className="crd-heady103">
                              <Link
                                to="/login"
                                className="btn btn-primary btn-sm px-4 text-uppercase"
                              >
                                ورود
                              </Link>
                            </div>
                          </div>
                        )}
                        <div className="card-body">
                          <div className="d-block mb-3">
                            <div className="d-flex align-items-center justify-content-start">
                              <div className="text-dark fs-3 ms-2">
                                {room.price + room.price * 0.1}تومان
                              </div>
                              {/* <div className="text-muted-2 fw-medium text-decoration-line-through ms-2">
                                9,500,000ریال
                              </div> */}
                              <div className="text-warning">10 درصد مالیات</div>
                            </div>
                            <div className="d-flex align-items-start justify-content-start">
                              <div className="text-muted-2 text-md">
                                با احتساب ارزش افزوده
                              </div>
                            </div>
                          </div>
                          <div className="d-block">
                            <form onSubmit={handleBookingSubmit}>
                              <div className="row g-3">
                                <div className="col-12">
                                  <label className="form-label text-dark fw-medium">
                                    تاریخ شروع اقامت
                                  </label>
                                  <input
                                    type="date"
                                    name="startDate"
                                    className="form-control"
                                    value={bookingForm.startDate}
                                    min={getDefaultCheckInDate()}
                                    onChange={handleBookingChange}
                                  />
                                </div>

                                <div className="col-12">
                                  <label className="form-label text-dark fw-medium">
                                    تاریخ پایان اقامت
                                  </label>
                                  <input
                                    type="date"
                                    name="endDate"
                                    className="form-control"
                                    value={bookingForm.endDate}
                                    min={
                                      bookingForm.startDate ||
                                      getDefaultCheckInDate()
                                    }
                                    onChange={handleBookingChange}
                                  />
                                </div>

                                <div className="col-12">
                                  <label className="form-label text-dark fw-medium">
                                    تعداد مهمان
                                  </label>
                                  <input
                                    type="number"
                                    name="numGuests"
                                    min="1"
                                    max={room.capacity || 10}
                                    className="form-control"
                                    value={bookingForm.numGuests}
                                    onChange={handleBookingChange}
                                  />
                                </div>

                                <div className="col-12">
                                  <label className="d-flex align-items-center justify-content-between border rounded p-2 mb-0">
                                    <span className="text-dark fw-medium">
                                      صبحانه
                                    </span>
                                    <input
                                      type="checkbox"
                                      name="hasBreakfast"
                                      checked={bookingForm.hasBreakfast}
                                      onChange={handleBookingChange}
                                    />
                                  </label>
                                </div>

                                {bookingError && (
                                  <div className="col-12">
                                    <div className="alert alert-danger mb-0">
                                      {bookingError}
                                    </div>
                                  </div>
                                )}
                                {isLoggedIn ? (
                                  <div className="col-12">
                                    <button
                                      type="submit"
                                      className="btn btn-primary full-width fw-medium"
                                      disabled={isSubmitting}
                                    >
                                      {isSubmitting
                                        ? "در حال ثبت رزرو..."
                                        : "رزرو هتل"}
                                    </button>
                                  </div>
                                ) : (
                                      <div className="col-12">
                                    <Link
                                      to="/login"
                                      className="btn btn-primary full-width fw-medium"
                                      disabled={isSubmitting}
                                    >
                                      ورود
                                    </Link>
                                  </div>
                                )}
                              </div>
                            </form>
                          </div>
                        </div>

                        <div className="card-footer bg-white">
                          <div className="row align-items-center justify-content-start gx-2">
                            <div className="col-auto">
                              <div className="square--40 rounded-2 bg-seegreen text-light">
                                4.8
                              </div>
                            </div>
                            <div className="col-auto text-end">
                              <div className="text-md text-dark fw-medium">
                                اقتصادی
                              </div>
                              <div className="text-md text-muted-2">
                                3,014 دیدگاه
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div className="col-xl-12 col-lg-12 col-md-12">
              <div className="row align-items-center justify-content-between gx-4">
                <div className="col-xl-4 col-lg-4 col-md-4">
                  <div className="card p-3 mb-4">
                    <div className="nearestServ-wrap">
                      <div className="nearestServ-head d-flex mb-1">
                        <h6 className="fs-6 text-primary mb-1">
                          <i className="fa-brands fa-servicestack ms-2"></i>نقاط
                          مهم و مراکز دیدنی
                        </h6>
                      </div>
                      <div className="nearestServ-caps">
                        <ul className="row align-items-start g-2 p-0 m-0">
                          <li className="col-12 text-muted-2">
                            مرکز شهر (170متر)
                          </li>
                          <li className="col-12 text-muted-2">موزه (250متر)</li>
                          <li className="col-12 text-muted-2">
                            ساحل دریا (80متر)
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="col-xl-4 col-lg-4 col-md-4">
                  <div className="card p-3 mb-4">
                    <div className="nearestServ-wrap">
                      <div className="nearestServ-head d-flex mb-1">
                        <h6 className="fs-6 text-primary mb-1">
                          <i className="fa-solid fa-jet-fighter ms-2"></i>
                          نزدیکترین فرودگاه و مترو
                        </h6>
                      </div>
                      <div className="nearestServ-caps">
                        <ul className="row align-items-start g-2 p-0 m-0">
                          <li className="col-12 text-muted-2">
                            فرودگاه: Janghai (370متر)
                          </li>
                          <li className="col-12 text-muted-2">
                            فرودگاه: Shivalay (2.4kمتر)
                          </li>
                          <li className="col-12 text-muted-2">
                            مترو: Mandpam (500متر)
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="col-xl-4 col-lg-4 col-md-4">
                  <div className="card p-3 mb-4">
                    <div className="nearestServ-wrap">
                      <div className="nearestServ-head d-flex mb-1">
                        <h6 className="fs-6 text-primary mb-1">
                          <i className="fa-solid fa-martini-glass-empty ms-2"></i>
                          کافه و سالن رقص
                        </h6>
                      </div>
                      <div className="nearestServ-caps">
                        <ul className="row align-items-start g-2 p-0 m-0">
                          <li className="col-12 text-muted-2">
                            کافی شاپ: Bekker Cofee (60متر)
                          </li>
                          <li className="col-12 text-muted-2">
                            کافی شاپ: Levendaram (120متر)
                          </li>
                          <li className="col-12 text-muted-2">
                            سالن رقص: Blue (90متر)
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div className="col-xl-12 col-lg-12 col-md-12">
              <div className="d-flex align-items-center justify-content-start py-3 px-3 rounded-2 bg-success mb-4">
                <p className="text-light m-0">
                  <i className="fa-solid fa-gift text-warning ms-2"></i>
                  <Link
                    to="/login"
                    className="text-white text-decoration-underline"
                  >
                    ورود
                  </Link>
                  یا{" "}
                  <a href="#" className="text-white text-decoration-underline">
                    ثبت نام{" "}
                  </a>
                  برای دريافت 118 امتیاز در باشگاه مشتریان
                </p>
              </div>
            </div>

            {/* <!-- Service & Amenties --> */}
            <div className="col-xl-12 col-lg-12 col-md-12">
              <div className="card mb-4">
                <div className="card-header">
                  <h4 className="fs-5 mb-0">خدمات و امکانات رفاهی</h4>
                </div>
                <div className="card-body">
                  <div className="row align-items-start">
                    <div className="col-xl-2 col-lg-3 col-md-4">
                      <h5 className="fs-6 mb-0">امکانات ویژه</h5>
                    </div>
                    <div className="col-xl-10 col-lg-9 col-md-8">
                      <div className="row align-items-start">
                        <div className="col-xl-12 col-lg-12 col-md-12">
                          <ul className="row align-items-center p-0 mb-0">
                            <li className="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                              <div className="d-flex align-items-center mb-3">
                                پارکینگ
                                <span className="text-success fw-medium me-3">
                                  رایگان
                                </span>
                              </div>
                            </li>
                            <li className="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                              <div className="d-flex align-items-center mb-3">
                                استخر سرپوشیده
                              </div>
                            </li>
                            <li className="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                              <div className="d-flex align-items-center mb-3">
                                اتاق کنفرانس
                              </div>
                            </li>
                            <li className="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                              <div className="d-flex align-items-center mb-3">
                                زمین بازی برای کودکان
                              </div>
                            </li>
                            <li className="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                              <div className="d-flex align-items-center mb-3">
                                ترانسفر فرودگاهی رایگان
                              </div>
                            </li>
                            <li className="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                              <div className="d-flex align-items-center mb-3">
                                مرکز خرید در محل
                              </div>
                            </li>
                            <li className="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                              <div className="d-flex align-items-center mb-3">
                                امکانات بدنسازی
                              </div>
                            </li>
                            <li className="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                              <div className="d-flex align-items-center mb-3">
                                Wi-Fi
                                <span className="text-success fw-medium me-3">
                                  رایگان
                                </span>
                              </div>
                            </li>
                            <li className="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                              <div className="d-flex align-items-center mb-3">
                                کارکنان مسلط به چند زبان
                              </div>
                            </li>
                            <li className="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                              <div className="d-flex align-items-center mb-3">
                                انبار چمدان
                              </div>
                            </li>
                            <li className="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                              <div className="d-flex align-items-center mb-3">
                                پذیرش ۲۴ ساعته
                              </div>
                            </li>
                          </ul>
                        </div>

                        <div className="col-xl-12 col-lg-12 col-md-12">
                          <ul className="row align-items-center g-3 p-0 mb-0">
                            <li className="col-xl-3 col-lg-3 col-md-6 col-6">
                              <div className="d-flex flex-column align-items-center rounded border br-dashed p-2">
                                <div className="room-alsyruk mb-2">
                                  <img
                                    src="assets/img/hotel/hotel-5.jpg"
                                    className="img-fluid rounded"
                                    alt=""
                                  />
                                </div>
                                <div className="tedfr-caps text-center ">
                                  <span className="text-muted-2">
                                    اتاق جلسات
                                  </span>
                                </div>
                              </div>
                            </li>
                            <li className="col-xl-3 col-lg-3 col-md-6 col-6">
                              <div className="d-flex flex-column align-items-center rounded border br-dashed p-2">
                                <div className="room-alsyruk mb-2">
                                  <img
                                    src="assets/img/hotel/hotel-5.jpg"
                                    className="img-fluid rounded"
                                    alt=""
                                  />
                                </div>
                                <div className="tedfr-caps text-center ">
                                  <span className="text-muted-2">رستوران</span>
                                </div>
                              </div>
                            </li>
                            <li className="col-xl-3 col-lg-3 col-md-6 col-6">
                              <div className="d-flex flex-column align-items-center rounded border br-dashed p-2">
                                <div className="room-alsyruk mb-2">
                                  <img
                                    src="assets/img/hotel/hotel-5.jpg"
                                    className="img-fluid rounded"
                                    alt=""
                                  />
                                </div>
                                <div className="tedfr-caps text-center ">
                                  <span className="text-muted-2">
                                    زمین بازی{" "}
                                  </span>
                                </div>
                              </div>
                            </li>
                            <li className="col-xl-3 col-lg-3 col-md-6 col-6">
                              <div className="d-flex flex-column align-items-center rounded border br-dashed p-2">
                                <div className="room-alsyruk mb-2">
                                  <img
                                    src="assets/img/hotel/hotel-5.jpg"
                                    className="img-fluid rounded"
                                    alt=""
                                  />
                                </div>
                                <div className="tedfr-caps text-center ">
                                  <span className="text-muted-2">سالن رقص</span>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {/* <!-- Guests Reviews --> */}
          </div>
        </div>
      </section>
      {/* <!-- ============================ Hotel Detail End ================================== --> */}

      {/* <!-- ============================ Similar Hotels Start ================================== --> */}
      <section className="py-5">
        <div className="container">
          <div className="row align-items-center justify-content-between mb-3">
            <div className="col-8">
              <div className="upside-heading">
                <h5 className="fs-6 m-0">هتل های مشابه</h5>
              </div>
            </div>
            <div className="col-4">
              <div className="text-start grpx-btn">
                <a href="#" className="btn btn-light-primary btn-md fw-medium">
                  مشاهده<i className="fa-solid fa-arrow-trend-up me-2"></i>
                </a>
              </div>
            </div>
          </div>

          <div className="row justify-content-center">
            <div className="col-xl-12 col-lg-12 col-md-12 p-0">
              <div className="main-carousel arrow-hide cols-3">
                {/* <!-- Single Item --> */}
                <div className="carousel-cell">
                  <div className="pop-touritem">
                    <a href="#" className="card rounded-3 border br-dashed m-0">
                      <div className="flight-thumb-wrapper">
                        <div className="popFlights-item-overHidden">
                          <img
                            src="assets/img/hotel/hotel-8.jpg"
                            className="img-fluid"
                            alt=""
                          />
                        </div>
                      </div>
                      <div className="touritem-middle position-relative p-3">
                        <div className="touritem-flexxer">
                          <h4 className="city fs-6 m-0">
                            <span>هتل Arlo شیکاگو</span>
                          </h4>
                          <p className="detail ellipsis-container">
                            <span className="ellipsis-item__normal">دِهلی</span>
                            <span className="separate ellipsis-item__normal"></span>
                            <span className="ellipsis-item">
                              3.5 کیلومتر از دِهلی
                            </span>
                          </p>

                          <div className="touritem-centrio mt-4">
                            <div className="d-block position-relative">
                              {/* <span className="label bg-light-success text-success">
                                امکان استرداد وجه تا 28 دی 1402
                              </span> */}
                            </div>
                            <div className="aments-lists mt-2">
                              <ul className="p-0 row gx-3 gy-2 align-items-start flex-wrap">
                                <li className="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                  <i className="fa-solid fa-check text-success ms-1"></i>
                                  کولر گازی
                                </li>
                                <li className="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                  <i className="fa-solid fa-check text-success ms-1"></i>
                                  آسانسور
                                </li>
                                <li className="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                  <i className="fa-solid fa-check text-success ms-1"></i>
                                  WiFi
                                </li>
                                <li className="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                  <i className="fa-solid fa-check text-success ms-1"></i>
                                  رستوران
                                </li>
                                <li className="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                  <i className="fa-solid fa-check text-success ms-1"></i>
                                  پارکینگ
                                </li>
                                <li className="col-auto text-dark text-md text-muted-2 d-inline-flex align-items-center">
                                  <i className="fa-solid fa-check text-success ms-1"></i>
                                  مرکز اسپا و ماساژ{" "}
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div className="trsms-foots mt-4">
                          <div className="flts-flex d-flex align-items-end justify-content-between">
                            <div className="flts-flex-strat">
                              <div className="d-flex align-items-center justify-content-start">
                                <span className="label bg-offer text-light">
                                  15% تخفیف
                                </span>
                              </div>
                              <div className="d-flex align-items-center">
                                <div className="text-dark fs-4">750ریال</div>
                                <div className="text-muted-2 fw-medium text-decoration-line-through me-2">
                                  9,500,000ریال
                                </div>
                              </div>
                              <div className="d-flex align-items-start flex-column">
                                <div className="text-muted-2 text-sm">هرشب</div>
                              </div>
                            </div>

                            <div className="flts-flex-end">
                              <div className="row align-items-center justify-content-end gx-2">
                                <div className="col-auto text-start text-md-end">
                                  <div className="text-md text-dark fw-medium">
                                    اقتصادی
                                  </div>
                                  <div className="text-md text-muted-2">
                                    3,014 دیدگاه
                                  </div>
                                </div>
                                <div className="col-auto">
                                  <div className="square--40 rounded-2 bg-ratting text-light">
                                    4.8
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
