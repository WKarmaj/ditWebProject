
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>DIT | JNEC</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="admin/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="admin/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="admin/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="admin/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
        <!-- Header -->
         @include('admin.header')
         <!-- End Header -->

      <!-- Left side column. contains the logo and sidebar -->
        @include('admin.sidebar')
       <!--End Left side column.  -->


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          @if (\Session::has('message'))
              <div class="responsemessage alert alert-{!! \Session::get('message')[1] !!}">
                  {!! \Session::get('message')[0] !!}
              </div>
          @endif
          <!-- Small boxes (Stat box) -->
          
           
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
                <div class="box box-success">
                    <div class="box-header">
                        <div class="pull-right box-tools">
                            <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                        </div>
                        <i class="fa fa-globe"></i>
                        <h3 class="box-title">Manage Social Platform Links</h3>
                    </div>
                    <div class="box-body">
                        <button data-toggle="modal" data-target="#socialMediaModal" class="btn btn-dark btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add New</button>
                        <table id="social_media_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Social Media</th>
                                    <th>Link</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($socialMediaLinks as $i => $link)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td><i class="fa {{ $link->icon }}"></i> {{ $link->type }}</td>
                                        <td>{{ $link->link }}</td>
                                        <td>
                                            <button type="button" onclick="editSocialMedia({{ $link }})" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                                            <button type="button" onclick="deleteSocialMedia({{ $link->id }})" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer no-border"></div>
                </div>
            </section>
            <!--dit programme-->
            <section class="col-lg-6 connectedSortable">
                <div class="box box-success">
                    <div class="box-header">
                        <div class="pull-right box-tools">
                            <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                        </div>
                        <i class="fa fa-globe"></i>
                        <h3 class="box-title">Manage Programmes</h3>
                    </div>
                    <div class="box-body">
                        <button data-toggle="modal" data-target="#programmeModal" class="btn btn-dark btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add New</button>
                        <table id="programme_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Name of the Programme</th>
                                    <th>Total Students</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($programmes as $i => $programme)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $programme->name }}</td>
                                        <td>{{ $programme->total_students }}</td>
                                        <td>
                                            <button type="button" onclick="editProgramme({{ $programme }})" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                                            <button type="button" onclick="deleteProgramme({{ $programme->id }})" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer no-border"></div>
                </div>
            </section>
            <!--About Us -->
            <section class="col-lg-6 connectedSortable">
                <div class="box box-success">
                    <div class="box-header">
                        <div class="pull-right box-tools">
                            <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                        </div>
                        <i class="fa fa-globe"></i>
                        <h3 class="box-title">Edit About Us Data</h3>
                    </div>
                    <div class="box-body">
                        <button data-toggle="modal" data-target="#aboutUsModal" class="btn btn-dark btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add New</button>
                        <table id="about_us_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Main Points</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($aboutUs as $i => $about)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $about->main_points }}</td>
                                    <td >{{ $about->description }}</td>
                                    <td><img src="{{ asset('storage/' . $about->image) }}" alt="About Us Image" style="width: 30%"></td>

                                    <td>
                                    <button type="button" onclick="showAction('edit', {{ $about }})" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                                    <button type="button" onclick="deleteAboutUs({{ $about->id }})" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer no-border"></div>
                </div>
            </section>
            <!-- Social Media Modal -->
            <div class="modal fade" id="socialMediaModal" tabindex="-1" role="dialog" aria-labelledby="socialMediaModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title" id="socialMediaModalLabel">Add Social Media Link</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form id="socialMediaForm" action="{{ route('save_social_media') }}" method="post">
                                @csrf
                                <input type="hidden" id="socialMediaId" name="socialMediaId">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="socialMediaType">Social Media Type</label>
                                        <select class="form-control" id="socialMediaType" name="socialMediaType">
                                            <option value="facebook" data-icon="fa fa-facebook">Facebook</option>
                                            <option value="twitter" data-icon="fa-twitter">Twitter</option>
                                            <option value="instagram" data-icon="fa-instagram">Instagram</option>
                                            <option value="youtube" data-icon="fa-youtube">Youtube</option>
                                            <!-- Add more options as needed -->
                                          
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="socialMediaLink">Link</label>
                                        <input type="url" class="form-control" id="socialMediaLink" name="socialMediaLink" placeholder="Enter link">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveSocialMediaBtn">Save Link</button>
                        </div>
                    </div>
                </div>
            </div>

           <!-- Add Programme Modal -->
            <div class="modal fade" id="programmeModal" tabindex="-1" role="dialog" aria-labelledby="programmeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title" id="programmeModalLabel">Add Programme</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form id="programmeForm" action="{{ route('programmes.store') }}" method="post">
                                @csrf
                                <input type="hidden" id="programmeId" name="programmeId">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="programmeName">Programme Name</label>
                                        <input type="text" class="form-control" id="programmeName" name="programmeName" placeholder="Enter programme name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="totalStudents">Total Number of Students</label>
                                        <input type="number" class="form-control" id="totalStudents" name="totalStudents" placeholder="Enter total number of students" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="saveProgrammeBtn">Save Programme</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- About Us -->
            <div class="modal fade" id="aboutUsModal" tabindex="-1" role="dialog" aria-labelledby="aboutUsModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title" id="aboutUsModalLabel">Add About Us</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    </div>
                    <div class="modal-body">
                    <form id="aboutUsForm" action="{{ route('add_about_us') }}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="aboutUsId" name="aboutUsId">
                        <div class="box-body">
                        <div class="form-group">
                            <label for="mainPoints">Main Points</label>
                            <input type="text" class="form-control" id="mainPoints" name="mainPoints" placeholder="Enter main points">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveAboutUsBtn">Save About Us</button>
                    </div>
                </div>
                </div>
            </div> 
          </div>
          <!-- Main row -->
          <!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Jigme Namgyel Engineering College</b> 
        </div>
        <strong>Copyright &copy; 2024 <a href="http://almsaeedstudio.com">Department of Information Technology</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="admin/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="admin/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="admin/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="admin/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="admin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="admin/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='admin/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="admin/dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="admin/dist/js/demo.js" type="text/javascript"></script>
    <script>
       setTimeout(function() {
            $('.responsemessage').fadeOut('slow');
        }, 1000);
        function editSocialMedia(link) {
            document.getElementById('socialMediaModalLabel').innerText = 'Edit Social Media Link';
            document.getElementById('socialMediaId').value = link.id;
            document.getElementById('socialMediaType').value = link.type;
            document.getElementById('socialMediaLink').value = link.link;

            document.getElementById('socialMediaForm').action = "{{ route('update_social_media') }}";
            $('#socialMediaModal').modal('show');
        }

        var saveBtn = document.getElementById('saveSocialMediaBtn');
        saveBtn.addEventListener('click', function() {
            var form = document.getElementById('socialMediaForm');
            form.submit();
        });

        function deleteSocialMedia(id) {
            if (confirm("Are you sure you want to delete this social media link?")) {
                $.ajax({
                    url: '/social_media/' + id,
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
        document.addEventListener('DOMContentLoaded', function() {
          document.getElementById('saveProgrammeBtn').addEventListener('click', function() {
              document.getElementById('programmeForm').submit();
          });
      });

      function editProgramme(programme) {
          document.getElementById('programmeModalLabel').innerText = 'Edit Programme';
          document.getElementById('programmeId').value = programme.id;
          document.getElementById('programmeName').value = programme.name;
          document.getElementById('totalStudents').value = programme.total_students;

          document.getElementById('programmeForm').action = "{{ route('update_programme') }}";
          $('#programmeModal').modal('show');
      }

      function deleteProgramme(programmeId) {
          if (confirm("Are you sure you want to delete this programme?")) {
              $.ajax({
                  url: '/programmes/' + programmeId,
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
      function showAction(action, about) {
        if (action === 'edit') {
            document.getElementById('aboutUsModalLabel').innerText = 'Edit About Us';
            document.getElementById('aboutUsId').value = about.id;
            document.getElementById('mainPoints').value = about.main_points;
            document.getElementById('description').value = about.description;
            // Clear the file input field
            document.getElementById('image').value = '';

            // Change form action to update route
            document.getElementById('aboutUsForm').action = "{{ route('update_about_us')}}";
        } else {
            document.getElementById('aboutUsModalLabel').innerText = 'Add About Us';
            document.getElementById('aboutUsId').value = '';
            document.getElementById('mainPoints').value = '';
            document.getElementById('description').value = '';
            document.getElementById('image').value = '';

            // Change form action to add route
            document.getElementById('aboutUsForm').action = "{{ route('add_about_us') }}";
        }
        $('#aboutUsModal').modal('show');
    }

    var saveBtn = document.getElementById('saveAboutUsBtn');
    saveBtn.addEventListener('click', function() {
        document.getElementById('aboutUsForm').submit();
    });

    function deleteAboutUs(aboutUsId) {
        if (confirm("Are you sure you want to delete this entry?")) {
            $.ajax({
                url: '/about-us/' + aboutUsId,
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
 