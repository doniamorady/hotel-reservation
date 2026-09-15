export default function BreakfastInfo({ breakfast }) {
  return (
    <div className="d-flex justify-content-between align-items-center mt-2 px-3 py-2 rounded-3 bg-light border">
      <div className="d-flex align-items-center">
        <div className="square--35 rounded bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center ms-2">
          <i className="fa-solid fa-mug-hot"></i>
        </div>

        <div>
          <div className="fw-medium text-dark text-sm">صبحانه</div>

          <small className="text-muted">به ازای هر نفر در هر شب</small>
        </div>
      </div>

      <div className="fw-bold text-success">
        {breakfast?.toLocaleString()} ریال
      </div>
    </div>
  );
}
