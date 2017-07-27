<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Session;
use Auth;
use Hash;
use \Carbon\Carbon;

use App\User;
use App\Personalisasi;

class UserController extends Controller
{
    //

    public function adminIndex(Request $request)
    {
        $member = User::where('level', 'user')->paginate(10);

        return view('admin.user.index', compact('member'));
    }

    public function profile(Request $request)
    {
        $personalisasi = Personalisasi::all();
        $user = Auth::user();
        return view('user.profile', compact('user', 'personalisasi'));
    }

    public function updateProfile(Request $request)
    {
        

        $user = Auth::user();

        $validator = Validator::make($request->All(), [
           'first_name' => 'required|max:255',
           'last_name' => 'required|max:255',
           'gender' => 'required|in:male,female',
           'phone' => 'max:255',
           // 'email' => [
           //      'required',
           //      'max:255',
           //      Rule::unique('users')->ignore($user->id, '_id'),
           //  ],
        ]);

        

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->with('err', $validator->errors()->all());
        }

        $dob = $request->thn . '-' . $request->bln . '-' . $request->tgl;
        if (! checkdate($request->bln, $request->tgl, $request->thn)) {
            return redirect()->back()
                ->withInput()
                ->with('msg', '<div class="alert alert-danger">Tanggal Lahir tidak valid</div>');
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dateofbirth = $dob;
        $user->gender = $request->gender;
        $user->phone = $request->phone;

        $user->save();

        return redirect()->back()->with('msg', '<div class="alert alert-success">Berhasil memperbaharui profile</div>');
    }
}
