export default function Breadcrumb({ items }) {
  return (
    <div className="col-xl-12 col-lg-12 col-md-12">
      <nav aria-label="breadcrumb">
        <ol className="breadcrumb">
          {items.map((item, index) => (
            <li
              key={index}
              className={`breadcrumb-item ${
                index === items.length - 1 ? "active" : ""
              }`}
              aria-current={index === items.length - 1 ? "page" : undefined}
            >
              {index === items.length - 1 ? (
                item.label
              ) : (
                <a href={item.path} className="text-primary">
                  {item.label}
                </a>
              )}
            </li>
          ))}
        </ol>
      </nav>
    </div>
  );
}
