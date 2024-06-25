<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    @vite('resources/js/app.js')
    <style>
      form {
        display: flex;
        flex-direction: column;
      }

      form div {
        margin-bottom: 15px;
      }

      form label {
        margin-bottom: 5px;
        font-weight: bold;
      }

      form input[type="text"],
      form input[type="number"],
      form textarea,
      form select,
      form input[type="file"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ced4da;
        border-radius: 4px;
      }

      form input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      form input[type="submit"]:hover {
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
          <div>
            <h1 style="text-align: center;">EDIT Product</h1>
            <form action="{{url('edit_product/' . $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf

              <div>
                <label>Product Title</label>
                <input type="text" name="title" value="{{$data->title}}">
              </div>

              <div>
                <label>Description</label>
                <textarea name="desc">{{ $data->desc }}</textarea>
              </div>

              <div>
                <label>Price</label>
                <input type="text" name="price" value="{{$data->price}}">
              </div>

              <div>
                <label>Quantity</label>
                <input type="number" name="qte" value="{{$data->qte}}">
              </div>


              <div>
                <label>Product category</label>
                <select name="category" required>
                    <option value="{{ $data->category }}">{{ $data->category }}</option>
                  @foreach($category as $category)
                  <option value="{{$category->categories_name}}">{{$category->categories_name}}</option>
                @endforeach
               </select>
              </div>

              <h3 style="text-align: center;">Product Image</h3>

              <!-- Image Upload Container -->
              <div class="image-upload-container" style="display: block; margin: 0 auto;">
                <label for="image-upload">
                  <img width="600" height="450" src="/image_product/{{ $data->image }}"  alt="Product Image" style="display: block; margin: 0 auto;" >
                </label>
                <input type="file" id="image-upload" name="image" hidden>
              </div>
              <div>
              </div>

              <div>
                <input type="submit" value="Update" style="display: block; margin: 0 auto;">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>
