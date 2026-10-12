import api from "./api";

export async function createBooking(id, data) {
  const response = await api.post(`/bookings/room/${id}`, data);
  const paymentUrl = response.data.payment_url;
  window.location.href = paymentUrl;
}

export async function availabilityRoom(id, data) {
  const res = await api.post(`/rooms/${id}/availability`, data);
  return res.data;
}

export async function myBookings(status) {
  const { data } = await api.get(`/bookings/status/${status}`);
  return data.data;
}

export async function getBooking(id) {
  const res = await api.get(`/bookings/${id}`);
  return res.data;
}

export async function statusBookings() {
  const res = await api.get(`/bookings/all-status`);
  return res.data;
}
