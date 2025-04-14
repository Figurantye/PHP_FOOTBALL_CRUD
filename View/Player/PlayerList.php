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
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Player</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <main class="conatiner">
                        <form action="/player/edit" class="justify-content-center d-flex flex-column" method="post" id="formEdit">
                            <div class="justify-content-center row">
                                <input type="hidden" name="id" id="id">
                                <section class=" m-3 col-md-5">
                                    <label for="playerNameEditInput">Name:</label>
                                    <input type="text" class="form-control" placeholder="Full Name" id="playerNameEditInput" name="playerNameEditInput">
                                </section>
                                <section class="m-3 col-md-5">
                                    <label for="playerNicknameEditInput">Nickname:</label>
                                    <input type="text" class="form-control" placeholder="Nickname" id="playerNicknameEditInput" name="playerNicknameEditInput">
                                </section>
                                <section class="mb-3 col-md-5">
                                    <label for="playerPositionEditInput">Player Position:</label>
                                    <input type="text" class="form-control" placeholder="player position" id="playerPositionEditInput" name="playerPositionEditInput">
                                </section>
                                <section class="mb-3 col-md-5">
                                    <label for="playerBirthdateEditInput">Birthdate:</label>
                                    <input type="date" class="form-control" placeholder="Year" id="playerBirthdateEditInput" name="playerBirthdateEditInput">
                                </section>
                                <section class="col-md-10">
                                    <label for="playerCurrentClubEditInput">Current Club:</label>
                                    <select name="playerCurrentClubEditInput" id="playerCurrentClubEditInput" class="form-select">
                                        <?php foreach ($club->clubRows as $item): ?>
                                            <option value="<?= $item->club_id ?>"><?= $item->club_name ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </section>
                            </div>
                        </form>
                    </main>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" form="formEdit">Edit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Insert Modal -->
    <div class="modal fade" id="insertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Player</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <main class="conatiner">
                        <form action="/player/save" class="justify-content-center d-flex flex-column" method="post" id="formInsert">
                            <div class="justify-content-center row">
                                <section class=" m-3 col-md-5">
                                    <label for="playerNameInsertInput">Name:</label>
                                    <input type="text" class="form-control" placeholder="Full Name" id="playerNameInsertInput" name="playerNameInsertInput">
                                </section>
                                <section class="m-3 col-md-5">
                                    <label for="playerNicknameInsertInput">Nickname:</label>
                                    <input type="text" class="form-control" placeholder="Nickname" id="playerNicknameInsertInput" name="playerNicknameInsertInput">
                                </section>
                                <section class="mb-3 col-md-5">
                                    <label for="playerPositionInsertInput">Player Position:</label>
                                    <input type="text" class="form-control" placeholder="playerPosition" id="playerPositionInsertInput" name="playerPositionInsertInput">
                                </section>
                                <section class="mb-3 col-md-5">
                                    <label for="playerBirthdateInsertInput">Birthdate:</label>
                                    <input type="date" class="form-control" placeholder="Year" id="playerBirthdateInsertInput" name="playerBirthdateInsertInput">
                                </section>
                                <section class="col-md-10">
                                    <label for="playerCurrentClubInsertInput">Current Club:</label>
                                    <select name="playerCurrentClubInsertInput" id="playerCurrentClubInsertInput" class="form-select">
                                        <?php foreach ($club->clubRows as $item): ?>
                                            <option value="<?= $item->club_id ?>"><?= $item->club_name ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </section>
                            </div>
                        </form>
                    </main>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" form="formInsert">Register</button>
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
        <h1>Registered Players</h1>
        <article class="d-flex justify-content-center">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Current Club</th>
                    <th>Name</th>
                    <th>Nickname</th>
                    <th>Position</th>
                    <th>Birthdate</th>
                    <th>Actions</th>

                </tr>
                <?php foreach ($player->playerRows as $item): ?>
                    <tr>
                        <td><?= $item->club_name ?></td>
                        <td><?= $item->full_name ?></td>
                        <td><?= $item->nickname ?></td>
                        <td><?= $item->player_position ?></td>
                        <td><?= $item->birthdate ?></td>
                        <td>
                            <button id="<?= $item->player_id ?>" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" onclick='setFields("<?php echo $item->player_id ?>", "<?php echo $item->current_club ?>", "<?php echo $item->full_name ?>", "<?php echo $item->nickname ?>", "<?php echo $item->player_position ?>", "<?php echo $item->birthdate ?>")'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
                                </svg>
                            </button>
                            <a href="/player?id=<?= $item->club_id ?>" role="button" class="btn btn-outline-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                </svg>
                            </a>
                            <a href="/player/delete?id=<?= $item->player_id ?>" role="button" class="btn btn-outline-danger">
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
        function setFields(id, playerCurrentClub, playerName, playerNickname, playerPosition, playerBirthdate) {
            document.getElementById('id').value = id;
            document.getElementById('playerCurrentClubEditInput').value = playerCurrentClub;
            document.getElementById('playerNameEditInput').value = playerName;
            document.getElementById('playerNicknameEditInput').value = playerNickname;
            document.getElementById('playerPositionEditInput').value = playerPosition;
            document.getElementById('playerBirthdateEditInput').value = playerBirthdate;
        }
    </script>
</body>

</html>