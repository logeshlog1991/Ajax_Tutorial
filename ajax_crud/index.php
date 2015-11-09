<?php
require 'config/config.php';
$select = $conn->query("select * from  register");
if($select->num_rows>0){
    while($row = $select->fetch_assoc()){
        $data[] = $row;
    }
}
?>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="style/style.css">
        <style type="text/css">

/*
            .modal {
                display:    none;
                position:   fixed;
                z-index:    1000;
                top:        0;
                left:       0;
                height:     100%;
                width:      100%;
                background: rgba( 255, 255, 255, .8 )
                url('http://i.stack.imgur.com/FhHRx.gif') 50% 50% no-repeat;
            }
*/

        </style>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script>
            $(document).ready(function(){
                $("#submit").submit(function(e){
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var addr = $("#addr").val();

                    if(name == 0 && email == 0 && addr == 0){
                        $('#msg').html("Pls Enter The Field First....");
                        return false;
                    }else {
                        var data = $(this).serializeArray();
                        $.ajax({
                            url: 'register.php',
                            type: 'POST',
                            data: data,
                            success: function (status) {
                                $("#msg").html(status);
                                location.reload();
                            }
                        });
                        e.preventDefault();
                    }
                });

                /*--- delete ----*/
                $('.delete').click(function(e){
                    var del = $(this);
                    var att = del.attr("id");
                    var info = "id="+ att;
                    $(this).parent().parent().remove();
                    $.ajax({
                        url:"delete.php",
                        type:"POST",
                        data: info,
                        success:function(remove){
                            $('#msg').html(remove);

                            //location.reload();
                        }
                    });
                    e.preventDefault();
                });

                /*--- update ----*/
                $('.update').click(function(){
                    var del = $(this);
                    var att = del.attr("id");
                    var info = "id="+ att;
                    //$('.slide').slideToggle();
                    //alert(info);
                    $.ajax({
                       url:"update.php",
                        type:"POST",
                        data:info,
                        dataType:'json',
                        success: function (update) {
                            //$("#msg").html(update);
                            $.each(update,function(i,item){
                               /* $("#name").val(item['name']);
                                $("#email").val(item['email']);
                                $("#addr").val(item['address']);*/
                                $(".mag td").remove();
                                $("#select tbody").append('<tr><td></td><td>' +
                                    '<input type="text" id="name"></td>' +
                                    '<td><input type="text" id="email"></td>' +
                                    '<td><input type="text" id="addr"></td>' +
                                    '</tr>');
                                $("#name").val(item['name']);
                                $("#email").val(item['email']);
                                $("#addr").val(item['address']);
                                //$(".msg td").html("<input type='text'>");

                            });
                        }
                    });
                    aler('hia');
                });

                /*---edit data--*/
                $('#update').click(function(e){
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var addr = $("#addr").val();
                    if(name == 0 && email == 0 && addr == 0){
                        $('#msg').html("Pls Enter The Field First....");
                        return false;
                    }else {
                        var data = $(this).serializeArray();
                        $.ajax({
                            url: 'update.php',
                            type: 'POST',
                            data: data,
                            success: function (status) {
                                $("#msg").html(status);
                                location.reload();
                            }
                        });
                        e.preventDefault();
                    }
                });

            });
        </script>
    </head>
    <body>
        <table width="500" align="center" id="select">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Edit/Delete</th>
            </thead>
            <tbody align="center" id="tbody">
            <?php
                if(!count($data)){
                    echo "data is not found in your database";
                }else{
                    foreach($data as $store){
            ?>

            <tr class="mag">
                <td>
                    <?php echo $store['id'] ?>
                </td>
                <td>
                    <?php echo $store['name'] ?>
                </td>
                <td>
                    <?php echo $store['email'] ?>
                </td>
                <td id="val">
                    <?php echo $store['address'] ?>
                </td>
                <td>
                    <a href="#" class="delete" id="<?php echo $store['id'] ?>">delete</a>
                    ||
                    <a href="#" class="update" id="<?php echo $store['id'] ?>">update</a>

                </td>
            </tr>
            <tr>
                <td>
                    <div class="slide"></div>
                </td>
            </tr>
            <?php
                    }
                }
            ?>
            </tbody>
        </table>
        <form action="" method="post" name="submit" id="submit">
            <table align="center">
               <tr>
                   <td>
                       Enter the name first:
                   </td>
                   <td>
                       <input type="text" name="name" id="name" placeholder="enter the your name">
                   </td>
               </tr>
                <tr>
                    <td>
                        Enter the name Email:
                    </td>
                    <td>
                        <input type="text" name="email" id="email" placeholder="enter the your email">
                    </td>
                </tr>
                <tr>
                    <td>
                        Enter the name address:
                    </td>
                    <td>
                        <input type="text" name="addr" id="addr" placeholder="enter the your address">
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit">
            <input type="button" name="update" id="update" value="update">


                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="msg"></p>
                    </td>
                </tr>
            </table>

    </body>
</html>
