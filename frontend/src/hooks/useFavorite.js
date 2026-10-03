import { useMutation, useQuery, useQueryClient } from "@tanstack/react-query";
import {
  addToFavorite,
  isFavorite,
  removeFavorite,
  showFavorites,
} from "../services/apiFavorite";
import toast from "react-hot-toast";

export function useShowFavorites() {
  return useQuery({
    queryKey: ["favorites"],
    queryFn: showFavorites,
  });
}

export function useIsFavorite(id) {
  return useQuery({
    queryKey: ["favorite", id],
    queryFn: () => isFavorite(id),
  });
}

export function useDeleteFavorite(id) {
  const queryClient = useQueryClient();
  return useMutation({
    mutationFn: () => removeFavorite(id),
    onSuccess: () => {
      queryClient.invalidateQueries({
        queryKey: ["favorites"],
      });

      queryClient.setQueryData(["favorite", id], { isFavorite: false });
      toast.error("اتاق باموفقیت از لیست علاقه‌مندی ها حذف شد");
    },
  });
}

export function useAddFavorite(id) {
  const queryClient = useQueryClient();
  return useMutation({
    mutationFn: ()=>addToFavorite(id),
    onSuccess: () => {
      toast.success("اتاق با موفقیت به علاقه مندی ها اضافه شد");
      queryClient.invalidateQueries({
        queryKey: ["favorites"],
      });
      queryClient.setQueryData(['favorite', id], {isFavorite:true})
    },
  });
}
