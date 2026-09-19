<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<meta name="description" content="@yield('meta_description', setting('meta_description', 'Experience pure, traditional stone-ground chakki fresh atta from Raghuvir.'))">
	<meta name="keywords" content="@yield('meta_keywords', setting('meta_keywords', 'raghuvir atta, whole wheat flour'))">
	<meta name="author" content="{{ setting('site_title', 'Raghuvir Atta') }}">
	<!-- Page Title -->
    <title>@yield('title', setting('site_title', 'Raghuvir Atta - 100% Pure Sharbati Whole Wheat Flour'))</title>
	<!-- Favicon Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ setting_asset('site_favicon', 'images/Raghuvir Favicon.png') }}">
	<!-- Google Fonts Css-->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&amp;display=swap" rel="stylesheet">
	<!-- Bootstrap Css -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
	<!-- SlickNav Css -->
	<link href="{{ asset('css/slicknav.min.css') }}" rel="stylesheet">
	<!-- Swiper Css -->
	<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
	<!-- Font Awesome Icon Css-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" media="screen">
	<!-- Animated Css -->
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
	<!-- Mouse Cursor Css File -->
	<link rel="stylesheet" href="{{ asset('css/mousecursor.css') }}">
	<!-- Main Custom Css -->
	<link href="{{ asset('css/custom.css') }}?v={{ file_exists(public_path('css/custom.css')) ? filemtime(public_path('css/custom.css')) : time() }}" rel="stylesheet" media="screen">
	@stack('styles')
	@if(setting('custom_header_scripts'))
		{!! setting('custom_header_scripts') !!}
	@endif
</head>

<body>

	<div class="preloader">
		<div class="logo-container" id="logoWrapper">
			<svg viewBox="0 0 253 294" xmlns="http://www.w3.org/2000/svg">
				<!-- Left Leaf -->
				<path id="leaf-left" class="leaf left-leaf" fill="#74583D" d="M1.14,42.02 C-0.84,43.89 0.11,50.76 -0.05,54.74 C-0.21,58.71 0.06,64.38 0.06,68.51 C0.05,72.64 -0.06,78.14 -0.07,82.25 C-0.08,86.37 -0.03,91.84 -0.01,95.95 C0.02,100.06 0.09,105.54 0.09,109.66 C0.10,113.79 0.06,119.31 0.02,123.46 C-0.01,127.60 -0.13,133.16 -0.15,137.28 C-0.16,141.41 -0.19,146.92 -0.10,150.98 C-0.00,155.05 0.22,160.43 0.47,164.39 C0.72,168.35 1.13,173.56 1.58,177.41 C2.02,181.26 2.69,186.30 3.42,190.06 C4.16,193.82 5.37,198.79 6.48,202.46 C7.58,206.14 9.32,210.99 10.79,214.54 C12.27,218.10 14.49,222.78 16.32,226.18 C18.16,229.59 20.84,234.03 23.02,237.25 C25.20,240.47 28.33,244.64 30.84,247.63 C33.34,250.63 36.91,254.47 39.73,257.21 C42.55,259.94 46.53,263.42 49.64,265.85 C52.74,268.28 57.11,271.33 60.44,273.42 C63.77,275.50 68.38,278.07 71.85,279.76 C75.32,281.45 80.03,283.41 83.57,284.69 C87.11,285.98 91.78,287.25 95.44,288.34 C99.10,289.43 104.43,291.51 107.95,291.94 C111.46,292.37 117.04,293.26 118.86,291.18 C120.69,289.11 119.97,282.15 120.12,278.12 C120.28,274.09 119.90,268.46 119.90,264.32 C119.90,260.18 120.10,254.63 120.13,250.51 C120.15,246.39 120.09,240.95 120.05,236.85 C120.01,232.76 119.89,227.32 119.86,223.22 C119.83,219.11 119.83,213.61 119.85,209.48 C119.88,205.34 119.99,199.78 120.04,195.62 C120.10,191.46 120.20,185.91 120.21,181.77 C120.21,177.63 120.21,172.12 120.10,168.04 C120.00,163.95 119.79,158.54 119.50,154.54 C119.21,150.55 118.71,145.28 118.16,141.41 C117.61,137.54 116.73,132.46 115.84,128.73 C114.96,125.00 113.58,120.12 112.29,116.53 C110.99,112.94 109.00,108.24 107.22,104.80 C105.45,101.37 102.72,96.85 100.46,93.61 C98.21,90.36 94.86,86.14 92.20,83.15 C89.54,80.17 85.71,76.36 82.73,73.72 C79.76,71.09 75.58,67.82 72.37,65.58 C69.16,63.35 64.73,60.67 61.35,58.83 C57.96,56.99 53.33,54.81 49.82,53.32 C46.31,51.82 41.54,50.06 37.94,48.85 C34.33,47.64 29.50,46.23 25.79,45.24 C22.07,44.26 16.88,42.77 13.19,42.28 C9.49,41.80 3.13,40.15 1.14,42.02 Z"/>
				<!-- Right Leaf -->
				<path id="leaf-right" class="leaf right-leaf" fill="#74583D" d="M241.60,129.51 C238.93,129.84 234.98,130.90 232.20,131.56 C229.42,132.22 225.76,133.17 223.06,133.94 C220.35,134.72 216.79,135.83 214.16,136.75 C211.54,137.66 208.08,138.97 205.53,140.05 C202.98,141.13 199.64,142.68 197.17,143.94 C194.70,145.21 191.46,147.03 189.07,148.50 C186.69,149.98 183.55,152.10 181.26,153.80 C178.98,155.49 175.98,157.90 173.82,159.79 C171.66,161.68 168.85,164.34 166.84,166.41 C164.83,168.48 162.25,171.36 160.42,173.59 C158.59,175.81 156.28,178.89 154.66,181.25 C153.05,183.61 151.04,186.85 149.67,189.32 C148.30,191.79 146.65,195.16 145.54,197.73 C144.44,200.29 143.17,203.77 142.33,206.42 C141.49,209.06 140.55,212.64 139.92,215.36 C139.30,218.08 138.63,221.76 138.19,224.55 C137.74,227.34 137.28,231.11 136.98,233.97 C136.68,236.82 136.38,240.68 136.17,243.60 C135.97,246.51 135.76,250.46 135.62,253.42 C135.48,256.39 135.33,260.39 135.25,263.34 C135.16,266.30 135.12,270.16 135.06,273.13 C134.99,276.10 134.64,280.29 134.83,283.17 C135.02,286.04 134.90,290.97 136.34,292.31 C137.77,293.65 141.84,292.44 144.39,292.11 C146.95,291.78 150.70,290.78 153.38,290.12 C156.06,289.45 159.62,288.48 162.26,287.66 C164.90,286.85 168.40,285.67 170.99,284.70 C173.58,283.72 177.00,282.31 179.53,281.15 C182.06,279.99 185.39,278.33 187.84,276.97 C190.30,275.61 193.52,273.66 195.88,272.08 C198.25,270.50 201.35,268.25 203.60,266.46 C205.86,264.67 208.80,262.14 210.93,260.16 C213.06,258.18 215.81,255.42 217.78,253.28 C219.75,251.14 222.28,248.17 224.07,245.89 C225.86,243.62 228.13,240.49 229.72,238.10 C231.30,235.71 233.29,232.46 234.64,229.99 C236.00,227.52 237.64,224.17 238.76,221.64 C239.87,219.11 241.16,215.70 242.08,213.12 C242.99,210.53 244.05,207.05 244.83,204.40 C245.62,201.75 246.59,198.16 247.30,195.45 C248.02,192.74 249.00,189.05 249.60,186.34 C250.21,183.62 250.97,180.10 251.35,177.36 C251.73,174.61 252.03,170.95 252.14,168.05 C252.24,165.15 252.08,161.04 252.04,158.02 C252.00,155.00 251.83,150.92 251.86,147.91 C251.90,144.89 252.55,140.71 252.28,137.93 C252.00,135.16 251.64,130.65 250.04,129.38 C248.44,128.12 244.28,129.19 241.60,129.51 Z"/>
				<!-- Top Leaf -->
				<path id="leaf-top" class="leaf top-leaf" fill="#EF801C" d="M245.78,0.75 C243.60,0.81 239.77,2.07 237.22,2.67 C234.67,3.28 231.28,4.10 228.76,4.77 C226.24,5.43 222.90,6.36 220.41,7.13 C217.93,7.89 214.64,8.97 212.20,9.86 C209.76,10.76 206.53,12.02 204.14,13.07 C201.75,14.12 198.59,15.62 196.26,16.85 C193.92,18.08 190.84,19.86 188.58,21.28 C186.32,22.70 183.35,24.72 181.18,26.32 C179.02,27.92 176.19,30.17 174.15,31.93 C172.10,33.69 169.45,36.15 167.55,38.06 C165.65,39.97 163.20,42.62 161.47,44.66 C159.73,46.70 157.53,49.52 155.98,51.69 C154.44,53.85 152.51,56.82 151.18,59.09 C149.85,61.36 148.22,64.47 147.09,66.83 C145.97,69.20 144.63,72.43 147.09,66.83 C145.97,69.20 144.63,72.43 143.71,74.88 C142.80,77.34 141.72,80.67 141.00,83.21 C140.28,85.74 139.46,89.17 138.93,91.78 C138.41,94.38 139.46,89.17 138.93,91.78 C138.41,94.38 137.83,97.91 137.48,100.57 C137.14,103.24 136.82,106.84 136.62,109.55 C136.42,112.27 136.30,115.93 136.17,118.68 C136.04,121.43 135.92,125.10 135.77,127.88 C135.61,130.66 135.24,134.32 135.13,137.21 C135.02,140.10 134.07,145.33 135.03,147.14 C135.99,148.95 139.28,149.14 141.54,149.30 C143.80,149.46 147.53,148.63 150.08,148.20 C152.63,147.77 156.03,147.06 158.55,146.43 C161.07,145.80 164.42,144.83 166.90,144.01 C169.38,143.19 172.66,141.96 175.09,140.95 C177.52,139.93 180.72,138.45 183.08,137.25 C185.44,136.05 188.55,134.32 190.83,132.93 C193.11,131.55 196.10,129.57 198.29,128.01 C200.47,126.45 203.33,124.25 205.40,122.53 C207.48,120.81 210.18,118.41 212.13,116.54 C214.07,114.67 216.59,112.08 218.40,110.08 C220.21,108.08 222.52,105.33 224.17,103.21 C225.82,101.09 227.92,98.19 229.39,95.96 C230.87,93.74 232.72,90.71 234.01,88.39 C235.30,86.08 236.89,82.94 238.00,80.55 C239.12,78.16 240.48,74.93 241.43,72.48 C242.38,70.04 243.54,66.74 244.34,64.25 C245.14,61.76 246.11,58.41 246.78,55.89 C247.46,53.38 248.26,50.00 248.81,47.47 C249.37,44.94 250.04,41.58 250.48,39.03 C250.92,36.48 251.44,33.11 251.72,30.46 C252.00,27.82 252.27,24.23 252.34,21.41 C252.41,18.58 252.28,14.47 252.19,11.61 C252.10,8.74 252.69,3.91 251.72,2.28 C250.76,0.65 247.95,0.69 245.78,0.75 Z"/>
			</svg>
		</div>
	</div>
	<!-- Preloader End -->



    <!-- Header Start -->
    @include('partials.header')
	<!-- Header End -->

    @yield('content')

    <!-- Main Footer Start -->
    @hasSection('footer')
        @yield('footer')
    @else
        @include('partials.footer')
    @endif
    <!-- Main Footer End -->
    
    <!-- Jquery Library File -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js file -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Validator js file -->
    <script src="{{ asset('js/validator.min.js') }}"></script>
    <!-- SlickNav js file -->
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <!-- Swiper js file -->
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <!-- Counter js file -->
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <!-- Magnific js file -->
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <!-- SmoothScroll -->
    <script src="{{ asset('js/SmoothScroll.js') }}"></script>
    <!-- Parallax js -->
    <script src="{{ asset('js/parallaxie.js') }}"></script>
    <!-- MagicCursor js file -->
    <script src="{{ asset('js/gsap.min.js') }}"></script>
    <script src="{{ asset('js/magiccursor.js') }}"></script>
    <!-- Text Effect js file -->
    <script src="{{ asset('js/SplitText.min.js') }}"></script>
    <script src="{{ asset('js/ScrollTrigger.min.js') }}"></script>
    <!-- YTPlayer js File -->
    <script src="{{ asset('js/jquery.mb.YTPlayer.min.js') }}"></script>
    <!-- Wow js file -->
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!-- Main Custom js file -->
    <script src="{{ asset('js/function.js') }}"></script>
    <!-- Scroll To Top Button -->
    <a href="#top" id="scroll-to-top" class="scroll-to-top" style="
        position: fixed;
        bottom: 98px;
        right: 30px;
        width: 46px;
        height: 46px;
        background-color: var(--accent-color);
        color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
        text-decoration: none;
    ">
        <i class="fa-solid fa-chevron-up"></i>
    </a>

    <style>
        .scroll-to-top:hover {
            background-color: var(--primary-color) !important;
            color: #ffffff !important;
            transform: translateY(-5px);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollTopBtn = document.getElementById('scroll-to-top');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    scrollTopBtn.style.opacity = '1';
                    scrollTopBtn.style.visibility = 'visible';
                } else {
                    scrollTopBtn.style.opacity = '0';
                    scrollTopBtn.style.visibility = 'hidden';
                }
            });
        });
    </script>

</body>
</html>
