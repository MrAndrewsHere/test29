<?php

namespace App\Http\Controllers;

use App\Http\Resources\CModelResource;
use App\Models\CModel;

class CModelController extends Controller
{
    public function index()
    {
        return CModelResource::collection(CModel::paginate());
    }
}
