export default function CommentHeader() {
  return (
    <div
      className="card-header bg-white border-0 px-4 py-4"
      style={{
        borderBottom: "1px solid #EEF2F6",
      }}
    >
      <div className="d-flex align-items-center">
        <div className="d-flex align-items-center">
          <div
            className="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0"
            style={{
              width: "52px",
              height: "52px",
              background: "rgba(37,99,235,.10)",
              color: "#2563EB",
              border: "1px solid rgba(37,99,235,.15)",
              boxShadow: "0 6px 15px rgba(37,99,235,.12)",
            }}
          >
            <i
              className="fa-solid fa-comments"
              style={{
                fontSize: "21px",
              }}
            />
          </div>

          <div className="me-3">
            <h4
              className="mb-1"
              style={{
                color: "#344054",
                fontSize: "17px",
                fontWeight: "600",
              }}
            >
              دیدگاه مهمانان
            </h4>

            <p
              className="mb-0"
              style={{
                color: "#667085",
                fontSize: "12px",
              }}
            >
              تجربه و نظرات مهمانان درباره این اتاق
            </p>
          </div>
        </div>
      </div>
    </div>
  );
}
