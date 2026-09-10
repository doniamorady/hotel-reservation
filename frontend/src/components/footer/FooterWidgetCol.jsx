export default function FooterWidgetCol({ children, label }) {
  return (
    <div className="col-lg-2 col-md-4">
      <div className="footer-widget">
        <h4 className="widget-title">{label}</h4>
        <ul className="footer-menu">{children}</ul>
      </div>
    </div>
  );
}
