export default function FormHeader() {
  return (
    <div
      className="px-4 py-3 d-flex align-items-center justify-content-between"
      style={{
        background: "#FAFCFF",
        borderBottom: "1px solid #E9EEF5",
      }}
    >
      <div className="d-flex align-items-center">
        <div
          className="rounded-3 d-flex align-items-center justify-content-center"
          style={{
            width: "38px",
            height: "38px",
            background: "#EFF6FF",
            color: "#2563EB",
          }}
        >
          <i
            className="fa-solid fa-pen-to-square"
            style={{
              fontSize: "15px",
            }}
          />
        </div>

        <div className="me-3">
          <h6
            className="mb-1"
            style={{
              color: "#344054",
              fontSize: "14px",
              fontWeight: "600",
            }}
          >
            ثبت دیدگاه
          </h6>

          <span
            style={{
              color: "#667085",
              fontSize: "12px",
            }}
          >
            تجربه اقامت خود را با مهمانان دیگر به اشتراک بگذارید.
          </span>
        </div>
      </div>

      <span
        style={{
          color: "#2563EB",
          fontSize: "12px",
          fontWeight: "500",
        }}
      >
        نظر شما مهم است
      </span>
    </div>
  );
}
