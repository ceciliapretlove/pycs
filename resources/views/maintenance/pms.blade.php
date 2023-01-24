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
                  PMS Type
                  <div class="page-title-subheading">Create and Update PMS Type.
                  </div>
               </div>
            </div>
            <div class="page-title-actions">
               <div class="d-inline-block">
                  <button class="btn btn-outline-primary btn-fw addFleetTypeBtn" data-toggle="modal" data-target="#addPMSModal">
                  <span class="btn-icon-wrapper pr-2 opacity-7">
                  <i class="fa fa-plus fa-w-20"></i>
                  </span>
                  Create PMS
                  </button>
               </div>
            </div>
         </div>
      </div>

      <div class="row">

         <div class="col-lg-4">
            <div class="card shadow">
               <div class="card-header card-info">
                  Per Hour
               </div>
               <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                     <thead class="thead-light text-center">
                        <tr>
                           <th scope="col">Milestone</th>
                           <th scope="col">Item</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     @foreach($ph as $rowph)
                     <tr class="text-center">
                        <td scope="row">
                           {{ $rowph->pms_milestone }} hrs
                        </td>
                        <td scope="row">
                           <ul class="text-left">
                              @foreach($pms_item as $item)
                                 @if($item->pms_id == $rowph->id)
                                    <li><small>({{ $item->item_id }})</small> {{ $item->item_name }} x {{ $item->amount }}</li>
                                 @else
                                 @endif
                              @endforeach
                           </ul>   
                        </td>
                        <td class="text-right">
                            <a title="add/update preset item" class="mb-2 mr-2 btn-sm btn table-btn-blue" href="/tGmxFuqkUTAWJBra{{$rowph->id}}pmsPresetItem">
                              Item
                              </a>
                        </td>
                     </tr>
                     @endforeach
                  </table>
               </div>
            </div>
         </div>

         <div class="col-lg-4">
            <div class="card shadow">
               <div class="card-header card-info">
                  Per KM
               </div>
               <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                     <thead class="thead-light text-center">
                        <tr>
                           <th scope="col">Milestone</th>
                           <th scope="col">Item</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     @foreach($pkm as $rowpkm)
                     <tr class="text-center">
                        <td scope="row">
                           {{ $rowpkm->pms_milestone }} kms
                        </td>
                        <td scope="row">
                           <ul class="text-left">
                              @foreach($pms_item as $item)
                                 @if($item->pms_id == $rowpkm->id)
                                    <li><small>({{ $item->item_id }})</small> {{ $item->item_name }} x {{ $item->amount }}</li>
                                 @else
                                 @endif
                              @endforeach
                           </ul>   
                        </td>
                        <td class="text-right">
                            <a title="add/update preset item" class="mb-2 mr-2 btn-sm btn table-btn-blue" href="/tGmxFuqkUTAWJBra{{$rowpkm->id}}pmsPresetItem">
                              Item
                              </a>
                        </td>
                     </tr>
                     @endforeach
                  </table>
               </div>
            </div>
         </div>

         <div class="col-lg-4">
            <div class="card shadow">
               <div class="card-header card-info">
                  Specific Date
               </div>
               <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                     <thead class="thead-light text-center">
                        <tr>
                           <th scope="col">Milestone</th>
                           <th scope="col">Item</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     @foreach($sd as $rowsd)
                     <tr class="text-center">
                        <td scope="row">
                           {{ date('M d, Y', strtotime($rowsd->pms_milestone)) }}
                        </td>
                        <td scope="row">
                           <ul class="text-left">
                              @foreach($pms_item as $item)
                                 @if($item->pms_id == $rowsd->id)
                                    <li><small>({{ $item->item_id }})</small> {{ $item->item_name }} x {{ $item->amount }}</li>
                                 @else
                                 @endif
                              @endforeach
                           </ul>   
                        </td>
                        <td class="text-right">
                         <a title="add/update preset item" class="mb-2 mr-2 btn-sm btn table-btn-blue" href="/tGmxFuqkUTAWJBra{{$rowsd->id}}pmsPresetItem">
                           Item
                           </a>
                        </td>
                     </tr>
                     @endforeach
                  </table>
               </div>
            </div>
         </div>

      </div><!-- row -->

   </div>
</div>
</div>
@include('maintenance._modals._addPmstype')
@include('maintenance._modals._editPmstype')
<script src="./assets/scripts/jquery.min.js"></script>
<script src="js/_ints/it.js"></script>
<script type="text/javascript" src="{{ URL::asset('/js/_maint/pmstype.js') }}"></script>
@endsection