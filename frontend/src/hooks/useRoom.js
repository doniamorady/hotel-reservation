import { useQuery } from "@tanstack/react-query";
import { getRoom } from "../services/apiRoom";

export function useRoom(id) {
 
  return useQuery({
    queryKey: ["room", id],
    queryFn: () => getRoom(id),
  });
}
