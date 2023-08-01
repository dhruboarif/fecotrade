<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('auth.passwords.edit');
    }

    public function update(UpdatePasswordRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect()->route('profile.password.edit')->with('message', __('global.change_password_success'));
    }

    public function updateProfile(Request $request)
    {
        
        $user = Auth::user();

        // Validate the form data
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        //     'gender' => 'required|string|in:male,female',
        //     'date_of_birth' => 'required|date',
        //     'address' => 'nullable|string|max:255',
        //     'city' => 'nullable|string|max:255',
        //     'country' => 'nullable|string|max:2',
        //     'postal_code' => 'nullable|string|max:10',
        //     'contact' => 'nullable|string|max:20',
        //     'nid_passport' => 'nullable|string|max:255',
        // ]);

        // Update user information
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'postal_code' => $request->input('postal_code'),
            'contact' => $request->input('contact'),
            'nid_passport' => $request->input('nid_passport'),
        ]);

        return redirect()->route('profile.password.edit')->with('message', __('global.update_profile_success'));
        
        
        
        // $user = auth()->user();

        // $user->update($request->validated());

        // return redirect()->route('profile.password.edit')->with('message', __('global.update_profile_success'));
    }

    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);

        $user = auth()->user();

        // Delete previous profile photo if exists
        $user->clearMediaCollection('profile_photos');

        // Store the new profile photo using the media library
        $user->addMediaFromRequest('file')->toMediaCollection('profile_photos');

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function destroy()
    {
        $user = auth()->user();

        $user->update([
            'email' => time() . '_' . $user->email,
        ]);

        $user->delete();

        return redirect()->route('login')->with('message', __('global.delete_account_success'));
    }
}
