<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $listdata = User::where('delete_status', 1)
            ->join('tb_position', 'users.position_id', '=', 'tb_position.position_id')
            ->orderBy('id', 'ASC')
            ->get();

        return View('user.index')
        ->with('listdata', $listdata);
    }


    public function create()
    {
        $listposition = DB::table('tb_position')->get();
        return view('user.create', ['listposition' => $listposition]);
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'      => 'required|string|max:100',
                'email'     => 'required|string|email|max:255|unique:users',
                'password'  => 'required|string|max:8|confirmed',
                'position_id'  => 'required',
            ]
        );

        $user = new User;
        $user->name             = $request->input('name');
        $user->position_id      = $request->input('position_id');
        $user->email            = $request->input('email');
        $user->password         = Hash::make($request->input('password'));
        $user->create_name      = $request->input('userlogin');
        $user->create_date      = $request->input('thistime');
        $user->lastedit_name    = $request->input('userlogin');
        $user->lastedit_date    = $request->input('thistime');
        $user->delete_status    = 1;
        $user->save();

        // redirect
        return redirect('user')->with('message', 'Successfully created User!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id){
        $listdata = User::where('id', $id)->get();
        $listposition = DB::table('tb_position')->get();
        return View('user.edit')
            ->with('id', $id)
            ->with('name', $listdata[0]['name'])
            ->with('email', $listdata[0]['email'])
            ->with('position_id', $listdata[0]['position_id'])
            ->with('listposition', $listposition);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
