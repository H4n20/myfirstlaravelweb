@include("backend.user.component.breakcrumb", ['title' => $config['seo']['create']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="pannel-head">
                    <div class="pannel-title">Information</div>
                    <div class="pannel-description">Please fill in the information beside to create a new user.</div>
                    <div class="pannel-description">Note: Fields marked with <span class="text-danger">*</span> are required.</div>
                </div>
            </div>
            <div class="col-lg-7">
                <class="ibox">
                    <div class="ibox-title">
                        <h3>Basic Information</h3>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="name" class="control-label">Full Name
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter full name" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="email" class="control-label">Email
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Groups
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <select name="user_catalogue_id" class="form-control" >
                                        <option value="0" selected="selected">Select group</option>
                                        <option value="1">Administrators</option>
                                        <option value="2">Users</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="Birthday" class="control-label">Birthday
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="text" name="birthday" class="form-control" value="{{ old('birthday') }}" placeholder="yyyy-MM-dd" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-row">
                                    <label for="password" class="control-label">Password
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-row">
                                    <label for="password_confirmation" class="control-label">Confirm Password
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter password confirmation" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                    </div>
                </class>
            </div>
        </div>
        <div style="padding: 20px;"></div>
        <div class="row">
            <div class="col-lg-5">
                <div class="pannel-head">
                    <div class="pannel-title">Contact</div>
                    <div class="pannel-description">Please fill in the contact information of user.</div>
                </div>
            </div>
            <div class="col-lg-7">
                <class="ibox">
                    <div class="ibox-title">
                        <h3>Contact Information</h3>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="phone" class="control-label">Phone Number
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="phone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter phone number" autocomplete="off" 
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="province_id" class="control-label">Province/City
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="text" name="province_id" value="{{ old('province_id') }}" class="form-control" placeholder="Enter province/city" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="district_id" class="control-label">District
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="text" name="district_id" value="{{ old('district_id') }}" class="form-control" placeholder="Enter district" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="ward_id" class="control-label">Ward
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="text" name="ward_id" value="{{ old('ward_id') }}" class="form-control" placeholder="Enter ward" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="address" class="control-label">Address
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Enter address" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="address" class="control-label">Note</label>
                                    <input type="text" name="note" value="{{ old('note') }}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </class>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary" style="margin:20px;">Create User</button>
        </div>
</form>