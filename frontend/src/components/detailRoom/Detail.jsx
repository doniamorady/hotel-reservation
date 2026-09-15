import GalleryContainer from "./GalleryContainer";
import CardHeader from "./CardHeader";
import BookingCard from "./BookingCard";

export default function Detail({ room }) {
  return (
    <div className="col-xl-12 col-lg-12 col-md-12">
      <div className="card border-0 p-3 mb-4">
        <CardHeader name={room.name} />

        <div className="crd-body">
          <div className="row align-items-center justify-content-between">
            <GalleryContainer room={room} />

            <BookingCard room={room} />
          </div>
        </div>
      </div>
    </div>
  );
}
