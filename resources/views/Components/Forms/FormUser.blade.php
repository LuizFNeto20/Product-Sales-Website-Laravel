<x-app-layout>
    <h1 class="text-center text-2xl font-bold text-gray-800 my-10">Edit User</h1>
    
    @if ($user->image)
        <img src="/storage/ImagensProdutos/{{$user->image}}" alt="imagem" class="w-48 h-48 m-auto rounded-full">
    @else
        <img src="/no-image.jpg" alt="imagem" class="w-48 h-48 m-auto"> 
    @endif
    
    <form action="{{url('user/save')}}" method="post" class="max-w-md mx-auto mt-6">
        @csrf
        <input type="hidden" id="id" value="{{$user->id}}" name="id">

        <div class="mb-4">
            <label for="name" class="block font-medium mb-1">Name</label>
            <input type="text" id="name" value="{{$user->name}}" name="name" class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium mb-1">Email</label>
            <input type="email" id="email" value="{{$user->email}}" name="email" class="w-full px-4 py-2 border rounded">
        </div>

        <!-- CEP -->
        <div class="mb-4">
            <label for="CEP" class="block font-medium mb-1">CEP</label>
            <input type="text" id="CEP" value="{{$user->cep}}" name="cep" class="w-full px-4 py-2 border rounded">
        </div>

        <!-- House Number  -->
        <div class="mb-4">
            <label for="HouseNumber" class="block font-medium mb-1">HouseNumber</label>
            <input type="text" id="HouseNumber" value="{{$user->house_number}}" name="HouseNumber" class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium mb-1">Password</label>
            <input type="password" id="password" value="" name="password" class="w-full px-4 py-2 border rounded">
        </div>

        <button type="submit" name="button" class="w-full py-2 px-4 bg-blue-500 text-white font-medium rounded hover:bg-blue-700">Save</button>
    </form>

</x-app-layout>