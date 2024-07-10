<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
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
                                <h3 class="box-title">Staff Research & Project</h3>
                                <span class="fa-pull-right pr-2 py-1 pad">
                                    <button data-toggle="modal" data-target="#projectModal" class="btn btn-dark btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add New</button>
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
                                        @foreach($projects as $i => $project)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $project->title }}</td>
                                                <td>{{ $project->authors }}</td>
                                                <td>{{ $project->description }}</td>
                                                
                                                <td>
                                                    <button type="button" onclick="showAction('edit', {{ $project }})" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                                                    <button type="button" onclick="deleteProject({{ $project->id }})" class="btn btn-danger"><i class="fa fa-eraser"></i> Delete</button>
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
        <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title" id="eventModalLabel">Add Project & Research Works</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="projectForm" action="{{ route('save_project') }}" role="form" method="post" enctype="multipart/form-data">
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
            <strong>&copy; 2024 <a href="http://almsaeedstudio.com">Department of Information Technology</a>. All rights reserved.</strong>
        </footer>
    </div>

    <script src="admin/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="admin/plugins/fastclick/fastclick.min.js"></script>
    <script src="admin/dist/js/app.min.js" type="text/javascript"></script>
    <script src="admin/dist/js/demo.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#example1").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
            });
        });

        setTimeout(function() {
            $('.responsemessage').fadeOut('slow');
        }, 1000);

        function showAction(action, project) {
            if (action === 'edit') {
                document.getElementById('eventModalLabel').innerText = 'Edit Project & Research Works';
                document.getElementById('projectId').value = project.id;
                document.getElementById('projectTitle').value = project.title;
                document.getElementById('projectAuthors').value = project.authors;
                document.getElementById('projectDescription').value = project.description;

               

                document.getElementById('projectForm').action = "{{ route('update_project') }}";
            } else {
                document.getElementById('eventModalLabel').innerText = 'Add Project & Research Works';
                document.getElementById('projectId').value = '';
                document.getElementById('projectTitle').value = '';
                document.getElementById('projectAuthors').value = '';
                document.getElementById('projectDescription').value = '';
               

                document.getElementById('projectForm').action = "{{ route('save_project') }}";
            }
            $('#projectModal').modal('show');
        }

        var saveBtn = document.getElementById('saveProjectBtn');
        saveBtn.addEventListener('click', function() {
            var form = document.getElementById('projectForm');
            form.submit();
        });

        function deleteProject(projectId) {
            if (confirm("Are you sure you want to delete this project?")) {
                $.ajax({
                    url: '/projects/' + projectId,
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
