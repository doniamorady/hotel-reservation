import SingleRoomForRoomList from "../../components/rooms/SingleRoomForRoomList";
import Pagination from "../Pagination";
import RoomsFilter from "./RoomsSorted";

export default function RoomList({ sortedRooms, sortByPrice, activeTab, page, changePage, pagination }) {
  return (
    <div className="col-xl-9 col-lg-8 col-md-12">
      <div className="row align-items-center justify-content-between w-100 p-3 me-1 rounded">
        <div className="col-xl-4 col-lg-4 col-md-4">
          <h5 className="fs-6 mb-lg-0 mb-3">
            نمایش {sortedRooms.length} نتیجه
          </h5>
        </div>
        <RoomsFilter
        sortByPrice={sortByPrice} 
        activeTab={activeTab}
        />
      </div>

      <div className="row align-items-center g-4 mt-2">
        {sortedRooms.map((room) => (
          <SingleRoomForRoomList room={room} key={room.id} />
        ))}

        <div className="col-xl-12 col-lg12 col-md-12">
          <div className="d-md-flex bg-success rounded-2 align-items-center justify-content-between px-3 py-3">
            <div className="d-md-flex align-items-center justify-content-start">
              <div className="flx-icon-first mb-md-0 mb-3">
                <div className="square--60 circle bg-white">
                  <i className="fa-solid fa-gift fs-3 text-success"></i>
                </div>
              </div>
              <div className="flx-caps-first pe-2">
                <h6 className="fs-5 fw-medium text-light mb-0">
                  تجربه‌ای ناب از سفر
                </h6>
                <p className="text-light mb-0">
                  با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                  گرافیک است.
                </p>
              </div>
            </div>
            <div className="flx-last text-md-end mt-md-0 mt-4">
              <button
                type="button"
                className="btn btn-whites fw-medium full-width text-dark px-xl-4"
              >
                رزرو کنید
              </button>
            </div>
          </div>
        </div>

        <Pagination
        page={page} changePage={changePage} pagination={pagination}
        />
      </div>
    </div>
  );
}
