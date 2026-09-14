import { useEffect, useState } from "react";
import { getRooms } from "../services/apiRoom";
import RoomList from "../components/rooms/RoomList";
import SearchContainer from "../components/SearchContainer";
import SideBar from "../components/rooms/SideBar";
import { useSearchParams } from "react-router-dom";

export default function Rooms() {
  const [rooms, setRooms] = useState([]);
  const [pagination, setPagination] = useState(null);

  const [searchString, setSearchString] = useSearchParams();

  const page = searchString.get("page") || 1;
  const sort = searchString.get("sort");
  const bedroomsParams = searchString.get("bedrooms");

  const bedrooms = bedroomsParams !== null ? Number(bedroomsParams) : null;
  let activeTab = sort || "all";

  useEffect(() => {
    async function loadRooms() {
      const res = await getRooms({ bedrooms, page });
      setRooms(res.data);
      setPagination(res.meta);
    }
    loadRooms();
  }, [bedrooms, page]);

  function getSortedRooms() {
    const data = [...rooms];
    if (sort === "inc") data.sort((a, b) => b.price - a.price);
    if (sort === "desc") data.sort((a, b) => a.price - b.price);
    return data;
  }

  function resetAll() {
    setSearchString({});
  }

  function sortByPrice(value) {
    setSearchString((prev) => {
      const params = new URLSearchParams(prev);
      if (value === "all") params.delete("sort");
      else params.set("sort", value);
      activeTab = value;
      return params;
    });
  }

  function filterByBedrooms(value) {
    setSearchString((prev) => {
      const params = new URLSearchParams(prev);
      params.set("bedrooms", value);
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

  return (
    <>
      <div className="py-5 bg-primary position-relative">
        <div className="container">
          <div className="row justify-content-center align-items-center">
            <SearchContainer />
          </div>
        </div>
      </div>

      <section className="gray-simple">
        <div className="container">
          <div className="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">
            <SideBar
              resetAll={resetAll}
              filterByBedrooms={filterByBedrooms}
              bedrooms={bedrooms}
              length={getSortedRooms().length}
            />

            <RoomList
              sortedRooms={getSortedRooms()}
              sortByPrice={sortByPrice}
              activeTab={activeTab}
              page={page}
              changePage={changePage}
              pagination={pagination}
            />
          </div>
        </div>
      </section>
    </>
  );
}
