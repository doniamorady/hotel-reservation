  import { Link } from "react-router-dom";

  export default function BookingButton({bookingData, errors, user}) {
    return (
      <div className="col-12">
        <Link
          to={user ? "prepare" : "/login"}
          state={bookingData}
          className={`btn btn-primary full-width fw-medium ${
            errors.availability || errors.startDate ? "disabled opacity-50" : ""
          }`}
          onClick={(e) => {
            if (errors.availability) e.preventDefault();
          }}
        >
          {!user ? "ورود/ثبت‌نام" : "اقامت"}
        </Link>
      </div>
    );
  }
