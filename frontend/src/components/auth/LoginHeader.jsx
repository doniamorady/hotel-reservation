export default function LoginHeader() {
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

      <h4 className="fw-bold text-dark mb-2">ورود به حساب کاربری</h4>

      <p className="text-muted small mb-0">
        شماره موبایل خود را وارد کنید تا کد تایید ارسال شود
      </p>
    </div>
  );
}
