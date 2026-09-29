import { useEffect } from "react";
import ServiceAmenityContainer from "../components/detailRoom/ServiceAmenityContainer";
import Detail from "../components/detailRoom/Detail";
import LoginBanner from "../components/detailRoom/LoginBanner";
import RoomBreadcrumb from "../components/RoomBreadcrumb";
import { useParams } from "react-router-dom";
import RoomsContainer from "../components/homePage/RoomsContainer";
import { useRoom } from "../hooks/useRoom";
import { useRooms } from "../hooks/useRooms";
import Loader from "../components/Loader";
import CommentsContainer from "../components/detailRoom/comment/CommentsContainer";
import { useMe } from "../hooks/useMe";
export default function DetailsRoom() {
  const { id } = useParams();
  const { data: room, isLoading: roomLoading, isError } = useRoom(id);
  const { data: roomsData, isLoading: roomsLoading } = useRooms();
  const { data: userData } = useMe();
  const user = userData?.user;
  const rooms = roomsData?.data || [];

  useEffect(() => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  }, [id]);

  if (roomLoading) return <Loader />;
  if (isError) return <div>خطا در دریافت اطلاعات</div>;

  const items = [
    {
      label: "صفحه اصلی",
      path: "/",
    },
    {
      label: "جزئیات هتل",
      path: "/rooms",
    },
    {
      label: room.name,
    },
  ];

  return (
    <>
      <section className="pt-3 gray-simple">
        <div className="container">
          <div className="row">
            <RoomBreadcrumb items={items} />
            <Detail room={room} />
            {!user && <LoginBanner />}

            {/* <!-- Service & Amenties --> */}
            <ServiceAmenityContainer />
            {/* <!-- Guests Reviews --> */}

            <CommentsContainer comments={room.comments} roomId={room.id} />
          </div>
        </div>
      </section>
      {roomsLoading ? <Loader /> : <RoomsContainer rooms={rooms} />}
    </>
  );
}
