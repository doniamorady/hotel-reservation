import { createBooking as createBookingApi } from "../services/apiBooking";
import { convertPersianNumbersToEnglish } from "../utils/ConvertDate";
export function useBooking(bookingData) {
  async function createBooking() {
    const bookingPayload = {
      start_date: convertPersianNumbersToEnglish(
        bookingData.start_date,
      ).replaceAll("/", "-"),
      end_date: convertPersianNumbersToEnglish(bookingData.end_date).replaceAll(
        "/",
        "-",
      ),
      num_guests: bookingData.num_guests,
      has_breakfast: bookingData.has_breakfast,
    };

    try {
      const res = await createBookingApi(bookingData.room_id, bookingPayload);
      return res;
    } catch (error) {
      console.log(error.response.data);
    }
  }

  return [createBooking];
}
