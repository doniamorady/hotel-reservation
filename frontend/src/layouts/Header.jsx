import { Link } from "react-router-dom";

export default function Header() {
  const user = JSON.parse(localStorage.getItem("user"));

  const handleLogout = () => {
    localStorage.removeItem("auth_token");
    localStorage.removeItem("user");

    window.location.reload();
  };

  return (
    <div className="header header-light">
      <div className="container">
        <nav id="navigation" className="navigation navigation-landscape">
          <div className="nav-header">
            <Link className="nav-brand" to="/">
              <img src="/assets/img/logo.png" className="logo" alt="" />
            </Link>
          </div>

          <div
            className="nav-menus-wrapper"
            style={{ transitionProperty: "none" }}
          >
            <ul className="nav-menu">
              <li>
                <Link to="/rooms">
                  اتاق ها
                  <span className="submenu-indicator" />
                </Link>
              </li>

              <li>
                <Link to="/about-us">
                  درباره ما
                  <span className="submenu-indicator" />
                </Link>
              </li>

              <li>
                <Link to="/contact-us">
                  تماس با ما
                  <span className="submenu-indicator" />
                </Link>
              </li>
            </ul>

            {user ? (
              <ul className="nav-menu nav-menu-social align-to-left">
                <li>
                  <div className="btn-group account-drop">
                    <button
                      type="button"
                      className="btn p-0 border-0"
                      data-bs-toggle="dropdown"
                    >
                      <img
                        src={user?.avatar || "  /no-photo.png"}
                        alt="avatar"
                        style={{
                          width: "42px",
                          height: "42px",
                          borderRadius: "50%",
                          objectFit: "cover",
                          cursor: "pointer",
                        }}
                      />
                    </button>

                    <div className="dropdown-menu pull-right animated flipInX">
                      <div className="drp_menu_headr">
                        <h4>
                          {user.first_name} {user.last_name}
                        </h4>
                      </div>

                      <ul>
                        <li>
                          <Link to="/profile">
                            <i className="fa-regular fa-id-card ms-2" />
                            پروفایل
                          </Link>
                        </li>

                        <li>
                          <Link to="/bookings">
                            <i className="fa-solid fa-ticket ms-2" />
                            لیست رزروها
                          </Link>
                        </li>

                        {/* <li>
                          <Link to="/favorites">
                            <i className="fa-solid fa-shield-heart ms-2" />
                            لیست علاقه مندی ها
                          </Link>
                        </li> */}

                        <li>
                          <button
                            onClick={handleLogout}
                            className="dropdown-item"
                          >
                            <i className="fa-solid fa-power-off ms-2" />
                            خروج
                          </button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            ) : (
              <ul className="nav-menu nav-menu-social align-to-left">
                <li>
                  <div className="btn-group account-drop">
                    <Link
                      to="/login"
                      className="btn btn-sm btn-primary text-white"
                    >
                      ورود | ثبت‌نام
                    </Link>
                  </div>
                </li>
              </ul>
            )}
          </div>
        </nav>
      </div>
    </div>
  );
}
