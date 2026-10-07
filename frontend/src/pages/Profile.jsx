import SideBar from "../components/panel/Sidebar";
import UpdateProfileForm from "../components/panel/profile/UpdateProfileForm";

export default function Profile() {
  return (
    <section className="pt-2 gray-simple position-relative">
      <div className="container">
        <div className="row align-items-start justify-content-between gx-xl-4 pt-4">
          <SideBar />

          <div className="col-xl-9 col-lg-9 col-md-12">
            {/* <!-- Personal Information --> */}
            <div className="card mb-4">
              <div className="card-header">
                <h4>
                  <i className="fa-solid fa-file-invoice ms-2"></i>اطلاعات شخصی
                </h4>
              </div>
              <div className="card-body">
                <div className="row align-items-center justify-content-start">
                  <UpdateProfileForm />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
