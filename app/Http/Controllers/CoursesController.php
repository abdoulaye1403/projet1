<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->middleware('auth');
     }
    public function index(Request $request,Teacher $teacher)

    {
        $teacher = Teacher::find(auth()->user()->teacher->id); // Exemple pour récupérer le professeur
        $courses = Course::where('teacher_id', $teacher->id)->get();
        return view('pages.courses.index', compact('teacher','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,Teacher $teacher)
    {
        $teacher_id = $teacher->id;
        return view('pages.courses.create', compact('teacher_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Teacher $teacher)
    {
        Validator::make($request->all(), [
           'title' => ['required', 'string', 'max:50'],
           'description' => ['string'],
            'teacher_id' => ['required', 'numeric']
       ])->validate();

        // enregistrer
         $course = new Course();
         $course->title = $request->title;
         $course->description = $request->description;
         $course->teacher_id = $request->teacher_id;
         $course->save();

        return redirect()->route('teachers.courses.index',$request->teacher_id)->with('success', 'cours ajouté avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show($teacher_id, $course_id)
    {

        $teacher = Teacher::findOrFail($teacher_id);
        $course = Course::findOrFail($course_id);
        return view('pages.courses.show', compact('teacher', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Teacher $teacher,Course $course)
    {
        $teacher_id = $teacher->id;
        return view('pages.courses.edit', compact('course', 'teacher_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Teacher $teacher,Course $course)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:50'],
            'description' => ['string'],
            'teacher_id' => ['required', 'numeric']
        ])->validate();

        $course->update($request->except('_token', '_method'));

        return redirect()->route('teachers.courses.index',$request->teacher_id)->with('success', 'Cours modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Teacher $teacher,Course $course)
    {
        if ($course) {
            $course->delete();
        }

        return redirect()->route('teachers.courses.index',$teacher)->with('success', 'cours supprimée avec success');
    }
}
