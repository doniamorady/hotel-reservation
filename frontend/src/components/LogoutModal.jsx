import { createPortal } from "react-dom";
import { useLogout } from "../hooks/useLogout";

export default function LogoutModal({ onClose }) {
  const { mutate } = useLogout();

  return createPortal(
    <>
      <div
        onClick={onClose}
        style={{
          position: "fixed",
          inset: 0,
          background: "rgba(15,23,42,.4)",
          backdropFilter: "blur(4px)",
          zIndex: 9998,
        }}
      />

      <div
        className="d-flex align-items-center justify-content-center"
        style={{
          position: "fixed",
          inset: 0,
          zIndex: 9999,
          padding: "20px",
        }}
      >
        <div
          className="bg-white rounded-4 text-center"
          style={{
            width: "100%",
            maxWidth: "380px",
            padding: "28px 30px",
            boxShadow: "0 18px 45px rgba(0,0,0,.14)",
          }}
        >
          {/* Icon */}
          <div
            className="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle"
            style={{
              width: "46px",
              height: "46px",
              background: "#fee2e2",
              color: "#ef233c",
            }}
          >
            <i
              className="fa-solid fa-right-from-bracket"
              style={{
                fontSize: "17px",
              }}
            />
          </div>

          {/* Title */}
          <h6
            className="mb-2"
            style={{
              fontSize: "15px",
              fontWeight: 600,
              color: "#172033",
            }}
          >
            خروج از حساب
          </h6>

          {/* Description */}
          <p
            className="text-muted mb-4"
            style={{
              fontSize: "13px",
            }}
          >
            آیا مطمئن هستید که می‌خواهید از حساب خود خارج شوید؟
          </p>

          {/* Actions */}
          <div className="d-flex justify-content-center gap-2">
            <button
              onClick={onClose}
              className="btn btn-light rounded-3"
              style={{
                height: "34px",
                padding: "0 22px",
                fontSize: "13px",
              }}
            >
              انصراف
            </button>

            <button
              className="btn rounded-3 text-white"
              onClick={mutate}
              style={{
                height: "34px",
                padding: "0 24px",
                fontSize: "13px",
                background: "#ef233c",
                borderColor: "#ef233c",
              }}
            >
              خروج
            </button>
          </div>
        </div>
      </div>
    </>,
    document.body,
  );
}
