<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->middleware('auth');
     }
    public function index()
    {
        $students = Student::with('user')->get(); // Récupère tous les etudiants avec leurs utilisateurs;
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:male,female,other',
            'dateofbirth' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => Role::where('name', 'student')->first()->id // Attribuer directement le rôle de l'etudiant
        ]);

        // Créer l'etudiant lié à l'utilisateur
        Student::create([
            'user_id' => $user->id,
            'gender' => $request->gender,
            'dateofbirth' => $request->dateofbirth,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('students.index')->with('success', 'Etudiant créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::with('user')->findOrFail($id);
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
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'gender' => 'required|in:male,female,other',
            'dateofbirth' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);
    
        $student = Student::findOrFail($id);
    
        // Mise à jour de l'utilisateur lié
        $student->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    
        // Mise à jour des informations de etudiant
        $student->update([
            'gender' => $request->gender,
            'dateofbirth' => $request->dateofbirth,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
    
        return redirect()->route('students.index')->with('success', 'Etudiant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if($student && $student->id != null) {
            $student->user->delete();
            $student->delete();
        }

        return redirect()->route('students.index')->with('success', 'etudiant supprimée avec success');
    }
}
