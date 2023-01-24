<html>
   <head>
      <title>Job Order</title>
      <style>
         footer {
         font-size: 13px;
         text-align: center;
         }
         #drivers {
         font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
         border-collapse: collapse;
         width: 100%;
         }
         #drivers td, #drivers th {
         border: 1px solid #ddd;
         }
         #drivers tr:nth-child(even){background-color: #f2f2f2;}
         #drivers tr:hover {background-color: #ddd;}
         #drivers th {
         text-align: center;
         background-color: #ffffff;
         color: black;
         }
         #drivers td {
         text-align: center;
         }
         body {
         font-size:12px;
         }
         .companyname
         {
         border: 0 0 0 0 !important; 
         text-align: left !important;
         font-size: 20px;
         color: gray;
         }
         .joborder
         {
         text-align: center !important; 
         border: 0 0 0 0 !important;
         font-size: 20px;
         color: gray;
         }
         .small
         {
         font-size: 11px;
         color: gray;
         text-transform: uppercase;
         }
      </style>
   </head>
   <body>

        @foreach($jo_main as $jo_main)
        <div class="container">
          <div class="row">
             <table id="drivers">
                <tr>
                   <td class="companyname">R.D. INTERIOR JUNIOR CONST.</td>
                   <td class="joborder">Job Order<br><span class="small">{{$jo_main->job_order_no}}</span></td>
                </tr>
             </table>
          </div>
          <div class="row" style="padding-top: 25px;  margin-top: 0px;">
             <table id="drivers">
             <tr>
                <td width="15%" style="border: 0 0 0 0; text-align: left !important;" class="small">Date:</td>
                <td style="border: 0 0 1 0; border-bottom: 1px solid">{{$jo_main->job_order_date}}</td>
                <td style="text-align: center; border: 0 0 0 0;" class="small">Job Order No.: </td>
                <td style="border: 0 0 1 0; border-bottom: 1px solid">{{$jo_main->job_order_no}}</td>
             </tr>
             </table>
            </div>
        </div>
        <div class="container">
          <div class="row" style="padding-top: 10px;  margin-top: 0px;">
             <table id="drivers">
             <tr>
                <td width="15%" style="border: 0 0 0 0; text-align: left !important;" class="small">Driver’s/Operator's/<br> User's Name:</td>
                <td style="border: 0 0 1 0; border-bottom: 1px solid">{{$jo_main->do_lname}}, {{$jo_main->do_fname}}{{$jo_main->do_mname}}</td>
                <td style="text-align: center; border: 0 0 0 0;" class="small">Equipment Name <br>and ID/Plate No. :</td>
                <td style="border: 0 0 1 0; border-bottom: 1px solid">{{$jo_main->model}} / {{$jo_main->plate_number}}</td>
             </tr>
             </table>
            </div>
        </div>
        <div class="container">
          <div class="row" style="padding-top: 10px;  margin-top: 0px;">
             <table id="drivers">
                <tr style="background: #FFFFFF">
                    <td  width="15%" style="border: 0 0 0 0; text-align: left !important;" class="small">Site/Location :</td>
                    <td style="border: 0 0 1 0; border-bottom: 1px solid; text-align: left">{{$jo_main->location}}</td>
                </tr>
             </table>
            </div>
        </div>
        <div class="container">
          <div class="row" style="padding-top: 10px;  margin-top: 0px;">
            <table class="table" id="drivers">
                <tr>
                    <td style="padding-top: 10px; padding-bottom: 10px;">
                        <span class="small">Type:</span> <b>{{$jo_main->labor_type}}</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;" class="small">
                        Problem Encountered:
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 30px; padding-bottom: 30px;">
                        <p style="text-align: center;">&nbsp;&nbsp; <b>{{$jo_main->problems_encountered}}</b></p>
                    </td>
                </tr>
            </table>
            <table class="table" id="drivers">
                <tr>
                    <td style="text-align: left; padding-top: 10px; padding-bottom: 10px;">
                        <span class="small">Inspected By: </span>
                        &nbsp;&nbsp;<b>{{$jo_main->ib_lname }}, {{$jo_main->ib_fname }} {{$jo_main->ib_mname }}</b>
                    </td>
                </tr>
            </table>
            <table class="table" id="drivers">
                <tr>
                    <td style="text-align: left;" class="small">
                        Details of Work Done:
                    </td>
                </tr>
                <tr>
                    <td  style="padding-top: 30px; padding-bottom: 30px; background: initial !important; border-top: hidden; ">
                        <p style="text-align: center;">&nbsp;&nbsp; <b>{{$jo_main->details_of_work_done}}</b></p>
                    </td>
                </tr>
             </table>
             <table class="table" id="drivers">
                <tr>
                    <td rowspan="2" style="text-align: left; padding-top: 10px; padding-bottom: 10px;">
                        <span class="small">Conducted by:</span> <b style="text-align: center;">{{$jo_main->cb_lname }}, {{$jo_main->cb_fname }} {{$jo_main->cb_mname }}</b>
                    </td>
                     <td style="text-align: left;">
                        <span class="small">Date Started:</span> <b class="text-center">{{$jo_main->labor_date_started}}</b>
                    </td>
                     <td style="text-align: left;">
                        <span class="small">Date Completed:</span> <b class="text-center">{{$jo_main->labor_date_completed}}</b>
                    </td>
                </tr>
                <tr>
                     <td style="text-align: left;">
                        <span class="small">Time Started:</span> <b class="text-center">{{$jo_main->labor_time_started}}</b>
                    </td>
                     <td style="text-align: left;">
                        <span class="small">Time Completed:</span> <b class="text-center">{{$jo_main->labor_time_completed}}</b>
                    </td>
                </tr>
            </table>
            </div>
            <div class="row" style="margin-top: 0px;">
                <table class="table" id="drivers">
                    <tr>
                        <td  style="padding-top: 5px; padding-bottom: 5px;" class="small">
                            Material/Spare Part Requirements:
                        </td>
                    </tr>
                </table>
                <table class="table" id="drivers">
                    <tr class="small">
                        <td style="text-align: center;">Spare Parts / Materials</td>
                        <td style="text-align: center;">Qty</td>
                        <td style="text-align: center;">Unit</td>
                        <td style="text-align: center;">Reference No.</td>
                        <td style="text-align: center;">Amount</td>
                    </tr>
                    @foreach($jo_item as $row)
                    <tr>
                        <td style="text-align: center;">{{$row->item_name}}</td>
                        <td style="text-align: center;">{{$row->qty}}</td>
                        <td style="text-align: center;">{{$row->unit}}</td>
                        <td style="text-align: center;">{{$row->reference_id}}</td>
                        <td style="text-align: center;">{{$row->amount}}</td>
                    </tr>
                     @endforeach
                </table>
            </div>
            <div class="row" style="margin-top: 0px; margin-top: 10px;">
                <table class="table" id="drivers">
                    <tr style="background: #f3f3f3">
                        <td class="small">
                            Trial Run / Turn-over
                        </td>
                    </tr>
                </table>
                <table class="table" id="drivers">
                    <tr>
                        <td style="text-align: left; padding-top: 10px; padding-bottom: 10px;">
                            <span class="small">Conducted By (Maintenance Personnel): </span>
                                <b>{{$jo_main->tp_lname}},{{$jo_main->tp_fname}} {{$jo_main->tp_mname}}</b>
                        </td>
                        <td style="text-align: left;">
                            <span class="small">Date :</span>
                            {{$jo_main->trial_date}}</td>
                     </tr>
                </table>
                <table class="table" id="drivers">
                    <tr>
                        <td style="text-align: left;" class="small">
                            Result:
                        </td>
                    </tr>
                    <tr>
                        <td  style="padding-top: 30px; padding-bottom: 30px; background: initial !important; border-top: hidden; ">
                            <p style="text-align: center;">&nbsp;&nbsp; <b>{{$jo_main->trial_result}}</b></p>
                        </td>
                    </tr>
                 </table>
                 <table class="table" id="drivers">
                     <tr>
                        <td style="text-align: left; padding-top: 10px; padding-bottom: 10px;">
                            <span class="small">
                                Accepted By (Operator / Driver) :
                            </span>
                            <b>{{$jo_main->ab_lname}},{{$jo_main->ab_fname}}{{$jo_main->ab_mname}}</b>
                        </td>
                        <td style="text-align: left;">
                            <span class="small">Date :</span>
                            {{$jo_main->accepted_date}}
                        </td>
                     </tr>
                     <tr>
                        <td style="text-align: left; padding-top: 10px; padding-bottom: 10px;">
                            <span class="small">Conducted By (Maintenance Head) :</span>
                            <b>{{$jo_main->nb_lname}},{{$jo_main->nb_fname}}{{$jo_main->nb_mname}}</b>
                        </td>
                        <td style="text-align: left;">
                            <span class="small">Date :</span>
                            {{$jo_main->noted_date}}
                        </td>
                     </tr>
                     <tr style="background: #FFFFFF">
                        <td style="height:18px; border: 0 0 0 0;"></td>
                     </tr>
                </table>
            </div>

        </div>
        @endforeach
   </body>
</html>


