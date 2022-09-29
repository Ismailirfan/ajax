<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <input type="text" name="" id="inp">
    <p id="demo"></p>
    <select name="cat_id" id="cat">
        <option value="">SELECT CATEGORY</option>
        <?php
        $q = "select * from `categories`";
        $res = mysqli_query($con,$q);
        while($rows = mysqli_fetch_assoc($res))
        {
            ?>
        <option value="<?=$rows['cat_id']?>"><?=$rows['cat_name']?></option>
            <?php
        }
        ?>
    </select>
    <select name="subcategory" id="sub">
        <option value="">SELECT CATEGORY</option>
    </select>
    <script>
        $(document).ready(()=>{
            $('#cat').change(()=>{
                $.ajax({
                    url: "data.php",
                    method: 'POST',
                    data:{
                        'cat_id' : $('#cat').val()
                    },
                    success: res =>{
                        console.log(res)
                        $('#sub').html(res)
                    }
                    })
                })
            })
    </script>
</body>
</html>