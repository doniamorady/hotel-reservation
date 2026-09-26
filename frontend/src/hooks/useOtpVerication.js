import { useState } from "react";
import { useNavigate } from "react-router-dom";
import { verifyOtp } from "../services/apiAuth";

export function useOtpVerication(otp_code, phone) {
  const [error, setError] = useState("");
  const [isLoading, setIsLoading] = useState(false);
  const navigate = useNavigate();

  async function verification() {
    if (!otp_code) {
      setError("کد تاییدیه اجباری است");
      return;
    }

    try {
      setIsLoading(true);
      const res = await verifyOtp(otp_code, phone);
      localStorage.setItem("token", res.token);
      navigate("/");
    } catch (error) {
      if (error.response?.status === 422) {
        setError(error.response.data.message);
      } else {
        setError("مشکلی در سرور رخ داده است.");
      }
    } finally {
      setIsLoading(false);
    }
  }

  return [verification, error, isLoading];
}
