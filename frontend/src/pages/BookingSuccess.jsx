import { useLocation } from "react-router-dom";
import { ConvertToPersianDate } from "../utils/ConvertDate";

export default function BookingSuccess() {
  const { state } = useLocation();
  const data = state?.data;
  return (
    <div className="container py-5" dir="rtl">
      <div className="row justify-content-center">
        <div className="col-xl-6 col-lg-7">
          <div
            className="card rounded-4 overflow-hidden"
            style={{
              background: "#fff",
              border: "1px solid rgba(32,178,107,.25)",
              boxShadow:
                "0 18px 55px rgba(32,178,107,.20), 0 8px 25px rgba(0,0,0,.06)",
            }}
          >
            <div className="card-body p-4">
              {/* Success */}
              <div className="text-center">
                <div
                  className="mx-auto mb-3 d-flex align-items-center justify-content-center"
                  style={{
                    width: "72px",
                    height: "72px",
                    borderRadius: "50%",
                    background: "rgba(32,178,107,.12)",
                    border: "1px solid rgba(32,178,107,.35)",
                    boxShadow: "0 8px 25px rgba(32,178,107,.22)",
                  }}
                >
                  <i
                    className="bi bi-check-lg"
                    style={{
                      fontSize: "34px",
                      color: "#20b26b",
                    }}
                  />
                </div>

                <h4
                  className="mb-2"
                  style={{
                    color: "#344054",
                    fontSize: "20px",
                    fontWeight: "500",
                  }}
                >
                  رزرو شما با موفقیت انجام شد
                </h4>

                <p
                  className="mb-4"
                  style={{
                    color: "#667085",
                    fontSize: "13px",
                  }}
                >
                  پرداخت شما تایید شد و اطلاعات رزرو شما ثبت گردید.
                </p>
              </div>

              {/* Details */}

              <div
                className="rounded-4 p-3"
                style={{
                  background: "rgba(32,178,107,.045)",
                  border: "1px solid rgba(32,178,107,.15)",
                  textAlign: "right",
                }}
              >
                <div className="d-flex justify-content-between align-items-center mb-3">
                  <h6
                    className="mb-0"
                    style={{
                      color: "#344054",
                      fontSize: "14px",
                      fontWeight: "500",
                    }}
                  >
                    جزئیات رزرو
                  </h6>

                  <span
                    className="rounded-pill px-3 py-1"
                    style={{
                      background: "rgba(32,178,107,.13)",
                      color: "#129653",
                      fontSize: "11px",
                    }}
                  >
                    تایید شده
                  </span>
                </div>

                <div className="row g-3">
                  <InfoItem title="کد رزرو" value="#458921" />

                  <InfoItem title="اتاق رزرو شده" value={data.room.name} />

                  <InfoItem title="تاریخ ورود" value={ConvertToPersianDate(data.start_date)} />

                  <InfoItem title="تاریخ خروج" value={ConvertToPersianDate(data.end_date)} />

                  <InfoItem title="مدت اقامت" value={`${data.num_nights} شب`} />

                  <InfoItem
                    title="تعداد مهمان"
                    value={`${data.num_guests} نفر`}
                  />
                </div>

                <div
                  className="d-flex justify-content-between align-items-center mt-3 pt-3"
                  style={{
                    borderTop: "1px solid rgba(32,178,107,.15)",
                  }}
                >
                  <span
                    style={{
                      color: "#667085",
                      fontSize: "13px",
                    }}
                  >
                    مبلغ پرداخت شده
                  </span>

                  <span
                    style={{
                      color: "#129653",
                      fontSize: "15px",
                      fontWeight: "500",
                    }}
                  >
                    {data.total_price.toLocaleString()} تومان
                  </span>
                </div>
              </div>

              <button
                className="btn w-100 mt-4 py-2 rounded-3"
                style={{
                  background: "#20b26b",
                  color: "#fff",
                  fontSize: "14px",
                  boxShadow: "0 8px 22px rgba(32,178,107,.30)",
                }}
              >
                مشاهده رزروهای من
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

function InfoItem({ title, value }) {
  return (
    <div className="col-6">
      <div
        style={{
          color: "#98A2B3",
          fontSize: "11px",
          marginBottom: "4px",
        }}
      >
        {title}
      </div>

      <div
        style={{
          color: "#475467",
          fontSize: "13px",
        }}
      >
        {value}
      </div>
    </div>
  );
}
