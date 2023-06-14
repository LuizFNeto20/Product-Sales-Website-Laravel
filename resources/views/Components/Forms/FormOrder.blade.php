@php
class ProductData {
    public $id;
    public $price;
    public $quantity;

    public function __construct($id, $price, $quantity) {
        $this->id = $id;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}
@endphp

<x-app-layout>
    <h1 class="text-center text-2xl font-bold text-gray-800 my-10">Order {{$order->id}}#</h1>

    <form action="{{url('/order/editStatus')}}" method="post" class="max-w-md mx-auto mt-6">
        @csrf
        <input type="hidden" class="form-control" id="id" value="{{$order->id}}" name="id">
        <input type="hidden" class="form-control" id="users_id" value="{{$order->users_id}}"
            name="users_id">
        <input type="hidden" class="form-control" id="order" value="{{$order->products}}"
            name="order">

        <div class="mb-4">
            <label for="nome" class="block font-medium mb-1">Name</label>
            <input readonly type="text" class="w-full px-4 py-2 border rounded" id="nome" value="{{$user->name}}" name="nome">
        </div>

        <div class="mb-4">
            <label for="date" class="block font-medium mb-1">Date</label>
            <input readonly type="date" class="w-full px-4 py-2 border rounded" id="date" name="date"
                value="{{$order->date}}">
        </div>

        <div class="mb-4">
            <label for="status" class="block font-medium mb-1">Status</label>
            <select class="w-full px-4 py-2 border rounded" name="status" id="status">
                <option @if ($order->status === "delivered") selected @endif value="delivered">Delivered</option>
                <option @if ($order->status === "in progress") selected @endif value="in progress">In progress</option>
                <option @if ($order->status === "sent") selected @endif value="sent">Sent</option>
                <option @if ($order->status === "cancelled") selected @endif value="cancelled">Cancelled</option>
            </select>
        </div>

        @php
            $vetorID = unserialize($order->products);
        @endphp

        @foreach ($vetorID as $id)
            @foreach ($products as $product)
                @if (intval($id->id) == $product->id)
                <div class="flex justify-center items-center m-5">
                    <div class="lg:max-w-full lg:flex">
                        <div class="border-r border-b border-l border-gray-400 lg:border-t lg:border-gray-400 bg-white p-4 flex flex-col justify-between leading">
                            <img src="/storage/ImagensProdutos/{{$product->image}}" style="width: 98px;" class="rounded-start" alt="...">
                        </div>
                        <div class="w-96 border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <div class="text-gray-900 font-bold text-xl mb-2 flex justify-between">
                                    {{$product->name}}
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="text-sm">
                                    <p class="text-gray-900 leading-none">{{$id->quantity}} x ------------------ R${{$id->price}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endforeach

        <button type="submit" name="button" class="w-full py-2 px-4 bg-blue-500 text-white font-medium rounded hover:bg-blue-700">Save</button>
    </form>

</x-app-layout>