import { useQuery } from "@tanstack/react-query";
import { getMe } from "../services/apiAuth";

export function useMe() {
  const token = localStorage.getItem("token");
  return useQuery({
    queryKey: ["user"],
    queryFn: getMe,
    enabled: !!token,
    retry: false,
  });
}
