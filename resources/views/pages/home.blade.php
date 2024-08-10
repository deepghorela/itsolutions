<section class="topHeader">
    <div class="bgBlur"></div>
    <div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<h1>One Stop Solution for<br></h1>
				<h5 class="typeJsEffect">Laptop Repair</h5>
				<p class="lead mb48 mb-xs-32">
					Our deep pool of certified engineers and IT staff are ready to help you to keep your IT business safe & ensure high availability, from data recovery to cyber security, we've got you covered.
				</p>
				<a href="{!! env('APP_URL').'#request-a-quote' !!}" class="btn-glossy">
					Request a Quote
				</a>
			</div>
		</div>
		<!--end of row-->
	</div>
</section>
<section>
    <div class="container pdtb40">
        <div class="hidden-xs show-sm col-sm-6 bg-billpay">
    
        </div>
        <div class="col-xs-12 col-sm-6">
            <h2>Comprehensive IT Solutions for your every need</h2>
            <p class="text-justify">From data recovery and laptop repairs to cyber security and IT management, we offer a full range of IT services to keep your business running smoothly and securely. Trust our experts to handle all your technology needs with precision and care.</p>
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
                <li title="Data as per 24-Jan-2024"><span class="numbers">824+</span>
                    Satisfied Customers</li>
                <li title="Data as per 24-Jan-2024"><span class="numbers">640+</span>
                    Devices Repaired
                    </li>
                <li title="Data as per 24-Jan-2024"><span class="numbers">{!! ((int)date('Y') - 2014) !!}</span>
                    Years of Expertise</li>
                <li title="Data as per 24-Jan-2024"><span class="numbers">2300</span>
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
                <form class="form formHandler requestAQuoteForm" method="POST" action="{{ route('request-quote.store') }}">
                    @csrf
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
                                <textarea name="message" class="form-control" rows="8" resize=none required minlength="10" placeholder="Describe your request/message" maxlength="250">this is a test message. Please ignore.</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-terms-statement text-right">
                            <p>By submitting this form, you agree to our <a href="terms-and-conditions.html" target="_blank">Terms & Conditions</a> and <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.</p>
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
            <div class="col-xs-hidden col-md-6 bg-callback flip-horizontal">
            </div>
        </div>
    </div>
</section>
<section class="collaborations bg-light testimonial-section">
    <div class="container">
        <div class="col-xs-12 col-md-offset-2 col-md-8 text-center">
            <h2 class="section-heading">What Client says?</h2>
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
<script async src="{!! asset('assets/js/typed.min.js') !!}?v={{ env('JS_VERSION') }}"></script>
<script async src="{!! asset('assets/js/jquery.validate.min.js') !!}?v={{ env('JS_VERSION') }}"></script>
<script async src="{!! asset('assets/js/additional-methods.min.js') !!}?v={{ env('JS_VERSION') }}"></script>
<script async src="{!! asset('assets/js/jquery.form.min.js') !!}?v={{ env('JS_VERSION') }}"></script>
@endpush