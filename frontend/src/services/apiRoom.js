import api from "./api";

export async function getRooms(params) {
  const res = await api.get(`/rooms`, {
    params
  });
  return res.data;
}

export async function getRoom(id) {
  const {
    data
  } = await api.get(`/rooms/${id}`);
  return data.data;
}

export async function reserveRoom(roomId, payload) {
  const {
    data
  } = await api.post(`/bookings/room/${roomId}`, payload);
  return data;
}

export async function getBooking(bookingId) {
  const {
    data
  } = await api.get(`/bookings/${bookingId}`);
  return data.data;
}