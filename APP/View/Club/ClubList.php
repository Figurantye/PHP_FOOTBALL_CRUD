<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>List Leagues</title>
    </style>
</head>

<body>
    <main class="container">
        <h1>Registered Clubs</h1>
        <article class="d-flex justify-content-center">
            <table class="table table-striped table-hover">
                <tr class="bg-black">
                    <th>ID</th>
                    <th>League</th>
                    <th>Name</th>
                    <th>Nickname</th>
                    <th>Ground</th>
                    <th>Founded</th>
                    <th>Coach</th>
                    <th>Actions</th>
    
                </tr>
                <?php foreach ($club->rows as $item): ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $item->league_name?></td>
                        <td><a href="/club/clubform?id=<?= $item->id ?>"> <?= $item->full_name ?></a></td>
                        <td><?= $item->nickname ?></td>
                        <td><?= $item->ground ?></td>
                        <td><?= $item->founded ?></td>
                        <td><?= $item->coach ?></td>
                        <td><a href="/club/delete?id=<?= $item->id ?>">❌</a></td>
                    </tr>
                    </td>
                <?php endforeach ?>
            </table>
        </article>
        <form action="/club/clubform">
            <button class="btn btn-success ">Register</button>
        </form>
     </main>
</body>

</html>