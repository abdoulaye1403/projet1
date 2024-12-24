<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:teacher,student'],
        ];
    
        if (isset($data['role']) && $data['role'] === 'teacher') {
            $rules['teacher-dateofbirth'] = ['required', 'date'];
            $rules['teacher-address'] = ['required', 'string', 'max:255'];
            $rules['teacher-phone'] = ['required', 'string', 'max:15'];
            $rules['teacher-grade'] = ['required', 'string', 'in:Master,Doctorat'];
            $rules['teacher-gender'] = ['required', 'string', 'in:Male,Femele'];
        } elseif (isset($data['role']) && $data['role'] === 'student') {
            $rules['student-dateofbirth'] = ['required', 'date'];
            $rules['student-address'] = ['required', 'string', 'max:255'];
            $rules['student-phone'] = ['required', 'string', 'max:15'];
            $rules['student-student'] = ['required', 'string', 'in:Male,Femele'];
        }
    
        return Validator::make($data, $rules);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => Role::where('name', $data['role'])->value('id'),
        ]);
    
        if ($data['role'] === 'teacher') {
            Teacher::create([
                'user_id' => $user->id,
                'dateofbirth' => $data['teacher-dateofbirth'],
                'address' => $data['teacher-address'],
                'phone' => $data['teacher-phone'],
                'grade' => $data['teacher-grade'],
                'gender' => $data['teacher-gender'],
            ]);
        } elseif ($data['role'] === 'student') {
            Student::create([
                'user_id' => $user->id,
                'dateofbirth' => $data['student-dateofbirth'],
                'address' => $data['student-address'],
                'phone' => $data['student-phone'],
                'gender' => $data['student-student'],
            ]);
        }
    
        return $user;
    }
}
