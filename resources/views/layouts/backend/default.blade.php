<!doctype html>
<html lang="en">

<head>
   @include('includes.backend.head')
</head>

<body data-background-color="ligth">
   <div class="wrapper">
      <div class="main-header">
         <!-- Logo Header -->
         <div class="logo-header" data-background-color="dark2">

            <a href="#" class="logo" id="brand-logo">
               <img src="{{ asset('assets/backend/img/logo.svg') }}" alt="navbar brand" class="navbar-brand">
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
               data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon">
                  <i class="icon-menu"></i>
               </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
               <button class="btn btn-toggle toggle-sidebar toggled">
                  <i class="icon-menu"></i>
               </button>
            </div>
         </div>
         <!-- End Logo Header -->
         <!-- Navbar Header -->
         <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

            <div class="container-fluid">
               <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                  <li class="nav-item dropdown hidden-caret">
                     <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                           <img src="{{ asset('assets/backend/img/profile.jpg') }}" alt="..."
                              class="avatar-img rounded-circle">
                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                 style="display: none;">
                                 @csrf
                              </form>
                           </div>
                        </div>
                     </a>
                  </li>
               </ul>
            </div>
         </nav>
         <!-- End Navbar -->
      </div>

      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark2">
         <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
               <ul class="nav nav-primary">
                  <li class="nav-item" id="click-to-rewards">
                     <a data-toggle="collapse" class="collapsed" aria-expanded="false" href="#" role="button">
                        <i class="fas fa-money-bill"></i>
                        <p>Rewards</p>
                     </a>
                  </li>
                  <li class="nav-item" id="click-to-offers">
                     <a data-toggle="collapse" class="collapsed" aria-expanded="false" href="#" role="button">
                        <i class="fas fa-money-bill-wave"></i>
                        <p>Offers</p>
                     </a>
                  </li>
                  <li class="nav-item" id="click-to-mailchip-info">
                     <a data-toggle="collapse" class="collapsed" aria-expanded="false" href="#" role="button">
                        <i class="fas fa-envelope"></i>
                        <p>Mailchip info</p>
                     </a>
                  </li>
                  <li class="nav-item" id="click-to-users">
                     <a data-toggle="collapse" class="collapsed" aria-expanded="false" href="#" role="button">
                        <i class="fas fa-user"></i>
                        <p>Users</p>
                     </a>
                  </li>
                  <li class="nav-item" id="click-to-contact-information">
                     <a data-toggle="collapse" class="collapsed" aria-expanded="false" href="#" role="button">
                        <i class="fas fa-address-book"></i>
                        <p>Contact information</p>
                     </a>
                  </li>
                  <li class="nav-item" id="click-to-wellcome-email-information">
                     <a data-toggle="collapse" class="collapsed" aria-expanded="false" href="#" role="button">
                        <i class="fas fa-door-open"></i>
                        <p>Wellcome email information</p>
                     </a>
                  </li>
            </div>
         </div>
      </div>
      <!-- End Sidebar -->
      <div class="main-panel">
         <div class="content">
            <div class="page-inner bg-light">
               @yield('content')
            </div>
         </div>
         @include('includes.backend.footer')
      </div>

   </div>
   <!-- End Custom template -->
   </div>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>

   <!-- jQuery UI -->
   <script type="text/javascript"
      src="{{ asset('assets/backend/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
   <script type="text/javascript"
      src="{{ asset('assets/backend/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

   <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript"
      src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

   <!-- jQuery Scrollbar -->
   <script type="text/javascript"
      src="{{ asset('assets/backend/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

   <!-- Chart JS -->
   <script type="text/javascript" src="{{ asset('assets/backend/js/plugin/chart.js/chart.min.js') }}"></script>

   <!-- jQuery Sparkline -->
   <script type="text/javascript"
      src="{{ asset('assets/backend/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

   <!-- Chart Circle -->
   <script type="text/javascript" src="{{ asset('assets/backend/js/plugin/chart-circle/circles.min.js') }}"></script>

   <!-- Bootstrap Notify -->
   <script type="text/javascript"
      src="{{ asset('assets/backend/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

   <!-- Sweet Alert -->
   <script type="text/javascript" src="{{ asset('assets/backend/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('dist/clipboard.min.js') }}"></script>

   <!-- Atlantis JS -->
   <script>
      $('#click-to-rewards').click(function () {
         window.location.href = '/backend/rewards'
      })
      $('#click-to-offers').click(function () {
         window.location.href = '/backend/offers'
      })
      $('#brand-logo').click(function () {
         window.location.href = '/'
      })
      $('#click-to-mailchip-info').click(function () {
         window.location.href = '/backend/mailchip-info'
      })
      $('#click-to-users').click(function () {
         window.location.href = '/backend/users'
      })
      $('#click-to-contact-information').click(function () {
         window.location.href = '/backend/contact-information'
      })
      $('#click-to-wellcome-email-information').click(function () {
         window.location.href = '/backend/wellcome-email-information'
      })
      
   </script>
   @yield('scripts')
</body>