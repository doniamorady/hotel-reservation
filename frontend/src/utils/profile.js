export function createFormData(data, dirtyFields) {
  const formData = new FormData();
  if (dirtyFields.first_name) formData.append("first_name", data.first_name);
  if (dirtyFields.last_name) formData.append("last_name", data.last_name);
  if (data.avatar?.[0]) {
    formData.append("avatar", data.avatar[0]);
  }
  formData.append("_method", "PUT");
  return formData;
}
