export default function MyBooking() {
  return (
    <section className="pt-5 gray-simple position-relative">
      <div className="container">
        <div className="row align-items-start justify-content-between gx-xl-4">
          {/* @include('site.layouts.user-profile-aside') */}

          <div className="col-xl-8 col-lg-8 col-md-12">
            <div className="card">
              <div className="card-header">
                <h4>
                  <i className="fa-solid fa-ticket ms-2"></i>لیست رزروها
                </h4>
              </div>
              <div className="card-body">
                <div className="row align-items-center justify-content-start">
                  <div className="col-xl-12 col-lg-12 col-md-12 mb-4">
                    <ul className="row align-items-center justify-content-between p-0 gx-3 gy-2">
                      <li className="col-md-2 col-6">
                        <input
                          type="checkbox"
                          className="btn-check"
                          id="allbkk"
                          checked
                        />
                        <label
                          className="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width"
                          for="allbkk"
                        >
                          همه
                          {/* ({{ $bookings->count() }}) */}
                        </label>
                      </li>
                      <li className="col-md-2 col-6">
                        <input
                          type="checkbox"
                          className="btn-check"
                          id="processing"
                        />
                        <label
                          className="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width"
                          for="processing"
                        >
                          درحال پرداخت (2)
                        </label>
                      </li>
                      <li className="col-md-2 col-6">
                        <input
                          type="checkbox"
                          className="btn-check"
                          id="cancelled"
                        />
                        <label
                          className="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width"
                          for="cancelled"
                        >
                          پرداخت شده (4)
                        </label>
                      </li>
                      <li className="col-md-2 col-6">
                        <input
                          type="checkbox"
                          className="btn-check"
                          id="completed"
                        />
                        <label
                          className="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width"
                          for="completed"
                        >
                          لغو شده (10)
                        </label>
                      </li>

                      <li className="col-md-2 col-6">
                        <input
                          type="checkbox"
                          className="btn-check"
                          id="completed"
                        />
                        <label
                          className="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width"
                          for="completed"
                        >
                          {" "}
                          با خطا مواجه شده (10)
                        </label>
                      </li>
                    </ul>
                  </div>
                </div>

                <div className="row align-items-center justify-content-start">
                  <div className="col-xl-12 col-lg-12 col-md-12">
                    {/* @foreach ($bookings as $booking) */}
                    {/* <!-- Single Item --> */}
                    <div className="card border br-dashed mb-4">
                      {/* <!-- Card header --> */}
                      <div className="card-header nds-block border-bottom flex-column flex-md-row justify-content-between align-items-center">
                        {/* <!-- Icon and Title --> */}
                        <div className="d-flex align-items-center">
                          <div className="square--50 circle bg-light-purple text-purple flex-shrink-0">
                            <i className="fa-solid fa-plane"></i>
                          </div>
                          {/* <!-- Title --> */}
                          <div className="me-2">
                            <h6
                              className="card-title text-dark 
														mb-1"
                            >
                              {/* {{ $booking->room->name }} */}
                            </h6>
                            <ul className="nav nav-divider small">
                              <li className="nav-item text-muted">کد پیگیری: </li>
                              <li className="nav-item me-2"></li>
                            </ul>
                          </div>
                        </div>

                        {/* <!-- Button --> */}
                        <div className="mt-2 mt-md-0">
                          <a
                            href="#"
                            className="btn btn-sm btn-light-seegreen fw-medium mb-0"
                          >
                            مدیریت
                          </a>
                        </div>
                      </div>

                      {/* <!-- Card body --> */}
                      <div className="card-body">
                        <div className="row g-3">
                          <div className="col-sm-6 col-md-4">
                            <span style={{fontSize: "13px"}}>
                              تاریخ شروع اقامت
                            </span>
                            <p className="mb-0" style={{fontSize: "13px"}}>
                              {/* {{ $booking->check_out }} */}
                            </p>
                          </div>

                          <div className="col-sm-6 col-md-4">
                            <span style={{fontSize: "13px"}}>
                              تاریخ پایان اقامت
                            </span>
                            <p className="mb-0" style={{fontSize: "13px"}}>
                              {/* {{ $booking->check_in }} */}
                            </p>
                          </div>

                          <div className="col-md-4">
                            <span style={{fonSize: "13px"}}>مبلغ کل</span>
                            <p className="mb-0" style={{fonSize: "13px"}}>
                              {/* {{number_format( $booking->total_price) }} */}
                              تومان
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    {/* @endforeach */}
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
