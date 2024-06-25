<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    @vite('resources/js/app.js')
    <style>
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
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidbar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="table">
                <table>
                    <tr>
                        <th>PRODUCT</th>
                        <th>PRICE </th>
                        <th>CUSTOMER NAME</th>
                        <th>PHONE N°</th>
                        <th>ADDRESS</th>
                        <th>PRINT PDF</th>

                    </tr>
                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->title}}</td>
                        <td>{{$data->price}} $</td>
                        <td>{{$data->Nom}}</td>
                        <td>{{$data->Telephone}}</td>
                        <td>{{$data->address}}</td>
                        <td><a class="btn btn-primary" href="{{url('print' , $data->id)}}" >PRINT PDF</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
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
