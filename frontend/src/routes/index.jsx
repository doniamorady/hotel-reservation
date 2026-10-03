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
import ProtectedRoute from "./ProtectedRoute";
import BookingSuccess from "../pages/BookingSuccess";
import Favorites from "../pages/Favorites";

export const router = createBrowserRouter([
  {
    element: <Layout />,
    children: [
      {
        index: true,
        element: <Home />,
      },

      {
        path: "/rooms",
        children: [
          {
            index: true,
            element: <Rooms />,
          },
          {
            path: ":id",
            element: <DetailsRoom />,
          },
          {
            element: <ProtectedRoute />,
            children: [
              {
                path: ":id/prepare",
                element: <PrepareBooking />,
              },
            ],
          },
        ],
      },

      {
        element: <ProtectedRoute />,
        children: [
          {
            path: "bookings",
            element: <MyBooking />,
          },
          {
            path: "booking-success",
            element: <BookingSuccess />,
          },
          {
            path: "profile",
            element: <Profile />,
          },
          {
            path: "favorites",
            element: <Favorites />,
          },
        ],
      },

      {
        path: "contact-us",
        element: <Contact />,
      },
      {
        path: "about-us",
        element: <About />,
      },
    ],
  },

  {
    path: "/login",
    element: <Login />,
  },
]);
