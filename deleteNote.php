<?php
include "./functions.php";

if(isset($_GET['id'])){
    deleteNote($_GET['id']);
    header("Location:index.php");
}