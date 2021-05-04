<?php include('core/init.php'); ?>
<?php
    if (!empty($_POST['anticsrf'])) {
        if (hash_equals($_SESSION['token'], $_POST['anticsrf'])) {

    
            //get username and password
            $username = htmlentities($_POST['username']);
            $password = htmlentities($_POST['password']);
            
            //Create user object
            $user = new User;
            
            if($user->login($username, $password)){
                redirect('index.php','You have been logged in.', 'success');
            } else {
                redirect('index.php','Invalid login', 'error');
            }
        } else {
            redirect('index.php');
        }
    }
?>