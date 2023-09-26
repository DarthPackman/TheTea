<?php
    session_start();

    if(empty($_POST['page']))
    {
        $display_modal_window = 'no-modal-window';
        include("theTea_startPage.php");
        exit();
    }

    require_once ("theTea_model.php");

    $page = $_POST["page"];
    $command = $_POST["command"];
    if ($page == "startPage")
    {
        switch ($command)
        {
            case "logIn":
            {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user_id = email_password_valid($email, $password);
                if(!$user_id)
                {
                    $display_modal_window = 'login';
                    $logIn_error_message = "*Invalid Log In Credentials*";
                    include('theTea_startPage.php');
                }
                else
                {
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['id'] = $user_id;
                    $display_modal_window = 'no-modal-window';
                    include('theTea_mainPage.php');
                }
                exit();
            }
            case "signUp":
            {
                $email = $_POST['email'];
                $password = $_POST['password'];
                if (email_exists($email))
                {
                    $display_modal_window = 'signup';
                    $signUp_error_message = "*Email Already Exists*";
                    include('theTea_startPage.php');
                }
                else if (signup_a_new_email($email, $password))
                {
                    $display_modal_window = 'login';
                    include('theTea_startPage.php');
                }
                else
                {
                    $display_modal_window = 'signup';
                    $signUp_error_message = "*Sign Up Failed*";
                    include('theTea_startPage.php');

                }
                exit();
            }
            case "goHome":
            {
                $display_modal_window = 'no-modal-window';
                include('theTea_startPage.php');
                exit();
            }
        }
    }
    else if ($page == "mainPage")
    {
        switch ($command)
        {
            case "editAccount":
            {
                $display_modal_window = 'no-modal-window';
                include('theTea_accountPage.php');
                exit();
            }
            case "logOut":
            {
                session_destroy();
                $display_modal_window = 'no-modal-window';
                include('theTea_startPage.php');
                exit();
            }
            case "createPost":
            {
                $userId = $_POST['userId'];
                $post = $_POST['post'];
                create_post($userId, $post);
                exit();
            }
            case "editPost":
            {
                $editPost = $_POST['editPost'];
                $postId = $_POST['postId'];
                edit_post($postId, $editPost);
                exit();
            }
            case "deletePost":
            {
                $postId = $_POST['postId'];
                delete_post($postId);
                exit();
            }
            case "upVotePost":
            {
                $postId = $_POST['postId'];
                upVote_post($postId);
                exit();
            }
            case "downVotePost":
            {
                $postId = $_POST['postId'];
                downVote_post($postId);
                exit();
            }
            case "loadPosts":
            {
                $userId = $_POST['userId'];
                $long = $_POST['long'];
                $lat = $_POST['lat'];
                $posts = generatePost_table($userId, $long, $lat);
                echo json_encode($posts);
                exit();
            }
            case "goHome":
            {
                $display_modal_window = 'no-modal-window';
                include('theTea_mainPage.php');
                exit();
            }
        }
    }
    else if ($page == "accountPage")
    {
        switch ($command)
        {
            case "editAccount":
            {
                $email = $_POST['email'];
                $oldPassword = $_POST['oldPassword'];
                $newPassword = $_POST['newPassword'];
                if (update_password($email, $oldPassword, $newPassword))
                {
                    $display_modal_window = 'no-modal-window';
                    include('theTea_mainPage.php');
                }
                else
                {
                    $editAccount_error_message = "*Could Not Change Password*";
                    $display_modal_window = 'editAccount';
                    include('theTea_accountPage.php');
                }
                exit();
            }
            case "deleteAccount":
            {
                $email = $_POST['email'];
                $password = $_POST['password'];
                if(delete_account($email,$password))
                {
                    $display_modal_window = 'no-modal-window';
                    session_destroy();
                    include('theTea_startPage.php');
                }
                else
                {
                    $deleteAccount_error_message = "*Could Not Delete Account*";
                    $display_modal_window = 'deleteAccount';
                    include('theTea_accountPage.php');
                }
                exit();
            }
            case "goHome":
            {
                $display_modal_window = 'no-modal-window';
                include('theTea_mainPage.php');
                exit();
            }
        }
    }
?>