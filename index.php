<?php
include "./functions.php"

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .custom-border {
            border: 2px solid #dee2e6;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <?php include "./component/navbar.php" ?>
    <?php
    if (isset($_POST['submit'])) {
        $title = filterRequest('title');
        $body = filterRequest('body');
        addNote($title, $body);
        header("location:index.php");
    }
    ?>
    <?php include "./component/form.php" ?>
    
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-10 p-0 mb-3">
                <h1>Recent Notes</h1>
                <?php
                $data = getAllNotes();
                if ($data) {
                    foreach ($data as $row) {
                        echo "
                        <div class='card mb-3'>
                            <div class='card-body'>
                                <h5 class='card-title'>$row[title]</h5>
                                <p class='card-text'>$row[body]</p>
                                <a class='btn btn-primary updateBtn' data-bs-toggle='modal' data-bs-target='#exampleModal' id=$row[id]>Edit</a>
                                <a href='deleteNote.php?id=$row[id]' class='btn btn-danger'>Delete</a>
                            </div>
                        </div>";
                    }
                } else {
                    echo "
                    <div class='card mb-3'>
                        <div class='card-body'>
                            <h5 class='card-title'>No Any Notes Yet</h5>
                            <p class='card-text'>try add new note</p>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <?php include "./component/modal.php" ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        btns = document.querySelectorAll('.updateBtn');
        modalNoteTitle = document.getElementById('modalNoteTitle');
        modalNoteBody = document.getElementById('modalNoteBody');
        modalNoteId = document.getElementById('modalNoteId');
        searchField = document.getElementById('search');

        btns.forEach(element => {
            element.addEventListener("click", () => {
                modalNoteTitle.value = element.parentElement.children[0].innerHTML; // note title
                modalNoteBody.value = element.parentElement.children[1].innerHTML; //note body
                modalNoteId.value = element.id;
            });
        });

        searchField.addEventListener('input', () => {
            search = searchField.value.toLowerCase();
            btns.forEach(element => {
                title = element.parentElement.children[0].innerHTML.toLowerCase();
                body = element.parentElement.children[0].innerHTML.toLowerCase();
                if (title.includes(search) || body.includes(search)) {
                    element.parentElement.parentElement.style.display = 'block';
                } else {
                    element.parentElement.parentElement.style.display = 'none';
                }

            });
        })
    </script>
</body>

</html>