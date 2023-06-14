<x-app-layout>
    <h1 class="text-center text-2xl font-bold text-gray-800 my-10">Edit User</h1>

    <form action="{{url('product/save')}}" method="post" class="max-w-md mx-auto mt-6" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id" value="{{$product->id}}" name="id">

        <div class="mb-4">
            <label for="image" class="block font-medium mb-1">Image</label>
            <input type="file" id="image" value="{{$product->image}}" name="image" class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="name" class="block font-medium mb-1">Name</label>
            <input type="text" id="name" value="{{$product->name}}" name="name" class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="price" class="block font-medium mb-1">Price</label>
            <input type="number" id="price" value="{{$product->price}}" name="price" class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="category_id" class="block font-medium mb-1">Category</label>
            <select class="w-full px-4 py-2 border rounded" id="category_id" name="category_id">
                @foreach($categories as $category)
                    <option {{$category->id==old('category_id',$product->category_id)? 'selected':''}} value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="supplier_id" class="block font-medium mb-1">Suppliers</label>
            <select class="w-full px-4 py-2 border rounded" id="supplier_id" name="supplier_id">
                @foreach($suppliers as $supplier)
                    <option {{$supplier->id==old('supplier_id',$product->supplier_id)? 'selected':''}} value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" name="button" class="w-full py-2 px-4 bg-blue-500 text-white font-medium rounded hover:bg-blue-700">Save</button>
    </form>
</x-app-layout>