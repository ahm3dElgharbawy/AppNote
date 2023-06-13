<?php

include "./functions.php";

$id = filterRequest('id');
$title = filterRequest('title');
$body = filterRequest('body');

$data = array(
    'title' => $title,
    'body' => $body
);

updateNote($id, $data);
header("location:index.php");

