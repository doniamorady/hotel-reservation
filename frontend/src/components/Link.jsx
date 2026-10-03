import { Link } from "react-router-dom";

export default function LinkComponent({
  to,
  label,
  children,
  className = "",
  onClick = null,
}) {
  return (
    <li>
      <Link to={to} className={className} onClick={onClick}>
        {label}
        {children}
      </Link>
    </li>
  );
}
