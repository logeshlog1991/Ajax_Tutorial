<html>
    <head>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script>
            $(document).ready(function(){
                $('#form1').submit(function(e){
                    var email = $('#email').val();
                    var pass = $('#pass').val();
                    if(email == '' && email == 0){
                        $("#msg_email").html('pls enter email first');
                        $('#email').addClass('error');
                    }else if(pass == '' && pass == 0){
                        $("#msg_pass").html('pls enter pass first');
                        $('#pass').addClass('error');
                    }else if(email != '' && pass != ''){
                        $("#form_msg").html('first form is done.....');
                        $("#msg_email").html('');
                        $("#msg_pass").html('');
                        $('#email').removeClass('error');
                        $('#pass').removeClass('error');
                    }
                    e.preventDefault();
                });
                $('#form2').submit(function(e){
                    var name = $('#name').val();
                    var phone = $('#phone').val();
                    if(name == '' && name == 0){
                        $("#msg_name").html('pls enter name first');
                        $('#name').addClass('error');
                    }else if(phone == '' && phone == 0 || isNaN(phone)){
                        $("#msg_phone").html('pls enter phone first');
                        $('#phone').addClass('error');
                    }else if(name != '' && phone != ''){
                        $("#form_msg2").html('first form is done.....');
                        $("#msg_name").html('');
                        $("#msg_phone").html('');
                        $('#phone').removeClass('error');
                        $('#name').removeClass('error');
                    }
                    e.preventDefault();
                });
            });
        </script>
        <style>
            p{
                color: red;
            }
            .error{
                border: 1px solid red;
            }
        </style>
    </head>
    <body>
        <form action="" method="post" name="form1" id="form1">
            <input type="text" name="email" id="email" placeholder="pls enter the email">
            <p id="msg_email"></p>
            <input type="text" name="password" id="pass" placeholder="pls enter the pass">
            <p id="msg_pass"></p>
            <input type="submit" name="submit" value="login">
            <p id="form_msg"></p>
        </form>

        <form action="" method="post" name="form2" id="form2">
            <input type="text" name="name" id="name" placeholder="pls enter the name">
            <p id="msg_name"></p>
            <input type="text" name="phone" id="phone" placeholder="pls enter the phone">
            <p id="msg_phone"></p>
            <input type="submit" name="submit" value="Register">
            <p id="form_msg2"></p>
        </form>
    </body>
</html>