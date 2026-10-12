import { useQuery } from "@tanstack/react-query";
import {
  createBooking as createBookingApi,
  myBookings,
  statusBookings,
} from "../services/apiBooking";
import { getBooking } from "../services/apiRoom";

export function useBooking(bookingData) {
  async function createBooking() {
    const bookingPayload = {
      start_date: bookingData.start_date,
      end_date: bookingData.end_date,
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

export function useGetMyBooking(status) {
  return useQuery({
    queryKey: ["myBookings", status],
    queryFn: () => myBookings(status),
  });
}

export function useGetBooking(id) {
  return useQuery({
    queryKey: ["booking"],
    queryFn: () => getBooking(id),
  });
}

export function useStatusBookings() {
  return useQuery({
    queryKey: ["booking"],
    queryFn: statusBookings,
  });
}
