<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialize;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use File;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/store';

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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $file = $data['picture'];
        $extension = time().'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->put('/uploads/users/'.$extension, File::get($file));
        $path = ('/uploads/users/'.$extension);
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'picture' => $path,
            'level_id' => '1',
        ]);
    }

    protected function createByFacebook($email, $name, $password, $facebook_id, $facebook_url, $avatar) 
    {
        $file = $avatar;
        $extension = time().'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->put('/uploads/users/'.$extension, File::get($file));
        $path = ('/uploads/users/'.$extension);

        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'facebook_id' => $facebook_id,
            'facebook_url' => $facebook_url,
            'picture' => $path,
            'level_id' => '1',
        ]);
    }


    public function facebookAuthRedirect() 
    {
        return Socialize::with('facebook')->redirect();
    }

    public function facebookSuccess() 
    {
        $provider = Socialize::with('facebook');
        //dd($provider);
        if (Input::has('code')){
            $user = $provider->stateless()->user();
            //dd($user); // print value debug.
            $email = $user->email;
            $name = $user->name;
            $password = substr($user->token,0,10);
            $facebook_id = $user->id;
            $facebook_url = $user->profileUrl;
            $avatar = $user->avatar_original;

            if($email == null){
                $user = $this->checkExistUserByFacebookId($facebook_id);
                if($user == null){
                    $email = $facebook_id;
                }
            }
            else{
                $user = $this->checkExistUserByEmail($email);
                if($user != null){
                    if($user->facebook_id == ""){
                        $user->facebook_id = $facebook_id;
                        $user->save();
                    }
                }
            }

            if($user != null){
                Auth::login($user);
                return redirect('/store');
            }
            else{
                $user = $this->createByFacebook($email, $name, $password, $facebook_id, $facebook_url, $avatar);
                Auth::login($user);
                return redirect('/store');
            }
        }
    }

    private function checkExistUserByEmail($email)
    {
        $user = User::where('email', '=', $email)->first();
        return $user;
    }

    private function checkExistUserByFacebookId($facebook_id){
        $user = User::where('facebook_id', '=', $facebook_id)->first();
        return $user;
    }

}
