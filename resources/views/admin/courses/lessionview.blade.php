</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}">
    <meta name="theme-color" content="#3063A0">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.min.css') }}" data-skin="default">
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins_plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="
        https://cdn.jsdelivr.net/npm/@icon/icofont@1.0.1-alpha.1/icofont.min.css
        "
        rel="stylesheet">
    @yield('header')
</head>

<body class=" default-skin pace-done">
    <div class="app">
        @include('admin.includes.header');

        <aside class="app-aside app-aside-expand-md app-aside-light">
            <div class="aside-content">
                <header class="aside-header d-block d-md-none">
                    <button class="btn-account" type="button" data-toggle="collapse"
                        data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img
                                src="assets/images/avatars/profile.jpg" alt=""></span> <span
                            class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span
                            class="account-summary"><span class="account-name">Beni Arisandi</span> <span
                                class="account-description">Marketing Manager</span></span></button>
                    <div id="dropdown-aside" class="dropdown-aside collapse">
                        <div class="pb-3">
                            <a class="dropdown-item" href="user-profile.html"><span
                                    class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item"
                                href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span>
                                Logout</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help
                                Center</a>
                            <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item"
                                href="#">Keyboard Shortcuts</a>
                        </div>
                    </div>
                </header>
                @include('admin.includes.sidebar')
                <footer class="aside-footer border-top p-2">
                </footer>
            </div>
        </aside>
        <main class="app-main">
            <div class="wrapper">
                <div class="page">
                    <div class="tution sp_bottom_100 sp_top_50">
                        <div class="container-fluid full__width__padding">
                            <header class="page-title-bar">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">
                                            <a href="{{ route('courses.index') }}"><i
                                                    class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quay lại</a>
                                        </li>
                                    </ol>
                                </nav>
                            </header>
                            <div class="row">
                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">

                                    <div class="accordion content__cirriculum__wrap" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">

                                                    Bài Học
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">





                                                    @foreach ($lessions as $lession)
                                                        <div class="scc__wrap" data-lesson-id="{{ $lession->id }}">
                                                            <div class="scc__info">
                                                                <i class="icofont-file-text"></i>
                                                                <h5> <a href="#" class="lesson-link"
                                                                        data-video-url="{{ asset('storage/videos/' . $lession->video_url) }}">
                                                                        <span>{{ $lession->name }}</span>
                                                                    </a>
                                                                </h5>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                                    <div class="lesson__content__main">
                                        <div class="lesson__content__wrap">
                                            <h3>Video Khóa Học {{ $item->name }}</h3>

                                        </div>

                                        <div class="plyr__video-embed rbtplayer">
                                            <div class="video-wrapper">
                                                <iframe id="lessonVideoIframe" allowfullscreen
                                                    allow="autoplay"></iframe>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <header class="page-title-bar">
                                    <nav aria-label="breadcrumb">
                                        
                                    </nav>
                                    
                                </header>
                                <div class="page-section">
                                    <div class="row">
                                       
                                        <div class="col-lg-8">
                                            <div class="card card-fluid">
                                                <h6 class="card-header"> Nội dung bài học </h6>
                                                <div class="card-body">
                                                    <div class="media mb-3">
                                                       
                                                        <div class="media-body pl-3">
                                                            <div id="progress-avatar" class="progress progress-xs fade">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                                    role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form method="post">
                                                        <div class="form-row">
                                                            <label for="input01" class="col-md-3"></label>
                            
                                                            <div class="col-md-9 mb-3">
                                                                <div class="custom-file">
                                                                    <p>nội dung</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="form-actions">
                                                            <a class="btn btn-dark" href="{{ route('courses.index') }}">
                                                                <i class="fa fa-arrow-left mr-2"></i> Quay lại
                                                            </a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    .video-wrapper {
                                        position: relative;
                                        overflow: hidden;
                                        padding-bottom: 56.25%;

                                    }

                                    .video-wrapper iframe {
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        width: 100%;
                                        height: 100%;
                                    }
                                </style>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <header class="page-title-bar">
                        <h1 class="page-title"></h1>
                    </header>
                    <div class="page-section">
                        <div class="section-block">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/pace-progress/pace.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/stacked-menu/js/stacked-menu.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="assets/javascript/theme.min.js"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin_plyr.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lessonLinks = document.querySelectorAll('.lesson-link');
            const videoIframe = document.getElementById('lessonVideoIframe');
            const contentContainer = document.getElementById('lessonContentContainer');
    
            lessonLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
    
                    const videoUrl = link.dataset.videoUrl;
                    const content = link.dataset.content;
    
                    if (videoUrl) {
                        videoIframe.src = videoUrl;
                        contentContainer.style.display = 'none'; // Hide content if video is present
                    } else if (content) {
                        contentContainer.innerHTML = content;
                        contentContainer.style.display = 'block'; // Show content if no video
                        videoIframe.src = ''; // Clear video source
                    } else {
                        console.error('Video URL and content not found');
                    }
                });
            });
        });
    </script>
    



    @yield('footer')
</body>

</html>
