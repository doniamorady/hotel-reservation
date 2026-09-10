import { useState } from "react";
import { updateProfile } from "../services/apiProfile";

export default function Profile() {
  const [user, setUser] = useState(
    JSON.parse(localStorage.getItem("user")) || {},
  );

  const [formData, setFormData] = useState({
    first_name: user.first_name || "",
    last_name: user.last_name || "",
    phone: user.phone || "",
    avatar: null,
  });

  const handleChange = (e) => {
    setFormData((prev) => ({
      ...prev,
      [e.target.name]: e.target.value,
    }));
  };

  const handleImage = (e) => {
    setFormData((prev) => ({
      ...prev,
      avatar: e.target.files[0],
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const updatedUser = await updateProfile(formData);
      // آپدیت localStorage
      localStorage.setItem("user", JSON.stringify(updatedUser));
      // آپدیت state
      setUser(updatedUser);
      // آپدیت فرم
      setFormData({
        first_name: updatedUser.first_name || "",
        last_name: updatedUser.last_name || "",
        phone: updatedUser.phone || "",
        avatar: null,
      });

      console.log(updatedUser);
      console.log(updatedUser.avatar);
      alert("اطلاعات با موفقیت بروزرسانی شد.");
    } catch (error) {
      console.log(error);
    }
  };
  return (
    <section class="pt-2 gray-simple position-relative">
      <div class="container">
        <div class="row align-items-start justify-content-between gx-xl-4 pt-4">
          <div class="col-xl-4 col-lg-4 col-md-12">
            <div class="card rounded-2 ms-xl-5 mb-4">
              <div class="justify-content-center card-top bg-primary position-relative">
                <div class="position-absolute start-0 top-0 mt-4 ms-3">
                  <a
                    href="login.html"
                    class="square--40 circle bg-light-dark text-light"
                  >
                    <i class="fa-solid fa-right-from-bracket"></i>
                  </a>
                </div>
                <div class="py-5 px-3">
                  <div class="crd-thumbimg text-center">
                    <div class="p-2 d-flex align-items-center justify-content-center brd">
                      <img
                        src={user?.avatar ? user.avatar : "/no-photo.png"}
                        class="img-fluid circle"
                        width="120"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="crd-capser text-center">
                    <h5 class="mb-0 text-light">
                      {user?.first_name ? user.first_name + user.last_name : ""}
                    </h5>
                  </div>
                </div>
              </div>

              <div class="card-middle px-4 py-5">
                <div class="crdapproval-groups">
                  <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                    <div class="crdapproval-item">
                      <div class="square--50 circle bg-light-primary text-primary">
                        <i class="fa-solid fa-envelope-circle-check fs-5"></i>
                      </div>
                    </div>
                    <div class="crdapproval-caps pe-2">
                      <div class="d-flippo">
                        <a
                          href="{{ route('site.user-profile') }}"
                          class="text-dark lh-2 mb-0"
                        >
                          پروفایل
                        </a>
                        <span
                          class="text-success"
                          data-bs-toggle="tooltip"
                          data-bs-title="ایمیل تایید شده است"
                        >
                          <i class="bi bi-patch-check-fill"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                    <div class="crdapproval-item">
                      <div class="square--50 circle bg-light-primary text-primary">
                        <i class="fa-solid fa-phone-volume fs-5"></i>
                      </div>
                    </div>
                    <div class="crdapproval-caps pe-2">
                      <div class="d-flippo">
                        <a
                          href="{{ route('site.user-booking') }}"
                          class="text-dark lh-2 mb-0"
                        >
                          لیست رزرو ها
                        </a>
                        <span
                          class="text-success"
                          data-bs-toggle="tooltip"
                          data-bs-title="شماره موبایل تایید شده است"
                        >
                          <i class="bi bi-patch-check-fill"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                    <div class="crdapproval-item">
                      <div class="square--50 circle bg-light-primary text-primary">
                        <i class="fa-solid fa-file-invoice fs-5"></i>
                      </div>
                    </div>
                    <div class="crdapproval-caps pe-2">
                      <div class="d-flippo">
                        <a
                          href="{{ route('site.user-favorite') }}"
                          class="text-dark lh-2 mb-0"
                        >
                          علاقه‌مندی‌ها
                        </a>
                        <span
                          class="text-muted"
                          data-bs-toggle="tooltip"
                          data-bs-title="پروفایل تکمیل نشده است"
                        >
                          <i class="bi bi-patch-check-fill"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                    <div class="crdapproval-item">
                      <div class="square--50 circle bg-light-primary text-primary">
                        <i class="fa-solid fa-file-invoice fs-5"></i>
                      </div>
                    </div>
                    <div class="crdapproval-caps pe-2">
                      <div class="d-flippo">
                        <a
                          href="{{ route('site.user-payment') }}"
                          class="text-dark lh-2 mb-0"
                        >
                          تراکنش‌ها
                        </a>
                        <span
                          class="text-muted"
                          data-bs-toggle="tooltip"
                          data-bs-title="پروفایل تکمیل نشده است"
                        >
                          <i class="bi bi-patch-check-fill"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                    <div class="crdapproval-item">
                      <div class="square--50 circle bg-light-primary text-primary">
                        <i class="fa-solid fa-file-invoice fs-5"></i>
                      </div>
                    </div>
                    <div class="crdapproval-caps pe-2">
                      <div class="d-flippo">
                        <a
                          href="{{ route('site.auth.logout') }}"
                          class="text-dark lh-2 mb-0"
                        >
                          خروج
                        </a>
                        <span
                          class="text-muted"
                          data-bs-toggle="tooltip"
                          data-bs-title="پروفایل تکمیل نشده است"
                        >
                          <i class="bi bi-patch-check-fill"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-8 col-lg-8 col-md-12">
            {/* <!-- Personal Information --> */}
            <div class="card mb-4">
              <div class="card-header">
                <h4>
                  <i class="fa-solid fa-file-invoice ms-2"></i>اطلاعات شخصی
                </h4>
              </div>
              <div class="card-body">
                <div class="row align-items-center justify-content-start">
                  <form onSubmit={handleSubmit} encType="multipart/form-data">
                    <div className="d-flex justify-content-center mb-4">
                      <div className="d-flex align-items-center">
                        <label
                          className="position-relative ms-4"
                          htmlFor="uploadfile-1"
                          title="تغییر عکس"
                        >
                          <span className="avatar avatar-xl">
                            <img
                              className="avatar-img rounded-circle border border-white border-3 shadow"
                              src={
                                formData.avatar
                                  ? URL.createObjectURL(formData.avatar)
                                  : user?.avatar || "/no-photo.png"
                              }
                              alt=""
                              width={120}
                              height={120}
                              style={{ objectFit: "cover" }}
                            />
                          </span>
                        </label>

                        <label
                          className="btn btn-sm btn-light-primary px-4 fw-medium mb-0"
                          htmlFor="uploadfile-1"
                        >
                          تغییر
                        </label>

                        <input
                          id="uploadfile-1"
                          type="file"
                          className="form-control d-none"
                          accept="image/*"
                          onChange={handleImage}
                        />
                      </div>
                    </div>

                    <div className="row">
                      <div className="col-md-6 mb-3">
                        <label className="form-label">نام</label>

                        <input
                          type="text"
                          name="first_name"
                          className="form-control"
                          value={formData.first_name}
                          onChange={handleChange}
                        />
                      </div>

                      <div className="col-md-6 mb-3">
                        <label className="form-label">نام خانوادگی</label>

                        <input
                          type="text"
                          name="last_name"
                          className="form-control"
                          value={formData.last_name}
                          onChange={handleChange}
                        />
                      </div>

                      <div className="col-md-6 mb-3">
                        <label className="form-label">شماره موبایل</label>

                        <input
                          type="text"
                          name="phone"
                          className="form-control"
                          value={formData.phone}
                          onChange={handleChange}
                        />
                      </div>
                    </div>

                    <button type="submit" className="btn btn-primary">
                      ثبت اطلاعات
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
