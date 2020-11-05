<?php
    $link = mysqli_connect('localhost', 'root', '', 'tintuc');
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="./jquery-3.5.1.min.js"></script>   
    <script>
        $(document).ready(function(){
            $('.loaitin').click(function(){
               var id = $(this).attr('idLT');
              $.get('ajax_tin.php',{idLT:id},function(data){

                $('#noidungtin').html(data);

              });

            });

        });



    </script>
    <title>Document</title>
    
</head>
<body>
    <table width='1500' border='1' cellspacing='0' cellpadding='0'>
        <tr class='tieude'>
            <td width='30%'>Loai Tin</td>
            <td width='45%'>Tin</td>
            <td>Video</td>
        </tr>
        <tr valign='top'>
            <td>
                <?php
                    $sql = " SELECT * FROM `loaitin` ";
                    $qr = mysqli_query($link, $sql);
                    
                    while ($row = mysqli_fetch_array($qr)){


                ?>
                      <div class="loaitin" style="cursor: pointer" idLT=<?php echo $row['idLT'] ?>><?php echo $row['Ten'] ?></div>
                      
                      
                    <?php
                        }
                    ?>
            </td>
            <td valign='top'>
                <div id="noidungtin"></div>
            </td> 
            <td><iframe width="560" height="315" src="https://www.youtube.com/embed/11x1xuAgdIA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>      
        </tr>
    </table>
</body>
</html>