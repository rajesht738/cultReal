<div class="floortitle" style="display: flex; justify-content:center; align-items:center">
    <h2>Floor Plan & Details</h2>
</div>

<div class="row">
    <section class="container py-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-9">
                <ul id="tabs" class="nav nav-tabs nav-fill">
                    <li class="nav-item"><a href="#floorPlan" data-target="#home1" data-bs-toggle="tab"
                            class="nav-link active">FLOOR PLAN</a></li>
                    <li class="nav-item"><a href="#locationPlan" data-target="#profile1" data-bs-toggle="tab"
                            class="nav-link ">LOCATION MAP</a></li>
                    <li class="nav-item"><a href="#sitePlan" data-target="#messages1" data-bs-toggle="tab"
                            class="nav-link">SITE PLAN</a></li>
                    <li class="nav-item"><a href="#paymentPlan" data-target="#messages1" data-bs-toggle="tab"
                            class="nav-link">PAYMENT PLAN</a></li>
                    <li class="nav-item">
                        <div id="backgroundOverlay"></div>
                         <div class="floating-contact-form" >
                        <div class="form-container" id="cfrm">
                            <h4 style="color: white; text-align:center; font-size: 18px;">DROP AN ENQUIRY</h4>
                            <h6 style="color: white; text-align:center;font-size: 14px;" >To Schedule A Site Visit</h6>
                            {!! Form::open(['route' => 'public.send.consult', 'method' => 'POST', 'class' => 'contact-form', 'id' => 'contactForm']) !!}
                            <div class="row">
                                {{-- <input type="hidden" name="data_id" value="{{ $data->id }}"> --}}
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="{{ __('Name') }} *" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="{{ __('Phone') }} *"
                                        data-validation-engine="validate[required]"
                                        data-errormessage-value-missing="{{ __('Please enter phone number') }}!">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="{{ __('Email') }}">
                                </div>
                                <div class="form-group">
                                    {{-- <input type="text" class="form-control" placeholder="{{ __('Subject') }} *" value="{{ $data->name }}"
                                        readonly> --}}
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
                                    <button class="btn btn-black btn-md rounded full-width" type="submit">{{ __('Send Message') }}</button>
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

                        <div class="contact-icon2" style="background-color: rgb(49, 81, 183);
                        color: white;
                        margin-right: 10px;
                        padding: 0.7rem 2rem;
                        cursor: pointer;">
                             <span class="left_btn" style="color:#fff;">
                              PRICE LIST
                            </span>
                        </div>
                      </div>
                    </div></li>
                </ul>
                <div id="tabsContent" class="tab-content p-5 border border-top-0 rounded">
                    <div id="floorPlan" class="tab-pane fade active show">
                        <div class="row pb-2" style='display:flex;align-items:center; justify-content:center;'>
                            <div class="col-md-10">
                                {{-- {{ dd($property->images) }} --}}
                                @if (!empty($property->floor_images))
                                    <div class="style-2">
                                        <div id="clSev" class="panel-collapse collapse show">
                                            <div class="block-body">
                                                <ul class="list-gallery-inline">
                                                    @foreach ($property->floor_images as $index => $image)
                                                        <li>
                                                            <a href="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}"
                                                                class="mfp-gallery">
                                                                <img src="{{ get_image_loading() }}"
                                                                    data-src="{{ RvMedia::getImageUrl($image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                                                    class="img-fluid mx-auto lazy"
                                                                    alt="{{ $property->name }}-{{ $index }}" />
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div id="locationPlan" class="tab-pane fade">
                        <div class="row pb-2" style='display:flex;align-items:center; justify-content:center;'>
                            <div class="col-md-10">
                                {{-- {{ dd($property->images) }} --}}
                                @if (!empty($property->location_images))
                                    <div class="style-2">
                                        <div id="clSev" class="panel-collapse collapse show">
                                            <div class="block-body">
                                                <ul class="list-gallery-inline">
                                                    @foreach ($property->location_images as $index => $image)
                                                        <li>
                                                            <a href="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}"
                                                                class="mfp-gallery">
                                                                <img src="{{ get_image_loading() }}"
                                                                    data-src="{{ RvMedia::getImageUrl($image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                                                    class="img-fluid mx-auto lazy"
                                                                    alt="{{ $property->name }}-{{ $index }}" />
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>
                    <div id="sitePlan" class="tab-pane fade">
                        <div class="row pb-2" style='display:flex;align-items:center; justify-content:center;'>
                            <div class="col-md-10">
                                {{-- {{ dd($property->images) }} --}}
                                @if (!empty($property->site_images))
                                    <div class="style-2">
                                        <div id="clSev" class="panel-collapse collapse show">
                                            <div class="block-body">
                                                <ul class="list-gallery-inline">
                                                    @foreach ($property->site_images as $index => $image)
                                                        <li>
                                                            <a href="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}"
                                                                class="mfp-gallery">
                                                                <img src="{{ get_image_loading() }}"
                                                                    data-src="{{ RvMedia::getImageUrl($image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                                                    class="img-fluid mx-auto lazy"
                                                                    alt="{{ $property->name }}-{{ $index }}" />
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div id="paymentPlan" class="tab-pane fade">
                        <div class="row pb-2" style='display:flex;align-items:center; justify-content:center;'>
                            <div class="col-md-10">
                                {{-- {{ dd($property->images) }} --}}
                                @if (!empty($property->payment_plan_images))
                                    <div class="style-2">


                                        <div id="clSev" class="panel-collapse collapse show">
                                            <div class="block-body">
                                                <ul class="list-gallery-inline">
                                                    @foreach ($property->payment_plan_images as $index => $image)
                                                        <li>
                                                            <a href="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}"
                                                                class="mfp-gallery">
                                                                <img src="{{ get_image_loading() }}"
                                                                    data-src="{{ RvMedia::getImageUrl($image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                                                    class="img-fluid mx-auto lazy"
                                                                    alt="{{ $property->name }}-{{ $index }}" />
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div id="pricePlan" class="tab-pane fade">
                        <div class="row pb-2" style='display:flex;align-items:center; justify-content:center;'>
                            <div class="col-md-10">
                                {{-- {{ dd($property->images) }} --}}
                                @if (!empty($property->price_plan_images))
                                    <div class="style-2">
                                        <div id="clSev" class="panel-collapse collapse show">
                                            <div class="block-body">
                                                <ul class="list-gallery-inline">
                                                    @foreach ($property->price_plan_images as $index => $image)
                                                        <li>
                                                            <a href="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}"
                                                                class="mfp-gallery">
                                                                <img src="{{ get_image_loading() }}"
                                                                    data-src="{{ RvMedia::getImageUrl($image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                                                    class="img-fluid mx-auto lazy"
                                                                    alt="{{ $property->name }}-{{ $index }}" />
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
