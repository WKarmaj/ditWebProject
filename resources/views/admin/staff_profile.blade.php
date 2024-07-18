<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>DIT | Staff Management</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="admin/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      <!-- Header and Sidebar -->
      @include('admin.header')
      @include('admin.sidebar')

      <!-- Content Wrapper -->
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Staff List</h3>
                  <span class="fa-pull-right pr-2 py-1 pad">
                    <button data-toggle="modal" data-target="#staffModal" class="btn btn-dark btn-bitbucket text-white btn-sm"><i class="fa fa-plus"></i> Add New</button>
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
                        <th>Name</th>
                        <th>Profile Image</th>
                        <th>Designation</th>
                        <th>Description</th>
                        <th>Skills</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($staffs as $i => $staff)
                      <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $staff->name }}</td>
                        <td><img src="{{ asset('storage/' . $staff->profile_image) }}" class="profile-user-img img-responsive img-circle" alt="{{ $staff->name }}" width="100" height="100"></td>
                        <td>{{ $staff->designation }}</td>
                        <td>{{ $staff->description }}</td>
                        <td>
                          @if ($staff->skills)
                            @foreach(json_decode($staff->skills, true) as $skill)
                              <div>
                                <strong>{{ $skill['name'] }}</strong>
                                <br>
                                <img src="{{ asset('storage/' . $skill['image']) }}" alt="{{ $skill['name'] }}" width="50" height="50">
                              </div>
                            @endforeach
                          @else
                            No skills added.
                          @endif
                        </td>
                        <td>
                          <button type="button" onclick="showaction('edit', {{ $staff }})" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                          <button type="button" onclick="deleteStaff({{ $staff->id }})" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
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

      <!-- Staff Modal -->
      <div class="modal fade" id="staffModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title" id="eventModalLabel">Add Staff</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
            <div class="modal-body">
              <form id="staffForm" action="{{ route('add_staff_profile') }}" role="form" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="staffId" name="staffId">
                <div class="box-body">
                  <div class="form-group">
                    <label for="staffName">Name</label>
                    <input type="text" class="form-control" id="staffName" name="staffName" placeholder="Enter name">
                  </div>
                  
                  <div class="form-group">
                    <label for="staffDesignation">Designation</label>
                    <input type="text" class="form-control" id="staffDesignation" name="staffDesignation" placeholder="Enter designation">
                  </div>
                  <div class="form-group">
                    <label for="staffDescription">Description:</label>
                    <textarea class="form-control" id="staffDescription" name="staffDescription" rows="3" placeholder="Provide background of the staff"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="staffPhoto">Photo:</label>
                    <input type="file" class="form-control-file" id="staffPhoto" name="staffPhoto">
                  </div>
                  <!-- Skills Section -->
                  <div id="skillsSection">
                      <h4>Skills</h4>
                      <div id="skillsContainer">
                          <div class="form-group skill-item">
                              <label for="skillName">Skill Name</label>
                              <input type="text" class="form-control" name="skills[0][name]" placeholder="Enter skill name">
                              <label for="skillImage">Skill Image</label>
                              <input type="file" class="form-control-file" name="skills[0][image]">
                              <button type="button" class="btn btn-danger remove-skill">Remove</button>
                          </div>
                      </div>
                      <button type="button" class="btn btn-success" id="addSkillBtn">Add Skill</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="saveStaffBtn">Save Staff</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Jigme Namgyel Engineering College</b>
        </div>
        <strong>Copyright &copy; 2024 <a href="http://almsaeedstudio.com">Department of Information Technology</a>.</strong> All rights reserved.
      </footer>
    </div>

    <!-- jQuery and other scripts -->
    <script src="admin/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="admin/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="admin/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
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

    // Hide the alert message after 2 seconds
    setTimeout(function() {
        $('.responsemessage').fadeOut('slow');
    }, 1000);

    function showaction(action, staff) {
        if (action === 'edit') {
            document.getElementById('eventModalLabel').innerText = 'Edit Staff';
            document.getElementById('staffId').value = staff.id;
            document.getElementById('staffName').value = staff.name;
            document.getElementById('staffDesignation').value = staff.designation;
            document.getElementById('staffDescription').value = staff.description;

            // Clear the file input field
            document.getElementById('staffPhoto').value = '';

            // Change form action to update route
            document.getElementById('staffForm').action = "{{ route('update_staff_profile') }}";
        } else {
            document.getElementById('eventModalLabel').innerText = 'Add Staff';
            document.getElementById('staffId').value = '';
            document.getElementById('staffName').value = '';
            document.getElementById('staffDesignation').value = '';
            document.getElementById('staffDescription').value = '';
            document.getElementById('staffPhoto').value = '';

            // Change form action to add route
            document.getElementById('staffForm').action = "{{ route('add_staff_profile') }}";
        }
        $('#staffModal').modal('show');
    }

    var saveBtn = document.getElementById('saveStaffBtn');
    saveBtn.addEventListener('click', function() {
        document.getElementById('staffForm').submit();
    });

    function deleteStaff(staffId) {
        if (confirm("Are you sure you want to delete this staff?")) {
            $.ajax({
                url: '/staff/' + staffId,
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

    // Additional script for adding skills dynamically
    var skillCount = 1;

    document.getElementById('addSkillBtn').addEventListener('click', function () {
        if (skillCount >= 10) {
            alert('You can only add up to 10 skills.');
            return;
        }

        var skillContainer = document.getElementById('skillsContainer');
        var newSkillItem = document.createElement('div');
        newSkillItem.classList.add('form-group', 'skill-item');
        newSkillItem.innerHTML = `
            <label for="skillName">Skill Name</label>
            <input type="text" class="form-control" name="skills[${skillCount}][name]" placeholder="Enter skill name">
            <label for="skillImage">Skill Image</label>
            <input type="file" class="form-control-file" name="skills[${skillCount}][image]">
            <button type="button" class="btn btn-danger remove-skill">Remove</button>
        `;
        skillContainer.appendChild(newSkillItem);
        skillCount++;

        // Add event listener to the remove button
        newSkillItem.querySelector('.remove-skill').addEventListener('click', function () {
            skillContainer.removeChild(newSkillItem);
            skillCount--;
        });
    });

</script>

  </body>
</html>
