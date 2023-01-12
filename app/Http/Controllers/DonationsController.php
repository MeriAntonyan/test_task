<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\DonationRequest;
use Illuminate\Support\Facades\Validator;

class DonationsController extends Controller
{
    public function store(Request $request)
    {

        $rules = array(
            'campaignId' => 'required|exists:App\Models\Campaign,id',
            'donorName' => 'required|string|min:2',
            'amount' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        } else {
            $input = $request->all();
            Donation::create($input);
        }
    }

    public function getDonations()
    {
        $donations = Donation::query()->with('campaign')->get();
        return response()->json($donations);
    }

    public function deleteDonation($id)
    {
        Donation::find($id)->delete();
    }
}
