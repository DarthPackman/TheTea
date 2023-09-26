<?php
    if(session_status() != PHP_SESSION_ACTIVE)
    {
        include('theTea_controller.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>The Tea</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
</head>

<body style="background: radial-gradient(#faf4f9, #d07ab8);">
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" style="color: #c43dac;font-weight: bold;text-align: center;font-size: 32px;">EDIT ACCOUNT</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editAccount_form" method="post" action="theTea_controller.php">
                        <input type='hidden' name='page' value='accountPage'>
                        <input type='hidden' name='command' value='editAccount'>
                        <label class="form-label" style="color: #c43dac;font-weight: bold;font-size: 24px;">Email</label>
                        <input class="form-control" type="email" name="email" required style="background: #f2edf1;">
                        <label class="form-label" style="color: #c43dac;font-weight: bold;font-size: 24px;">Old Password</label>
                        <input class="form-control" type="password" name="oldPassword" required style="background: rgb(242,237,241);">
                        <label class="form-label" style="color: #c43dac;font-weight: bold;font-size: 24px;">New Password</label>
                        <input class="form-control" type="password" name="newPassword" required style="background: rgb(242,237,241);">
                        <?php if(!empty($editAccount_error_message)) echo $editAccount_error_message; ?>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d07ab8;color: rgb(255,255,255);border-radius: 24px;font-size: 24px;padding-left: 24px;padding-right: 24px;">Close</button>
                    <button id="editAccountSubmit_button" class="btn btn-primary" type="button" style="border-radius: 24px;background: #c43dac;font-size: 24px;padding-right: 24px;padding-left: 24px;">SAVE</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" style="color: #c43dac;font-weight: bold;text-align: center;font-size: 32px;">Delete Account</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="deleteAccount_form" method="post" action="theTea_controller.php">
                        <input type='hidden' name='page' value='accountPage'>
                        <input type='hidden' name='command' value='deleteAccount'>
                        <label class="form-label" style="color: #c43dac;font-weight: bold;font-size: 24px;">Email</label>
                        <input class="form-control" type="email" name="email" required style="background: #f2edf1;">
                        <label class="form-label" style="color: #c43dac;font-weight: bold;font-size: 24px;">Password</label>
                        <input class="form-control" type="password" name="password" required style="background: rgb(242,237,241);">
                        <?php if(!empty($deleteAccount_error_message)) echo $deleteAccount_error_message; ?>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d07ab8;color: rgb(255,255,255);border-radius: 24px;font-size: 24px;padding-left: 24px;padding-right: 24px;">Close</button>
                    <button id="deleteAccountSubmit_button" class="btn btn-primary" type="button" style="border-radius: 24px;background: #c43dac;font-size: 24px;padding-right: 24px;padding-left: 24px;">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light navbar-expand-md" style="padding: 0;background: linear-gradient(-83deg, #d072b5, #f2eae9);height: 75px;">
        <div class="container-fluid"><a class="navbar-brand" href="#">
                <img id="teaCup_image" src="assets/img/Cup.png" style="height: 60px;"></a></div>
    </nav>
    <div class="container text-center"><img src="assets/img/My%20project-1.png" width="250" height="250" style="width: 200px;height: 200px;">
        <h1 style="color: #c43dac;font-weight: bold;">The Tea</h1>
        <h1 style="color: #c43dac;font-weight: bold;font-size: 48px;margin-top: 12px;">Account Settings</h1>
    </div>
    <div class="container text-center"><button id="editAccount_button" class="btn btn-primary text-center" type="button" style="color: #faf7f4;background: #d07ab8;font-size: 32px;border-radius: 48px;font-weight: bold;margin: 5px;margin-top: 25px;border-width: 0px;border-color: #faf4f9;padding-left: 18px;padding-right: 18px;" data-bs-target="#modal-1" data-bs-toggle="modal">EDIT ACCOUNT</button></div>
    <div class="container text-center"><button id="deleteAccount_button" class="btn btn-primary text-center" type="button" style="color: #faf7f4;background: #d07ab8;font-size: 32px;border-radius: 48px;font-weight: bold;margin: 5px;margin-top: 25px;border-width: 0px;border-color: #faf4f9;padding-left: 18px;padding-right: 18px;margin-bottom: 25px;" data-bs-target="#modal-2" data-bs-toggle="modal">DELETE ACCOUNT</button></div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<form id="teaCup_form" action="theTea_controller.php" method = "post">
    <input type='hidden' name='page' value='accountPage'>
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
            else if ($display_modal_window == 'editAccount')
            {
                echo '$("#editAccount_button").click();';
            }
            else if ($display_modal_window == 'deleteAccount')
            {
                echo '$("#deleteAccount_button").click();';
            }
        }
        ?>

        $("#teaCup_image").click(function ()
        {
            $("#teaCup_form").submit();
        })

        $("#editAccountSubmit_button").click(function ()
        {
            $("#editAccount_form").submit();
        })

        $("#deleteAccountSubmit_button").click(function ()
        {
            $("#deleteAccount_form").submit();

        })
    })

    var timer = setTimeout(timeout, 5 * 60 * 1000);
    window.addEventListener('mousemove', event_listener_mousemove);
    function event_listener_mousemove()
    {
        clearTimeout(timer);
        timer = setTimeout(timeout, 5 * 60 * 1000);
    }
    window.addEventListener('keydown', event_listener_keydown);
    function event_listener_keydown()
    {
        clearTimeout(timer);
        timer = setTimeout(timeout, 5 * 60 * 1000);
    }
    function timeout()
    {
        clearTimeout(timer);
        window.removeEventListener('mousemove', event_listener_mousemove);
        $("#teaCup_form").submit();
    }
</script>
