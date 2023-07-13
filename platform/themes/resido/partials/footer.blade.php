{!! dynamic_sidebar('footer_sidebar_1') !!}
<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer">
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget">
                        @if (theme_option('logo_white'))
                            <img src="{{ RvMedia::getImageUrl(theme_option('logo_white')) }}" class="img-footer"
                                 style="max-height: 38px" alt="{{ theme_option('site_name') }}">
                        @endif
                        <div class="footer-add">
                            @if (theme_option('address'))
                                <p><i class="fas fa-map-marker-alt"></i> {{ theme_option('address') }}</p>
                            @endif
                            @if (theme_option('hotline'))
                                <p><i class="fas fa-phone-square"></i> {{ theme_option('hotline') }}</p>
                            @endif
                            @if (theme_option('email'))
                                <p><i class="fas fa-envelope"></i> {{ theme_option('email') }}</p>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="row">
                        {!! dynamic_sidebar('footer_sidebar_2') !!}
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    {!! dynamic_sidebar('footer_sidebar_3') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4">

                </div>
                <div class="col-lg-4 col-md-4">
                    <p class="mb-0">{!! clean(theme_option('copyright')) !!}</p>
                </div>

                <div class="col-lg-4 col-md-4">
                    @if (theme_option('social_links'))
                        <ul class="footer-bottom-social">
                            @foreach(json_decode(theme_option('social_links'), true) as $socialLink)
                                @if (count($socialLink) == 3)
                                    <li><a href="{{ $socialLink[2]['value'] }}" target="_blank"
                                           title="{{ $socialLink[0]['value'] }}"><i
                                                class="{{ $socialLink[1]['value'] }}"></i></a></li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="bottomBtn" id="content-mobile">

        <div class="btn" style="background-color:#4FCE5D; color:white;">
          <i class="fab fa-whatsapp"></i><a href="https://api.whatsapp.com/send?phone=+91-9560252011&amp;text=Hi%20I%20am%20interested%20in%20CultReality.com.in%20">
          <span class="left_btn" style="color:#fff;">
        WhatsApp
          </span>
          </a>
        </div>


        <div class="btn" style="background-color:#0e72b7; color:white;"><i class="ti-mobile"></i><a href="tel:+91-9643-353-535">
        <span class="left_btn" style="color:#fff;">
            Call Now
        </span>
        </a>
        </div>
        <div id="backgroundOverlay"></div>
        <div class="floating-contact-form" >

            <div class="form-container" id="cfrm">
                <h4 style="color: white; text-align:center;">DROP AN ENQUIRY</h4>
                <h6 style="color: white; text-align:center;">To Schedule A Site Visit</h6>
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

            <div class="btn contact-icon" style="background-color:#d7255a; color:white;">
                 <i class="fas fa-comments"></i>
                <span class="left_btn" style="color:#fff;">
                   Enquiry Now
                </span>
            </div>
          </div>
        </div>
</footer>
<!-- ============================ Footer End ================================== -->

<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
</div>

{!! Theme::footer() !!}
@if (session()->has('success_msg') || session()->has('error_msg') || (isset($errors) && $errors->count() > 0) || isset($error_msg))
    <script type="text/javascript">
        "use strict";
        $(document).ready(function () {
            @if (session()->has('success_msg'))
            window.showAlert('alert-success', '{{ session('success_msg') }}');
            @endif

            @if (session()->has('error_msg'))
            window.showAlert('alert-danger', '{{ session('error_msg') }}');
            @endif

            @if (isset($error_msg))
            window.showAlert('alert-danger', '{{ $error_msg }}');
            @endif

            @if (isset($errors))
            @foreach ($errors->all() as $error)
            window.showAlert('alert-danger', '{!! $error !!}');
            @endforeach
            @endif
        });
    </script>
    @endif
</body>
</html>
