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
            $('#show-emp-inquary').val(data.showEmpInquary)
            $('#errormsg').html('<p>Erro fetching data!</p>').hide();

        } else {

            $('#employeeDetails').show();
            $('#empDetailsContent').hide();
            $('#errormsg').html('<p>Error fetching data!</p>').show();
            setTimeout(function () {
                     $("#employeeDetails").hide();
            }, 3000);
        }

    })

  });
  
  //for salry calculation
  $("#salary-calculate").click(function()
  {
    var payPerHour=$("#payPerHour").val();
    var workedHours=$("#workedHours").val();
    var salryOfAEmployee=payPerHour*workedHours;
    $('#calculated-salary').val('Rs.'+salryOfAEmployee);

  });

  //for data insertion (without validation)
  /*
  $("#insert-calculated-salary").click(function(){
    var empIdResult=$("#empId_result").val();
    var salaryResult=$("#salary_result").val();
    var monthResult=$("#month_result").val();
 
    
    $.post("salary-insertion.php",{empIdResult:empIdResult,salaryResult:salaryResult,monthResult:monthResult},function(data,status)

     {
        if (data.trim() === "Salary insert succesfully." && status === "success") 
            {
                
               $("#insertion-result").html('<span style="color: green;">Salary Inserted!</span>');

              
            }
        else
        {
            $("#insertion-result").html('<span style="color: red;">Fail to  Insert!</span>');
        }

     });


  });
*/
           // for clearing the form
$("#clear-button").click(function()
 {
        $("#insertion-result").html('');
        $("#empId_result").val('');
        $("#salary_result").val('');
        $("#month_result").val(''); 
 });

 // Validation for the form
$("#easy-valiadation").validate({
    rules: {
        empId_result: {
            required: true,
            minlength: 5
        },
        salary_result: {
            required: true,
            minlength: 5
        },
        month_result: {
            required: true,
            minlength: 5
        }
    },
    messages: {
        empId_result: {
            required: "emp-id is must.",
            minlength: "minimum 5 character (ex: emp12)"
        },
        salary_result: {
            required: "Please enter salary Amount",
            minlength: "minimum 5 character (greater than rs.12000)"
        },
        month_result: {
            required: "Please select the month",
            minlength: "minimum 5 characters required"
        }
    },
    submitHandler: function (form) { // when form is valid
        var empIdResult = $("#empId_result").val();
        var salaryResult = $("#salary_result").val();
        var monthResult = $("#month_result").val();

        $.post("salary-insertion.php", { empIdResult: empIdResult, salaryResult: salaryResult, monthResult: monthResult }, function (data, status) {
            if (data.trim() === "Salary insert succesfully." && status === "success") {
                $("#insertion-result").html('<span style="color: green;">Salary Inserted!</span>');
            } else {
                $("#insertion-result").html('<span style="color: red;">Fail to Insert!</span>');
            }
        });
    }
});

//go to login page
$("#login_page").click(function() {
    window.location.href = "login.html";
});

});
