<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\client;
use Hash;
use session;

class AuthCustomController extends Controller
{
      public function loggin(){
        return view("auth.Loggin");

      }

      public function registration(){
        return view("auth.registration");

      }
      public function registerclient(Request $request){
         $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:clients',
            'password' =>'required|min:5|max:12'

         ]);
            
         $client = new client();
         $client ->name=$request->name;
         $client ->email=$request->email;
         $client ->password=Hash::make($request->password);
         $res=$client->save();
         if($res){
            return back()->with('success','you have  successfully registered');
         }
         else{
            return back()->with('fail','something went wrong');

         }

         

         }
         public function logginclient(Request $request){
            $request->validate([
                'email' =>'required|email',
            'password' =>'required|min:5|max:12'
            ]);
         
            $client = client::where('email','=',$request->email)->first();
            if ( $client){
                if(Hash::check($request->password,$client->password)){
            }
        
            else{
                    return back()->with('fail','password does not match.');
                }
                $request->session()->put('login',$client->id);
                return redirect('dashboard');
             }

                  else{
                return back()->with('fail','This email is not registered');
            
            }
             

        }
        public function dashboard(){
            return view("products.create");
         }

         public function clientdash(){
            return view("client.dashboard");
         }

    }
   
