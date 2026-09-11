import DestinationCard from "../../components/homePage/DestinationCard";

export default function     PopularDestinationContainer() {
  return (
    <section className="gray-simple">
      <div className="container">
        <div className="row align-items-center justify-content-center">
          <div className="col-xl-8 col-lg-9 col-md-11 col-sm-12">
            <div className="secHeading-wrap text-center mb-5">
              <h3>مکان های محبوب برای اقامت</h3>
              <p>بهترین انتخاب برای بهترین ها</p>
            </div>
          </div>
        </div>

        <div className="row align-items-center justify-content-center g-xl-4 g-lg-4 g-3">
          <DestinationCard src="assets/img/hotel/hotel-1.jpg" />
          <DestinationCard src="assets/img/hotel/hotel-2.jpg" />
          <DestinationCard src="assets/img/hotel/hotel-3.jpg" />
          <DestinationCard src="assets/img/hotel/hotel-4.jpg" />
          <DestinationCard src="assets/img/hotel/hotel-5.jpg" />
          <DestinationCard src="assets/img/hotel/hotel-6.jpg" />
          <DestinationCard src="assets/img/hotel/hotel-7.jpg" />
          <DestinationCard src="assets/img/hotel/hotel-8.jpg" />
        </div>
      </div>
    </section>
  );
}
