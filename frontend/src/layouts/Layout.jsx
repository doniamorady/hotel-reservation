import HeadTag from "./HeadTag";
import Header from "./Header";
import Footer from "./Footer";
import Scripts from "./Scripts";
import { Outlet } from "react-router-dom";

export default function Layout() {
  return (
    <>
      <HeadTag />
      <Header />
      <div className="clearfix" />
      <div id="main-wrapper">
        <Outlet/>
        <Footer />
      </div>
      <Scripts />
    </>
  );
}
