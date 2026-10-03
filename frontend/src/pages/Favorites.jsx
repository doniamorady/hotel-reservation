import { FavoritesRoom } from "../components/panel/favorites/favoriteRoom";
import FavoriteEmpty from "../components/panel/favorites/FavoriteEmpty";
import SideBar from "../components/panel/Sidebar";
import { useShowFavorites } from "../hooks/useFavorite";
import Loader from "../components/Loader";
import FavoriteRoomHeader from "../components/panel/favorites/FavoriteRoomHeader";

export default function Favorites() {
  const { data, isLoading } = useShowFavorites();
  const rooms = data?.data ?? [];

  if (isLoading) return <Loader />;
  return (
    <section className="gray-simple py-4">
      <div className="container">
        <div className="row g-4">
          <SideBar />

          <div className="col-xl-9 col-lg-8">
            <FavoriteRoomHeader length={rooms.length} />
            {rooms.map((room) => (
              <FavoritesRoom room={room} key={room.id} />
            ))}
            {rooms.length == 0 && <FavoriteEmpty />}
          </div>
        </div>
      </div>
    </section>
  );
}
