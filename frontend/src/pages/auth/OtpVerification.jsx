import { useState } from "react";
import HeadTag from "../../layouts/HeadTag";
import { Link } from "react-router-dom";
import OtpVerificationHeader from "../../components/auth/OtpVerificationHeader";
import LoadingButton from "../../components/LoadingButton";
import { useOtpVerication } from "../../hooks/useOtpVerication";

export default function OtpVerification({ phone, setStep }) {
  const [otp_code, setOtp] = useState("");
  const [verification, error, isLoading] = useOtpVerication(otp_code, phone);
   
  async function handleSubmit(e) {
    e.preventDefault();
    verification();
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
                    <LoadingButton
                      isLoading={isLoading}
                      message1="لطفا منتظر مانید ..."
                      message2="تایید و ورود"
                    />
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
