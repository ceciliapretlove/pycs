@extends('layouts.webapp')
@section('content')
<div class="page-banner-area bg-2">
   <div class="container">
      <div class="page-banner-content">
         <h1>School Events (SY2022-2023)</h1>
         <small class="text-white">NOTE: *Parents and learners will be properly informed in the event there are unavoidable adjustments in the school
         calendar. 注意：*如果校历有不可避免的调整，将适当通知家长和学员。</small>
      </div>
   </div>
</div>
<div class="events-area pt-100 pb-70">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-9 col-md-6">
            <div class="single-events-card style-4">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/workshop.webp" >
                  </div>
                  <div class="events-content col-8">
                     <h4> June 6 - July 22</h4>
                     <span class="theme"> <strong>Theme:</strong> Self-Discipline, Positivity, Resilience, Obedience</span>
                     <h5>*Teachers’ Congress (Trainings &amp; Workshops) &amp; Classroom/Offices Preparation</h5>
                     <h5> *教师大会（培训和研讨会） 教室/办公室准备</h5>
                  </div>
               </div>
            </div>

                        <div class="single-events-card style-4">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/independence.webp" >
                  </div>
                  <div class="events-content col-8">
                     <h4>June 12 (Sunday)</h4>
                     <span class="theme"> <strong>Theme:</strong> Self-Discipline, Positivity, Resilience, Obedience</span>
                     <h5>**Independence Day</h5>
                     <h5>**独立日</h5>
                  </div>
               </div>
            </div>

                        <div class="single-events-card style-4">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/new_learners.jpeg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> July 26 - July 30</h4>
                     <span class="theme"> <strong>Theme:</strong> Self-Discipline, Positivity, Resilience, Obedience</span>
                     <h5>*Open House and Orientation for New Learners</h5>
                     <h5>*开放日和新学员介绍会</h5>
                  </div>
               </div>
            </div>

                        <div class="single-events-card style-4">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/school-starts.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> August 1</h4>
                     <span class="theme"> <strong>Theme:</strong> Punctuality, Responsibility, Thriftiness, Self-discipline, Obedience</span>
                     <h5>*Start of 1st Term – Synchronous &amp; Asynchronous LAs</h5>
                     <h5>*第一学期开始 - 同步和非同步学习活动</h5>
                  </div>
               </div>
            </div>



                        <div class="single-events-card style-4">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/assesment.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> September 19-23</h4>
                     <span class="theme">  <strong>Theme:</strong> Punctuality, Responsibility, Thriftiness, Self-discipline, Obedience</span>
                     <h5>*Chinese Assessment Week </h5>
                     <h5>*考核周</h5>
                
                  </div>
               </div>
            </div>


                        <div class="single-events-card style-4">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/assesment.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> September 26-28</h4>
                     <span class="theme">  <strong>Theme:</strong> Punctuality, Responsibility, Thriftiness, Self-discipline, Obedience</span>
                     <h5>*English Assessment Week </h5>
                     <h5>*考核周</h5>
                
                  </div>
               </div>
            </div>
                        <div class="single-events-card style-4">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/heroesday.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> August 29 (Mon.)</h4>
                       <span class="theme">  <strong>Theme:</strong> Punctuality, Responsibility, Thriftiness, Self-discipline, Obedience</span>
                     <h5>**National Heroes’ Day</h5>
                     <h5> **国家英雄日</h5>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="acdemics-right-content">
               <div class="serch-content">
                  <h3>Search</h3>
                  <div class="form-group">
                     <input type="text" class="form-control" placeholder="Find Your Course" fdprocessedid="8x0dje">
                     <button type="submit" class="src-btn" fdprocessedid="y1omhp">
                     <i class="flaticon-search"></i>
                     </button>
                  </div>
               </div>
               <div class="location-type">
                  <h3>Event Type</h3>
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                     On Campus
                     </label>
                  </div>
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
                     <label class="form-check-label" for="flexCheckChecked">
                     Online
                     </label>
                  </div>
               </div>
               <div class="program-level">
                  <h3>Program Level</h3>
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                     <label class="form-check-label" for="flexCheckDefault2">
                     Graduate
                     </label>
                  </div>
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" checked="">
                     <label class="form-check-label" for="flexCheckChecked1">
                     Undergraduate
                     </label>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection