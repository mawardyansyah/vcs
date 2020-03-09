<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = DB::table('userdata')->orderBy('id', 'DESC')->get();
        return view('home', ['userdata' => $data]);
    }

    public function insert(Request $req)
    {
        $data = [
            'username' => $req->input('username'),
            'password' => $req->input('password')
        ];
        DB::table('userdata')->insert($data);
        return redirect('/');
    }

    public function delete($id)
    {
        DB::table('userdata')->where('id', $id)->delete();
        return redirect('/');
    }

    public function edit(Request $req)
    {


        DB::table('userdata')->where('id', $req->input('modalId'))->update([
            'username' => $req->modalUsername,
            'password' => $req->modalPassword
        ]);

        // var_dump($req->modalUsername);
        // var_dump($req->modalId);
        // var_dump($req->modalPassword);

        return redirect('/');
    }
}
