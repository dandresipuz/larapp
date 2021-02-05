<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        if (session()->get('locale') == 'en') {
            $messages = array(
                'name.required'  => 'The "Name" field is required.',
                'email.required'     => 'The "Email" field is required.',
                'phone.required'     => 'The "PhoneNumber" field is required.',
                'type_number.required'    => 'The "Type number" field is required.',
                'dnumber.required'     => 'The "dnumber" field is required.',
                'birthdate.required' => 'The "BirthDate" field is required.',
                'gender.required'    => 'The "Gender" field is required.',
                'address.required'   => 'The "Address" field is required.',
                'password.required'  => 'The "Password" field is required.',
            );
        } else {
            $messages = array(
                'name.required'  => 'El campo "Nombre" es Obligatorio.',
                'email.required'     => 'El campo "Correo Electrónico" es Obligatorio.',
                'phone.required'     => 'El campo "Número Telefónico" es Obligatorio.',
                'type_number.required'    => 'El campo "Tipo de documento" es Obligatorio.',
                'dnumber.required'     => 'El campo "número de documento" es Obligatorio.',
                'birthdate.required' => 'El campo "Fecha de Nacimiento" es Obligatorio.',
                'gender.required'    => 'El campo "Genero" es Obligatorio.',
                'address.required'   => 'El campo "Dierección" es Obligatorio.',
                'password.required'  => 'El campo "Contraseña" es Obligatorio.',
            );
        }
        return Validator::make($data, [
            'name'      => ['required'],
            'email'     => ['required', 'email', 'unique:users'],
            'phone'     => ['required', 'numeric'],
            'type_number' => ['required'],
            'dnumber'     => ['required', 'numeric'],
            'birthdate' => ['required', 'date'],
            'gender'    => ['required'],
            'address'   => ['required',],
            'password'  => ['required', 'min:6', 'confirmed'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'type_number'   => $data['type_number'],
            'dnumber'       => $data['dnumber'],
            'phone'         => $data['phone'],
            'birthdate'     => $data['birthdate'],
            'gender'        => $data['gender'],
            'address'       => $data['address'],
            'password'      => Hash::make($data['password']),
        ]);
    }
}
