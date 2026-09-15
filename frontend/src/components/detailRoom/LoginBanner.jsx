import { Link } from "react-router-dom";

export default function LoginBanner() {
  return (
    <div className="col-xl-12 col-lg-12 col-md-12">
      <div className="d-flex align-items-center justify-content-start py-3 px-3 rounded-2 bg-success mb-4">
        <p className="text-light m-0">
          <i className="fa-solid fa-gift text-warning ms-2"></i>
          <Link to="/login" className="text-white text-decoration-underline">
            ورود
          </Link>
          یا{" "}
          <a href="#" className="text-white text-decoration-underline">
            ثبت نام{" "}
          </a>
          برای دريافت 118 امتیاز در باشگاه مشتریان
        </p>
      </div>
    </div>
  );
}
