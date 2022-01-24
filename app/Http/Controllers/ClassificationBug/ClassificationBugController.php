<?php

namespace App\Http\Controllers\ClassificationBug;

use App\Http\Controllers\Controller;
use App\Models\ClassificationBug;
use App\Http\Requests\StoreClassificationBugRequest;
use App\Http\Requests\UpdateClassificationBugRequest;
use Illuminate\Http\JsonResponse;

class ClassificationBugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $classificationBug = ClassificationBug::all();
        return response()->json(["classificationBugs" => $classificationBug]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreClassificationBugRequest  $request
     * @return JsonResponse
     */
    public function store(StoreClassificationBugRequest $request)
    {
        $classificationBug = ClassificationBug::firstOrCreate($request->all());
        return response()->json(["status" => $classificationBug->save()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  ClassificationBug  $classificationBug
     * @return JsonResponse
     */
    public function show(ClassificationBug $classificationBug)
    {
        return response()->json(["classificationBug" => $classificationBug]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateClassificationBugRequest  $request
     * @param  ClassificationBug  $classificationBug
     * @return JsonResponse
     */
    public function update(UpdateClassificationBugRequest $request, ClassificationBug $classificationBug)
    {
        $classificationBug = $classificationBug->update($request->all());
        return response()->json(["status" => $classificationBug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ClassificationBug  $classificationBug
     * @return JsonResponse
     */
    public function destroy(ClassificationBug $classificationBug)
    {
        return response()->json(["status" => $classificationBug->delete()]);
    }
}
