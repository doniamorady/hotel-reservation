  <script>
      document.addEventListener("DOMContentLoaded", function() {
          const darkModeBtn = document.getElementById('toggleDarkMode');
          const headTag = document.head;

          // مسیر فایل‌های دارک مود
          const darkCssFiles = [
              "{{ asset('admin-assets/plugins/global/plugins.dark.bundle.rtl.css') }}",
              "{{ asset('admin-assets/css/style.dark.bundle.rtl.css') }}"
          ];

          // افزودن لینک CSS دارک
          const addDarkCss = () => {
              darkCssFiles.forEach(href => {
                  if (!document.querySelector(`link[href='${href}']`)) {
                      const link = document.createElement('link');
                      link.rel = 'stylesheet';
                      link.href = href;
                      link.dataset.dark = 'true';
                      headTag.appendChild(link);
                  }
              });
          };

          // حذف لینک CSS دارک
          const removeDarkCss = () => {
              document.querySelectorAll('link[data-dark="true"]').forEach(link => link.remove());
          };

          // بارگذاری اولیه
          if (localStorage.getItem('kt_theme_mode') === 'dark') {
              addDarkCss();
              if (darkModeBtn) darkModeBtn.innerHTML = '<i class="fonticon-moon fs-2"></i>';
          } else {
              if (darkModeBtn) darkModeBtn.innerHTML = '<i class="fonticon-sun fs-2"></i>';
          }

          // تغییر حالت با کلیک
          if (darkModeBtn) {
              darkModeBtn.addEventListener('click', function() {
                  if (localStorage.getItem('kt_theme_mode') === 'dark') {
                      localStorage.setItem('kt_theme_mode', 'light');
                      removeDarkCss();
                      darkModeBtn.innerHTML = '<i class="fonticon-sun fs-2"></i>';
                  } else {
                      localStorage.setItem('kt_theme_mode', 'dark');
                      addDarkCss();
                      darkModeBtn.innerHTML = '<i class="fonticon-moon fs-2"></i>';
                  }
              });
          }
      });
  </script>

  <!--begin::Javascript-->
  <script>
      var hostUrl = "assets/";
  </script>
  <!--begin::Global Javascript Bundle(used by all pages)-->
  <script src="{{ asset('admin-assets/plugins/global/plugins.bundle.js') }}"></script>
  <script src="{{ asset('admin-assets/js/scripts.bundle.js') }}"></script>
  <!--end::Global Javascript Bundle-->
  <!--begin::Page Vendors Javascript(used by this page)-->
  <script src="{{ asset('admin-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
  <!--end::Page Vendors Javascript-->
  <!--begin::Page سفارشی Javascript(used by this page)-->
  <script src="{{ asset('admin-assets/js/custom/apps/ecommerce/catalog/categories.js') }}"></script>
  <script src="{{ asset('admin-assets/js/widgets.bundle.js') }}"></script>
  <script src="{{ asset('admin-assets/js/custom/widgets.js') }}"></script>
  <script src="{{ asset('admin-assets/js/custom/apps/chat/chat.js') }}"></script>
  <script src="{{ asset('admin-assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
  <script src="{{ asset('admin-assets/js/custom/utilities/modals/create-app.js') }}"></script>
  <script src="{{ asset('admin-assets/js/custom/utilities/modals/users-search.js') }}"></script>
  <!--end::Page custom Javascript-->
  <!--end::Javascript-->
