{{-- <!DOCTYPE html>
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
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">
                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('categories.index') }}" class="nav-link">Categories List</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('product.index') }}" class="nav-link">Product List</a></li>
                </ul>
                <hr class="d-lg-none text-white-50">
                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i class="bi-person-circle me-1"></i>My Profile</a>
            </div>
        </div>
    </nav>
    <div class="container-sm mt-5">
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Create Product</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('position') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">product name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter product Name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">price</label>
                            <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" id="price" value="{{ old('price') }}" placeholder="Enter price">
                            @error('price')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stock" class="form-label">stock</label>
                            <input class="form-control @error('stock') is-invalid @enderror" type="number" name="stock" id="stock" value="{{ old('stock') }}" placeholder="Enter stock">
                            @error('stock')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="barcode" class="form-label">barcode</label>
                            <input class="form-control @error('barcode') is-invalid @enderror" type="text" name="barcode" id="barcode" value="{{ old('barcode') }}" placeholder="Enter barcode">
                            @error('barcode')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('product.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @vite('resources/js/app.js')
</body>

</html> --}}






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
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
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('categories.index') }}" class="nav-link">Categories List</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('products.index') }}" class="nav-link">Product List</a></li>
                </ul>
                <hr class="d-lg-none text-white-50">
                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i class="bi-person-circle me-1"></i>My Profile</a>
            </div>
        </div>
    </nav>

    <div class="container-sm mt-5">
        <form action="{{ route('products.store') }}" method="POST" id="productForm">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Create Product</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter product name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" id="price" value="{{ old('price') }}" placeholder="Enter price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input class="form-control @error('stock') is-invalid @enderror" type="number" name="stock" id="stock" value="{{ old('stock') }}" placeholder="Enter stock">
                            @error('stock')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="button" class="btn btn-dark btn-lg mt-3" id="scanBeforeSave"><i class="bi-upc-scan me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal Barcode -->
    <div class="modal fade" id="barcodeModal" tabindex="-1" aria-labelledby="barcodeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="barcodeModalLabel">Scan Barcode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Silakan scan barcode produk menggunakan scanner.</p>
                    <input class="form-control" type="text" id="barcodeInputModal" placeholder="Scan barcode di sini..." autofocus>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="confirmBarcode">Simpan & Kirim</button>
                </div>
            </div>
        </div>
    </div>
    {{-- @vite('resources/js/app.js') --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const barcodeInputModal = document.getElementById("barcodeInputModal");
            const barcodeMainInput = document.createElement("input");
            barcodeMainInput.type = "hidden";
            barcodeMainInput.name = "barcode";
            document.getElementById("productForm").appendChild(barcodeMainInput);

            const scanBeforeSaveButton = document.getElementById("scanBeforeSave");
            const confirmBarcodeButton = document.getElementById("confirmBarcode");

            // Saat tombol Save ditekan, tampilkan modal barcode
            scanBeforeSaveButton.addEventListener("click", function() {
                console.log("Tombol Save ditekan"); // Debugging
                var barcodeModal = new bootstrap.Modal(document.getElementById("barcodeModal"));
                barcodeModal.show();
                barcodeInputModal.focus();
            });

            // Saat tombol "Simpan & Kirim" ditekan, input barcode diisi dan form dikirim
            confirmBarcodeButton.addEventListener("click", function() {
                barcodeMainInput.value = barcodeInputModal.value;
                barcodeInputModal.value = "";
                document.getElementById("productForm").submit();
            });

            // Jika pengguna menekan Enter setelah scan, langsung simpan
            barcodeInputModal.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    confirmBarcodeButton.click();
                }
            });
        });
    </script>


</body>

</html>
