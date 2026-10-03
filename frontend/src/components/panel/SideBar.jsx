import { Link } from "react-router-dom";
import { useMe } from "../../hooks/useMe";

export default function SideBar() {
  const { data } = useMe();
  const user = data?.user;

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
      active: true,
    },
    {
      title: "تراکنش‌ها",
      icon: "fa-wallet",
      path: "/payments",
    },
  ];

  return (
    <div className="col-xl-3 col-lg-4">
      <div
        className="card border-0 rounded-4 shadow-sm"
        style={{
          position: "sticky",
          top: "30px",
          minHeight: "520px",
        }}
      >
        <div className="card-body p-4 d-flex flex-column">
          {/* Profile */}

          <div
            className="
            text-center
            pb-4
            border-bottom
            "
          >
            <div className="position-relative d-inline-block mb-3">
              <img
                src={user?.avatar || "/no-photo.png"}
                width="82"
                height="82"
                className="rounded-circle border"
                style={{
                  objectFit: "cover",
                }}
              />

              <span
                className="
                position-absolute
                bottom-0
                end-0
                bg-success
                border
                border-white
                rounded-circle
                "
                style={{
                  width: "18px",
                  height: "18px",
                }}
              ></span>
            </div>

            <h6
              className="text-dark mb-1"
              style={{
                fontSize: "15px",
                fontWeight: "500",
              }}
            >
              {user?.first_name
                ? `${user.first_name} ${user.last_name}`
                : "کاربر مهمان"}
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

          <div className="flex-grow-1 py-4">
            {menuItems.map((item) => (
              <Link
                key={item.path}
                to={item.path}
                className={`
                    d-flex
                    align-items-center
                    text-decoration-none
                    rounded-3
                    px-3
                    py-3
                    mb-2
                    ${
                      item.active
                        ? "bg-light-primary text-primary"
                        : "text-muted"
                    }
                  `}
                style={{
                  fontSize: "13px",
                  transition: "0.2s",
                }}
              >
                <span
                  className={`
                    d-flex
                    align-items-center
                    justify-content-center
                    rounded-3
                    ms-3
                    ${
                      item.active
                        ? "bg-primary text-white"
                        : "bg-light text-muted"
                    }
                    `}
                  style={{
                    width: "34px",
                    height: "34px",
                  }}
                >
                  <i
                    className={`fa-solid ${item.icon}`}
                    style={{
                      fontSize: "14px",
                    }}
                  ></i>
                </span>

                {item.title}
              </Link>
            ))}
          </div>

          {/* Logout */}

          <div className="border-top pt-3">
            <Link
              to="/logout"
              className="
              d-flex
              align-items-center
              text-danger
              text-decoration-none
              rounded-3
              px-3
              py-2
              "
              style={{
                fontSize: "13px",
              }}
            >
              <span
                className="
                d-flex
                align-items-center
                justify-content-center
                bg-light-danger
                rounded-3
                ms-3
                "
                style={{
                  width: "34px",
                  height: "34px",
                }}
              >
                <i className="fa-solid fa-right-from-bracket"></i>
              </span>
              خروج از حساب
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}
