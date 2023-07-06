<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Floor Plan Details</h2>
    <div class="row">
        <section class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <ul id="tabs" class="nav nav-tabs nav-fill">
                        <li class="nav-item"><a href="#floorPlan" data-target="#home1" data-bs-toggle="tab"
                                class="nav-link">FLOOR PLAN</a></li>
                        <li class="nav-item"><a href="#locationPlan" data-target="#profile1" data-bs-toggle="tab"
                                class="nav-link active">LOCATION MAP</a></li>
                        <li class="nav-item"><a href="#sitePlan" data-target="#messages1" data-bs-toggle="tab"
                                class="nav-link">SITE PLAN</a></li>
                        <li class="nav-item"><a href="#paymentPlan" data-target="#messages1" data-bs-toggle="tab"
                                class="nav-link">PAYMENT PLAN</a></li>
                        <li class="nav-item"><a href="#pricePlan" data-target="#messages1" data-bs-toggle="tab"
                                class="nav-link">PRICE LIST</a></li>
                    </ul>
                    <div id="tabsContent" class="tab-content p-5 border border-top-0 rounded">
                        <div id="floorPlan" class="tab-pane fade">
                        <div class="row pb-2">
                                <div class="col-md-8">
                                   {{-- {{ dd($property->images) }} --}}
                                    @if (!empty($property->location_images))
                                        <div class="property_block_wrap style-2">

                                            <div class="property_block_wrap_header">
                                                <a data-bs-toggle="collapse" data-parent="#clSev"
                                                    data-bs-target="#clSev" aria-controls="clOne"
                                                    href="javascript:void(0);" aria-expanded="true" class="collapsed">
                                                    <h4 class="property_block_title"> {{ __('Gallery') }}</h4>
                                                </a>
                                            </div>

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
                        <div id="locationPlan" class="tab-pane fade active show">
                            <div class="row pb-2">
                                <div class="col-md-8">
                                   {{-- {{ dd($property->images) }} --}}
                                    @if (!empty($property->floor_images))
                                        <div class="property_block_wrap style-2">

                                            <div class="property_block_wrap_header">
                                                <a data-bs-toggle="collapse" data-parent="#clSev"
                                                    data-bs-target="#clSev" aria-controls="clOne"
                                                    href="javascript:void(0);" aria-expanded="true" class="collapsed">
                                                    <h4 class="property_block_title"> {{ __('Gallery') }}</h4>
                                                </a>
                                            </div>

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
                        <div id="sitePlan" class="tab-pane fade">
                            <div class="list-group"><a href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">44</span> Message 1</a> <a
                                    href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">8</span> Site Plan</a> <a
                                    href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">23</span> Message 3</a> <a
                                    href="" class="list-group-item d-inline-block text-muted">Message n..</a>
                            </div>
                        </div>
                        <div id="paymentPlan" class="tab-pane fade">
                            <div class="list-group"><a href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">44</span> Message 1</a> <a
                                    href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">8</span> Payment Plan</a> <a
                                    href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">23</span> Message 3</a> <a
                                    href="" class="list-group-item d-inline-block text-muted">Message n..</a>
                            </div>
                        </div>
                        <div id="pricePlan" class="tab-pane fade">
                            <div class="list-group"><a href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">44</span> Message 1</a> <a
                                    href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">8</span> Price Plan</a> <a
                                    href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">23</span> Message 3</a> <a
                                    href="" class="list-group-item d-inline-block text-muted">Message n..</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
