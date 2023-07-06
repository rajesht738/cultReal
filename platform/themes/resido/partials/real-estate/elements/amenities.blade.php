@if (!empty($property->features))
    <!-- Single Block Wrap -->
    <div class="property_block_wrap style-2">

        <div class="amen">
            <a data-bs-toggle="collapse" data-parent="#amen" data-bs-target="#clThree" aria-controls="clThree"
                href="javascript:void(0);" aria-expanded="true">
                <h4 class="property_block_titl" style="transform: rotate(-90deg);
                position: absolute;
                margin-left: -41px;
                margin-top: 21px;
                background: rgb(38, 53, 71);
                padding: 10px;
                border-radius: 5px;
                color: white;">{{ __('Amenities') }}</h4>
            </a>

        {{-- <div id="clThree" class="panel-collapse collapse show">
            <div class="block-body">
                <ul class="avl-features third color">
                    @foreach ($property->features as $feature)
                        <li>
                            <i
                                class="icon @if ($feature->icon) {{ $feature->icon }} @else fas fa-check @endif"></i>
                            <span>{{ $feature->name }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div> --}}
        <div class="featured_slick_gallery-slide">
            @foreach ($property->features as $index => $image)
                <div class="featured_slick_padd" style="width:150px !important">
                    {{-- <a href="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}"
                        class="mfp-gallery">
                        <img src="{{ RvMedia::getImageUrl($image, 'property_large', false, RvMedia::getDefaultImage()) }}"
                            class="img-fluid mx-auto" alt="{{ $property->name }}-{{ $index }}" />
                    </a> --}}

                        <i
                            class="icon @if ($image->icon) {{ $image->icon }} @else fas fa-check @endif"></i>
                        <p>{{ $image->name }}</p>

                </div>
            @endforeach
        </div>
    </div>
    </div>
@endif
