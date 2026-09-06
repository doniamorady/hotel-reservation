 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <meta property="og:locale" content="en_US" />
 <meta property="og:type" content="article" />
 <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
 <!--begin::Fonts-->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
 <!--end::Fonts-->
 <!--begin::Page Vendor Stylesheets(used by this page)-->
 <link href="{{ asset('admin-assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
     type="text/css" />
     <link href={{ asset('admin-assets/plugins/custom/vis-timeline/vis-timeline.bundle.rtl.css') }}rel="stylesheet"
 <!--end::Page Vendor Stylesheets-->
 <!--begin::Global Stylesheets Bundle(used by all pages)-->
 <link href="{{ asset('admin-assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('admin-assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
     type="text/css" />

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
