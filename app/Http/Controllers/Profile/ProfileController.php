<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use \Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $profiles = Profile::all();
        return response()->json(["profiles" => $profiles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProfileRequest  $request
     * @return JsonResponse
     */
    public function store(StoreProfileRequest $request)
    {
        $profile = Profile::firstOrCreate($request->all());
        return response()->json(["status" => $profile->save()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Profile  $profile
     * @return JsonResponse
     */
    public function show(Profile $profile)
    {
        return response()->json(["profile" => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProfileRequest $request
     * @param Profile $profile
     * @return JsonResponse
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $profile = $profile->update($request->all());
        return response()->json(["status" => $profile]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Profile  $profile
     * @return JsonResponse
     */
    public function destroy(Profile $profile)
    {
        return response()->json(["status" => $profile->delete()]);
    }
}
