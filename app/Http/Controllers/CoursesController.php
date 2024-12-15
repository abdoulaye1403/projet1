<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        return view('home', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('pages.courses.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        return redirect()->route('index')->with('success', 'cours ajouté avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Course $course)
    {
        if($course && $course->id != null) {
            $course->delete();
        }

        return redirect()->route('index')->with('success', 'cours supprimée avec success');
    }
}
