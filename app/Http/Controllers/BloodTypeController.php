<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Http\Resources\bloodType\BloodTypeResource;
use App\Http\Resources\bloodType\BloodTypeCollection;

class BloodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): BloodTypeCollection
    {
        return new BloodTypeCollection(BloodType::all());
    }
}
