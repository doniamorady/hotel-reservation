import { Link } from "react-router-dom";

export default function Header() {
  return (
    <div className="header header-light">
      <div className="container">
        <nav id="navigation" className="navigation navigation-landscape">
          <div className="nav-header">
            <a className="nav-brand" href=''>
              <img src="/assets/img/logo.png" className="logo" alt="" />
            </a>
          </div>
          <div
            className="nav-menus-wrapper"
            style={{ transitionProperty: "none" }}
          >
            <ul className="nav-menu">
              <li>
                <Link to='rooms'>
                  اتاق ها
                  <span className="submenu-indicator" />
                </Link>
              </li>
              {/* <li>
                <a href="#">
                  رویدادها
                  <span className="submenu-indicator" />
                </a>
              </li> */}
              <li>
                <Link to='/about-us'>
                  درباره ما
                  <span className="submenu-indicator" />
                </Link>
              </li>
              <li>
                <Link to='/contact-us'>
                  تماس با ما
                  <span className="submenu-indicator" />
                </Link>
              </li>
            </ul>

            {/* {user ? (
              <ul className="nav-menu nav-menu-social align-to-left">
                <li>
                  <div className="btn-group account-drop">
                    <button
                      type="button"
                      className="btn btn-order-by-filt"
                      data-bs-toggle="dropdown"
                    >
                      <img
                        src={user.profile || "/images/default-user-profile.jpg"}
                        className="img-fluid"
                        alt=""
                      />
                    </button>
                    <div className="dropdown-menu pull-right animated flipInX">
                      <div className="drp_menu_headr">
                        <h4>{user.full_name}</h4>
                        <div className="drp_menu_headr-right"></div>
                      </div>
                      <ul>
                        <li>
                          <a href={routes["user-profile"] || "/profile"}>
                            <i className="fa-regular fa-id-card ms-2" />
                            پروفایل<span className="notti_coun style-1">4</span>
                          </a>
                        </li>
                        <li>
                          <a href={routes["user-booking"] || "/bookings"}>
                            <i className="fa-solid fa-ticket ms-2" />
                            لیست رزروها
                          </a>
                        </li>
                        <li>
                          <a href={routes["user-payment"] || "/payments"}>
                            <i className="fa-solid fa-wallet ms-2" />
                            تراکنش‌ها
                          </a>
                        </li>
                        <li>
                          <a href={routes["user-favorite"] || "/favorites"}>
                            <i className="fa-solid fa-shield-heart ms-2" />
                            لیست علاقه مندی ها
                          </a>
                        </li>
                        <li>
                          <a href={routes.logout || "/logout"}>
                            <i className="fa-solid fa-power-off ms-2" />
                            خروج
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            ) */}
            
            
            {/* : ( */}
              <ul className="nav-menu nav-menu-social align-to-left">
                <li>
                  <div className="btn-group account-drop">
                    <a
                      href=''
                      className="btn btn-sm btn-primary text-white"
                    >
                      ورود | ثبت‌نام
                    </a>
                  </div>
                </li>
              </ul>
            {/* )} */}
          </div>
        </nav>
      </div>
    </div>
  );
}
