<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhoneResource;
use Illuminate\Http\Request;
use App\Services\Contracts\PhoneServiceInterface;

class PhoneController extends Controller
{
    public function index(Request $request, PhoneServiceInterface $service)
    {
        try {
            return PhoneResource::collection($service->getBy($request->query->all()));
        } catch (\Throwable $th) {
            return response($th, 500);
        }
    }
}
