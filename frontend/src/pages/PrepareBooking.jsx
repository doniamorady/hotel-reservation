import { useEffect, useState } from "react";
import { createBooking } from "../services/apiBooking";
import { useNavigate, useLocation, useParams } from "react-router-dom";
import { getRoom } from "../services/apiRoom";
import { getMe } from "../services/apiAuth";

function formatDate(date) {
  if (!date) return "";

  return new Date(date).toLocaleDateString("fa-IR");
}

export default function PrepareBooking() {
  const navigate = useNavigate();
  const location = useLocation();
  const { id } = useParams();

  const bookingData = location.state;

  const [room, setRoom] = useState({});
  const [user, setUser] = useState(null);

  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");

  const [form, setForm] = useState({
    username: "",
    national_code: "",
    email: "",
    mobile: "",
  });

  useEffect(() => {
    async function loadData() {
      try {
        const roomData = await getRoom(id);
        setRoom(roomData);

        const userData = await getMe();

        setUser(userData);

        setForm({
          username: userData.name ?? "",
          national_code: userData.national_code ?? "",
          email: userData.email ?? "",
          mobile: userData.phone ?? userData.mobile ?? "",
        });
      } catch (error) {
        console.log(error);
      }
    }

    loadData();
  }, [id]);

  function handleChange(e) {
    const { name, value } = e.target;

    setForm((prev) => ({
      ...prev,

      [name]: value,
    }));
  }

  async function handleSubmit(e) {
    e.preventDefault();

    try {
      setLoading(true);
      setError("");

      const payload = {
        start_date: bookingData.start_date,
        end_date: bookingData.end_date,
        num_guests: bookingData.num_guests,
        has_breakfast: bookingData.has_breakfast,
        username: form.username,
        national_code: form.national_code,
        email: form.email,
      };

      const response = await createBooking(id, payload);
      navigate(`/bookings/${response.id}`);
    } catch (error) {
      setError(error.response?.data?.message || "خطا در ثبت رزرو");
    } finally {
      setLoading(false);
    }
  }

  if (!bookingData) {
    return <div className="container mt-5">اطلاعات رزرو پیدا نشد</div>;
  }

  return (
    <main className="py-5 mb-5">
      <div className="container">
        <div className="row g-4 flex-row-reverse">
          {/* خلاصه رزرو */}

          <div className="col-lg-5">
            <div className="card shadow-sm border-0">
              <div className="card-body">
                <h5 className="fw-bold mb-3">{room.name}</h5>

                <hr />

                <div className="mb-3">
                  <span className="text-muted">تاریخ ورود</span>

                  <div className="fw-bold mt-1">
                    {formatDate(bookingData.start_date)}
                  </div>
                </div>

                <div className="mb-3">
                  <span className="text-muted">تاریخ خروج</span>

                  <div className="fw-bold mt-1">
                    {formatDate(bookingData.end_date)}
                  </div>
                </div>

                <div className="d-flex justify-content-between mb-3">
                  <span>تعداد مهمان</span>

                  <strong>{bookingData.num_guests} نفر</strong>
                </div>

                <div className="d-flex justify-content-between mb-3">
                  <span>صبحانه</span>

                  <strong>
                    {bookingData.has_breakfast ? "دارد" : "ندارد"}
                  </strong>
                </div>

                <hr />

                <div className="d-flex justify-content-between">
                  <span>قیمت هر شب</span>

                  <strong className="text-primary">
                    {room.price ? room.price.toLocaleString() : "-"} تومان
                  </strong>
                </div>
              </div>
            </div>
          </div>

          {/* فرم */}

          <div className="col-lg-7">
            <div className="card border-0 shadow-sm">
              <div className="card-body">
                <h4 className="mb-4">مشخصات رزرو کننده</h4>

                {error && <div className="alert alert-danger">{error}</div>}

                <form onSubmit={handleSubmit}>
                  <div className="row g-3">
                    <div className="col-md-6">
                      <input
                        className="form-control"
                        name="username"
                        placeholder="نام و نام خانوادگی"
                        value={form.username}
                        onChange={handleChange}
                      />
                    </div>

                    <div className="col-md-6">
                      <input
                        className="form-control"
                        name="national_code"
                        placeholder="کد ملی"
                        value={form.national_code}
                        onChange={handleChange}
                      />
                    </div>

                    <div className="col-md-6">
                      <input
                        className="form-control"
                        name="email"
                        placeholder="ایمیل"
                        value={form.email}
                        onChange={handleChange}
                      />
                    </div>

                    <div className="col-md-6">
                      <input
                        className="form-control"
                        name="mobile"
                        placeholder="شماره موبایل"
                        value={form.mobile}
                        readOnly
                      />
                    </div>

                    <div className="col-12 mt-4">
                      <button
                        className="btn btn-primary w-100"
                        disabled={loading}
                      >
                        {loading ? "در حال ثبت..." : "تایید و رزرو"}
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  );
}
