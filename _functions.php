<?php

function loginCheck() {
  if(isset($_SESSION["login-sepatu"])){
    echo "<script>
            alert('Anda sudah login!')
            window.location.href = 'index.php'
          </script>";
  }
}

function notLoginCheck() {
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