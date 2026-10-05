import { useForm } from "react-hook-form";
import { useUpdateProfile } from "../../../hooks/useProfile";
import { useEffect } from "react";
import Loader from "../../Loader";
import { useMe } from "../../../hooks/useMe";
import Input from "./Input";
import ProfileAvatar from "./ProfileAvatar";
import { createFormData } from "../../../utils/profile";

export default function UpdateProfileForm() {
  const { mutate: updateProfile } = useUpdateProfile();
  const { data, isLoading } = useMe();
  const user = data?.user;

  const {
    register,
    handleSubmit,
    reset,
    formState: { dirtyFields, isDirty },
  } = useForm({
    defaultValues: {
      first_name: "",
      last_name: "",
      avatar: null,
    },
  });

  useEffect(() => {
    if (user) {
      reset({
        first_name: user.first_name,
        last_name: user.last_name,
        avatar: null,
      });
    }
  }, [user, reset]);

  const onSubmit = (data) => {
    if (!isDirty) return;
    updateProfile(createFormData(data, dirtyFields));
  };

  if (isLoading) return <Loader />;

  return (
    <form onSubmit={handleSubmit(onSubmit)} encType="multipart/form-data">
      <ProfileAvatar avatar={user?.avatar} register={register} />

      <div className="row">
        <Input label="نام" events={register("first_name")} />
        <Input label="نام خانوادگی" events={register("last_name")} />
        <div className="col-md-6 mb-3">
          <label className="form-label">شماره تلفن</label>
          <input
            readOnly
            type="text"
            className="form-control"
            value={user?.phone}
          />
        </div>{" "}
      </div>

      <button
        type="submit"
        className="btn btn-sm btn-primary"
        disabled={!isDirty}
      >
        ثبت اطلاعات
      </button>
    </form>
  );
}
