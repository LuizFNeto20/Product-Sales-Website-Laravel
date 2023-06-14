<x-app-layout>
<h1 class="text-center text-2xl font-bold text-gray-800 my-10">ProductList</h1>
    <table class="w-full divide-y divide-gray-200 mt-10 shadow-md rounded-lg">
    <thead class="bg-black">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Image</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Price</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Supplier</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Category</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"></th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"></th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($products as $product)
        <tr>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$product->id}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                @if ($product->image)
                    <img src="/storage/ImagensProdutos/{{$product->image}}" alt="imagem" class="w-24 h-24 rounded-full">
                @else
                    <img src="/no-image.jpg" alt="imagem" class="w-24 h-24 rounded-full"> 
                @endif
            </td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$product->name}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$product->price}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$product->supplier->supplier_name}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$product->category->category_name}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"><a class='text-blue-500 hover:text-blue-700 font-bold' href='edit/{{$product->id}}'>Edit</a></td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"><a class='text-rose-500 hover:text-rose-700 font-bold' href='delete/{{$product->id}}'>Delete</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>

    
    <div class='text-center'>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-10"><a href="new">Add Product</a></button>
    </div>
</x-app-layout>