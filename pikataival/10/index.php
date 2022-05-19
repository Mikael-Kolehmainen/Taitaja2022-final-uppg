
<!-- Toteuta tähän tarvittava koodi -->
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php
            $myArr = range(1, 100);
            shuffle($myArr);
            for ($i = 0; $i < 5; $i++) {
                echo "<p>".$myArr[$i]."</p>";
            }
        ?>
    </body>
</html>