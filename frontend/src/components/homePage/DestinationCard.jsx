export default function DestinationCard({ src }) {
  return (
    <div className="col-xl-3 col-lg-3 col-md-4 col-sm-6">
      <div className="card destination-card border-0 rounded-3 overflow-hidden m-0">
        <div className="destination-card-wraps position-relative">
          <div className="destination-card-thumbs">
            <div className="destinations-pics">
              <a href="#">
                <img src={src} className="img-fluid" alt="" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
