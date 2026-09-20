import api from "./api";


export async function createBooking(id, data) {
  const response = await api.post(`/bookings/room/${id}`, data);
  return response.data;
}

export async function availabilityRoom(id,data){
  const res = await api.post(`/rooms/${id}/availability`,data);
  return res.data;
}