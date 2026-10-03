import api from "./api";

export async function showFavorites() {
  const res = await api.get("favorites");
  return res.data;
}

export async function removeFavorite(id) {
  const res = await api.delete(`favorite/${id}`);
  return res.data;
}

export async function addToFavorite(id) {
  const res = await api.post(`favorite/${id}`);
  return res.data;
}

export async function isFavorite(id) {
  const res = await api.get(`is-favorite/${id}`);
  return res.data;
}
