<?php
    $conn = mysqli_connect('localhost', 'w3gedwards', 'w3gedwards136', 'C354_w3gedwards');
    function email_password_valid($e, $p)
    {
        global $conn;
        $sql = "SELECT ID FROM TEA_USERS WHERE EMAIL = '$e' AND PASSWORD = '$p'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row)
        {
            return $row['ID'];
        }
        else
        {
            return false;
        }
    }

    function email_exists($e)
    {
        global $conn;
        $sql = "SELECT * FROM TEA_USERS WHERE EMAIL = '$e'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);
        if ($row > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function signup_a_new_email($e, $p)
    {
        global $conn;
        $email_regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if (!preg_match($email_regex, $e)) {
            return false;
        }
        $sql = "INSERT INTO TEA_USERS VALUES (null, '$e', '$p')";
        mysqli_query($conn,$sql);

        $sql = "SELECT * FROM TEA_USERS WHERE  EMAIL = '$e' AND PASSWORD = '$p'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if($row>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function update_password($email, $oldPassword, $newPassword)
    {
        global $conn;

        // Check if email and password are correct
        $sql = "SELECT * FROM TEA_USERS WHERE EMAIL = '$email' AND PASSWORD = '$oldPassword'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $sql = "UPDATE TEA_USERS SET PASSWORD = '$newPassword' WHERE EMAIL = '$email'";
            mysqli_query($conn, $sql);
            return true;
        }
        else
        {
            return false;
        }
    }

    function delete_account($email, $password)
    {
        global $conn;

        // Check if email and password are correct
        $sql = "SELECT * FROM TEA_USERS WHERE EMAIL = '$email' AND PASSWORD = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $sql = "DELETE FROM TEA_USERS WHERE EMAIL = '$email'";
            mysqli_query($conn, $sql);
            return true;
        } else {
            return false;
        }
    }

    function create_post($userId, $post, $long, $lat)
    {
        global $conn;

        $sql = "INSERT INTO TEA_POSTS VALUES (null,'$userId', '$post', NOW(), '$long', '$lat', 0)";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function edit_post($postId, $post)
    {
        global $conn;
        $sql = "UPDATE TEA_POSTS SET POST = '$post' WHERE ID = $postId";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function delete_post($postId)
    {
        global $conn;
        $sql = "DELETE FROM TEA_POSTS WHERE ID = $postId";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function upVote_post($postId)
    {
        global $conn;
        $sql = "UPDATE TEA_POSTS SET SCORE = SCORE + 1 WHERE ID = $postId";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function downVote_post($postId)
    {
        global $conn;
        $sql = "UPDATE TEA_POSTS SET SCORE = SCORE - 1 WHERE ID = $postId";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function generatePost_table($userId, $long, $lat)
    {
        global $conn;
        $distance = 0.25;
        $lat1 = $lat - $distance;
        $lat2 = $lat + $distance;
        $long1 = $long - $distance;
        $long2 = $long + $distance;

        $sql = "SELECT ID, USER_ID, POST, TIME, SCORE FROM TEA_POSTS
                WHERE CO_LAT BETWEEN '$lat1' AND '$lat2'
                AND CO_LONG BETWEEN '$long1' AND '$long2'
                ORDER BY TIME DESC";
        $result = mysqli_query($conn, $sql);
        $data = [];
        if ($result)
        {
            while ($row = mysqli_fetch_array($result))
            {
                array_push($data, $row);
            }
            return $data;
        }
        else
        {
            return false;
        }
    }
?>
