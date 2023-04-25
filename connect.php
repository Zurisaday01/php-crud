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
    <div class="container mt-5">
    <h2>You connected your form with your database</h2>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Create connection ($servername, $username, $password, $dbname)
            $conn = new mysqli('localhost', 'root', 'root' ,'books');

            // Check connection
            if($conn){
                // Taking all 4 values from the form data(input)
                $name = $_POST['name'];
                $author = $_POST['author'];
                $filename = $_POST['filename'];
                
                $sql = "INSERT INTO book (name, author, filename) VALUES ('$name', '$author', '$filename')";

                if(mysqli_query($conn, $sql)){
                    echo "<div class='alert alert-success' role='alert'>Data stored in a database successfully</div>";
                    header( "refresh:3;url=index.php" );
                } else{
                    echo "ERROR: Sorry $sql. ".mysqli_error($conn);
                }

                // Close connection
                mysqli_close($conn);
            }
            
        } else {
            echo "ERROR: Could not connect 😉";
        
        }
    ?>
    </div>
</body>
</html>




