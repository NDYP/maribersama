<!doctype html>
<html lang="en">

<head>
    <title>Login - Halaman Administrator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>login/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(<?= base_url('assets/'); ?>login/images/x.png);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Masukkan Akun Terdaftar</h3>
                        <form class="signin-form" method="post" action="<?= base_url('admin/login'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#" style="color: #fff">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url('assets/'); ?>login/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>login/js/popper.js"></script>
    <script src="<?= base_url('assets/'); ?>login/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>login/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript">
        <?php if ($this->session->flashdata('success')) { ?>
            toastr.success("<?php echo $this->session->flashdata('success'); ?>");
        <?php } else if ($this->session->flashdata('error')) {  ?>
            toastr.error("<?php echo $this->session->flashdata('error'); ?>");
        <?php } else if ($this->session->flashdata('warning')) {  ?>
            toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
        <?php } else if ($this->session->flashdata('info')) {  ?>
            toastr.info("<?php echo $this->session->flashdata('info'); ?>");
        <?php } ?>
    </script>
</body>

</html>