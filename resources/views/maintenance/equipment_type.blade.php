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
                  Equipment Type
                  <div class="page-title-subheading">Create, Update, Activate and Deactivate Equipment Type.
                  </div>
               </div>
            </div>
            <div class="page-title-actions">
               <div class="d-inline-block">
                  <button class="btn btn-outline-primary btn-fw addEquipmentTypeBtn" data-toggle="modal" data-target="#addEquipmentTypeModal">
                  <span class="btn-icon-wrapper pr-2 opacity-7">
                <i class="fa fa-plus fa-w-20"></i>
                  </span>
                     Add Equipment Type
                  </button>
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         @foreach($equipmentCategory as $equipCat)
         <div class="col-lg-3 mb-2">
            <div class="card shadow">
               <div class="card-header">
                  {{ $equipCat->type}}
               </div><!-- card header -->
               <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                     <thead class="thead-light">
                        <tr>
                           <th scope="col">Equipment Type</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach($equipmentType as $x)
                        @if($x->equipment_category == $equipCat->id)
                        <tr>
                           <td scope="row">
                              {{ $x->equipment_type }}
                              <br>
                              @if($x->status =='0')
                                 <span class="badge badge-dot mr-4 status-small">
                                    <i class="bg-success"></i> Active
                                 </span>
                              @else
                                 <span class="badge badge-dot mr-4 status-small">
                                    <i class="bg-danger"></i> Deactivated
                                 </span>
                              @endif
                           </td>
                           <td class="text-right">
                              <button class="btn btn-info btn-xs editEquipmentType " data-toggle="modal" data-target="#editEquipmentTypeModal" id="{{$x->id}}"><i class="metismenu-icon pe-7s-pen"></i> Edit</button>
                           </td>
                        </tr>
                        @endif
                     @endforeach
                  </tbody>
                  </table>
               </div><!-- table-respo -->
            </div><!-- card -->
         </div><!-- col-3 -->
         @endforeach
      </div>

   </div>
</div>
</div>
@include('maintenance._modals._addEquipmentType')
@include('maintenance._modals._editEquipmentType')
<script src="./assets/scripts/jquery.min.js"></script>
<script src="js/_ints/it.js"></script>
<script type="text/javascript" src="{{ URL::asset('/js/_maint/equipment_type.js') }}"></script>
@endsection