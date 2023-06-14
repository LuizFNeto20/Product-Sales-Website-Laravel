<x-app-layout>
    <h1 class="text-center text-2xl font-bold text-gray-800 my-10">Order List</h1>
    <table class="w-full divide-y divide-gray-200 mt-10 shadow-md rounded-lg">
    <thead class="bg-black">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">users_id</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"></th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($order as $order)
            @php
                $orderDate = \Carbon\Carbon::parse($order->date);
            @endphp
        <tr>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->id}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->status}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$orderDate->format('d/m/Y')}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->users_id}}</td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"><a class='text-blue-500 hover:text-blue-700 font-bold' href='edit/{{$order->id}}'>Edit</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</x-app-layout>