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
                  Purpose Management
                  <div class="page-title-subheading">Create, Update, Activate and Deactivate Purpose.
                  </div>
               </div>
            </div>
            <div class="page-title-actions">
               <div class="d-inline-block">
                  <button class="btn btn-outline-primary btn-fw addPurposeBtn" data-toggle="modal" data-target="#addPurposeModal">
                  <span class="btn-icon-wrapper pr-2 opacity-7">
                 <i class="fa fa-plus fa-w-20"></i>
                  </span>
                  Create Purpose
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
                           <th scope="col">Id</th>
                           <th scope="col">Code</th>
                           <th scope="col">Description</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody class="text-center">
                    @foreach($purpose as $x)
                        <tr>
                            <td scope="row">
                              {{ $x->id }}
                           </td>
                           <td scope="row">
                              {{ $x->code }}
                           </td>
                           <td scope="row">
                              {{ $x->name }}
                           </td>

                           <td class="text-right">
                              <div class="dropdown">
                                 <a class="btn btn-sm btn-icon-only text-blue" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fas fa-ellipsis-v"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item editPurpose" data-toggle="modal" data-target="#editPurposeModal" id="{{$x->id}}"> <i class="metismenu-icon pe-7s-pen"></i>Edit</a>
               
                                 </div>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@include('maintenance._modals._addPurpose')
@include('maintenance._modals._editPurpose')
<script src="./assets/scripts/jquery.min.js"></script>
<script src="js/_ints/it.js"></script>
<script type="text/javascript" src="{{ URL::asset('/js/_maint/purpose.js') }}"></script>
@endsection