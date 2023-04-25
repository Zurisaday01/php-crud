<?php        
    // ID
    $id = $_GET['updateid'];
    $conn = new mysqli('localhost', 'root', 'root' ,'books');

    $sql = "SELECT * FROM book";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $author = $row['author'];
        $filename = $row['filename'];
    }

    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $author = $_POST['author'];
        $filename = $_POST['filename'];
        
        $sql = "UPDATE book SET id=$id, name='$name', author='$author', filename='$filename' WHERE id=$id";
        
        
        if(mysqli_query($conn, $sql)){
            header( "location:index.php");
        } else{
            echo "ERROR: Sorry $sql. ".mysqli_error($conn);
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <title>Books</title>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center gap-3">
        <div class='border border-2 border-secondary p-4 shadow-lg rounded w-[30rem]'>
            <h1><b>Book</b></h1>
            <p>You can stored your favorite books in here!</p>
            <form method='POST'>
                <div class="form-row">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value=<?php echo $name ?> required>
                    </div>
                    <div class="mb-3">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author"  value=<?php echo $author ?> required>
                    </div>  
                    <div class="mb-3">
                        <label for="filename">Image</label>
                        <input type="file" class="form-control" id="filename" name="filename" value=<?php echo $filename ?> required>
                    </div>  
                </div>
            
                <input class="btn btn-primary" type="submit" id="update" name="update" value="Update"/>
            </form>
        </div>
    </div>
</body>
</html>






