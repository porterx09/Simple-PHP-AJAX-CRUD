$(document).ready(function() {
  populateTable();
});

var table = $('#employeeTable tbody');

function resetForm(form, modal)
{
  $(form).parsley().reset();
  $(form).trigger("reset");;
  $(modal).modal('hide');
}

function populateTable()
{
  $.ajax({
    url: 'controllers/employees.php?f=getData',
    method: 'GET',
    dataType: 'JSON',
    success: function(res) {
      $.each(res.data, function(i, item) {
        var tr = `
          <tr id="`+ res.data[i].employee_id +`">
            <td>`+ res.data[i].firstname +` `+ res.data[i].middlename +` `+ res.data[i].middlename +`</td>
            <td class="text-center">
              <button class="btn btn-info" onclick="getDataById(`+ res.data[i].employee_id +`)">
                View
              </button>
              <button class="btn btn-danger" onclick="deleteEmployee(`+ res.data[i].employee_id +`)">
                Delete
              </button>
            </td>
          </tr>
        `;
        table.append(tr);
      });
    }
  })
}

function getDataById(employee_id)
{
  $.ajax({
      url: 'controllers/employees.php?f=getDataById',
      method: 'POST',
      data: {
        employee_id: employee_id
      },
      dataType: 'JSON',
      success: function(res) {
        if(res.status) {
          $('#updateEmployee input[name="employee_id"]').val(res.data.employee_id);
          $('#updateEmployee input[name="firstname"]').val(res.data.firstname);
          $('#updateEmployee input[name="middlename"]').val(res.data.middlename);
          $('#updateEmployee input[name="lastname"]').val(res.data.lastname);
          
          $('#updateModal').modal('show');
        } else {
          alertify.error('Something went wrong!<br>Try again later.');
        }
      }
    });
}

function deleteEmployee(employee_id)
{
  alertify.confirm('Do you want to delete this employee?', function() {
    $.ajax({
      url: 'controllers/employees.php?f=deleteById',
      method: 'POST',
      data: {
        employee_id: employee_id
      },
      dataType: 'JSON',
      success: function(res) {
        if(res.status) {
          alertify.success('Record successfully deleted.');
          $('#employeeTable tbody tr#'+ employee_id +'').remove();
        } else {
          alertify.error('Something went wrong!<br>Try again later.');
        }
      }
    });
  });
}

$('#createEmployee').on('submit', function(e) {
  e.preventDefault();
  if($('#createEmployee').parsley().isValid()) {
    $.ajax({
      url: 'controllers/employees.php?f=create',
      method: 'POST',
      data: $(this).serialize(),
      dataType: 'JSON',
      success: function(res) {
        if(res.status) {
          alertify.success('Successfully Created.');
          resetForm('#createEmployee', '#createModal');
          
          var tr = `
            <tr id="`+ res.data.employee_id +`">
              <td>`+ res.data.firstname +` `+ res.data.middlename +` `+ res.data.lastname +`</td>
              <td class="text-center">
                <button class="btn btn-info" onclick="getDataById(`+ res.data.employee_id +`)">
                  View
                </button>
                <button class="btn btn-danger" onclick="deleteEmployee(`+ res.data.employee_id +`)">
                  Delete
                </button>
              </td>
            </tr>
          `;
          table.append(tr);
        } else {
          alertify.error('Something went wrong!<br>Try again later.');
        }
      }
    });
  }
});

$('#updateEmployee').on('submit', function(e) {
  e.preventDefault();
  if($('#updateEmployee').parsley().isValid()) {
    $.ajax({
      url: 'controllers/employees.php?f=updateById',
      method: 'POST',
      data: $(this).serialize(),
      dataType: 'JSON',
      success: function(res) {
        if(res.status) {
          alertify.success('Successfully Updated.');
          resetForm('#updateEmployee', '#updateModal');
          
          var tr = $('#employeeTable tbody tr#'+ res.data.employee_id +'');
          tr.find('td').eq(0).html(res.data.firstname +' '+ res.data.middlename +' '+ res.data.lastname);
        } else {
          alertify.error('Something went wrong!<br>Try again later.');
        }
      }
    });
  }
});