<html>
    <head>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script>
            $(document).ready(function(){
                $('#form1').submit(function(e){
                    var data = $("#name").val();
                    var val = "name="+data;
                    if(data == 0 && data == ''){
                        $('#msg').html('please enter the name first');
                    }else{
                        $.ajax({
                            url:'test.php',
                            data:val,
                            type:'POST',
                            beforeSend:function(){
                                $('#msg2').html('loading');
                            },
                            success:function(data){
                                $('#msg').html(data);
                            },
                            complete: function() {
                                $('#msg2').html('completed');
                            }
                        });
                        e.preventDefault();
                    }

                });
            });
        </script>
    </head>
    <body>
        <form action="" method="post" name="form1" id="form1">
            <input type="text" name="name">
            <input type="submit" value="send" name="send">
        </form>
    <span id="msg"></span>
        <span id="msg2"></span>
    </body>
</html>