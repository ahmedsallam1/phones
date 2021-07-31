<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    private static $countries = [
        237 => [
            "country" => "Cameroon",
            "regex" => "/(237) ?[2368]\d{7,8}$/",
        ],
        251 => [
            "country" => "Ethiopia",
            "regex" => "/(251) ?[1-59]\d{8}$/",
        ],
        212 => [
            "country" => "Morocco",
            "regex" => "/(212) ?[5-9]\d{8}$/",
        ],
        258 => [
            "country" => "Mozambique",
            "regex" => "/(258) ?[28]\d{7,8}$/",
        ],
        256 => [
            "country" => "Uganda",
            "regex" => "/(256) ?\d{9}$/",
        ],
    ];

    private function getCountryCode()
    {
        return current(explode(") ", $this->phone));
    }

    public function getCountryCodeAttribute()
    {
        return str_replace("(", "", $this->getCountryCode());
    }

    public function getPhoneNumberAttribute()
    {
        return str_replace(") ", "", str_replace($this->getCountryCode(), "", $this->phone));
    }

    public function getCountryAttribute()
    {
        return self::$countries[$this->country_code]["country"] ?? null;
    }

    public function getStateAttribute()
    {
        return preg_match(self::$countries[$this->country_code]["regex"], $this->country_code.$this->phone_number) ? "OK" : "NOK";
    }
}
