<?php
    $res=array();
    $con= mysqli_connect('localhost','root','','test');
    $sql="select * from countries";
    $result= mysqli_query($con,$sql) or die('Unable to connect'.mysqli_error($con));
    while($row = mysqli_fetch_array($result)){
            $res[]=$row;
    }
?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("document").ready(function(){
            $("#countries").on('change',function(){
               var $s= $("#states");
                $s.html('<option value="">Select state </option>');
                $.ajax({
                    url:'action.php',
                    type:'POST',
                    data:'cid='+$(this).val(),
                    dataType:'json',
                    success:function(data){
                        for(var $i=0;$i<data.length;$i++){
                            $("#states").append("<option value='"+ data[$i]['id']+"'>"+data[$i]['name']+"</option>");
                        }
                    }
                });

            });
        });
    </script>
</head>
<body>
    Countries: <select id="countries" name="countries">
                <option value="">Select Country </option>
        <?php
        foreach($res as $r){
            echo '<option value="'.$r['id'].'" >'.$r['name'].'</option>';
        }
        ?>
    </select>

    States: <select id="states" name="states">

    </select>


</body>
</html>