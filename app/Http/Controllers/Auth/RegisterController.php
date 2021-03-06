<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Notifications\Registration;
use Facades\App\Services\UserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        return UserService::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(RegistrationRequest $request)
    {
        event(new Registered($user = $this->create($request->all())));

        $user->notify(new Registration($user, $request->password));

        $this->guard()->login($user);

        flash()->success(trans('flash.auth.register.success'));

        if (\Session::exists('forward_to_create')) {
            return redirect()->action('WizardController@showGeneral');
        } else {
            \Session::forget('forward_to_create');

            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        }
    }

    public function showRegistrationForm()
    {
        \Session::put('forward_to_create', true);

        return view('auth.register');
    }
}
