export default function BookingImage({roomImage, roomName}) {
  return (
    <div className="position-relative">
      <img
        src={roomImage}
        alt={roomName}
        className="w-100"
        style={{
          height: "200px",
          objectFit: "cover",
        }}
      />

      <div
        className="position-absolute bottom-0 start-0 end-0 p-3"
        style={{
          background: "linear-gradient(transparent, rgba(0,0,0,.65))",
        }}
      >
        <h5 className="text-white fw-medium mb-1">{roomName}</h5>

        <small className="text-white-50">اقامت در هتل</small>
      </div>
    </div>
  );
}
