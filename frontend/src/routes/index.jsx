import { createBrowserRouter } from "react-router-dom";
import Layout from '../layouts/Layout'
import Home from "../pages/Home";
import Rooms from "../pages/Rooms";

export const router = createBrowserRouter([
   {
    element: <Layout/>,
    children: [
        {
            index: true,
            element: <Home/>
        },
        {
            path : 'rooms', 
            element : <Rooms/>
        }
    ]
   } 
]);