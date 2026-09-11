import { Link } from "react-router-dom";

export default function Room({ room }) {
  return (
    <div>
      <div className="pop-touritem">
        <Link
          to={`rooms/${room.id}`}
          className="card rounded-3 border br-dashed m-0"
        >
          <div className="flight-thumb-wrapper">
            <div className="popFlights-item-overHidden">
              <img src={room.cover_image} className="img-fluid" alt="" />
            </div>
          </div>
          <div className="touritem-middle position-relative p-3">
            <div className="touritem-flexxer">
              <div className="d-flex align-items-start justify-content-start flex-column">
                <span className="city-destination label text-success bg-light-success mb-1">
                  بوم گردی
                </span>
                <h4 className="city fs-title m-0">
                  <span>رزرو {room.name}</span>
                </h4>
              </div>
              <div className="detail ellipsis-container mt-3">
                <span className="ellipsis">{room.bedrooms} خوابه</span>
                <span className="ellipsis">{room.area} مترمربع</span>
                <span className="ellipsis">1 انباری</span>
              </div>
            </div>
            <div className="flight-footer">
              <div className="epocsic">
                <span className="label d-inline-flex bg-light-danger text-danger mb-1">
                  15% تخفیف
                </span>
                <h5 className="fs-5 low-price m-0">
                  <span className="price">
                    {(room.price * 0.75).toLocaleString()} تومان
                  </span>
                </h5>
              </div>
              <div className="rates">
                <div className="star-rates">
                  <i className="fa-solid fa-star active"></i>
                  <i className="fa-solid fa-star active"></i>
                  <i className="fa-solid fa-star active"></i>
                  <i className="fa-solid fa-star active"></i>
                  <i className="fa-solid fa-star active"></i>
                </div>
                <div className="rat-reviews">
                  <strong>4.6</strong>
                  <span>({room.comments.length} دیدگاه)</span>
                </div>
              </div>
            </div>
          </div>
        </Link>
      </div>
    </div>
  );
}
