import { Link } from "react-router-dom";

export default function LinkComponent({ to, label, children, className='' }) {
  return (
    <li>
      <Link to={to} className={className}>
        {label}
        {children}
      </Link>
    </li>
  );
}
