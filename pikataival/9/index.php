<!-- Toteuta tähän tarvittava koodi -->
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php
            for ($i = 1; $i <= 10; $i++) {
                if ($i != 10) {
                    echo $i."-";
                } else {
                    echo $i;
                }
            }
        ?>
    </body>
</html>