import { Link } from "react-router-dom";
import { useState } from "react";
import LinkComponent from "../components/Link";
import { useMe } from "../hooks/useMe";
import LogoutModal from "../components/LogoutModal";
import "../assets/header.css";

export default function Header() {
  const { data: user } = useMe();

  const [showMenu, setShowMenu] = useState(false);
  const [showLogoutModal, setShowLogoutModal] = useState(false);

  const closeMenu = () => setShowMenu(false);

  return (
    <>
      <header className="hotel-header">
        <div className="container">
          <nav className="hotel-navbar">
            {/* Logo */}

            <Link to="/" className="hotel-logo">
              <img src="/assets/img/logo.png" alt="logo" />
            </Link>

            {/* Menu */}
            <ul className="hotel-menu">
              <LinkComponent to="/rooms" label="اتاق ها" />

              <LinkComponent to="/about-us" label="درباره ما" />

              <LinkComponent to="/contact-us" label="تماس با ما" />
            </ul>

            {/* Right */}

            {!user ? (
              <Link to="/login" className="login-btn">
                <i className="fa-regular fa-user" />
                ورود | ثبت‌نام
              </Link>
            ) : (
              <div className="user-box">
                <button
                  className="user-trigger"
                  onClick={() => setShowMenu((s) => !s)}
                >
                  <img
                    src={user.avatar || "/no-photo.png"}
                    className="user-avatar"
                    alt=""
                  />

                  <div className="user-info">
                    <span className="user-fullname">
                      {user.first_name} {user.last_name}
                    </span>

                    <small>حساب کاربری</small>
                  </div>

                  <i
                    className={`fa-solid fa-chevron-down dropdown-icon ${
                      showMenu ? "rotate" : ""
                    }`}
                  />
                </button>

                <div
                  className={`dropdown-card ${showMenu ? "show-dropdown" : ""}`}
                >
                  <div className="dropdown-profile">
                    <img src={user.avatar || "/no-photo.png"} alt="" />

                    <div>
                      <h6>
                        {user.first_name} {user.last_name}
                      </h6>

                      <span>مدیریت حساب</span>
                    </div>
                  </div>

                  <div className="dropdown-divider" />

                  <MenuItem
                    to="/profile"
                    icon="fa-regular fa-user"
                    label="پروفایل"
                    onClick={closeMenu}
                  />

                  <MenuItem
                    to="/bookings"
                    icon="fa-regular fa-calendar-check"
                    label="رزروهای من"
                    onClick={closeMenu}
                  />

                  <MenuItem
                    to="/favorites"
                    icon="fa-regular fa-heart"
                    label="علاقه‌مندی‌ها"
                    onClick={closeMenu}
                  />

                  <div className="dropdown-divider" />

                  <button
                    className="logout-btn"
                    onClick={() => {
                      closeMenu();
                      setShowLogoutModal(true);
                    }}
                  >
                    <i className="fa-solid fa-right-from-bracket" />
                    خروج از حساب
                  </button>
                </div>
              </div>
            )}
          </nav>
        </div>
      </header>

      {showLogoutModal && (
        <LogoutModal onClose={() => setShowLogoutModal(false)} />
      )}
    </>
  );
}

function MenuItem({ to, icon, label, onClick }) {
  return (
    <Link to={to} className="dropdown-link" onClick={onClick}>
      <i className={icon} />

      <span>{label}</span>
    </Link>
  );
}
