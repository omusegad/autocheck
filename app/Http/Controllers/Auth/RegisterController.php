<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


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
   // protected $redirectTo = '/register';

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    ///protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            'country' => ['required', 'string'],
            'role' => ['required', 'string'],
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
        $country_data = explode('-', $data['country']);
        return User::firstOrCreate([
            'name' => $data['name'],
            'role' => $data['role'],
            'phoneNumber' => $data['phoneNumber'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country_symbol' => strtoupper($country_data[0]),
            'country' => ucwords($country_data[1]),
            'job_title' =>$data['job_title']
        ]);

    }

    // public function register(Request $request)
    // {

    //   //  $validator = $this->validator($request->all());

    //     $validator = Validator::make($request->all(), $rules);
    //     if ($validator->fails()) {
    //        // handler errors
    //        $erros = $validator->errors();
    //     }

    //     $this->create($request->all());
    //     return redirect('/register')->with('message','User registered successfully'); // Change this route to your needs
    // }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->create($request->all());
        return redirect('/register')->with('message','User registered successfully'); // Change this route to your needs

    }


}
