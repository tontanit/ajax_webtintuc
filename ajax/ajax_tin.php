
<?php
    $link = mysqli_connect('localhost', 'root', '', 'tintuc');
   
?>
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
                    <div style='color:red; font-weight:bold'><?php echo $row_tin['TieuDe'] ?></div>
                    <div><img src="../upload/tintuc/<?php echo $row_tin['urlHinh'] ?>" alt=""></div>
                    <div><?php echo $row_tin['TomTat'] ?></div>
                </div>
                <?php
                    }
                ?>