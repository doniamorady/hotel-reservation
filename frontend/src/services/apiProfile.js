import api from "./api";

export async function updateProfile(formData) {
  const data = new FormData();

  data.append("first_name", formData.first_name);
  data.append("last_name", formData.last_name);
  data.append("phone", formData.phone);

  if (formData.avatar) {
    data.append("avatar", formData.avatar);
  }

  data.append("_method", "PUT");

  const response = await api.post("/profile", data, {
    headers: {
      "Content-Type": "multipart/form-data",
    },
  });

  return response.data;
}