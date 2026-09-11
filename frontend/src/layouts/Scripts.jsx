import { useEffect } from "react";

const scriptPaths = [
  "/assets/js/jquery.min.js",
  "/assets/js/popper.min.js",
  "/assets/js/bootstrap.min.js",
  // "/assets/js/dropzone.min.js",
  "/assets/js/flatpickr.js",
  "/assets/js/lightbox.min.js",
  "/assets/js/rangeslider.js",
  "/assets/js/select2.min.js",
  "/assets/js/counterup.min.js",
  "/assets/js/prism.js",
  "/assets/js/addadult.js",
  "/assets/js/browselocation.js",
  "/assets/js/custom.js",
];

export default function Scripts() {
  useEffect(() => {
    const tags = scriptPaths.map((src) => {
      const s = document.createElement("script");
      s.src = src;
      s.async = false;
      document.body.appendChild(s);

      // initialize flatpickr after its script has loaded
      if (src.endsWith("/flatpickr.js") || src.endsWith("flatpickr.js")) {
        s.onload = () => {
          try {
            if (window.flatpickr) {
              window.flatpickr("#checkinout", {
                locale: "fa",
                mode: "range",
                minDate: "today",
                dateFormat: "Y/m/d",
                position: "below",
                appendTo: document.body,
              });
              window.flatpickr(".choosedate", {
                locale: "fa",
                position: "below",
                appendTo: document.body,
              });
            }
          } catch (e) {
            // keep error visible for debugging
            // eslint-disable-next-line no-console
            console.error("flatpickr init error:", e);
          }
        };
      }

      return s;
    });

    // date picker inline init from original template (pDatepicker for .date-birth)
    const inline = document.createElement("script");
    inline.innerHTML =
      "$(document).ready(function() { $('.date-birth').pDatepicker({ autoClose: true, format: 'YYYY/MM/DD' }); });";
    document.body.appendChild(inline);

    return () => {
      tags.forEach((t) => {
        t.onload = null;
        t.remove();
      });
      inline.remove();
    };
  }, []);

  return null;
}
