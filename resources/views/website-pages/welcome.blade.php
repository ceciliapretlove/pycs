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
            <div id="popup" class="banner_popup panel panel-primary">
               <div class="panel-footer">
                  <button id="close" class="btn btn-lg btn-primary close_banner">x close</button>
              </div>
              <img src="{{asset('assets/images/banner/welcome_back.png')}}" alt="popup">

          </div>

            <div id="popup1" class="banner_popup panel panel-primary">
               <div class="panel-footer">
                  <button id="close1" class="btn btn-lg btn-primary close_banner">x close</button>
              </div>
              <img src="{{asset('assets/images/banner/school_bus.png')}}" alt="popup">

          </div>
          <div id="popup2" class="banner_popup panel panel-primary">
               <div class="panel-footer">
                  <button id="close2" class="btn btn-lg btn-primary close_banner">x close</button>
              </div>
              <img src="{{asset('assets/images/banner/announcement.png')}}" alt="popup">

          </div>
            <div id="popup3" class="banner_popup panel panel-primary">
               <div class="panel-footer">
                  <button id="close3" class="btn btn-lg btn-primary close_banner">x close</button>
              </div>
              <img src="{{asset('assets/images/banner/advisory.jpg')}}" alt="popup">

          </div>
         <div id="popup4" class="banner_popup panel panel-primary">
               <div class="panel-footer">
                  <button id="close4" class="btn btn-lg btn-primary close_banner">x close</button>
              </div>
              <img src="{{asset('assets/images/banner/school_banner-3.jpg')}}" alt="popup">

          </div>
                     

{{-- 
         <div id="popup_banner5" class="popup">
            <img  style="background-image: url('{{ asset('assets/images/banner/school_banner-1.jpg') }}')" >
          <button id="close5">&times;</button>
         </div>
            <div id="popup_banner4" class="popup" >
               <img style="background-image: url('{{ asset('assets/images/banner/school_banner-3.jpg') }}')" >
          <button id="close4">&times;</button>
         </div>
         <div id="popup_banner3" class="popup" >
                     <img style="background-image: url('{{ asset('assets/images/banner/school_banner-2.jpg') }}')" >
          <button id="close3">&times;</button>
         </div>

         <div id="popup_banner2" class="popup">
            <img  style="background-image: url('{{ asset('assets/images/banner/advisory.jpg') }}')" >
          <button id="close2">&times;</button>
         </div>

         <div id="popup_banner1" class="popup"  >
            <img style="background-image: url('{{ asset('assets/images/banner/advisory2.jpg') }}')">
          <button id="close">&times;</button>
         </div>

         <div id="popup_banner0" class="popup">
            <img style="background-image: url('{{ asset('assets/images/banner/announcement.png') }}')" >
          <button id="close">&times;</button>
         </div> --}}

      </div>
   </div>
</div>
@endsection
<script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
 <script type="text/javascript">
$(document).ready(function () {

    $(".banner_popup").hide();

   $("#popup").hide().fadeIn(1000);
    $("#close").on("click", function (e) {
        e.preventDefault();
        $("#popup").fadeOut(1000);
        $("#popup1").hide().fadeIn(1000);
    });

    
    $("#close1").on("click", function (e) {
        e.preventDefault();
        $("#popup1").fadeOut(1000);
        $("#popup2").hide().fadeIn(1000);
    });

 
    $("#close2").on("click", function (e) {
        e.preventDefault();
         $("#popup2").fadeOut(1000);
        $("#popup3").hide().fadeIn(1000);
    });

        $("#close3").on("click", function (e) {
        e.preventDefault();
        $("#popup3").fadeOut(1000);
    });
        $("#close4").on("click", function (e) {
        e.preventDefault();
        $("#popup4").fadeOut(1000);
    });
});
// $( document ).ready(function() {

//     // $('.popup').css('display', 'block').show().fadeIn();
//          $('#popup_banner0').css({ 'opacity': '1'});
//          $("button#close").click(function(){
//            $('#popup_banner0').delay(400).animate({'opacity':'0'},400);
//             $('button#close').css('display', 'none');
//             $('#popup_banner0').css({ 'display': 'none'});
//          });

//       $('#popup_banner1').css({ 'opacity': '1'});
//          $("button#close").click(function(){
//            $('#popup_banner1').delay(400).animate({'opacity':'0'},400);
//             $('button#close').css('display', 'none');
//             $('#popup_banner1').css({ 'display': 'none'});
//          });

//       $('#popup_banner2').css({ 'opacity': '1'});
//       $("button#close2").click(function(){
//           $('#popup_banner1').delay(400).animate({'opacity':'0'},400);
//           $('button#close2').css('display', 'none');
//           $('#popup_banner2').css({ 'display': 'none'});
//    });

//       $('#popup_banner3').css({ 'opacity': '1'});
//       $("button#close3").click(function(){
//      $('#popup_banner3').delay(400).animate({'opacity':'0'},400);
//             $('button#close3').css('display', 'none');
//             $('#popup_banner3').css({ 'display': 'none'});
//    });

//    $('#popup_banner4').css({ 'opacity': '1'});
//       $("button#close4").click(function(){
//          $('#popup_banner4').delay(400).animate({'opacity':'0'},400);
//          $('button#close4').css('display', 'none');
//          $('#popup_banner4').css({ 'display': 'none'});
//      });

//          $('#popup_banner5').css({ 'opacity': '1'});
//       $("button#close5").click(function(){
//          $('#popup_banner5').delay(400).animate({'opacity':'0'},400);
//          $('button#close5').css('display', 'none');
//          $('#popup_banner5').css({ 'display': 'none'});
//      });
// });



    </script>