import api from "./api";

export async function updateProfile(data) {
  await api.post("profile", data);
}
