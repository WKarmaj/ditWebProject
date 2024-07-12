<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DIT | Event Management</title>
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
                                <h3 class="box-title">Event Section</h3>
                                <span class="fa-pull-right pr-2 py-1 pad">
                                    <button data-toggle="modal" data-target="#eventModal" class="btn btn-dark btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add New</button>
                                </span>
                            </div>
                            <div class="box-body">
                                @if (\Session::has('message'))
                                    <div class="responsemessage alert alert-{!! \Session::get('message')[1] !!}">
                                        {!! \Session::get('message')[0] !!}
                                    </div>
                                @endif
                                <table id="event_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Images</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($events as $i => $event)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $event->title }}</td>
                                                <td>{{ $event->description }}</td>
                                                <td>
                                                    @if ($event->images && count(json_decode($event->images, true)) > 0)
                                                        @foreach (json_decode($event->images, true) as $image)
                                                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $event->title }}" style="max-width: 200px; height:auto;">
                                                            <br>
                                                        @endforeach
                                                    @else
                                                        No images uploaded.
                                                    @endif
                                                </td>
                                                <td>{{ $event->date }}</td>
                                                <td>
                                                    <button type="button" onclick="showAction('edit', {{ $event }})" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                                                    <button type="button" onclick="deleteEvent({{ $event->id }})" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
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

        <!-- Event Modal -->
        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title" id="eventModalLabel">Add Event</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="eventForm" action="{{ route('save_event') }}" role="form" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="eventId" name="eventId">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="eventTitle">Title</label>
                                    <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="eventDescription">Description</label>
                                    <textarea class="form-control" id="eventDescription" name="eventDescription" rows="3" placeholder="Provide description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="eventImages">Upload Images</label>
                                    <input type="file" class="form-control" id="eventImages" name="eventImages[]" multiple accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label for="eventDate">Date</label>
                                    <input type="date" class="form-control" id="eventDate" name="eventDate">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveEventBtn">Save Event</button>
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
    <script type="text/javascript">
        $(function () {
            $("#event_table").dataTable();
        });

        setTimeout(function() {
            $('.responsemessage').fadeOut('slow');
        }, 1000);

        function showAction(action, event) {
            if (action === 'edit') {
                document.getElementById('eventModalLabel').innerText = 'Edit Event';
                document.getElementById('eventId').value = event.id;
                document.getElementById('eventTitle').value = event.title;
                document.getElementById('eventDescription').value = event.description;
                document.getElementById('eventDate').value = event.date;

                document.getElementById('eventForm').action = "{{ route('update_event') }}";
            } else {
                document.getElementById('eventModalLabel').innerText = 'Add Event';
                document.getElementById('eventId').value = '';
                document.getElementById('eventTitle').value = '';
                document.getElementById('eventDescription').value = '';
                document.getElementById('eventDate').value = '';

                document.getElementById('eventForm').action = "{{ route('save_event') }}";
            }
            $('#eventModal').modal('show');
        }

        var saveBtn = document.getElementById('saveEventBtn');
        saveBtn.addEventListener('click', function() {
            var form = document.getElementById('eventForm');
            form.submit();
        });

        function deleteEvent(eventId) {
            if (confirm("Are you sure you want to delete this event?")) {
                $.ajax({
                    url: '/events/' + eventId,
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
