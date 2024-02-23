<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;
use Collective\Html\FormFacade as Form;

class StudentController extends Controller
{
    public function create()
    {
        return view('students.create');
    }

    public function store(StudentRequest $request)
    {


        Student::create($request->all());
        return redirect('/students/create')->with('success', 'Student created successfully');
    }


    public function index()
    {
        $student = new Student();

        $all_students = $student->all();
        return view('students.index', ['students' => $all_students]);

    }

    public function edit(Student $id)
    {
        $student = $id;
        return view('students.edit', compact('student'));
    }

    public function update(StudentRequest $request, Student $id)
    {
        $student = $id;
        $student->IDno = $request->IDno;
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }
    public function destroy(Student $id)
    {
        $student = $id;
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }


}
//binding
//validation
//flash-session
// query builder
// tikinter
//service container
//service provider
