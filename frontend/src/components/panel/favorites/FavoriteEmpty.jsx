import { Link } from "react-router-dom";

export default function FavoriteEmpty() {
  return (
    <div className="card border-0 shadow-sm rounded-4">
      <div className="card-body text-center py-5">
        <div
          className="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center bg-light-primary"
          style={{
            width: "70px",
            height: "70px",
          }}
        >
          <i className="fa-solid fa-heart text-primary fs-3"></i>
        </div>

        <h6 className="text-dark mb-2">هنوز اتاقی ذخیره نکرده‌اید</h6>

        <p className="text-muted small mb-4">
          اتاق‌های مورد علاقه خود را اضافه کنید تا بعداً راحت‌تر پیدا کنید
        </p>

        <Link to="/rooms" className="btn btn-primary rounded-3 px-4">
          مشاهده اتاق‌ها
        </Link>
      </div>
    </div>
  );
}
