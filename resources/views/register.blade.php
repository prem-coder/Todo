@include('layouts/bootstrap')

<body>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }

    </style>

    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="post" action="register">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="username" class="form-control form-control-lg"
                                placeholder="Enter a valid Username" />
                            <label class="form-label" for="form3Example3">Username</label>
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" class="form-control form-control-lg"
                                placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>
                        <!-- Confirm Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="conf_password" class="form-control form-control-lg"
                                placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Confirm Password</label>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" name="login" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                        </div>
                    </form>
                    <div>
                        <div style="margin-top: 5px;" class="d-flex justify-content-between align-items-center">
                            <a href="login" class="text-body">Login</a>
                        </div>
                        @if(session('error'))
                        <h3 class="text-danger text-center">{{session('error')}}</h3>
                        @endif
                        {{-- Registration Form Validation Starts  --}}
                        @if ($errors->any())
                        <br>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{-- Registration Form Validation Ends --}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>
