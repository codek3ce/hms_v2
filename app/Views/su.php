<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>

    <link rel="shortcut icon" href="/assets/media/image/favicon.png" />
    <link rel="stylesheet" href="/vendors/bundle.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/app.min.css" type="text/css">
</head>

<body class="form-membership">

    <div class="preloader">
        <div class="preloader-icon"></div>
    </div>

    <div class="form-wrapper">

        <div id="logo">
            <img class="logo" src="/assets/media/image/logo-skala.png" alt="image">
            <img class="logo-dark" src="/assets/media/image/logo-light.png" alt="image">
        </div>

        <h5>Sign in</h5>

        <?php
        if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('success') ?>
            </div>
        <?php elseif (session()->getFlashdata('failed')) : ?>
            <div class="alert alert-danger">
                <?php echo session()->getFlashdata('failed') ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="/login">
            <?= csrf_field() ?>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group d-flex justify-content-between">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                </div>
                <a href="recover-password.html">Reset password</a>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div>

    <script src="/vendors/bundle.js"></script>
    <script src="/assets/js/app.js"></script>
</body>

</html>