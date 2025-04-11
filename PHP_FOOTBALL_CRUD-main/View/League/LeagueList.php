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
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit League</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <main class="container">
                        <form action="/league/edit" class="justify-content-center d-flex flex-column" method="post">
                            <div class="d-flex justify-content-evenly">
                                <input type="hidden" name="id" id="id" readonly value="<?= $league->getId() ?>">
                                <article class="w-25">
                                    <label for="leagueNameEditInput">Full Name:</label>
                                    <input type="text" class="form-control" placeholder="Full Name" id="leagueNameEditInput" name="leagueNameEditInput">
                                </article>
                                <article class="w-25">
                                    <label for="countryEditInput">Country:</label>
                                    <input type="text" class="form-control" placeholder="Country" id="countryEditInput" name="countryEditInput">
                                </article>x
                            </div>
                    </main>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Edit</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Insert Modal -->
    <div class="modal fade" id="insertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="insertModalLabel">Register League</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <main class="container">
                        <form action="/league/save" class="justify-content-center d-flex flex-column" method="post">
                            <div class="d-flex justify-content-evenly">
                                <article class="w-25">
                                    <label for="leagueNameInsertInput">Full Name:</label>
                                    <input type="text" class="form-control" placeholder="Full Name" id="leagueNameInsertInput" name="leagueNameInsertInput">
                                </article>
                                <article class="w-25">
                                    <label for="countryInsertInput">Country:</label>
                                    <input type="text" class="form-control" placeholder="Country" id="countryInsertInput" name="countryInsertInput">
                                </article>
                            </div>
                    </main>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Register</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <header>
        <nav class="container my-3 d-flex justify-content-evenly">
            <a href="/league" class="btn btn-primary" type="button">League</a>
            <a href="/club" class="btn btn-primary" type="button">Club</a>
            <a href="/player" class="btn btn-primary" type="button">Player</a>
            </div>
        </nav>
    </header>
    <main class="container">
        <h1>Registered Leagues</h1>
        <article class="d-flex justify-content-center">
            <table class="table table-striped table-hover">
                <tr>
                    <th>ID</th>
                    <th>League</th>
                    <th>Country</th>
                    <th>Actions</th>

                </tr>
                <?php foreach ($league->leagueRows as $item): ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td> <?= $item->league_name ?></td>
                        <td><?= $item->country ?></td>
                        <td><a href="/league/delete?id=<?= $item->id ?>" role="button" class="btn btn-danger">Delete</a>
                            <button id="<?= $item->id ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" onclick="setButtonId(this.id)">Edit</button>
                        </td>
                    </tr>
                    </td>
                <?php endforeach ?>
            </table>
        </article>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#insertModal">Register</button>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script>
        function setButtonId(id) {
            document.getElementById('id').value = id;
        }
    </script>
</body>

</html>