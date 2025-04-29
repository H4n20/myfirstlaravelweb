<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $config['seo'] = config('apps.user');
        $users = User::paginate(20);
        $template = 'backend.user.index';
        return view(
            'backend.dashboard.layout',
            compact('template', 'users', 'config')
        );
    }

    public function create()
    {
        $config['seo'] = config('apps.user');
        $users = User::paginate(20);
        $template = 'backend.user.create';
        return view(
            'backend.dashboard.layout',
            compact('template', 'config')
        );
    }

    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->birthday = $request->birthday;
        $user->phone = $request->phone;
        $user->province_id = $request->province_id;
        $user->district_id = $request->district_id;
        $user->ward_id = $request->ward_id;
        $user->address = $request->address;
        $user->created_at = now();
        $user->updated_at = now();
        dd($request->all());
        $user->save();
        return redirect()->route('user.index')->with('success', 'User created successfully!');
    }
}