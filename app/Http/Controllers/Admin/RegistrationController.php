<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Model\Registration;
use App\Model\UserRole;
use Validator;

class RegistrationController extends Controller
{
    public function addItem(Request $request)
    {
        $data = new Registration;
        $data->name = $request->name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->password = Crypt::encrypt($request->password);
        $data->save();
        return response()->json($data);
    }
    public function readItems(Request $request)
    {
        $reg = Registration::get();
        $user = Registration::where('email',session('user'))->first();
        $role = UserRole::where('user_id',$user->id)->first();
        $data = compact('reg','user','role');
        // dd($data);
        return view('admin.pages.registrations.add', $data);
    }
    public function editItem(Request $request)
    {
        $data = Registration::find($request->id);

        $data->name = $request->name;
        $data->last_name = $request->last_name;
        $data->save();
        return response()->json($data);
    }
    public function deleteItem(Request $request)
    {
        Registration::find($request->id)->delete();

        return response()->json();
    }
}
