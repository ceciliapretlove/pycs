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
                  Account
               </div>
            </div>
         </div>
      </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-6 align-self-center">
            <div class="card">
                <div class="card-header">Change Password</div>
                               @if(\Session::has('message'))
                        <script type="text/javascript">
                            $( document ).ready(function() {
                                swal("Error!", "{{ \Session::get('message') }}", "danger");
                            });

                        </script>
                        @endif
                <div class="card-body">
                    <form method="POST" id="changePassword">
                        @csrf 
   
                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
   
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
</div>
@section('scripts')
<script type="text/javascript">
    
$("#changePassword").on('submit', function(e)
{
    // $('#submitBtn').attr('disabled', 'disabled');
    $('.modal-message').html('');
    $('.error-message').html(""); //reset messages
    $('.form-group').removeClass('has-error');
    var post_data = $('#changePassword').serialize();
    simPost(post_data, 'POST', '/change-password', changePasswordResponse,errorResponse); 
    e.preventDefault();
    return false;
});


function changePasswordResponse(x) {
    if(x == true){

Swal.fire({
      imageUrl: './assets/images/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Password Changed Successfully',
      showConfirmButton: false,
      timer: 1500
    })
       setTimeout(function(){
         window.location.href = "/logout";
      }, 2000);
    }else{
      Swal.fire({
      imageUrl: './assets/images/error.jpg',
      imageHeight: 250,
      title: 'Oops Sorry!',
      text: 'Please double check the required fields',
      showConfirmButton: false,
      timer: 1500
    })
    }
}
function errorResponse(eventObj) {
    let temp = ''

    if (eventObj.responseJSON.errors.new_confirm_password) {
        temp += eventObj.responseJSON.errors.new_confirm_password + '\n'
    }

    Swal.fire({
        imageUrl: './assets/images/error.jpg',
        imageHeight: 250,
        title: 'FAILED!',
        text: temp,
        showConfirmButton: false,
        timer: 2000
    })
}
</script>
@stop
@endsection

