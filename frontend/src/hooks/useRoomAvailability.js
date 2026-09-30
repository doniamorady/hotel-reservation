import { useEffect, useState } from "react";
import { availabilityRoom } from "../services/apiBooking";
import { toGregorian } from "../utils/date";
export function useRoomAvailability(startDate, endDate, room, numGuests) {
  const [errors, setErrors] = useState({});
  useEffect(() => {
    async function checkAvailability() {
      const start_date = toGregorian(startDate);
      const end_date = toGregorian(endDate);
      const available = await availabilityRoom(room.id, {
        start_date,
        end_date,
      });

      const newErrors = {};
      if (!available)
        newErrors.availability =
          "لطفا تاریخ دیگری انتخاب کنید.این تاریخ رزرو شده است";

      if (endDate.toDate() <= startDate.toDate()) {
        newErrors.startDate = "تاریخ خروج باید بعد از تاریخ ورود باشد";
      }

      if (numGuests > room.capacity) {
        newErrors.numGuests = `حداکثر ظرفیت این اتاق ${room.capacity} نفر است`;
      }

      setErrors(newErrors);
    }

    checkAvailability();
  }, [startDate, endDate, numGuests, room.capacity, room.id]);

  return errors;
}
