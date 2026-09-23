import { useQuery } from "@tanstack/react-query";
import { getRooms } from "../services/apiRoom";

export function useRooms(bedrooms, page) {
  return useQuery({
    queryKey: ["rooms", bedrooms, page],
    queryFn: () => getRooms({ bedrooms, page }),

    placeholderData: (previousData) => previousData,
  });
}
