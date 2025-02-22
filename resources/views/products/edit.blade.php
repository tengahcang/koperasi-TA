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
        <form action="{{ route('products.store') }}" method="POST">
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
                                @php
                                    $selected = "";
                                    if ($errors->any())
                                        $selected = old('category');
                                    else
                                        $selected = $product->categories_id;
                                @endphp
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $selected == $category->id ? 'selected' : '' }} {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input class="form-control @error ('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ $errors->any() ? old('name') : $product->name }}" placeholder="Enter product name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input class="form-control @error ('price') is-invalid @enderror" type="number" name="price" id="price" value="{{ $errors->any() ?  old('price') : $product->price }}" placeholder="Enter price">
                            @error('price')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input class="form-control @error ('stock') is-invalid @enderror" type="number" name="stock" id="stock" value="{{ $errors->any() ? old('stock') : $product->stock }}" placeholder="Enter stock">
                            @error('stock')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="barcode" class="form-label">Barcode</label>
                            <div class="input-group">
                                <input class="form-control @error ('barcode') is-invalid @enderror" type="text" name="barcode" id="barcode" value="{{ $errors->any() ? old('barcode') : $product->barcode }}" placeholder="Scan barcode atau tekan tombol">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#barcodeModal">
                                    <i class="bi-upc-scan"></i> Scan Barcode
                                </button>
                            </div>
                            @error('barcode')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
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
                    <button type="button" class="btn btn-primary" id="confirmBarcode">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const barcodeInputModal = document.getElementById("barcodeInputModal"); // Input di modal
            const barcodeInput = document.getElementById("barcode"); // Input barcode di form
            const confirmBarcodeButton = document.getElementById("confirmBarcode"); // Tombol "Simpan" di modal

            // Saat tombol "Simpan" di modal diklik
            confirmBarcodeButton.addEventListener("click", function() {
                // Isi nilai barcode dari modal ke input barcode di form
                barcodeInput.value = barcodeInputModal.value;
                // Tutup modal
                const modal = bootstrap.Modal.getInstance(document.getElementById("barcodeModal"));
                modal.hide();
            });

            // Jika pengguna menekan Enter di input modal, langsung simpan
            barcodeInputModal.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault(); // Mencegah perilaku default
                    confirmBarcodeButton.click(); // Trigger tombol "Simpan"
                }
            });
        });
    </script>
</body>

</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!-- Navbar dan Form (sama seperti sebelumnya) -->

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
                    <button type="button" class="btn btn-primary" id="confirmBarcode">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const barcodeInputModal = document.getElementById("barcodeInputModal"); // Input di modal
            const barcodeInput = document.getElementById("barcode"); // Input barcode di form
            const confirmBarcodeButton = document.getElementById("confirmBarcode"); // Tombol "Simpan" di modal

            // Saat tombol "Simpan" di modal diklik
            confirmBarcodeButton.addEventListener("click", function() {
                // Isi nilai barcode dari modal ke input barcode di form
                barcodeInput.value = barcodeInputModal.value;
                // Tutup modal
                const modal = bootstrap.Modal.getInstance(document.getElementById("barcodeModal"));
                modal.hide();
            });

            // Jika pengguna menekan Enter di input modal, langsung simpan
            barcodeInputModal.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault(); // Mencegah perilaku default
                    confirmBarcodeButton.click(); // Trigger tombol "Simpan"
                }
            });
        });
    </script>
</body>
</html> --}}
