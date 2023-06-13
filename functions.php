<?php
include "./connection.php";

function filterRequest($requestName){
    return htmlspecialchars(strip_tags($_POST[$requestName]));
}

function getAllNotes(){
    global $conn;
    $sql = "SELECT * FROM notes";
    $stmt = $conn->prepare($sql);
    $stmt -> execute();
    $data = $stmt->fetchAll();
    return $data;
}

function addNote($title,$body){
    global $conn;
    $sql = "INSERT INTO notes(title,body) VALUES ('$title','$body')";
    $result = $conn -> exec($sql);
    // printStatus($result,"note added successfully","failed to add the note");
}

function deleteNote($id){
    global $conn;
    $sql = "DELETE FROM notes WHERE id=$id";
    $result = $conn -> exec($sql);
    // printStatus($result,"note deleted successfully","failed to delete the note");
}

function updateNote($id,$data){
    global $conn;
    $cols = array();
    $vals = array();

    foreach ($data as $key => $val) {
        $cols[] = "`$key` =  ? ";
        $vals[] = "$val";
    }
    $cols = implode(', ', $cols);

    $sql = "UPDATE notes SET $cols WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute($vals);
    // printStatus($result,"note updated successfully","failed to update the note");
}


function printSuccess($data = false){
    $arr = ["status"=>"success"];
    if($data){
        $arr['data'] = $data;
    }
    print json_encode($arr);
}

function printFailure($data = false){
    $arr = ["status"=>"failure"];
    if($data){
        $arr['data'] = $data;
    }
    print json_encode($arr);
}

function printStatus($result,$successMessage,$failureMessage){
    if($result){
        printSuccess($successMessage);
    }
    else{
        printFailure($failureMessage);
    }
}