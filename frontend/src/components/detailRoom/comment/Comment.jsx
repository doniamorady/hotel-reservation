import { ConvertToPersianDate } from "../../../utils/ConvertDate";

export default function Comment({ comment }) {
  return (
    <div
      key={comment.id}
      className="rounded-4 p-3 mb-4"
      style={{
        border: "1px solid #EEF2F6",
        boxShadow: "0 8px 20px rgba(16,24,40,.05)",
        transition: ".3s",
        background: "#fff",
      }}
    >
      <div className="d-flex">
        {/* Avatar */}

        <div
          className="rounded-circle overflow-hidden flex-shrink-0"
          style={{
            width: "58px",
            height: "58px",
            border: "2px solid rgba(32,178,107,.18)",
          }}
        >
          <img
            src={comment.user?.avatar ?? "/assets/images/no-photo.png"}
            className="w-100 h-100 object-fit-cover"
            alt=""
          />
        </div>

        {/* Content */}

        <div className="flex-grow-1 pe-3">
          <div className="d-flex justify-content-between align-items-center mb-3">
            <div>
              <h6
                className="mb-1"
                style={{
                  color: "#344054",
                  fontWeight: "600",
                  fontSize: "14px",
                }}
              >
                <i className="fa-regular fa-user text-success ms-2"></i>

                {comment.user?.full_name}
              </h6>
            </div>

            <span
              style={{
                color: "#98A2B3",
                fontSize: "12px",
              }}
            >
              <i className="fa-regular fa-calendar ms-1"></i>

              {ConvertToPersianDate(comment.created_at)}
            </span>
          </div>

          <div
            className="rounded-3 p-3"
            style={{
              background: "#F8FAFC",
              border: "1px solid #EEF2F6",
            }}
          >
            <p
              className="mb-0"
              style={{
                color: "#475467",
                lineHeight: "2",
                fontSize: "13px",
              }}
            >
              {comment.body}
            </p>
          </div>
        </div>
      </div>
    </div>
  );
}
