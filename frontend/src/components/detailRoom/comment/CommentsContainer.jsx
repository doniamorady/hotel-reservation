import { useMe } from "../../../hooks/useMe";
import AddCommentForm from "./AddCommentForm";
import Comment from "./Comment";
import CommentHeader from "./CommentHeader";
import CommentLoginPrompt from "./CommentLoginPrompt";
import EmptyComments from "./EmptyComments";

export default function CommentsContainer({ comments = [] }) {
  const { data } = useMe();
  const user = data?.user;

  return (
    <div className="col-12">
      <div
        className="card border-0 rounded-4 overflow-hidden mb-4"
        style={{
          boxShadow: "0 15px 45px rgba(16,24,40,.08)",
        }}
      >
        {/* Header */}
        <CommentHeader />

        <div className="card-body p-4">
          {comments.length ? (
            comments.map((comment) => (
              <Comment comment={comment} key={comment.id} />
            ))
          ) : (
            <EmptyComments />
          )}

          {comments.length > 3 && (
            <div className="text-center mb-3">
              <button
                className="btn btn-light rounded-pill px-4"
                style={{
                  border: "1px solid #E4E7EC",
                }}
              >
                مشاهده دیدگاه‌های بیشتر
                <i className="fa-solid fa-angle-down me-2"></i>
              </button>
            </div>
          )}

          {user ? <AddCommentForm /> : <CommentLoginPrompt />}
        </div>
      </div>
    </div>
  );
}
