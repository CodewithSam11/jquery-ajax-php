<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using the srialize method</title>
    <link rel="stylesheet" href="serialcss.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>PHP & Ajax Serialize Form</h1>
        </div>
        <div id="table-data">
            <form action="" id="submit-form" name="submit-form">
                <table width="100%" cellpadding="10px">
                    <tr>
                        <td width="150px"><label for="">Name</label></td>
                        <td><input type="text" name="fullname" id="fullname"></td>
                    </tr>
                    <tr>
                        <td><label for="age">Age</label></td>
                        <td><input type="number" name="age" id="age"></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Gender</label></td>
                        <td>
                        <input type="radio" name="gender" value="male"/>Male
                        <input type="radio" name="gender" value="female"/>Female
                        </td>
                    </tr>
                    <tr>
                        <td><label for="country"></label></td>
                        <td><select name="country">
                            <option value="ind">India</option>
                            <option value="pak">Pakistan</option>
                            <option value="bangla">Bangladesh</option>
                            <option value="nepa">Nepal</option>
                            <option value="sri">SriLanka</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="button" value="Submit" name="submit" id="submit" class="btn btn-info"></td>
                    </tr>
                </table>
            </form>
            <div id="response">
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#submit").click(function(){
            var name = $("#fullname").val();
            var age = $("#age").val();

            if (name == "" || age == "" || !$('input:radio[name=gender]').is(':checked')){
                $('#response').fadeIn();
                $('#response').removeClass('success-msg').addClass('error-msg').html("All fields are required");
            }
            else {
                // this for getting the serialize array on response and serialize is used to convert the datainto a string 
                // $('#response').html($('#submit-form').serialize());  we can get there the response html
                $.ajax({
                    url: 'serialize-save.php',
                    type: 'POST',
                    data: $('#submit-form').serialize(),
                    // it is an optional which run before to run the success function used for ..Loading
                    beforesend: function() {
                        $('#response').fadeIn();
                        $('#response').removeClass('success-msg error-msg').addClass('process-msg').html("Loading response...");
                    }
                    success: function(data) {
                        $("#submit-form").trigger('reset'); // it is used to clear the form after submit
                        $("#response").fadeIn();      // fadeIn is used to the hidden to visible
                        $("#response").removeClass('error-msg').addClass('success-msg').html(data);
                        setTimeout(function(){
                            $("#response").fadeOut("slow");
                        }, 4000);
                    }
                    
                })
            }
            });
        });
    </script>
</body>
</html>