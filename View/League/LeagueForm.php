<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header class="text-center">
        <h1>League Form</h1>
        <p>Fill all fileds with data of your favorite league</p>
    </header>   
    <main class="container ">
        <form action="/View/League/LeagueList.php" class="justify-content-center d-flex flex-column">
            <article class="">
                <label for="">Full Name:</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Full Name" id="fullNameInput">
                    <button class="btn btn-outline-primary">Send</button>
                </div>
            </article>
        </form>
    </main>
</body>

</html>