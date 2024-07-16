
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
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <div class="row">
            <section class="col-lg-7 connectedSortable">
                <div class="box box-success">
                  <div class="box-header">
                    <i class="fa fa-comments-o"></i>
                    <h3 class="box-title">Manage Programmes</h3>
                    <span class="fa-pull-right pr-2 py-1 pad">
                        <button onclick="showProjectModal('add')" class="btn btn-dark btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add New</button>
                    </span>
                    <span class="fa-pull-right pr-2 py-1 pad">
                        <button onclick="showProjectModal('add')" class="btn btn-dark btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add New</button>
                    </span>
                  </div>
                </div>
                <!--CSN -->
              <section class="col-lg-9 connectedSortable">
                <div class="box box-solid bg-light-blue-gradient">
                  <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                      <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                    </div><!-- /. tools -->
                    <i class="fa fa-map-marker"></i>
                    <h3 class="box-title">
                      Computer System & Network
                    </h3>
                  </div>
                  <div class="box-body">
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

                          </tbody>
                      </table>
                  </div><!-- /.box-body-->
                </div>
                <!-- /.box -->
                <!-- Multimedia -->
                <div class="box box-solid bg-teal-gradient">
                  <div class="box-header">
                  <i class="fa fa-map-marker"></i>
                    <h3 class="box-title">Multimedia & Animation</h3>
                    <div class="box-tools pull-right">
                      <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="box-body border-radius-none">
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

                          </tbody>
                      </table>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </section>
            </section>
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
              <section class="col-lg-5 connectedSortable">
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
                                            <option value="Facebook" data-icon="fa fa-facebook">Facebook</option>
                                            <option value="Twitter" data-icon="fa-twitter">Twitter</option>
                                            <option value="Instagram" data-icon="fa-instagram">Instagram</option>
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
    </script>
  </body>
</html>
