import { createBooking as createBookingApi } from "../services/apiBooking";

export function useBooking(bookingData) {
  async function createBooking() {
    const bookingPayload = {
      start_date: bookingData.start_date,
      end_date: bookingData.end_date,
      num_guests: bookingData.num_guests,
      has_breakfast: bookingData.has_breakfast,
    };

    try {
      const res = await createBookingApi(
        bookingData.room_id,
        bookingPayload
      );

      return res;
    } catch (error) {
      console.log(error.response.data);
    }
  }

  return [createBooking];
}