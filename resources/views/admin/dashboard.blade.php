<x-app-layouts title="Dashboard Inventory">
    <div class="row">
        <div class="col-12 col-md-5">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-muted">Info Pengguna</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{ auth()->user()->foto == 'default.png' ? auth()->user()->pictureDefault : auth()->user()->picture }}"
                            alt="{{ auth()->user()->nama }}" style="width: 10em" class="img-fluid rounded mb-3">
                    </div>

                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-center">
                                <h6 class="mb-1">Panduan Penggunaan</h6>
                            </div>
                        </a>
                        <a href="#" target="_blank" class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1"><img width="36" height="36" alt="YouTube"
                                        src="https://cdn3.iconfinder.com/data/icons/2018-social-media-logotypes/1000/2018_social_media_popular_app_logo_youtube-512.png">
                                </h6>
                                <h6 class="mb-1">YouTube</h6>
                            </div>
                        </a>
                        <a href="https://github.com/hilmanardiansyah/inventory" target="_blank"
                            class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1"><img width="40" height="40" alt="GitHub"
                                        src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png">
                                </h6>
                                <h6 class="mb-1 mt-2">GitHub</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-muted">Statistik Inventory</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Total Barang -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-box fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Total Barang</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $total_barang }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Barang Masuk -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-arrow-down fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Barang Masuk</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $barang_masuk }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Barang Keluar -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-arrow-up fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Barang Keluar</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $barang_keluar }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Supplier -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-truck fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Supplier</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $total_supplier }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kategori Barang -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-tags fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Kategori Barang</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $kategori_barang }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Stok Minimum -->
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-exclamation-triangle fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Stok Minimum</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $stok_minimum }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <p>Ini adalah halaman dashboard khusus untuk admin.</p>
</body>
</html> --}}

