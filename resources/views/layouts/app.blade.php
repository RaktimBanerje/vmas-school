<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Gymove - Fitness Bootstrap Admin Dashboard Template</title>

    <!-- Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="{{ url('assets/image/x-icon') }}" href="images/favicon.png">
    <!--<link rel="stylesheet" href="{{ url('assets/vendor/chartist/css/chartist.min.css') }}">-->
    <link href="{{ url('assets/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <!--<link href="{{ url('assets/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">-->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
        rel="stylesheet">
        
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        /* body {
            zoom: 75%;
        } */
        table td {
            white-space: nowrap;
        }
    </style>
</head>

<body>

    @include('includes.preloader')
   
    <div id="main-wrapper" class="show menu-toggle">
        @include('includes.nav')

        @include('includes.chatbox')

        @include('includes.header')

        @include('includes.menu')

        @yield('content')

        {{-- @include('includes.footer') --}}
    </div>


    <script src="{{ url('assets/vendor/global/global.min.js') }}"></script>
    <!-- Required vendors -->
    <script src="{{ url('assets/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!--<script src="{{ url('assets/vendor/chart-js/chart.bundle.min.js') }}"></script>-->
    <!--<script src="{{ url('assets/vendor/owl-carousel/owl.carousel.js') }}"></script>-->

    <!-- Chart piety plugin files -->
    <script src="{{ url('assets/vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Apex Chart -->
    <!--<script src="{{ url('assets/vendor/apexchart/apexchart.js') }}"></script>-->

    <!-- Dashboard 1 -->
    <script src="{{ url('assets/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ url('assets/js/custom.min.js') }}"></script>
    <script src="{{ url('assets/js/deznav-init.js') }}"></script>

    
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <script>
        function carouselReview() {
            /*  testimonial one function by = owl.carousel.js */
            jQuery('.testimonial-one').owlCarousel({
                nav: true,
                loop: true,
                autoplay: true,
                margin: 30,
                dots: false,
                left: true,
                navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>',
                    '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    484: {
                        items: 2
                    },
                    882: {
                        items: 3
                    },
                    1200: {
                        items: 2
                    },

                    1540: {
                        items: 3
                    },
                    1740: {
                        items: 4
                    }
                }
            })
        }
        jQuery(window).on('load', function() {
            setTimeout(function() {
                carouselReview();
            }, 1000);
        });
    </script>
    
    @yield('script')

    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @elseif(Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif
</body>

</html>
