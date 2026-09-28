import api from "./api";

export async function createComment(id,data) {
  const res = await api.post(`rooms/${id}/comment`, data);
  return res.data;
}
