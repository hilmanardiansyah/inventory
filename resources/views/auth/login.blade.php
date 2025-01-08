<x-app-layouts title="login Inventory">
    <div class="container mt-3">
        <div class="row d-flex">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-2 col-xl-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Silahkan Login</h4>
                    </div>
                    <div class="card-body">
                        <x-alert />
                        <form method="POST" action="{{ route('login') }}" class="needs-validation mt-2" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" tabindex="1" value="{{ old('email') }}" required autofocus>
                                <div class="invalid-feedback">
                                    Email tidak boleh kosong.
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input type="password" name="password" class="form-control" id="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Password tidak boleh kosong.
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>
