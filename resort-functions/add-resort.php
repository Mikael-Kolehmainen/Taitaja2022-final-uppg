<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add-resort'])) {
        require '../required-files/connection.php';
        $sql = "SELECT otsikko FROM liikuntamatkat";
        $result = mysqli_query($conn, $sql);
        $alreadyInDb = false;

        $title = $_POST['title'];

        if (mysqli_num_rows($result) >= 0) {
            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $row = mysqli_fetch_assoc($result);
                if ($title == $row['otsikko']) {
                    echo "<script>
                        alert('Otsikko on jo olemassa.');
                        window.location.href = '../intra.php';
                    </script>";
                    $alreadyInDb = true;
                }
            }
        } else {
            echo "<script>
                        alert('Jotain meni pieleen.');
                        window.location.href = '../intra.php';
                    </script>";
        }

        if (!$alreadyInDb) {
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $startDate = $_POST['start-date'];
            $endDate = $_POST['end-date'];
            
            $folder = mkdir("../media/matkakuvat/".$title."_".date("Y")."_".date("m")."_".date("d"));

            $imageExt = "";
            $imagePath = "";
            $pdfExt = "";
            $pdfPath = "";

            if (isset($_FILES['image'])) {
                $imageExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $imagePath = "../media/matkakuvat/".$title."_".date("Y")."_".date("m")."_".date("d")."/".date("Y")."_".date("m")."_".date("d")."_".$title.".".$imageExt;
            }

            if (isset($_FILES['pdf'])) {
                $pdfExt = pathinfo($_FILES["pdf"]["name"], PATHINFO_EXTENSION);
                $pdfPath = "../media/matkakuvat/".$title."_".date("Y")."_".date("m")."_".date("d")."/".date("Y")."_".date("m")."_".date("d")."_".$title.".".$pdfExt;
            }

            move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
            move_uploaded_file($_FILES["pdf"]["tmp_name"], $pdfPath);

            $imagePathDB = "media/matkakuvat/".$title."_".date("Y")."_".date("m")."_".date("d")."/".date("Y")."_".date("m")."_".date("d")."_".$title.".".$imageExt;
            $pdfPathDB = "media/matkakuvat/".$title."_".date("Y")."_".date("m")."_".date("d")."/".date("Y")."_".date("m")."_".date("d")."_".$title.".".$pdfExt;

            $sql = "INSERT INTO liikuntamatkat (longitudi, latitudi, otsikko, kuvausteksti, alku, loppu, kuva, pdf)
                VALUES ('$latitude', '$longitude', '$title', '$desc', '$startDate', '$endDate', '$imagePathDB', '$pdfPathDB')";
            mysqli_query($conn, $sql);

            echo "<script>
                alert('Matka on lisätty.');
                window.location.href = '../intra.php';
            </script>";
        }
        mysqli_close($conn);
    } else {
        echo "<script>
                alert('Jotain meni pieleen.');
                window.location.href = '../intra.php';
            </script>";
    }
?>