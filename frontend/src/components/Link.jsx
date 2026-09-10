import { Link } from "react-router-dom";

export default function LinkComponent({ path, label, children, className='' }) {
  return (
    <li>
      <Link to={path} className={className}>
        {label}
        {children}
      </Link>
    </li>
  );
}
