import { useState } from "react";
import HeadTag from "../../layouts/HeadTag";
import OtpVerification from "./OtpVerification";
import LoginHeader from "../../components/auth/LoginHeader";
import LoadingButton from "../../components/LoadingButton";
import { useLogin } from "../../hooks/useLogin";

export default function Login() {
  const [phone, setPhone] = useState("");
  const [login, error, setError, isSending, step, setStep] = useLogin(phone);

  async function handleSubmit(e) {
    e.preventDefault();
    login();
  }

  if (step === 2) return <OtpVerification phone={phone} setStep={setStep} />;

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

                  <LoginHeader />

                  <form onSubmit={handleSubmit}>
                    <div className="mb-4">
                      <label className="form-label text-dark fw-medium">
                        شماره موبایل
                      </label>

                      <div className="position-relative">
                        <i
                          className="fa-solid fa-mobile-screen position-absolute top-50 translate-middle-y text-muted"
                          style={{
                            right: "15px",
                          }}
                        ></i>

                        <input
                          type="tel"
                          className="form-control text-end login-input"
                          placeholder="مثلا 09123456789"
                          value={phone}
                          onChange={(e) => {
                            setPhone(e.target.value);
                            setError("");
                          }}
                          style={{
                            height: "52px",
                            paddingRight: "45px",
                          }}
                        />
                        {error && (
                          <small className="text-danger d-block mt-1 text-xs">
                            <i className="fa-solid fa-circle-exclamation ms-1"></i>
                            {error}
                          </small>
                        )}
                      </div>
                    </div>

                    <LoadingButton
                      isLoading={isSending}
                      message1="در حال ارسال"
                      message2="کد تایید"
                    />
                  </form>

                  <div className="text-center mt-4">
                    <p className="text-muted small mb-0">
                      ورود سریع و امن با شماره موبایل
                    </p>
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
