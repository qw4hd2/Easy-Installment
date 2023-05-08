<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\Middleware\checkAdminSession;
class MasterController extends Controller
{
    public function index(){
        return view("index");
    }
    public function registration(){
        return view("AuthPages.registration");
    }
    public function login(){
        return view("AuthPages.login");
    }
    public function administrator(){
        return view("AuthPages.loginType.administrator");
    }
    public function employee(){
        return view("AuthPages.loginType.employee");
    }
    public function costumerLogin(){
        return view("AuthPages.loginType.customer");
    }
    public function register(){
       if(request()->isMethod("POST")){
            $idnum = request('idnum');
            $lastname = request('lastname');
            $firstname = request('firstname');
            $age = request('age');
            $contact = request('contact');
            $address = request('address');
            $email = request('email');
            $postal = request('postal');
            $job = request('job');
            $salary=request('salary');
            $status = request('status');
            $pass = request('pass');
            $existing = DB::table('costumer')->where('z_idnum', $idnum)->count();
            if($existing>0){
                return redirect()->back()->with('error','ID number already exit');
            }else{
                DB::table('costumer')->insert([
                    'z_idnum' => $idnum,
                    'z_lastname' => $lastname,
                    'z_firstname' => $firstname,
                    'z_age' => $age,
                    'z_contact' => $contact,
                    'z_address' => $address,
                    'z_email' => $email,
                    'z_postal' => $postal,
                    'z_job' => $job,
                    'z_salary' => $salary,
                    'z_status' => $status,
                    'z_pass' => $pass
                ]);
                return redirect()->back()->with('success','Registration successful');
            }
       }
    }
    public function loginAdmin(){
        if(request()->isMethod("POST")){
            $userName = request('username');
            $password = request('password');
            $existing = DB::table('user')
            ->where([
                ['u_idnumber', '=', $userName],
                ['u_password', '=', $password],
                ['u_position', '=', 'admin'],
            ])
            ->first();
            if($existing){
                session()->put('id', $existing->u_id);
                session()->put('username', $existing->u_idnumber);
                return redirect('/home');
            }else{
                return redirect()->back()->with('error','Username or password is incorrect.');
            }
        }
    }
    public function logoutAdmin()
    {
        session()->forget('id');
        return redirect('/administrator')->with('success', 'You have been logged out.');
    }
    public function employeeLogin(){
        if(request()->isMethod("POST")){
            $userName = request('username');
            $password = request('password');
            $existing = DB::table('user')
            ->where([
                ['u_idnumber', '=', $userName],
                ['u_password', '=', $password],
                ['u_position', '=', 'Employee'],
            ])
            ->first();
            if($existing){
                session()->put('id', $existing->u_id);
                session()->put('username', $existing->u_idnumber);
                return redirect('/homeEmployee');
            }else{
                return redirect()->back()->with('error','Username or password is incorrect.');
            }
        }
    }
    public function CostumerLoginAuth(){
        if(request()->isMethod("POST")){
            $userName = request('username');
            $password = request('password');
            $existing = DB::table('costumer')
            ->where([
                ['z_idnum', '=', $userName],
                ['z_pass', '=', $password],
            ])
            ->first();
            if($existing){
                session()->put('id', $existing->z_id);
                session()->put('username', $existing->z_idnum);
                return redirect('/homeCostumer');
            }else{
                return redirect()->back()->with('error','Username or password is incorrect.');
            }
        }
    }
}