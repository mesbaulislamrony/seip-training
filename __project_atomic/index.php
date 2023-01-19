<html>
    <head>
        <title>ATOMIC PROJECT LIST</title>
        <style>
            body{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>ATOMIC PROJECT LIST</h1>
        <?php
            $directory = 'views/BITM/SEIP112110/';
            $dir = scandir($directory, 1);
            $pop = array_pop($dir);
            $pop = array_pop($dir);
            $reverse = array_reverse($dir);
            foreach($reverse as $key => $loc){
        ?>
            <a href="views/BITM/SEIP112110/<?php echo $loc; ?>" target="_blank"><?php echo $loc; ?></a><br/>
        <?php } ?>
    </body>
</html>
