import { Link, useLocation } from "react-router-dom";
import { useMe } from "../../hooks/useMe";
import LogoutModal from "../LogoutModal";
import { useState } from "react";

export default function SideBar() {
  const { data } = useMe();
  const [showLogoutModal, setShowLogoutModal] = useState(false);
  const user = data?.user;

  const location = useLocation();

  const menuItems = [
    {
      title: "پروفایل",
      icon: "fa-user",
      path: "/profile",
    },
    {
      title: "رزروهای من",
      icon: "fa-calendar-check",
      path: "/bookings",
    },
    {
      title: "علاقه‌مندی‌ها",
      icon: "fa-heart",
      path: "/favorites",
    },
  ];

  return (
    <div className={`col-xl-3 col-lg-4 z-1 ${showLogoutModal ? 'opacity-25' : ''}`}>
      <div
        className="bg-white rounded-4"
        style={{
          border: "1px solid #e8edf3",
          position: "sticky",
          top: "30px",
        }}
      >
        <div className="p-3 p-lg-4">
          {/* Profile */}

          <div
            className="text-center pb-4"
            style={{
              borderBottom: "1px solid #eef1f5",
            }}
          >
            <div className="position-relative d-inline-block mb-3">
              <img
                src={user?.avatar || "/no-photo.png"}
                alt="avatar"
                width="75"
                height="75"
                className="rounded-circle"
                style={{
                  objectFit: "cover",
                  border: "3px solid #fff",
                  boxShadow: "0 0 0 1px #e8edf3",
                }}
              />

              <span
                className="position-absolute bottom-0 end-0 rounded-circle"
                style={{
                  width: "14px",
                  height: "14px",
                  background: "#22c55e",
                  border: "2px solid white",
                }}
              />
            </div>

            <h6
              className="mb-1"
              style={{
                fontSize: "15px",
                fontWeight: 600,
                color: "#172033",
              }}
            >
              {user?.first_name
                ? `${user.first_name} ${user.last_name}`
                : "کاربر"}
            </h6>

            <span
              className="text-muted"
              style={{
                fontSize: "12px",
              }}
            >
              حساب کاربری
            </span>
          </div>

          {/* Menu */}

          <div className="mt-3">
            {menuItems.map((item) => {
              const isActive = location.pathname === item.path;

              return (
                <Link
                  key={item.path}
                  to={item.path}
                  className="d-flex align-items-center text-decoration-none rounded-3 mb-2"
                  style={{
                    padding: "8px 10px",

                    background: isActive ? "#edf5ff" : "transparent",

                    color: isActive ? "#1d6fdc" : "#667085",

                    fontSize: "13px",

                    transition: ".2s",
                  }}
                >
                  <span
                    className="d-flex align-items-center justify-content-center rounded-3 ms-3"
                    style={{
                      width: "34px",
                      height: "34px",

                      background: isActive ? "#1d6fdc" : "#f5f7fa",

                      color: isActive ? "#fff" : "#667085",
                    }}
                  >
                    <i
                      className={`fa-solid ${item.icon}`}
                      style={{
                        fontSize: "13px",
                      }}
                    />
                  </span>

                  {item.title}
                </Link>
              );
            })}
          </div>

          {/* Logout */}

          <div
            className="mt-3 pt-3"
            style={{
              borderTop: "1px solid #eef1f5",
            }}
          >
            <button
              onClick={() => setShowLogoutModal(true)}
              className="d-flex border-0 align-items-center text-decoration-none rounded-3"
              style={{
                padding: "8px 10px",
                color: "#dc3545",
                fontSize: "13px",
              }}
            >
              <span
                className="d-flex align-items-center justify-content-center rounded-3 ms-3"
                style={{
                  width: "34px",
                  height: "34px",
                  background: "#fff1f2",
                }}
              >
                <i
                  className="fa-solid fa-right-from-bracket"
                  style={{
                    fontSize: "13px",
                  }}
                />
              </span>
              خروج از حساب
            </button>
            {showLogoutModal && (
              <LogoutModal onClose={() => setShowLogoutModal(false)} />
            )}
          </div>
        </div>
      </div>
    </div>
  );
}
