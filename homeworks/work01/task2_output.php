<style>
    h1 {
        text-align: center;
    }
    table {
        margin: 0 auto;
        border: 1px solid #333;
        border-collapse: collapse;
    }
    tr, td {
        border: 1px solid #333;
        padding: 5px;
    }
</style>

<?php 
    $grade = $_POST['grade'];
    $gradeCat = "F";

    if($grade > 91) $gradeCat = "A";
    elseif($grade > 81 && $grade < 91) $gradeCat = "B";
    elseif($grade > 71 && $grade < 81) $gradeCat = "C";
    elseif($grade > 61 && $grade < 71) $gradeCat = "D";
    elseif($grade > 51 && $grade < 61) $gradeCat = "E";
    elseif($grade > 41 && $grade < 51) $gradeCat = "FX";
    elseif($grade < 40) $gradeCat = "F";

?>

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
        <td><?= $_POST['fname'] ?></td>
        <td><?= $_POST['lname'] ?></td>
        <td><?= $_POST['year'] ?></td>
        <td><?= $_POST['semester'] ?></td>
        <td><?= $_POST['subject'] ?></td>"
        <td><?= $_POST['grade'] ?></td>
        <td><?= $gradeCat ?></td>
        <td><?= $_POST['lecturer'] ?></td>
        <td><?= $_POST['decan'] ?></td>
    </tr>
</table>
