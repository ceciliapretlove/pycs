@extends('layouts.app')
@section('content')
<div class="app-main__outer">
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-car icon-gradient bg-happy-itmeo">
                  </i>
               </div>
               <div>
                  Equipment Category
                  <div class="page-title-subheading">Create, Update, Activate and Deactivate Equipment Category.
                  </div>
               </div>
            </div>
            <div class="page-title-actions">
               <div class="d-inline-block">
                  <button class="btn btn-outline-primary btn-fw addFleetTypeBtn" data-toggle="modal" data-target="#addEquipmentCategoryModal">
                  <span class="btn-icon-wrapper pr-2 opacity-7">
                <i class="fa fa-plus fa-w-20"></i>
                  </span>
                  Create Equipment Category
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
                     <thead class="thead-light">
                        <tr>
                           <th scope="col">Equipment Category</th>
                           <th scope="col">Has Plate #</th>
                           <th scope="col">Status</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($equipmentCategory as $x)
                        <tr>
                           <th scope="row">
                              {{ $x->type }}
                           </th>
                           <th scope="row">
                              {{ $x->plate_number }}
                           </th>
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
                                    <a class="dropdown-item editEquipmentCategory " data-toggle="modal" data-target="#editEquipmentCategoryModal" id="{{$x->id}}"><i class="metismenu-icon pe-7s-pen"></i> Edit</a>
                                    @if($x->status =='1')
                                    <a class="dropdown-item activateEquipmentCategory" id="{{$x->id}}"><i class="metismenu-icon pe-7s-check"></i> Activate</a>
                                    @else
                                    <a class="dropdown-item deactivateEquipmentCategory" id="{{$x->id}}"><i class="metismenu-icon pe-7s-close-circle"></i> Deactivate</a>  
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
@include('maintenance._modals._addEquipmentCategory')
@include('maintenance._modals._editEquipmentCategory')
<script src="./assets/scripts/jquery.min.js"></script>
<script src="js/_ints/it.js"></script>
<script type="text/javascript" src="{{ URL::asset('/js/_maint/equipment_category.js') }}"></script>
@endsection