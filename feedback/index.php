<?php
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{

        // Get form data
        $email = $_POST['email'];
        $overall_experience = $_POST['overall_experience'];
        $ease_of_use = $_POST['ease_of_use'];
        $onboarding_process = $_POST['onboarding_process'];
        $about_features = $_POST['about_features'];
        $feature_request = $_POST['feature_request'];
        $spotlight_status = $_POST['bugs'];

        

        // https://legacydocs.hubspot.com/docs/methods/contacts/create_or_update


// Set up the API endpoint and authentication
$endpoint = 'https://api.hubapi.com/contacts/v1/contact/createOrUpdate/email/'.$email;
// $endpoint = 'https://api.hubapi.com/contacts/v1/contact';
$accessToken = 'pat-eu1-bdcbb87d-6175-4dae-a88f-b3cdfca9e123';
$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $accessToken);

// Set up the contact data to be sent to HubSpot
$contactData = array(
    'properties' => array(
        array(
            'property' => 'email',
            'value' => $email
         ),
         array(
            'property' => 'overall_experience',
            'value' => $overall_experience
        ),
        array(
            'property' => 'ease_of_use',
            'value' => $ease_of_use
    ),
    array(
        'property' => 'onboarding_process',
        'value' => $onboarding_process
    ),
    array(
        'property' => 'about_features',
        'value' => $about_features
    ),
    array(
        'property' => 'feature_request',
        'value' => $feature_request 
    ),
    
    array(
      'property' => 'spotlight_status',
      'value' => $spotlight_status 
    )
 
    )
);    


// Send the contact data to HubSpot using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($contactData));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Check the response and output the result
if ($response) {
    $result = json_decode($response, true);
    if (isset($result['vid'])) {
        // echo 'Contact created with ID ' . $result['vid'] . '.';
        echo '<div class="alert alert-success" role="alert">Gracias por contactarnos, en breve nos comunicaremos con usted.</div>';
    } else {
        echo '<div class="alert alert-info" role="alert">Ha ocurrido un error al intentar enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.</div>';
    }
} else {
    echo 'Error creating contact.';
}


}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K3TP4N7');</script>
<!-- End Google Tag Manager -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RFVES1LX6T"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-RFVES1LX6T');
</script>
    <meta charset="utf-8">
    <title>Melboss Music | Feedback</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Melboss Music - Music Marketing para Empresas ">
    <meta name="keywords" content="music marketing, digital marketing, marketing musical, marketing para festivales, campañas de anuncios, promocion en spotify, promocion en tiktok">
    <meta name="author" content="melboss Music">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/favicon/safari-pinned-tab.svg" color="#6366f1">
    <link rel="shortcut icon" href="assets/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#080032">
    <meta name="msapplication-config" content="assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor Styles -->
    <link rel="stylesheet" media="screen" href="assets/vendor/boxicons/css/boxicons.min.css"/>
    <link rel="stylesheet" media="screen" href="assets/vendor/swiper/swiper-bundle.min.css"/>

    <!-- Main Theme Styles + Bootstrap -->
    <link rel="stylesheet" media="screen" href="assets/css/theme.min.css">

    <!-- Page loading styles -->
    <style>
      @import url('https://fonts.cdnfonts.com/css/omnes');
      .page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .dark-mode .page-loading {
        background-color: #0b0f19;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #9397ad;
      }
      .dark-mode .page-loading-inner > span {
        color: #fff;
        opacity: .6;
      }
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #b4b7c9;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      .dark-mode .page-spinner {
        border-color: rgba(255,255,255,.4);
        border-right-color: transparent;
      }

      .dark-mode div.logo-melboss::before {
        content:url(assets/img/logo/melboss-logo-dark-mode.png); 
        vertical-align: middle;
      }
     div.logo-melboss::before {
        content:url(assets/img/logo/melboss-logo-light-mode.png); 
        vertical-align: middle;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
    </style>

    <!-- Theme mode -->
    <script>
      let mode = window.localStorage.getItem('mode'),
          root = document.getElementsByTagName('html')[0];
      if (mode !== null && mode === 'dark') {
        root.classList.add('dark-mode');
      } else {
        root.classList.remove('dark-mode');
      }
    </script>

    <!-- Page loading scripts -->
    <script>
      (function () {
        window.onload = function () {
          const preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 1000);
        };
      })();
    </script>
  </head>


  <!-- Body -->
  <body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3TP4N7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!-- Page loading spinner -->
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Loading...</span>
      </div>
    </div>
    <!-- Page wrapper for sticky footer -->
    <!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
    <main class="page-wrapper">
      <!-- Navbar -->
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page -->
      <header class="header navbar navbar-expand-lg bg-light navbar-sticky">
        <div class="container px-3">
          <a href="" class="navbar-brand pe-3"><div class="logo-melboss"></div>
          </a>
          <div id="navbarNav" class="offcanvas offcanvas-end">
            <div class="offcanvas-header border-bottom">
              <h5 class="offcanvas-title"><div class="logo-melboss"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
            </div>    
          </div>
          <div class="form-check form-switch mode-switch pe-lg-1 ms-auto me-4" data-bs-toggle="mode">
            <input type="checkbox" class="form-check-input" id="theme-mode">
            <label class="form-check-label d-none d-sm-block" for="theme-mode">Light</label>
            <label class="form-check-label d-none d-sm-block" for="theme-mode">Dark</label>
          </div>
          <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a href="https://melboss.com" class="btn btn-primary btn-sm fs-sm rounded d-none d-lg-inline-flex" target="_blank" rel="noopener">
            <i class="bx bx-log-in fs-5 lh-1 me-1"></i>
            &nbsp;melboss.com
          </a>
        </div>
      </header>
      <section class="container pb-5 mb-2 mb-md-4 mb-lg-5" id="contacto">
  <div class="position-relative bg-secondary rounded-3 py-5 mb-2">
    <div class="row pb-2 py-md-3 py-lg-5 px-4 px-lg-0 position-relative zindex-3">
      <div class="col-xl-3 col-lg-4 col-md-5 offset-lg-1">
        <h2 class="h2 mb-2">Do you want to work with us??</h2>
        <h1 class="display-4 pb-2 pb-sm-3 text-gradient-primary" >Let's talk!</h1>
      </div>
      <form class="col-lg-6 col-md-7 offset-xl-1 needs-validation" novalidate method="POST">
        <div class="row">
          <div class="col-12 mb-4">
            <label for="email" class="form-label fs-base">Email</label>
            <input type="email" id="email"  name="email" class="form-control form-control-lg" required>
            <div class="invalid-feedback">Please enter your valid email address!</div>
          </div>
          <div class="col-12 mb-4">
          <label for="overall_experience" class="form-label fs-base">How satisfied are you with the product on a scale of 1 to 5?</label><br>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="overall_experience" id="overall_experience1" value="1"  required/>
            <label class="form-check-label" for="overall_experience1">1</label>
            </div>
            <div class="form-check form-check-inline ">
              <input class="form-check-input" type="radio" name="overall_experience" id="overall_experience2" value="2" required/>
              <label class="form-check-label" for="overall_experience2">2 </label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="overall_experience" id="overall_experience3" value="3" required/>
            <label class="form-check-label" for="overall_experience3">3</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="overall_experience" id="overall_experience4" value="4" required/>
              <label class="form-check-label" for="overall_experience4">4 </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="overall_experience" id="overall_experience5" value="5" required/>
              <label class="form-check-label" for="overall_experience5">5</label>
            </div>
          </div>
        <div class="col-12 mb-4">
          <label for="ease_of_use" class="form-label fs-base">How easy was it to use the product on a scale of 1 to 5?</label><br>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="ease_of_use" id="ease_of_use1" value="1" required/>
            <label class="form-check-label" for="ease_of_use1">1</label>
            </div>
            <div class="form-check form-check-inline ">
              <input class="form-check-input" type="radio" name="ease_of_use" id="ease_of_use2" value="2" required/>
              <label class="form-check-label" for="ease_of_use2">2 </label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="ease_of_use" id="ease_of_use3" value="3" required/>
            <label class="form-check-label" for="ease_of_use3">3</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ease_of_use" id="ease_of_use4" value="4" required/>
              <label class="form-check-label" for="ease_of_use4">4 </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ease_of_use" id="ease_of_use5" value="5" required/>
              <label class="form-check-label" for="ease_of_use5">5</label>
            </div>
          </div>
        <div class="col-12 mb-4">
          <label for="onboarding_process" class="form-label fs-base">How would you rate the platform onboarding process on a scale of 1 to 5?</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="onboarding_process" id="onboarding_process1" value="1" required />
            <label class="form-check-label" for="onboarding_process1">1</label>
            </div>
            <div class="form-check form-check-inline ">
              <input class="form-check-input" type="radio" name="onboarding_process" id="onboarding_process2" value="2" required/>
              <label class="form-check-label" for="onboarding_process2">2 </label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="onboarding_process" id="onboarding_process3" value="3" required/>
            <label class="form-check-label" for="onboarding_process3">3</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="onboarding_process" id="onboarding_process4" value="4" required/>
              <label class="form-check-label" for="onboarding_process4">4 </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="onboarding_process" id="onboarding_process5" value="5" required/>
              <label class="form-check-label" for="onboarding_process5">5</label>
            </div>
        </div>
          <div class="col-12 pb-2 mb-4">
            <label for="about_features" class="form-label fs-base">Which feature of the platform has been most useful to you?</label>
            <textarea id="about_features" name="about_features" class="form-control form-control-lg" rows="4" required></textarea>
            <div class="invalid-feedback">Please enter a message</div>
          </div>
          <div class="col-12 pb-2 mb-4">
            <label for="feature_request" class="form-label fs-base">Are there any specific features or functionalities you would like to see added?</label>
            <textarea id="feature_request" name="feature_request" class="form-control form-control-lg" rows="4" required></textarea>
            <div class="invalid-feedback">Please enter a message</div>
          </div>
          <div class="col-12 pb-2 mb-4">
            <label for="bugs" class="form-label fs-base">Have you encountered any bugs? If yes, could you please provide us with some details?</label>
            <textarea id="bugs" name="bugs" class="form-control form-control-lg" rows="4" required></textarea>
            <div class="invalid-feedback">Please enter a message</div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary shadow-primary btn-lg">Send Feedback</button>
      </form>
    </div>

    <!-- Pattern -->
    <div class="position-absolute end-0 bottom-0 text-primary">
      <svg width="416" height="444" viewBox="0 0 416 444" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.08" fill-rule="evenodd" clip-rule="evenodd" d="M240.875 615.746C389.471 695.311 562.783 640.474 631.69 504.818C700.597 369.163 645.201 191.864 496.604 112.299C348.007 32.7335 174.696 87.5709 105.789 223.227C36.8815 358.882 92.278 536.18 240.875 615.746ZM208.043 680.381C388.035 776.757 605.894 713.247 694.644 538.527C783.394 363.807 709.428 144.04 529.436 47.6636C349.443 -48.7125 131.584 14.7978 42.8343 189.518C-45.916 364.238 28.0504 584.005 208.043 680.381Z" fill="currentColor"/><path opacity="0.08" fill-rule="evenodd" clip-rule="evenodd" d="M262.68 572.818C382.909 637.194 526.686 594.13 584.805 479.713C642.924 365.295 595.028 219.601 474.799 155.224C354.57 90.8479 210.793 133.912 152.674 248.33C94.5545 362.747 142.45 508.442 262.68 572.818ZM253.924 590.054C382.526 658.913 538.182 613.536 601.593 488.702C665.004 363.867 612.156 206.847 483.554 137.988C354.953 69.129 199.296 114.506 135.886 239.341C72.4752 364.175 125.323 521.195 253.924 590.054Z" fill="currentColor"/></svg>
    </div>
  </div>
</section>
    </main>
    <div class="container-fluid" style="padding:20px;">
      <!-- Footer -->
     <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1;padding:10px;background-color:#30343c;border-radius: 15px;color:#fff !important;" >
          <!-- Section: Social media -->
         <section class="">
          <div class=" text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-4">
              <!-- Grid column -->
              <div class="col-md-8 col-lg-8 col-xl-3 mx-auto mb-4 ">
                <span><img src="assets/img/logo/melboss_white_logo.svg" height="20px"></span>
              </div>
              <!-- Grid column -->
              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-3 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold text-white">Company</h6>
                <hr  class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #fff; height: 2px"  />
                <p><a href="https://melboss.com/marketing"class="text-white">Music Marketing</a>
                </p>
                <p><a href="https://melboss.com/about" class="text-white">About Us</a>
                </p>
                <p> <a href="https://careers.melboss.com/" class="text-white">Careers</a>
                </p>
                <p> <a href="https://melboss.com/contact-us" class="text-white">Contact Us</a>
                </p>
              </div>
              <!-- Grid column -->
              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold text-white">Links</h6>
                <hr  class="mb-4 mt-0 d-inline-block mx-auto"  style="width: 60px; background-color: #fff; height: 2px"   />
                    <p>   <a href="https://blog.melboss.com/" class="text-white">Blog</a>
                    </p>
                    <p>  <a href="http://eepurl.com/c8rGXn" class="text-white">Newsletter</a>
                    </p>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
         </section>
         <!-- Section: Links  -->
         <div class="container pt-4">
          <div class="d-flex flex-sm-row flex-column align-items-center justify-content-between text-center text-md-start pt-4 border-top border-light">
            <p class="nav d-block fs-sm mb-sm-0 mb-4">
              <span class="text-light opacity-50">&copy;2023 All Copyrights, Melboss Music, Inc. </span>
             
            </p>
            <div class="col-auto">
              <a class="small text-white" href="https://www.melboss.com/privacy-policy" target="_new">Privacy Policy</a>
              <span class="mx-1">&middot;</span>
           <a class="small text-white" href="https://www.melboss.com/terms" target="_new">Terms</a>
              <span class="mx-1">&middot;</span>
              <a class="small text-white" href="https://melboss.com/contact-us" target="_new">Contact</a>
          </div>
            <div class="mt-n3 ms-n3">
              <a href="https://www.facebook.com/melbossmusic" class="btn btn-icon btn-secondary btn-facebook rounded-circle mt-3 ms-3" style="height:30px !important;width: 30px;">
                <i class="bx bxl-facebook"></i>
              </a>
              <a href="https://www.instagram.com/melbossmusic/" class="btn btn-icon btn-secondary btn-instagram rounded-circle mt-3 ms-3" style="height:30px !important;width: 30px;">
                <i class="bx bxl-instagram"></i>
              </a>
              <a href="https://twitter.com/melbossmusic" class="btn btn-icon btn-secondary btn-twitter rounded-circle mt-3 ms-3" style="height:30px !important;width: 30px;">
                <i class="bx bxl-twitter"></i>
              </a>
              <a href="https://www.linkedin.com/company/melboss" class="btn btn-icon btn-secondary btn-linkedin rounded-circle mt-3 ms-3" style="height:30px !important;width: 30px;">
                <i class="bx bxl-linkedin"></i>
              </a>
              <a href="https://www.youtube.com/channel/UC0ZxuOu-nDvfpkacnQQRI5Q/feed" class="btn btn-icon btn-secondary btn-youtube rounded-circle mt-3 ms-3" style="height:30px !important;width: 30px;">
                <i class="bx bxl-youtube"></i>
              </a>
            </div>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
    <!-- End of .container -->
    <!-- Vendor Scripts -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main Theme Script -->
    <script src="assets/js/theme.min.js"></script>
  </body>
</html>