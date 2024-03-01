<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {  
        return view('Dashboard.modules.dashboard');
    }

    public function profile()
    {
        return view('Dashboard.modules.profile');
    }


    public function profile_update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $user = User::find($id);

            if ($request->hasFile('image')) {
                $destination = 'uploads/profile/' . $user->image;

                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $path = 'uploads/profile/';
                $file->move(public_path($path), $filename);
                $user->image = $filename;
            }

            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->update();
        }

        session()->flash('msg', 'Profile Updated Successfully.');
        session()->flash('cls', 'success');
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate(
            [
                'current_password' => 'required|string',
                'password' => 'required|string|min:4|confirmed',
                'password_confirmation' => 'required'
            ],
            $message = [
                'password.confirmed' => 'Confirm password does not match.'
            ]
        );

        $currentPasswordStatus = Hash::check($request->current_password, Auth::user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            session()->flash('msg', 'Password Updated Successfully.');
            session()->flash('cls', 'success');
            return redirect()->back();
        } else {

            session()->flash('message', 'Old Password does not match with Current Password.');
            session()->flash('cls', 'danger');
            return redirect()->back();
        }
    }
}
