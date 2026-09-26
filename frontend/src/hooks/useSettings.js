import { useQuery } from "@tanstack/react-query";
import { getSettings } from "../services/apiSetting";

export function useSettings() {
  return useQuery({
    queryKey: ["settings"],
    queryFn: getSettings,
  });
}
