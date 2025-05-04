<table class="table table-striped table-bordered" style="font-size: 15px;">
    <thead>
    <tr>
        <th>
            <input type="checkbox" value="" id="checkAll" class="input-checkbox">
        </th>
        <th style="width:90px">Image</th>
        <th class="col-md-5">Product Info</th>
        <th>Brand</th>
        <th>Quantity</th>
        <th>Price</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
        @if(isset($products) && is_object($products))
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <img src="{{ $product->image }}" class="img-cover" alt="Product Image" width="100%">
            </td>
            <td>
                <div><strong>ID</strong>: {{ $product->id_product }}</div>
                <div><strong>Name</strong>: {{ $product->name }}</div>
                <div><strong>Description</strong>: {{ $product->description }}</div>
            </td>
            <td>{{ $product->brand }}</td>
            <td>{{ $product->quantity }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td class="text-center">
                <span class="label {{ $product->status == 'available' ? 'label-success' : 'label-danger' }}" style="font-size: 15px;">
                    {{ ucfirst($product->status) }}
                </span>
            </td>
            <td class="text-center">
                <a href="{{ route('product.edit', $product->id) }}" 
                    class="btn btn-success" 
                    style="font-size: 15px;">Edit 
                    <i class="fa fa-edit"></i>
                </a>
                <form id="delete-form-{{ $product->id }}" action="{{ route('product.delete', $product->id) }}" method="GET" style="display: none;">
                    @csrf
                    </form>
                    <a href="javascript:void(0)" 
                       onclick="if (confirm('Are you sure you want to delete this product?')) { document.getElementById('delete-form-{{ $product->id }}').submit(); }" 
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
    {{ $products->links('pagination::bootstrap-4') }}
</div>