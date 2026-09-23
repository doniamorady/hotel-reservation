import { useQuery } from "@tanstack/react-query";
import { getRooms } from "../services/apiRoom";

export function useRooms(params={}) {
  return useQuery({
    queryKey: ["rooms",params],
    queryFn: () => getRooms(params),

    placeholderData: (previousData) => previousData,
  });
}
