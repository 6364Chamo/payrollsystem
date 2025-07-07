$(document).ready (function()
{ 
 $("#submit-inquary").click(function()
 {
    var inquaryDetails = $("#salary-inquary").val();
                                //bottom varible store the above variable value(inquaryDetailsFOrAboveVariable)//
    $.post("emp_inquary.php", { inquaryDetailsFOrAboveVariable: inquaryDetails } , function(data, status) {
        if (data.trim() === "Inquiry noted" && status === "success") {
            $("#salary-msg").html('<span style="color: green;">inquary noted!</span>');

        } else {
            $("#salary-msg").html('<span style="color: red;">Fail to inquary noted!</span>');
        }
        setTimeout(function () {
        $("#salary-msg").html('');
        $("#salary-inquary").val(''); 
    }, 5000);
    })

  });

//go to login page
$("#login_page").click(function() {
    window.location.href = "login.html";
});

});