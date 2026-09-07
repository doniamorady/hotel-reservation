export default function SingleRoomForRoomList({ room }) {
  return (
    <div className="col-xl-12 col-lg-12 col-12">
      <div className="card list-layout-block rounded-3 p-3">
        <div className="row">
          <div className="col-xl-4 col-lg-3 col-md">
            <div className="cardImage__caps rounded-2 overflow-hidden h-100">
              <img
                className="img-fluid h-100 object-fit"
                src={`assets/img/hotel/hotel-${room.id}.jpg`}
                alt="image"
              />
            </div>
          </div>

          <div className="col-xl col-lg col-md">
            <div className="listLayout_midCaps mt-md-0 mt-3 mb-md-0 mb-3">
              <div className="d-flex align-items-center justify-content-start">
                <div className="d-inline-block">
                  <i className="fa fa-star text-warning text-xs"></i>
                  <i className="fa fa-star text-warning text-xs"></i>
                  <i className="fa fa-star text-warning text-xs"></i>
                  <i className="fa fa-star text-warning text-xs"></i>
                  <i className="fa fa-star text-warning text-xs"></i>
                </div>
              </div>
              <h4 className="fs-5 mb-1">{room.name}</h4>
              <ul className="row gx-2 p-0 excortio">
                <li className="col-auto">
                  <p className="text-muted-2 text-md">دِهلی و شیکاگو</p>
                </li>
                <li className="col-auto">
                  <p className="text-muted-2 text-md fw-bold">.</p>
                </li>
                <li className="col-auto">
                  <p className="text-muted-2 text-md">
                    9.8 کیلومتری فرودگاه دِهلی
                  </p>
                </li>
                <li className="col-auto">
                  <p className="text-muted-2 text-md fw-bold">.</p>
                </li>
              
              </ul>
              <div className="detail ellipsis-container mt-3">
                <span className="ellipsis">پارکینگ</span>
                <span className="ellipsis">WiFi</span>
                <span className="ellipsis">رستوران</span>
                <span className="ellipsis">کولر گازی</span>
                <span className="ellipsis">مبلمان</span>
              </div>
              <div className="position-relative mt-3">
                <div className="fw-medium text-dark">تخت {room.beds.map(bed=> bed.type+', ')}</div>
                <div className="text-md text-muted">سرویس روزانه اتاق</div>
              </div>
              <div className="position-relative mt-4">
                <div className="d-block position-relative">
                  <span className="label bg-light-success text-success">
                    امکان لغو تا 1ساعت بعد از تحویل
                  </span>
                </div>
                <div className="text-md">
                  <p className="m-0">
                    <a href="#" className="text-primary">
                      ورود
                    </a>{" "}
                    و دریافت 150000ریال تخفیف با
                    <span className="text-primary">Visa card</span>
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div className="col-xl-auto col-lg-auto col-md-auto text-right text-md-left d-flex align-items-start align-items-md-end flex-column">
            <div className="row align-items-center justify-content-start justify-content-md-end gx-2 mb-3">
              <div className="col-auto text-start text-md-end">
                <div className="text-md text-dark fw-medium">اقتصادی</div>
                <div className="text-md text-muted-2">3,014 دیدگاه</div>
              </div>
              <div className="col-auto">
                <div className="square--40 rounded-2 bg-ratting text-light">
                  4.8
                </div>
              </div>
            </div>

            <div className="position-relative mt-auto full-width">
              {/* <div className="d-flex align-items-center justify-content-start justify-content-md-end mb-1">
                <span className="label bg-success text-light">15% تخفیف</span>
              </div> */}
              <div className="d-flex align-items-center justify-content-start justify-content-md-end">
                {/* <div className="text-muted-2 fw-medium text-decoration-line-through ms-2">
                  3,700,000
                </div> */}
                <div className="text-dark fs-4">{room.price} تومان</div>
              </div>
              <div className="d-flex align-items-start align-items-md-end justify-content-start justify-content-md-end flex-column mb-2">
                <div className="text-muted-2 text-sm">+ {room.price*(0.1)} کارمزد</div>
                <div className="text-muted-2 text-sm">برای 1 شب</div>
              </div>
              <div className="d-flex align-items-start align-items-md-end text-start text-md-end flex-column">
                <a
                  href="#"
                  className="btn btn-md btn-primary full-width fw-medium px-lg-4"
                >
                  مشاهده<i className="fa-solid fa-arrow-trend-up me-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
