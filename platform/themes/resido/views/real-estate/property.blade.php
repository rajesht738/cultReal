@php
    Theme::asset()
        ->usePath()
        ->add('leaflet-css', 'plugins/leaflet.css');
    Theme::asset()
        ->usePath()
        ->add('jquery-bar-rating', 'plugins/jquery-bar-rating/themes/fontawesome-stars.css');
    Theme::asset()
        ->container('footer')
        ->usePath()
        ->add('leaflet-js', 'plugins/leaflet.js');
    Theme::asset()
        ->usePath()
        ->add('magnific-css', 'plugins/magnific-popup.css');
    Theme::asset()
        ->container('footer')
        ->usePath()
        ->add('magnific-js', 'plugins/jquery.magnific-popup.min.js');
    Theme::asset()
        ->container('footer')
        ->usePath()
        ->add('property-js', 'js/property.js');
    Theme::asset()
        ->container('footer')
        ->usePath()
        ->add('jquery-bar-rating-js', 'plugins/jquery-bar-rating/jquery.barrating.min.js');
    Theme::asset()
        ->container('footer')
        ->usePath()
        ->add('wishlist', 'js/wishlist.js', [], []);
    $headerLayout = MetaBox::getMetaData($property, 'header_layout', true);
    $headerLayout = !empty($headerLayout) ? $headerLayout : theme_option('property_header_layout', 'layout-1');
    $allowShareViaWhatsapp = theme_option('allow_share_via_whatsapp', 'no');
    $video = $property->getMetaData('video', true);
    $videoUrl = $video['url'] ?? '';
    $propertyLabel = $property->label;
@endphp

{!! Theme::partial('real-estate.properties.headers.' . $headerLayout, compact('property', 'propertyLabel')) !!}

<!-- ============================ Property Detail Start ================================== -->
<section class="property-detail gray-simple">
    <div data-property-id="{{ $property->id }}"></div>

    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="property_block_wrap style-2">

                <div class="property_block_wrap_header">
                    <a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#clTwo" aria-controls="clTwo"
                        href="javascript:void(0);" aria-expanded="true">
                        <h4 class="property_block_title">WELCOME TO <span
                                style="font-size: 17px; font-weight:700;text-transform: uppercase;">{{ $property->name }}</span>
                        </h4>
                    </a>
                </div>
                <div id="clTwo" class="panel-collapse collapse show">
                    <div class="block-body">
                        {!! $property->content !!}
                    </div>
                </div>
            </div>
            <!-- Single Block Wrap - Features -->
            {!! Theme::partial('real-estate.elements.features', ['property' => $property]) !!}

        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">

            <!-- Like And Share -->
            <div class="like_share_wrap b-0">
                <ul class="like_share_list justify-content-center">
                    <li class="social_share_list">
                        <a href="JavaScript:void(0);" class="btn btn-likes" data-bs-toggle="tooltip"
                            data-original-title="Share"><i class="fas fa-share"></i>{{ __('Share') }}</a>
                        <div class="social_share_panel">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&title={{ $property->description }}"
                                target="_blank" class="cl-facebook"><i class="lni-facebook"></i></a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ $property->description }}"
                                target="_blank" class="cl-twitter"><i class="lni-twitter"></i></a>
                            <a href="https://linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&summary={{ rawurldecode($property->description) }}&source=Linkedin"
                                target="_blank" class="cl-linkedin"><i class="lni-linkedin"></i></a>
                            @if ($allowShareViaWhatsapp == 'yes')
                                <a href="https://api.whatsapp.com/send?text={{ rawurldecode($property->description) }} {{ urlencode(url()->current()) }}"
                                    data-action="share/whatsapp/share" target="_blank" class="cl-linkedin"><i
                                        class="lni-whatsapp"></i></a>
                            @endif
                        </div>
                    </li>
                    {{-- <li><a href="JavaScript:Void(0);" data-id="{{ $property->id }}"
                               class="btn btn-likes add-to-wishlist" data-bs-toggle="tooltip"
                               data-original-title="Save"><i
                                    class="fas fa-heart"></i>{{ __('Save') }}</a></li> --}}
                </ul>
            </div>

            <div class="details-sidebar">
                @if ($author = $property->author)
                    <!-- Agent Detail -->
                    <div class="sides-widget">
                        <div class="sides-widget-header" style="display:block;">
                            <div>
                            <h5 style="color: white; text-align:center;font-size:18px;">Interested to Buy Property</h5>
                               <h6 style="color: white; text-align:center;font-size:12px;"> Please Fill The Form</h6>
                            </div>
                            {{-- @if ($author->username)
                                    <div class="agent-photo">
                                        <img src="{{ RvMedia::getImageUrl($author->avatar->url, 'thumb') }}"
                                            alt="{{ $author->name }}">
                                    </div>
                                    <div class="sides-widget-details">
                                        <h4>
                                            <a href="{{ route('public.agent', $author->username) }}">
                                                {{ $author->name }}</a>
                                        </h4>
                                        <a href="tel:{{ $author->phone }}"> <span><i
                                                    class="lni-phone-handset"></i>{{ $author->phone }}</span></a>
                                    </div>
                                    <div class="clearfix"></div>
                                @endif --}}
                        </div>

                        <div class="sides-widget-body simple-form">
                            {{-- {!! Theme::partial('real-estate.elements.form-contact-consult', ['data' => $property]) !!} --}}
                            {!! Form::open([
                                'route' => 'public.send.consult',
                                'method' => 'POST',
                                'class' => 'contact-form',
                                'id' => 'contactForm',
                            ]) !!}
                            <div class="row">
                                <input type="hidden" name="data_id" value="{{ $property->id }}">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text"
                                        placeholder="{{ __('Name') }} *" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="{{ __('Phone') }} *" data-validation-engine="validate[required]"
                                        data-errormessage-value-missing="{{ __('Please enter phone number') }}!">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"
                                        placeholder="{{ __('Email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ __('Subject') }} *"
                                        value="{{ $property->name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <textarea name="content" class="form-control" rows="5" placeholder="{{ __('Message') }}"></textarea>
                                </div>
                                @if (setting('enable_captcha') && is_plugin_active('captcha'))
                                    <div class="form-group">
                                        {!! Captcha::display() !!}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <button class="btn btn-black btn-md rounded full-width"
                                        type="submit">{{ __('Send Message') }}</button>
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="alert alert-success text-success text-left" style="display: none;">
                                    <span></span>
                                </div>
                                <div class="alert alert-danger text-danger text-left" style="display: none;">
                                    <span></span>
                                </div>
                            </div>


                            {!! Form::close() !!}
                        </div>
                    </div>
                @endif
                {!! dynamic_sidebar('property_sidebar') !!}
            </div>

        </div>
    </div>



    {{-- {{dd($property)}} --}}
    {!! Theme::partial('real-estate.elements.amenities', ['property' => $property]) !!}

</section>
<div class="row">
    <!-- Amenities -->
    {{-- {!! Theme::partial('real-estate.elements.amenities', ['property' => $property]) !!} --}}
    <div class="property_block_wrap">
        <div class="ament" style="width:100%;">
            <div class="col-lg-5 col-md-12 col-sm-12 full-img">
                <img src="https://gauravsudhaassociates.com/storage/banners/inner-banner.jpg" alt=""
                    style="height:100%;">
            </div>


            <div class="col-lg-7 col-md-12 col-sm-12 property-highlight-text">
                <div class="section-title">
                    <h2><span>Highlights</span></h2>
                </div>
               <div class="row">
                    <div class="heiglight">

                            {!! $property->highlight !!}

                    </div>
                </div>
           </div>
        </div>
   </div>
</div>
<div class="floor">
    {!! Theme::partial('real-estate.elements.floor-plan', compact('property')) !!}
</div>

<section class="property-detail gray-simple">
    <!-- property main detail -->
    <div class="row">
        <!-- property main detail -->
        <div class="col-lg-8 col-md-12 col-sm-12">


            @if ('layout-1' === $headerLayout)
                <div class="property_block_wrap style-2 p-4">
                    <div class="prt-detail-title-desc">
                        <span class="prt-types {{ $property->type_slug }}">{{ $property->type_name }}</span>
                        @if ($propertyLabel)
                            <span class="prt-types rent">{{ $propertyLabel }}</span>
                        @endif
                        <h3>{{ $property->name }}</h3>
                        <span><i class="lni-map-marker"></i>
                            {{ $property->location . ', ' . $property->city_name }}</span>
                        <h3 class="prt-price-fix">{{ $property->price_html }}</h3>
                        {!! Theme::partial('real-estate.elements.list-fx-features', compact('property')) !!}
                    </div>
                </div>
            @endif


            <!-- Single Block Wrap - Amenities -->

            {{-- {!! Theme::partial('real-estate.properties.slick-gallery', ['property' => $property]) !!} --}}

            <!-- Single Block Wrap - Video -->
            {!! Theme::partial('real-estate.elements.video', ['object' => $property]) !!}

            <!-- Single Block Wrap -->
            <div class="style-2">

                {!! Theme::partial('real-estate.elements.brochure', compact('property')) !!}
                {!! Theme::partial('real-estate.elements.bank-image', compact('property')) !!}

            </div>

            <!-- Single Block Wrap - Gallery -->





            @if (is_review_enabled())
                <!-- Single Review -->
                <div id="reviewWrapper">
                    {!! Theme::partial('real-estate.elements.review', compact('property')) !!}
                </div>
            @endif
        </div>

        <!-- property Sidebar -->
        <div class="col-lg-4 col-md-12 col-sm-12">

            <div class="property_block_wrap_header">
                <a data-bs-toggle="collapse" data-parent="#loca" data-bs-target="#clSix" aria-controls="clSix"
                    href="javascript:void(0);" aria-expanded="true" class="collapsed">
                    <h4 class="property_block_title">{{ __('Location') }}</h4>
                </a>
            </div>

            <div id="clSix" class="panel-collapse collapse show">
                <div class="block-body">
                    @if ($property->latitude && $property->longitude)
                        {!! Theme::partial('real-estate.elements.traffic-map-modal', [
                            'location' => $property->location . ', ' . $property->city_name,
                        ]) !!}
                    @else
                        {!! Theme::partial('real-estate.elements.gmap-canvas', ['location' => $property->location]) !!}
                    @endif
                </div>
            </div>
            <!-- Single Block Wrap - Nearby -->
            {!! Theme::partial('real-estate.elements.nearby', ['property' => $property]) !!}

        </div>
    </div>
</section>
<div class="row" style="display: flex;
    align-items: center;
    justify-content: center;padding-top: 30px;">
    <div class="col-md-12">
        {!! Theme::partial('real-estate.elements.gallery', ['property' => $property]) !!}
    </div>
</div>

{!! do_shortcode(
    '[recently-viewed-properties title="' .
        __('Recently Viewed Properties') .
        '" subtitle="' .
        __('Your currently viewed properties.') .
        '"][/recently-viewed-properties]',
) !!}



@if ($property->latitude && $property->longitude)
    <div data-magnific-popup="#trafficMap" data-map-id="trafficMap" data-popup-id="#traffic-popup-map-template"
        data-map-icon="{{ $property->map_icon }}"
        data-center="{{ json_encode([$property->latitude, $property->longitude]) }}">
    </div>
@endif

<script id="traffic-popup-map-template" type="text/x-custom-template">
    {!! Theme::partial('real-estate.properties.map', ['property' => $property]) !!}
</script>
<!-- ============================ Property Detail End ================================== -->
