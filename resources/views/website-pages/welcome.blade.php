@extends('layouts.webapp')
@section('content')
      <div class="banner-area">
      <div class="hero-slider2 style2 owl-carousel owl-theme owl-loaded owl-drag">
         <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(-7612px, 0px, 0px); transition: all 1s ease 0s; width: 13321px;">
               <div class="owl-item cloned" style="width: 1903px;">
                  <div class="slider-item" style="background-image: url('{{ asset('assets/images/banner/banner-1.jpg') }}')" >
                     <div class="container-fluid">
                        <div class="slider-content">
                           <h1>Your Future Start With PYCS</h1>
                           <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Ut elit tellus luctus nec ullamcorper mattis pulvinar dapibus dolor sit amet consec</p>
                           <a href="courses.html" class="default-btn btn">Start a Journey <i class="flaticon-next"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="owl-item cloned" style="width: 1903px;">
                  <div class="slider-item" style="background-image: url('{{ asset('assets/images/banner/banner-2.jpg') }}')" >
                     <div class="container-fluid">
                        <div class="slider-content">
                           <h1>Welcome to Philippine Yu Chiau School</h1>
                           <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Ut elit tellus luctus nec ullamcorper mattis pulvinar dapibus dolor sit amet consec</p>
                           <a href="courses.html" class="default-btn btn">Start a Journey <i class="flaticon-next"></i></a>
                        </div>
                     </div>
                  </div>
                 
               </div>
            </div>
            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="ri-arrow-left-line"></i></button><button type="button" role="presentation" class="owl-next"><i class="ri-arrow-right-line"></i></button></div>
            <div class="owl-dots disabled"></div>
         </div>
      </div>
      </div>
@endsection