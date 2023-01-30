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
                  Dashboard
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
               <div class="inner">
                  <h3> {{ number_format($total_container_deposit, 2) }} </h3>
                  <p>Total of Container Deposit</p>
               </div>
               <div class="icon">
                  <i class="fa fa-money-bill" aria-hidden="true"></i>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
               <div class="inner">
                  <h3>{{ number_format($total_deduction, 2) }}</h3>
                  <p>Total Deduction</p>
               </div>
               <div class="icon">
                  <i class="fa fa-minus" aria-hidden="true"></i>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
               <div class="inner">
                  <h3> {{ number_format($total_refund, 2) }} </h3>
                  <p>Total For Refund</p>
               </div>
               <div class="icon">
                  <i class="fa fa-redo" aria-hidden="true"></i>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-blue">
               <div class="inner">
                  <h3>{{ number_format($total_refunded, 2) }}</h3>
                  <p>Total Refunded</p>
               </div>
               <div class="icon">
                  <i class="fa fa-redo"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-lg-12">
               <div class="card shadow">
                  <div class="card-body">
                  <h4 class="card-title mb-2">Liquidation Graph <small>( {{ date('Y') }} )</small></h4>
               </div>
               <div class="card-body">
                  <div class="card-body text-center">
                     <div class="card-content">
                        <canvas height="80" id="graph">
                        </canvas>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

{{--       <div class="row py-0">
         <div class="col-lg-6">
            <div class="card shadow">
               <div class="card-body">
                  <h5 class="card-title">Liquidated</h5>
                  <div class="table-responsive">
                     
                     <table class="table align-items-center table-flush refundList">
                        <thead class="thead-light">
                           <tr class="text-center">
                           	<th>Date</th>
                              <th>PRO #</th>
                              <th>Processor</th>
                     
                              <th>Amount</th>
                           </tr>
                        </thead>
                        <tbody class="liquidatedList">
                  
                           @foreach($liquidated as $lq)
                           <tr class="text-center">
                              <td>{{ date('m/d/Y', strtotime($lq->date)) }}</td>
                              <td>{{ $lq->pro_number}}</td>
                              <td>{{ $lq->u_fname }} {{ $lq->u_lname }}</td>
                    
                              <td>
                                {{ number_format($lq->requested_amount ?? 0 , 2) }} 
                                {{ number_format($lq->grand_amount ?? 0 ,2) }} 
                           </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="card shadow">
               <div class="card-body">
                  <h5 class="card-title">Unliquidated</h5>
                  <div class="table-responsive">
                     <table class="table align-items-center table-flush refundList">
                        <thead class="thead-light">
                           <tr class="text-center">
                           	<th>Date</th>
                              <th>PRO #</th>
                              <th>Processor</th>
                              <th>PVC/Check #</th>
                              <th>Amount</th>
                           </tr>
                        </thead>
                        <tbody class="UnliquidatedList">
                           @foreach($Unliquidated as $lq)
                           <tr class="text-center">
                              <td>{{ date('m/d/Y', strtotime($lq->date)) }}</td>
                              <td>{{ $lq->pro_number}}</td>
                              <td>{{ $lq->u_fname }} {{ $lq->u_lname }}</td>
                              <td></td>
                           
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div> --}}
   </div>
</div>
</div>

<script src="../assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>
<script type="text/javascript">
   $(document).ready(function(e) {
        var ctx = document.getElementById("graph").getContext('2d');
        $.ajax({
            url: '/dashboard/liquidatedGraph',
            type: "GET",
            success: function(response) {
                if (response != '') {
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: response,
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                        beginAtZero: true
                                    }
                                }],
                         
                            }
                        }
                    });
                }
            },
        })
    });
</script>
@endsection