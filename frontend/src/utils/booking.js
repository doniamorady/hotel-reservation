export function calculateNights(startDate, endDate) {
  if (!startDate || !endDate) return 0;

  const start = startDate.toDate();
  const end = endDate.toDate();

  start.setHours(0, 0, 0, 0);
  end.setHours(0, 0, 0, 0);

  const diffTime = end - start;

  const diffDays = Math.ceil(diffTime / (24 * 60 * 60 * 1000));

  return diffDays;
}

export function calculateBookingPrice(
  hasBreakfast,
  breakfastUnitPrice,
  numGuests,
  numNights,
  roomPrice,
) {
  let breakfastPrice = 0;

  if (hasBreakfast) {
    breakfastPrice = breakfastUnitPrice * numGuests * numNights;
  }

  const roomPriceTotal = numNights * roomPrice;

  const totalPrice = roomPriceTotal + breakfastPrice;

  return {
    breakfastPrice,
    roomPriceTotal,
    totalPrice,
  };
}
