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
    <div class="container mt-5 mb-5 d-flex flex-column align-items-center justify-content-center gap-3">
        <div class='border border-2 border-secondary p-4 mb-5 shadow-lg rounded w-[40rem]'>
            <h1><b>Book</b></h1>
            <p>You can stored your favorite books in here!</p>
            <form action='connect.php' method='POST'>
                <div class="form-row">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div>  
                    <div class="mb-3">
                        <label for="filename">Image</label>
                        <input class="form-control" type="file" id="filename" name="filename" required>
                    </div>  
                </div>
            
                <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Submit"/>
            </form>
        </div>
        <div>

        <div class="d-flex flex-column">
            <h2>Your books</h2>
            <div class="d-flex gap-3 justify-content-center flex-wrap">

                <?php        
                // Create connection ($servername, $username, $password, $dbname)
                $conn = new mysqli('localhost', 'root', 'root' ,'books');

                // Check connection
                if($conn){

                    $sql = "SELECT * FROM book";
                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {

                            $id = $row['id'];
                            $name = $row['name'];
                            $author = $row['author'];
                            $filename = $row['filename'];

                            echo "<div class='card bg-white border border-2 border-secondary shadow-lg w-[20rem]' style='width: 15rem;'>";
                                echo "<img  src='./img/$filename' class='card-img-top'></img>";
                                echo "<div class='card-body d-flex flex-column'>";
                                    echo "<h3 class='card-title'> ".$name."</h2>";
                                    echo "<span class='card-text'><b class='text-primary'>by</b> ".$author."</span>";
                                    echo "<div class='mt-3 d-flex gap-2'>";
                                        echo "<button type='button' class='btn btn-primary'><a href='update.php?updateid=".$id."' class='text-light text-decoration-none'>Edit</a></button>";
                                        echo "<button type='button' class='btn btn-danger'><a href='delete.php?deleteid=".$id."' class='text-light text-decoration-none'>Delete</a></button>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-primary align-self-start' role='alert' style='width: 50rem'>There are no books in the database</div>";
                    }
                    $conn->close();
                } 
            ?>
            </div>

        </div>

        </div>
    </div>
    
</body>
</html>




