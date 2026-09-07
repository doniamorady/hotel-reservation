
export default function Footer() {
  return (
    <footer className="footer skin-dark-footer">
      <div>
        <div className="container">
          <div className="row">
            <div className="col-lg-3 col-md-4">
              <div className="footer-widget">
                <div className="d-flex align-items-start flex-column mb-3">
                  <div className="d-inline-block">
                    <img
                      src="/assets/img/logo-light.png"
                      className="img-fluid"
                      width="160"
                      alt="Footer Logo"
                    />
                  </div>
                </div>
                <div className="footer-add ps-xl-3">
                  <p>اقامتی راحت و لذت بخش با هتل گردشگری ژئوتریپ</p>
                </div>
                <div className="foot-socials">
                  <ul>
                    <li>
                      <a href="#">
                        <i className="fa-brands fa-facebook" />
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i className="fa-brands fa-linkedin" />
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i className="fa-brands fa-google-plus" />
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i className="fa-brands fa-twitter" />
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i className="fa-brands fa-dribbble" />
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div className="col-lg-2 col-md-4">
              <div className="footer-widget">
                <h4 className="widget-title">لینک های سریع</h4>
                <ul className="footer-menu">
                  <li>
                    <a href=''>درباره ما</a>
                  </li>
                  <li>
                    <a href="#">رویدادها</a>
                  </li>
                  <li>
                    <a href="#">بیمه مسافرتی</a>
                  </li>
                  <li>
                    <a href="#">قوانین سایت</a>
                  </li>
                </ul>
              </div>
            </div>
            <div className="col-lg-2 col-md-4">
              <div className="footer-widget">
                <h4 className="widget-title">خدمات پرواز و هتل</h4>
                <ul className="footer-menu">
                  <li>
                    <a href="#">خرید بلیط هواپیما</a>
                  </li>
                  <li>
                    <a href="#">رزرو هتل</a>
                  </li>
                  <li>
                    <a href="#">درخواست ویزا</a>
                  </li>
                  <li>
                    <a href="#">رزرو اقامتگاه</a>
                  </li>
                </ul>
              </div>
            </div>
            <div className="col-lg-2 col-md-6">
              <div className="footer-widget">
                <h4 className="widget-title">نحوه رزرو اقامتگاه</h4>
                <ul className="footer-menu">
                  <li>
                    <a href="#">راهنمای رزرو اقامتگاه</a>
                  </li>
                  <li>
                    <a href="#">همکاران سازمانی</a>
                  </li>
                  <li>
                    <a href=''>تماس با ما</a>
                  </li>
                  <li>
                    <a href="#">پرسش های متداول</a>
                  </li>
                </ul>
              </div>
            </div>
            <div className="col-lg-3 col-md-6">
              <div className="footer-widget">
                <h4 className="widget-title">روش های پرداخت</h4>
                <div className="pmt-wrap">
                  <img
                    src="/assets/img/payment.png"
                    className="img-fluid"
                    alt=""
                  />
                </div>
                <div className="our-prtwrap mt-4">
                  <div className="prtn-title">
                    <p className="text-muted-2 fw-medium">همکاران ما</p>
                  </div>
                  <div className="prtn-thumbs d-flex align-items-center justify-content-start">
                    <div className="pmt-wrap ps-4">
                      <img
                        src="/assets/img/mytrip.png"
                        className="img-fluid"
                        alt=""
                      />
                    </div>
                    <div className="pmt-wrap ps-4">
                      <img
                        src="/assets/img/tripadv.png"
                        className="img-fluid"
                        alt=""
                      />
                    </div>
                    <div className="pmt-wrap ps-4">
                      <img
                        src="/assets/img/goibibo.png"
                        className="img-fluid"
                        alt=""
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div className="footer-bottom border-top">
        <div className="container">
          <div className="row align-items-center justify-content-between">
            <div className="col-xl-6 col-lg-6 col-md-6">
              <p className="mb-0">
                © 2023 کلیه حقوق این سایت محفوظ و متعلق به شرکت خدمات گردشگری
                است.
              </p>
            </div>
            <div className="col-xl-6 col-lg-6 col-md-6">
              <ul className="p-0 d-flex justify-content-start justify-content-md-end text-start text-md-end m-0">
                <li>
                  <a href="#">شرایط و قوانین</a>
                </li>
                <li className="me-3">
                  <a href=''>درباره ما</a>
                </li>
                <li className="me-3">
                  <a href="#">کوکی ها</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
}
