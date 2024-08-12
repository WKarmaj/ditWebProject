<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DIT | Project & Research</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
</head>
<body class="skin-blue">
    <div class="wrapper">
        @include('admin.header')
        @include('admin.sidebar')

        <div class="content-wrapper">
            <section class="content">
                <div class="box box-success">
                    <div class="box-header">
                        <i class="fa fa-comments-o"></i>
                        <h3 class="box-title">Manage Multimedia and Animation Page</h3>
                    </div>
                </div>

                @if (\Session::has('message'))
                    <div class="responsemessage alert alert-{!! \Session::get('message')[1] !!}">
                        {!! \Session::get('message')[0] !!}
                    </div>
                @endif

                <!-- Programme Table -->
                <div class="box box-solid">
                    <div class="box-header">
                        <div class="pull-right box-tools">
                            <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <i class="fa fa-map-marker"></i>
                        <h3 class="box-title">Focus Area Table</h3>
                        <span class="fa-pull-right pr-2 py-1 pad">
                            <button data-toggle="modal" data-target="#programmeModal" class="btn btn-dark btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add Data</button>
                        </span>
                    </div>
                    <div class="box-body">
                        <table id="programme_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($programmes as $i => $programme)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $programme->description }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $programme->image) }}" class="img-responsive" alt="{{ $programme->description }}"  style="width: 500px; height: auto;">
                                        </td>
                                        <td>
                                            <button type="button" onclick="showProgrammeAction('edit', {{ $programme }})" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                                            <button type="button" onclick="deleteProgramme({{ $programme->id }})" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
                <!-- Programme Modal -->
                <div class="modal fade" id="programmeModal" tabindex="-1" role="dialog" aria-labelledby="programmeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title" id="programmeModalLabel">Add Programme</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="programmeForm" action="{{ route('add_dmaprogramme') }}" role="form" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="programmeId" name="programmeId">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="programmeDescription">Name:</label>
                                    <textarea class="form-control" id="programmeDescription" name="programmeDescription"  placeholder="Provide description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="programmeImage">Image:</label>
                                    <input type="file" class="form-control-file" id="programmeImage" name="programmeImage">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveBtnDma">Save Programme</button>
                    </div>
                </div>
            </div>
        </div>


      

        <script src="{{ asset('admin/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
        <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/plugins/fastclick/fastclick.min.js') }}"></script>
        <script src="{{ asset('admin/dist/js/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/dist/js/demo.js') }}" type="text/javascript"></script>

        <script>
              setTimeout(function() {
                $('.responsemessage').fadeOut('slow');
            }, 1000);
            $('#saveBtnDma').click(function () {
                $('#programmeForm').submit();
            });
            function showProgrammeAction(action, programme = null) {
                const form = $('#programmeForm');
                form.trigger("reset");
                $('#programmeId').val('');
                $('#programmeModalLabel').text('Add Programme');
                form.attr('action', "{{ route('add_dmaprogramme') }}");

                if (action === 'edit' && programme) {
                    $('#programmeModalLabel').text('Edit Programme');
                    $('#programmeId').val(programme.id);
                    $('#programmeDescription').val(programme.description);
                    form.attr('action', "{{ route('edit_dmaprogramme') }}");
                }
                $('#programmeModal').modal('show');
            }
            function deleteProgramme(programmeId) {
                if (confirm('Are you sure you want to delete this programme?')) {
                    $.ajax({
                        url: '/delete-dmaprogramme/' + programmeId, // Use the correct URL
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                location.reload();
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            alert('Error: ' + xhr.responseText);
                        }
                    });
                }
            }
        </script>
    </div>
</body>
</html>
