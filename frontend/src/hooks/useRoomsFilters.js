import { useSearchParams } from "react-router-dom";
import { useRooms } from "./useRooms";
import { sortRoomByPrice } from "../utils/rooms";

export function useRoomsFilters() {
  const [searchString, setSearchString] = useSearchParams();

  const page = Number(searchString.get("page")) || 1;
  const sort = searchString.get("sort");
  const bedroomsParams = searchString.get("bedrooms");

  const bedrooms = bedroomsParams !== null ? Number(bedroomsParams) : null;
  let activeTab = sort || "all";

  const { data, isLoading, isError } = useRooms(bedrooms, page);

  const rooms = sortRoomByPrice(data?.data || [], sort);
  const pagination = data?.meta;

  function resetAll() {
    setSearchString({});
  }

  function filterByBedrooms(value) {
    setSearchString((prev) => {
      const params = new URLSearchParams(prev);
      params.set("bedrooms", value);
      return params;
    });
  }

  function sortByPrice(value) {
    setSearchString((prev) => {
      const params = new URLSearchParams(prev);
      if (value === "all") params.delete("sort");
      else params.set("sort", value);
      return params;
    });
  }

  function changePage(value) {
    setSearchString((prev) => {
      const params = new URLSearchParams(prev);
      if (value == 1) params.delete("page");
      else params.set("page", value);
      return params;
    });
  }

  return {
 rooms,
    bedrooms,
    page,
    activeTab,
    pagination,
    filterByBedrooms,
    sortByPrice,
    changePage,
    resetAll,
    isLoading,
    isError,
  };
}
