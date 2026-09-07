import { useEffect } from "react";

const scriptPaths = [
  "/assets/js/jquery.min.js",
  "/assets/js/popper.min.js",
  "/assets/js/bootstrap.min.js",
  "/assets/js/dropzone.min.js",
  "/assets/js/flatpickr.js",
  "/assets/js/flickity.pkgd.min.js",
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
      return s;
    });

    // date picker inline init from original template
    const inline = document.createElement("script");
    inline.innerHTML =
      "$(document).ready(function() { $('.date-birth').pDatepicker({ autoClose: true, format: 'YYYY/MM/DD' }); });";
    document.body.appendChild(inline);

    return () => {
      tags.forEach((t) => t.remove());
      inline.remove();
    };
  }, []);

  return null;
}
