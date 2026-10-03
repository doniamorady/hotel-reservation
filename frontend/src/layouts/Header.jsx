import { Link } from "react-router-dom";
import LinkComponent from "../components/Link";
import { useMe } from "../hooks/useMe";
import { useState } from "react";

export default function Header() {
  const { data: user } = useMe();
  const [showMenu, setShowMenu] = useState(false);

  const closeMenu = () => {
    setShowMenu(false);
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
              <LinkComponent to="/rooms" label="اتاق ها">
                <span className="submenu-indicator" />
              </LinkComponent>

              <LinkComponent to="/about-us" label="درباره ما">
                <span className="submenu-indicator" />
              </LinkComponent>

              <LinkComponent to="/contact-us" label="تماس با ما">
                <span className="submenu-indicator" />
              </LinkComponent>
            </ul>

            {user ? (
              <ul className="nav-menu nav-menu-social align-to-left">
                <li>
                  <div className="btn-group account-drop">
                    <button
                      type="button"
                      className="btn p-0 border-0"
                      data-bs-toggle="dropdown"
                      onClick={() => setShowMenu((show) => !show)}
                    >
                      <img
                        src={user?.avatar || "/no-photo.png"}
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
                    {showMenu && (
                      <div
                        className="dropdown-menu pull-right animated flipInX show"
                        style={{
                          display: "block",
                          zIndex: 9999,
                        }}
                      >
                        <div className="drp_menu_headr">
                          <h4>
                            {user.first_name} {user.last_name}
                          </h4>
                        </div>

                        <ul>
                          <LinkComponent
                            onClick={closeMenu}
                            to="/profile"
                            label="پروفایل"
                          >
                            <i className="fa-regular fa-id-card ms-2" />
                          </LinkComponent>

                          <LinkComponent
                            onClick={closeMenu}
                            to="/bookings"
                            label="لیست رزرو ها"
                          >
                            <i className="fa-regular fa-id-card ms-2" />
                          </LinkComponent>

                          <LinkComponent
                            to="/favorites"
                            label="لیست علاقه مندی ها"
                            onClick={closeMenu}
                          >
                            <i className="fa-regular fa-id-card ms-2" />
                          </LinkComponent>

                          <LinkComponent
                            onClick={closeMenu}
                            to="/logout"
                            label="خروج"
                          >
                            <i className="fa-solid fa-power-off ms-2" />
                          </LinkComponent>
                        </ul>
                      </div>
                    )}
                  </div>
                </li>
              </ul>
            ) : (
              <ul className="nav-menu nav-menu-social align-to-left">
                <div className="btn-group account-drop">
                  <LinkComponent
                    to="/login"
                    className="btn btn-sm btn-primary text-white"
                    label="ورود | ثبت‌نام"
                  ></LinkComponent>
                </div>
              </ul>
            )}
          </div>
        </nav>
      </div>
    </div>
  );
}
