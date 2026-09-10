import { useState } from "react";
import { useNavigate } from "react-router-dom";
import HeadTag from "../../layouts/HeadTag";
import { sendOtp, verifyOtp } from "../../services/apiAuth";
import api from "../../services/api";

export default function Login() {
  const navigate = useNavigate();

  const [step, setStep] = useState(1);
  const [phone, setPhone] = useState("");
  const [otp, setOtp] = useState("");
  const [loading, setLoading] = useState(false);

  // ارسال کد تایید
  const handleSendOtp = async (e) => {
    e.preventDefault();

    try {
      setLoading(true);

      await sendOtp(phone);

      setStep(2);
    } catch (error) {
      alert(error.response?.data?.message || "خطا در ارسال کد");
    } finally {
      setLoading(false);
    }
  };

  // تایید کد و لاگین
  const handleVerifyOtp = async (e) => {
    e.preventDefault();

    try {
      setLoading(true);

      const data = await verifyOtp(otp, phone);

      // ذخیره توکن
      localStorage.setItem("auth_token", data.token);

      // ذخیره اطلاعات کاربر
      localStorage.setItem("user", JSON.stringify(data.user));

      // ست کردن هدر Authorization
      api.defaults.headers.common["Authorization"] =
        `${data.token_type} ${data.token}`;

      // انتقال به صفحه اصلی
      navigate("/");
    } catch (error) {
      alert(error.response?.data?.message || "کد وارد شده صحیح نیست.");
    } finally {
      setLoading(false);
    }
  };

  return (
    <>
      <HeadTag />

      <section className="py-5">
        <div className="container">
          <div className="row justify-content-center align-items-center m-auto mt-5">
            <div className="col-lg-4 col-md-6">
              <div
                className="bg-mode card shadow-sm rounded-3 overflow-hidden"
                style={{ width: "100%" }}
              >
                <div className="p-4 p-sm-5">
                  <div className="text-center mb-4">
                    <img
                      src="/logo.png"
                      alt="logo"
                      style={{ width: "100px" }}
                    />
                  </div>

                  <h3 className="text-center mb-4">
                    {step === 1 ? "ورود" : "تایید کد"}
                  </h3>

                  {/* مرحله اول */}
                  {step === 1 && (
                    <form onSubmit={handleSendOtp}>
                      <div className="mb-3">
                        <label className="form-label">شماره موبایل</label>

                        <input
                          type="text"
                          className="form-control"
                          value={phone}
                          onChange={(e) => setPhone(e.target.value)}
                          placeholder="09123456789"
                          style={{ height: "48px" }}
                        />
                      </div>

                      <button
                        type="submit"
                        disabled={loading}
                        className="btn btn-primary w-100"
                      >
                        {loading ? "در حال ارسال..." : "ارسال کد تایید"}
                      </button>
                    </form>
                  )}

                  {/* مرحله دوم */}
                  {step === 2 && (
                    <form onSubmit={handleVerifyOtp}>
                      <div className="alert alert-success">
                        کد تایید به شماره
                        <strong> {phone} </strong>
                        ارسال شد.
                      </div>

                      <div className="mb-3">
                        <label className="form-label">کد تایید</label>

                        <input
                          type="text"
                          className="form-control"
                          value={otp}
                          onChange={(e) => setOtp(e.target.value)}
                          placeholder="123456"
                          style={{ height: "48px" }}
                        />
                      </div>

                      <button
                        type="submit"
                        disabled={loading}
                        className="btn btn-success w-100"
                      >
                        {loading ? "در حال بررسی..." : "تایید و ورود"}
                      </button>

                      <button
                        type="button"
                        className="btn btn-link w-100 mt-3"
                        onClick={() => setStep(1)}
                      >
                        تغییر شماره موبایل
                      </button>
                    </form>
                  )}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
