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
{{--             <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/assesment.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> February 27 - March 1</h4>
                     <span class="theme"> <strong>Theme:</strong> Positivity, Unity, Generosity</span>
                     <h5>*English &amp; Chinese Pre-Elementary &amp; Grade School Assessment Week</h5>
                     <h5>*幼稚园及小学部中英文考核周</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/assesment.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> March 2 - March 4</h4>
                     <span class="theme"> <strong>Theme:</strong> Positivity, Unity, Generosity</span>
                     <h5>*English &amp; Chinese JSHS Assessment Week </h5>
                     <h5>初中及高中部中英文考核周</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/school-starts.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> March 6</h4>
                     <span class="theme"> <strong>Theme:</strong> Humility, Cheerfulness, Honesty, Diligence</span>
                     <h5>*Start of 4th Term - Synchronous &amp; Asynchronous LAs</h5>
                     <h5>*第四学期开始 - 同步和非同步学习活动</h5>
                  </div>
               </div>
            </div> --}}
{{--             <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/holy-week-with-crosses.avif" >
                  </div>
                  <div class="events-content col-8">
                     <h4> April 6 - April 7</h4>
                     <span class="theme"> <strong>Theme:</strong> Humility, Honesty, Diligence</span>
                     <h5>**Holy Week</h5>
                     <h5> ** 复活节</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/picture-taking.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>April 17</h4>
                     <span class="theme"> <strong>Theme:</strong> Humility, Honesty, Diligence</span>
                     <h5>*Grade 10 and Grade 12 Individual and Class Picture Taking</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/picture-taking.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>April 21</h4>
                     <span class="theme"> <strong>Theme:</strong> Humility, Honesty, Diligence</span>
                     <h5>*Kindergarten and Grade 6 Individual and Class Picture Taking</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/assesment.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> April 24 - April 27 AM</h4>
                     <span class="theme"> <strong>Theme:</strong> Humility, Honesty, Diligence</span>
                     <h5>*English &amp; Chinese Assessment Week</h5>
                     <h5>*幼稚园及小学部中英文考核周</h5>
                  </div>
               </div>
            </div> --}}
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/school-starts.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> April 11 - May 31, 2023</h4>
                     {{-- <span class="theme"> <strong>Theme:</strong> Humility, Honesty, Diligence</span> --}}
                     <h5>Early Enrollment (SY2023-2024)</h5>
                     <h5>Monday - Friday | 8:00 AM - 4:00PM | ADMIN OFFICE</h5>
                  </div>
               </div>
            </div>

               <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/class_2023.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> May 22 8AM</h4>
                     <span class="theme"> <strong>Theme:</strong> Love, Joy &amp; Happiness, Gratitude</span>
                     <h5>*Pre-Elementary Moving-Up &amp; Recognition Program</h5>
                     <h5>*幼稚园结业和颁发典礼</h5>
                  </div>
               </div>
            </div>


               <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/class_2023.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> May 22 6PM</h4>
                     <span class="theme"> <strong>Theme:</strong> Love, Joy &amp; Happiness, Gratitude</span>
                     <h5>*Grade School Recognition Program </h5>
                     <h5>小学部颁发典礼</h5>
                  </div>
               </div>
            </div>


               <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/class_2023.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> May 23 8AM</h4>
                     <span class="theme"> <strong>Theme:</strong> Love, Joy &amp; Happiness, Gratitude</span>
                     <h5>*Junior-Senior High School Recognition Program </h5>
                     <h5>初中高中颁发典礼</h5>
                  </div>
               </div>
            </div>


               <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/class_2023.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> May 23 6PM</h4>
                     <span class="theme"> <strong>Theme:</strong> Love, Joy &amp; Happiness, Gratitude</span>
                     <h5>*Grade 10 Moving-Up Ceremony </h5>
                     <h5>*十年级结业典礼</h5>
                  </div>
               </div>
            </div>

                           <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/mass.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>May 24 8AM</h4>
                     <span class="theme"> <strong>Theme:</strong> Love, Joy &amp; Happiness, Gratitude</span>
                     <h5>*Grade 6 and Grade 12 Thanksgiving Mass </h5>
                     <h5>*六年级和十二年级的感恩节弥撒</h5>
                  </div>
               </div>
            </div>

                           <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/class_2023.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>May 24 6PM</h4>
                     <span class="theme"> <strong>Theme:</strong> Love, Joy &amp; Happiness, Gratitude</span>
                     <h5>*Commencement Exercises  </h5>
                     <h5>毕业典礼</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/school-starts.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>June 1 - July 28, 2023</h4>
                     {{-- <span class="theme"> <strong>Theme:</strong> Humility, Honesty, Diligence</span> --}}
                     <h5>Enrollment (SY2023-2024)</h5>
                     <h5>Monday - Friday | 8:00 AM - 4:00PM | ADMIN OFFICE</h5>
                  </div>
               </div>
            </div>

                        <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/school-starts.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>July 24, 2023</h4>
                     {{-- <span class="theme"> <strong>Theme:</strong> Humility, Honesty, Diligence</span> --}}
                     <h5>Grand Welcome Program</h5>
                     <h5>AM</h5>
                  </div>
               </div>
            </div>

                        <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/school-starts.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>July 24 - July 28, 2023</h4>
                  
                     <h5>Orientation Week (Discipline, School Programs, Clubs)</h5>
                  
                  </div>
               </div>
            </div>

                        <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/school-starts.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>July 26, 2023</h4>
                     <h5>Payment and Release of Textbooks</h5>
                  </div>
               </div>
            </div>
                                    <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/school-starts.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>July 31, 2023</h4>
                     <h5>Day 1 of Academic Activities for SY 2023-2024</h5>
                  </div>
               </div>
            </div>
{{--             <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/galleries/tba30.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> June 6 - July 22</h4>
                     <span class="theme"> <strong>Theme:</strong> Self-Discipline, Positivity, Resilience, Obedience</span>
                     <h5>*Teachers’ Congress (Trainings &amp; Workshops) &amp; Classroom/Offices Preparation</h5>
                     <h5> *教师大会（培训和研讨会） 教室/办公室准备</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
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
            <div class="single-events-card style2">
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
            <div class="single-events-card style2">
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
            <div class="single-events-card style2">
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
            <div class="single-events-card style2">
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
            <div class="single-events-card style2">
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
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/long-weekend.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4> September  29 (Thurs.)</h4>
                     <span class="theme">  <strong>Theme:</strong> Punctuality, Responsibility, Thriftiness, Self-discipline, Obedience</span>
                     <h5>*Learners’ Long Weekend</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/workshop.webp" >
                  </div>
                  <div class="events-content col-8">
                     <h4> September  29 (Thurs.)</h4>
                     <span class="theme">  <strong>Theme:</strong> Punctuality, Responsibility, Thriftiness, Self-discipline, Obedience</span>
                     <h5>*Teaching Personnel w/ SP: Revisiting and Re-alignment of Grading System</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/workshop.webp" >
                  </div>
                  <div class="events-content col-8">
                     <h4>September 30 (Friday)</h4>
                     <span class="theme">  <strong>Theme:</strong> Punctuality, Responsibility, Thriftiness, Self-discipline, Obedience</span>
                     <h5>*Teachers’ Day</h5>
                     <h5>*教师节</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/school-starts.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>October 3</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>*Start of 2nd Term - Synchronous &amp; Asynchronous LAs</h5>
                     <h5>*第二学期开始 - 同步和非同步学习活动</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/sports.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>October 3-7</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>*Departmental Mini-Sports Festival</h5>
                     <h5>*部门小型体育节</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/independence.webp" >
                  </div>
                  <div class="events-content col-8">
                     <h4>#November 4 (Fri.)</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>***Local Holiday – Cabatuan Day 当地假日</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/independence.webp" >
                  </div>
                  <div class="events-content col-8">
                     <h4>#November 30 (Wed.)</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>**Bonifacio Day 英雄日</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/classes.avif" >
                  </div>
                  <div class="events-content col-8">
                     <h4>December 5-7</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>*English &amp; Chinese Pre-Elementary and Grade School Assessment Week</h5>
                     <h5>*Regular classes for JSHS</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/party.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>December 7PM</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>*Pre-Elementary Christmas Program</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/independence.webp" >
                  </div>
                  <div class="events-content col-8">
                     <h4> #December 8 (Thurs.)</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>**Feast of the Immaculate Conception 圣母玛利亚节m</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/assesment.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>December 9, 12-13</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>*English &amp; Chinese JSHS Assessment Week 初中及高中部中英文考核周</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/checking.avif" >
                  </div>
                  <div class="events-content col-8">
                     <h4>December 12-13</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>*Grade School Review &amp; Re-checking of Test Papers</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/party.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>December 14</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>*Grade School Classroom-Based Christmas Program (AM only)</h5>
                     <h5>*JSHS Review and Re-checking of test papers (whole day)</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/party.jpg" >
                  </div>
                  <div class="events-content col-8">
                     <h4>December 15</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>*AM Learners’ Classroom-Based Christmas Program; PM: Teachers’ Program</h5>
                  </div>
               </div>
            </div>
            <div class="single-events-card style2">
               <div class="row">
                  <div class="events-image col-4">
                     <img src="assets/images/events/holiday.avif" >
                  </div>
                  <div class="events-content col-8">
                     <h4>#December 16</h4>
                     <span class="theme">  <strong>Theme:</strong> Respect, Trustworthiness, Resilience, Patriotism, Will Power</span>
                     <h5>**Start of Semestral &amp; Christmas Break 学期/圣诞假期开始</h5>
                  </div>
               </div>
            </div> --}}
         </div>
         <div class="col-lg-3">
            <div class="acdemics-right-content">
               <div class="serch-content">
                  <h3>Search</h3>
                  <div class="form-group">
                     <input type="text" class="form-control" placeholder="Search Event" fdprocessedid="8x0dje">
                     <button type="submit" class="src-btn" fdprocessedid="y1omhp">
                     <i class="flaticon-search"></i>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection