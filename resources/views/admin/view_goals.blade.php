<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DIT | Vision & Mission Management</title>
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
                                <h3 class="box-title">Goal Section</h3>
                            </div>
                            <div class="box-body">
                                @if (\Session::has('message'))
                                    <div class="responsemessage alert alert-{!! \Session::get('message')[1] !!}">
                                        {!! \Session::get('message')[0] !!}
                                    </div>
                                @endif

                                <h3 class="box-title">Vision</h3>
                                <span class="fa-pull-right pr-4 py-2 pad">
                                    <button data-toggle="modal" data-target="#visionModal" class="btn bg-purple btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add Vision</button>
                                </span>
                                <table id="vision_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL#</th>
                                            <th>Vision Text</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($visions as $i => $vision)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $vision->text }}</td>
                                            <td>
                                                <button type="button" onclick="showVisionAction('edit', {{ $vision }})" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                                                <button type="button" onclick="deleteVision({{ $vision->id }})" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h3 class="box-title">Mission</h3>
                                <span class="fa-pull-right pr-2 py-1 pad">
                                    <button data-toggle="modal" data-target="#missionModal" class="btn bg-olive btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add Mission</button>
                                </span>
                                <table id="mission_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL#</th>
                                            <th>Key Words</th>
                                            <th>Descriptions</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($missions as $i => $mission)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $mission->keywords }}</td>
                                            <td>{{ $mission->description }}</td>
                                            <td>
                                                <button type="button" onclick="showMissionAction('edit', {{ $mission }})" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                                                <button type="button" onclick="deleteMission({{ $mission->id }})" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
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

        <!-- Vision Modal -->
        <div class="modal fade" id="visionModal" tabindex="-1" role="dialog" aria-labelledby="visionModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title" id="visionModalLabel">Add Vision</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="visionForm" action="{{ route('save_vision') }}" role="form" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="visionId" name="visionId">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="visionText">Vision Text</label>
                                    <textarea class="form-control" id="visionText" name="visionText" rows="3" placeholder="Provide vision text"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="visionImages">Upload Images</label>
                                    <input type="file" class="form-control" id="visionImages" name="visionImages[]" multiple accept="image/*">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveVisionBtn">Save Vision</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission Modal -->
        <div class="modal fade" id="missionModal" tabindex="-1" role="dialog" aria-labelledby="missionModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title" id="missionModalLabel">Add Mission</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="missionForm" action="{{ route('save_mission') }}" role="form" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="missionId" name="missionId">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="missionKeywords">Keywords</label>
                                    <input type="text" class="form-control" id="missionKeywords" name="missionKeywords" placeholder="Enter keywords">
                                </div>
                                <div class="form-group">
                                    <label for="missionDescription">Description</label>
                                    <textarea class="form-control" id="missionDescription" name="missionDescription" rows="3" placeholder="Provide description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="missionImages">Upload Images</label>
                                    <input type="file" class="form-control" id="missionImages" name="missionImages[]" multiple accept="image/*">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveMissionBtn">Save Mission</button>
                    </div>
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Jigme Namgyel Engineering College</b>
            </div>
            <strong>&copy; 2024 <a href="#">Department of Information Technology</a>. All rights reserved.</strong>
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
        
        function showVisionAction(action, vision = null) {
            if (action === 'edit' && vision) {
                $('#visionId').val(vision.id);
                $('#visionText').val(vision.text);
                $('#visionModalLabel').text('Edit Vision');
                $('#visionForm').attr('action', '{{ route("update_vision") }}');
            } else {
                $('#visionId').val('');
                $('#visionText').val('');
                $('#visionModalLabel').text('Add Vision');
                $('#visionForm').attr('action', '{{ route("save_vision") }}');
            }
            $('#visionModal').modal('show');
        }

        function showMissionAction(action, mission = null) {
            if (action === 'edit' && mission) {
                $('#missionId').val(mission.id);
                $('#missionKeywords').val(mission.keywords);
                $('#missionDescription').val(mission.description);
                $('#missionModalLabel').text('Edit Mission');
                $('#missionForm').attr('action', '{{ route("update_mission") }}');
            } else {
                $('#missionId').val('');
                $('#missionKeywords').val('');
                $('#missionDescription').val('');
                $('#missionModalLabel').text('Add Mission');
                $('#missionForm').attr('action', '{{ route("save_mission") }}');
            }
            $('#missionModal').modal('show');
        }

        function deleteVision(id) {
            if (confirm('Are you sure you want to delete this vision?')) {
                $.ajax({
                    url: '{{ route("delete_vision") }}',
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

        function deleteMission(id) {
            if (confirm('Are you sure you want to delete this mission?')) {
                $.ajax({
                    url: '{{ route("delete_mission") }}',
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

        $('#saveVisionBtn').click(function() {
            $('#visionForm').submit();
        });

        $('#saveMissionBtn').click(function() {
            $('#missionForm').submit();
        });
    </script>
</body>
</html>
