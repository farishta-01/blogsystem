@extends('adminpanel.layout')
@section('title', 'Post')
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
                        <th>Photo</th>
                        <th>Author</th>
                        {{-- <th>Category</th> --}}
                        <th>Date & Time</th>
                        <th>Description</th>
                        <th> <i type="button" id="newModal" data-toggle="modal" data-target="#myModal"
                                class="fa-solid fa-user-plus " style="color: #1a13e9;"></i>
                        </th>
                    </tr>
                </thead>
                <tbody id="post_table">
                    @foreach ($data as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->tittle }}</td>
                            <td><img src="{{ asset('upload') . '/' . $record->photo }}" alt="Photo"
                                    style="max-width: 50px;"></td>

                            <td>{{ $record->author }}</td>
                            {{-- <td>{{ $record->category->name }}</td> --}}

                            <td>{{ $record->created_at }}</td>
                            <td>{{ $record->desc }}</td>
                            <td>
                                <i class="fa-solid fa-pen mx-4" style="color: #1fb814;" value="{{ $record->id }}"></i>
                                <i class="fa-sharp fa-solid fa-user-xmark" style="color: #f10909;"
                                    value="{{ $record->id }}"></i>
                            </td>
                        </tr>
                    @endforeach
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

                            <h4 class="modal-title">Add Blog</h4>
                            <button id="close" type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id" />
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form2Example1">Tittle</label>
                                <input type="text" id="tittle" class="form-control" name="tittle" />

                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form2Example1">Photo</label>
                                <div class="d-flex flex-column align-items-right">
                                    <img id="imgPreview" src="" alt="Current Photo" style="max-width: 75px;"
                                        class="mb-2">
                                    <input type="file" id="photo" class="form-control" name="photo" />
                                    {{-- <input type="hidden" id="oldPhoto" name="old_photo" value="oldPhoto" /> --}}
                                </div>

                            </div>


                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form2Example1">Category</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="" disabled selected style="color: #a6a3a3;">Select category
                                    </option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form2Example1">Author</label>
                                <input type="text" id="author" class="form-control" name="author" />

                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form2Example1">Description</label>
                                <textarea type="longText" id="desc" class="form-control" name="desc" rows="4"></textarea>
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
        $(document).ready(function() {

            $('#newModal').on('click', function(e) {
                e.preventDefault();
                $('#submitform')[0].reset();
                $('.btn.btn-success.btn-block').text('Add');
                $('#id').val('');
                $('#myModal').modal('show');
                $('#photo').show();
                $('#photo_link').hide();
                $('#imgPreview').hide();

            });

            $('.alert').delay(5000).slideUp(300);

            $('#submitform').on('submit', function(e) {
                e.preventDefault();
                var category_id = $('#category_id').val();
                var formData = new FormData(this);

                formData.append('category_id', category_id);

                $.ajax({
                    url: "/savedata",
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
                            $('#myModal').modal('hide');
                            window.location.href = '/all_posts';
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

            $(document).on('click', '.fa-solid.fa-pen.mx-4', function(e) {
                e.preventDefault();
                var id = $(this).attr('value');
                $.ajax({
                    url: '/editdata',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(response) {
                        $('#submitform')[0].reset();

                        $('#id').val(response.id);
                        $('#tittle').val(response.tittle);
                        $('#author').val(response.author);
                        $('#desc').val(response.desc);
                        $('#category_id').val(response.category_id);

                        // Update image preview with the new photo URL
                        $('#imgPreview').attr('src', response.photo ?
                            '{{ asset('upload') }}/' + response.photo : '');



                        $('.btn.btn-success.btn-block').text('Update');
                        $('.modal-title').text('Update Blog');

                        $('#imgPreview').show();

                        $('#myModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        toastr.error('An error occurred while fetching record data.');
                    }
                });
            });


            $(document).on('click', '.fa-sharp.fa-solid.fa-user-xmark', function(e) {
                e.preventDefault();
                var id = $(this).attr('value');

                $.ajax({
                    url: '/deletedata',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(response) {
                        toastr.error(response.error);
                        window.location.href = '/all_posts';
                    }
                });
            });

            $('#close').click(function() {
                $('#myModal').modal('hide');
                $('.modal-backdrop').remove();
            });

            $('#photo').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imgPreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

        });
    </script>



    </body>

    </html>

@endsection
