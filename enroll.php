<!DOCTYPE html>
<html>
    <head>
        <?php require 'required-files/head.php'; ?>
        <link href='css/enroll-page.css' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['enrollment'])) {

                session_start();
                $email = $_REQUEST['email'];
                $fname = $_REQUEST['fname'];
                $lname = $_REQUEST['lname'];
                $title = $_SESSION['title'];
                $amount = $_REQUEST['amount'];

                // VERIFICATION EMAIL
                $to      = "keijo.salakari@winnova.fi";
                $subject = 'Sähköposti | Ilmoittautuminen'; // Give the email a subject
                $message = "

                Ilmoittautuminen $title \n
                Etunimi: $fname
                Sukunimi: $lname
                Sähköposti: $email
                Matkustavien ihmisten määrä: $amount
                
                "; // Our message above including the link

                $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers

                if (mail($to, $subject, $message, $headers)) {
                    echo "<script>
                                    alert('Ilmoittautuminen lähetetty.');
                                    window.location.href = 'index.php';
                                </script>";
                }
            }
        ?>
        <form action='enroll.php' method='POST' class='sign-form' id='enroll-form'>
            <h1>Ilmoittautuminen</h1>
            <?php
                session_start();
                $_SESSION['title'] = $_REQUEST['title'];
                $title = $_SESSION['title'];
                echo "<h3>$title</h3>";
            ?>
            <div class='floating-label-group'>
                <input type='text' name='fname' class='form-control' required />
                <label class='floating-label'>Etunimi</label>
            </div>
            <div class='floating-label-group'>
                <input type='text' name='lname' class='form-control' required />
                <label class='floating-label'>Sukunimi</label>
            </div>
            <div class='floating-label-group'>
                <input type='email' name='email' class='form-control' required />
                <label class='floating-label'>Sähköposti</label>
            </div>
            <div class='floating-label-group'>
                <input type='number' name='amount' class='form-control' required />
                <label class='floating-label'>Matkustavien ihmisten määrä</label>
            </div>
            <input type='hidden' name='enrollment'>
            <input type='submit' value='Lähetä' class='send-btn'>
        </form>
    </body>
</html>