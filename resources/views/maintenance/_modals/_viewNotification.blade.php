<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificationModalLabel">Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              
              <table class="table align-items-center table-flush table-borderless mb-3">
                <thead>
                  <tr>
                    <th>NEW</th>
                  </tr>
                </thead>
                <tbody id="notificationTable"></tbody>
              </table>

              <table class="table align-items-center table-flush table-borderless">
                <thead>
                  <tr class="border-top">
                    <th>PREVIOUS (recent 7)</th>
                  </tr>
                </thead>
                <tbody id="oldNotificationTable"></tbody>
              </table>

            </div><!-- table respo -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- body -->
    </div>
  </div>
</div>