<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    @vite('resources/js/app.js')
    <style>
        /* Container styling */
        .table {
            width: 100%;
            margin: 20px auto;
            overflow-x: auto;
        }

        /* Table styling */
        .table table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }

        /* Header styling */
        .table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            padding: 12px 15px;
            border-bottom: 2px solid #ddd;
        }

        /* Row and cell styling */
        .table td {
            padding: 12px 15px;
            color: #000000;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
        }

        /* Row hover effect */
        .table tr:hover {
            background-color: #f1f1f1;
        }
        /* Image cell styling */
        .table td img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        /* Custom image size */
        .product-image {
            height: 300px; /* Adjust as needed */
            width: 300px; /* Adjust as needed */
        }
        .container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 0 20px;
    }

    /* Search form styling */
    .search-form {
      display: flex;
      margin-bottom: 20px;
    }

    .search-form input[type="search"] {
      flex: 1;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px 0 0 4px;
      border-right: none;
      outline: none;
    }

    .search-form input[type="submit"] {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 0 4px 4px 0;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .search-form input[type="submit"]:hover {
      background-color: #0056b3;
    }

    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidbar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <a class="btn btn-primary" href="add_product" role="button">add product</a>

            <div class="container">
                <div class="search-form">
                  <form action="{{url('product_search')}}" method="get">
                    @csrf
                    <input type="search" name="search" placeholder="Enter your search">
                    <input type="submit" value="Search">
                  </form>
                </div>
            </div>

            <div class="table">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Desc </th>
                        <th>price</th>
                        <th>Qte</th>
                        <th>Category</th>
                        <th>image</th>
                        <th>EDIT</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($product as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->desc}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->qte}}</td>
                        <td>{{$product->category}}</td>
                        <td>
                            <img class="product-image" src="{{asset('image_product/'.$product->image)}}" alt="image">
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product' ,$product->id )}}">EDIT</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product' ,$product->id )}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
          </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>
