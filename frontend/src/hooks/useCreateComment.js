import { useMutation } from "@tanstack/react-query";
import { createComment } from "../services/apiComment";
import toast from "react-hot-toast";

export function useCreateComment() {
  return useMutation({
    mutationFn: ({ id, data }) => createComment(id, data),
    onSuccess: () => {
      toast.success("دیدگاه با موفقیت اضافه و پس از تایید نمایش داده خواهد شد");
    },
    onError: () => {
      toast.error("ثبت دیدگاه با خطا مواجه شد");
    },
  });
}
