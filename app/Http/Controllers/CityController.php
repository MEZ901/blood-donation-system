<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Resources\city\CityCollection;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): CityCollection
    {
        return new CityCollection(City::all());
    }
}
