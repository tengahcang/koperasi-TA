<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data Master</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">
                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('categories.index') }}" class="nav-link active">Categories List</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('products.index') }}" class="nav-link active">Product List</a></li>
                </ul>
                <hr class="d-lg-none text-white-50">
                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i class="bi-person-circle me-1"></i>My Profile</a>
            </div>
        </div>
    </nav>
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Detail product</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="categoryName" class="form-label">category Name</label>
                        <h5>{{ $product->category_name }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="productName" class="form-label">product Name</label>
                        <h5>{{ $product->name }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="price" class="form-label">product price</label>
                        <h5>Rp {{ number_format($product->price, 2, ',', '.') }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="stock" class="form-label">product stock</label>
                        <h5>{{ $product->stock }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="barcode" class="form-label">product barcode</label>
                        <h5>{{ $product->barcode }}</h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
