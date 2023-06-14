<x-app-layout>
<h1 class="text-center text-2xl font-bold text-gray-800 my-10">User List</h1>
    <table class="w-full divide-y divide-gray-200 mt-10 shadow-md rounded-lg">
    <thead class="bg-black">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Image</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Created At</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"></th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"></th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($users as $user)
            @php
                $createdAt = \Carbon\Carbon::parse($user->created_at);
            @endphp
        <tr>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$user->id}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                @if ($user->image)
                    <img src="/storage/ImagensProdutos/{{$user->image}}" alt="imagem" class="w-24 h-24 rounded-full">
                @else
                    <img src="/no-image.jpg" alt="imagem" class="w-24 h-24 rounded-full"> 
                @endif
            </td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$user->name}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$user->email}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$createdAt->format('d/m/Y H:i:s')}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"><a class='text-blue-500 hover:text-blue-700 font-bold' href='edit/{{$user->id}}'>Edit</a></td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"><a class='text-rose-500 hover:text-rose-700 font-bold' href='delete/{{$user->id}}'>Delete</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</x-app-layout>