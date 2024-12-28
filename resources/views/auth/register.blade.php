@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- Sélection de rôle -->
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                    <option value="" disabled selected>{{ __('Choose a role') }}</option>
                                    <option value="teacher">{{ __('Professor') }}</option>
                                    <option value="student">{{ __('Etudiant') }}</option>
                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Champs spécifiques aux professeurs -->
                        <div id="teacher-fields" style="display: none;">
                            <div class="row mb-3">
                                <label for="teacher-dateofbirth" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth Teacher') }}</label>
                                <div class="col-md-6">
                                    <input id="teacher-dateofbirth" type="date" class="form-control" name="teacher-dateofbirth">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="teacher-address" class="col-md-4 col-form-label text-md-end">{{ __('Address Teacher') }}</label>
                                <div class="col-md-6">
                                    <input id="teacher-address" type="text" class="form-control" name="teacher-address">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="teacher-phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Teacher') }}</label>
                                <div class="col-md-6">
                                    <input id="teacher-phone" type="text" class="form-control" name="teacher-phone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="teacher-gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
    
                                <div class="col-md-6">
                                    <select id="teacher-gender" name="teacher-gender" class="form-control @error('gender') is-invalid @enderror">
                                        <option value="" disabled selected>{{ __('Choose a genre') }}</option>
                                        <option value="Male">{{ __('Male') }}</option>
                                        <option value="Female">{{ __('Female') }}</option>
                                    </select>
    
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="teacher-grade" class="col-md-4 col-form-label text-md-end">{{ __('Grade Teacher') }}</label>
    
                                <div class="col-md-6">
                                    <select id="teacher-grade" name="teacher-grade" class="form-control @error('grade') is-invalid @enderror">
                                        <option value="" disabled selected>{{ __('Choose a grade') }}</option>
                                        <option value="Master">{{ __('Master') }}</option>
                                        <option value="Doctorat">{{ __('Doctorat') }}</option>
                                    </select>
    
                                    @error('grade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Champs spécifiques aux etudiants -->
                        <div id="student-fields" style="display: none;">
                            <div class="row mb-3">
                                <label for="student-dateofbirth" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth Student') }}</label>
                                <div class="col-md-6">
                                    <input id="student-dateofbirth" type="date" class="form-control" name="student-dateofbirth">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="student-address" class="col-md-4 col-form-label text-md-end">{{ __('Address Student') }}</label>
                                <div class="col-md-6">
                                    <input id="student-address" type="text" class="form-control" name="student-address">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="student-phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Student') }}</label>
                                <div class="col-md-6">
                                    <input id="student-phone" type="text" class="form-control" name="student-phone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="student-gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender Student') }}</label>
    
                                <div class="col-md-6">
                                    <select id="student-gender" name="student-gender" class="form-control @error('gender') is-invalid @enderror">
                                        <option value="" disabled selected>{{ __('Choose a genre') }}</option>
                                        <option value="Male">{{ __('Male') }}</option>
                                        <option value="Female">{{ __('Female') }}</option>
                                    </select>
    
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const roleSelect = document.getElementById('role');
    const teacherFields = document.getElementById('teacher-fields');
    const studentFields = document.getElementById('student-fields');

    roleSelect.addEventListener('change', (event) => {
        if (event.target.value === 'teacher') {
            teacherFields.style.display = 'block';
            studentFields.style.display = 'none';
        } else if (event.target.value === 'student') {
            studentFields.style.display = 'block';
            teacherFields.style.display = 'none';
        } else {
            teacherFields.style.display = 'none';
            studentFields.style.display = 'none';
        }
    });
</script>
@endsection
