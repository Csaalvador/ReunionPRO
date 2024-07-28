<?php
session_start();
require 'includes/functions.php';
require 'includes/messages.php';
?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <title>Acesso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon16.png">
</head>
<body>
    <div class="d-flex vh-100">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="text-center w-50">
                <form class="form-signin login-form w-100 m-auto" method="post" action="includes/check_login.php">
                    <?php include 'includes/toasts.php'; ?>
                    <fieldset class="border p-4">
                        <div class="login-header mb-4">
                            <figure class="figure">
                                <img src="images/login.png" class="figure-img img-fluid rounded login" alt="Login image" style="width: 165px;">
                            </figure>
                            <h1 class="h3 mb-3 fw-normal">Login</h1>
                        </div>
                        <div class="form-floating form-email mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            <label for="email" class="form-label fw-normal">Endereço de E-mail</label>
                        </div>
                        <div class="form-floating form-senha mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                            <label for="password" class="form-label fw-normal">Senha</label>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-lg btn-primary w-50">Login</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
