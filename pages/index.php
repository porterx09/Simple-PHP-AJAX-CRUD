<html lang="en">
<head>
  <title>PHP/AJAX CRUD</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/libs/alertify/css/alertify.min.css">
  <link rel="stylesheet" href="../assets/libs/alertify/css/themes/default.min.css">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb20">
      <a class="navbar-brand" href="#">PHP/AJAX CRUD</a>
    </nav>
  </header>
  <div class="container mb20">
    <div class="card">
      <div class="card-body">
        <div class="page-title">
          Employee List
        </div>
        <div class="divider"></div>
        <div class="mb20">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModal">
            Create
          </button>
        </div>
        <div class="page-content">
          <table id="employeeTable" class="table table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th class="text-center" width="25%">Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Employee Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="createEmployee" method="post" data-parsley-validate>
          <div class="modal-body">
            <div class="form-group">
              <label for="firstname">Firstname</label>
              <input type="text" 
                     name="firstname" 
                     class="form-control" 
                     placeholder="Firstname"
                     minlenght="3"
                     maxlenght="50"
                     required>
            </div>
            <div class="form-group">
              <label for="middlename">Middlename</label>
              <input type="text" 
                     name="middlename" 
                     class="form-control" 
                     placeholder="Middlename"
                     minlenght="3"
                     maxlenght="50"
                     required>
            </div>
            <div class="form-group">
              <label for="lastname">Lastname</label>
              <input type="text" 
                     name="lastname" 
                     class="form-control" 
                     placeholder="Lastname"
                     minlenght="3"
                     maxlenght="50"
                     required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-info">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Employee Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="updateEmployee" method="post" data-parsley-validate>
          <div class="modal-body">
            <input type="hidden" name="employee_id" minlenght="1" required>
            <div class="form-group">
              <label for="firstname">Firstname</label>
              <input type="text" 
                     name="firstname" 
                     class="form-control" 
                     placeholder="Firstname"
                     minlenght="3"
                     maxlenght="50"
                     required>
            </div>
            <div class="form-group">
              <label for="middlename">Middlename</label>
              <input type="text" 
                     name="middlename" 
                     class="form-control" 
                     placeholder="Middlename"
                     minlenght="3"
                     maxlenght="50"
                     required>
            </div>
            <div class="form-group">
              <label for="lastname">Lastname</label>
              <input type="text" 
                     name="lastname" 
                     class="form-control" 
                     placeholder="Lastname"
                     minlenght="3"
                     maxlenght="50"
                     required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-info">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <footer>
    <div class="text-center">
      &copy; All rights reserved 2019.
    </div>
  </footer>
  <script src="../assets/libs/jquery/jquery-3.3.1.min.js"></script>
  <script src="../assets/libs/popper/popper.min.js"></script>
  <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/libs/parsley/js/parsley.min.js"></script>
  <script src="../assets/libs/alertify/js/alertify.min.js"></script>
  <script src="../assets/js/script.js"></script>
</body>
</html>