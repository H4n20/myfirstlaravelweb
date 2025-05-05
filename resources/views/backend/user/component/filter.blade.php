<form action="{{ route('user.index') }}" method="get" id="filter-form">
    <div class="perpage">
        <div class="row align-items-center">
            <div class="col-md-2">
                <a href="{{ route('user.create') }}" class="btn btn-primary w-100" style="font-size:15px;">Create User <i class="fa fa-plus"></i></a>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <select name="role" class="form-control" onchange="document.getElementById('filter-form').submit();">
                    <option value="">Select Group</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Administrators</option>
                    <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>Users</option>
                </select>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" 
                            name="keyword" 
                            value="{{ request('keyword') ?: old('keyword') }}" 
                            placeholder="Search" 
                            class="form-control">
                    <span class="input-group-btn">
                        <button type="submit" name="search" value="search" class="btn btn-primary mb0 btn-sm" style="font-size: 15px;">Search <i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</form>