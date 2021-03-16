<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/style.css?<?= rand(100, 1000)?>">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-md-offset-3">
                <h1 class="text-center">Create short url</h1>
                <form>
                    <div class="form-input">
                        <div class="input-group mb-4">
                            <input placeholder="http://domain/любой/путь/" class="form-control col-sm-8" id='fullLink' type="text" >
                            <div class="input-group-append">
                                <button id="deleteText" class="btn" type="button">Delete</button>
                            </div>
                            <div id="space"><p></p></div>
                            <input type="button" class="btn btn-primary col-sm-3" id="btn" value="Get short url">
                        </div>
                    </div>
                </form>
                <div class="col-sm-12">
                    <p class="text-center">Your short url<?=$serverName?>/<span id="shortLink"></span></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btn').click(function () {
                $.ajax({
                    url:'/shortUrl.php',
                    type: 'post',
                    data: {'full': $('#fullLink').val()},
                    success: function (res) {
                        console.log(res);
                        $('#shortLink').html(res.replace(/"/g, ''));

                    },
                    error: function () {
                        console.log('не все ок')
                    }
                })
            })
            $('#deleteText').click(function () {
                $('#fullLink').val('');
            })
        });
    </script>
</body>
</html>