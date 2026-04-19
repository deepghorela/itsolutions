
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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18103831083">
    </script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-18103831083');
    </script>
</head>
<body class="{{ $slug }}">
    <!-- DMCA Disclaimer Modal -->
    <div id="dmcaModal" class="dmca-modal">
        <div class="dmca-modal-content">
            <span class="dmca-close">&times;</span>
            <h2>Copyright & Authorized Use Disclaimer</h2>
            <h3>Softech Technology</h3>
            <div class="dmca-modal-body">
                <p>Softech Technology provides professional Data Recovery and Backup Services using legally obtained, licensed, and authorized tools and methodologies.</p>
                
                <p><strong>We do not promote, support, or engage in:</strong></p>
                <ul>
                    <li>Copyright infringement</li>
                    <li>Pirated software usage</li>
                    <li>Unauthorized data access</li>
                    <li>Circumvention of digital rights management (DRM)</li>
                </ul>
                
                <p>All laptop/PC services are performed only with the explicit consent and authorization of the system owner. Any hardware replacement activity is conducted strictly for lawful purposes, including accidental deletion, hardware failure, or system corruption.</p>
                
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
