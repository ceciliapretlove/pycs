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
             Warehouse Inventory
              <div class="page-title-subheading">Create, Update, Activate and Deactivate Spare Part / Material.
              </div>
               </div>
            </div>
            <div class="page-title-actions">
               <div class="d-inline-block">
                  <button  class="btn btn-outline-primary btn-fw addAccountBtn" data-toggle="modal" data-target="#addWarehouseModal">
                  <span class="btn-icon-wrapper pr-2 opacity-7">
                 <i class="fa fa-plus fa-w-20"></i>
                  </span>
                  Create Material
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
                            <th scope="col">ID / Serial</th>
                            <th scope="col">Item</th>
                            <th scope="col">Purchase Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Location</th>
                            <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody class="text-center">
                       @foreach($warehouse->sortBy('moving_qty') as $w)
                        <tr>
                            <td scope="row">
                                {{ $w->item_id }}
                                <br>
                                {{ $w->serial_id }}
                            </td>
                            <td scope="row">
                                {{ $w->brand }}
                                <small class="text-muted">
                                <br>{{ $w->item_name }}  ( {{ $w->conditions }} )
                                </small>
                            </td>
                            <td scope="row">
                                {{ number_format($w->purchased_price,2) }}
                                <small class="text-muted"> Php</small>
                            </td>
                            <td scope="row">
                                @if($w->moving_qty <= 3)
                                    @if($w->moving_qty == $w->qty)
                                    <span>
                                    @else
                                    <span class="text-warning">
                                    @endif
                                @else
                                <span>
                                @endif
                                {{ $w->moving_qty }} </span>/ {{ $w->qty }} 
                                <small class="text-muted"> {{ $w->unit }}</small>
                            </td>
                            <td scope="row">
                                {{ $w->location }}
                            </td>
                           <td class="text-right">
                              <div class="dropdown">
                                 <a class="btn btn-sm btn-icon-only text-blue" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item editWarehouse" data-toggle="modal" data-target="#editWarehouseModal" id="{{$w->id}}">
                                        <i class="metismenu-icon pe-7s-pen"></i>
                                        Edit
                                    </a>
                                        @if($w->status =='1')
                                            <a class="dropdown-item activateWarehouse" id="{{$w->id}}"><i class="metismenu-icon pe-7s-check"></i> Activate</a>
                                        @else
                                            <a class="dropdown-item deactivateWarehouse" id="{{$w->id}}"> <i class="metismenu-icon pe-7s-close-circle"></i> Deactivate</a>  
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
@include('maintenance._modals._addWarehouseinventory')
@include('maintenance._modals._editWarehouseinventory')
<script src="./assets/scripts/jquery.min.js"></script>
<script src="js/_ints/it.js"></script>
<script type="text/javascript" src="{{ URL::asset('/js/_maint/warehouse_inventory.js') }}"></script>
@endsection

