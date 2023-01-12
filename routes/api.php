<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignsController;
use App\Http\Controllers\DonationsController;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getCampaigns', [CampaignsController::class, "getCampaigns"]);
Route::post('/saveDonation', [DonationsController::class, "store"]);
Route::get('/getDonations', [DonationsController::class, "getDonations"]);
Route::post('/register', [AuthController::class, "create"]);
Route::post('/login', [AuthController::class, "LoginClient"]);
Route::delete('/deleteDonation/{id}', [DonationsController::class, "deleteDonation"]);
