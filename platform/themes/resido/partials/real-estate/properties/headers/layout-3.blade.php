<!-- ============================ Property Header Info Start================================== -->
<section class="bg-title" style="background-image: url({{env('APP_URL').'storage/'.$property->price_plan_image}});
  background-repeat: no-repeat;background-size: cover;height:400px;">
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-12">
                <div class="property_block_wrap style-4">
                    <div class="prt-detail-title-desc">
                        <span class="prt-types sale {{ $property->type->slug ?? '' }}">{{ $property->type_name }}</span>
                        @if($propertyLabel)
                            <span class="prt-types sale">{{ $propertyLabel }}</span>
                        @endif
                        <h3 class="text-light">{{ $property->name }}</h3>
                        <span><i class="lni-map-marker"></i> {{ $property->location }}</span>
                        <h3 class="prt-price-fix">{{ $property->price_html }}</h3>
                        {!! Theme::partial('real-estate.elements.list-fx-features', compact('property')) !!}
                        <div class="pbwts-social">
                            <ul>
                                <li>{{ __('Share:') }}</li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($property->url) }}&title={{ $property->description }}" title="{{ __('Share on Facebook') }}" target="_blank"><i class="ti-facebook"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ urlencode($property->url) }}&text={{ $property->description }}" target="_blank" title="{{ __('Tweet now') }}"><i class="ti-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($property->url) }}&summary={{ rawurldecode($property->description) }}" target="_blank" title="{{ __('Share on Linkedin') }}"><i class="ti-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
</section>
<section class="gray-simple rtl p-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-12">

                <div class="property_block_wrap style-3">
                    {{-- @if(isset($property->author->avatar))
                    <div class="pbw-flex-1">
                        <div class="pbw-flex-thumb">
                            <img class="img-fluid" src="{{ RvMedia::getImageUrl($property->author->avatar->url, 'thumb') }}" alt="{{ $property->author->name }}">
                        </div>
                    </div>
                    @endif --}}

                    <div class="pbw-flex">
                        <div class="prt-detail-title-desc">
                            <span class="prt-types {{ $property->type }}">{{ $property->type_name }}</span>
                            @if($propertyLabel)
                                <span class="prt-types rent">{{ $propertyLabel }}</span>
                            @endif
                            <h3>{{ $property->name }}</h3>
                            <span><i class="lni-map-marker"></i> {{ $property->location }}</span>
                            <h3 class="prt-price-fix">{{ $property->price_html }}</h3>
                            {!! Theme::partial('real-estate.elements.list-fx-features', compact('property')) !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Property Header Info End ================================== -->
