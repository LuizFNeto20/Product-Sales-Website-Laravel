<?php
    $media = $reviews->where('product_id', $product->id)->avg('assessment');
    $media = intval($media);
?>

<x-app-layout>
    <div class="flex flex-row justify-center items-center m-5 border-b">
        <div class="w-56 h-56 rounded-full m-5">
            <img src='/storage/ImagensProdutos/{{$product->image}}' class="img-fluid rounded-start" alt="...">
        </div>
        <div class="w-1/2 m-5">
            <div class="">
                <h2 class="text-xl font-bold">
                    {{$product->name}}
                </h2>

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

                <h5 class="text-gray-600">
                    R$ {{$product->price}}
                </h5>

                @foreach ($suppliers as $supplier) 
                    @if ($supplier->id == $product->supplier_id) 
                        <h5 class="text-gray-600">{{$supplier->supplier_name}}</h5>
                    @endif
                @endforeach

                @foreach ($categories as $category) 
                    @if ($category->id == $product->category_id) 
                        <h5 class="text-gray-600 mb-4">{{$category->category_name}}</h5>
                    @endif
                @endforeach

                <a href="/cart/add/{{$product->id}}" class="bg-blue-500 mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-10">Add to cart</a>

                <a href="/"  class="bg-blue-500 mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4">Back</a>
            </div>
        </div>
    </div>
    <h3 class='text-xl font-bold' style='margin-left: 11%;'>Comments: </h3>

    @foreach ($reviews as $review)
            @php
                $date = \Carbon\Carbon::parse($review->date);
            @endphp
        @if ($review->product_id == $product->id) 
        <div class="flex justify-center items-center m-5">
            <div class="w-9/12 lg:max-w-full lg:flex">
                <div class="w-9/12 border border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-4 mt-4">
                        <div class="text-gray-700 text-base flex justify-between">
                            "{{$review->description}}"
                            <div class="flex items-center">
                                <form method="get" action="/product/info/{{$product->id}}">
                                    <input type="hidden" id="review_id" name="review_id" value="{{$review->id}}">
                                    <button class="bg-transparent text-black py-1 px-1 rounded">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </form>                    
                                <a href="/review/delete/{{$review->id}}" type="button" class="bg-transparent text-black py-1 px-1 rounded"><i class="fa-solid fa-circle-xmark"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        @foreach ($users as $user)
                            @if ($user->id == $review->user_id)
                        <img class="w-10 h-10 rounded-full mr-4" src="/storage/ImagensProdutos/{{$user->image}}" alt="Avatar of Jonathan Reinink">
                        <div class="text-sm">
                            <p class="text-gray-900 leading-none">{{$user->name}}</p>
                            @endif
                        @endforeach
                            <p class="text-gray-600">{{$date->format('d/m/Y')}}</p>
                        </div>
                        <div class="ml-4 text-sm">
                            @for ($i = 0; $i <= 4; $i++) 
                                @if ($i >= $review->assessment) 
                                    <i class='fa-regular fa-star cursor-pointer'></i>
                                @else
                                    <i class='fa-regular fa-solid fa-star cursor-pointer' style='color: #ecdb18;'></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endforeach


    @if (Auth::check())
    <form action="{{url('review/save')}}" method="post" class='mt-10'>
    @csrf
        <input type="hidden" class=" " id="product_id" name="product_id" value='{{$product->id}}'>
        <input type="hidden"  id="id" name="id" value="{{ isset($id_Review->id) ? $id_Review->id : ''}}">

        <h5 class="m-6 block text-sm font-medium text-slate-700">
            Avaliação:
            @if (isset($id_Review))
                @for ($i = 0; $i <= 4; $i++) 
                    @if ($i >= $id_Review->assessment)
                        <i class='fa-regular fa-star cursor-pointer' value='{{$i}}'></i>
                    @else
                        <i class='fa-regular fa-solid fa-star cursor-pointer' style='color: #ecdb18;' value='{{$i}}'></i>
                    @endif
                @endfor
            @else
                @for ($i = 0; $i <= 4; $i++)
                    <i class='fa-regular fa-star cursor-pointer' value='{{$i}}'></i>
                @endfor
            @endif
        </h5>

        <input type="hidden" id="assessment" name="assessment" value="{{ isset($id_Review->assessment) ? $id_Review->assessment : ''}}">

        <div class="m-6">
        <label class="block">
            <span class="block text-sm font-medium text-slate-700">
                Description
            </span>
            <input type="text" name="description" value="{{ isset($id_Review->description) ? $id_Review->description : ''}}"class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-80 rounded-md sm:text-sm focus:ring-1"/>
        </label>
        </div>

        <input type="hidden" id="product_id" name="product_id" value='{{$product->id}}'>
        <input type="hidden" id="user_id" name="user_id" value='{{Auth::id()}}'>

        <button class="bg-blue-500 mt-4 mb-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-6" type="submit" name="button">Salvar</button>
    </form>
    @endif
</x-app-layout>

<script>
    let regularStar = document.querySelectorAll('i[value]');
    let inputAssessment = document.querySelector('#assessment');

    let state = 0;
    regularStar.forEach((star) => {
        star.addEventListener('click', function () {
            if (star.getAttribute('value') < parseInt(state)) {
                for (let i = 0; i < regularStar.length; i++) {
                    regularStar[i].classList.remove('fa-solid');
                    regularStar[i].removeAttribute('style');
                }
            }

            for (let i = 0; i <= star.getAttribute('value'); i++) {
                regularStar[i].classList.add('fa-solid');
                regularStar[i].style.color = "#ecdb18";
            }

            state = star.getAttribute('value');
            inputAssessment.value = parseInt(state) + 1;
        });
    });

</script>
