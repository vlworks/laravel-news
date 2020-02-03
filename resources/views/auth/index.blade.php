<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Новостной портал</title>
</head>
<body>
<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/">Новостной портал</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/news/">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/">Регистрация</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                </form>
            </div>
        </nav>
    </div>
</header>
<main role="main">

    <section class="auth">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form class="form-signin" wfd-id="1">
                        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                        <label for="inputEmail" class="sr-only" wfd-id="5">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" wfd-id="8">
                        <label for="inputPassword" class="sr-only" wfd-id="4">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" wfd-id="7">
                        <div class="checkbox mb-3" wfd-id="2">
                            <label wfd-id="3">
                                <input type="checkbox" value="remember-me" wfd-id="6"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" wfd-id="9">Sign in</button>
                        <p class="mt-5 mb-3 text-muted">© 2017-2019</p>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
