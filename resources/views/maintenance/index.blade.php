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
                              Document Information
                              <div class="page-title-subheading">Lorem ipsum dolor sit amet.
                              </div>
                           </div>
                        </div>
                        <div class="page-title-actions">
                           <div class="d-inline-block">
                              <button class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#addDocumentinfoModal">
                              <span class="btn-icon-wrapper pr-2 opacity-7">
                              <i class="fa fa-business-time fa-w-20"></i>
                              </span>
                              Create
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="main-card mb-3 card">
                           <div class="card-body">
                              <h5 class="card-title">Table responsive</h5>
                              <div class="table-responsive">
                                 <table class="mb-0 table" id="table1">
                                    <thead class="thead-light text-center">
                                       <tr>
                                          <th scope="col">Code</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Description</th>
                                          <th scope="col"></th>
                                       </tr>
                                    </thead>
                                    <tbody class="list text-center">
                                      @foreach($doc as $doc)
                                        <tr>
                                         <td scope="row">
                                             {{ $doc->code }}
                                         </td>
                                         <td scope="row">
                                             {{ $doc->name }}
                                         </td>
                                         <td scope="row">
                                             {{ $doc->description }}
                                         </td>
                                         <td class="text-right">
                                          <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                              <a class="dropdown-item editDocumentinfo"  id="{{ $doc->id }}"  data-toggle="modal" data-target="#editDocumentinfoModal">Edit</a>
                                            </div>
                                          </div>
                                        </td>
                                     {{--  <td class="text-right">
                                        <div class="dropdown">
                                          <a type="button" href="/editdocumentinfo-{{$doc->id}}" class="editDocumentinfo" 
                                          data-toggle="modal" 
                                          data-target="#editDocumentinfoModal">Edit</a>
                                          </div>
                                         </td> --}}
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
@endsection
@include('maintenance._modals._addDocumentinformation')
@include('maintenance._modals._editDocumentinformation')
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('/js/_maint/documentinfo.js') }}"></script>
<script type="text/javascript">
   $(document).ready(function () {
   $('#table1').DataTable();
   $('.dataTables_length').addClass('bs-select');
   });
</script>
@stop

