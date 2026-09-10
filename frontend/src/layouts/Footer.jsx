import BrandLink from "../components/footer/BrandLink";
import FooterPayment from "../components/footer/FooterPayment";
import FooterWidgetCol from "../components/footer/FooterWidgetCol";
import LinkComponent from "../components/Link";

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
                    <BrandLink className="fa-brands fa-facebook" />
                    <BrandLink className="fa-brands fa-linkedin" />
                    <BrandLink className="fa-brands fa-google-plus" />
                    <BrandLink className="fa-brands fa-twitter" />
                    <BrandLink className="fa-brands fa-dribbble" />
                  </ul>
                </div>
              </div>
            </div>

            <FooterWidgetCol label="لینک های سریع">
              <LinkComponent to="about-us" label="درباره ما" />
              <LinkComponent to="contact-us" label="تماس با ما" />
              <LinkComponent to="" label="قوانین سایت" />
              <LinkComponent to="" label="رویداد ها" />
            </FooterWidgetCol>

            <FooterWidgetCol label="خدمات هتل">
              <LinkComponent to="about-us" label="رزرو اتاق" />
              <LinkComponent to="about-us" label="ارتباط با مدیریت" />
              <LinkComponent to="about-us" label="جشنواره ها" />
              <LinkComponent to="about-us" label="درباره ما" />
            </FooterWidgetCol>

            <FooterWidgetCol label="نحوه رزرو هتل">
              <LinkComponent label="راهنمای رزرو اقامتگاه" />
              <LinkComponent label="همکاران سازمانی" />
              <LinkComponent label="تماس با ما" />
              <LinkComponent label="پرسش های متداول" />
            </FooterWidgetCol>

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
                    <FooterPayment src="/assets/img/mytrip.png" />
                    <FooterPayment src="/assets/img/tripadv.png" />
                    <FooterPayment src="/assets/img/goibibo.png" />
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
                <LinkComponent label="شرایط و قوانین" />
                <LinkComponent label="درباره ما" />
                <LinkComponent label="کوکی ها" />
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
}
