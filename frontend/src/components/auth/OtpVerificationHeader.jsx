export default function OtpVerificationHeader({phone}) {
  return (
    <div className="text-center mb-4">
      <div
        className="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle bg-light border"
        style={{
          width: "100px",
          height: "100px",
        }}
      >
        <img
          src="/logo.png"
          alt="logo"
          style={{
            width: "75px",
          }}
        />
      </div>

      <h4 className="fw-bold text-dark mb-2">تایید شماره موبایل</h4>

      <p className="text-muted small mb-0">
        کد تایید ارسال شده به شماره
        <br />
        <strong className="text-dark">{phone}</strong>
        <br />
        را وارد کنید
      </p>
    </div>
  );
}
