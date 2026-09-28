import { Link } from "react-router-dom";

export default function CommentLoginPrompt() {
  return (
    <div
      className="rounded-4 p-3 mt-4"
      style={{
        background: "linear-gradient(135deg, #F8FBFF 0%, #FFFFFF 100%)",
        border: "1px solid #DDE7F5",
        boxShadow: "0 6px 20px rgba(16,24,40,.05)",
      }}
    >
      <div className="d-flex align-items-center justify-content-between gap-3">
        {/* Message */}
        <div className="d-flex align-items-center">
          <div
            className="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
            style={{
              width: "46px",
              height: "46px",
              background: "#EFF6FF",
              color: "#2563EB",
              border: "1px solid #DBEAFE",
            }}
          >
            <i
              className="fa-solid fa-user-lock"
              style={{
                fontSize: "18px",
              }}
            />
          </div>

          <div className="me-3">
            <h6
              className="mb-1"
              style={{
                color: "#1D2939",
                fontSize: "14px",
                fontWeight: "600",
              }}
            >
              برای ثبت دیدگاه وارد حساب کاربری شوید
            </h6>

            <p
              className="mb-0"
              style={{
                color: "#667085",
                fontSize: "12px",
              }}
            >
              پس از ورود، تجربه اقامت خود را با سایر مهمانان به اشتراک بگذارید.
            </p>
          </div>
        </div>

        {/* CTA */}
        <Link
          to="/login"
          className="d-flex align-items-center rounded-3 px-4 py-2"
          style={{
            background: "#2563EB",
            color: "#fff",
            fontSize: "13px",
            fontWeight: "500",
            textDecoration: "none",
            boxShadow: "0 8px 18px rgba(37,99,235,.25)",
            transition: ".2s",
            whiteSpace: "nowrap",
          }}
          onMouseEnter={(e) => {
            e.currentTarget.style.transform = "translateY(-2px)";
            e.currentTarget.style.boxShadow = "0 12px 25px rgba(37,99,235,.35)";
          }}
          onMouseLeave={(e) => {
            e.currentTarget.style.transform = "translateY(0)";
            e.currentTarget.style.boxShadow = "0 8px 18px rgba(37,99,235,.25)";
          }}
        >
          ورود به حساب
          <i className="fa-solid fa-arrow-left me-2"></i>
        </Link>
      </div>
    </div>
  );
}
