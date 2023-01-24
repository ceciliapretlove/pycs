@extends('layouts.app')
@section('content')
<div class="app-main__outer">
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                  </i>
               </div>
               <div>
                    Job Order
                    <div class="page-title-subheading"> &nbsp;
                  </div>
               </div>
            </div>
            <div class="page-title-actions">
               
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th width="5%"></th>
                                <th>Job Order<br>Date</th>
                                <th>PMS Type</th>
                                <th>Equipment</th>
                                <th>Equipment<br>Info</th>
                                <th>Plate #<br>Chassis #</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($joborder as $jo)
                            <tr>
                                <td>
                                    @if($jo->status == 'Created')
                                        <span class="badge badge-dot">
                                            <i class="bg-warning"></i> Ongoing
                                        </span>
                                    @elseif($jo->status == 'Completed')
                                        <span class="badge badge-dot">
                                            <i class="bg-success"></i> Completed
                                        </span>
                                    @else
                                        <span class="badge badge-dot">
                                            <i class="bg-warning"></i> {{ $jo->status }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $jo->diagnostics_id }}
                                    <br>
                                    {{ date('M d, Y', strtotime($jo->reported_date)) }}
                                </td>
                                <td>
                                    <b>{{ $jo->pms_main }}<br>
                                    {{ $jo->pms_milestone }}</b>
                                </td>
                                <td>
                                    {{ $jo->equipment_id }}<br>
                                    {{ $jo->brand }} - {{ $jo->model }}
                                </td>
                                <td>
                                    {{ $jo->equipment_category }}<br>
                                    {{ $jo->equipment_type }}
                                </td>
                                <td>
                                    {{ strtoupper($jo->plate_number) }}<br>
                                    {{ strtoupper($jo->chassis_number) }}
                                </td>
                                <td>
                                    @if($jo->status == 'Created')
                                        <a class="btn btn-outline-info btn-sm m-1" href="/jEzzkXzhmr{{$jo->id}}zGzKkecwMn"> Update</a>
                                    @else
                                    @endif
                                        <a class="btn btn-outline-info btn-sm m-1" href="/viewJobOrder=kgTcLtGsKT{{$jo->id}}HmYYKpuQykDbTVqaWGFfPnMKncnxTmbutcMexHe"> View</a>
                                        <!-- <a class="btn btn-outline-info btn-sm m-1" href="/joborderPDF{{$jo->id}}"> PDF</a> -->
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
<script type="text/javascript" src="{{ URL::asset('/js/_jobo/job.js') }}"></script>
@endsection