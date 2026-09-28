export default function EmptyComments() {
  return (
    <div
      className="rounded-4 p-4 text-center"
      style={{
        background: "#FAFCFF",
        border: "1px solid #E4E7EC",
        boxShadow: "0 8px 25px rgba(16,24,40,.05)",
      }}
    >
      <div
        className="mx-auto d-flex align-items-center justify-content-center rounded-circle"
        style={{
          width: "60px",
          height: "60px",
          background: "rgba(32,178,107,.10)",
          color: "#20b26b",
        }}
      >
        <i
          className="fa-solid fa-comments"
          style={{
            fontSize: "25px",
          }}
        />
      </div>

      <h5
        className="mt-3 mb-2"
        style={{
          color: "#344054",
          fontSize: "16px",
          fontWeight: "600",
        }}
      >
        هنوز دیدگاهی ثبت نشده است
      </h5>

      <p
        className="mb-0"
        style={{
          color: "#667085",
          fontSize: "13px",
          lineHeight: "1.8",
        }}
      >
        اولین نفری باشید که تجربه اقامت خود را با مهمانان آینده به اشتراک می‌گذارید.
      </p>
    </div>
  );
}