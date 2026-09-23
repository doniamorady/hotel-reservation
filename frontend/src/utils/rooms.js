export function sortRoomByPrice(rooms, sort) {
  const data = [...rooms];
  if (sort === "inc") data.sort((a, b) => b.price - a.price);
  if (sort === "desc") data.sort((a, b) => a.price - b.price);
  return data;
}
