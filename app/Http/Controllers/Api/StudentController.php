<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('user')->paginate(5);
        return StudentResource::collection($students);
    }

    public function show($id)
    {
        $student = Student::with('user')->findOrFail($id);
        return new StudentResource($student);
    }

    public function store(Request $request)
    {
        $request->validate([
            'IDno' => 'required|min:2',
            'name' => 'required|min:5',
            'age' => 'required|integer|min:18',
        ]);

        $student = new Student($request->all());
        $student->save();

        return new StudentResource($student);
    }
}
