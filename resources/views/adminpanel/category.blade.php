@extends('adminpanel.layout')
@section('title', 'Category')
@section('content')

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>

                        <th><i type="button" id="newModal" data-toggle="modal" data-target="#myModal"
                                class="fa-solid fa-user-plus " style="color: #1a13e9;"></i></th>
                    </tr>
                </thead>
                <tbody id="cat_table">
                    {{-- @foreach ($categories as $Category)
                        <tr>
                            <td>{{ $Category->id }}</td>
                            <td>{{ $Category->name }}</td>

                            <td>
                                <i class="fa-solid fa-pen mx-4" style="color: #1fb814;" value="{{ $Category->id }}"></i>
                                <i class="fa-sharp fa-solid fa-user-xmark" style="color: #f10909;"
                                    value="{{ $Category->id }}"></i>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">




        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <form id="submitform">
                        <div class="modal-header">

                            <h4 class="modal-title">Add Listing</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id" />
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form2Example1">Tittle</label>
                                <input type="text" id="name" class="form-control" name="name" />

                            </div>
                            <button type="submit" class="btn btn-success btn-block ">Add</button>
                        </div>
                        <div class="modal-footer">
                            <button id="close" type="button" class="btn btn-default"
                                data-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function()

            {

                $('#newModal').on('click', function(e) {
                    e.preventDefault(); // Prevent the default action of the link/button
                    $('#submitform')[0].reset();
                    $('.btn.btn-success.btn-block').text('Add');
                    $('#id').val(''); // Reset the value of #id input
                    $('#myModal').modal('show');
                });
                $('.alert').delay(5000).slideUp(300);
                $('#submitform').on('submit', function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);

                    $.ajax({
                        url: "saveCat",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.success);
                                $('#submitform')[0].reset();
                                $('#myModal').modal('hide');

                                window.location.href = '/category_admin';
                            } else {
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            var errorMessage =
                                "An error occurred while processing your request.";
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

        $(document).on('click', '.fa-solid.fa-pen.mx-4', function(e) {
            e.preventDefault();
            var id = $(this).attr('value');
            $.ajax({
                // editdata
                url: 'editCat',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function(response) {
                    $('#submitform')[0].reset();

                    $('#id').val(response.id);
                    $('#name').val(response.name);




                    $('.btn.btn-success.btn-block').text('Update');
                    $('.modal-title').text('Update Student Category');

                    $('#myModal').modal('show');
                }

            });
        });


        $(document).on('click', '.fa-sharp.fa-solid.fa-user-xmark', function(e) {
            e.preventDefault();
            var id = $(this).attr('value');

            $.ajax({
                url: 'deleteCat',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function(response) {

                    toastr.error(response.error);
                    window.location.href = '/category_admin';


                }
            });
        });
    </script>


    </body>

    </html>

@endsection
