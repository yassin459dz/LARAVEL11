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
            <h1 style="text-align: center;">Add Product</h1>
            <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                @csrf

              <div>
                <label>Product Title</label>
                <input type="text" name="title" required>
              </div>

              <div>
                <label>Desc</label>
                <textarea name="desc" required></textarea>
              </div>

              <div>
                <label>Price</label>
                <input type="text" name="price" required>
              </div>

              <div>
                <label>Quantity</label>
                <input type="number" name="qte" required>
              </div>

              <div>
                <label>Product category</label>
                <select name="category" required>
                  <option>Select Category</option>
                  @foreach($category as $category)
                  <option value="{{$category->categories_name}}">{{$category->categories_name}}</option>
                @endforeach
               </select>
              </div>

              <div>
                <label>Product Image</label>
                <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
                <div id="imagePreview"></div> <!-- Container for image preview -->
              </div>

              </div>

              <div>
                <input class="btn btn-success" type="submit" value="Submit" >
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
    <!-- JavaScript for image preview -->
  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('imagePreview');
        output.innerHTML = '<img src="' + reader.result + '" style="max-width: 100%; max-height: 200px;">';
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
  </body>
</html>
