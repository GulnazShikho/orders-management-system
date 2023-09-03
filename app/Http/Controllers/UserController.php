<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Spatie\Permission\Models\Permission;
use Dotenv\Result\Success;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
$roles=Role::orderBy('id','DESC')->paginate(5);
$data = User::orderBy('id','DESC')->paginate(5);
return view('Pages.users',compact('data'),compact('roles'),)
->with('i', ($request->input('page', 1) - 1) * 5);
}



/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$this->validate($request, [
'name' => 'same:confirm-name',
'email' => 'same:confirm-email',
'password' => 'same:confirm-password',
'role_name' => 'required'
]);
$input = $request->all();
$user = User::find($id);
$user->update($input);
DB::table('model_has_roles')->where('model_id',$id)->delete();
$user->assignRole($request->input('role_name'));
toastr()->success(trans('messages.Update'));
return redirect()->route('users.index');
}

/*public function update(Request $request)
{
    try {
    $validator = Validator::make($request->all(), [
        'name'        => 'same:confirm-name',
        'email'       => 'same:confirm-email',
        'password'    => 'same:confirm-password',
        'role_name'  => 'required|string',
    ]);

    $user = User::findOrFail($request->id);
    $role = Role::find($request->role_name);
    $user->update([
       'name'       => $request->name,
       'email'      => $request->email,
       'role_name' => $role->name,
       'password'   => Hash::make($request->password),
    ]);
    $user->roles()->detach();
    $user->assignRole($request->input('role_name'));
    toastr()->success(trans('messages.Update'));
    return redirect()->route('users.index');
    }
catch
(\Exception $e) {
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
}
}*/

}
