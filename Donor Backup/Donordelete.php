<DOCTYPE html>
    <html>
        <head>

        </head>
        <body>
            <?php
            include ("newconn.php");
            $Id = intval($_GET['Id']);

            $result = mysqli_query($con, "DELETE FROM appointment WHERE AppointmentID=$Id");

            mysqli_close($con);
            header('Location: donorstatus.php');

            ?>

        </body>
    </html>