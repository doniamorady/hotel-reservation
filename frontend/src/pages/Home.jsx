import RoomsContainer from "../components/homePage/RoomsContainer";
import PopularDestinationContainer from "../components/homePage/PopularDestinationContainer";
import BackgroundContainer from "../components/homePage/BackgroundContainer";
import { useRooms } from "../hooks/useRooms";
import Loader from "../components/Loader";

export default function Home() {
  const { data, isLoading, isError } = useRooms({ page: 1 });
  const rooms = data?.data || [];
  if (isLoading) return <Loader />;
  if (isError) return <div>خطا در دریافت اطلاعات</div>;
  return (
    <>
      <BackgroundContainer />
      <RoomsContainer rooms={rooms} />
      <PopularDestinationContainer />
    </>
  );
}
