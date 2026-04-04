
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @yield('head_start')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title', env('APP_NAME'))</title>
    <meta name="description" content="@yield('meta_description', env('META_DESCRIPTION'))">
    <meta name="keywords" content="@yield('meta_keywords', env('META_KEYWORDS'))">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <link href="//www.google-analytics.com" rel="dns-prefetch" >
    <link href="//graph.facebook.com" rel="dns-prefetch" >
    <link href="//csi.gstatic.com" rel="dns-prefetch" >
    <link href="//fonts.googleapis.com" rel="dns-prefetch" >
    <link href="//maps.googleapis.com" rel="dns-prefetch" >
    <link href="//maps.gstatic.com" rel="dns-prefetch" >
    <link href="//www.gstatic.com" rel="dns-prefetch" >
    <link href="//fonts.gstatic.com" rel="dns-prefetch" >
    <link href="//www.google.com" rel="dns-prefetch" >
    <link rel="stylesheet" href="{{ getAssetPath('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ getAssetPath('assets/css/common.css') }}">
    @if(pageSpecificMediaExists($slug, 'css'))
    <link rel="stylesheet" href="{!! pageSpecificMediaExists($slug, 'css') !!}">
    @endif
    <style>
        /* DMCA Modal Styles */
        .dmca-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.6);
            animation: fadeIn 0.3s;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .dmca-modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 0;
            border: 1px solid #888;
            border-radius: 8px;
            width: 90%;
            max-width: 700px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            animation: slideDown 0.3s;
        }
        
        @keyframes slideDown {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .dmca-modal-content h2 {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            margin: 0;
            border-radius: 8px 8px 0 0;
            font-size: 22px;
        }
        
        .dmca-modal-content h3 {
            color: #2c3e50;
            padding: 15px 20px 0;
            margin: 0;
            font-size: 18px;
        }
        
        .dmca-modal-body {
            padding: 20px 30px;
            max-height: 60vh;
            overflow-y: auto;
            color: #333;
            line-height: 1.6;
        }
        
        .dmca-modal-body p {
            margin-bottom: 15px;
        }
        
        .dmca-modal-body ul {
            margin: 10px 0 15px 20px;
            padding-left: 20px;
        }
        
        .dmca-modal-body li {
            margin-bottom: 8px;
        }
        
        .dmca-modal-footer {
            padding: 15px 30px 25px;
            text-align: center;
        }
        
        .dmca-close {
            color: white;
            float: right;
            font-size: 32px;
            font-weight: bold;
            line-height: 20px;
            cursor: pointer;
            padding: 0 10px;
        }
        
        .dmca-close:hover,
        .dmca-close:focus {
            opacity: 0.7;
        }
        
        .btn-dmca-accept {
            background-color: #27ae60;
            color: white;
            padding: 12px 40px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn-dmca-accept:hover {
            background-color: #229954;
        }
        
        @media (max-width: 768px) {
            .dmca-modal-content {
                width: 95%;
                margin: 10% auto;
            }
            
            .dmca-modal-content h2 {
                font-size: 18px;
                padding: 15px;
            }
            
            .dmca-modal-body {
                padding: 15px 20px;
            }
            
            .dmca-modal-footer {
                padding: 10px 20px 20px;
            }
        }
    </style>
    {{-- <link rel="icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon"> --}}
    <link rel="icon" href="{!! asset('favicon-32x32.png') !!}" type="image/png">
    <meta property="og:image" content="@yield('meta_image', getLightLogoUrl())">
    @if(!empty(config('voyager.additional_css')))
        @foreach(config('voyager.additional_css') as $css)<link rel="stylesheet" type="text/css" href="{{ getAssetPath($css) }}">@endforeach
    @endif
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700" rel="stylesheet">
    @stack('head_end')
</head>
<body class="{{ $slug }}">
    <!-- DMCA Disclaimer Modal -->
    <div id="dmcaModal" class="dmca-modal">
        <div class="dmca-modal-content">
            <span class="dmca-close">&times;</span>
            <h2>Copyright & Authorized Use Disclaimer</h2>
            <h3>Softech Technology</h3>
            <div class="dmca-modal-body">
                <p>Softech Technology provides professional IT Services using legally obtained, licensed, and authorized tools and methodologies.</p>
                
                <p><strong>We do not promote, support, or engage in:</strong></p>
                <ul>
                    <li>Copyright infringement</li>
                    <li>Pirated software usage</li>
                    <li>Unauthorized data access</li>
                    <li>Circumvention of digital rights management (DRM)</li>
                </ul>
                
                <p>All IT services are performed only with the explicit consent and authorization of the client. Any service activity is conducted strictly for lawful purposes, including system maintenance, hardware repair, and software installation.</p>
                
                <p>All trademarks, product names, and logos mentioned on this website belong to their respective owners and are used solely for descriptive and informational purposes.</p>
                
                <p>If you believe any content on this website raises a copyright concern, please contact us for prompt review and resolution.</p>
                
                <p><strong>By using this website, you agree to comply with all applicable copyright and intellectual property laws.</strong></p>
            </div>
            <div class="dmca-modal-footer">
                <button id="dmcaAcceptBtn" class="btn-dmca-accept">I Understand & Accept</button>
            </div>
        </div>
    </div>

    <div class="main-page-container">
        @include('common.header')
        @yield('body_start')
    </div>
    
    @yield('content')
    <footer class="site-footer bg-primary txt-white">
        @include('common.footer')
        @yield('body_end')
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/919643338931?text=Hi%2C%20I%20would%20like%20to%20inquire%20about%20your%20services" 
       class="whatsapp-float" 
       target="_blank" 
       rel="noopener noreferrer"
       aria-label="Chat on WhatsApp"
       title="Chat on WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 175.216 175.552">
            <defs>
                <linearGradient id="b" x1="85.915" x2="86.535" y1="32.567" y2="137.092" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#57d163"/>
                    <stop offset="1" stop-color="#23b33a"/>
                </linearGradient>
                <filter id="a" width="1.115" height="1.114" x="-.057" y="-.057" color-interpolation-filters="sRGB">
                    <feGaussianBlur stdDeviation="3.531"/>
                </filter>
            </defs>
            <path fill="#b3b3b3" d="m54.532 138.45 2.235 1.324c9.387 5.571 20.15 8.518 31.126 8.523h.023c33.707 0 61.139-27.426 61.153-61.135.006-16.335-6.349-31.696-17.895-43.251A60.75 60.75 0 0 0 87.94 25.983c-33.733 0-61.166 27.423-61.178 61.13a60.98 60.98 0 0 0 9.349 32.535l1.455 2.312-6.179 22.558zm-40.811 23.544L24.16 123.88c-6.438-11.154-9.825-23.808-9.821-36.772.017-40.556 33.021-73.55 73.578-73.55 19.681.01 38.154 7.669 52.047 21.572s21.537 32.383 21.53 52.037c-.018 40.553-33.027 73.553-73.578 73.553h-.032c-12.313-.005-24.412-3.094-35.159-8.954zm0 0" filter="url(#a)"/>
            <path fill="#fff" d="m12.966 161.238 10.439-38.114a73.42 73.42 0 0 1-9.821-36.772c.017-40.556 33.021-73.55 73.578-73.55 19.681.01 38.154 7.669 52.047 21.572s21.537 32.383 21.53 52.037c-.018 40.553-33.027 73.553-73.578 73.553h-.032c-12.313-.005-24.412-3.094-35.159-8.954z"/>
            <path fill="url(#linearGradient1780)" d="m87.184 25.227c-33.733 0-61.166 27.423-61.178 61.13a60.98 60.98 0 0 0 9.349 32.535l1.455 2.312-6.179 22.559 23.146-6.069 2.235 1.324c9.387 5.571 20.15 8.518 31.126 8.524h.023c33.707 0 61.14-27.426 61.153-61.135a60.75 60.75 0 0 0-17.895-43.251 60.75 60.75 0 0 0-43.235-17.929z"/>
            <path fill="url(#b)" d="m87.184 25.227c-33.733 0-61.166 27.423-61.178 61.13a60.98 60.98 0 0 0 9.349 32.535l1.455 2.313-6.179 22.558 23.146-6.069 2.235 1.324c9.387 5.571 20.15 8.517 31.126 8.523h.023c33.707 0 61.14-27.426 61.153-61.135a60.75 60.75 0 0 0-17.895-43.251 60.75 60.75 0 0 0-43.235-17.928z"/>
            <path fill="#fff" fill-rule="evenodd" d="M68.772 55.603c-1.378-3.061-2.828-3.123-4.137-3.176l-3.524-.043c-1.226 0-3.218.46-4.902 2.3s-6.435 6.287-6.435 15.332 6.588 17.785 7.506 19.013 12.718 20.381 31.405 27.75c15.529 6.124 18.689 4.906 22.061 4.6s10.877-4.447 12.408-8.74 1.532-7.971 1.073-8.74-1.685-1.226-3.525-2.146-10.877-5.367-12.562-5.981-2.91-.919-4.137.921-4.746 5.979-5.819 7.206-2.144 1.381-3.984.462-7.76-2.861-14.784-9.124c-5.465-4.873-9.154-10.891-10.228-12.73s-.114-2.835.808-3.751c.825-.824 1.838-2.147 2.759-3.22s1.224-1.84 1.836-3.065.307-2.301-.153-3.22-4.032-10.011-5.666-13.647"/>
        </svg>
    </a>
    
    <script async src="{!! getAssetPath('assets/js/bootstrap.min.js') !!}"></script>
    @stack('post_js')
    
    <!-- DMCA Modal Script -->
    <script>
        (function() {
            function initDMCAModal() {
                var modal = document.getElementById('dmcaModal');
                var closeBtn = document.querySelector('.dmca-close');
                var acceptBtn = document.getElementById('dmcaAcceptBtn');
                
                if (!modal || !closeBtn || !acceptBtn) return;
                
                // Check if user has already seen the modal
                if (!localStorage.getItem('dmcaAccepted')) {
                    modal.style.display = 'block';
                }
                
                // Close modal when clicking X
                closeBtn.onclick = function() {
                    modal.style.display = 'none';
                    localStorage.setItem('dmcaAccepted', 'true');
                };
                
                // Close modal when clicking Accept button
                acceptBtn.onclick = function() {
                    modal.style.display = 'none';
                    localStorage.setItem('dmcaAccepted', 'true');
                };
                
                // Close modal when clicking outside of it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                        localStorage.setItem('dmcaAccepted', 'true');
                    }
                };
            }
            
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initDMCAModal);
            } else {
                initDMCAModal();
            }
        })();
    </script>
    
    @if(pageSpecificMediaExists($slug, 'js'))
    <script defer src="{!! pageSpecificMediaExists($slug, 'js') !!}"></script>
    @endif
</body>
</html>
