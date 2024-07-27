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
           
            <section class="ccontent">
                <div class="box box-success">
                  <div class="box-header">
                    <i class="fa fa-comments-o"></i>
                    <h3 class="box-title">Manage Computer System and Network page</h3>
                    
                  </div>
                </div>
                        @if (\Session::has('message'))
                            <div class="responsemessage alert alert-{!! \Session::get('message')[1] !!}">
                                {!! \Session::get('message')[0] !!}
                            </div>
                        @endif
                    <div class="box box-solid ">
                        <div class="box-header">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                            </div><!-- /. tools -->
                                <i class="fa fa-map-marker"></i>
                                <h3 class="box-title">Description Table</h3>
                            <span class="fa-pull-right pr-2 py-1 pad">
                                <button data-toggle="modal" data-target="#programmeModal" class="btn btn-dark btn-bitbucket text-white btn-sm">
                                    <i class="fa fa-plus"></i> Add Description
                                </button>
                            </span>
                            <span class="fa-pull-right pr-2 py-1 pad">
                                <button data-toggle="modal" data-target="#focusModal" class="btn btn-dark btn-bitbucket text-white btn-sm">
                                    <i class="fa fa-plus"></i> Add Focus Areas
                                </button>
                            </span>
                        </div>
                        <div class="box-body">
                            <table id="programme_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL#</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($programmes as $i => $programme)
                                    <tr>
                                        <td style="width: 10%">{{ $i + 1 }}</td>
                                        
                                        <td style="width: 30%">{{ $programme->description }}</td>
                                        <td style="width: 30%">
                                            <img src="{{ asset('storage/programmes/' . $programme->image) }}" class="img-responsive" alt="{{ $programme->description }}" width="100" height="100">
                                        </td>
                                        <td style="width: 15%">
                                            <button type="button" onclick="showAction('edit', {{ $programme }})" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                                            <button type="button" onclick="deleteProgramme({{ $programme->id }})" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box -->
                    <div class="box box-solid ">
                        <div class="box-header">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                            </div><!-- /. tools -->
                                <i class="fa fa-map-marker"></i>
                                <h3 class="box-title">Focus Area Table</h3>
                        </div>
                        <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Key Points</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
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
                        <form id="programmeForm" action="{{ route('add_programme') }}" role="form" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="programmeId" name="programmeId">
                            <div class="box-body">
                                
                                <div class="form-group">
                                    <label for="programmeDescription">Description:</label>
                                    <textarea class="form-control" id="programmeDescription" name="programmeDescription" rows="3" placeholder="Provide description"></textarea>
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
                        <button type="button" class="btn btn-primary" id="saveBtnCsn">Save Programme</button>
                    </div>
                </div>
            </div>
        </div>
       <!-- Add Focus Area Modal -->
       
                

        
        
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
        function showAction(action, programme) {
            if (action === 'edit') {
                $('#programmeModalLabel').text('Edit Programme');
                $('#programmeId').val(programme.id);
                $('#programmeTitle').val(programme.title);
                $('#programmeDescription').val(programme.description);
                $('#centreImage').val(programme.centre_image);
                // Set form action to update route
                $('#programmeForm').attr('action', "{{ route('update_programme') }}");
            } else {
                $('#programmeModalLabel').text('Add Programme');
                $('#programmeId').val('');
                $('#programmeTitle').val('');
                $('#programmeDescription').val('');
                $('#centreImage').val('');
                // Set form action to add route
                $('#programmeForm').attr('action', "{{ route('add_programme') }}");
            }
            $('#programmeModal').modal('show');
        }
        var saveBtnCsn = document.getElementById('saveBtnCsn');
        saveBtnCsn.addEventListener('click', function() {
          document.getElementById('programmeForm').submit();
      });
  

    function deleteProgramme(programmeId) {
        if (confirm("Are you sure you want to delete this programme?")) {
            $.ajax({
                url: '/programme/' + programmeId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('Error: ' + response.message);
                    }
                }
            });
        }
    }
   
    </script>
</body>
</html>
