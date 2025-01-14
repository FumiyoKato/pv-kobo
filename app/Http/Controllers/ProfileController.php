<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\DeliveryEmailUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        if ($request->has('email') && $request->email !== auth()->user()->email) {
            // email が変更されている場合、ProfileUpdateRequest を使用
            $profileUpdateRequest = new ProfileUpdateRequest();
            $validatedData = $request->validate($profileUpdateRequest->rules());

            // // ★★★ バリデーション結果を確認 ★★★
            // dd($validatedData);

            // バリデーションを通った email を設定
            if (isset($validatedData['email'])) {
                $request->user()->email = $validatedData['email'];

                if ($request->user()->isDirty('email')) {
                    $request->user()->email_verified_at = null;
                }
            }
        }

        if ($request->has('delivery_email') && $request->delivery_email !== auth()->user()->delivery_email) {
            // delivery_email が変更されている場合、DeliveryEmailUpdateRequest を使用
            $deliveryEmailUpdateRequest = new DeliveryEmailUpdateRequest();
            $validatedData = $request->validate($deliveryEmailUpdateRequest->rules());
            $request->user()->delivery_email = $validatedData['delivery_email'];
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateDeliveryEmail(DeliveryEmailUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
