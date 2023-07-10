<?php

namespace Botble\RealEstate\Models;

use Botble\Base\Models\BaseModel;
use Botble\Base\Traits\EnumCastable;
use Botble\Location\Models\City;
use Botble\Location\Models\Country;
use Botble\Location\Models\State;
use Botble\RealEstate\Enums\ModerationStatusEnum;
use Botble\RealEstate\Enums\PropertyPeriodEnum;
use Botble\RealEstate\Enums\PropertyTypeEnum;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Arr;
use RvMedia;
use Illuminate\Support\Str;

class Property extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 're_properties';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'description',
        'content',
        'highlight',
        'location',
        'label',
        'images',
        'floor_images',
        'location_images',
        'site_images',
        'payment_plan_images',
        'price_plan_images',
        'bank_loan_images',
        'brochures',
        'number_bedroom',
        'number_bathroom',
        'number_floor',
        'square',
        'price',
        'is_featured',
        'currency_id',
        'country_id',
        'state_id',
        'city_id',
        'period',
        'author_id',
        'author_type',
        'category_id',
        'subcategory_id',
        'expire_date',
        'auto_renew',
        'latitude',
        'longitude',
        'type_id'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'moderation_status' => ModerationStatusEnum::class,
        'period'            => PropertyPeriodEnum::class,
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'expire_date',
    ];

    /**
     * @return BelongsToMany
     */
    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 're_property_features', 'property_id', 'feature_id');
    }

    /**
     * @return BelongsToMany
     */
    public function facilities(): BelongsToMany
    {
        return $this->morphToMany(Facility::class, 'reference', 're_facilities_distances')->withPivot('distance');
    }

    /**
     * @param string $value
     * @return array
     */
    public function getImagesAttribute($value)
    {
        try {
            if ($value === '[null]') {
                return [];
            }

            $images = json_decode((string)$value, true);

            if (is_array($images)) {
                $images = array_filter($images);
            }

            return $images ?: [];
        } catch (Exception $exception) {
            return [];
        }
    }
    public function getFloorImagesAttribute($value)
    {
        try {
            if ($value === '[null]') {
                return [];
            }

            $images = json_decode((string)$value, true);

            if (is_array($images)) {
                $images = array_filter($images);
            }

            return $images ?: [];
        } catch (Exception $exception) {
            return [];
        }
    }
    public function getLocationImagesAttribute($value)
    {
        try {
            if ($value === '[null]') {
                return [];
            }

            $images = json_decode((string)$value, true);

            if (is_array($images)) {
                $images = array_filter($images);
            }

            return $images ?: [];
        } catch (Exception $exception) {
            return [];
        }
    }
    public function getSiteImagesAttribute($value)
    {
        try {
            if ($value === '[null]') {
                return [];
            }

            $images = json_decode((string)$value, true);

            if (is_array($images)) {
                $images = array_filter($images);
            }

            return $images ?: [];
        } catch (Exception $exception) {
            return [];
        }
    }
    public function getPaymentPlanImagesAttribute($value)
    {
        try {
            if ($value === '[null]') {
                return [];
            }

            $images = json_decode((string)$value, true);

            if (is_array($images)) {
                $images = array_filter($images);
            }

            return $images ?: [];
        } catch (Exception $exception) {
            return [];
        }
    }
    public function getPricePlanImagesAttribute($value)
    {
        try {
            if ($value === '[null]') {
                return [];
            }

            $images = json_decode((string)$value, true);

            if (is_array($images)) {
                $images = array_filter($images);
            }

            return $images ?: [];
        } catch (Exception $exception) {
            return [];
        }
    }
    // public function getBankLoanImagesAttribute($value)
    // {
    //     try {
    //         if ($value === '[null]') {
    //             return '';
    //         }

    //         $images = $value;



    //         return $images ?: '';
    //     } catch (Exception $exception) {
    //         return '';
    //     }
    // }

    /**
     * @return string|null
     */
    public function getFloorImageAttribute(): ?string
    {
        return Arr::first($this->floor_images) ?? null;
    }
    public function getLocationImageAttribute(): ?string
    {
        return Arr::first($this->location_images) ?? null;
    }
    public function getSiteImageAttribute(): ?string
    {
        return Arr::first($this->site_images) ?? null;
    }
    public function getPaymentPlanImageAttribute(): ?string
    {
        return Arr::first($this->payment_plan_images) ?? null;
    }
    public function getPricePlanImageAttribute(): ?string
    {
        return Arr::first($this->price_plan_images) ?? null;
    }
    public function getImageAttribute(): ?string
    {
        return Arr::first($this->images) ?? null;
    }
    public function getBankLoanImageAttribute(): ?string
    {

        return $this->bank_loan_images ? RvMedia::getImageUrl($this->bank_loan_images, null, false, RvMedia::getDefaultImage()) : null;
    }
    public function getBrochureAttribute(): ?string
    {

        return $this->brochures ? RvMedia::getImageUrl($this->brochures, null, false, RvMedia::getDefaultImage()) : null;
    }

    /**
     * @return string
     */
    public function getSquareTextAttribute()
    {
        return $this->square . ' ' . setting('real_estate_square_unit', 'm²');
    }

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class)->withDefault();
    }

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class)->withDefault();
    }

    /**
     * @return BelongsTo
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class)->withDefault();
    }

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class)->withDefault();
    }

    /**
     * @return MorphTo
     */
    public function author(): MorphTo
    {
        return $this->morphTo()->withDefault();
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    /**
     * @return BelongsTo
     */
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'subcategory_id')->withDefault();
    }

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id')->withDefault();
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotExpired($query)
    {
        return $query->where(function ($query) {
            $query->where('expire_date', '>=', now()->toDateTimeString())
                ->orWhere('never_expired', true);
        });
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpired($query)
    {
        return $query->where(function ($query) {
            $query->where('expire_date', '<', now()->toDateTimeString())
                ->where('never_expired', false);
        });
    }

    /**
     * @return string
     */
    public function getCityNameAttribute()
    {
        return $this->city->name . (!empty($this->city->state->name) ? ', ' . $this->city->state->name : '');
    }

    /**
     * @return string
     */
    public function getTypeNameAttribute()
    {
        return $this->type->name;
    }

    /**
     * @return string
     */
    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    /**
     * @return string|null
     */
    public function getImageThumbAttribute()
    {
        return $this->image ? RvMedia::getImageUrl($this->image, 'medium', false, RvMedia::getDefaultImage()) : null;
    }

    /**
     * @return string|null
     */
    public function getImageSmallAttribute()
    {
        return $this->image ? RvMedia::getImageUrl($this->image, 'thumb', false, RvMedia::getDefaultImage()) : null;
    }

    /**
     * @return string
     */
    public function getPriceHtmlAttribute()
    {
        $price = $this->price_format;

        if ($this->type->slug == PropertyTypeEnum::RENT) {
            $price .= ' / ' . Str::lower($this->period->label());
        }
        return $price;
    }

    /**
     * @return string
     */
    public function getPriceFormatAttribute()
    {
        if ($this->price_formatted) {
            return $this->price_formatted;
        }
        return $this->price_formatted = format_price($this->price, $this->currency);
    }

    /**
     * @return string
     */
    public function getMapIconAttribute()
    {
        return $this->type_name . ': ' . $this->price_format;
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function getAverageRatingAttribute()
    {
        return $this->reviews()->average('star');
    }
}
