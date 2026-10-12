import { Link } from "react-router-dom";

export default function BookingCancelled() {
  return (
    <div
      className="min-vh-100 d-flex align-items-center justify-content-center"
      dir="rtl"
      style={{
        background: "#f8fafc",
      }}
    >
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-xl-5 col-lg-6 col-md-8">
            <div
              className="card border-0 rounded-4 overflow-hidden"
              style={{
                background: "#fff",
                boxShadow: "0 20px 60px rgba(15,23,42,.08)",
              }}
            >
              <div className="card-body p-5 text-center">
                {/* Icon */}
                <div
                  className="mx-auto mb-4 d-flex align-items-center justify-content-center"
                  style={{
                    width: "78px",
                    height: "78px",
                    borderRadius: "50%",
                    background: "rgba(245,158,11,.12)",
                    border: "1px solid rgba(245,158,11,.25)",
                  }}
                >
                  <i
                    className="bi bi-credit-card-2-back"
                    style={{
                      fontSize: "34px",
                      color: "#d97706",
                    }}
                  />
                </div>

                <h4
                  className="mb-3"
                  style={{
                    color: "#344054",
                    fontSize: "21px",
                    fontWeight: "600",
                  }}
                >
                  پرداخت تکمیل نشد
                </h4>

                <p
                  className="mb-4"
                  style={{
                    color: "#667085",
                    fontSize: "14px",
                    lineHeight: "2",
                  }}
                >
                  پرداخت شما در درگاه بانکی انجام نشد.
                  <br />
                  رزرو شما همچنان ذخیره شده است و می‌توانید دوباره برای پرداخت
                  اقدام کنید.
                </p>

                {/* Info box */}
                <div
                  className="rounded-4 p-3 mb-4 text-start"
                  style={{
                    background: "rgba(248,250,252,.8)",
                    border: "1px solid #eaecf0",
                  }}
                >
                  <div className="d-flex align-items-center gap-2 mb-2">
                    <i
                      className="bi bi-info-circle"
                      style={{
                        color: "#98a2b3",
                      }}
                    />

                    <span
                      style={{
                        color: "#475467",
                        fontSize: "13px",
                        fontWeight: "500",
                      }}
                    >
                      نکته مهم
                    </span>
                  </div>

                  <p
                    className="mb-0"
                    style={{
                      color: "#667085",
                      fontSize: "12px",
                      lineHeight: "1.9",
                    }}
                  >
                    برای حفظ امنیت، رزرو شما فقط مدت محدودی در حالت انتظار
                    پرداخت باقی می‌ماند.
                  </p>
                </div>

                <Link
                  to="/rooms"
                  className="btn w-100 rounded-3 py-2"
                  style={{
                    background: "#344054",
                    color: "#fff",
                    fontSize: "14px",
                    fontWeight: "500",
                    boxShadow: "0 8px 20px rgba(52,64,84,.18)",
                  }}
                >
                  بازگشت به لیست اتاق‌ها
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
