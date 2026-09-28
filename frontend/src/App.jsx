import { RouterProvider } from "react-router-dom";
import { router } from "./routes";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { ReactQueryDevtools } from "@tanstack/react-query-devtools";
import { Toaster } from "react-hot-toast";

export default function App() {
  const queryCilent = new QueryClient({
    defaultOptions: {
      queries: {
        staleTime: 0,
      },
    },
  });

  return (
    <QueryClientProvider client={queryCilent}>
      <RouterProvider router={router} />
      <ReactQueryDevtools initialIsOpen={false} />
      <Toaster
        position="bottom-right"
        reverseOrder={false}
        toastOptions={{
          duration: 3500,

          success: {
            iconTheme: {
              primary: "#16A34A",
              secondary: "#ECFDF3",
            },

            style: {
              direction: "rtl",
              background: "#FFFFFF",
              color: "#344054",
              border: "1px solid #D1FADF",
              boxShadow: "0 12px 35px rgba(16,24,40,.12)",
            },
          },

          error: {
            iconTheme: {
              primary: "#D92D20",
              secondary: "#FEF3F2",
            },

            style: {
              direction: "rtl",
              background: "#FFFFFF",
              color: "#344054",
              border: "1px solid #FECDCA",
              boxShadow: "0 12px 35px rgba(16,24,40,.12)",
            },
          },

          style: {
            fontFamily: "inherit",
            fontSize: "13px",
            fontWeight: "500",
            maxWidth: "380px",
            minHeight: "48px",
            padding: "12px 16px",
            borderRadius: "14px",
          },
        }}
      />
    </QueryClientProvider>
  );
}
