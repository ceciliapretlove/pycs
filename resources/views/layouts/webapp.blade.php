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
      <title>PYCS - Philippine Yu Chiau School</title>
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
            <div class="row align-items-center">
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
            </div>
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
            <div class="container-fluid">
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
                           <a href="/about" class="nav-link">
                           About
                           </a>
                        </li>
                        <li class="nav-item">
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
                                 <a href="special-program" class="nav-link">Special Program</a>
                              </li>
                              <li class="nav-item">
                                 <a href="academic-standard" class="nav-link">Academic Standards</a>
                              </li>
                             {{--  <li class="nav-item">
                                 <a href="special-program" class="nav-link">Special Program</a>
                              </li>
                              <li class="nav-item">
                                 <a href="clubs-organization" class="nav-link">Clubs / Organizations</a>
                              </li>
                              <li class="nav-item">
                                 <a href="discipline-standards-and-policies" class="nav-link">Discipline Standards And Policies</a>
                              </li>
                              <li class="nav-item">
                                 <a href="alumni.html" class="nav-link">Clubs / Organizations</a>
                              </li>  --}}
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a href="school-calendar" class="nav-link">
                           School Calendar
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="galleries" class="nav-link">
                           Galleries
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="curriculum" class="nav-link">
                           Curriculum
                           </a>
                        </li>
                     </ul>
{{--                      <div class="others-options">
                        <div class="icon">
                           <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                        </div>
                     </div> --}}
                  </div>
               </nav>
            </div>
         </div>
         <div class="others-option-for-responsive">
            <div class="container">
               <div class="dot-menu">
                  <div class="inner">
                     <div class="icon">
                        <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <button type="button" class="close" data-bs-dismiss="modal"><i class="ri-close-line"></i></button>
               <div class="modal-body">
                  <a href="index.html">
                  <img src="assets/images/logo.png" class="main-logo" alt="logo">
                  <img src="assets/images/white-logo.png" class="white-logo" alt="logo">
                  </a>
                  <div class="sidebar-content">
                     <h3>About Us</h3>
                     <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                     <div class="sidebar-btn">
                        <a href="contact.html" class="default-btn">Let’s Talk</a>
                     </div>
                  </div>
                  <div class="sidebar-contact-info">
                     <h3>Contact Information</h3>
                     <ul class="info-list">
                        <li><i class="ri-phone-fill"></i> <a href="tel:9901234567">+990-123-4567</a></li>
                        <li><i class="ri-mail-line"></i><a href="mailto:hello@sanu.com">hello@sanu.com</a></li>
                        <li><i class="ri-map-pin-line"></i> 413 North Las Vegas, NV 89032</li>
                     </ul>
                  </div>
                  <ul class="sidebar-social-list">
                     <li>
                        <a href="https://www.facebook.com" target="_blank"><i class="flaticon-facebook"></i></a>
                     </li>
                     <li>
                        <a href="https://www.twitter.com" target="_blank"><i class="flaticon-twitter"></i></a>
                     </li>
                     <li>
                        <a href="https://linkedin.com/?lang=en" target="_blank"><i class="flaticon-linkedin"></i></a>
                     </li>
                     <li>
                        <a href="https://instagram.com/?lang=en" target="_blank"><i class="flaticon-instagram"></i></a>
                     </li>
                  </ul>
                  <div class="contact-form">
                     <h3>Ready to Get Started?</h3>
                     <form id="contactForm" novalidate="true">
                        <div class="row">
                           <div class="col-lg-12 col-md-6">
                              <div class="form-group">
                                 <input type="text" name="name" class="form-control" required="" data-error="Please enter your name" placeholder="Your name">
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-6">
                              <div class="form-group">
                                 <input type="email" name="email" class="form-control" required="" data-error="Please enter your email" placeholder="Your email address">
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="form-group">
                                 <input type="text" name="phone_number" class="form-control" required="" data-error="Please enter your phone number" placeholder="Your phone number">
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="form-group">
                                 <textarea name="message" class="form-control" cols="30" rows="6" required="" data-error="Please enter your message" placeholder="Write your message..."></textarea>
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <button type="submit" class="default-btn" style="pointer-events: all; cursor: pointer;">Send Message<span></span></button>
                              <div id="msgSubmit" class="h3 text-center hidden"></div>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @yield('content')
      <div class="footer-area pt-100 pb-70">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-6">
                  <div class="footer-logo-area">
                     <a href="index.html"><img src="assets/images/logo.png" alt="Image"></a>
                     <
                     <div class="contact-list">
                        <ul>
                           <li><a href="tel:+01987655567685">+63-9876-5556-7685
                              </a>
                           </li>
                           <li><a href="mailto:admin@pycs.edu">admin@pycs.edu</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <div class="footer-widjet">
                     <h3>Campus Life</h3>
                     <div class="list">
                        <ul>
                           <li><a href="campus-life.html">Accessibility</a></li>
                           <li><a href="campus-life.html">Financial Aid</a></li>
                           <li><a href="campus-life.html">Food Services</a></li>
                           <li><a href="campus-life.html">Housing</a></li>
                           <li><a href="campus-life.html">Information Technologies</a></li>
                           <li><a href="campus-life.html">Student Life</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <div class="footer-widjet">
                     <h3>Our Campus</h3>
                     <div class="list">
                        <ul>
                           <li><a href="campus-life.html">Acedemic</a></li>
                           <li><a href="campus-life.html">Planning &amp; Administration</a></li>
                           <li><a href="campus-life.html">Campus Safety</a></li>
                           <li><a href="campus-life.html">Office of the Chancellor</a></li>
                           <li><a href="campus-life.html">Facility Services</a></li>
                           <li><a href="campus-life.html">Human Resources</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-2 col-sm-6">
                  <div class="footer-widjet">
                     <h3>Academics</h3>
                     <div class="list">
                        <ul>
                           <li><a href="academics.html">Canvas</a></li>
                           <li><a href="academics.html">Catalyst</a></li>
                           <li><a href="academics.html">Library</a></li>
                           <li><a href="academics.html">Time Schedule</a></li>
                           <li><a href="academics.html">Apply For Admissions</a></li>
                           <li><a href="academics.html">Pay My Tuition</a></li>
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
                              <a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a>
                           </li>
                           <li>
                              <a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a>
                           </li>
                           <li>
                              <a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a>
                           </li>
                           <li>
                              <a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-8">
                     <div class="copy">
                        <p>© Philippine Yu Chiau School</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="go-top">
         <i class="ri-arrow-up-s-line"></i>
         <i class="ri-arrow-up-s-line"></i>
      </div>
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