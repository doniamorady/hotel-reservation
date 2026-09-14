export default function Pagination({ page, changePage, pagination }) {
  const last = pagination?.last_page || 0;

  if (last <= 1) return null;

  function goToPage(newPage) {
    if (newPage < 1 || newPage > last) return;
    changePage(newPage);
  }

  return (
    <div className="w-100 mt-4">
      <div className="pags card py-2 px-5">
        <nav>
          <ul className="pagination m-0 p-0 justify-content-center flex-row">
            <li className={`page-item ${page === 1 ? "disabled" : ""}`}>
              <button className="page-link" onClick={() => goToPage(page - 1)}>
                <i className="fa-solid fa-arrow-right-long"></i>
              </button>
            </li>

            {Array.from({ length: last }, (_, index) => index + 1).map(
              (number) => (
                <li
                  key={number}
                  className={`page-item ${Number(page) === number ? "active" : ""}`}
                >
                  <button
                    className="page-link"
                    onClick={() => goToPage(number)}
                  >
                    {number}
                  </button>
                </li>
              ),
            )}

            <li className={`page-item ${page === last ? "disabled" : ""}`}>
              <button className="page-link" onClick={() => goToPage(page + 1)}>
                <i className="fa-solid fa-arrow-left-long"></i>
              </button>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  );
}
