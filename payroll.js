$(document).ready (function()
{ 
 $("#search-btn").click(function()
 {
    var empIdInput = $("#empIdInput").val();
                                //bottom varible store the above variable value(inquaryDetailsFOrAboveVariable)//
    $.post("payroll.php", { empIdInput: empIdInput } , function(data, status) {
        if (data.message==="Data successfully retrieved!" && status === "success") {
            $('#empDetailsContent').show();
            $('#employeeDetails').show();
            $('#show-emp-name').val(data.showEmpName);
            $('#show-emp-contact').val(data.showEmpContact);
            $('#show-emp-month').val(data.showEmpMonth);
            $('#errormsg').html('<p>Erro fetching data!</p>').hide();

        } else {
            console.log("this part is working");
            $('#employeeDetails').show();
            $('#empDetailsContent').hide();
            $('#errormsg').html('<p>Error fetching data!</p>').show();
            setTimeout(function () {
                     $("#employeeDetails").hide();
            }, 3000);
        }

    })

  });

  $("#salary-calculate").click(function()
  {

  });
});