import { useMutation, useQueryClient } from "@tanstack/react-query";
import { updateProfile } from "../services/apiProfile";
import toast from "react-hot-toast";

export function useUpdateProfile() {
  const queryClient = useQueryClient();
  return useMutation({
    mutationFn: (data) => updateProfile(data),
    onSuccess: () => {
      toast.success("اطلاعات با موفقیت ویرایش شد");
      queryClient.invalidateQueries({
        queryKey: ["user"],
      });
    },
  });
}
