export default function GalleryContainer({ room }) {
  const hasGallery = room.gallery?.length > 0;
  return (
    <div className="col-xl-8 col-lg-7 col-md-12">
      <div
        className={`${hasGallery ? "galleryGrid" : ""} typeGrid_2 mb-lg-0 mb-3`}
      >
        {/* تصویر اصلی */}
        <div className="galleryGrid__item relative d-flex">
          <a href={room.cover_image} data-lightbox="room-gallery">
            <img
              src={room.cover_image}
              alt="cover"
              className="rounded-2 img-fluid"
            />
          </a>
        </div>

        {/* تصاویر گالری */}
        {room.gallery?.slice(0, 3).map((image, index) => (
          <div key={image.id} className="galleryGrid__item position-relative">
            <a href={image.path} data-lightbox="room-gallery">
              <img
                src={image.path}
                alt={`gallery-${index}`}
                className="rounded-2 img-fluid"
              />
            </a>

            {index === 0 && room.gallery.length > 3 && (
              <div className="position-absolute start-0 bottom-0 mb-3 ms-3">
                <a
                  href={image.path}
                  data-lightbox="room-gallery"
                  className="btn btn-md btn-whites fw-medium text-dark"
                >
                  <i className="fa-solid fa-images ms-1"></i>
                  {room.gallery.length + 1} تصویر
                </a>
              </div>
            )}
          </div>
        ))}
      </div>
    </div>
  );
}
