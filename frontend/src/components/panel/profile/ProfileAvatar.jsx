export default function ProfileAvatar({avatar, register}) {
  return (
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
              src={avatar || "/no-photo.png"}
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
          {...register("avatar")}
        />
      </div>
    </div>
  );
}
