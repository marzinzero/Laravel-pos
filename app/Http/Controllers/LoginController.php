<?php

namespace App\Http\Controllers;

use App\Mail\ForgotpasswordMail;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ], [
            'email.exists' => 'Email do not exists our records'
        ]);
        $remember = $request->boolean('remember');

        $login = Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember);

        if ($login) {
            return redirect()->route('admin.dashboard')->with('success', 'Successfully Login');
        } else {
            return redirect()->back()->with('error', 'Credentials do not match our records')->withInput();
        }
    }

    public function signupform()
    {
        return view('auth.registration');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:11|unique:users,phone',
            'password' => 'required|min:6|max:15|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->created_at = Carbon::now();
        $user->save();

        if (!$user) {
            return redirect()->back()->with('warning', 'Somethings went wrong')->withInput();
        } else {
            return redirect()->back()->with('success', 'Successfully registrations');
        }
    }

    public function forgotpasswordform()
    {
        return view('auth.forgot_password_form');
    }

    public function forgotpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        $email = $request->email;

        $link = DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        if ($link) {
            Mail::to($email)->send(new ForgotpasswordMail($email, $token));
            return redirect()->back()->with('success', 'Successfullly sent mail');
        } else {
            return redirect()->back()->with('warning', 'Somethings went wrong')->withInput();;
        }
    }

    public function resetpasswordform(Request $request, $token = null)
    {
        $email = $request->email;
        return view('auth.reset_password_form', compact('email', 'token'));
    }


    public function resetpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:15|confirmed',
            'password_confirmation' => 'required',
        ]);


        $reset = User::where([
            'email' => $request->email
        ])->update(['password' => Hash::make($request->password)]);


        if ($reset) {

            DB::table('password_resets')->where([
                'email' => $request->email,
                'token' => $request->token
            ])->delete();

            return redirect()->route('admin.login.form')->with('success', 'Successfully reset password');
        } else {
            return redirect()->back()->with('error', 'Invalid token');
        }
    }
}
