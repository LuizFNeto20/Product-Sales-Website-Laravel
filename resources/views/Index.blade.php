<x-app-layout>
<div class="flex flex-wrap">
  @foreach($products as $product)
    <?php
      $media = $reviews->where('product_id', $product->id)->avg('assessment');
      $media = intval($media);
    ?>
    <div class="w-72 rounded overflow-hidden shadow-lg m-auto my-4 text-center">
      @if($product->image != "")
        <img alt="" class='w-full h-64' src="/storage/ImagensProdutos/{{$product->image}}">
      @endif  
      <div class="px-6 py-4">
        <div class='flex mt-2' style='margin: 0 0 0 30%'>
          @if (isset($media))
            @for ($i = 0; $i < 5; $i++)
              @if ($i >= $media)
                <i class='fa-regular fa-star text-gray-600 text-sm'></i>
              @else
                <i class='fa-solid fa-star' style='color: #ecdb18;'></i>
              @endif
            @endfor
          @else
            @for ($i = 0; $i < 5; $i++)
              <i class='fa-regular fa-star text-gray-600 text-sm'></i>
            @endfor
          @endif
        </div>
        <div class="font-bold text-xl mb-2">{{$product->name}}</div>
        <p class='text-gray-700'>Preço: R${{$product->price}}</p>
        <button class="bg-blue-500 mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='/product/info/{{$product->id}}'">View more</button>
      </div>
      <div class="px-6 pt-4 pb-2 flex justify-center">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mb-2">#{{$product->category->category_name}}</span>
      </div>
    </div>
  @endforeach
</div>
</x-app-layout>