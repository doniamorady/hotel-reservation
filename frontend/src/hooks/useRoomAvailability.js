import { useEffect, useState } from "react";
import { availabilityRoom } from "../services/apiBooking";
import { ConvertDate } from "../utils/ConvertDate";

export function useRoomAvailability(startDate, endDate, room, numGuests) {
  const [errors, setErrors] = useState({});
  useEffect(() => {
    async function checkAvailability() {
      const start_date = ConvertDate(startDate.format("YYYY/MM/DD"));
      const end_date = ConvertDate(endDate.format("YYYY/MM/DD"));
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
