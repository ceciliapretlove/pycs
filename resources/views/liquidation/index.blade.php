@extends('layouts.app')
@section('content')
<div class="app-main__outer">
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-note icon-gradient bg-happy-itmeo">
                  </i>
               </div>
               <div>
                 Liquidation
                  <div class="page-title-subheading">Create and Update Liquidation.
                  </div>
               </div>
            </div>
            <div class="page-title-actions">
               <div class="d-inline-block">
                  <a href="/f2ggt8s1p4yzdk6" class="btn btn-outline-primary btn-fw add">
                  <span class="btn-icon-wrapper pr-2 opacity-7">
                  <i class="fa fa-business-time fa-w-20"></i>
                  </span>
                  Create
                  </a>
               </div>
            </div>
         </div>
      </div>

      <div class="row py-0">
         <div class="col-lg-12">
            <div class="card shadow">
  
               <div class="table-responsive">
                  <table id="dataTablewithFilter" class="table align-items-center table-flush liquidationList">
                     <thead class="thead-light">
                       <tr class="text-center">
                          <th>Date</th>
                          <th>PRO #</th>
                          <th>B/L #</th>
                          <th>CNTR #</th>
                          <th>Expense Amount</th>
                          <th>Status</th>
                          <th></th>
                       </tr>
                     </thead>

                     <tbody>
                   
                           @foreach($liquidation_list as $lq)
                        <tr class="text-center">
                           <td>
                                {{date('m/d/Y', strtotime($lq->created_at)) }}

                           </td> 
                           <td>
                              {{ $lq->pro_number }}
                           </td>
               {{--             <td>
                              {{ $lq->consignee }}
                           </td> --}}
                           <td>
                              {{ $lq->bl_number }}
                           </td>
                           <td>
                              {{ $lq->cntr_num }}
                           </td>
                           <td>
                              {{ $lq->expenses }}
                           </td>
                                                          <td>
                               
                                    <span class="badge badge-dot">
                                        <i class="bg-default"></i> Created
                                    </span><br>
                                    <small>({{ strtoupper($lq->u_lname) }}) {{ date('Y-m-d', strtotime($lq->created_at)) }} </small>
            
                            </td>
                           <td>
                             <a href="viewhWFMRtP{{$lq->id}}zVwQduE"  type="button" class="btn btn-outline-success btn-fw">
                              View
                              </a>
             {{--                  <a href="hfkit15u{{$lq->id}}59kcdav"  type="button" class="btn btn-outline-info btn-fw">
                              Edit
                              </a> --}}
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

@endsection