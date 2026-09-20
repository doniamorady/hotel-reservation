export default function GuestsSection({ numGuests, setNumGuests, room }) {
  return (
    <div className="col-md-6">
      <label className="form-label text-dark fw-medium mb-1 text-sm">
        تعداد مهمان
      </label>

      <div className="d-flex align-items-center justify-content-between border rounded-3 px-2 py-2 bg-light">
        <button
          type="button"
          className="btn btn-sm btn-light rounded-circle d-flex align-items-center justify-content-center"
          style={{ width: "32px", height: "32px" }}
          disabled={numGuests <= 1}
          onClick={() => setNumGuests((prev) => prev - 1)}
        >
          <i className="fa-solid fa-minus text-dark"></i>
        </button>

        <div className="text-center">
          <div className="text-dark text-sm">
            <i className="fa-solid fa-user ms-1"></i>
            {numGuests} مهمان
          </div>

          <small className="text-muted text-xs">
            حداکثر {room.capacity} نفر
          </small>
        </div>

        <button
          type="button"
          className="btn btn-sm btn-light rounded-circle d-flex align-items-center justify-content-center"
          style={{ width: "32px", height: "32px" }}
          disabled={numGuests >= room.capacity}
          onClick={() => setNumGuests((prev) => prev + 1)}
        >
          <i className="fa-solid fa-plus text-dark"></i>
        </button>
      </div>
    </div>
  );
}
