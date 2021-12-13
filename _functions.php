<?php

<<<<<<< HEAD
=======
// FUNCTIONS

>>>>>>> 614333bd81d39045b8a79afe6fe790042d4ed1c4
function loginCheck() {
  if(isset($_SESSION["login-sepatu"])){
    echo "<script>
            alert('Anda sudah login!')
            window.location.href = 'index.php'
          </script>";
  }
}

<<<<<<< HEAD
function notLoginCheck() {
=======
function isLogin() {
>>>>>>> 614333bd81d39045b8a79afe6fe790042d4ed1c4
  if(!isset($_SESSION["login-sepatu"])){
    echo "<script>
            alert('Anda belum login!')
            window.location.href = 'login.php'
          </script>";
  }
}

function loginAdmin(){
  if(!isset($_SESSION["login-sepatu"]) || $_SESSION["login-sepatu"] != "admin"){
    echo "<script>
            alert('Akses ditolak, anda bukan admin!')
            window.location.href = '../index.php'
          </script>";
  }
}

function loginUser(){
  if(!isset($_SESSION["login-sepatu"]) || $_SESSION["login-sepatu"] == "admin"){
    echo "<script>
            alert('Akses ditolak!')
            window.location.href = 'index.php'
          </script>";
  }
}