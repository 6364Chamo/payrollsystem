$(document).ready (function()
{
$("#login-page").click(function(event)
{
    event.preventDefault();
    var login = $("#login").serialize();
    $.post("login.php", login, function(data, status) {
        if (data.trim() === "Admin login successfully!" && status === "success") { 

          $("#response").html('<span style="color:rgb(255, 0, 255);">Admin login successfully!</span>');
          setTimeout(() => {
          window.location.href = "admin.html"; // ✅ Redirect to employee page
          }, 1500);

        } 
        else if((data.trim() === "Payroll login successfully!" && status === "success"))
        {
            $("#response").html('<span style="color:rgb(255, 0, 255);">Payroll login successfully!</span>');
            setTimeout(() => {
            window.location.href = "payroll.html"; // ✅ Redirect to employee page
            }, 1500);

        }
        else if((data.trim() === "success" && status === "success"))
        {
            $("#response").html('<span style="color:rgb(255, 0, 255);">employess login successfully!</span>');
            setTimeout(() => {
            window.location.href = "employee_dash_board.php"; // ✅ Redirect to employee page
            }, 1500);
        }
        else
        {
           $("#response").html('<span style="color: red;">login failed!</span>');
        }
        setTimeout(function () {
        $("#response").html('');
        $("#login")[0].reset();
   }, 5000);

    })

})
});
