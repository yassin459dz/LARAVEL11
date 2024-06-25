<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/js/app.js')

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        /* Global styles */
        * {
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary-color: #5344db;
            --accent-color: #5344db;
            --grey: #484848;
            --shadow: #949494;
        }

        /* Container and layout */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-top: 60px; /* To make room for the fixed header */
        }

        .row {
            display: flex;
            gap: 20px;
        }

        .col-6 {
            width: 50%;
        }

        .single-product {
            width: 1080px;
        }

        /* Breadcrumb */
        .breadcrumb {
            background: #48484810;
            padding: 8px 4px;
            border-radius: 8px;
            font-size: 15px;
            margin-top: 80px;
        }

        .breadcrumb span {
            display: inline-flex;
            flex-direction: row;
            gap: 8px;
            margin-left: 8px;
        }

        .breadcrumb span:not(:last-child)::after {
            content: '/';
            margin-left: 8px;
        }

        .breadcrumb span a {
            text-decoration: none;
            color: var(--primary-color);
        }

        /* Product image */
        .product-image {
            width: 100%;
        }

        .product-image-main {
            height: 480px;
            background: var(--bg-grey);
            padding: 10px;
        }

        .product-image-main img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Product title */
        .product-title {
            margin-top: 20px;
        }

        .product-title h2 {
            font-size: 32px;
            line-height: 2.4rem;
            font-weight: 700;
            letter-spacing: -0.02rem;
        }

        /* Product price */
        .product-price {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .offer-price {
            font-size: 48px;
            font-weight: 700;
        }

        /* Product details */
        .product-details {
            margin: 10px 0;
        }

        .product-details h3 {
            font-size: 18px;
            font-weight: 500;
        }

        .product-details p {
            margin: 5px 0;
            font-size: 14px;
            line-height: 1.2rem;
        }

        /* Divider */
        .divider {
            height: 1px;
            width: 100%;
            background: #48484830;
            margin: 20px 0;
        }

        /* Product button group */
        .product-btn-group {
            display: flex;
            gap: 15px;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            padding: 10px 24px;
            font-size: 16px;
            font-weight: 500;
        }

        .buy-now {
            background-color: var(--accent-color);
            color: #fff;
            border: 1px solid var(--accent-color);
            border-radius: 4px;
            cursor: pointer;
        }

        .buy-now i {
            font-size: 20px;
        }

        .buy-now:hover {
            box-shadow: 0 3px 6px var(--shadow);
        }

        /* Header styles */
        header {
            width: 100%;
            background-color: var(--primary-color);
            padding: 10px 0;
            box-shadow: 0 2px 4px var(--shadow);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            padding: 8px 12px;
            transition: background 0.3s;
        }

        nav a:hover {
            background-color: var(--accent-color);
            border-radius: 4px;
        }
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
        /* Responsive styles */
        @media (max-width: 768px) {
            header .container {
                flex-direction: column;
                align-items: flex-start;
            }

            nav {
                flex-direction: column;
                width: 100%;
                gap: 10px;
            }

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
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <a href="/" class="logo">MyShop</a>
            <nav>
                <a href="{{ url('/login') }}">Log In</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="single-product">
            <div class="row">
                <div class="col-6">
                    <div class="product-image">
                        <div class="product-image-main">
                            <img src="{{ asset('image_product/' . $data->image) }}" alt="Product Image">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="breadcrumb">
                        <span><a href="/">Home</a></span>
                        <span class="active">{{ $data->category }}</span>
                    </div>

                    <div class="product">
                        <div class="product-title">
                            <h2>{{ $data->title }}</h2>
                        </div>
                        <div class="product-price">
                            <span class="offer-price">${{ $data->price }}</span>
                        </div>
                        <div class="product-details">
                            <h3>Description</h3>
                            <p>{{ $data->desc }}</p>
                        </div>
                        <span class="divider"></span>

                        <form action="{{ url('Order') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="title" value="{{$data->title}}"  hidden >
                            <input type="text" name="price" value="{{$data->price}}"   hidden>
                            <div>
                                <label for="Nom">Nom</label>
                                <input type="text" id="Nom" name="Nom" required>
                            </div>

                            <div>
                                <label for="telephone">N° Telephone</label>
                                <textarea id="telephone" name="telephone" required></textarea>
                            </div>

                            <div>
                                <label for="telephone">Address</label>
                                <input type="text" id="address" name="address" required>
                            </div>

                            <div>
                                <button class="button buy-now" type="submit">
                                    <i class='bx bxs-zap'></i> Buy Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('imagePreview');
                output.innerHTML = '<img src="' + reader.result + '" alt="Image Preview" style="max-width: 100%; height: auto;"/>';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
