<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{
    public function getCampaigns(): JsonResponse
    {
        return response()->json(Campaign::all());
    }
}
