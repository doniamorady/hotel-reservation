import api from "./api";


export async function createBooking(roomId, data) {
  const response = await api.post(`/bookings/room/${roomId}`, data);
  return response.data;
}