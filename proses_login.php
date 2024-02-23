<?php
    if(isset($_POST['submitLogin'])) 
    {
        include('admin/koneksi.php');

        $username = $_POST['username'];
        $pass = $_POST['pass'];
    
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$pass'");
        
        if(mysqli_num_rows($query) > 0) 
        {
            $data = mysqli_fetch_array($query);

            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['status'] = "login";

            header('location: admin/');
        }
        else 
        {
            header('location: index.php');
        }
    }
    
    else
    {
        header('location: ../login.php');
    }
    ?>