<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TeamCollection;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view('register');
    }

    public function getRegister2()
    {
        return view('register-2');
    }

    public function dashboard($id) {
        $authUserId = Auth::id();
        if ($authUserId != $id) {
            return redirect()->route('dashboard', $authUserId);
        }
        $user = User::findOrFail($id);
        return view('dashboard', compact('user'));
        dd($user);
    }

    public function registerStep1(Request $request)
    {
        $request->validate([
            'team_name' => ['required', 'unique:users'],
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[^\w]/',
                'confirmed'
            ],
            'password_confirmation' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[^\w]/',
            ],
        ]);

        $registerData = [
            'team_name' => $request->team_name,
            'password' => bcrypt($request->password)
        ];

        // Store session
        Session::put('register_data', $registerData);

        // Verify session
        if (!Session::has('register_data')) {
            return back()->withErrors(['session' => 'Failed to save session data. Please try again.']);
        }

        return redirect()->route('getRegister2');
    }

    public function registerStep2(Request $request)
    {
        if (!Session::has('register_data')) {
        return redirect()->route('getRegister')->withErrors(['session' => 'Session expired, please restart registration.']);
        }

        $registerData = Session::get('register_data');

        if (!$registerData || !isset($registerData['team_name'])) {
            return redirect()->route('getRegister')->withErrors(['session' => 'Session data is missing. Please try again.']);
        }

        $request->validate([
            'leader_name' => 'required',
            'leader_email' => ['required', 'unique:users'],
            'member_1' => 'nullable|required_with:member_1_email',
            'member_1_email' => 'nullable|required_with:member_1',
            'member_2' => 'nullable|required_with:member_2_email',
            'member_2_email' => 'nullable|required_with:member_2',
            'member_3' => 'nullable|required_with:member_3_email',
            'member_3_email' => 'nullable|required_with:member_3',
            'leader_whatsapp' => ['required', 'unique:users'],
            'leader_line' => ['required', 'unique:users'],
            'leader_github' => 'required',
            'leader_birth_place' => 'required',
            'leader_birth_date' => [
            'required',
            'date',
            'before:' . Carbon::now()->subYears(17)->toDateString()
            ],
            'leader_cv' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'status' => 'required|boolean',
            'leader_card' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        try {
            $now = now()->format('Y-m-d_H.i.s');

            $leaderCvFile = $request->file('leader_cv');
            $leaderCvFilename = $now . '_' . $leaderCvFile->getClientOriginalName();
            $leaderCvFile->storeAs('leader_cv', $leaderCvFilename, 'public');

            $leaderCardFile = $request->file('leader_card');
            $leaderCardFilename = $now . '_' . $leaderCardFile->getClientOriginalName();
            $leaderCardFile->storeAs('leader_card', $leaderCardFilename, 'public');


            // Create user
            $userData = [
                'team_name' => $registerData['team_name'],
                'password' => $registerData['password'],
                'leader_name' => $request -> leader_name,
                'leader_email'  => $request -> leader_email,
                'member_1' => $request->member_1,
                'member_1_email' => $request->member_1_email,
                'member_2' => $request->member_2,
                'member_2_email' => $request->member_2_email,
                'member_3' => $request->member_3,
                'member_3_email' => $request->member_3_email,
                'leader_whatsapp'  => $request -> leader_whatsapp,
                'leader_line'  => $request -> leader_line,
                'leader_github' => $request -> leader_github,
                'leader_birth_place' => $request -> leader_birth_place,
                'leader_birth_date' => $request -> leader_birth_date,
                'leader_cv' => $leaderCvFilename,
                'status' => (bool) $request->input('status'),
                'leader_card' => $leaderCardFilename
            ];

            $user = User::create($userData);
            Log::info('New user created:', $user->toArray());
            Session::forget('register_data');

            return redirect('/')->with('success', 'Team registered successfully!');
        }
        catch (\Exception $e) {
            return back()->withErrors(['database' => 'An error occurred during registration. Please try again.']);
        }
    }


    function getLogin(){
        if (Auth::check()) {
            return redirect()->route('dashboard', Auth::id()); // Redirect to dashboard if already logged in
        }
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'team_name' => 'required',
            'password' => 'required'
        ]);

        $credentials = ([
            'team_name' => $request -> team_name,
            'password' => $request -> password
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            Cookie::queue('team_name', Auth::user()->team_name);
            Log::info(Auth::user()->team_name.' is login.');
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.index');
            }
            return redirect()->route('dashboard', Auth::id());
        }
        return back()->withErrors([
            'team_name' => 'The provided credentials do not match our records.'
        ])->onlyInput('team_name');
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::expire('team_name');
        return redirect('/');
    }

    function teamsAPI(){
        if (Auth::user()->team_name !== 'Admin Team') {
            return redirect('/')->with('error', 'Unauthorized');
        }
        $user = User::all();
    return new TeamCollection($user);
    }

}





