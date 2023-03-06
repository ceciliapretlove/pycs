<!DOCTYPE html>
<html lang="zxx" class="theme-light">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="./assets/css/meanmenu.css">
      <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="./assets/css/magnific-popup.css">
      <!--       <link rel="stylesheet" href="assets/css/flaticon.css">
         <link rel="stylesheet" href="assets/css/remixicon.css"> -->
      <link rel="stylesheet" href="./assets/css/odometer.min.css">
      <link rel="stylesheet" href="./assets/css/aos.css">
      <link rel="stylesheet" href="./assets/css/style.css">
      <link rel="stylesheet" href="./assets/css/dark.css">
      <link rel="stylesheet" href="./assets/css/responsive.css">
      <link rel="icon" type="image/png" href="assets/images/favicon.png">
      <link href="./assets/css/remixicon.css" rel="stylesheet">
      <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
      <title>PYCS - Philippine Yuh Chiau School</title>
      <script type="text/javascript">
         var BASE_URL = '{{ url('/') }}';
         var CSRF_TOKEN = '{{ csrf_token() }}';
         var ASSETS = '{{ asset('/') }}';
      </script>
   </head>
   <body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">
      <div class="preloader-area" style="display: none;">
         <div class="spinner">
            <div class="inner">
               <div class="disc"></div>
               <div class="disc"></div>
               <div class="disc"></div>
            </div>
         </div>
      </div>
      <div class="top-header-area">
         <div class="container-fluid">
{{--             <div class="row align-items-center">
               <div class="col-lg-6 col-md-6">
                  <!--            <div class="header-left-content">
                     <p>Get the latest updates and Sanu's response to COVID-19</p>
                     </div> -->
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="header-right-content">
                     <div class="list">
                        <ul>
                           <li><a href="#">Students</a></li>
                           <li><a href="#">Faculty &amp; Staff</a></li>
                           <li><a href="#">Visitors</a></li>
                           <li><a href="#">Academics</a></li>
                           <li><a href="#">Alumni</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div> --}}
         </div>
      </div>
      <div class="navbar-area nav-bg-2">
         <div class="mobile-responsive-nav">
            <div class="container">
               <div class="mobile-responsive-menu">
                  <div class="logo">
                     <a>
                     <img src="assets/images/logo.png" class="main-logo" lt="logo">
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="desktop-nav">
            <div class="container">
               <nav class="navbar navbar-expand-md navbar-light">
                  <a class="navbar-brand" href="index-3.html">
                  <img src="assets/images/logo.png" class="main-logo" alt="logo">
                  </a>
                  <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent" style="display: block;">
                     <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                           <a href="/" class="nav-link">
                           Home
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="/about" class="nav-link dropdown-toggle">
                           About
                           </a>
                           <ul class="dropdown-menu">
                              <li class="nav-item">
                                 <a href="/about" class="nav-link">About PYCS</a>
                              </li>
                              <li class="nav-item">
                                 <a href="/general-standards-and-policies" class="nav-link">General Standards and Policies</a>
                              </li>
                                                            <li class="nav-item">
                                 {{-- <a href="/offenses-and-sanctions" class="nav-link">Offenses and Sanctions</a> --}}
                                 <a href="/discipline-policies" class="nav-link">Discipline Policies</a>
                              </li>
                              <li class="nav-item">
                                 <a href="/health-standards-and-policies" class="nav-link">Health Standards and Policies</a>
                              </li>

                              <li class="nav-item">
                                 <a href="/general-policies" class="nav-link">General Policies</a>
                              </li>
  
                           </ul>
                        </li>
                     <li class="nav-item">
                           <a href="school-calendar" class="nav-link">
                           School Calendar
                           </a>
                        </li>
{{--                         <li class="nav-item">
                           <a href="/admission" class="nav-link dropdown-toggle">
                           Admission
                           </a>
                           <ul class="dropdown-menu">
                              <li class="nav-item">
                                 <a href="enrollment" class="nav-link">Enrollment</a>
                              </li>
                              <li class="nav-item">
                                 <a href="admission" class="nav-link">Admission Requirements</a>
                              </li>
                           </ul>
                        </li> --}}

                        <li class="nav-item">
                           <a href="" class="nav-link dropdown-toggle">
                           School Operation
                           </a>
                           <ul class="dropdown-menu">
                              <li class="nav-item">
                                 <a href="class-periods-and-learning-cycle" class="nav-link">Class Periods and Learning Cycle</a>
                              </li>
                              <li class="nav-item">
                                 <a href="enrollment-of-learners" class="nav-link">Enrollment of Learners</a>
                              </li>
                              <li class="nav-item">
                                 <a href="admission-requirements" class="nav-link">Admission Requirements</a>
                              </li>

                              <li class="nav-item">
                                 <a href="admission-procedure" class="nav-link">Admission Procedures</a>
                              </li>

                              <li class="nav-item">
                                 <a href="policies-for-early-registration" class="nav-link">Policies for Early Registration</a>
                              </li>

                              <li class="nav-item">
                                 <a href="policy-on-withholding-of-credentials" class="nav-link">Policy on Withholding of Credentials</a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a href="" class="nav-link dropdown-toggle">
                           Academics
                           </a>
                           <ul class="dropdown-menu">
                              <li class="nav-item">
                                 <a href="#" class="nav-link dropdown-toggle">
                                 Curriculum
                                 </a>
                                 <ul class="dropdown-menu">
                                    <li class="nav-item">
                                       <a href="/pre-elementary" class="nav-link">Pre-Elementary</a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="/grade-school" class="nav-link">Grade School</a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="junior-hs" class="nav-link">Junior High School</a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="senior-hs" class="nav-link">Senior High School</a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="nav-item">
                                 <a href="/special-program" class="nav-link">Special Programs</a>
                              </li>
                              <li class="nav-item">
                                 <a href="/academic-standard" class="nav-link">Academic Policy</a>
                              </li>
                              <li class="nav-item">
                                 <a href="/grading-system" class="nav-link">Grading System and Grade Description </a>
                              </li>
                              <li class="nav-item">
                                 <a href="/promotion-and-retention" class="nav-link">Promotion and Retention </a>
                              </li>
                              <li class="nav-item">
                                 <a href="/school-programs" class="nav-link">School Programs</a>
                              </li>
                              <li class="nav-item">
                                 <a href="/clubs-organization" class="nav-link">Clubs / Organizations</a>
                              </li>
                              <li class="nav-item">
                                 <a href="/school-year-end-activities" class="nav-link">School Year-End Activities</a>
                              </li>
                              <li class="nav-item">
                                 <a href="/others" class="nav-link">Others</a>
                              </li>
                           </ul>
                        </li>

                        <li class="nav-item">
                           <a href="galleries" class="nav-link">
                           Galleries
                           </a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
      @yield('content')
      <div class="footer-area pt-100 pb-70">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-6">
                  <div class="footer-logo-area">
                     <a href="/"><img src="assets/images/pycs-footer-logo.png" alt="Image"></a>

                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <div class="footer-widjet">
                     <h3>Contact Us</h3>
                     <div class="list">
                        <ul>
                           <li>Globe : 0966-416-1972</li>
                           <li>Smart : 0908-885-1783</li>
                           <li>Landline : (078) 652-0839</li>
                        </ul>
                     </div>
                  </div>


               </div>

               <div class="col-lg-2 col-sm-6">
                  <div class="footer-widjet">
                     <h3>Email</h3>
                     <div class="list">
                        <ul>
                           <li>pycs.65@gmail.com</li>
                        </ul>
                     </div>
                  </div>
               </div>

                              <div class="col-lg-2 col-sm-6">
                  <div class="footer-widjet">
                     <h3>Social Media</h3>
                     <div class="list">
                        <ul>
                           <li>Facebook Page: <a href="https://web.facebook.com/transforminglivespycs">https://web.facebook.com/transforminglivespycs</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!--             <div class="shape">
               <img src="assets/images/shape-1.png" alt="Image">
               </div> -->
         </div>
      </div>
      <div class="copyright-area">
         <div class="container">
            <div class="copyright">
               <div class="row">
                  <div class="col-lg-6 col-md-4">
                     <div class="social-content">
                        <ul>
                           <li><span>Follow Us On</span></li>
                           <li>
                              <a href="https://web.facebook.com/transforminglivespycs" target="_blank"><i class="ri-facebook-fill"></i></a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-8">
                     <div class="copy">
                        <p>© Philippine Yuh Chiau School</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
{{--       <div class="go-top">
         <i class="ri-arrow-up-s-line"></i>
         <i class="ri-arrow-up-s-line"></i>
      </div> --}}
      <script src="./assets/js/jquery.min.js"></script>
      <script src="./assets/js/bootstrap.bundle.min.js"></script>
      <script src="./assets/js/jquery.meanmenu.js"></script>
      <script src="./assets/js/owl.carousel.min.js"></script>
      <script src="./assets/js/carousel-thumbs.min.js"></script>
      <script src="./assets/js/jquery.magnific-popup.js"></script>
      <script src="./assets/js/aos.js"></script>
      <script src="./assets/js/odometer.min.js"></script>
      <script src="./assets/js/appear.min.js"></script>
      <script src="./assets/js/form-validator.min.js"></script>
      <script src="./assets/js/contact-form-script.js"></script>
      <script src="./assets/js/ajaxchimp.min.js"></script>
      <script src="./assets/js/custom.js"></script>
   </body>
</html>