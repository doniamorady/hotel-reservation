export default function Contact() {
  return (
    <>
      <section
        className="bg-cover position-relative"
        style={{ background: "url(assets/img/bg-title.jpg) no-repeat" }}
        data-overlay="5"
      >
        <div className="container">
          <div className="row align-items-center justify-content-center">
            <div className="col-xl-7 col-lg-9 col-md-12">
              <div className="fpc-capstion text-center my-4">
                <div className="fpc-captions">
                  <h1 className="xl-heading text-light">تماس با ما</h1>
                  <p className="text-light">
                    با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                    گرافیک است.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div className="container">
          <div className="row justify-content-between g-4 mb-5">
            <div className="col-xl-4 col-lg-4 col-md-6">
              <div className="card p-4 rounded-4 border br-dashed text-center h-100">
                <div className="crds-icons d-inline-flex mx-auto mb-3 text-primary fs-2">
                  <i className="fa-solid fa-briefcase"></i>
                </div>
                <div className="crds-desc">
                  <h5>ایمیل</h5>
                  <p className="fs-6 text-md lh-2 mb-0">
                    info@gmail.com
                    <br />
                    example@gmail.com
                  </p>
                </div>
              </div>
            </div>

            <div className="col-xl-4 col-lg-4 col-md-6">
              <div className="card p-4 rounded-4 border br-dashed text-center h-100">
                <div className="crds-icons d-inline-flex mx-auto mb-3 text-primary fs-2">
                  <i className="fa-solid fa-headset"></i>
                </div>
                <div className="crds-desc">
                  <h5>تلفن پشتیبانی</h5>
                  <p className="text-md lh-2 mb-0">
                    093998765432
                    <br />
                    02198765402
                  </p>
                </div>
              </div>
            </div>

            <div className="col-xl-4 col-lg-4 col-md-6">
              <div className="card p-4 rounded-4 border br-dashed text-center h-100">
                <div className="crds-icons d-inline-flex mx-auto mb-3 text-primary fs-2">
                  <i className="fa-solid fa-globe"></i>
                </div>

                <div className="crds-desc">
                  <h5>شبکه های اجتماعی</h5>

                  <p className="text-md lh-2">
                    از طریق رسانه های اجتماعی با ما در ارتباط باشید
                  </p>

                  <ul className="list-inline mb-0">
                    <li className="list-inline-item">
                      <a
                        className="square--40 circle gray-simple color--facebook"
                        href="#"
                      >
                        <i className="fa-brands fa-facebook-f"></i>
                      </a>
                    </li>

                    <li className="list-inline-item">
                      <a
                        className="square--40 circle gray-simple color--instagram"
                        href="#"
                      >
                        <i className="fa-brands fa-instagram"></i>
                      </a>
                    </li>

                    <li className="list-inline-item">
                      <a
                        className="square--40 circle gray-simple color--twitter"
                        href="#"
                      >
                        <i className="fa-brands fa-twitter"></i>
                      </a>
                    </li>

                    <li className="list-inline-item">
                      <a
                        className="square--40 circle gray-simple color--dribbble"
                        href="#"
                      >
                        <i className="fa-brands fa-dribbble"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div className="row align-items-center justify-content-between g-4">
            <div className="col-xl-7 col-lg-7 col-md-12">
              <div className="contactForm gray-simple p-4 rounded-3">
                <form>
                  <div className="row align-items-center">
                    <div className="col-xl-12">
                      <div className="touch-block d-flex flex-column mb-4">
                        <h3>راه ارتباط با ما</h3>
                        <p>
                          در همه‌ی روزهای هفته و در هر ساعت از شبانه‌روز که
                          بخواهید، می‌توانید از طریق راه‌های زیر با ما ارتباط
                          بگیرید.
                        </p>
                      </div>
                    </div>

                    <div className="col-xl-6">
                      <div className="form-group">
                        <label className="form-label">نام و نام خانوادگی</label>
                        <input type="text" className="form-control" />
                      </div>
                    </div>

                    <div className="col-xl-6">
                      <div className="form-group">
                        <label className="form-label">ایمیل</label>
                        <input type="email" className="form-control" />
                      </div>
                    </div>

                    <div className="col-xl-6">
                      <div className="form-group">
                        <label className="form-label">شماره تماس</label>
                        <input type="text" className="form-control" />
                      </div>
                    </div>

                    <div className="col-xl-6">
                      <div className="form-group">
                        <label className="form-label">عنوان</label>
                        <input type="text" className="form-control" />
                      </div>
                    </div>

                    <div className="col-xl-12">
                      <div className="form-group">
                        <label className="form-label">متن درخواست</label>
                        <textarea className="form-control ht-120"></textarea>
                      </div>
                    </div>

                    <div className="col-xl-12">
                      <div className="form-group mb-0">
                        <button
                          type="button"
                          className="btn fw-medium btn-primary"
                        >
                          ارسال
                          <i className="fa-solid fa-paper-plane me-2"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div className="col-xl-5 col-lg-5 col-md-12">
              <iframe
                className="full-width ht-100 grayscale rounded"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.579695657881!2d51.40942782449591!3d35.71195927257734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e0114804ce6b1%3A0xef2337025f6d4dab!2z2KfYs9iq2KfZhiDYqtmH2LHYp9mG2Iwg2KrZh9ix2KfZhtiMINmF2YbYt9mC2Ycg27bYjCDZhduM2K_Yp9mGINmI2YTbjNi52LXYsdiMINin24zYsdin2YY!5e0!3m2!1sfa!2s!4v1707728542460!5m2!1sfa!2s"
                height="500"
                style={{ border: 0 }}
                aria-hidden="false"
                tabIndex="0"
                title="Google Map"
              ></iframe>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
