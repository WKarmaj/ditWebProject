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
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Computer System & Network Project or Researches</h3>
                                <span class="fa-pull-right pr-2 py-1 pad">
                                    <button onclick="showProjectModal('add')" class="btn btn-dark btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add New</button>
                                </span>
                            </div>
                            <div class="box-body">
                            @if (\Session::has('message'))
                                <div class="responsemessage alert alert-{!! \Session::get('message')[1] !!}">
                                    {!! \Session::get('message')[0] !!}
                                </div>
                            @endif
                                <table id="stff_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL#</th>
                                            <th>Title</th>
                                            <th>Authors</th>
                                            <th>Description</th>
                                            <th>Files</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($projects as $project)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $project->title }}</td>
                                            <td>{{ $project->authors }}</td>
                                            <td>{{ $project->description }}</td>
                                            <td>
                                            @if(is_array($project->files))
                                                @foreach($project->files as $file)
                                                    <a href="{{ Storage::url($file['path']) }}" target="_blank">
                                                        <i class="fa fa-file-pdf-o"></i> {{ $file['original_name'] }}
                                                    </a><br>
                                                @endforeach
                                            @endif
                                            </td>
                                            <td>
                                                <button onclick="showProjectModal('edit', {{ $project }})" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                                <button onclick="deleteProject({{ $project->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Project Modal -->
        <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title" id="projectModalLabel">Add Project & Research Works</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="projectForm" action="" role="form" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="projectId" name="projectId">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="projectTitle">Title</label>
                                    <input type="text" class="form-control" id="projectTitle" name="projectTitle" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="projectAuthors">Authors</label>
                                    <input type="text" class="form-control" id="projectAuthors" name="projectAuthors" placeholder="Enter authors">
                                </div>
                                <div class="form-group">
                                    <label for="projectDescription">Description</label>
                                    <textarea class="form-control" id="projectDescription" name="projectDescription" rows="3" placeholder="Provide description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="projectFiles">Upload PDF Files</label>
                                    <input type="file" class="form-control" id="projectFiles" name="projectFiles[]" multiple accept=".pdf">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveProjectBtn">Save Project</button>
                    </div>
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Jigme Namgyel Engineering College</b>
            </div>
            <strong>&copy; 2024 <a href="">Department of Information Technology</a>. All rights reserved.</strong>
        </footer>
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
        function showProjectModal(action, project = null) {
            if (action === 'edit' && project) {
                $('#projectId').val(project.id);
                $('#projectTitle').val(project.title);
                $('#projectAuthors').val(project.authors);
                $('#projectDescription').val(project.description);
                $('#projectModalLabel').text('Edit Project & Research Works');
                $('#projectForm').attr('action', '{{ route("update_project") }}');
            } else {
                $('#projectId').val('');
                $('#projectTitle').val('');
                $('#projectAuthors').val('');
                $('#projectDescription').val('');
                $('#projectModalLabel').text('Add Project & Research Works');
                $('#projectForm').attr('action', '{{ route("save_project") }}');
            }
            $('#projectModal').modal('show');
        }

        function deleteProject(id) {
            if (confirm('Are you sure you want to delete this project?')) {
                $.ajax({
                    url: '{{ route("delete_project") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }
        }

        $('#saveProjectBtn').click(function() {
            $('#projectForm').submit();
        });
    </script>
</body>
</html>
