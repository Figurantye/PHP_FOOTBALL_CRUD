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
                                <input type="hidden" name="id" id="id" readonly>
                                <article class="w-25">
                                    <label for="leagueNameEditInput">Full Name:</label>
                                    <input type="text" class="form-control" placeholder="Full Name" id="leagueNameEditInput" name="leagueNameEditInput">
                                </article>
                                <article class="w-25">
                                    <label for="countryEditInput">Country:</label>
                                    <input type="text" class="form-control" placeholder="Country" id="countryEditInput" name="countryEditInput">
                                </article>
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
                        <td>
                            <button id="<?= $item->id ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" onclick='setFields("<?php echo $item->id ?>", "<?php echo $item->league_name ?>", "<?php echo $item->country ?>")'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
                                </svg>
                            </button>
                            <a href="/club?id=<?= $item->id ?>" role="button" class="btn btn-outline-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                </svg>
                            </a>
                            <a href="/league/delete?id=<?= $item->id ?>" role="button" class="btn btn-outline-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                </svg>
                            </a>
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
        function setFields(id, league, country) {
            document.getElementById('id').value = id;
            document.getElementById('leagueNameEditInput').value = league;
            document.getElementById('countryEditInput').value = country;
        }
    </script>
</body>

</html>