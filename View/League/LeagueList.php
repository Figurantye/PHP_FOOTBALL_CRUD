<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Leagues</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>League</th>
            <th>Country</th>
            <th>Actions</th>

        </tr>
        <?php foreach ($league->rows as $item): ?>
            <tr>
                <td><?=$item->id?></td>
                <td><a href="/league/leagueform?id=<?= $item->id ?>"> <?=$item->full_name?></a></td>
                <td><?=$item->country?></td>
                <td><a href="/league/delete?id=<?= $item->id ?>">❌</a></td>
            </tr>
        </td>
        <?php endforeach ?>
    </table>
    <form action="/league/leagueform">
        <button>Register</button>
    </form>
</body>
</html>
