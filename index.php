<?php
    $link = mysqli_connect('localhost', 'root', '', 'tintuc');
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
                        <a href="index.php?idLT=<?php echo $row['idLT'] ?>"><?php echo $row['Ten'] ?></a>
                    <?php
                        }
                    ?>
            </td>
            <td valign='top'>
                <?php
                    if (isset( $_GET['idLT'])){

                        $idLT = $_GET['idLT'];
                        settype($idLT,'int');
                    }else $idLT = 1;

                    $sql = " SELECT * FROM tin
                             WHERE idLT = $idLT
                             ORDER BY idTin DESC
                             LIMIT 0,20
                             ";
                    $qr = mysqli_query($link, $sql);
                    while ($row_tin = mysqli_fetch_array($qr)){
                
                ?>
                <div id="tin">
                    <div style='color:blue; font-weight:bold'><?php echo $row_tin['TieuDe'] ?></div>
                    <div><img src="./upload/tintuc/<?php echo $row_tin['urlHinh'] ?>" alt=""></div>
                    <div><?php echo $row_tin['TomTat'] ?></div>
                </div>
                <?php
                    }
                ?>
            </td> 
            <td><iframe width="560" height="315" src="https://www.youtube.com/embed/11x1xuAgdIA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>      
        </tr>
    </table>
</body>
</html>