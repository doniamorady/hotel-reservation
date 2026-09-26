import { useState } from "react";
import { sendOtp } from "../services/apiAuth";

export function useLogin(phone) {
  const [error, setError] = useState("");
  const [isSending, setIsSending] = useState(false);
  const [step, setStep] = useState(1);

  async function login() {
    const phoneRegex = /^(0|\+98|98)9\d{9}$/;

    if (!phone) {
      setError("شماره تلفن الزامی میباشد");
      return;
    }

    if (!phoneRegex.test(phone)) {
      setError("فرمت شماره وارد شده صحیح نمیباشد");
      return;
    }

    try {
      setIsSending(true);
      const res = await sendOtp(phone);
      console.log(res);
      setStep(2);
    } catch (error) {
      setError(error.response?.data?.message || "خطا در ارسال کد تایید");
    } finally {
      setIsSending(false);
    }
  }

  return [login, error, setError, isSending, step, setStep];
}
