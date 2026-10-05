export default function Input({ label, events, readOnly = false}) {
  return (
    <div className="col-md-6 mb-3">
      <label className="form-label">{label}</label>
      <input
        readOnly={readOnly}
        type="text"
        className="form-control"
        {...events}
      />
    </div>
  );
}
