<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DIT | Slider Management</title>
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
                                <h3 class="box-title">Slider Section</h3>
                                <span class="fa-pull-right pr-2 py-1 pad">
                                    <button data-toggle="modal" data-target="#sliderModal" class="btn btn-dark btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add New</button>
                                </span>
                            </div>
                            <div class="box-body">
                                @if (\Session::has('message'))
                                    <div class="responsemessage alert alert-{!! \Session::get('message')[1] !!}">
                                        {!! \Session::get('message')[0] !!}
                                    </div>
                                @endif
                                <table id="slider_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Images</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sliders as $i => $slider)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $slider->name }}</td>
                                            <td>{{ $slider->description }}</td>
                                            <td>
                                                @if ($slider->images && count(json_decode($slider->images)) > 0)
                                                    @foreach (json_decode($slider->images) as $image)
                                                        <a href="#" onclick="showImageModal('{{ asset('storage/' . $image) }}', '{{ $slider->name }}')">
                                                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $slider->name }}" class="slider-image">
                                                        </a>
                                                    @endforeach
                                                @else
                                                    No image uploaded.
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" onclick="showAction('edit', {{ $slider }})" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                                                <button type="button" onclick="deleteSlider({{ $slider->id }})" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
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

        <!-- Slider Modal -->
        <div class="modal fade" id="sliderModal" tabindex="-1" role="dialog" aria-labelledby="sliderModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title" id="sliderModalLabel">Add Slider</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="sliderForm" action="{{ route('save_slider') }}" role="form" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="sliderId" name="sliderId">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="sliderName">Name</label>
                                    <input type="text" class="form-control" id="sliderName" name="sliderName" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="sliderDescription">Description</label>
                                    <textarea class="form-control" id="sliderDescription" name="sliderDescription" rows="3" placeholder="Provide description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="sliderImages">Upload Images</label>
                                    <input type="file" class="form-control" id="sliderImages" name="sliderImages[]" multiple accept="image/*">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveSliderBtn">Save Slider</button>
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
            $("#slider_table").dataTable();
        });

        setTimeout(function() {
            $('.responsemessage').fadeOut('slow');
        }, 1000);

        function showAction(action, slider) {
            if (action === 'edit') {
                document.getElementById('sliderModalLabel').innerText = 'Edit Slider';
                document.getElementById('sliderId').value = slider.id;
                document.getElementById('sliderName').value = slider.name;
                document.getElementById('sliderDescription').value = slider.description;

                document.getElementById('sliderForm').action = "{{ route('update_slider') }}";
            } else {
                document.getElementById('sliderModalLabel').innerText = 'Add Slider';
                document.getElementById('sliderId').value = '';
                document.getElementById('sliderName').value = '';
                document.getElementById('sliderDescription').value = '';

                document.getElementById('sliderForm').action = "{{ route('save_slider') }}";
            }
            $('#sliderModal').modal('show');
        }

        var saveBtn = document.getElementById('saveSliderBtn');
        saveBtn.addEventListener('click', function() {
            var form = document.getElementById('sliderForm');
            form.submit();
        });

        function deleteSlider(sliderId) {
            if (confirm("Are you sure you want to delete this slider?")) {
                $.ajax({
                    url: '/sliders/' + sliderId,
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
