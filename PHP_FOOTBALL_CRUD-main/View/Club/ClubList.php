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
                <main class="conatiner">
                        <article class="">
                            <form action="/club/edit" class="justify-content-center d-flex flex-column" method="post" id="formModal">
                                <div class="justify-content-center row">
                                <input type="hidden" name="id" id="id">
                                    <section class=" m-3 col-md-5">
                                        <label for="fullnameInput">Name:</label>
                                        <input type="text" class="form-control" placeholder="Full Name" id="fullnameInsertInput" name="fullnameInsertInput">
                                    </section>
                                    <section class="m-3 col-md-5">
                                        <label for="nicknameInsertInput">Nickname:</label>
                                        <input type="text" class="form-control" placeholder="Nickname" id="nicknameInsertInput" name="nicknameInsertInput">
                                    </section>
                                    <section class="mb-3 col-md-10">
                                        <label for="groundInsertInput">Ground:</label>
                                        <input type="text" class="form-control" placeholder="Ground" id="groundInsertInput" name="groundInsertInput">
                                    </section>
                                    <section class="mb-3 col-md-3">
                                        <label for="foundedInsertInput">Founded:</label>
                                        <input type="number" class="form-control" placeholder="Year" id="foundedInsertInput" name="foundedInsertInput">
                                    </section>
                                    <section class="mb-3 col-md-3">
                                        <label for="colorInsertInput">Color:</label>
                                        <input type="text" class="form-control" placeholder="Color text" id="colorInsertInput" name="colorInsertInput">
                                    </section>
                                </div>
                        </article>
                    </main>
                    <div class="d-flex justify-content-start row">
                        <section class="col-md-9 d-block flex-column">
                            <label for="leagueInput">League:</label>
                            <select name="leagueInsertInput" id="leagueInsertInput" class="form-select">
                                <?php foreach ($league->leagueRows as $item): ?>
                                    <option value="<?= $item->id ?>"><?= $item->league_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </section>
                        <section class="mt-3 col-md-12">
                            <label for="chairmanInsertInput">Chairman:</label>
                            <input type="text" class="form-control" placeholder="Chairman Name" id="chairmanInsertInput" name="chairmanInsertInput">
                        </section>
                        <section class="mt-3 col-md-6">
                            <label for="coachInsertInput">Coach:</label>
                            <input type="text" class="form-control" placeholder="Coach Name" id="coachInsertInput" name="coachInsertInput">
                        </section>
                        <section class="mt-3 col-md-6">
                            <label for="lastYearTitleInsertInput">Last Title (Year):</label>
                            <input type="text" class="form-control" placeholder="Year" id="lastYearTitleInsertInput" name="lastYearTitleInsertInput">
                        </section>
                        </section>
                    </div>

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


    <div class="modal fade" id="insertModal" aria-hidden="true" aria-labelledby="insertModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="insertModalLabel">Register Club</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <main class="conatiner">
                        <article class="">
                            <form action="/club/save" class="justify-content-center d-flex flex-column" method="post" id="formModal">
                                <div class="justify-content-center row">
                                    <section class=" m-3 col-md-5">
                                        <label for="fullnameInput">Name:</label>
                                        <input type="text" class="form-control" placeholder="Full Name" id="fullnameInsertInput" name="fullnameInsertInput">
                                    </section>
                                    <section class="m-3 col-md-5">
                                        <label for="nicknameInsertInput">Nickname:</label>
                                        <input type="text" class="form-control" placeholder="Nickname" id="nicknameInsertInput" name="nicknameInsertInput">
                                    </section>
                                    <section class="mb-3 col-md-10">
                                        <label for="groundInsertInput">Ground:</label>
                                        <input type="text" class="form-control" placeholder="Ground" id="groundInsertInput" name="groundInsertInput">
                                    </section>
                                    <section class="mb-3 col-md-3">
                                        <label for="foundedInsertInput">Founded:</label>
                                        <input type="number" class="form-control" placeholder="Year" id="foundedInsertInput" name="foundedInsertInput">
                                    </section>
                                    <section class="mb-3 col-md-3">
                                        <label for="colorInsertInput">Color:</label>
                                        <input type="text" class="form-control" placeholder="Color text" id="colorInsertInput" name="colorInsertInput">
                                    </section>
                                </div>
                        </article>
                    </main>
                    <div class="d-flex justify-content-start row">
                        <section class="col-md-9 d-block flex-column">
                            <label for="leagueInput">League:</label>
                            <select name="leagueInsertInput" id="leagueInsertInput" class="form-select">
                                <?php foreach ($league->leagueRows as $item): ?>
                                    <option value="<?= $item->id ?>"><?= $item->league_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </section>
                        <section class="mt-3 col-md-12">
                            <label for="chairmanInsertInput">Chairman:</label>
                            <input type="text" class="form-control" placeholder="Chairman Name" id="chairmanInsertInput" name="chairmanInsertInput">
                        </section>
                        <section class="mt-3 col-md-6">
                            <label for="coachInsertInput">Coach:</label>
                            <input type="text" class="form-control" placeholder="Coach Name" id="coachInsertInput" name="coachInsertInput">
                        </section>
                        <section class="mt-3 col-md-6">
                            <label for="lastYearTitleInsertInput">Last Title (Year):</label>
                            <input type="text" class="form-control" placeholder="Year" id="lastYearTitleInsertInput" name="lastYearTitleInsertInput">
                        </section>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" data-bs-toggle="modal" for>Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <header>
        <nav class="container my-3 d-flex justify-content-evenly">
            <a href="/View/League/LeagueList.php" class="btn btn-primary" type="button">League</a>
            <a href="/View/Club/ClubList.php" class="btn btn-primary" type="button">Club</a>
            <a href="/View/Player/PlayerList.php" class="btn btn-primary" type="button">Player</a>
            </div>
        </nav>
    </header>
    <main class="container">
        <h1>Registered Clubs</h1>
        <article class="d-flex justify-content-center">
            <table class="table table-striped table-hover">
                <tr>
                    <th>ID</th>
                    <th>League</th>
                    <th>Name</th>
                    <th>Nickname</th>
                    <th>Ground</th>
                    <th>Founded</th>
                    <th>Coach</th>
                    <th>Chairman</th>
                    <th>Actions</th>

                </tr>
                <?php foreach ($club->clubRows as $item): ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td> <?= $item->league_name ?></td>
                        <td><?= $item->club_name ?></td>
                        <td><?= $item->nickname ?></td>
                        <td><?= $item->ground ?></td>
                        <td><?= $item->founded ?></td>
                        <td><?= $item->coach ?></td>
                        <td><?= $item->chairman ?></td>
                        <td><a href="/club/delete?id=<?= $item->id ?>" role="button" class="btn btn-danger">Delete</a>
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