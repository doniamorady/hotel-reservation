export default function RoomsFilter({ sortByPrice, activeTab }) {
  return (
    <div className="col-xl-8 col-lg-8 col-md-12">
      <div className="d-flex align-items-center justify-content-start justify-content-lg-end flex-wrap">
        <div className="flsx-first mt-sm-0 mt-2">
          <ul
            className="nav nav-pills nav-fill p-1 small lights blukker bg-primary rounded-3 shadow-sm"
            id="filtersblocks"
            role="tablist"
          >
            <li className="nav-item" role="presentation">
              <button
                className={`nav-link rounded-3 ${activeTab === 'all' ? 'active' : ''} `}
                id="trending"
                type="button"
                onClick={()=>sortByPrice('all')}
              >
                پیش فرض
              </button>
            </li>
            <li className="nav-item" role="presentation">
              <button
                className={`nav-link rounded-3 ${activeTab === 'inc' ? 'active' : ''}`}
                id="mostpopular"
                type="button"
                onClick={()=>sortByPrice('inc')}
              >
                بیشترین قیمت
              </button>
            </li>
            <li className="nav-item" role="presentation">
              <button
                className={`nav-link rounded-3 ${activeTab === 'desc' ? 'active' : ''}`}
                id="lowprice"
                type="button"
                onClick={()=>sortByPrice('desc')}
              >
                کمترین قیمت
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  );
}
