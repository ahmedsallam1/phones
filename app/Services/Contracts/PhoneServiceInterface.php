<?php
namespace App\Services\Contracts;

interface PhoneServiceInterface
{
    public function getBy(array $criteria);
}