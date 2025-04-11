<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Form Club</title>
</head>

<body>
    <header class="text-center mt-3">
        <h1>Club Form</h1>
        <p>Fill all fileds with data of your favorite football club</p>
    </header>
    <div class="row d-flex justify-content-center mt-4">
        <main class="conatiner w-50">
            <article class="bg-secondary-subtle rounded border border-dark">
                <form action="/club/clubform/save" class="justify-content-center d-flex flex-column" method="post">
                    <div class="justify-content-center row">
                        <section class=" m-3 col-md-5">
                            <label for="fullnameInput">Full Name:</label>
                            <input type="text" class="form-control" placeholder="Full Name" id="fullnameInput" name="fullnameInput">
                        </section>
                        <section class="m-3 col-md-5">
                            <label for="nicknameInput">Nickname:</label>
                            <input type="text" class="form-control" placeholder="Nickname" id="nicknameInput" name="nicknameInput">
                        </section>
                        <section class="mb-3 col-md-10">
                            <label for="groundInput">Ground:</label>
                            <input type="text" class="form-control" placeholder="Ground" id="groundInput" name="groundInput">
                        </section>
                        <section class="mb-3 col-md-3">
                            <label for="foundedInput">Founded (year):</label>
                            <input type="number" class="form-control" placeholder="Year" id="foundedInput" name="foundedInput">
                        </section>
                        <section class="mb-3 col-md-3">
                            <label for="colorInput">Color:</label>
                            <input type="text" class="form-control"  placeholder="Color text" id="colorInput" name="colorInput">
                        </section>
                    </div>
            </article>
        </main>
        <aside class="container w-25 bg-secondary-subtle m-0 rounded border border-dark">
                <div class="d-flex justify-content-start row">
                    <section class="mt-3 col-md-9 d-block flex-column">
                        <label for="leagueInput">League:</label><br>
                        <select name="leagueInput" id="leagueInput" class="form-select">
                            <?php foreach ($league->rows as $item): ?>
                                <option value="<?=$item->id?>"><?=$item->full_name?></option>
                            <?php endforeach?>
                        </select>
                    </section>
                    <section class="mt-3 col-md-12">
                        <label for="chairmanInput">Chairman:</label>
                        <input type="text" class="form-control" placeholder="Chairman Name" id="chairmanInput" name="chairmanInput">
                    </section>
                    <section class="mt-3 col-md-6">
                        <label for="coachInput">Coach:</label>
                        <input type="text" class="form-control" placeholder="Coach Name" id="coachInput" name="coachInput">
                    </section>
                    <section class="mt-3 col-md-6">
                        <label for="lastYearTitleInput">Last Title (Year):</label>
                        <input type="text" class="form-control" placeholder="Year" id="lastYearTitleInput" name="lastYearTitleInput">
                    </section>
                </div>
            </aside>
            <div class="justify-content-center d-flex mt-4">
                <button class="btn btn-primary w-25" type="submit">Send</button>
            </div>
        </form>
    </div>
</body>

</html>