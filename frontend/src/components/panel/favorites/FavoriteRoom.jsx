import { Link } from "react-router-dom";
import { useDeleteFavorite } from "../../../hooks/useFavorite";

export function FavoritesRoom({ room }) {
  const { mutate } = useDeleteFavorite(room.id);

  return (
    <div className="d-flex flex-column gap-3">
      <div className="card border rounded-4 overflow-hidden bg-white">
        <div className="row g-0 align-items-center">
          {/* Image */}

          <div className="col-lg-3 col-md-4">
            <div className="position-relative p-3">
              <img
                src={room.cover_image}
                className="w-100 rounded-3"
                style={{
                  height: "170px",
                  objectFit: "cover",
                }}
              />

              <button
                className="
                position-absolute
                top-0
                end-0
                mt-4
                me-4
                border-0
                bg-white
                rounded-circle
                shadow-sm
                d-flex
                align-items-center
                justify-content-center
                "
                style={{
                  width: "34px",
                  height: "34px",
                }}
              >
                <i className="fa-solid fa-heart text-danger small"></i>
              </button>

              <div
                className="
                position-absolute
                bottom-0
                start-0
                mb-4
                ms-4
                "
              >
                <span
                  className="
                  bg-white
                  rounded-pill
                  px-3
                  py-1
                  shadow-sm
                  text-dark
                  "
                  style={{
                    fontSize: "11px",
                  }}
                >
                  <i className="fa-solid fa-star text-warning ms-1"></i>
                  4.8
                </span>
              </div>
            </div>
          </div>

          {/* Content */}

          <div className="col-lg-9 col-md-8">
            <div className="p-3 p-lg-4">
              {/* Header */}

              <div className="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h6
                    className="text-dark mb-2"
                    style={{
                      fontSize: "15px",
                      fontWeight: "500",
                    }}
                  >
                    {room.name}{" "}
                  </h6>

                  <div
                    className="text-muted"
                    style={{
                      fontSize: "12px",
                    }}
                  >
                    <i className="fa-solid fa-location-dot ms-2"></i>
                    هتل آسمان - تهران
                  </div>
                </div>

                <span
                  className="
                  badge
                  rounded-pill
                  bg-light-primary
                  text-primary
                  fw-normal
                  "
                  style={{
                    fontSize: "11px",
                  }}
                >
                  محبوب
                </span>
              </div>

              {/* Meta */}

              <div className="row g-3 mb-3">
                <div className="col-md-4 col-6">
                  <div
                    className="text-muted"
                    style={{
                      fontSize: "11px",
                    }}
                  >
                    ظرفیت
                  </div>

                  <div
                    className="text-dark mt-1"
                    style={{
                      fontSize: "13px",
                    }}
                  >
                    <i className="fa-solid fa-users text-primary ms-2"></i>
                    {room.capacity} نفر
                  </div>
                </div>

                <div className="col-md-4 col-6">
                  <div
                    className="text-muted"
                    style={{
                      fontSize: "11px",
                    }}
                  >
                    نوع تخت
                  </div>

                  <div
                    className="text-dark mt-1"
                    style={{
                      fontSize: "13px",
                    }}
                  >
                    <i className="fa-solid fa-bed text-primary ms-2"></i>
                    تخت {room?.beds.map((bed) => bed.type).join(", ")}
                  </div>
                </div>

                <div className="col-md-4 col-6">
                  <div
                    className="text-muted"
                    style={{
                      fontSize: "11px",
                    }}
                  >
                    متراژ
                  </div>

                  <div
                    className="text-dark mt-1"
                    style={{
                      fontSize: "13px",
                    }}
                  >
                    <i className="fa-solid fa-expand text-primary ms-2"></i>
                    {room.area} متر
                  </div>
                </div>
              </div>

              {/* Features */}

              <div
                className="
                d-flex
                flex-wrap
                gap-2
                mb-3
                "
              >
                {["صبحانه رایگان", "WiFi", "پارکینگ", "کنسلی رایگان"].map(
                  (item, index) => (
                    <span
                      key={index}
                      className="
                      border
                      rounded-pill
                      text-muted
                      px-3
                      py-1
                      "
                      style={{
                        fontSize: "11px",
                      }}
                    >
                      {item}
                    </span>
                  ),
                )}
              </div>

              {/* Footer */}

              <div
                className="
                border-top
                pt-3
                d-flex
                justify-content-between
                align-items-center
                "
              >
                <div>
                  <div
                    className="text-muted"
                    style={{
                      fontSize: "11px",
                    }}
                  >
                    قیمت هر شب
                  </div>

                  <div>
                    <span
                      className="text-dark"
                      style={{
                        fontSize: "17px",
                        fontWeight: "500",
                      }}
                    >
                      {room.price.toLocaleString()}
                    </span>

                    <span
                      className="text-muted me-1"
                      style={{
                        fontSize: "12px",
                      }}
                    >
                      تومان
                    </span>
                  </div>
                </div>

                <div className="d-flex gap-2">
                  <button
                    className="
                    btn
                    btn-sm
                    btn-light
                    text-danger
                    rounded-3
                    "
                    onClick={() => mutate(room)}
                    style={{
                      width: "36px",
                    }}
                  >
                    <i className="fa-solid fa-trash"></i>
                  </button>

                  <Link
                    to="/rooms/1"
                    className="
                    btn
                    btn-sm
                    btn-primary
                    rounded-3
                    px-4
                    "
                    style={{
                      fontSize: "12px",
                    }}
                  >
                    مشاهده اتاق
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
