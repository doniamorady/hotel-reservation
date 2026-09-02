 <base href="../../../">
 <meta charset="utf-8" />
 <meta name="description"
     content="The most advanced پنل ادمین بوت استراپ Theme on Themeforest trusted by 94,000 beginners و professionals. Multi-demo, حالت تیره, RTL support و complete React, Angular, Vue &amp; Laravel versions. Grab your copy now و get life-time updates for free." />
 <meta name="keywords"
     content="مترونیک, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <meta property="og:locale" content="en_US" />
 <meta property="og:type" content="article" />
 <meta property="og:title" content="قالب مدیریت مترونیک" />
 <meta property="og:url" content="https://keenthemes.com/metronic" />
 <meta property="og:site_name" content="ساتراس وب | مترونیک" />
 <link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
 <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
 <!--begin::Fonts-->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
 <!--end::Fonts-->
 <!--begin::Page Vendor Stylesheets(used by this page)-->
 <link href="{{ asset('admin-assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
     type="text/css" />
 <!--end::Page Vendor Stylesheets-->
 <!--begin::Global Stylesheets Bundle(used by all pages)-->
 <link href="{{ asset('admin-assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('admin-assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
 <style>
     .delete {
     background-color: transparent;
     /* بدون !important */
     border: none;
     padding: 0;
     }
 </style>
 <script>
     (function() {
         if (localStorage.getItem('kt_theme_mode') === 'dark') {
             // اضافه کردن CSS دارک مود
             var link1 = document.createElement('link');
             link1.rel = 'stylesheet';
             link1.href = "{{ asset('admin-assets/plugins/global/plugins.dark.bundle.rtl.css') }}";
             document.head.appendChild(link1);

             var link2 = document.createElement('link');
             link2.rel = 'stylesheet';
             link2.href = "{{ asset('admin-assets/css/style.dark.bundle.rtl.css') }}";
             document.head.appendChild(link2);

             // اضافه کردن کلاس dark-mode به body یا html
             document.documentElement.classList.add('dark-mode');
         }
     })();
 </script>


 <!--end::Global Stylesheets Bundle-->
