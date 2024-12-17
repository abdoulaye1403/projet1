<?php

namespace App\Http\Controllers;

use App\Models\Teacher,App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view("pages.teachers.index", compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.teachers.create");
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
             'grade' => ['required'],
             'email' => ['required', 'email','unique:teachers']
        ])->validate();

         // enregistrer
          $teacher = new Teacher();
          $teacher->first_name = $request->first_name;
          $teacher->last_name = $request->last_name;
          $teacher->birth_date = $request->birth_date;
          $teacher->address = $request->address;
          $teacher->phone_number = $request->phone_number;
          $teacher->grade = $request->grade;
          $teacher->email = $request->email;
          $teacher->save();

         return redirect()->route('teachers.index')->with('success', 'professeur ajouté avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('pages.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('pages.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
             'birth_date' => ['required', 'date'],
             'address' => ['required', 'string', 'max:50'],
             'phone_number' => ['required', 'numeric'],
             'grade' => ['required'],
             'email' => ['required','unique:teachers,email,'.$teacher->id]
        ])->validate();
        $teacher->update($request->except('_token', '_method'));

        return redirect()->route('teachers.index')->with('success', 'professeur modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if($teacher && $teacher->id != null) {
            $teacher->delete();
        }

        return redirect()->route('teachers.index')->with('success', 'professeur supprimée avec success');
    }
}
