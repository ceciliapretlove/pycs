@extends('layouts.app')
@section('content')
<div class="app-main__outer">
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-users icon-gradient bg-happy-itmeo">
                  </i>
               </div>
               <div>
                  Account Management
                  <div class="page-title-subheading">Create, Update, Activate and Deactivate Account.
                  </div>
               </div>
            </div>
            <div class="page-title-actions">
               <div class="d-inline-block">
                  <button class="btn btn-outline-primary btn-fw addAccountBtn" data-toggle="modal" data-target="#addAccountModal">
                  <span class="btn-icon-wrapper pr-2 opacity-7">
                 <i class="fa fa-plus fa-w-20"></i>
                  </span>
                  Create an Account
                  </button>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card shadow">

               <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                     <thead class="thead-light text-center">
                        <tr>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Role</th>
                           <th scope="col">Approver</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody class="text-center">

                        @foreach($account as $x)
                        <tr>
                           <td scope="row">
                              {{ $x->fname }} {{ $x->lname }}
                           </td>
                           <td scope="row">
                              {{ $x->email }}
                           </td>
                           <td scope="row">
                              {{ $x->title }}
                           </td>
                           <td scope="row">
                              @if($x->approver == '1')
                                Yes
                              @else
                                No
                              @endif

                           </td>
                           @if($x->status =='0')
                           <td>            
                              <span class="badge badge-dot mr-4">
                              <i class="bg-success"></i> Active
                              </span>
                           </td>
                           @else
                           <td>
                              <span class="badge badge-dot mr-4">
                              <i class="bg-danger"></i> Deactivated
                              </span>
                           </td>
                           @endif
                           <td class="text-right">
                              <div class="dropdown">
                                 <a class="btn btn-sm btn-icon-only text-blue" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fas fa-ellipsis-v"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item editAccount" data-toggle="modal" data-target="#editAccountModal" id="{{$x->id}}"> <i class="metismenu-icon pe-7s-pen"></i>Edit</a>
                                    @if($x->status =='1')
                                    <a class="dropdown-item activateAccount" id="{{$x->id}}"><i class="metismenu-icon pe-7s-check"></i> Activate</a>
                                    @else
                                    <a class="dropdown-item deactivateAccount" id="{{$x->id}}"> <i class="metismenu-icon pe-7s-close-circle"></i> Deactivated</a>  
                                    @endif
                                 </div>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@include('maintenance._modals._addAccount')
@include('maintenance._modals._editAccount')
<script src="./assets/scripts/jquery.min.js"></script>
<script src="js/_ints/it.js"></script>
<script type="text/javascript" src="{{ URL::asset('/js/_maint/account.js') }}"></script>
@endsection