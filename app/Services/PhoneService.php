<?php
namespace App\Services;

use App\Models\Contracts\PhoneModelInerface;
use App\Services\Contracts\PhoneServiceInterface;

class PhoneService implements PhoneServiceInterface
{
    private $model;

    public function __construct(PhoneModelInerface $model)
    {
        $this->model = $model;
    }

    public function getBy(array $criteria)
    {
        return $this->model->getBy($criteria);
    }
}