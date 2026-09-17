import { useState } from "react";
import HeadTag from "../../layouts/HeadTag";
import { Link, useNavigate } from "react-router-dom";
import { verifyOtp } from "../../services/apiAuth";
import OtpVerificationHeader from "../../components/auth/OtpVerificationHeader";

export default function OtpVerification({ phone, setStep }) {
  const [otp_code, setOtp] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate();

  async function handleSubmit(e) {
    e.preventDefault();

    if (!otp_code) {
      setError("کد تاییدیه اجباری است");
      return;
    }

    try {
      const res = await verifyOtp(otp_code, phone);
      localStorage.setItem("token", res.token);
      navigate("/");
    } catch (error) {
      if (error.response?.status === 422) {
        setError(error.response.data.message);
      } else {
        setError("مشکلی در سرور رخ داده است.");
      }
    }
  }

  return (
    <>
      <HeadTag />

      <section className="py-5 min-vh-100 d-flex align-items-center">
        <div className="container">
          <div className="row justify-content-center">
            <div className="col-xl-4 col-lg-5 col-md-6">
              <div className="card border border-light-subtle shadow-sm rounded-4 overflow-hidden">
                <div className="card-body p-4 p-sm-5">
                  {/* Logo */}

                  <OtpVerificationHeader phone={phone} />

                  <form onSubmit={handleSubmit}>
                    <div className="mb-4">
                      <label className="form-label text-dark fw-medium">
                        کد تایید
                      </label>

                      <input
                        type="text"
                        maxLength="6"
                        className="form-control text-center login-input"
                        placeholder="------"
                        value={otp_code}
                        onChange={(e) =>
                          setOtp(e.target.value.replace(/\D/g, ""))
                        }
                        style={{
                          height: "55px",
                          fontSize: "22px",
                          letterSpacing: "8px",
                        }}
                      />
                      {error && (
                        <small className="text-danger d-block mt-1 text-xs">
                          <i className="fa-solid fa-circle-exclamation ms-1"></i>
                          {error}
                        </small>
                      )}
                    </div>

                    <button
                      type="submit"
                      className="btn btn-primary w-100 rounded-3 py-3 fw-medium"
                    >
                      تایید و ورود
                      <i className="fa-solid fa-arrow-left me-2"></i>
                    </button>
                  </form>

                  <div className="text-center mt-4">
                    <Link
                      onClick={() => setStep(1)}
                      to="/login"
                      className="btn btn-link text-muted p-0"
                    >
                      تغییر شماره موبایل
                    </Link>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
