<?php
    if(session_status() != PHP_SESSION_ACTIVE)
    {
        include('theTea_controller.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en" style="border-color: #c43dac;">

<style>
    #postText, #editPostText
    {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        width: 100%;
        height: 200px;
        box-sizing: border-box;
        padding: 10px;
        text-align: center;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>The Tea</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
</head>

<body class="text-center" style="background: radial-gradient(#faf4f9 0%, #d07ab8);">
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: #c43dac;font-weight: bold;font-size: 32px;">SETTINGS</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <button id="logOut_button" class="btn btn-primary text-center" type="button" style="color: #faf4f9;background: #d07ab8;font-size: 44px;border-radius: 48px;font-weight: bold;padding-right: 64px;padding-left: 64px;margin: 5px;border-width: 0px;border-color: rgba(250,244,249,0);">LOG OUT</button>
                    <button id="editAccount_button" class="btn btn-primary text-center" type="button" style="color: #faf4f9;background: #d07ab8;font-size: 44px;border-radius: 48px;font-weight: bold;padding-right: 64px;padding-left: 64px;margin: 5px;border-width: 0px;border-color: rgba(250,244,249,0);">EDIT ACCOUNT</button></div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" style="font-size: 24px;background: #c43dac;color: #faf7f4;border-radius: 24px;">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: #c43dac;font-weight: bold;font-size: 32px;">CREATE POST</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="post_form">
                    <div class="modal-body text-center">
                        <input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION['id']; ?>">
                        <input type="text" name="post" id="postText" required style="width: 100%;min-height: 200px;">
                        <div id="createPost_error_message"></div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d07ab8;color: rgb(255,255,255);border-radius: 24px;font-size: 24px;padding-left: 24px;padding-right: 24px;" data-bs-target="#modal-2" data-bs-toggle="modal">Close</button>
                    <button id="createPost_button" class="btn btn-primary" type="button" style="border-radius: 24px;background: #c43dac;font-size: 24px;padding-right: 24px;padding-left: 24px;">Post</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-3">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: #c43dac;font-weight: bold;font-size: 32px;">EDIT POST</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editPost_form" action="theTea_controller.php" method = "post">
                    <div class="modal-body text-center">
                        <input type='hidden' name='page' value='mainPage'>
                        <input type='hidden' name='command' value='editPost'>
                        <input type='hidden' name='postId' value='{POST_ID}'>
                        <input type="text" name="editPost" id="editPostText" required style="width: 100%;min-height: 200px;">
                        <?php if(!empty($editPost_error_message)) echo $editPost_error_message; ?>
                    </div>
                </form>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d07ab8;color: rgb(255,255,255);border-radius: 24px;font-size: 24px;padding-left: 24px;padding-right: 24px;" data-bs-target="#modal-3" data-bs-toggle="modal">Close</button>
                    <button id="editPost_button" class="btn btn-primary" type="button" style="border-radius: 24px;background: #c43dac;font-size: 24px;padding-right: 24px;padding-left: 24px;">SAVE</button>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light navbar-expand-md" style="padding: 0;background: linear-gradient(-83deg, #d072b5, #f2eae9);height: 75px;">
        <div class="container-fluid"><a class="navbar-brand" href="#">
                <img id="teaCup_image" src="assets/img/Cup.png" style="height: 60px;"></a>
            <div class="collapse navbar-collapse" id="navcol-1"><a class="ms-auto" href="#"></a></div>
            <button class="btn btn-primary" type="button" style="background: rgba(13,110,253,0);border-width: 0px;" data-bs-target="#modal-1" data-bs-toggle="modal"><img src="assets/img/icons8-gear-96.png" style="width: 60px;">
            </button>
        </div>
    </nav>
    <div class="container"><img src="assets/img/My%20project-1.png" width="250" height="250" style="width: 200px;height: 200px;">
        <h1 style="color: #c43dac;font-weight: bold;">The Tea</h1>
        <button class="btn btn-primary text-center" id="createPostModal_button" type="button" style="color: #faf7f4;background: #d07ab8;font-size: 32px;border-radius: 48px;font-weight: bold;margin: 5px;margin-top: 25px;border-width: 0px;border-color: #faf4f9;padding-left: 18px;padding-right: 18px;" data-bs-target="#modal-2" data-bs-toggle="modal">CREATE POST</button>
    </div>
    <div class="vstack" id="posts_stack">
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<form id="teaCup_form" action="theTea_controller.php" method = "post">
    <input type='hidden' name='page' value='mainPage'>
    <input type='hidden' name='command' value='goHome'>
</form>
<form id='logOut_form' action="theTea_controller.php" method = "post">
    <input type='hidden' name='page' value='mainPage'>
    <input type='hidden' name='command' value='logOut'>
</form>
<form id='editAccount_form' action="theTea_controller.php" method = "post">
    <input type='hidden' name='page' value='mainPage'>
    <input type='hidden' name='command' value='editAccount'>
</form>
</html>
<script>
    $(document).ready(function ()
    {
        <?php
        if (isset($display_modal_window)) {
            if ($display_modal_window == 'no-modal-window')
            {
                // do nothing
            }
            else if ($display_modal_window == 'createPost')
            {
                echo '$("#createPostModal_button").click();';
            }
        }
        ?>

        try
        {
            checkLocation().then(({lat, long}) =>
            {
                update_posts(long,lat);
            }).catch(error =>
            {
                $("#logOut_form").submit();
            });
        }
        catch (error)
        {
            $("#logOut_form").submit();
        }

        $("#teaCup_image").click(function ()
        {
            $("#teaCup_form").submit();
        })

        $("#logOut_button").click(function ()
        {
            $("#logOut_form").submit();
        })

        $("#editAccount_button").click(function ()
        {
            $("#editAccount_form").submit();
        })

        $("#createPost_button").click(function()
        {
            const post = $("#postText").val();
            const userId = $("#userId").val();
            const createPostError = $("#createPost_error_message");
            if (post !== "")
            {
                $.ajax(
                {
                    url: "theTea_controller.php",
                    type: "POST",
                    data:
                    {
                        page: "mainPage",
                        command: "createPost",
                        userId: userId,
                        post: post
                    },
                    success: function(response)
                    {
                        console.log(response);
                        createPostError.empty();
                        $("#modal-2").modal("hide");

                        update_posts(long, lat);

                        $("#postText").val("");
                    },
                    error: function(xhr, status, error)
                    {
                        console.log(error);
                        createPostError.html("*Post Failed*");
                    }
                });
            }
            else
            {
                createPostError.html("*Post can't be empty*");
            }
        });

    function checkLocation() {
        return new Promise((resolve, reject) => {
            if ("geolocation" in navigator) {
                navigator.permissions.query({name:'geolocation'}).then(permissionStatus => {
                    if (permissionStatus.state === 'granted') {
                        navigator.geolocation.getCurrentPosition(
                            function (position) {
                                const lat = position.coords.latitude;
                                const long = position.coords.longitude;
                                console.log("Latitude: " + lat + " Longitude: " + long);
                                resolve({ lat, long });
                            },
                            function (error) {
                                var message = "";
                                switch (error.code) {
                                    case error.PERMISSION_DENIED:
                                        message = "User denied the request for Geolocation.";
                                        break;
                                    case error.POSITION_UNAVAILABLE:
                                        message = "Location information is unavailable.";
                                        break;
                                    case error.TIMEOUT:
                                        message = "The request to get user location timed out.";
                                        break;
                                    case error.UNKNOWN_ERROR:
                                        message = "An unknown error occurred.";
                                        break;
                                }
                                alert(message);
                                reject(message);
                            }
                        );
                    } else if (permissionStatus.state === 'prompt') {
                        navigator.geolocation.getCurrentPosition(
                            function (position) {
                                const lat = position.coords.latitude;
                                const long = position.coords.longitude;
                                console.log("Latitude: " + lat + " Longitude: " + long);
                                resolve({ lat, long });
                            },
                            function (error) {
                                var message = "";
                                switch (error.code) {
                                    case error.PERMISSION_DENIED:
                                        message = "User denied the request for Geolocation.";
                                        break;
                                    case error.POSITION_UNAVAILABLE:
                                        message = "Location information is unavailable.";
                                        break;
                                    case error.TIMEOUT:
                                        message = "The request to get user location timed out.";
                                        break;
                                    case error.UNKNOWN_ERROR:
                                        message = "An unknown error occurred.";
                                        break;
                                }
                                alert(message);
                                reject(message);
                            }
                        );
                    } else {
                        alert("Geolocation is not supported by this browser.");
                        reject("Geolocation is not supported by this browser.");
                    }
                });
            } else {
                alert("Geolocation is not supported by this browser.");
                reject("Geolocation is not supported by this browser.");
            }
        });
    }

    function update_posts(long, lat)
    {
        var userId = <?php echo $_SESSION['id']; ?>;
        var url = "theTea_controller.php";
        var query = {
            page: "mainPage",
            command: "loadPosts",
            userId: userId,
            long: long,
            lat: lat
        };

        $.ajax(
        {
            url: url,
            method: "POST",
            data: query,
            dataType: "json",
            success: function(rows)
            {
                var divContent = "";

                for (var i = 0; i < rows.length; i++)
                {
                    var postId = rows[i]['ID'];
                    divContent +=
                        '<div class="card" style="margin: 8px;background: #d07ab8;" data-user-id="' + rows[i]['USER_ID'] + '" data-post-id="' + postId + '"> ' +
                        '<div class="card-body">' +
                        '<h4 class="text-end card-title">';

                    if (rows[i]['USER_ID'] == userId)
                    {
                        divContent +=
                            '<img id="editPost_button_' + postId + '" src="assets/img/icons8-pen-squared-48.png" data-bs-target="#modal-3" data-bs-toggle="modal">' +
                            '<img id="deletePost_button_' + postId + '" src="assets/img/icons8-x-coordinate-50.png" style="max-width: 42px;max-height: 42px;">';
                    }

                    divContent += '</h4>' +
                        '<p class="card-text" style="font-size: 24px;color: #faf4f9;">' + rows[i]['POST'] + '</p>' +
                        '<div class="row">' +
                        '<div class="col">' +
                        '<img id="upVote_button_' + postId + '" src="assets/img/icons8-up-arrow-48.png" style="max-width: 32px;" width="32" height="32">' +
                        '<strong class="text-center" style="font-size: 24px;color: #faf4f9;">' + rows[i]['SCORE'] + '</strong>' +
                        '<img id="downVote_button_' + postId + '" src="assets/img/icons8-up-arrow-48.png" style="max-width: 32px;transform: perspective(0px) rotate(180deg);">' +
                        '</div>' +
                        '<div class="col">' +
                        '<strong style="font-size: 24px;color: #faf4f9;">' + rows[i]['TIME'] + '</strong>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                }
                $('#posts_stack').html(divContent);
                $('#posts_stack').on('click', 'img[id^="editPost_button_"]', function () {
                    var postId = $(this).attr('id').split('_')[2];
                    editPost(postId);

                });
                $('#posts_stack').on('click', 'img[id^="deletePost_button_"]', function () {
                    var postId = $(this).attr('id').split('_')[2];
                    deletePost(postId);
                });
                $('#posts_stack').on('click', 'img[id^="upVote_button_"]', function () {
                    var postId = $(this).attr('id').split('_')[2];
                    upVotePost(postId);
                });
                $('#posts_stack').on('click', 'img[id^="downVote_button_"]', function () {
                    var postId = $(this).attr('id').split('_')[2];
                    downVotePost(postId);
                 });
            })
        }
    }

    function editPost(postId)
    {
        $("#editPost_form input[name='postId']").val(postId);
        $("#editPost_form input[name='command']").val('editPost');

        var currentPostContent = $("div[data-post-id='" + postId + "'] p.card-text").text();
        $("#editPostText").val(currentPostContent);

        $("#editPost_button").click(function()
        {
            $.ajax(
            {
                type: "POST",
                url: "theTea_controller.php",
                data: $("#editPost_form").serialize(),
                success: function(response)
                {
                },
                error: function(xhr, status, error)
                {
                }
            });
            $('#modal-3').modal('hide');
        });
    }

    function deletePost(postId)
    {
        var url = "theTea_controller.php";
        var query =
        {
            page: "mainPage",
            command: "deletePost",
            postId: postId
        };

        $.ajax(
        {
            type: "POST",
            url: url,
            data: query,
            success: function(response)
            {

            },
            error: function(xhr, status, error)
            {
                
            }
        });
    }

    function upVotePost(postId, event)
    {
        event.preventDefault();
        $.ajax(
        {
            url: "theTea_controller.php",
            type: "POST",
            data: {
                page: "mainPage",
                command: "upVotePost",
                postId: postId
            },
            success: function(response)
            {
                console.log(response);
                update_posts(long, lat);
            },
            error: function(xhr, status, error)
            {
                console.log(error);
            }
        });
    }

    function downVotePost(postId, event)
    {
        event.preventDefault();
        $.ajax(
        {
            url: "theTea_controller.php",
            type: "POST",
            data:
            {
                page: "mainPage",
                command: "downVotePost",
                postId: postId
            },
            success: function(response)
            {
                console.log(response);
                update_posts(long, lat);
            },
            error: function(xhr, status, error)
            {
                console.log(error);
            }
        });
    }

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
        $("#logOut_form").submit();
    }
</script>