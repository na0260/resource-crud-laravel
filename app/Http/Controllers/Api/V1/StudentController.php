<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudent;
use App\Models\Student;
use App\Http\Resources\Student as StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StudentResource::collection(Student::all());
        if (!$data) {
            return response()->json([
                'status' => '404',
                'message' => 'Data not found',
            ], 404);
        }else{
            return response()->json([
                'status' => '200',
                'message' => 'Students data retrieved successfully',
                'data' => $data
            ], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudent $request)
    {
        $validated = $request->validated();
        $data = new StudentResource(Student::create($validated));
        if (!$data) {
            return response()->json([
                'status' => '500',
                'message' => 'Something went wrong',
            ], 500);
        }else{
            return response()->json([
                'status' => '200',
                'message' => 'Student created successfully',
                'data' => $data
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = new StudentResource(Student::findOrFail($id));
        if (!$data) {
            return response()->json([
                'status' => '404',
                'message' => 'Data not found',
            ], 404);
        }else{
            return response()->json([
                'status' => '200',
                'message' => 'Student retrieved successfully',
                'data' => $data
            ], 200);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudent $request, string $id)
    {
        $student = Student::find($id);
        $validated = $request->validated();
        $student->update($validated);
        $data = new StudentResource($student);
        if (!$data) {
            return response()->json([
                'status' => '500',
                'message' => 'Something went wrong',
            ], 500);
        }else{
            return response()->json([
                'status' => '200',
                'message' => 'Student updated successfully',
                'data' => $data
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $data = $student->delete();
        if (!$data) {
            return response()->json([
                'status' => '500',
                'message' => 'Something went wrong',
            ], 500);
        }else{
            return response()->json([
                'status' => '200',
                'message' => 'Student deleted successfully',
            ], 200);
        }
    }
}
