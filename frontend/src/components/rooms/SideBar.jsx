import { useEffect, useState } from "react";
import { getBeds } from "../../services/apiBed";

export default function SideBar({resetAll, filterByBedrooms, bedrooms, length}) {

  const [beds, setBeds] = useState([]);
  
  
  useEffect(()=>{
    async function loadBeds(){
      const res = await getBeds();
      setBeds(res.data);
    }
    loadBeds();
  }, [])
  
  return (
    <div className="col-xl-3 col-lg-4 col-md-12">
      <div className="filter-searchBar bg-white rounded-3">
        <div className="filter-searchBar-head border-bottom">
          <div className="searchBar-headerBody d-flex align-items-start justify-content-between px-3 py-3">
            <div className="searchBar-headerfirst">
              <h6 className="fs-5 m-0">فیلتر</h6>
              <p className="text-md text-muted m-0">نمایش {length} اتاق</p>
            </div>
            <div className="searchBar-headerlast text-end">
              <a
                href=""
                onClick={(e) => {
                  e.preventDefault();
                  resetAll();
                }}
                className="text-md fw-medium text-primary active pointer"
              >
                حذف همه
              </a>
            </div>
          </div>
        </div>

        <div className="filter-searchBar-body">
          <div className="searchBar-single px-3 py-3 border-bottom">
            <div className="searchBar-single-title d-flex mb-3">
              <h6 className="sidebar-subTitle fs-6 fw-medium m-0">نوع تخت</h6>
            </div>
            <div className="searchBar-single-wrap">
              <ul className="row align-items-center justify-content-between p-0 gx-3 gy-2 mb-0">
                {beds.map((bed) => {
                  return (
                    <li className="col-6" key={bed.id}>
                      <input type="checkbox" className="btn-check" id="2bed" />
                      <label
                        className="btn btn-sm btn-secondary rounded-1 fw-medium full-width"
                        htmlFor="2bed"
                      >
                        {bed.type}
                      </label>
                    </li>
                  );
                })}
              </ul>
            </div>
          </div>

          <div className="searchBar-single px-3 py-3 border-bottom">
            <div className="searchBar-single-title d-flex mb-3">
              <h6 className="sidebar-subTitle fs-6 fw-medium m-0">امکانات ویژه</h6>
            </div>
            <div className="searchBar-single-wrap">
              <ul className="row align-items-center justify-content-between p-0 gx-3 gy-2 mb-0">
                <li className="col-12">
                  <div className="form-check">
                    <input
                      className="form-check-input"
                      type="radio"
                      name="roomType"
                      id="suite"
                      checked={bedrooms === 0}
                      onChange={() => filterByBedrooms(0)}
                    />
                    <label className="form-check-label" htmlFor="suite">
                      سوئیت
                    </label>
                  </div>
                </li>

                <li className="col-12">
                  <div className="form-check">
                    <input
                      className="form-check-input"
                      type="radio"
                      name="roomType"
                      id="one-bedroom"
                      checked={bedrooms === 1}
                      onChange={() => filterByBedrooms(1)}
                    />
                    <label className="form-check-label" htmlFor="one-bedroom">
                      یک خوابه
                    </label>
                  </div>
                </li>

                <li className="col-12">
                  <div className="form-check">
                    <input
                      className="form-check-input"
                      type="radio"
                      name="roomType"
                      id="two-bedroom"
                      checked={bedrooms === 2}
                      onChange={() => filterByBedrooms(2)}
                    />
                    <label className="form-check-label" htmlFor="two-bedroom">
                      دو خوابه
                    </label>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div className="searchBar-single px-3 py-3 border-bottom">
            <div className="searchBar-single-title d-flex mb-3">
              <h6 className="sidebar-subTitle fs-6 fw-medium m-0">
                رنج قیمتی به ریال
              </h6>
            </div>
            <div className="searchBar-single-wrap">
              <input
                type="text"
                className="js-range-slider"
                name="my_range"
                data-skin="round"
                data-type="double"
                data-min="0"
                data-max="1000"
                data-grid="false"
              />
            </div>
          </div>

          <div className="searchBar-single px-3 py-3 border-bottom">
            <div className="searchBar-single-title d-flex mb-3">
              <h6 className="sidebar-subTitle fs-6 fw-medium m-0">
                امتیاز مسافران
              </h6>
            </div>
            <div className="searchBar-single-wrap">
              <ul className="row align-items-center justify-content-between p-0 gx-3 gy-2 mb-0">
                <li className="col-12">
                  <div className="form-check lg">
                    <div className="frm-slicing d-flex align-items-center">
                      <div className="frm-slicing-first">
                        <input
                          className="form-check-input"
                          type="checkbox"
                          id="fourfive"
                        />
                        <label className="form-check-label" htmlFor="fourfive"></label>
                      </div>
                      <div className="frm-slicing-end d-flex align-items-center justify-content-between full-width ps-1">
                        <div className="frms-flex d-flex align-items-center">
                          <div className="frm-slicing-ico text-md">
                            <i className="fa fa-star text-warning"></i>
                          </div>
                          <div className="frm-slicing-title pe-1">
                            <span className="text-dark">4.5+</span>
                          </div>
                        </div>
                        <div className="text-end">
                          <span className="text-md text-muted-2 opacity-75">
                            16
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li className="col-12">
                  <div className="form-check lg">
                    <div className="frm-slicing d-flex align-items-center">
                      <div className="frm-slicing-first">
                        <input
                          className="form-check-input"
                          type="checkbox"
                          id="fourplus"
                        />
                        <label className="form-check-label" htmlFor="fourplus"></label>
                      </div>
                      <div className="frm-slicing-end d-flex align-items-center justify-content-between full-width ps-1">
                        <div className="frms-flex d-flex align-items-center">
                          <div className="frm-slicing-ico text-md">
                            <i className="fa fa-star text-warning"></i>
                          </div>
                          <div className="frm-slicing-title pe-1">
                            <span className="text-dark">4+</span>
                          </div>
                        </div>
                        <div className="text-end">
                          <span className="text-md text-muted-2 opacity-75">
                            10
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li className="col-12">
                  <div className="form-check lg">
                    <div className="frm-slicing d-flex align-items-center">
                      <div className="frm-slicing-first">
                        <input
                          className="form-check-input"
                          type="checkbox"
                          id="threefive"
                        />
                        <label className="form-check-label" htmlFor="threefive"></label>
                      </div>
                      <div className="frm-slicing-end d-flex align-items-center justify-content-between full-width ps-1">
                        <div className="frms-flex d-flex align-items-center">
                          <div className="frm-slicing-ico text-md">
                            <i className="fa fa-star text-warning"></i>
                          </div>
                          <div className="frm-slicing-title pe-1">
                            <span className="text-dark">3.5+</span>
                          </div>
                        </div>
                        <div className="text-end">
                          <span className="text-md text-muted-2 opacity-75">
                            08
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li className="col-12">
                  <div className="form-check lg">
                    <div className="frm-slicing d-flex align-items-center">
                      <div className="frm-slicing-first">
                        <input
                          className="form-check-input"
                          type="checkbox"
                          id="threeplus"
                        />
                        <label className="form-check-label" htmlFor="threeplus"></label>
                      </div>
                      <div className="frm-slicing-end d-flex align-items-center justify-content-between full-width ps-1">
                        <div className="frms-flex d-flex align-items-center">
                          <div className="frm-slicing-ico text-md">
                            <i className="fa fa-star text-warning"></i>
                          </div>
                          <div className="frm-slicing-title pe-1">
                            <span className="text-dark">3+</span>
                          </div>
                        </div>
                        <div className="text-end">
                          <span className="text-md text-muted-2 opacity-75">
                            26
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
