export default function About() {
  return (
    <>
      {/* ============================ Booking Title ================================== */}
      <section
        className="bg-cover position-relative"
        style={{ background: "url(/assets/img/bg.jpg) no-repeat" }}
        data-overlay="5"
      >
        <div className="container">
          <div className="row align-items-center justify-content-center">
            <div className="col-xl-7 col-lg-9 col-md-12">
              <div className="fpc-capstion text-center my-4">
                <div className="fpc-captions">
                  <h1 className="xl-heading text-light">درباره ما</h1>
                  <p className="text-light">
                    با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                    گرافیک است.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div className="fpc-banner"></div>
      </section>

      {/* ============================ About Us Section ================================== */}
      <section>
        <div className="container">
          <div className="row align-items-center justify-content-between g-4">
            <div className="col-xl-6 col-lg-6 col-md-6">
              <div>
                <h2 className="lh-base fs-2">ارزش های ما چیست؟</h2>

                <p>
                  کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان
                  جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را
                  برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در
                  زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و
                  دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و
                  زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات
                  پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                </p>

                <p>
                  چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                  است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با
                  هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه
                  درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می
                  طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای
                  علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.
                  در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                  راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل
                  حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای
                  موجود طراحی اساسا مورد استفاده قرار گیرد.
                </p>
              </div>
            </div>

            <div className="col-xl-5 col-lg-6 col-md-6">
              <div className="position-relative">
                <img
                  src="/assets/img/side-3.png"
                  className="img-fluid"
                  alt="درباره ما"
                />
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* ============================ Our Facts ================================== */}
      <section className="py-4 gray">
        <div className="container">
          <div className="row align-items-center justify-content-between g-4">
            <div className="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
              <div className="urfacts-wrap d-flex align-items-center justify-content-center">
                <div className="urfacts-first flex-shrink-0">
                  <h3 className="fs-1 fw-medium text-primary mb-0">32K</h3>
                </div>

                <div className="urfacts-caps pe-3">
                  <p className="text-muted-2 lh-base mb-0">
                    میزبان
                    <br />
                    تایید هویت شده
                  </p>
                </div>
              </div>
            </div>

            <div className="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
              <div className="urfacts-wrap d-flex align-items-center justify-content-center">
                <div className="urfacts-first flex-shrink-0">
                  <h3 className="fs-1 fw-medium text-primary mb-0">25+</h3>
                </div>

                <div className="urfacts-caps pe-3">
                  <p className="text-muted-2 lh-base mb-0">
                    ضمانت
                    <br />
                    تحویل اقامتگاه
                  </p>
                </div>
              </div>
            </div>

            <div className="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
              <div className="urfacts-wrap d-flex align-items-center justify-content-center">
                <div className="urfacts-first flex-shrink-0">
                  <h3 className="fs-1 fw-medium text-primary mb-0">45K</h3>
                </div>

                <div className="urfacts-caps pe-3">
                  <p className="text-muted-2 lh-base mb-0">
                    مشتری
                    <br />
                    راضی و وفادار
                  </p>
                </div>
              </div>
            </div>

            <div className="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
              <div className="urfacts-wrap d-flex align-items-center justify-content-center">
                <div className="urfacts-first flex-shrink-0">
                  <h3 className="fs-1 fw-medium text-primary mb-0">22</h3>
                </div>

                <div className="urfacts-caps pe-3">
                  <p className="text-muted-2 lh-base mb-0">
                    بیمه
                    <br />
                    برای سفری ایمن
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* ================================ Article Section ======================================= */}
      <section>
        <div className="container"></div>
      </section>
    </>
  );
}
