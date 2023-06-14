<x-app-layout>
    <h1 class="text-center text-2xl font-bold text-gray-800 my-10">New Category</h1>

    <form action="{{url('category/save')}}" method="post" class="max-w-md mx-auto mt-6">
        @csrf
        <input type="hidden" id="id" value="{{$category->id}}" name="id">

        <div class="mb-4">
            <label for="category_name" class="block font-medium mb-1">Name</label>
            <input type="text" id="category_name" value="{{$category->category_name}}" name="category_name" class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium mb-1">Description</label>
            <input type="text" id="description" value="{{$category->description}}" name="description" class="w-full px-4 py-2 border rounded">
        </div>

        <button type="submit" name="button" class="w-full py-2 px-4 bg-blue-500 text-white font-medium rounded hover:bg-blue-700">Save</button>
    </form>

</x-app-layout>