<table class="table table-striped table-bordered" style="font-size: 15px;">
    <thead>
    <tr>
        <th>
            <input type="checkbox" value="" id="checkAll" class="input-checkbox">
        </th>
        <th style="width:90px">Avatar</th>
        <th>Info</th>
        <th>Contact</th>
        <th>Address</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
        @if(isset($users) && is_object($users))
            @foreach ($users as $user)
            <tr>
                <td>
                    <input type="checkbox" value="" id="checkAll" class="input-checkbox checkboxItems">
                </td>
                <td>
                    <img src="{{  $user->image }}" class="img-cover" alt="" width="100%">
                </td>
                <td>
                    <div><strong>Full Name</strong>: {{ $user->name }}</div>
                    <div><strong>Birthday</strong>: {{ $user->birthday }}</div>
                    <div><strong>Role</strong>: 
                        @if ($user->role == 'admin')
                            Administrators
                        @elseif ($user->role == 'user')
                            Users
                        @else
                            Unknown
                        @endif
                    </div>
                    <div><strong>Created At</strong>: {{ $user->created_at }}</div>
                </td>
                <td>
                    <div><strong>Email</strong> {{ $user->email }}</div>
                    <div><strong>Phone</strong>: {{ $user->phone }}</div>
                </td>
                <td>
                    <div><strong>Province</strong>: {{ $user->province_id }}</div>
                    <div><strong>Distric</strong>: {{ $user->district_id }}</div>
                    <div><strong>Ward</strong>: {{ $user->ward_id }}</div>
                    <div><strong>Adrress</strong>: {{ $user->address }}</div>
                </td>
                <td class="text-center">
                    <span class="label label-primary" style="font-size: 15px;">Active</span>
                </td>
                <td class="text-center">
                    <a href="{{ route('user.edit', $user->id) }}" 
                        class="btn btn-success" 
                        style="font-size: 15px;">Edit 
                        <i class="fa fa-edit"></i>
                    </a>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.delete', $user->id) }}" method="GET" style="display: none;">
                    @csrf
                    </form>
                    <a href="javascript:void(0)" 
                       onclick="if (confirm('Are you sure you want to delete this user?')) { document.getElementById('delete-form-{{ $user->id }}').submit(); }" 
                       class="btn btn-danger" 
                       style="font-size: 15px;">
                        Delete <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="text-center">
    {{ $users->links('pagination::bootstrap-4') }}
</div>