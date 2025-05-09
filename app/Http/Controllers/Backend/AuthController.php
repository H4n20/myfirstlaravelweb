<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        if (Auth::id() > 0) {
            return redirect()->route("dashboard.index");
        }
        return view("backend.auth.login");
    }

    public function login(AuthRequest $request)
    {
        $scredentials = [
            "email" => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($scredentials)) {
            return redirect()->route("dashboard.index")->with("success", "Login successful");
        }
        return back()->withErrors([
            'password' => 'Password is incorrect.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Redirect to the login page with a success message
        return redirect()->route("auth.admin");
    }
}