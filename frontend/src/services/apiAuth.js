import api from "./api";

export async function sendOtp(phone) {
  const { data } = await api.post("/auth/send-otp", {
    phone,
  });

  return data;
}
export async function verifyOtp(otp_code, phone) {
  const { data } = await api.post("/auth/verify-otp", { otp_code, phone });
  return data;
}

export async function getMe() {
  const response = await api.get("/me");
  return response.data;
}
