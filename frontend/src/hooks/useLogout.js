import { useMutation, useQueryClient } from "@tanstack/react-query";
import { logoutApi } from "../services/apiAuth";
import toast from "react-hot-toast";

export function useLogout() {
  const queryClient = useQueryClient();
  return useMutation({
    mutationFn: logoutApi,
    onSuccess: () => {
      queryClient.invalidateQueries({ queryKey: ["user"] });
      toast.success("با موفقیت خارج شدید");
    },
  });
}
