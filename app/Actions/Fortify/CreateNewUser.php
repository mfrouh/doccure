<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number'=>['required','min:11','max:11'],
            'gender'=>['required','in:male,female'],
            'password' => $this->passwordRules(),
        ])->validate();

         return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'gender' => $input['gender'],
            'role'=>  $input['role'],
            'username'=> $input['name'].rand(1234567,19876543),
            'password' => Hash::make($input['password']),
        ]);
    }
}
