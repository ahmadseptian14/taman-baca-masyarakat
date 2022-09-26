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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_hp' => ['required', 'string', 'max:12'],
            'alamat' => ['required', 'string', 'max:255'],
            // 'foto' => ['sometimes', 'max:5000'],
            'nik' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {           

        if (request()->hasFile('foto')) {
            $fotouploaded = request()->file('foto');
            $fotoname = time() . '.' . $fotouploaded->getClientOriginalExtension();
            $fotopath = public_path('/images/');
            $fotouploaded->move($fotopath, $fotoname);
            // dd($fotoname);

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'no_hp' => $data['no_hp'],
                'alamat' => $data['alamat'],
                'nik' => $data['nik'],
                'foto' => '/images/' . $fotoname,
            ]);
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
            'nik' => $data['nik']
        ]);

        // if(request()->hasFile('foto')) {
        //     $foto = request()->file('foto')->getClientOriginalName();
        //     request()->file('foto')->storeAs('foto', $user->id . '/' . $foto, '');
        //     $user->update(['foto' => $foto]);
        // }

        // return $user;
    }
}
