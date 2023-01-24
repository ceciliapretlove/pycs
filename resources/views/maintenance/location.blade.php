@extends('layouts.app')
@section('content')
<div class="app-main__outer">
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-map-marker icon-gradient bg-happy-itmeo">
                  </i>
               </div>
               <div>
                  Location
                  <div class="page-title-subheading">Create and Update Location.
                  </div>
               </div>
            </div>
            <div class="page-title-actions">
               <div class="d-inline-block">
                  <button class="btn btn-outline-primary btn-fw addLocationBtn" data-toggle="modal" data-target="#addLocationModal">
                  <span class="btn-icon-wrapper pr-2 opacity-7">
                <i class="fa fa-plus fa-w-20"></i>
                  </span>
                  Create Location
                  </button>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card shadow">
               <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                     <thead class="thead-light">
                        <tr>
                           <th scope="col">Location</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($location as $x)
                        <tr>
                           <th scope="row">
                             {{ $x->location }}
                           </th>
                           <td class="text-right">
                              <div class="dropdown">
                                 <a class="btn btn-sm btn-icon-only text-blue" href="#" Location="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fas fa-ellipsis-v"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item editLocation" data-toggle="modal" data-target="#editLocationModal" id="{{$x->id}}"> <i class="metismenu-icon pe-7s-pen"></i> Edit</a>
            
                                 </div>
                              </div>
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
@include('maintenance._modals._addLocation')
@include('maintenance._modals._editLocation')
<script src="./assets/scripts/jquery.min.js"></script>
<script src="js/_ints/it.js"></script>
<script type="text/javascript" src="{{ URL::asset('/js/_maint/location.js') }}"></script>
@endsection