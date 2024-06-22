<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oleo+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <div class="container">
        <div class="row login justify-content-center align-items-center">
            <div class="col-md-6">
                <img src="/img/undraw_graduation.svg" class="img-login">
            </div>
            <div class="col-md-6 text-header">
                <form action="/auth/ceklogin" method="post">
                    <h1 class="display-4 text-left mb-4">Log<span>in</span></h1>
                    <?php if (session()->getFlashdata('logout')) : ?>
                        <div class="col-lg-9">
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('logout'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label"><i class="fa fa-user-alt mr-2"></i> Username</label>
                        <div class="col-sm-10 mb-2">
                            <input type="username" class="form-control form-login <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Username" value="<?= old('username'); ?>" autocomplete="off" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label"><i class="fa fa-lock mr-2"></i> Password</label>
                        <div class="col-sm-10 mb-2">
                            <input type="password" class="form-control form-login <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?> <?= (old('password') == true) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Password" autocomplete="off">
                            <div class="invalid-feedback">
                                <?php if ($validation->hasError('password')) : ?>
                                    <?= $validation->getError('password'); ?>
                                <?php else : ?>
                                    Maaf, Password yang anda masukkan salah!
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-login"><i class="fa fa-key mr-2"></i> Login!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>