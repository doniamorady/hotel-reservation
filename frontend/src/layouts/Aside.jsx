export default function Aside({ beds }) {
  return (
    <div class="col-xl-3 col-lg-4 col-md-12">
      <div class="filter-searchBar bg-white rounded-3">
        <div class="filter-searchBar-head border-bottom">
          <div class="searchBar-headerBody d-flex align-items-start justify-content-between px-3 py-3">
            <div class="searchBar-headerfirst">
              <h6 class="fs-5 m-0">فیلتر</h6>
              <p class="text-md text-muted m-0">نمایش 180 اتاق</p>
            </div>
            <div class="searchBar-headerlast text-end">
              <a href="#" class="text-md fw-medium text-primary active">
                حذف همه
              </a>
            </div>
          </div>
        </div>

        <div class="filter-searchBar-body">
          <div class="searchBar-single px-3 py-3 border-bottom">
            <div class="searchBar-single-title d-flex mb-3">
              <h6 class="sidebar-subTitle fs-6 fw-medium m-0">نوع تخت</h6>
            </div>
            <div class="searchBar-single-wrap">
              <ul class="row align-items-center justify-content-between p-0 gx-3 gy-2 mb-0">
                {/* @foreach ($beds as $bed) */}
                <li class="col-6">
                  <input type="checkbox" class="btn-check" id="2bed" />
                  <label
                    class="btn btn-sm btn-secondary rounded-1 fw-medium full-width"
                    for="2bed"
                  >
                    {/* {{ $bed->name }} */}
                  </label>
                </li>
                {/* @endforeach */}
              </ul>
            </div>
          </div>

          <div class="searchBar-single px-3 py-3 border-bottom">
            <div class="searchBar-single-title d-flex mb-3">
              <h6 class="sidebar-subTitle fs-6 fw-medium m-0">امکانات ویژه</h6>
            </div>
            <div class="searchBar-single-wrap">
              <ul class="row align-items-center justify-content-between p-0 gx-3 gy-2 mb-0">
                {/* @foreach ($amenities as $amenity) */}
                <li class="col-12">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="wififree"
                    />
                    <label class="form-check-label" for="wififree">
                      {/* {{ $amenity->name }} */}
                    </label>
                  </div>
                </li>
                {/* @endforeach */}
              </ul>
            </div>
          </div>

          <div class="searchBar-single px-3 py-3 border-bottom">
            <div class="searchBar-single-title d-flex mb-3">
              <h6 class="sidebar-subTitle fs-6 fw-medium m-0">
                رنج قیمتی به ریال
              </h6>
            </div>
            <div class="searchBar-single-wrap">
              <input
                type="text"
                class="js-range-slider"
                name="my_range"
                value=""
                data-skin="round"
                data-type="double"
                data-min="0"
                data-max="1000"
                data-grid="false"
              />
            </div>
          </div>

          <div class="searchBar-single px-3 py-3 border-bottom">
            <div class="searchBar-single-title d-flex mb-3">
              <h6 class="sidebar-subTitle fs-6 fw-medium m-0">
                امتیاز مسافران
              </h6>
            </div>
            <div class="searchBar-single-wrap">
              <ul class="row align-items-center justify-content-between p-0 gx-3 gy-2 mb-0">
                <li class="col-12">
                  <div class="form-check lg">
                    <div class="frm-slicing d-flex align-items-center">
                      <div class="frm-slicing-first">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="fourfive"
                        />
                        <label class="form-check-label" for="fourfive"></label>
                      </div>
                      <div class="frm-slicing-end d-flex align-items-center justify-content-between full-width ps-1">
                        <div class="frms-flex d-flex align-items-center">
                          <div class="frm-slicing-ico text-md">
                            <i class="fa fa-star text-warning"></i>
                          </div>
                          <div class="frm-slicing-title pe-1">
                            <span class="text-dark">4.5+</span>
                          </div>
                        </div>
                        <div class="text-end">
                          <span class="text-md text-muted-2 opacity-75">
                            16
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="col-12">
                  <div class="form-check lg">
                    <div class="frm-slicing d-flex align-items-center">
                      <div class="frm-slicing-first">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="fourplus"
                        />
                        <label class="form-check-label" for="fourplus"></label>
                      </div>
                      <div class="frm-slicing-end d-flex align-items-center justify-content-between full-width ps-1">
                        <div class="frms-flex d-flex align-items-center">
                          <div class="frm-slicing-ico text-md">
                            <i class="fa fa-star text-warning"></i>
                          </div>
                          <div class="frm-slicing-title pe-1">
                            <span class="text-dark">4+</span>
                          </div>
                        </div>
                        <div class="text-end">
                          <span class="text-md text-muted-2 opacity-75">
                            10
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="col-12">
                  <div class="form-check lg">
                    <div class="frm-slicing d-flex align-items-center">
                      <div class="frm-slicing-first">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="threefive"
                        />
                        <label class="form-check-label" for="threefive"></label>
                      </div>
                      <div class="frm-slicing-end d-flex align-items-center justify-content-between full-width ps-1">
                        <div class="frms-flex d-flex align-items-center">
                          <div class="frm-slicing-ico text-md">
                            <i class="fa fa-star text-warning"></i>
                          </div>
                          <div class="frm-slicing-title pe-1">
                            <span class="text-dark">3.5+</span>
                          </div>
                        </div>
                        <div class="text-end">
                          <span class="text-md text-muted-2 opacity-75">
                            08
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="col-12">
                  <div class="form-check lg">
                    <div class="frm-slicing d-flex align-items-center">
                      <div class="frm-slicing-first">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="threeplus"
                        />
                        <label class="form-check-label" for="threeplus"></label>
                      </div>
                      <div class="frm-slicing-end d-flex align-items-center justify-content-between full-width ps-1">
                        <div class="frms-flex d-flex align-items-center">
                          <div class="frm-slicing-ico text-md">
                            <i class="fa fa-star text-warning"></i>
                          </div>
                          <div class="frm-slicing-title pe-1">
                            <span class="text-dark">3+</span>
                          </div>
                        </div>
                        <div class="text-end">
                          <span class="text-md text-muted-2 opacity-75">
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
