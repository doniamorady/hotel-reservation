import { FavoritesRoom } from "../components/panel/favorites/favoriteRoom";
import FavoriteEmpty from "../components/panel/favorites/FavoriteEmpty";
import SideBar from "../components/panel/Sidebar";
import { useShowFavorites } from "../hooks/useFavorite";
import Loader from "../components/Loader";

export default function Favorites() {
  const { data, isLoading } = useShowFavorites();
  const rooms = data?.data ?? [];

  if (isLoading) return <Loader />;
  return (
    <section className="pt-5 gray-simple position-relative">
      <div className="container">
        <div className="row align-items-start justify-content-between gx-xl-4">
          <SideBar />

          <div className="col-xl-9 col-lg-9 col-md-12">
            <div className="card">
              <div className="card-body">
                <div className="card-header">
                  <h4>
                    <i className="fa-solid fa-file-invoice ms-2"></i>
                    لیست علاقه مندی ها
                  </h4>
                </div>

                <div className="row align-items-center mt-5 justify-content-start">
                  <div className="col-xl-12 col-lg-12 col-md-12">
                    {rooms.map((room) => (
                      <FavoritesRoom room={room} key={room.id} />
                    ))}
                    {rooms.length == 0 && <FavoriteEmpty />}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
