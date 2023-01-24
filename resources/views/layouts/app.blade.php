<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="Content-Language" content="en">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="description" content="This is an example dashboard created using build-in elements and components.">
      <title>21 Cargo</title>
      <script type="text/javascript">
         var BASE_URL = '{{ url('/') }}';
         var CSRF_TOKEN = '{{ csrf_token() }}';
         var ASSETS = '{{ asset('/') }}';
      </script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <link href="./assets/css/main.css" rel="stylesheet">
      <link href="./assets/css/animate.css" rel="stylesheet">
      <link href="./assets/css/loader.css" rel="stylesheet">
      <link href="./assets/css/fontawesome.css" rel="stylesheet">
      <link href="./assets/css/hamburger.css" rel="stylesheet">
      <link rel="icon" href="favicon.ico" type="image/x-icon"/>      
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css">

      <script src="./assets/scripts/jquery.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.all.min.js"></script>
      <script src="js/_ints/it.js"></script>
      <script src="js/_ints/timeago.js" type="text/javascript"></script>
      <link href="./assets/css/override.css" rel="stylesheet">

   </head>
   <body>

      <div class="app-wrapper-footer">
         <div class="app-footer">
            <div class="app-footer__inner">
               <div class="app-footer-right">
                  
                  <ul class="nav">
                     <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                        21 Cargo
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
         @include('layouts.header')
         <div class="app-main">
            @include('layouts.sidebar')
            @yield('content')
            <div class="app-wrapper-footer">
               <div class="app-footer">
                  <div class="app-footer__inner">
                     <div class="app-footer-right">
                        <ul class="nav">
                           <li class="nav-item">
                              <a href="javascript:void(0);" class="nav-link">
                              21 Cargo, Inc. 
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>      <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.min.js"></script>
      <script src="js/_ints/gen.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@0.6.14/dist/js/perfect-scrollbar.jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sizzle/2.3.6/sizzle.min.js"></script>
      <script src="./assets/scripts/main.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
      <script type="text/javascript">
            $(document).ready( function () {
          $('#dataTablewithFilter').DataTable({
           "bLengthChange": false,
           "ordering": false
          });
      } );
      </script>
       @yield('scripts')
   </body>
</html>
