<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array(
            'users' => User::all(),
        );

        return view('home', compact('data'));
    }

    public function add(){
        $inject = '<script>alert();</script>';
        return view('user.add', compact('inject'));
    }

    public function submit(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        return redirect('home');
    }

    public function edit(Request $request){
        $data = array(
            'user' => User::where('id', $request->id)->first()
        );

        return view('user.update', compact('data'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        return redirect('home');
    }
}
