<div class="app-header header-shadow">
   
   <div class="app-header__logo">
      <img src="./assets/images/21cargo.png" width="100" alt="logo" class="logo-src">
<!-- <img src="./assets/images/dummy_logo.jpg" alt="logo" class="logo-src"> -->
      <div class="header__pane ml-auto">
         <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
            <span class="hamburger-box">
            <span class="hamburger-inner"></span>
            </span>
            </button>
         </div>
      </div>
   </div>
   <div class="app-header__mobile-menu">
      <div>
         <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
         <span class="hamburger-box">
         <span class="hamburger-inner"></span>
         </span>
         </button>
      </div>
   </div>
   <div class="app-header__menu">
      <span>
      <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
      <span class="btn-icon-wrapper">
      <i class="fa fa-ellipsis-v fa-w-6"></i>
      </span>
      </button>
      </span>
   </div>
   <div class="app-header__content">
      <div class="app-header-right">
         <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
               <div class="widget-content-wrapper">

                  <button class="notificationbtn" data-toggle="modal" data-target="#notificationModal">
                     <div class="widget-content-left  ml-3 header-user-info">
                        <div class="widget-heading">
                           <i class="metismenu-icon pe-7s-bell notificationBell"></i>
                           <span class="badge badge-danger badge-counter" id="notificationCount">0</span>
                        </div>
                     </div>
                  </button>
                  &nbsp;
                  <div class="widget-content-left">
                     <div class="btn-group">
                        <img width="42" class="rounded-circle" src="./assets/images/admin.png" alt="">
                     </div>
                  </div>
                  <div class="widget-content-left  ml-3 header-user-info">
                     <div class="widget-heading">
                        {{ Auth::user()->fname }}
                     </div>
                     <div class="widget-subheading">
                        {{ Auth::user()->job }}
                     </div>
                  </div>
                   <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                       <i class="fa fa-angle-down ml-2 opacity-8"></i>
                   </a>
                   <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                       <form method="POST" action="{{ route('logout') }}">
                           @csrf
                           <x-dropdown-link :href="route('logout')"
                               onclick="event.preventDefault();this.closest('form').submit();">
                           {{ __('Log out') }}
                           </x-dropdown-link>
                       </form>
                   </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@include('maintenance._modals._viewNotification')