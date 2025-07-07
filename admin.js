
$(document).ready (function()
{  
// ADD EMPLOYEE  
$("#formData").validate({
    rules:
    {                                                             
        emp_id:{
            required:true,
            minlength:5
        },
        emp_password:{
           required:true,
           minlength:5
        },
        emp_name:{
           required:true,
           minlength:5

        },

        emp_address:{
            required:true,
            minlength:5
        },
        emp_contact:{
             required:true,
             number:true,
             minlength:10,
             maxlength:10
        }
    },
    messages:
    {
        emp_id:{
            required:"emp-id is must.",
            minlength:"minimum 5 character(ex:emp12)"
        },
        emp_password:{
            required:"emp-password is must.",
            minlength:"minimum 5 character(ex:Sadun@)"

        },
        emp_name:{
            required:"emp-name is must.",
            minlength:"minimum 5 character(ex:sadun)"
        },

        emp_address:{
            required:"emp-address is must.",
            minlength:"minimu 5 characters(ex:galle)"

        },
        emp_contact:{
            required:"emp-contact is must.",
            minlength:"not valid .",
            maxlength:"not valid number"
        }
        
    },
submitHandler: function(form) {                              
var formData = $("#formData").serialize();

    $.post("add-emp.php", formData, function(data, status) {
        if (data.trim() === "record created" && status === "success") {
            $("#responsehere").html('<span style="color: green;">Record created successfully!</span>');
            setTimeout(function () {
                form.reset(); // or $("#formData")[0].reset();
                $("#responsehere").html('');
            }, 5000);
        } else {
            $("#responsehere").html('<span style="color: red;">Fail to create record!</span>');
        }
    })
}

   
});

//DELETE EMPLOYEE
$("#delete-employee").click(function(event)
{
    event.preventDefault();
    var deleteuser = $("#deleteuser").serialize();
    $.post("delete-emp.php", deleteuser, function(data, status) {
        if (data.trim() === "record deleted" && status === "success") {
            $("#delete-sucess-msg").html('<span style="color: green;">Record deleted successfully!</span>');

        } else {
            $("#delete-sucess-msg").html('<span style="color: red;">Fail to deleted record!</span>');
        }
        setTimeout(function () {
        $("#delete-sucess-msg").html('');
        $("#deleteuser")[0].reset();
    }, 5000);
    })

})


//update employee
$("#modify_employee").validate({
    rules:
    {                                                             
        modify_emp_id:{
            required:true,
            minlength:5
        },
        modify_emp_password:{
           required:true,
           minlength:5
        },
        modify_emp_name:{
           required:true,
           minlength:5

        },

        modify_emp_address:{
            required:true,
            minlength:5
        },
        modify_emp_contact:{
             required:true,
             number:true,
             minlength:10,
             maxlength:10
        }
    },
    messages:
    {
        modify_emp_id:{
            required:"emp-id is must.",
            minlength:"minimum 5 character(ex:emp12)"
        },
        modify_emp_password:{
            required:"emp-password is must.",
            minlength:"minimum 5 character(ex:Sadun@)"

        },
        modify_emp_name:{
            required:"emp-name is must.",
            minlength:"minimum 5 character(ex:sadun)"
        },

        modify_emp_address:{
            required:"emp-address is must.",
            minlength:"minimu 5 characters(ex:galle)"

        },
        modify_emp_contact:{
            required:"emp-contact is must.",
            minlength:"not valid .",
            maxlength:"not valid number"
        }
        
    },
submitHandler: function(form) {                              
var modifyuser = $("#modify_employee").serialize();

    $.post("modify-emp.php", modifyuser, function(data, status) {
        if (data.trim() === "update succesfully" && status === "success") {
            $("#update-response").html('<span style="color: green;">update succesfully!</span>');
        } else {
            $("#update-response").html('<span style="color: red;">Fail to update record!</span>');
        }
                setTimeout(function () {
        $("#update-response").html('');
        $("#modify_employee")[0].reset();
    }, 5000);
    })
}

   
});

//go to login page
$("#login_page").click(function() {
    window.location.href = "login.html";
});

});
