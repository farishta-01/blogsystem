@extends('frontend.master')
@section('title', 'Category')
@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <script>
        $(document).ready(function() {
            $('.alert').delay(5000).slideUp(300);
            $('#submitform').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "/login_Client",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            $('#submitform')[0].reset();
                            window.location.href = '/';
                        } else {
                            toastr.error(response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        var errorMessage = "An error occurred while processing your request.";
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON;
                            if (errors && errors.error) {
                                errorMessage = errors.error;
                            }
                        }
                        toastr.error(errorMessage);
                    }
                });
            });
        });
    </script>

    <body class="">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Log in</h3>
                                    </div>
                                    <div class="card-body">

                                        <form id="submitform">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control"id="username" name="username"
                                                            type="username" placeholder="jason#!51" />
                                                        <label for="inputUsername">Username</label>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" id="password" name="password"
                                                                type="password" placeholder="Create a password" />
                                                            <label for="inputPassword">Password</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="mt-4 mb-0">
                                                    <button type="submit" class="btn btn-primary btn-block"
                                                        style="margin-top: 20px;">Login</button>
                                                </div>

                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ route('registerClient') }}">Don't have an
                                                account? Go
                                                to
                                                Registeration</a></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script>
            window.addEventListener('DOMContentLoaded', event => {

                // Toggle the side navigation
                const sidebarToggle = document.body.querySelector('#sidebarToggle');
                if (sidebarToggle) {
                    // Uncomment Below to persist sidebar toggle between refreshes
                    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                    //     document.body.classList.toggle('sb-sidenav-toggled');
                    // }
                    sidebarToggle.addEventListener('click', event => {
                        event.preventDefault();
                        document.body.classList.toggle('sb-sidenav-toggled');
                        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains(
                            'sb-sidenav-toggled'));
                    });
                }

            });
        </script>


    </body>

    </html>
@endsection
