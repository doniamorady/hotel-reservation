export default function CardFooter({comments}) {
  return (
    <div className="card-footer bg-white">
      <div className="row align-items-center justify-content-start gx-2">
        <div className="col-auto">
          <div className="square--40 rounded-2 bg-seegreen text-light">4.8</div>
        </div>

        <div className="col-auto text-end">
          <div className="text-md text-dark fw-medium">اقتصادی</div>

          <div className="text-md text-muted-2">
            {comments} دیدگاه
          </div>
        </div>
      </div>
    </div>
  );
}
