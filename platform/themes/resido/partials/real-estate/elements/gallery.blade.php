{{-- @if (!empty($property->images))
    <div class="property_block_wrap style-2">

        <div class="property_block_wrap_header">
            <a data-bs-toggle="collapse" data-parent="#clSev" data-bs-target="#clSev" aria-controls="clOne"
                href="javascript:void(0);" aria-expanded="true" class="collapsed">
                <h4 class="property_block_title"> {{ __('Gallery') }}</h4>
            </a>
        </div>


        <div class="block-body">
            <ul class="list-gallery-inline">
                @foreach ($property->images as $index => $image)
                    <li>
                        <a href="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}"
                            class="mfp-gallery">
                            <img src="{{ get_image_loading() }}"
                                data-src="{{ RvMedia::getImageUrl($image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                class="img-fluid mx-auto lazy" alt="{{ $property->name }}-{{ $index }}" />
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>


    </div>
@endif --}}
<div class="gallery" style="margin-bottom: 3%">
    <div class="floortitle" style="display: flex; justify-content:center; align-items:center">
        <h2>Gallery</h2>
    </div>

<div class="featured_slick_gallery-slide py-5" >


    @foreach ($property->images as $index => $image)


            <a href="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}" class="mfp-gallery">
                <img src="{{ RvMedia::getImageUrl($image, 'property_large', false, RvMedia::getDefaultImage()) }}"
                    class="img-fluid mx-auto" alt="{{ $property->name }}-{{ $index }}" />
            </a>


    @endforeach
</div>

</div>
