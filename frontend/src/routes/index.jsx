import { createBrowserRouter } from "react-router-dom";
import Layout from "../layouts/Layout";
import Home from "../pages/Home";
import Rooms from "../pages/Rooms";
import Contact from "../pages/Contact";
import About from "../pages/About";
import DetailsRoom from "../pages/DetailsRoom";
import Login from "../pages/auth/Login";
import PrepareBooking from "../pages/PrepareBooking";
import MyBooking from "../pages/MyBooking";
import Profile from "../pages/Profile";

export const router = createBrowserRouter([
  {
    element: <Layout />,
    children: [
      {
        index: true,
        element: <Home />,
      },

      {
        path: "rooms",
        children: [
          {
            index: true,
            element: <Rooms />,
          },
          {
            path: ":id",
            element: <DetailsRoom />,
          },
        ],
      },

      {
        path: "prepare",
        element: <PrepareBooking />,
      },

      {
        path: "prepare/:id",
        element: <PrepareBooking />,
      },

      {
        path: "contact-us",
        element: <Contact />,
      },
      {
        path: "about-us",
        element: <About />,
      },
      {
        path: "bookings",
        element: <MyBooking />,
      },
      {
        path: "profile",
        element: <Profile />,
      },
    ],
  },

  {
    path: "login",
    element: <Login />,
  },
]);
