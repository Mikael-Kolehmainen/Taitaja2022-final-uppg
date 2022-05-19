<?php
    require '../required-files/connection.php';

    $sql = "SELECT id, otsikko, kuva, pdf FROM liikuntamatkat";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) >= 1) {
        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            $row = mysqli_fetch_assoc($result);
            if ($_REQUEST['id'] == $row['id']) {
                $delete = "DELETE FROM liikuntamatkat WHERE id=$row[id]";
                //  && unlink($row['kuva'] && unlink($row['pdf']))
                $dir = "../media/matkakuvat/".$row['otsikko']."_".date("Y")."_".date("m")."_".date("d");
               // deleteDir($dir);
                if (mysqli_query($conn, $delete)) {
                        echo "<script>
                            alert('Matka poistettu.');
                            window.location.href = '../intra.php';
                        </script>";
                }
            }
        }
    }
 /*   public static function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    } */
?>