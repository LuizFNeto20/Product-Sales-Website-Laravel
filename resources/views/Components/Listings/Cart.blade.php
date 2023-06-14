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
    <h1 class="text-center text-3xl font-bold m-5">Cart:</h1>
    <div class="border mt-5">
        @foreach($productsCart as $cart)
            @foreach($products as $product)
                @if($cart->product_id == $product->id)
                    @php
                        $productPrice = 0;

                        $productIds[] = $product->id;

                        $productPrice = $product->price * $cart->quantity;
                        $productPrice = number_format($productPrice, 2, ',', '.');

                        $data = new ProductData($product->id, $productPrice, $cart->quantity);
                        $productData[] = $data;

                        $productString = serialize($productData);

                    @endphp
                    <div class="flex justify-center items-center m-5">
                        <div class="lg:max-w-full lg:flex">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/storage/ImagensProdutos/{{$product->image}}')" title="Woman holding a mug">
                            </div>
                            <div class="w-96 border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <div class="mb-8">
                                    <div class="text-gray-900 font-bold text-xl mb-2 flex justify-between">
                                        {{$product->name}}
                                        <a href="/cart/delete/{{$product->id}}" type="button" class="bg-transparent text-black py-1 px-1 rounded"><i class="fa-solid fa-circle-xmark"></i></a>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-sm">
                                        <p class="text-gray-900 leading-none">{{$cart->quantity}} x --------------------------------------- R$ {{$productPrice}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
        <div class="flex justify-center items-center m-5">
            <form action="/order/save" method="post" class='formids'>
                @csrf
                @if (isset($productString))
                    <input type="hidden" id="order" name="order" value="{{$productString}}">
                @else
                    <input type="hidden" id="order" name="order" value="">
                @endif
                <button type="submit" class="bg-blue-500 mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4">Buy</button>
            </form>
            <a href="/cart/cancel" type="button" class="bg-blue-500 mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4">Cancel</a>
        </div>
    </div>
</x-app-layout>