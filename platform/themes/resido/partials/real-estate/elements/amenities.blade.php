@if (!empty($property->features))
    <!-- Single Block Wrap -->
    <div class="property_block_wrap style-2" style="margin: 0 0 0 22px; width:97%">
        {{-- <section class="customer-logos slider">
            <div class="slide">
                <img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg">
            </div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>

         </section> --}}
        <div class="amen">
            <a data-bs-toggle="collapse" data-parent="#amen" data-bs-target="#clThree" aria-controls="clThree"
                href="javascript:void(0);" aria-expanded="true">
                <h4 class="property_block_titl" style="transform: rotate(-90deg);
                position: absolute;
                margin-left: -56px;
                margin-top: 21px;
                background: #00adb9;
                padding: 10px;
                border-radius: 5px;
                color: white;
                z-index: 1;">{{ __('Amenities') }}</h4>
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

            <div class="amenties-logos slider">
            @foreach ($property->features as $index => $image)
            <div class="slide">
                <i
                            class="icon @if ($image->icon) {{ $image->icon }} @else fas fa-check @endif"></i>
                            <p>{{ $image->name }}</p>
                        </div>

            @endforeach
        </div>

    </div>
    </div>
@endif
