@extends("layouts.app")

@section("title", "Login | Balai Wilayah Sungai Sumatera")

@section("content")
    <div
        class="page-wrapper"
        id="main-wrapper"
        data-layout="vertical"
        data-navbarbg="skin6"
        data-sidebartype="full"
        data-sidebar-position="fixed"
        data-header-position="fixed"
    >
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center"
        >
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a
                                    href="javascript:void(0)"
                                    class="text-nowrap logo-img text-center d-block py-3 w-100"
                                >
                                    <img
                                        src="{{ asset("images/logos/logo-bwws.jpg") }}"
                                        height="80"
                                        alt=""
                                    />
                                </a>
                                <p class="text-center">
                                    Balai Wilayah Sungai Sumatera IV
                                </p>
                                <form
                                    action="{{ route("login") }}"
                                    method="post"
                                >
                                    @csrf
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            Username
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp"
                                            placeholder="Username"
                                            name="username"
                                        />
                                        @error("username")
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="exampleInputPassword1"
                                            class="form-label"
                                        >
                                            Password
                                        </label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            id="exampleInputPassword1"
                                            placeholder="Password"
                                            name="password"
                                        />
                                        @error("password")
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"
                                    >
                                        Sign In
                                    </button>
                                </form>
                            </div>
                        </div>

                        @if(session("message"))
                            <div class="alert alert-danger mt-2" role="alert" >
                                {{ session("message") }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
