<section class="topHeader bg1">
    <div class="bgBlur"></div>
    <div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 topBanCont">
				<h1>One Stop Solution for<br></h1>
				<h5 class="typeJsEffect">Laptop Repair</h5>
				<p class="lead mb48 mb-xs-32">
					Our deep pool of certified engineers and IT staff are ready to help you to keep your IT business safe & ensure high availability, from IT support to cyber security, we've got you covered.
				</p>
				<a href="{!! env('APP_URL').'#request-a-quote' !!}" class="btn-glossy">
					Request a Quote
				</a>
			</div>
		</div>
		<!--end of row-->
	</div>
</section>
<section class="features-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section-heading text-center">Expert IT Services at Your Doorstep in Gurugram</h2>
            </div>
        </div>
        <div class="features row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">On-Site Service Across Gurugram</h3>
                    <p class="feature-description">We bring professional IT support and hardware solutions right to your doorstep—whether it's your office space, business hub, or home setup anywhere in Gurugram.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Authentic & Certified Hardware</h3>
                    <p class="feature-description">We use only original, high-quality components sourced from trusted vendors, all backed by proper local warranty for complete peace of mind.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Quick Setup & Deployment</h3>
                    <p class="feature-description">Need things up and running fast? We offer prompt installation and same-day setup for most standard home and office IT requirements.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="currentColor">
                            <path d="M.0022 64C.0022 46.33 14.33 32 32 32H288C305.7 32 320 46.33 320 64C320 81.67 305.7 96 288 96H231.8C241.4 110.4 248.5 126.6 252.4 144H288C305.7 144 320 158.3 320 176C320 193.7 305.7 208 288 208H252.4C239.2 266.3 190.5 311.2 130.3 318.9L274.6 421.1C288.1 432.2 292.3 452.2 282 466.6C271.8 480.1 251.8 484.3 237.4 474L13.4 314C2.083 305.1-2.716 291.5 1.529 278.2C5.774 264.1 18.09 256 32 256H112C144.8 256 173 236.3 185.3 208H32C14.33 208 .0022 193.7 .0022 176C.0022 158.3 14.33 144 32 144H185.3C173 115.7 144.8 96 112 96H32C14.33 96 .0022 81.67 .0022 64V64z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Honest & Upfront Pricing</h3>
                    <p class="feature-description">No hidden surprises—just clear, transparent quotes for both individual services and bulk corporate requirements, so you know exactly what you're paying for.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container pdtb40">
        <div class="hidden-xs show-sm col-sm-6 bg-billpay">
    
        </div>
        <div class="col-xs-12 col-sm-6">
            <h2>Comprehensive IT Solutions for your every need</h2>
            <p class="text-justify">From laptop repairs to cyber security and IT management, we offer a full range of IT services to keep your business running smoothly and securely. Trust our experts to handle all your technology needs with precision and care.</p>
            <ul class="list-disc mb40">
                <li>Expertise Across All IT Services</li>
                <li>Reliable and Timely Support</li>
                <li>Cutting-Edge Cyber Security Solutions</li>
                <li>Comprehensive IT Management</li>
                <li>Customer-Centric Approach</li>
            </ul>
            <a href="{!! env('APP_URL').'#request-a-quote' !!}" class="btn-glossy-lbg">
                Request a Quote
            </a>
        </div>
    </div>
</section>
<section class="bg-light">
    <div class="container">
        <div class="col-xs-12 text-center">
            <h2 class="section-heading">Services We Offer</h2>
            <ul class="list-inline services-we-offer">
                @foreach(servicesDetails() as $service)
                <li>
                    <div class="collab-logo">
                        <img src="{{ env('APP_URL')."/assets/".$service['icon'] }}" alt="{{ $service['heading'] }}">
                    </div>
                    <div class="collab-heading">
                        <h3>{{ $service['heading'] }}</h3>
                    </div>
                    <div class="collab-desc">
                        <p>{{ $service['short_description'] }}</p>
                        <button class="btn-service-detail"><i class="rotate-90 glyphicon glyphicon-upload"></i> Book Appointment</button>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<section class="bg-primary txt-white sec-counter">
    <div class="container">
        <div class="col-xs-12 text-center">
            <h2 class="section-heading">Our Impact in Numbers</h2>
            <ul class="list-inline list-disc">
                <li title="Data as per 24-Jan-2024"><span class="numbers">906+</span>
                    Satisfied Customers</li>
                <li title="Data as per 24-Jan-2024"><span class="numbers">704+</span>
                    Devices Repaired
                    </li>
                <li title="Data as per 24-Jan-2024"><span class="numbers">{!! ((int)date('Y') - 2014) !!}</span>
                    Years of Expertise</li>
                <li title="Data as per 24-Jan-2024"><span class="numbers">2530</span>
                    Service Requests Completed
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="request-a-quote-section pdb80" id="request-a-quote">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h2 class="section-heading">Request a Quote</h2>
                <div class="thanks"></div>
                <input type="hidden" class="hidden" id="recaptchaKey" value="{!! env('RECAPTCHAV3_SITEKEY') !!}">
                <form class="form formHandler requestAQuoteForm" method="POST" action="{{ route('request-quote.store') }}">
                    @csrf
                    {{-- {!! RecaptchaV3::field('requestquote') !!} --}}
                    <input type="hidden" id="g-recaptcha-response" value="" class="hidden">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name*" required/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Enter Email*" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <input type="text" maxlength="10" minlength="10" name="mobile" class="form-control" placeholder="Enter Mobile*" required/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <select name="request_type" class="form-control requestType" required>
                                    <option value="">Choose request type</option>
                                    @foreach(servicesDetails() as $service)
                                    <option value="{!! generateSeoFriendlySlug($service['heading']) !!}">{{ $service['heading'] }}</option>
                                    @endforeach
                                    <option value="complaint">Complaint</option>
                                    <option value="feedback">Feedback</option>
                                    <option value="AMC Contract">AMC Contract</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Enter Full address"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="8" resize=none required minlength="10" placeholder="Describe your request/message" maxlength="250"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-terms-statement text-right">
                            <p>By submitting this form, you agree to our <a href="{!! url('/terms-and-conditions') !!}" target="_blank">Terms & Conditions</a> and <a href="{!! url('/privacy-policy') !!}" target="_blank">Privacy Policy</a>.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <button type="submit" class="btn-custom-submit">Submit</button>
                        </div>
                    </div>
                    <input type="hidden" class="hidden" name="target_url" value="{{ route('request-quote.store') }}">
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="hidden-xs col-md-6 bg-callback flip-horizontal">
            </div>
        </div>
    </div>
</section>
<section class="collaborations bg-light testimonial-section">
    <div class="container">
        <div class="col-xs-12 text-center">
            <h2 class="section-heading">What Client says?</h2>
        </div>
        <div class="col-xs-12 col-md-4">
            <h3>Ratings</h3>
            <div class="row">
                <div class="col-xs-12 d-inline">
                    {!! getRatingStars('4.4') !!} 
                    <span class="rating-count d-inline text-number">4.4 / 5</span>
                </div>
                <div class="col-xs-12">
                    <p><small>( Total <strong class="text-number">360</strong>  reviews )</small></p>
                    <a target="_blank" class="btn btn-primary" href="https://search.google.com/local/reviews?placeid={!! env('GOOGLE_PLACE_ID') !!}">View all reviews</a>
                    <a target="_blank" class="btn btn-primary" href="https://search.google.com/local/writereview?placeid={!! env('GOOGLE_PLACE_ID') !!}">Write a Review</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-8 text-center">
            <div id="testimonial-carousel" class="carousel slide" data-ride="carousel"  data-interval="3000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @php $i=0; @endphp
                    @foreach(testimonials() as $testi)
                        <li data-target="#testimonial-carousel" data-slide-to="{{ $i }}" class="{!! $i ==0 ? 'active' : '' !!}"></li>
                        @php $i++; @endphp
                    @endforeach
                </ol>
        
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @php $i=1; @endphp
                    @foreach(testimonials() as $testi)
                        <div class="item {!! $i ==1 ? 'active' : '' !!}">
                            <blockquote>
                                <p>"{!! $testi['description'] !!}"</p>
                                <footer class="client-name">- {!! $testi['name'] !!}</footer>
                                <footer class="client-city">{!! $testi['locality'].", ".$testi['city'] !!}</footer>
                            </blockquote>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
        
                <!-- Controls -->
                <a class="left carousel-control" href="#testimonial-carousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#testimonial-carousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>

@push('post_js')
<script defer src="{!! getAssetPath('assets/js/typed.min.js') !!}"></script>
<script defer src="{!! getAssetPath('assets/js/jquery.validate.min.js') !!}"></script>
<script defer src="{!! getAssetPath('assets/js/additional-methods.min.js') !!}"></script>
<script defer src="{!! getAssetPath('assets/js/jquery.form.min.js') !!}"></script>
@endpush

@push('head_end')
<link rel="preload" href="{!! asset('assets/images/bg/1.jpg') !!}" as="image" />
<link rel="preload" href="{!! asset('assets/images/bg/2.jpg') !!}" as="image" />
<link rel="preload" href="{!! asset('assets/images/bg/3.jpg') !!}" as="image" />
<link rel="preload" href="{!! asset('assets/images/bg/server.jpg') !!}" as="image" />
@endpush