<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
      }
      body {
        width: 80%;
        margin: auto;
      }
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th,td {
        border: 1px solid black;
        padding: 0.5rem;
        text-align: center;
      }
      img {
        width: 50px;
      }
    </style>
  </head>
  <body>
    <h1>Product Report</h1>
    <table>
      <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Supplier</th>
            <th>Category</th>
        </tr>
      </thead>
      <tbody>
      @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>
                @if ($product->image)
                    <img src='{{storage_path("app/public/ImagensProdutos/$product->image")}}' alt="imagem">
                @else
                    <img src="/no-image.jpg" alt="imagem"> 
                @endif
            </td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->supplier->supplier_name}}</td>
            <td>{{$product->category->category_name}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </body>
</html>
