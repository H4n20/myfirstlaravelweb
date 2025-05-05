<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function __construct()
    {

    }

    // list user
    public function index(Request $request)
    {
        $query = User::query();
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }
        if ($request->filled('keyword')) {
            $query = $query->where('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%')
                ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                ->orWhere('address', 'like', '%' . $request->keyword . '%')
                ->orWhere('birthday', 'like', '%' . $request->keyword . '%')
                ->orWhere('province_id', 'like', '%' . $request->keyword . '%')
                ->orWhere('district_id', 'like', '%' . $request->keyword . '%')
                ->orWhere('ward_id', 'like', '%' . $request->keyword . '%');
        }

        $config['seo'] = config('apps.user');
        $users = $query->paginate(20);
        $template = 'backend.user.index';
        return view(
            'backend.dashboard.layout',
            compact('template', 'users', 'config')
        );
    }

    public function create()
    {
        $config['seo'] = config('apps.user');
        $config['method'] = 'create';
        $users = User::paginate(20);
        $template = 'backend.user.store';
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
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->birthday = $request->birthday;
        $user->phone = $request->phone;
        $user->province_id = $request->province_id;
        $user->district_id = $request->district_id;
        $user->ward_id = $request->ward_id;
        $user->address = $request->address;
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        return redirect()->route('user.index')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';
        $user = User::findOrFail($id);
        $template = 'backend.user.store';
        return view(
            'backend.dashboard.layout',
            compact('template', 'user', 'config')
        );
    }

    public function update($id, UserUpdateRequest $request)
    {
        $user = User::findOrFail($id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->birthday = $request->birthday;
        $user->phone = $request->phone;
        $user->province_id = $request->province_id;
        $user->district_id = $request->district_id;
        $user->ward_id = $request->ward_id;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }

}