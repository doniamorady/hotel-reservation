import SearchContainer from "../SearchContainer";

export default function BackgroundContainer() {
  return (
    <div
      className="image-cover hero-header"
      style={{
        background: "url('/assets/img/banner-05.jpg') no-repeat center center",
        backgroundSize: "cover",
      }}
      data-overlay="6"
    >
      <div className="container">
        <div className="row justify-content-center align-items-center">
          <div className="col-xl-9 col-lg-10 col-md-12 col-sm-12">
            <div className="position-relative text-center mb-5">
              <h1>
                سفر خود را با انتخاب هتل مناسب آغاز کنید؛ رزروی سریع، آسان و
                مطمئن با GeoTrip
              </h1>
              <p className="fs-5 fw-light">
                کمی از استرس کاری روزمره فاصله بگیرید. برای سفر برنامه‌ریزی کنید
                و مقاصد زیبا را کشف کنید.
              </p>
            </div>
          </div>

          <SearchContainer />
        </div>
      </div>
    </div>
  );
}
