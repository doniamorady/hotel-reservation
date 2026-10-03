export default function FavoriteRoomHeader({length}) {
  return (
    <div className="mb-4">
      <div
        className="
                  d-flex
                  justify-content-between
                  align-items-center
                "
      >
        <div>
          <h5
            className="text-dark mb-1"
            style={{
              fontWeight: "500",
            }}
          >
            علاقه‌مندی‌های من
          </h5>
        </div>

        <div
          className="
                    rounded-3
                    px-3
                    py-2
                    bg-white
                    shadow-sm
                  "
        >
          <span
            className="text-muted"
            style={{
              fontSize: "12px",
            }}
          >
            تعداد ذخیره شده:
          </span>

          <span
            className="text-primary me-2"
            style={{
              fontSize: "13px",
              fontWeight: "500",
            }}
          >
            {length} اتاق
          </span>
        </div>
      </div>
    </div>
  );
}
