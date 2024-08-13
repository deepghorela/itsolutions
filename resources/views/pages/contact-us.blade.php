<section class="contact-section">
    <div class="container">
        <div class="col-xs-12 col-sm-4 address-list">
            @foreach($locations as $location)
                <div class="address-card">
                    <h2>{{ env('APP_NAME') }}</h2>
                    <ul class="list-unstyled">
                        <li>
                            <div class="icon-block"><span class="ico icon-address"></span></div>
                            <div class="icon-block"><p>{!! $location['title'] !!}</p></div>
                        </li>
                        <li>
                            <div class="icon-block"><span class="ico icon-city"></span></div>
                            <div class="icon-block"><p>{!! $location['address_1'].(!empty($location['address_2']) ? ", ".$location['address_2']: '') !!}, {{ $location['city'] }}<br>{{ $location['district'].", ".$location['state'] }}, India<br>{{ $location['pincode'] }}</p></div>
                        </li>
                        @if(!empty($location['locality']))
                        <li>
                            <div class="icon-block"><span class="ico icon-locality"></span></div>
                            <div class="icon-block"><p>{{ $location['locality'] }}</p></div>
                        </li>
                        @endif
                        @if(!empty($location['landmark']))
                            <li>
                                <div class="icon-block"><span class="ico icon-landmark"></span></div>
                                <div class="icon-block"><p>{{ $location['landmark'] }}</p></div>
                            </li>
                        @endif
                        <li>
                            <div class="icon-block"><span class="ico icon-estd"></span></div>
                            <div class="icon-block"><p><span>Estd.</span> {!! $location['estd_since'] !!}</p></div>
                        </li>
                        @if(!empty($location['contact_number']))
                            <li>
                                <div class="icon-block"><span class="ico icon-phone"></span></div>
                                <div class="icon-block"><p><a href="tel:+91{{ $location['contact_number'] }}" class="text-number">+91{{ $location['contact_number'] }}</a></p></div>
                            </li>
                        @endif
                        <li>
                            <div class="icon-block"><span class="ico icon-email"></span></div>
                            <div class="icon-block"><p><a href="mailto:{{ $location['contact_email'] }}">{{ $location['contact_email'] }}</a></p></div>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
        <div class="hidden-xs show-sm col-sm-8">
            <div id="map"></div>
            {{-- <div style="width: 100%;"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3506.5380289344193!2d73.75087199601747!3d28.49345609462604!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb3056773bc858eb0!2sSparrow%20Bytes!5e0!3m2!1sen!2sin!4v1630552010085!5m2!1sen!2sin&amp;output=embed" width="100%" height="650" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe></div> --}}
        </div>
    </div>
    @if(isset($mapCenterCoordinates))
        <input type="hidden" class="hidden" value="{!! $mapCenterCoordinates[0] !!}" id="centerLatitude">
        <input type="hidden" class="hidden" value="{!! $mapCenterCoordinates[1] !!}" id="centerLongitude">
        <input type="hidden" class="hidden" value='{!! $latLongs !!}' id="markersList">
        <input type="hidden" class="hidden" value='{!! asset('assets/images/marker-icon.png') !!}' id="markerIcon">
    @endif
</section>