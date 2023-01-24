<div class="app-sidebar sidebar-shadow">
   <div class="app-header__logo">
      <div class="logo-src"></div>
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
   <div class="scrollbar-sidebar">
      <div class="app-sidebar__inner">
         @auth
        
         <ul id="metismenu" class="vertical-nav-menu">
            
            <li class="app-sidebar__heading"> Account</li>
            <li>
               <a href="/change-password">
               <i class="metismenu-icon pe-7s-note"></i>
               Change Password
               </a>
            </li>
            @if(auth()->user()->role == 10)
            <li>
               <a href="/"><i class="metismenu-icon pe-7s-config"></i>
               Dashboard
               </a>
            </li>

            <li>
               <a><i class="metismenu-icon pe-7s-users"></i>
               User Management
               <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
               </a>
               <ul>
                  <li>
                     <a href="/role"><i class="metismenu-icon"></i>
                     Roles
                     </a>
                  </li>
                  </li>
                  <li>
                     <a href="/accountManagement">
                     <i class="metismenu-icon"></i>
                     Account Management
                     </a>
                  </li>
                  <li>
                     <a href="/approvalManagement">
                     <i class="metismenu-icon"></i>
                     Approval Management
                     </a>
                  </li>
               </ul>
            </li>
              @endif
               <li>
      <a><i class="metismenu-icon pe-7s-config"></i>
      Maintenance
      <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
      </a>
      <ul>
{{--          <li>
            <a href="/location"><i class="metismenu-icon pe-7s-map-marker"></i>
            Location and Destination 
            </a>
         </li>
         <li>
            <a href="/rateManagement"><i class="metismenu-icon pe-7s-graph1"></i>
            Rate
            </a>
         </li> --}}
         <li>
            <a href="/portManagement"><i class="metismenu-icon pe-7s-map-marker"></i>
            Port 
            </a>
         </li>

         <li>
            <a href="/shipperManagement"><i class="metismenu-icon pe-7s-map-marker"></i>
            Shipper
            </a>
         </li>
         <li>
            <a href="/ShippingLineManagement"><i class="metismenu-icon pe-7s-map-marker"></i>
            Shipping Line
            </a>
         </li>
         <li>
            <a href="/consigneeManagement"><i class="metismenu-icon pe-7s-users"></i>
            Consignee 
            </a>
         </li>
         <li>
            <a href="/particularManagement"><i class="metismenu-icon pe-7s-users"></i>
            Particulars 
            </a>
         </li>
         <li>
            <a href="/purposeManagement"><i class="metismenu-icon pe-7s-users"></i>
            Purpose 
            </a>
         </li>
         <li>
            <a href="/ChecktypeManagement"><i class="metismenu-icon pe-7s-users"></i>
            Check Type 
            </a>
         </li>
         <li>
            <a href="/clientManagement"><i class="metismenu-icon pe-7s-users"></i>
            Client 
            </a>
         </li>
         <li>
            <a href="/trailer-sizes"><i class="metismenu-icon pe-7s-users"></i>
            Trailer Sizes 
            </a>
         </li>
      </ul>
   </li>
 
            

          
            <!-- 21CARGO  -->
             @if(auth()->user()->role == 10 || auth()->user()->role == 6)
            <li class="app-sidebar__heading">Processing Management
            <li>
               <a href="/BillofladingManagement">
               <i class="metismenu-icon pe-7s-note"></i>
               Bill of Lading Form
               </a>
            </li>
            </li>
            @endif 

            @if(auth()->user()->role == 10 || auth()->user()->role == 5 || auth()->user()->role == 9 || auth()->user()->role == 8)
            <li class="app-sidebar__heading">Shipping Management
            <li>
               <a href="/shippingForm">
               <i class="metismenu-icon pe-7s-note"></i>
               Shipping Form
               </a>
            </li>
            </li>
            <li class="app-sidebar__heading">Processing Management
            <li>
               <a href="/processings">
               <i class="metismenu-icon pe-7s-note"></i>
               Processor Form
               </a>
            </li>
            </li>
            @endif
             @if(auth()->user()->role == 10 || auth()->user()->role == 5 || auth()->user()->role == 8)
               <li class="app-sidebar__heading">Broker Management
              
               <li>
                  <a href="/cashAdvanceForm">
                  <i class="metismenu-icon pe-7s-note"></i>
                  Cash Advance Request
                  </a>
               </li>
               <li>
                  <a href="/CheckRequestForm">
                  <i class="metismenu-icon pe-7s-note"></i>
                  Cheque Request
                  </a>
               </li>
               
               </li>
             @endif
       
         @if(auth()->user()->role == 9 || auth()->user()->role == 11)
               <li class="app-sidebar__heading">Broker Management
              
               <li>
                  <a href="/cashAdvanceForm">
                  <i class="metismenu-icon pe-7s-note"></i>
                  Cash Advance Request
                  </a>
               </li>
               <li>
                  <a href="/CheckRequestForm">
                  <i class="metismenu-icon pe-7s-note"></i>
                  Cheque Request
                  </a>
               </li>
               
               </li>
             @endif
             @if(auth()->user()->role == 10 || auth()->user()->role == 8)
            <li class="app-sidebar__heading">Liquidation Management
            <li>
               <a href="/liquidation">
               <i class="metismenu-icon pe-7s-note"></i>
               Liquidation
               </a>
            </li>
               <li>
               <a href="/summary-of-expenses">
               <i class="metismenu-icon pe-7s-note"></i>
               Summary of Expenses
               </a>
            </li>
            </li>
           @endif
             @if(auth()->user()->role == 10 || auth()->user()->role == 7)
            <li class="app-sidebar__heading">Refund Management
            <li>
               <a href="/refundManagement">
               <i class="metismenu-icon pe-7s-note"></i>
               Refund
               </a>
            </li>
            <li>
               <a href="/refundEmptyReturn">
               <i class="metismenu-icon pe-7s-note"></i>
               Empty Return
               </a>
            </li>
            </li>
            @endif

            </li>
          
         </ul>

            @endauth
      </div>
   </div>
</div>