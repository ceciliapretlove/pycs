<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

      <title>Liquidation Form</title>
      <style type="text/css">
          @font-face {
           font-family: 'saxmono';
           font-style: normal;
          font-weight: normal;
           src: local('saxmono'), url(assets/fonts/saxmono.ttf) format('truetype');
         }
        html, body{
            font-family: saxmono;
         font-size: 13px;
         padding:10px 15px;
         margin:10px 15px;
         
         }
         .float-right{
         float: right;
         }
         .table th,
         .table td{
            padding:0px 4px!important;
            margin:0px;
            font-weight:normal;   
         }
         .table td span{
                font-family: saxmono;
             

         }
         table.particulars,  table.particulars th,  table.particulars td {
         border: 1px solid black;
         border-collapse: collapse;
         padding: 3px;
          font-weight: normal;
         }
         span.container_num:after {
            content: ' /';
         }
/*        span.container_num:after:last-child { 
         content: ' '!important; 
         }*/
      </style>
   </head>
   <body>
      <div class="row">
         <table width="100%">
            <tr>
               
               <td width="60%" class="text-center px-0">
                  <p class="m-0" style="letter-spacing: 1px; font-size: 20px;"> 21 CARGO INC.</p>
                  <p style="font-size:9px">FUBC Building Room 509 & 513, Escolta St., Binondo Manila</p>
               </td>
            </tr>
         </table>
      </div>
      <div class="container-fluid">
         <div class="row">
{{--        {{dd($fetch_liquidationDetails)}} --}}
            @foreach ($fetch_liquidationDetails as $row)
          
            <table width="100%" >
               <tr>
                  <td colspan="2" class="text-right mt-3 mb-3" style="font-size: 15px;">
                     <p>LIQUIDATION #: <span style="font-size:16px;">{{$row->liquidation_num}}</span></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p>PRO #: {{$row->pro_number}}</p>
                  </td>
                  <td>
                     <p>DATE: {{date('m/d/Y', strtotime($row->created_at)) }}</p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p>CONSIGNEE: {{$row->consignee}}</p>
                  </td>
                  <td>
                     <p>CNTR NO.: 
                        @foreach($row->cntr as $cntrs)
                        <span class="container_num">{{$cntrs->container_number}}</span>
                        @endforeach
                        
                     </p>
                  </td>
               </tr>
               <tr>
                  <td colspan="2">
                     <p>BL NO.: {{$row->bl_number}}</p>
                  </td>
               </tr>
            </table>
         </div>
         <div class="row">
            <table style="width:100%" class="particulars">
               <tr class="text-center">
                  <th>PARTICULARS</th>
                  <th>OR NO.</th>
                  <th>AMOUNT</th>
               </tr>
               @foreach($row->liquidation_particulars as $row2)

               <tr>
                  @if($row2->particular_id == 26)
                  <td> {{$row2->other}}</td>
                   @else
                  <td class="text-center"> {{$row2->particular}}</td>
                  @endif
                  <td class="text-center">{{$row2->or_num}}</td>
                  @if($row2->paid == 1)
                  <td style="text-align: center;"> Paid by client</td>
                   @else
                  <td style="text-align: right;">{{number_format($row2->amount, 2, '.', ',')}}</td>
                  @endif
                  
               </tr>
               @endforeach

            </table>
         </div>
            <div class="row">
            <table style="width:100%" class="mt-3 mx-2">
               <tr>
                  <td width="60%"></td>
                  <td width="20%"><p>Total Cash Advance:</p></td>
                  <td width="10%" style="text-align: right;"><span style="font-size:15px;">{{number_format($row->cash_advance_amount, 2, '.', ',')}}</span></td>
               </tr>
                  <tr>
                  <td></td>
                  <td><p>Total Expenses:</p></td>
                  <td style="text-align: right;"><span style="font-size:15px;">{{number_format($row->expenses, 2, '.', ',')}}</span></td>
               </tr>
                  <tr>
                  <td></td>
                  <td><p>Total Return:</p></td>
                  <td style="text-align: right;"><span style="font-size:15px;">{{$row->cash_return}}</span></td>
               </tr>
                   <tr>
                  <td></td>
                  <td><p>Total Refund:</p></td>
                  <td style="text-align: right;"><span style="font-size:15px;">{{$row->cash_refund}}</span></td>
               </tr>
            </table>
         </div>
      </div>
      @endforeach
   </body>
</html>
