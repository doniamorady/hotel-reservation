export default function FavoriteRoomHeader({ length }) {
  return (
    <div className="mb-4">
      <div className="d-flex justify-content-between align-items-center">
        <div>
          <h5
            className="mb-1"
            style={{
              fontSize: "16px",
              fontWeight: 600,
              color: "#172033",
            }}
          >
            علاقه‌مندی‌های من
          </h5>

          <p
            className="text-muted mb-0"
            style={{
              fontSize: "12px",
            }}
          >
            اتاق‌های ذخیره شده برای رزرو سریع‌تر
          </p>
        </div>

        <div
          className="rounded-pill px-3 py-2"
          style={{
            background: "#edf5ff",
            color: "#1d6fdc",
            fontSize: "12px",
          }}
        >
          {length} اتاق
        </div>
      </div>
    </div>
  );
}
