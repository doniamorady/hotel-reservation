import { useEffect, useState } from "react";
import { getRoom, getRooms } from "../services/apiRoom";
import ServiceAmenityContainer from "../components/detailRoom/ServiceAmenityContainer";
import Detail from "../components/detailRoom/Detail";
import LoginBanner from "../components/detailRoom/LoginBanner";
import RoomBreadcrumb from "../components/RoomBreadcrumb";
import { useParams } from "react-router-dom";
import RoomsContainer from "../components/homePage/RoomsContainer";

export default function DetailsRoom() {
  const [room, setRoom] = useState(null);
  const { id } = useParams();
  const [rooms, setRooms] = useState([]);

  useEffect(() => {
    async function loadRooms() {
      try {
        const data = await getRooms();
        setRooms(data.data);
      } catch (error) {
        console.error(error);
      }
    }

    loadRooms();
  }, []);

  useEffect(() => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  }, [id]);

  useEffect(() => {
    async function loadRoom() {
      const data = await getRoom(id);
      setRoom(data);
    }
    loadRoom();
  }, [id]);

  if (!room) return <p>loading...</p>;

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
            <LoginBanner />

            {/* <!-- Service & Amenties --> */}
            <ServiceAmenityContainer />

            {/* <!-- Guests Reviews --> */}
          </div>
        </div>
      </section>

      <RoomsContainer rooms={rooms} />
    </>
  );
}
