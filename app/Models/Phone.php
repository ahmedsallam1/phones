<?php

namespace App\Models;

use App\Models\Contracts\PhoneModelInerface;
use App\Models\Traits\Scopeable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model implements PhoneModelInerface
{
    use HasFactory, Scopeable;

    public static function scopeCountryCode(Builder $query, $countryCode)
    {
        return $query->where("country_code", $countryCode);
    }

    public static function scopeState(Builder $query, ?string $state)
    {
        return $query->where("state", $state);
    }

    public function getBy(array $criteria)
    {
        return self::getByCriteria($criteria);
    }
}
