import { useEffect } from "react";

const scriptPaths = ["/assets/js/bootstrap.min.js"];

export default function Scripts() {
  useEffect(() => {
    const tags = scriptPaths.map((src) => {
      const s = document.createElement("script");
      s.src = src;
      s.async = false;
      document.body.appendChild(s);

      return s;
    });

    return () => {
      tags.forEach((t) => t.remove());
    };
  }, []);

  return null;
}
