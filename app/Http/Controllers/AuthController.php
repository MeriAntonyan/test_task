<?php

namespace App\Http\Controllers;

use App\Mail\DailyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function create(Request $request)
    {
        $rules =  array(
            'name' => 'required|string|min:2',
            'email' => 'unique:users,email',
            'password' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        } else {
            $requestData = $request->only([
                'name',
                'email',
                'password',
            ]);

            User::create($requestData);
        }
    }

    public function LoginClient(Request $request)
    {
        if (Auth::attempt([

            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $details = [
                'user' => auth()->user(),
            ];
            Mail::to('meriantonyan1389@gmail.com')->send(new DailyEmail($details));
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Email or password are incorrect'
            ]);
        }
    }
}
