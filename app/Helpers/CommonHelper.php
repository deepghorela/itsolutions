<?php

function trucateContent($text, $limit = 26)
{
    $text = strip_tags($text);
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

function prepareMainMenu($menu, $type = 'main-menu')
{
    $output = array();
    if ($type == "main-menu") {
        $class = "list-inline main-menu";
    } elseif ($type == "footer") {
        $class = "list-inline footer-menu text-left";
    }
    $html = "<ul class='" . $class . "'>";
    foreach ($menu as $val) {
        if ($val['slug'] == 'home') {
            $link = url('/');
        } else {
            $link = !empty($val['slug']) ? url('/' . $val['slug']) : (!empty($val['custom_link']) ? $val['custom_link'] : 'javascript:;');
        }
        $title = !empty($val['title']) ? ucwords($val['title']) : $val['name'];
        if (!$val['show_icon_only']) {
            $html .= "<li><a href='" . $link . "' title='" . $title . "' " . (!empty($val['open_in_new_tab']) ? "target='_blank' rel='noreferrer'" : '') . ">" . $title . "</a></li>";
        } else {
            $html .= "<li><a href='" . $link . "' title='" . $title . "' " . (!empty($val['open_in_new_tab']) ? "target='_blank' rel='noreferrer'" : '') . "><span class='" . $val['icon'] . "'></span></a></li>";
        }
    }
    $html .= "</ul>";
    return $html;
}

function removeEmptyPTags($string)
{
    $pattern = "/<p[^>]*><\\/p[^>]*>/"; // regular expression
    $pattern = "/<p[^>]*>(?:\s|&nbsp;)*<\/p>/"; // regular expression
    return preg_replace($pattern, '', $string);
}

function getWeekArray()
{
    $timestamp = strtotime('next Sunday');
    $days = array();
    for ($i = 0; $i < 7; $i++) {
        $days[] = strftime('%A', $timestamp);
        $timestamp = strtotime('+1 day', $timestamp);
    }
    return $days;
}

function estimateReadingTime($content, $wordsPerMinute = 200)
{
    $wordCount = str_word_count(strip_tags($content));
    $readingTime = ceil($wordCount / $wordsPerMinute);

    return $readingTime;
}


/**
 * Check for page specific CSS/JS file exists
 *
 * @param [type] $page
 * @param string $mediaType css or js
 * @return string Full URL of file  if exists under public/assets/<MEDIA_TYPE>/page/<page_name>.<MEDIA_TYPE>
 */
function pageSpecificMediaExists($page, $mediaType = 'css')
{
    // Define the base path and URL
    $basePath = public_path("assets/{$mediaType}/page/{$page}.{$mediaType}");
    $baseUrl = getAssetPath("assets/{$mediaType}/page/{$page}.{$mediaType}");

    // Check if the file exists
    if (file_exists($basePath)) {
        // Return the full URL of the file if it exists
        return $baseUrl;
    }

    // Return null if the file does not exist
    return null;
}

function servicesDetails()
{
    $services = array(
        array(
            "icon" => "icons/007-computer.png",
            "heading" => "Computer/PC Setup",
            "short_description" => "Professional setup of computers and PCs, ensuring optimal performance and configuration.",
            "description" => "We offer professional setup of computers and PCs, ensuring all software and hardware components are properly installed and configured for optimal performance. Our technicians ensure that every aspect of your system is set up to meet your specific needs, including software installation, hardware connections, and network setup. Trust us to get your new computer or PC ready for use with minimal hassle and maximum efficiency."
        ),
        array(
            "icon" => "icons/008-laptop-1.png",
            "heading" => "Laptop Repair",
            "short_description" => "Expert laptop repair services to address all hardware and software issues effectively.",
            "description" => "Our expert technicians provide top-notch laptop repair services, handling everything from hardware replacements to software troubleshooting to get your laptop running smoothly. We address common issues such as screen repairs, battery replacements, keyboard malfunctions, and software errors. Our goal is to provide quick and reliable solutions to restore your laptop's functionality, ensuring minimal downtime and maximum productivity for you."
        ),
        array(
            "icon" => "icons/006-office.png",
            "heading" => "Computer Repair",
            "short_description" => "Reliable computer repair services for all types of hardware and software problems.",
            "description" => "We offer reliable computer repair services, addressing both hardware and software issues. Our technicians are skilled in diagnosing and fixing problems such as motherboard failures, hard drive issues, software crashes, and more. We aim to restore your computer's functionality quickly and efficiently, ensuring that your system is up and running as soon as possible. Trust us to handle all your computer repair needs with expertise and care."
        ),
        array(
            "icon" => "icons/001-antivirus.png",
            "heading" => "Virus Removal",
            "short_description" => "Effective virus removal services to secure and restore your computer's performance.",
            "description" => "Our virus removal services effectively eliminate malware, spyware, and viruses from your computer, ensuring your system's security and performance are restored. We use advanced tools and techniques to identify and remove malicious software, protecting your data and personal information. Our technicians also provide advice on preventing future infections, helping you maintain a secure and efficient computing environment."
        ),
        array(
            "icon" => "icons/010-windows.png",
            "heading" => "Operating System install",
            "short_description" => "Install and configure operating systems for optimal performance and user experience.",
            "description" => "We provide installation and configuration of operating systems, ensuring that your computer is running the latest and most efficient version for your needs. Our services include installing Windows, macOS, Linux, and other operating systems, as well as configuring settings for optimal performance. We ensure that your system is up-to-date, secure, and tailored to your specific requirements, providing a seamless and efficient computing experience."
        ),
        array(
            "icon" => "icons/014-secure.png",
            "heading" => "Data Security",
            "short_description" => "Comprehensive data security solutions to protect your sensitive information.",
            "description" => "We provide comprehensive data security solutions to protect your sensitive information from unauthorized access, ensuring your data remains safe and secure. Our services include data encryption, secure backups, access control, and threat detection. We tailor our security measures to meet your specific needs, helping you safeguard your personal and business data against potential threats. Trust us to keep your data secure and protected."
        ),
        array(
            "icon" => "icons/012-router.png",
            "heading" => "Wireless Networking",
            "short_description" => "Setup and maintenance of wireless networks for reliable connectivity.",
            "description" => "Our services include setup and maintenance of wireless networks, ensuring seamless connectivity and optimal performance for all your devices. We handle everything from network design and installation to troubleshooting and security enhancements. Our technicians ensure that your wireless network is fast, reliable, and secure, providing you with uninterrupted internet access for both personal and business use."
        ),
        array(
            "icon" => "icons/018-cctv.png",
            "heading" => "CCTV Install",
            "short_description" => "Professional CCTV installation services for enhanced security and monitoring.",
            "description" => "We offer professional CCTV installation services, setting up security cameras to monitor and protect your property with high-quality video surveillance. Our technicians assess your security needs and install cameras at strategic locations to ensure comprehensive coverage. We also provide training on how to use the CCTV system effectively, helping you maintain a secure environment. Trust us for reliable and efficient CCTV installation services."
        ),
        array(
            "icon" => "icons/005-cctv-camera.png",
            "heading" => "CCTV Support",
            "short_description" => "Ongoing support for CCTV systems to ensure continuous security monitoring.",
            "description" => "Our team provides ongoing support for CCTV systems, ensuring they remain functional and effective in safeguarding your property. We offer regular maintenance, troubleshooting, and upgrades to keep your system up-to-date. Our support services ensure that your CCTV system operates smoothly, providing you with reliable security monitoring. Trust us to handle all your CCTV support needs with professionalism and expertise."
        ),
        array(
            "icon" => "icons/003-laptop.png",
            "heading" => "Laptop Rental",
            "short_description" => "Affordable laptop rental services for short-term and long-term needs.",
            "description" => "We offer affordable laptop rental services, providing high-quality laptops for short-term and long-term use to meet your business or personal needs. Our rental laptops are equipped with the latest software and hardware, ensuring optimal performance. We offer flexible rental terms and competitive pricing, making it easy for you to access the technology you need without the hassle of ownership. Trust us for reliable and cost-effective laptop rental services."
        ),
        array(
            "icon" => "icons/004-rent.png",
            "heading" => "Computer Rental",
            "short_description" => "Reliable computer rental services for temporary use.",
            "description" => "Our reliable computer rental services provide you with high-performance computers for temporary use, ideal for events, projects, or temporary office setups. Our rental computers are configured to meet your specific needs, ensuring you have the technology required for your tasks. We offer flexible rental options and competitive pricing, making it convenient and affordable to rent computers from us. Trust us for dependable and efficient computer rental services."
        ),
        array(
            "icon" => "icons/009-printer.png",
            "heading" => "Printer Setup",
            "short_description" => "Expert printer setup services for seamless printing operations.",
            "description" => "Our expert technicians provide printer setup services, ensuring your printer is correctly installed and configured for seamless printing operations. We handle everything from connecting your printer to your network to installing the necessary drivers and software. Our goal is to ensure that your printer operates efficiently and effectively, providing you with high-quality prints. Trust us for professional and reliable printer setup services."
        ),
        array(
            "icon" => "icons/017-customer-service.png",
            "heading" => "Online Laptop And Desktop Support",
            "short_description" => "Remote support for laptops and desktops, providing assistance and maintenance.",
            "description" => "We offer remote support for laptops and desktops, providing assistance with troubleshooting, maintenance, and software installations to keep your devices running smoothly. Our technicians can resolve issues quickly and efficiently, minimizing downtime and ensuring optimal performance. We offer flexible support options to meet your specific needs, providing you with reliable and convenient online support. Trust us to handle all your laptop and desktop support needs remotely."
        )
    );
    return $services;
}

/**
 * Get list of testimonials
 *
 * @return array
 */
function testimonials()
{
    $testimonials = array(
        array(
            "title" => "Outstanding Service!",
            "description" => "The team provided exceptional service, resolving my laptop issues quickly and efficiently. I highly recommend their professional and friendly approach.",
            "name" => "Ananya Singh",
            "locality" => "Sec 81",
            "city" => "Gurgaon"
        ),
        array(
            "title" => "Highly Reliable!",
            "description" => "I am extremely satisfied with their prompt and reliable service. They fixed my computer and set up my new software seamlessly.",
            "name" => "Rahul Sharma",
            "locality" => "Honda Chowk, Sec 35",
            "city" => "Gurgaon"
        ),
        array(
            "title" => "Excellent Support!",
            "description" => "Their online support team is fantastic. They helped me troubleshoot and resolve my issues in no time. Highly appreciated!",
            "name" => "Megha Gupta",
            "locality" => "Udhyog Vihar, Phase 1",
            "city" => "Gurgaon"
        ),
        array(
            "title" => "Professional and Efficient!",
            "description" => "Their service was professional and efficient. They installed my new operating system and ensured everything was working perfectly.",
            "name" => "Vikram Rao",
            "locality" => "Vatika, Sec 83",
            "city" => "Gurgaon"
        ),
        array(
            "title" => "Great Experience!",
            "description" => "I had a great experience with their CCTV installation service. The team was knowledgeable and very helpful throughout the process.",
            "name" => "Priya Nair",
            "locality" => "Dundahera",
            "city" => "Gurgaon"
        )
    );
    return  $testimonials;
}



function generateSeoFriendlySlug($string)
{
    // Convert to lowercase
    $slug = strtolower($string);

    // Replace non-alphanumeric characters with hyphens
    $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);

    // Remove duplicate hyphens
    $slug = preg_replace('/-+/', '-', $slug);

    // Trim hyphens from the beginning and end of the string
    $slug = trim($slug, '-');

    return $slug;
}


function returnJson($inputArr){
    // Set the content type to application/json
    header('Content-Type: application/json');

    // Encode the array to JSON
    echo json_encode($inputArr);
    
    // End the script execution
    exit();
}

/**
 * Filter Inline CSS
 *
 * @param [type] $html
 * @return void
 */
function filterInlineStyles($html)
{
    return preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $html);
}

/**
 * Get SEO Tags for web pages
 *
 * @return array
 */
function getSeoTags(){
    $tags = [
        "Laptop repair Gurgaon",
        "Desktop repair Gurgaon",
        "Computer rental Gurgaon",
        "AMC services Gurgaon",
        "Tech support Gurgaon",
        "Laptop service center Gurgaon",
        "Desktop service center Gurgaon",
        "IT repair services Gurgaon",
        "Laptop maintenance Gurgaon",
        "Desktop maintenance Gurgaon",
        "Reliable tech repair Gurgaon",
        "Gurgaon laptop rental",
        "Gurgaon desktop rental",
        "Computer AMC Gurgaon",
        "Tech solutions Gurgaon",
        "Gurgaon IT services",
        "Laptop repair near me Gurgaon",
        "Desktop repair near me Gurgaon",
        "Best laptop repair Gurgaon",
        "Affordable tech repair Gurgaon",
        "Gurgaon computer repair experts",
        "Gurgaon tech support services",
        "Laptop servicing Gurgaon",
        "Desktop servicing Gurgaon",
        "Gurgaon AMC contracts",
        "Tech repair Gurgaon",
        "Laptop and desktop repair Gurgaon",
        "Gurgaon tech repair company",
        "Trusted tech services Gurgaon",
        "Professional IT repair Gurgaon"
    ];
    shuffle($tags);
    return $tags;
}

function getSeoCategories(){
    return [
        "Laptop Repair Services",
        "Desktop Repair Services",
        "Computer Rental Services",
        "Annual Maintenance Contracts (AMC)",
        "IT Support & Consultation",
        "Data Recovery & Backup Solutions"
    ];    
}

function generateBreadcrumb() {
    // Get the current URL path
    $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $urlSegments = explode('/', trim($urlPath, '/'));

    // Define the base URL (adjust as needed)
    $baseUrl = env('APP_URL');

    // Start the breadcrumb HTML
    $breadcrumbHtml = '<ul class="breadcrumb">';

    // Add the "Home" link
    $breadcrumbHtml .= '<li><a href="' . $baseUrl . '">Home</a></li>';

    // Loop through each segment of the URL
    $currentPath = $baseUrl;
    foreach ($urlSegments as $segment) {
        if (!empty($segment)) {
            $currentPath .= ' > ' . $segment;
            $breadcrumbHtml .= '<li><a href="' . $currentPath . '">' . ucfirst(str_replace('-', ' ', $segment)) . '</a></li>';
        }
    }

    // Close the breadcrumb HTML
    $breadcrumbHtml .= '</ul>';

    return $breadcrumbHtml;
}


function getRatingStars($rating) {
    // Define the number of stars to show
    $totalStars = 5;
    $fullStar = '<li class="star"><i class="glyphicon glyphicon-star"></i></li>';
    $halfStar = '<li class="star"><i class="glyphicon glyphicon-star-empty"></i></li>';
    $blankStar = '<li class="star"><i class="glyphicon glyphicon-star-empty"></i></li>';

    // Initialize the HTML output
    $html = '<ul class="list-inline rating-stars">';

    // Calculate the number of full stars, half stars, and blank stars
    $fullStarsCount = floor($rating);
    $hasHalfStar = ($rating - $fullStarsCount) >= 0.5 ? 1 : 0;
    $blankStarsCount = $totalStars - ($fullStarsCount + $hasHalfStar);

    // Generate the full stars
    for ($i = 0; $i < $fullStarsCount; $i++) {
        $html .= $fullStar;
    }

    // Generate the half star if needed
    if ($hasHalfStar) {
        $html .= $halfStar;
    }

    // Generate the blank stars
    for ($i = 0; $i < $blankStarsCount; $i++) {
        $html .= $blankStar;
    }

    // Close the HTML output
    $html .= '</ul>';

    return $html;
}



/**
 * Get Asset File Path
 *
 * @param string $cssPath
 * @return string
 */
function getAssetPath($cssPath)
{
    $toReturn = minifiedAsset($cssPath) . "?v=" . (env('APP_ENV') == 'production' ? env('MEDIA_VERSION') : time());
    return $toReturn;
}

function minifiedAsset($path)
{

    // Get the file extension
    $extension = pathinfo($path, PATHINFO_EXTENSION);

    // Form the paths for the original and minified files
    $originalPath = public_path($path);
    $minifiedPath = public_path(str_replace(".{$extension}", ".min.{$extension}", $path));

    // Determine the final URL based on the environment and file availability
    $finalUrl = isProduction() && file_exists($minifiedPath) ? asset(str_replace(".{$extension}", ".min.{$extension}", $path)) : asset($path);

    return $finalUrl;
}

/**
 * Check if current env is production or not
 *
 * @return boolean
 */
function isProduction(){
    return env('APP_ENV') == 'production';
}


/**
 * Render RecaptchaV3
 *
 * @return string
 */
function renderRecaptchaInitJs(){
    return '<script src="https://www.google.com/recaptcha/api.js?hl=&render=' . env('RECAPTCHAV3_SITEKEY') . '" async defer></script>';
}

/**
 * Sanitize String my way
 *
 * @param string $input
 * @return string
 */
function sanitizeStringMyWay($input){
    return preg_replace('/[^a-zA-Z\s.]/', '', $input);
}