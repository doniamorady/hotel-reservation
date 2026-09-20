export default function BreakfastSection({
  hasBreakfast,
  setHasBreakfast,
  breakfast_unit_price,
}) {
  return (
    <div className="col-md-6">
      <label className="form-label text-dark fw-medium mb-1 text-sm">
        صبحانه
      </label>

      <div
        className={`d-flex align-items-center justify-content-between border rounded-3 px-2 py-2 cursor-pointer ${
          hasBreakfast ? "bg-light-warning border-warning" : "bg-light"
        }`}
        onClick={() => setHasBreakfast((prev) => !prev)}
      >
        <div className="d-flex align-items-center">
          <div className="square--30 rounded bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center ms-2">
            <i className="fa-solid fa-mug-hot"></i>
          </div>

          <div>
            <small className="text-muted text-xs d-block">هر نفر / شب</small>

            <small className="text-success fw-semibold text-xs">
              {breakfast_unit_price?.toLocaleString()} ریال
            </small>
          </div>
        </div>

        <input
          type="checkbox"
          checked={hasBreakfast}
          onChange={(e) => {
            e.stopPropagation();
            setHasBreakfast(e.target.checked);
          }}
          className="form-check-input"
        />
      </div>
    </div>
  );
}
