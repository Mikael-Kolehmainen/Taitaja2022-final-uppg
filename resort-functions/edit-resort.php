<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit-resort'])) {
        require '../required-files/connection.php';

        $sql = "SELECT id, longitudi, latitudi, otsikko, kuvausteksti, alku, loppu, kuva, pdf FROM liikuntamatkat";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) >= 1) {
            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $row = mysqli_fetch_assoc($result);
                session_start();
                if ($_SESSION['id'] == $row['id'] || !isset($_SESSION['pdf'])) {
                    if (!isset($_SESSION['image'])) {
                        $value = $_SESSION['value'];
                        $updated = $_REQUEST['updated-value'];
                        $id = $row['id'];
                        $update = "UPDATE liikuntamatkat SET $value = '$updated' WHERE id=$id";
                        if (mysqli_query($conn, $update)) {
                            echo "<script>
                                alert('Matka muokattu.');
                                window.location.href = '../intra.php';
                            </script>";
                        }
                    } else if (isset($_REQUEST['image'])) {
                        
                    }
                }
            }
        }
    } else {
        session_start();
        $_SESSION['id'] = $_REQUEST['id'];

        if (!isset($_REQUEST['image']) && !isset($_REQUEST['pdf'])) {
            $_SESSION['value'] = $_REQUEST['value'];
            echo "
            <form action='edit-resort.php' method='POST'>
                <input type='text' name='updated-value' required>
                <input type='submit' value='Päivitä' name='edit-resort'>
            </form>
            ";
        } else if (isset($_REQUEST['image'])) {
            $_SESSION['image'] = $_REQUEST['image'];
            echo "
            <form action='edit-resort.php' method='POST'>
                <input type='file' name='updated-value' required>
                <input type='submit' value='Päivitä' name='edit-resort'>
            </form>
            ";
        }
    }
?>