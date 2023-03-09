@extends('layouts.webapp')
@section('content')
<div class="banner-area">
   <div class="hero-slider2 style2 owl-carousel owl-theme owl-loaded owl-drag">
      <div class="owl-stage-outer">
         <div class="owl-stage" style="transform: translate3d(-7612px, 0px, 0px); transition: all 1s ease 0s; width: 13321px;">
            <div class="owl-item " style="width: 1903px;">
               <div class="slider-item "style="background-image: url('{{ asset('assets/images/banner/banner1.jpg') }}')" >
          
                  <div class="container-fluid">
                     <div class="slider-content">
                        <h1>Experience the Culture of Excellence</h1>
                        <p>Tranforming Lives through Education with Quality Assurance</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="owl-item " style="width: 1903px;">
               <div class="slider-item "style="background-image: url('{{ asset('assets/images/banner/banner2.jpg') }}')" >
          
                  <div class="container-fluid">
                     <div class="slider-content">
                        <h1>Experience the Culture of Excellence</h1>
                        <p>Tranforming Lives through Education with Quality Assurance</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="owl-item " style="width: 1903px;">
               <div class="slider-item "style="background-image: url('{{ asset('assets/images/banner/banner3.jpg') }}')" >
        
                  <div class="container-fluid">
                     <div class="slider-content">
                        <h1>Experience the Culture of Excellence</h1>
                        <p>Tranforming Lives through Education with Quality Assurance</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="owl-item " style="width: 1903px;">
               <div class="slider-item "style="background-image: url('{{ asset('assets/images/banner/banner4.jpg') }}')" >
         
                  <div class="container-fluid">
                     <div class="slider-content">
                        <h1>Experience the Culture of Excellence</h1>
                        <p>Tranforming Lives through Education with Quality Assurance</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="owl-item " style="width: 1903px;">
               <div class="slider-item "style="background-image: url('{{ asset('assets/images/banner/banner5.jpg') }}')" >
      
                  <div class="container-fluid">
                     <div class="slider-content">
                        <h1>Experience the Culture of Excellence</h1>
                        <p>Tranforming Lives through Education with Quality Assurance</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="owl-item " style="width: 1903px;">
               <div class="slider-item "style="background-image: url('{{ asset('assets/images/banner/banner6.jpg') }}')" >
               
                  <div class="container-fluid">
                     <div class="slider-content">
                        <h1>Experience the Culture of Excellence</h1>
                        <p>Tranforming Lives through Education with Quality Assurance</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="ri-arrow-left-line"></i></button><button type="button" role="presentation" class="owl-next"><i class="ri-arrow-right-line"></i></button></div>
         <div class="owl-dots disabled"></div>
           <div class="popup">
        <button id="close">&times;</button>
      

    </div>
      </div>
   </div>
</div>
@endsection
<script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
 <script type="text/javascript">

$( document ).ready(function() {
    // $('.popup').css('display', 'block').show().fadeIn();
   $('.popup').delay(600).animate({'opacity':'1'},800);
   $("button#close").click(function(){
  $('.popup').delay(400).animate({'opacity':'0'},400);
});
});



    </script>