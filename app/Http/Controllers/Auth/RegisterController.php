<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Lib\HelperFunctions;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
        return Validator::make($data, [
            'nombres' => 'required|string|max:20',
            'apellidos' => 'required|string|max:20',
            'telefono' => 'required|string|max:10|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'foto_id' => 'required|mimes:jpg,jpeg,bmp,png,pdf|max:2000',
        ]);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $foto_id = $data['foto_id'];
        $nombre_archivo = $data['nombres'] .'_' . $data['apellidos'] . time(). '.' . $foto_id->getClientOriginalExtension();
        $foto_id ->move(base_path() . '/public/uploads/identificaciones/' , $nombre_archivo);




        $clave = uniqid();
        $clave = substr($clave,rand(0,strlen($clave) - 6),6);
        $tipo = 3;
         
            return User::create([
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'telefono' => $data['telefono'],
                'email' => $data['email'],
                'foto_id' =>$nombre_archivo,
                'password' => bcrypt($data['password']),
                'clave_unica' => $clave,
                'tipo' => $tipo
            ]);
    }
}
