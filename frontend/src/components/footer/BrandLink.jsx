import { Link } from "react-router-dom";

export default function BrandLink({path, className}) {
  return (
    <li>
      <Link to={path}>
        <i className={className} />
      </Link>
    </li>
  );
}
