<h1>შეფასება</h1>

<table>
    <tr>
        <td>სახელი</td>
        <td>გვარი</td>
        <td>კურსი</td>
        <td>სემესტრი</td>
        <td>სასწავლო კურსი</td>
        <td>მიღებული ნიშანი</td>
        <td>შეფასება</td>
        <td>ლექტორი</td>
        <td>დეკანი</td>
    </tr>

    <tr>
        <td><?php echo $_POST['fname'] ?></td>
        <td><?php echo $_POST['lname'] ?></td>
        <td><?php echo $_POST['year'] ?></td>
        <td><?php echo $_POST['semester'] ?></td>
        <td><?php echo $_POST['subject'] ?></td>"
        <td><?php echo $_POST['grade'] ?></td>
        <td><?php echo $_POST['gradeCat'] ?></td>
        <td><?php echo $_POST['lecturer'] ?></td>
        <td><?php echo $_POST['decan'] ?></td>
    </tr>
</table>

<?php

    echo "</table>";
?>