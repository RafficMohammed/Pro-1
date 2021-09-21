<?php

namespace App\Http\Controllers;

use App\Mail\VerifyUser;
use App\Mail\ResetMail;
// use App\Requests\ResetPasswordRequest;
// use App\Requests\Register;
use App\Models\Oauth;
use App\Models\User;
use App\Exceptions\NoEmailException;
use App\Notifications\VehicleNotification;
use App\Notifications\VehiclePage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->all(['email','password'])))
        {
            $user = Auth::user();
             $user->createToken('app')->accessToken;


            if (!$user->email_verified_at == null)

            {
                return redirect('products.all');
            }else
            {
                return back()->with('notverify','Please verify Your Mail Id');
            }

        }else{
            return back()->with('notmatch','User Mail is not match with Password');
        }

    }


    public function logout(Request $request)
    {
        $user = Auth::user();
        DB::table('oauth_access_tokens')
            ->where('user_id',$user->id)
            ->update([
                'revoked'=>true
            ]);


        return redirect('/');
    }



    public function registerView()
    {
        return view('register');
    }


    public function registration(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'c_password' => 'required|min:5|same:password'
        ]);
        $valid['password'] = Hash::make($request->password);

        try{
            $user=   User::create($valid);
        }
        catch(\Exception $exception)
        {
            return back()->with('email','E-mail is already Registered');
        }
       
        $user->createToken('app')->accessToken;
        Mail::to($user->email)->send(new VerifyUser($user));
        return redirect('/')->with('verify','please verify Your Mail Id');

    }



    public function verifymail($id)
    {

            $oauth =Oauth::where('user_id',$id)->first();
            if ($oauth)
            {
                $new = $oauth->users;
                $new->email_verified_at=Carbon::now();
                $new->save();
                return redirect('/')->with('verified','Email Verified');
            }
            else
            {
                return response('No Verified');
            }

    }

    public function forgotpassword()
    {
        return view('products.forgotpassword');
       
    }

    public function reset(Request $request)
    {
         $email = $request->email;
         try{
            $user =User::where('email',$email)->firstorfail();
         }
         catch(\Exception $exception)
         {
            throw (new NoEmailException());
         }
         
         Mail::to($email)->send(new ResetMail($user));
        return redirect('/')->with('forgotpassword','Email sent');

    }

    public function resetpassword($id)
    {
        $user = User::where('id',$id)->firstorfail();
        return view('products.resetpassword',compact('user'));
       
    }
    public function postResetPassword($id,Request $request)
    {

        $user = User::where('id',$id)->firstorfail();

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/')->with("passwordchanged","Successfully Password Changed");
    }




}
