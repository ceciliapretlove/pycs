
@extends('layouts.webapp')
@section('content')
<div class="page-banner-area bg-2">
   <div class="container">
      <div class="page-banner-content">
         <h1>Galleries</h1>
      </div>
   </div>
</div>
<div class="events-area pt-100 pb-70">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-4 col-md-6">
            <div class="single-events-card style-4">
               <div class="events-image">
                  <a href="/visitation-of-the-head-consul--mr-ren-faqiang">
                     <img src="assets/images/galleries/consul4.jpg" alt="Image">
                  </a>
                  
                  <div class="date">
                  <span>Feb 14, 2023</span>

                  </div>
               </div>
               <div class="events-content">
                  <a href="/visitation-of-the-head-consul--mr-ren-faqiang">
                     <h3>Visitation of the Head Consul- Mr. Ren Faqiang</h3>
                  </a>
               </div>
            </div>
         </div>
                  <div class="col-lg-4 col-md-6">
            <div class="single-events-card style-4">
               <div class="events-image">
                  <a href="/chinese-new-year-celebration"><img src="assets/images/galleries/7.jpg" alt="Image">
                                    <div class="date">
                  <span>Jan 20, 2023</span>

                  </div></a>
               </div>
               <div class="events-content">
                  <a href="/chinese-new-year-celebration">
                     <h3>Chinese New Year Celebration</h3>
                  </a>
               </div>
            </div>
         </div>


                  <div class="col-lg-4 col-md-6">
            <div class="single-events-card style-4">
               <div class="events-image">
                  <a href="/culminating-activities"><img src="assets/images/galleries/consul4.jpg" alt="Image">
                                    <div class="date">
                  <span>SY 2021-2022</span>

                  </div></a>
               </div>
               <div class="events-content">
                  <a href="/culminating-activities">
                     <h3>Culminating Activities</h3>
                  </a>
               </div>
            </div>
         </div>

                           <div class="col-lg-4 col-md-6">
            <div class="single-events-card style-4">
               <div class="events-image">
                  <a href="/2022-christmas-party-program"><img src="assets/images/galleries/yep4.jpg" alt="Image">
                                    <div class="date">
                  <span>Dec 15, 2022</span>

                  </div></a>
               </div>
               <div class="events-content">
                  <a href="/2022-christmas-party-program">
                     <h3>2022 Christmas Party Program</h3>
                  </a>
               </div>
            </div>
         </div>
                  <div class="col-lg-4 col-md-6">
            <div class="single-events-card style-4">
               <div class="events-image">
                  <a href="/pycs-intramurals"><img src="assets/images/galleries/pycsi1.jpg" alt="Image">
                 <div class="date">
                  <span>Oct 24 - 28, 2022</span>

                  </div>
               </a>
               </div>
               <div class="events-content">
                  <a href="/pycs-intramurals">
                     <h3>PYCS Intramurals</h3>
                  </a>
               </div>
            </div>
         </div>
                  <div class="col-lg-4 col-md-6">
            <div class="single-events-card style-4">
               <div class="events-image">
                  <a href="/75th-founding-anniversary"><img src="assets/images/galleries/fa2.jpg" alt="Image">
                                    <div class="date">
                  <span>Dec 20, 2021</span>

                  </div></a>
               </div>
               <div class="events-content">
                  <a href="/75th-founding-anniversary">
                     <h3>75th Founding Anniversary</h3>
                  </a>
               </div>
            </div>
         </div>
                  <div class="col-lg-4 col-md-6">
            <div class="single-events-card style-4">
               <div class="events-image">
                  <a href="/teachers-congress-and-team-building-activities"><img src="assets/images/galleries/tba11.jpg" alt="Image">
 {{--                <div class="date">
                  <span>Feb 14, 2023</span>

                  </div> --}}
               </a>
               </div>
               <div class="events-content">
                  <a href="/teachers-congress-and-team-building-activities">
                     <h3>Teachers Congress and Team Building Activities</h3>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Images used to open the lightbox -->
{{-- 
<div class="container">
<div class="row gallery">
   <div class="col-md-4 p-0">
      <img src="assets/images/galleries/1.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow img-fluid">
   </div>
   <div class="col-md-4 p-0">
      <img src="assets/images/galleries/2.jpg" onclick="openModal();currentSlide(2)" class="hover-shadow img-fluid">
   </div>
   <div class="col-md-4 p-0">
      <img src="assets/images/galleries/3.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow img-fluid">
   </div>
   <div class="col-md-4 p-0">
      <img src="assets/images/galleries/4.jpg" onclick="openModal();currentSlide(4)" class="hover-shadow img-fluid">
   </div>
   <div class="col-md-4 p-0">
      <img src="assets/images/galleries/5.jpg" onclick="openModal();currentSlide(5)" class="hover-shadow img-fluid">
   </div>
   <div class="col-md-4 p-0">
      <img src="assets/images/galleries/6.jpg" onclick="openModal();currentSlide(6)" class="hover-shadow img-fluid">
   </div>
   <div class="col-md-4 p-0">
      <img src="assets/images/galleries/7.jpg" onclick="openModal();currentSlide(7)" class="hover-shadow img-fluid">
   </div>
   <div class="col-md-4 p-0">
      <img src="assets/images/galleries/8.jpg" onclick="openModal();currentSlide(8)" class="hover-shadow img-fluid">
   </div>
   <div class="col-md-4 p-0">
      <img src="assets/images/galleries/9.jpg" onclick="openModal();currentSlide(9)" class="hover-shadow img-fluid">
   </div>
   <div class="col-md-4 p-0">
      <img src="assets/images/galleries/10.jpg" onclick="openModal();currentSlide(10)" class="hover-shadow img-fluid">
   </div>
   <div class="col-md-4 p-0">
      <img src="assets/images/galleries/11.jpg" onclick="openModal();currentSlide(11)" class="hover-shadow img-fluid">
   </div>
</div>
--}}
<!-- The Modal/Lightbox -->
{{--  
<div id="myModal" class="modal">
<span class="close cursor" onclick="closeModal()">&times;</span>
<div class="modal-content">
   <div class="mySlides">
      <div class="numbertext">1 / 6</div>
      <img src="assets/images/galleries/1.jpg" class="img-fluid">
   </div>
   <div class="mySlides">
      <div class="numbertext">2 / 6</div>
      <img src="assets/images/galleries/2.jpg" class="img-fluid">
   </div>
   <div class="mySlides">
      <div class="numbertext">3 / 6</div>
      <img src="assets/images/galleries/3.jpg" class="img-fluid">
   </div>
   <div class="mySlides">
      <div class="numbertext">4 / 6</div>
      <img src="assets/images/galleries/4.jpg" class="img-fluid">
   </div>
   <div class="mySlides">
      <div class="numbertext">5 / 6</div>
      <img src="assets/images/galleries/5.jpg" class="img-fluid">
   </div>
   <div class="mySlides">
      <div class="numbertext">6 / 6</div>
      <img src="assets/images/galleries/6.jpg" class="img-fluid">
   </div>
   <div class="mySlides">
      <div class="numbertext">7 / 6</div>
      <img src="assets/images/galleries/7.jpg" class="img-fluid">
   </div>
   <div class="mySlides">
      <div class="numbertext">8 / 6</div>
      <img src="assets/images/galleries/8.jpg" class="img-fluid">
   </div>
   <div class="mySlides">
      <div class="numbertext">9 / 6</div>
      <img src="assets/images/galleries/9.jpg" class="img-fluid">
   </div>
   <div class="mySlides">
      <div class="numbertext">10 / 6</div>
      <img src="assets/images/galleries/10.jpg" class="img-fluid">
   </div>
   <div class="mySlides">
      <div class="numbertext">11 / 6</div>
      <img src="assets/images/galleries/11.jpg" class="img-fluid">
   </div>
   <!-- Next/previous controls -->
   <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
   <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<script>
   // Open the Modal
   function openModal() {
      document.getElementById("myModal").style.display = "block";
   }
   // Close the Modal
   function closeModal() {
      document.getElementById("myModal").style.display = "none";
   }
   var slideIndex = 1;
   showSlides(slideIndex);
   // Next/previous controls
   function plusSlides(n) {
      showSlides(slideIndex += n);
   }
   // Thumbnail image controls
   function currentSlide(n) {
      showSlides(slideIndex = n);
   }
   
   function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
   
      if (n > slides.length) {
         slideIndex = 1
      }
      if (n < 1) {
         slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";
      }
      
      slides[slideIndex - 1].style.display = "block";
   }
</script> --}}
@endsection