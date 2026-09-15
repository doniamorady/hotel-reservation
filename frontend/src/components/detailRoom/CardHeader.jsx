export default function CardHeader({name}) {
  return (
    <div className="crd-heaader d-md-flex align-items-center justify-content-between mb-3">
      <div className="crd-heaader-first">
        <div className="d-inline-flex align-items-center mb-1">
          <span className="label bg-light-success text-success">
            سرویس نظافت روزانه
          </span>

          <div className="d-inline-block me-2">
            <i className="fa fa-star text-warning text-xs"></i>
            <i className="fa fa-star text-warning text-xs"></i>
            <i className="fa fa-star text-warning text-xs"></i>
            <i className="fa fa-star text-warning text-xs"></i>
            <i className="fa fa-star text-warning text-xs"></i>
          </div>
        </div>

        <div className="d-block">
          <h4 className="mb-0">اتاق شماره {name}</h4>
        </div>
      </div>

      <div className="crd-heaader-last my-md-0 my-2">
        <div className="drix-wrap d-flex flex-column align-items-md-end align-items-start text-end">
          <div className="drix-first d-flex align-items-center text-end mb-2">
            <a
              href="#"
              className="bg-light-info text-info rounded-1 fw-medium text-sm px-3 py-2 lh-base"
            >
              <i className="fa-solid fa-bookmark ms-2"></i>
              افزودن به علاقه مندی
            </a>

            <a
              href="#"
              className="bg-light-danger text-danger rounded-1 fw-medium text-sm px-3 py-2 lh-base me-2"
            >
              <i className="fa-solid fa-share-nodes ms-2"></i>
              اشتراک
            </a>
          </div>
        </div>
      </div>
    </div>
  );
}
