<?php
    session_start();
    if($_SESSION['email']){
        session_destroy();
        echo "<script>location.href='login.html'</script>";
    }
    else{
        "<script>location.href='login.html'</script>";
    }
?>