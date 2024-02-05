<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biophysics-Lab</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dist/img/logo.png')}}">
    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('assets/css/animate_css/animate_css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <style>
       .social{
        display: flex;
       }
       #social-links ul{
        list-style: none;
       }
       #social-links ul li a{
        
        margin: 1px;
       }
    </style>
</head>

<body>
    <!--Start NavigationBar and Banner-->
    <header class="head">
        <div class="fixed-top">
            <div id="address-bar" class="d-none d-md-flex justify-content-between align-items-center text-white px-md-4 py-md-2" style="background-color: rgba(0, 0, 0, 0.9);">
                <div class="contact-bar d-none d-md-flex justify-content-between gap-5" style="font-size: 14px;padding-top: 5px;padding-bottom: 0px;">
                    <p><a href="tel:09-43053573" style="color: #fff;font-size:15px;">Phone : +(95) 943053573</a></p>
                    <p><a href="mailto:kosawlinoo@gmail.com" style="color: #fff;font-size:15px;">Email : kosawlinoo@gmail.com</a></p>
                    <p>Work Hours : Mon-Fri : 09:00 - 17:00</p>
                </div>
                <div class="d-none d-lg-flex justify-content-between gap-3">
                    <a href="https://www.facebook.com/profile.php?id=100036281794669"><i class="fa-brands fa-facebook" style="color: #316FF6;"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube" style="color:#CD201F;"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin" style="color: #0077b5;"></i></a>
                </div>
            </div>
            <nav id="nav-bar" class="navbar navbar-expand-lg bg-body-tranparent">
                <div class="container-fluid">
                    <img src="{{asset('assets/logo/logo1.png')}}" alt="Lab-logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link @yield('home') @yield('white')" aria-current="page" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @yield('member') @yield('white')" href="{{route('members')}}">Members</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @yield('research') @yield('white')" href="{{route('research')}}">Researches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @yield('lab') @yield('white')" href="{{route('lab')}}">LabVisit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @yield('public') @yield('white')" href="{{route('publication')}}">Publications</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @yield('sub') @yield('white')" href="{{route('subject')}}">Subjects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @yield('event') @yield('white')" href="{{route('event')}}">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @yield('contact') @yield('white')" href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div id="head" class="hero-textbox">
            <a href="{{route('home')}}">Home</a>&nbsp;<span>|</span>&nbsp;<span style="font-size: 15px;">@yield('link')</span>
            <p>@yield('head')</p>
        </div>
    </header>
    <!--End NavigationBar and Banner-->

    @yield('content')

    <!--Start Footer Section-->
    <footer>
        <div class="container-fluid foot mt-3" style="margin: 0; padding: 0;">
            <div class="row p-3">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="p-4" style="font-style: italic; font-size: 20px;">
                        <p>"Physics research is the unending quest to decode the mysteries of the universe, an
                            exploration that unveils the hidden truths of nature and the fundamental laws that govern
                            our existence."</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('assets/logo/logo2.png')}}" alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 mt-sm-4 mt-md-2 mt-lg-0">
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <h5 class="text-center">Featured Links</h5>
                            <div class="col">
                                <ul class="featured_links">
                                    <li><a href="{{route('home')}}"><i class="fa-solid fa-chevron-right me-3 mb-4 mt-4"></i>Home</a></li>
                                    <li><a href="{{route('members')}}"><i class="fa-solid fa-chevron-right me-3 mb-4"></i>Members</a></li>
                                    <li><a href="{{route('research')}}"><i class="fa-solid fa-chevron-right me-3 mb-4"></i>Researches</a></li>
                                    <li><a href="{{route('lab')}}"><i class="fa-solid fa-chevron-right me-3"></i>LabVisit</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="featured_links">
                                    <li><a href="{{route('publication')}}"><i class="fa-solid fa-chevron-right me-3 mb-4 mt-4"></i>Publications</a></li>
                                    <li><a href="{{route('subject')}}"><i class="fa-solid fa-chevron-right me-3 mb-4"></i>Subjects</a></li>
                                    <li><a href="{{route('event')}}"><i class="fa-solid fa-chevron-right me-3 mb-4"></i>Events</a></li>
                                    <li><a href="{{route('contact')}}"><i class="fa-solid fa-chevron-right me-3"></i>Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="background-color: #21262b ;">
                <div class="d-flex justify-content-center p-3 text-white">
                    Design and Copyright &copy; by GrimReaper 2023 All rights reserved!
                </div>
            </div>
        </div>
    </footer>
    <!--End Advisor Section-->
    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/772d7d9d3c.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    @yield('scripts')
</body>

</html>