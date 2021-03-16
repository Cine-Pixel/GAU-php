<style>
    h1 {text-align: center}
    table{
        margin: 0 auto;
        border: 1px solid #333;
        border-collapse: collapse;
    }
    tr,
    td {
        border: 1px solid #333; 
    }
</style>

<h1>ხელფასი</h1>

<table>
    <tr>
        <td>სახელი</td>
        <td>გვარი</td>
        <td>დაკავებული თანამდებობა</td>
        <td>ხელფასი</td>
        <td>საშემოსავლო</td>
        <td>დარიცხული ხელფასი</td>
    </tr>

    <tr>
        <td><?= $_GET['fname'] ?></td>
        <td><?= $_GET['lname'] ?></td>
        <td><?= $_GET['position'] ?></td>
        <td><?= $_GET['salary'] ?></td>
        <td><?= $_GET['salary'] * 0.2 ?></td>
        <td><?= $_GET['salary'] - $_GET['salary'] * 0.2 ?></td>
    </tr>

</table>
