import RoomList from "../components/rooms/RoomList";
import SearchContainer from "../components/SearchContainer";
import SideBar from "../components/rooms/SideBar";
import Loader from "../components/Loader";
import { useRoomsFilters } from "../hooks/useRoomsFilters";

export default function Rooms() {
  const {
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
  } = useRoomsFilters();

  if (isLoading) return <Loader />;
  if (isError) return <div>خطا در دریافت اطلاعات</div>;

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
              length={rooms.length}
            />

            <RoomList
              sortedRooms={rooms}
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
