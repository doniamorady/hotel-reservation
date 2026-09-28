import { useState } from "react";
import { useParams } from "react-router-dom";
import { useCreateComment } from "../../../hooks/useCreateComment";
import FormHeader from "./FormHeader";

export default function AddCommentForm() {
  const { id } = useParams();
  const [body, setBody] = useState("");
  const { mutate, isPending } = useCreateComment();

  function handleSubmit(e) {
    e.preventDefault();
    mutate(
      {
        id,
        data: { body },
      },
      {
        onSuccess: () => {
          setBody("");
        },
      },
    );
  }
  return (
    <div
      className="rounded-4 mt-4 p-1"
      style={{
        background: "linear-gradient(135deg,#F5F9FF,#FFFFFF)",
        border: "1px solid #DCE6F5",
      }}
    >
      <div
        className="rounded-4 overflow-hidden"
        style={{
          background: "#fff",
        }}
      >
        {/* Header */}
        <FormHeader />

        {/* Body */}
        <div className="p-3">
          <form onSubmit={handleSubmit}>
            <textarea
              rows="4"
              className="form-control rounded-3"
              placeholder="دیدگاه خود را درباره این اتاق بنویسید..."
              value={body}
              onChange={(e) => setBody(e.target.value)}
              style={{
                resize: "none",
                fontSize: "13px",
                lineHeight: "2",
                border: "1px solid #D0D5DD",
                background: "#fff",
                boxShadow: "none",
              }}
            />

            <div className="text-end mt-3">
              <button
                className="btn rounded-3 px-3 py-2"
                type="submit"
                disabled={isPending}
                style={{
                  background: "#2563EB",
                  color: "#fff",
                  fontSize: "12px",
                  fontWeight: "500",
                  boxShadow: "0 6px 15px rgba(37,99,235,.22)",
                }}
              >
                <i
                  className="fa-solid fa-paper-plane ms-2"
                  style={{
                    fontSize: "12px",
                  }}
                />
                ارسال دیدگاه
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
}
