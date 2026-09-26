export default function LoadingButton({ isLoading, message1, message2 }) {
  return (
    <button
      type="submit"
      className="btn btn-primary w-100 rounded-3 py-3 fw-medium"
      disabled={isLoading}
    >
      {isLoading ? (
        <>
          <span
            className="spinner-border spinner-border-sm ms-2"
            role="status"
            aria-hidden="true"
          ></span>
          {message1}
        </>
      ) : (
        <>
          {message2}
          <i className="fa-solid fa-arrow-left me-2"></i>
        </>
      )}
    </button>
  );
}
