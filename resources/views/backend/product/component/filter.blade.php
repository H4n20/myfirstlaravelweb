<form action="{{ route('product.index') }}" method="get">
    <div class="perpage">
        <div class="row align-items-center">
            <div class="col-md-2">
                <a href="{{ route('product.create') }}" class="btn btn-primary w-100" style="font-size:15px;">Create Product <i class="fa fa-plus"></i></a>
            </div>
            <div class="col-md-2">
                <select name="status" class="form-control" onchange="this.form.submit()">
                    <option value="0" {{ request('status') == 0 ? 'selected' : '' }}>Select status</option>
                    <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>Available</option>
                    <option value="2" {{ request('status') == 2 ? 'selected' : '' }}>Unavailable</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="brand" class="form-control" onchange="this.form.submit()">
                    <option value="0" {{ request('brand') == 0 ? 'selected' : '' }}>Select brand</option>
                    <option value="1" {{ request('brand') == 1 ? 'selected' : '' }}>DELL</option>
                    <option value="2" {{ request('brand') == 2 ? 'selected' : '' }}>ASUS</option>
                    <option value="3" {{ request('brand') == 2 ? 'selected' : '' }}>Acer</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="price" class="form-control" onchange="this.form.submit()">
                    <option value="0" {{ request('price') == 0 ? 'selected' : '' }}>Select price</option>
                    <option value="1" {{ request('price') == 1 ? 'selected' : '' }}>0.0-100.00</option>
                    <option value="2" {{ request('price') == 2 ? 'selected' : '' }}>100.00-200.00</option>
                    <option value="3" {{ request('price') == 3 ? 'selected' : '' }}>200.00-300.00</option>
                    <option value="4" {{ request('price') == 4 ? 'selected' : '' }}>300.00-400.00</option>
                    <option value="5" {{ request('price') == 5 ? 'selected' : '' }}>400.00-500.00</option>
                    <option value="6" {{ request('price') == 6 ? 'selected' : '' }}>500.00-600.00</option>
                    <option value="7" {{ request('price') == 7 ? 'selected' : '' }}>600.00-700.00</option>
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