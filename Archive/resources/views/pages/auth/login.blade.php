
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="/assets/imgs/logo-icon.png" rel="icon" />
<title>Sekolah NOAH - Login Page</title>
<meta name="description" content="Login and Register Form Html Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" type="text/css" href="https://harnishdesign.net/demo/html/oxyy/vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://harnishdesign.net/demo/html/oxyy/vendor/font-awesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="https://harnishdesign.net/demo/html/oxyy/css/stylesheet.css" />
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="#" />
</head>
<body>

<!-- Preloader -->
<div class="preloader">
  <div class="lds-ellipsis">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- Preloader End -->

<div id="main-wrapper" class="oxyy-login-register">
  <div class="container-fluid px-0">
    <div class="row g-0 min-vh-100"> 
      <!-- Welcome Text
      ========================= -->
      <div class="col-md-6">
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask opacity-8 bg-primary"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('https://harnishdesign.net/demo/html/oxyy/images/login-bg.jpg');"></div>
          <div class="hero-content w-100 min-vh-100 d-flex flex-column">
            <div class="row g-0">
              <div class="col-11 col-sm-10 col-lg-9 mx-auto">
                <div class="logo mt-5 mb-5 mb-md-0"> <a class="d-flex" href="index.html" title="Oxyy" style="padding: 15px 20px; border-radius: 255px; background: #fff; display: inline-block !important;"><img src="/assets/imgs/logo-full.png" alt="Oxyy" height="70px"></a> </div>
              </div>
            </div>
            <div class="row g-0 my-auto">
              <div class="col-11 col-sm-10 col-lg-9 mx-auto">
                <h1 class="text-16 text-white mb-4">Document<br>Management<br>System</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Welcome Text End --> 
      
      <!-- Login Form
      ========================= -->
      <div class="col-md-6 d-flex">
        <div class="container my-auto py-5">
          <div class="row g-0">
            <div class="col-11 col-sm-10 col-lg-9 col-xl-8 mx-auto">
              <h3 class="fw-600 mb-4">Hey, Hello 👋</h3>
              <form id="loginForm" method="POST" action="/login">
                {{ csrf_field() }}
                @if (session('ERR'))
                    <div class="alert alert-danger" role="alert">
                        {!! session('ERR') !!}
                    </div>
                @endif
                <div class="mb-3">
                  <label for="emailAddress" class="form-label">Email Address</label>
                  <input type="email" name="email" class="form-control" id="emailAddress" required placeholder="Enter Your Email">
                </div>
                <div class="mb-3">
                  <label for="loginPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="loginPassword" required placeholder="Enter Password">
                </div>
                <div class="row mt-4">
                  <div class="col">
                    <div class="form-check">
                      <input id="remember-me" name="remember" class="form-check-input" type="checkbox">
                      <label class="form-check-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="col text-end"><a href="forgot-password.html">Forgot Password ?</a></div>
                </div>
                <div class="d-grid my-4">
					<button class="btn btn-primary" type="submit">Login</button>
				</div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Login Form End --> 
    </div>
  </div>
</div>

<!-- Styles Switcher -->
<div id="styles-switcher" class="left">
  <h5>Color Switcher</h5>
  <hr>
  <ul class="mb-0">
    <li class="blue" data-bs-toggle="tooltip" title="Blue" data-path="#"></li>
    <li class="indigo" data-bs-toggle="tooltip" title="Indigo" data-path="https://harnishdesign.net/demo/html/oxyy/css/color-indigo.css"></li>
    <li class="purple" data-bs-toggle="tooltip" title="Purple" data-path="https://harnishdesign.net/demo/html/oxyy/css/color-purple.css"></li>
    <li class="pink" data-bs-toggle="tooltip" title="Pink" data-path="https://harnishdesign.net/demo/html/oxyy/css/color-pink.css"></li>
    <li class="red" data-bs-toggle="tooltip" title="Red" data-path="https://harnishdesign.net/demo/html/oxyy/css/color-red.css"></li>
    <li class="orange" data-bs-toggle="tooltip" title="Orange" data-path="https://harnishdesign.net/demo/html/oxyy/css/color-orange.css"></li>
    <li class="yellow" data-bs-toggle="tooltip" title="Yellow" data-path="https://harnishdesign.net/demo/html/oxyy/css/color-yellow.css"></li>
    <li class="teal" data-bs-toggle="tooltip" title="Teal" data-path="https://harnishdesign.net/demo/html/oxyy/css/color-teal.css"></li>
    <li class="green" data-bs-toggle="tooltip" title="Green" data-path="https://harnishdesign.net/demo/html/oxyy/css/color-green.css"></li>
    <li class="cyan" data-bs-toggle="tooltip" title="Cyan" data-path="https://harnishdesign.net/demo/html/oxyy/css/color-cyan.css"></li>
    <li class="brown" data-bs-toggle="tooltip" title="Brown" data-path="https://harnishdesign.net/demo/html/oxyy/css/color-brown.css"></li>
  </ul>
</div>
<!-- Styles Switcher End --> 

<!-- Script --> 
<script src="https://harnishdesign.net/demo/html/oxyy/vendor/jquery/jquery.min.js"></script> 
<script src="https://harnishdesign.net/demo/html/oxyy/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<!-- Style Switcher --> 
<script src="https://harnishdesign.net/demo/html/oxyy/js/switcher.min.js"></script> 
<script src="https://harnishdesign.net/demo/html/oxyy/js/theme.js"></script>
</body>
</html>