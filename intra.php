<!DOCTYPE html>
<html>
    <head>
        <?php require 'required-files/head.php' ?>
        <link href='css/admin-page.css' rel='stylesheet' type='text/css'>
        <script src='js/file-validation.js' async></script>
    </head>
    <body id='sign-page'>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['username'])) {
                require 'required-files/connection.php';
                $sql = "SELECT username, pw FROM users";
                $username = $_POST['username'];
                $pw = $_POST['pw'];

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) >= 0) {
                    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                        $row = mysqli_fetch_assoc($result);
                        $dbPw = substr($row['pw'], 5);
                        if ($username == $row['username'] && password_verify($pw, $dbPw) == 1) {
                            showWebsite();
                        } else {
                            echo "<script>
                                alert('Käyttäjätunnus tai salasana on väärin.');
                                header('intra.php');
                            </script>";
                            showSignForm();
                        }
                    }
                } else {
                    showSignForm();
                }
            } else {
                showSignForm();
            }
            function showWebsite() {
                echo "
                    <div class='settings-box'>
                        <h1>Liikuntamatkojen hallinta</h1>
                        <h2>Lisää matka</h2>
                        <form action='resort-functions/add-resort.php' method='POST' enctype='multipart/form-data'>
                            <input type='hidden' name='add-resort'>
                            <div class='floating-label-group'>
                                <input type='text' name='latitude' class='form-control' required />
                                <label class='floating-label'>Latitudi</label>
                            </div>
                            <div class='floating-label-group'>
                                <input type='text' name='longitude' class='form-control' required />
                                <label class='floating-label'>Longitudi</label>
                            </div>
                            <div class='floating-label-group'>
                                <input type='text' name='title' class='form-control' required />
                                <label class='floating-label'>Otsikko</label>
                            </div>
                            <div class='textarea'>
                                <label>Kuvausteksti</label><br>
                                <textarea name='desc' required></textarea>
                            </div>
                            <div class='floating-label-group'>
                                <label class='normal-label'>Alkupäivämäärä</label><br>
                                <input type='date' name='start-date' class='form-control' required />
                            </div>
                            <div class='floating-label-group'>
                                <label class='normal-label'>Loppupäivämäärä</label><br>
                                <input type='date' name='end-date' class='form-control' required />
                            </div>
                            <div class='floating-label-group'>
                                <label class='normal-label'>Kuva</label><br>
                                <input type='file' accept='image/png, image/jpg' name='image' class='form-control' id='image'/>
                            </div>
                            <div class='floating-label-group'>
                                <label class='normal-label'>PDF</label><br>
                                <input type='file' accept='application/pdf' name='pdf' class='form-control' id='pdf'/>
                            </div>
                            <input type='submit' value='Lisää' class='send-btn' id='send-btn'>
                        </form>
                        <h2>Muokkaa tai Poista matkoja</h2>
                        <table>
                            <tr>
                                <td>Rivi</td>
                                <td>Otsikko</td>
                                <td>Longitudi</td>
                                <td>Latitudi</td>
                                <td>Kuvausteksi</td>
                                <td>Alkupäivämäärä</td>
                                <td>Loppupäivämäärä</td>
                                <td>Kuva</td>
                                <td>PDF</td>
                            </tr>";
                            require 'required-files/connection.php';
                            $sql = "SELECT id, longitudi, latitudi, otsikko, kuvausteksti, alku, loppu, kuva, pdf FROM liikuntamatkat";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) >= 1) {
                                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                                    $row = mysqli_fetch_assoc($result);
                                    $j = $i + 1;
                                    $id = $row['id'];
                                    $title = $row['otsikko'];
                                    $longitude = $row['longitudi'];
                                    $latitude = $row['latitudi'];
                                    $desc = $row['kuvausteksti'];
                                    $startDate = $row['alku'];
                                    $endDate = $row['loppu'];
                                    $imagePath = $row['kuva'];
                                    $pdfPath = $row['pdf'];
                                    echo "<tr>
                                        <td>$j</a></td>
                                        <td><a href='resort-functions/edit-resort.php?id=$id&value=otsikko'>$title</a></td>
                                        <td><a href='resort-functions/edit-resort.php?id=$id&value=longitudi'>$longitude</a></td>
                                        <td><a href='resort-functions/edit-resort.php?id=$id&value=latitudi'>$latitude</a></td>
                                        <td><a href='resort-functions/edit-resort.php?id=$id&value=kuvausteksti'>$desc</a></td>
                                        <td><a href='resort-functions/edit-resort.php?id=$id&value=alku'>$startDate</a></td>
                                        <td><a href='resort-functions/edit-resort.php?id=$id&value=loppu'>$endDate</a></td>
                                        <td><a href='resort-functions/edit-resort.php?id=$id&image=$imagePath'><img src='$imagePath' class='table-image'></a></td>
                                        <td><a href='resort-functions/edit-resort.php?id=$id&pdf=$pdfPath'>PDF</a></td>
                                        <td><a href='resort-functions/remove-resort.php?id=$id'>Poista</a></td>
                                    </tr>";
                                }
                            }
            echo "      </table>  
                    </div>
                ";
            }
            function showSignForm() {
                echo "
                <form action='intra.php' method='POST' class='sign-form'>
                    <h1>Kirjaudu sisään</h1>
                    <div class='floating-label-group'>
                        <input type='text' name='username' class='form-control' required />
                        <label class='floating-label'>Käyttäjätunnus</label>
                    </div>
                    <div class='floating-label-group'>
                        <input type='password' name='pw' class='form-control' required />
                        <label class='floating-label'>Salasana</label>
                    </div>
                    <inpu type='hidden' name='admin'>
                    <input type='submit' value='Kirjaudu' class='send-btn'>
                </form>
                ";
            }
        ?>
    </body>
</html>