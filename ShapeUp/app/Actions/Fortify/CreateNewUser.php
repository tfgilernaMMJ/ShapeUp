<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'name' => [
                'required',
                'string'
            ],
            'username' => [
                'required',
                'string'
            ],
            'country' => [
                'required',
                'string'
            ],
            'age' => [
                'required',
                'numeric',
                'min:0',
                'max:150'
            ],
            'weight' => [
                'required',
                'numeric',
                'min:10',
                'max:400'
            ],
            'height' => [
                'required',
                'numeric',
                'min:50',
                'max:300'
            ]
        ])->validate();        

        return User::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'name' => $input['name'],
            'username' => $input['username'],
            'country' => $input['country'],
            'age' => $input['age'],
            'weight' => $input['weight'],
            'height' => $input['height']
        ]);        
    }
}
