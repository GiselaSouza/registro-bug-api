<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use function response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $users = User::with(["profiles", "classificationBugs"])->get();
        return response()->json(["users" => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUserRequest  $request
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $dados = $request->except(["profilesId", "classificationBugsId"]);
        $dados["password"] = Hash::make($dados["password"]);

        $user = User::firstOrCreate($dados);
        $user->profiles()->sync($request->get("profilesId"));
        $user->classificationBugs()->sync($request->get("classificationBugsId"));

        return response()->json(["status" => $user->save()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function show(User $user)
    {
        $user = User::with(["profiles", "classificationBugs"])
            ->find($user->id);
        return response()->json(["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $dados = $request->except("profilesId");
        if (!empty($request->get("password"))) {
            $dados["password"] = Hash::make($dados["password"]);
        } else {
            $dados["password"] = $user->getAuthPassword();
        }
        $user->profiles()->sync($request->get("profilesId"));
        $user = $user->update($dados);
        return response()->json(["status" => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(User $user)
    {
        return response()->json(["status" => $user->delete()]);
    }
}
