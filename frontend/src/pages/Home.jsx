import { useEffect, useState } from "react";
import { getRooms } from "../services/apiRoom";
import RoomsContainer from "../components/homePage/RoomsContainer";
import PopularDestinationContainer from "../components/homePage/PopularDestinationContainer";
import BackgroundContainer from "../components/homePage/BackgroundContainer";

export default function Home() {
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
  

  return (
    <>
      <BackgroundContainer />
      <RoomsContainer rooms={rooms} />
      <PopularDestinationContainer />
    </>
  );
}
