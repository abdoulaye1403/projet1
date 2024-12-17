<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view("pages.students.index", compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.students.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
             'birth_date' => ['required', 'date'],
             'address' => ['required', 'string', 'max:50'],
             'phone_number' => ['required', 'numeric'],
             'email' => ['required', 'email','unique:students']
        ])->validate();

        Student::create($request->except('_token'));

         return redirect()->route('students.index')->with('success', 'Etudiant ajouté avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('pages.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('pages.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
             'birth_date' => ['required', 'date'],
             'address' => ['required', 'string', 'max:50'],
             'phone_number' => ['required', 'numeric'],
             'email' => ['required','unique:teachers,email,'.$student->id]
        ])->validate();
        $student->update($request->except('_token', '_method'));

        return redirect()->route('students.index')->with('success', 'etudiant modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if($student && $student->id != null) {
            $student->delete();
        }

        return redirect()->route('students.index')->with('success', 'etudiant supprimée avec success');
    }
}
