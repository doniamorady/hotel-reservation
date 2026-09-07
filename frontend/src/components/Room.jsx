export default function Room({ room }) {
  return (
    <div className="carousel-cell">
      <div className="pop-touritem">
        <a href="#" className="card rounded-3 border br-dashed m-0">
          <div className="flight-thumb-wrapper">
            <div className="popFlights-item-overHidden">
              <img
                src={`assets/img/hotel/hotel-${room.id}.jpg`}
                className="img-fluid"
                alt=""
              />
            </div>
          </div>
          <div className="touritem-middle position-relative p-3">
            <div className="touritem-flexxer">
              <div className="d-flex align-items-start justify-content-start flex-column">
                <span className="city-destination label text-success bg-light-success mb-1">
                  اتاق
                </span>
                <h4 className="city fs-title m-0">
                  <span>{room["name"]}</span>
                </h4>
              </div>
              <div className="detail ellipsis-container mt-3">
                {Array.isArray(room.beds) &&
                  room.beds.map((bed, idx) => (
                    <span className="ellipsis" key={bed.id || bed.name || idx}>
                      {bed.name}
                    </span>
                  ))}
              </div>
            </div>
            <div className="flight-footer">
              <div className="epocsic">
                <span className="label d-inline-flex bg-light-danger text-danger mb-1">
                  15% تخفیف
                </span>
                <h5 className="fs-5 low-price m-0">
                  <span className="tag-span">از</span>
                  <span className="price">
                    {room.price.toLocaleString()}تومان
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
                  <span>(142 دیدگاه)</span>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  );
}
