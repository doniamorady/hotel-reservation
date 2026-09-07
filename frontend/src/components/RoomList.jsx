import { useEffect, useState } from "react";
import SingleRoomForRoomList from "./SingleRoomForRoomList";
import { getRooms } from "../services/apiRoom";

export default function RoomList() {
  const [rooms, setRooms] = useState([]);
  const [activeButton, setActiveButton] = useState(0);
  const [sortRoom, setSortRoom] = useState([]);

  useEffect(() => {
    async function loadRooms() {
      const data = await getRooms();
      setRooms(data);
      setSortRoom(data);
    }

    loadRooms();
  }, []);

  function filterHandler(filter) {
    setActiveButton(filter);

    if (filter === 0) {
      setSortRoom(rooms);
      return;
    }

    const sortedRooms = [...rooms].sort((a, b) => {
      if (filter === 1) return b.price - a.price;
      else return a.price - b.price;
    });

    setSortRoom(sortedRooms);
  }

  return (
    <div className="col-xl-9 col-lg-8 col-md-12">
      <div className="row align-items-center justify-content-between w-100 p-3 me-1 rounded">
        <div className="col-xl-4 col-lg-4 col-md-4">
          <h5 className="fs-6 mb-lg-0 mb-3">نمایش {sortRoom.length} نتیجه</h5>
        </div>
        <div className="col-xl-8 col-lg-8 col-md-12">
          <div className="d-flex align-items-center justify-content-start justify-content-lg-end flex-wrap">
            <div className="flsx-first mt-sm-0 mt-2">
              <ul
                className="nav nav-pills nav-fill p-1 small lights blukker bg-primary rounded-3 shadow-sm"
                id="filtersblocks"
                role="tablist"
              >
                <li className="nav-item" role="presentation">
                  <button
                    className={`nav-link rounded-3 ${activeButton === 0 ? "active" : ""}`}
                    id="trending"
                    type="button"
                    onClick={() => filterHandler(0)}
                  >
                    پیش فرض
                  </button>
                </li>
                <li className="nav-item" role="presentation">
                  <button
                    className={`nav-link rounded-3 ${activeButton === 1 ? "active" : ""}`}
                    id="mostpopular"
                    type="button"
                    onClick={() => filterHandler(1)}
                  >
                    بیشترین قیمت
                  </button>
                </li>
                <li className="nav-item" role="presentation">
                  <button
                    className={`nav-link rounded-3 ${activeButton === -1 ? "active" : ""}`}
                    id="lowprice"
                    type="button"
                    onClick={() => filterHandler(-1)}
                  >
                    کمترین قیمت
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div className="row align-items-center g-4 mt-2">
        {sortRoom.map((room) => (
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

        <div className="col-xl-12 col-lg-12 col-12">
          <div className="pags card py-2 px-5">
            <nav aria-label="Page navigation example">
              <ul className="pagination m-0 p-0">
                <li className="page-item">
                  <a className="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">
                      <i className="fa-solid fa-arrow-left-long"></i>
                    </span>
                  </a>
                </li>
                <li className="page-item active">
                  <a className="page-link" href="#">
                    1
                  </a>
                </li>
                <li className="page-item">
                  <a className="page-link" href="#">
                    2
                  </a>
                </li>
                <li className="page-item">
                  <a className="page-link" href="#">
                    3
                  </a>
                </li>
                <li className="page-item">
                  <a className="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">
                      <i className="fa-solid fa-arrow-right-long"></i>
                    </span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  );
}
