<?php

namespace App\Http\Controllers\Bug;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Http\Requests\StoreBugRequest;
use App\Http\Requests\UpdateBugRequest;
use Illuminate\Http\JsonResponse;

class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $bugs = Bug::all();
        return response()->json(["bugs" => $bugs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBugRequest  $request
     * @return JsonResponse
     */
    public function store(StoreBugRequest $request)
    {
        $dados = $request->except("userId");
        $dados["created_by"] = $request->get("userId");
        $bug = Bug::firstOrCreate($dados);

        return response()->json(["status" => $bug->save()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Bug  $bug
     * @return JsonResponse
     */
    public function show(Bug $bug)
    {
        return response()->json(["bug" => $bug]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBugRequest  $request
     * @param  Bug  $bug
     * @return JsonResponse
     */
    public function update(UpdateBugRequest $request, Bug $bug)
    {
        $dados = $request->except("userId");
        $dados["updated_by"] = $request->get("userId");
        $bug = $bug->update($dados);
        return response()->json(["status" => $bug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bug  $bug
     * @return JsonResponse
     */
    public function destroy(Bug $bug)
    {
        return response()->json(["status" => $bug->delete()]);
    }
}
