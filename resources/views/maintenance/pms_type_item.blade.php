@extends('layouts.app')
@section('content')
<div class="app-main__outer">
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
               </div>
               <div>
                 PMS Type
               </div>
            </div><!-- page heading -->
         </div><!-- title wrapper -->
      </div><!-- page title -->
      <div class="row">
         <div class="col-lg-12">
            <div class="card shadow">
               <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                     <thead class="thead-light">
                            <tr>
                               <th scope="col" class="text-center">PMS Type: <b><u>{{ $pms[0]->pms_milestone }}</u>  {{ ucwords($pms[0]->pms_main) }} Maintenance</b></th>
                            </tr>
                         </thead>
                    </table>
                    <table class="mb-0 table text-center list" id="table1">
                         <thead class="thead-light text-center">
                            <tr>
                                <th>ID - Serial</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th></th>
                            </tr>
                        </thead>

                        @forelse($pms_item as $item)
                        <tr>
                            <td>
                                <small>({{ $item->item_id }} - {{ $item->serial_id}})</small>
                            </td>
                            <td>
                                {{ $item->item_name }}
                            </td>
                            <td>
                                x {{ $item->amount }}
                            </td>
                            <td>
                                <!-- <button class="btn btn-outline-info btn-sm m-1 editPmsItem" data-toggle="modal" data-target="#editPMSItemModal" type="button" id="{{ $item->id }}"><i class="fa fa-pen fa-sm"></i></button> -->
                                <button class="btn btn-outline-danger btn-sm m-1 deletePmsItem" type="button" id="{{ $item->id }}"><i class="fa fa-times fa-sm"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="4">-- No items registered --</td>
                        </tr>
                        @endforelse
                    </table>

               <form action="/wpgM9FWzB6gCpVNB" method="post">
               {{csrf_field()}}
               {{ method_field('POST') }}
                  <input type="hidden" name="pms_id" id="pms_id" readonly="" required="" value="{{ $id }}">
                  <div class="table-responsive">
                     <table class="table text-center table-sm" id="participantTable">
                         <thead class="thead-light text-center">
                             <tr class="text-center">
                              <th>Additional Item</th>
                              <th>Qty</th>
                              <th>Remarks</th>
                              <th></th>
                             </tr>
                         </thead>
                        <tr class="participantRow">
                           <td>
                              <select class="form-control" id="warehouse_item" name="warehouse_item[]" required="">
                                 <option value="">Select One</option>
                                  @foreach($warehouse->sortBy('item_name') as $warehouse)
                                        <option value="{{ $warehouse->id }}">[{{ ucwords($warehouse->brand) }}] {{ ucwords($warehouse->item_name) }}</option>
                                    @endforeach
                                </select>
              
                              </select>
                           </td>
                           <td>
                              <input type="number" class="amountClear form-control" min="1" id="amount" name="amount[]" step="any" required="">
                           </td>
                           <td>
                              <input type="text" class="form-control" id="remarks" name="remarks[]">
                           </td>
                           <td>
                              <center>
                                 <button class="btn btn-danger btn-sm m-1 remove" type="button"><i class="fa fa-times fa-sm"></i></button>
                              </center>
                           </td>
                         </tr>
                         <tfoot>
                         <tr id="addButtonRow">
                             <td colspan="4">
                               <center>
                                 <button class="btn btn-info btn-rounded btn-xs add" type="button"> Add Row </button>
                               </center>
                             </td>
                         </tr>
                         </tfoot>
                     </table>
                  </div>
                  <div class="row">
                     <div class="offset-md-4 col-md-4">
                        <button type="submit" class="btn btn-info btn-block btn-sm ladda-button basic-ladda-button">
                           <b>Save PMS Requirements</b>
                        </button>
                     </div>
                  </div>
               </form>
               
               </div><!-- card body -->
            </div><!-- maincard -->
         </div><!-- col-12 -->
      </div><!-- row -->
</div>
</div>
</div>

<script src="./assets/scripts/jquery.min.js"></script>
<script src="js/_ints/it.js"></script>
<script type="text/javascript" src="{{ URL::asset('/js/_maint/pmstype.js') }}"></script>
@endsection