<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>The Tea</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="text-center" style="background: radial-gradient(#faf7f4, #d076b7), #b164b4;padding-bottom: 0px;">
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" style="color: #c43dac;font-weight: bold;text-align: center;font-size: 32px;">LOG IN</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="logInSubmit_form" method="post" action="theTea_controller.php">
                        <input type='hidden' name='page' value='startPage'>
                        <input type='hidden' name='command' value='logIn'>
                        <label class="form-label" style="color: #c43dac;font-weight: bold;font-size: 24px;">Email</label>
                        <input id="logInEmail_text" class="form-control" name="email" type="email" required style="background: #f2edf1;">
                        <label class="form-label" style="color: #c43dac;font-weight: bold;font-size: 24px;">Password</label>
                        <input id="logInPassword_text" class="form-control" name="password" type="password" required style="background: rgb(242,237,241);">
                        <?php if(!empty($logIn_error_message)) echo $logIn_error_message; ?>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d07ab8;color: rgb(255,255,255);border-radius: 24px;font-size: 24px;padding-left: 24px;padding-right: 24px;">Close</button>
                    <button id="logInSubmit_button" class="btn btn-primary" type="button" style="border-radius: 24px;background: #c43dac;font-size: 24px;padding-right: 24px;padding-left: 24px;">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" style="color: #c43dac;font-weight: bold;text-align: center;font-size: 32px;">SIGN UP</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="signUpSubmit_form" method="post" action="theTea_controller.php">
                        <input type='hidden' name='page' value='startPage'>
                        <input type='hidden' name='command' value='signUp'>
                        <label class="form-label" style="color: #c43dac;font-weight: bold;font-size: 24px;">Email</label>
                        <input id="signUpEmail_text" class="form-control" name="email" type="email" required style="background: #f2edf1;">
                        <label class="form-label" style="color: #c43dac;font-weight: bold;font-size: 24px;">Password</label>
                        <input id="signUpPassword_text" class="form-control" name="password" type="password" required style="background: rgb(242,237,241);">
                        <?php if(!empty($signUp_error_message)) echo $signUp_error_message; ?>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d07ab8;color: rgb(255,255,255);border-radius: 24px;font-size: 24px;padding-left: 24px;padding-right: 24px;">Close</button>
                    <button id="signUpSubmit_button" class="btn btn-primary" type="button" style="border-radius: 24px;background: #c43dac;font-size: 24px;padding-right: 24px;padding-left: 24px;">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light navbar-expand-md" style="padding: 0;background: linear-gradient(-83deg, #d072b5, #f2eae9);height: 75px;">
        <div class="container-fluid"><a class="navbar-brand" href="#">
                <img id="teaCup_image" src="assets/img/Cup.png" style="height: 60px;"></a>
            <div class="collapse navbar-collapse" id="navcol-1"><a class="ms-auto" href="#"></a></div>
        </div>
    </nav><img src="assets/img/My%20project-1.png" style="width: 20%;height: 20%;">
    <div class="container">
        <h1 style="color: rgb(196,61,172);">Let's Spill</h1>
        <h1 style="color: rgb(197,109,191);font-size: 64px;"><strong><span style="color: rgb(196, 61, 172);">The Tea</span></strong></h1>
        <p style="font-size: 24px;margin-top: 32px;color: rgb(195,64,172);">Log in or sign up to make or view anonymous posts based on where you are.</p>
    </div>
    <div class="container" style="padding: 5px;">
        <button id="logIn_button" class="btn btn-primary text-center" type="button" style="color: rgb(208,122,184);background: #ffffff;font-size: 48px;border-radius: 48px;font-weight: bold;padding-right: 64px;padding-left: 64px;margin: 5px;border-width: 0px;border-color: #d07ab8;" data-bs-target="#modal-1" data-bs-toggle="modal">LOG IN</button>
    </div>
    <div class="container" style="padding: 5px;">
        <button id="signUp_button" class="btn btn-primary text-center" type="button" style="color: rgb(208,122,184);background: #ffffff;font-size: 48px;border-radius: 48px;font-weight: bold;padding-right: 64px;padding-left: 64px;margin: 5px;border-width: 0px;border-color: #c43dac;" data-bs-target="#modal-2" data-bs-toggle="modal">SIGN UP</button>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<form id="teaCup_form" action="theTea_controller.php" method = "post">
    <input type='hidden' name='page' value='startPage'>
    <input type='hidden' name='command' value='goHome'>
</form>
</html>

<script>
    $(document).ready(function ()
    {
        <?php
        if (isset($display_modal_window))
        {
            if ($display_modal_window == 'no-modal-window')
            {
                // do nothing
            }
            else if ($display_modal_window == 'login')
            {
                echo '$("#logIn_button").click();';
            }
            else if ($display_modal_window == 'signup')
            {
                echo '$("#signUp_button").click();';
            }
        }
        ?>

        $("#teaCup_image").click(function ()
        {
            $("#teaCup_form").submit();
        })

        $("#logInSubmit_button").click(function ()
        {
            var email = $("#logInEmail_text").val();
            var password = $("#logInPassword_text").val();
            console.log("email: " + email + ", password: " + password);
            $("#logInSubmit_form").submit();
        })

        $("#signUpSubmit_button").click(function ()
        {
            var email = $("#signUpEmail_text").val();
            var password = $("#signUpPassword_text").val();
            console.log("email: " + email + ", password: " + password);
            $("#signUpSubmit_form").submit();
        })
    })
</script>