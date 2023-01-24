<div class="modal fade" id="breakdownItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <small><b>Breakdown Item</b></small>
         </div>
         <form id="breakdownItemForm" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}
            <div class="modal-body">
               <input type="hidden" name="id" id="liq_particular_default"> 
               <input type="hidden" class="liquidation_breakdown_type_default" id="liquidation_breakdown_type_default">  
           
              <div class="row">
                        <div class="col-md-12">                      
                       <table class="table text-center table-sm" id="breakdownItemTable">
                         <thead class="thead-light text-center">
                             <tr class="text-center">
                              <th>Item</th>
                               <th>Amount</th>
                              <th></th>
                             </tr>
                         </thead>


                         <tbody></tbody>

                           <tfoot>
                               <tr id="addButtonRow">
                                   <td colspan="4">
                                     <center>
                                       <button class="btn btn-info btn-rounded btn-xs add" type="button" onclick="breakdownItemRow(this,'add')"> Add Row </button>

                                     </center>
                                   </td>
                               </tr>
                           </tfoot>
                     </table>

             

                      </div>

                     </div>
            </div>
            <div class="modal-footer">
               <!-- <button class="btn btn-default" data-dismiss="modal">Close</button> -->
               <button class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal"><i class="fa fa-times fa-w-20"></i> Close</button>
               <button type="submit" class="btn btn-outline-success btn-sm ladda-button basic-ladda-button" data-dismiss="modal"><i class="fa fa-save fa-w-20"></i> Save</button>
            </div>
         </form>

         <table style="display: none">
             <tbody>
               <tr class="breakdownItemRowReadonly">
                  
                  <td >
                     <input type="text" class="form-control item" id="item" name="item[]" required>
                     <input type="hidden" class="form-control liquidation_breakdown_type" id="liquidation_breakdown_type" name="liquidation_breakdown_type[]">     
                     <input type="hidden" class="form-control liq_particular" id="liq_particular" name="liq_particular[]">     
                     <input type="hidden" class="form-control breakdown_id" id="breakdown_id" name="breakdown_id[]">     
                  </td>
                  <td >
                     <input type="text" class="form-control amount" id="amount" name="amount[]" required>
                  </td>
                  <td width="10%">
                     <center>
                        <button class="btn btn-danger btn-sm m-1 remove" type="button" onclick="breakdownItemRow(this,'remove')"><i class="fa fa-times fa-sm"></i></button>
                     </center>
                  </td>
                </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>