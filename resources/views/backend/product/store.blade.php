@include("backend.product.component.breakcrumb", ['title' => $config['seo']['create']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $url = route('product.store');
    if ($config['method'] == 'edit') {
        $url = route('product.update', $product->id);
    }
@endphp

<form action="{{ $url }}" method="POST">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="pannel-head">
                    <div class="pannel-title">Information</div>
                    <div class="pannel-description">Please fill in the information beside to create a new product.</div>
                    <div class="pannel-description">Note: Fields marked with <span class="text-danger">*</span> are required.</div>
                </div>
            </div>
            <div class="col-lg-7">
                <class="ibox">
                    <div class="ibox-title">
                        <h3>Product Information</h3>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="id_product" class="control-label">ID Product
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="text" 
                                            name="id_product"  
                                            value="{{ old('id_product', ($product->id_product) ?? '' ) }}" 
                                            class="form-control" maxlength="9" 
                                            {{ $config['method'] == 'edit' ? 'readonly' : '' }}
                                            autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="name" class="control-label">Name
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="text" name="name" value="{{ old('name', ($product->name) ?? '' ) }}" class="form-control" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="brand" class="control-label">Brand
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="text" name="brand" class="form-control" value="{{ old('brand', ($product->brand) ?? '' ) }}" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-row">
                                    <label for="quantity" class="control-label">Quantity
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="quantity" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', ($product->quantity) ?? '' ) }}" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-row">
                                    <label for="price" class="control-label">Price
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="price" name="price" id="price" class="form-control" value="{{ old('price', ($product->price) ?? '' ) }}" autocomplete="off" >
                                </div>
                            </div>       
                            @php
                                $status = [
                                    'Select status',
                                    'Available',
                                    'Unavailable',
                                ];
                            @endphp
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Status
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <select name="status" class="form-control" >
                                        @foreach ($status as $key => $value)
                                        <option {{ $key == old('status', 
                                        (isset($user->status)) ?
                                        $user->status : '') ? 'selected' : ''}}
                                        value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>          
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', ($product->description) ?? '' ) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-row">
                                    <label for="image" class="control-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control" placeholder="Enter password confirmation" autocomplete="off" >
                                </div>
                        </div>
                    </div>
                </class>
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary" style="margin:20px;">Save</button>
        </div>
</form>