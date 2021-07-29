<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog Posts</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css" title="style" />
    </head>
    
    <body>
    <?php
        $title = $_POST["title"];
        $details = $_POST["detail"];
        $tags = $_POST["tags"];

        $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "ssnyder3", "ssnyder3", "ssnyder3");

        if(!(empty($title)) && !(empty($details)) && !(empty($tags))){

            //SQL INJECTION
            $constructed_query = "INSERT INTO homework3 (posttitle, descriptor, tag) values ('$title', '$details', '$tags')";
            $results = mysqli_query($db, $constructed_query);

            $constructed_query = "SELECT * FROM homework3";
            $results = mysqli_query($db, $constructed_query);
            $num_rows = mysqli_num_rows($results);
 
    ?>
                <div class = "history">
                    <h1> Blog Post History </h1>
    <?php 
                for($row_num = 1; $row_num <= $num_rows; $row_num++){
                    $row_array = mysqli_fetch_array($results);
    ?>
                <div class = "post">
    <?php
                        print("<h3>$row_array[posttitle]</h3>");
                        print("<p>$row_array[descriptor]</p>");
                        print("<p>Tags: $row_array[tag]</p>");
    ?>
                </div>
    <?php
                        print("<p></p>");
                }
    ?>
                    <p>Create a new post <a href="createpost.html">here.</a></p> 
                </div> 
    <?php
        }
        else{
            if(empty($title)){
    ?>
                <h1> Something went wrong.</h1> 
                <div class ="alert">
                    <p> You forgot to enter a title for your blog post! Go <a href="createpost.html">back</a> and resubmit you post!</p> 
                </div> 
    <?php
            }

            if(empty($details)){
    ?>
                <h1> Something went wrong.</h1> 
                <div class ="alert">
                    <p> You forgot to enter a description for your blog post! Go <a href="createpost.html">back</a> and resubmit you post!</p> 
                </div> 
    <?php
            }

            if(empty($tags)){
    ?>
                <h1> Something went wrong.</h1> 
                <div class ="alert">
                    <p> You forgot to enter tags for your blog post! Go <a href="createpost.html">back</a> and resubmit you post!</p> 
                </div> 
    <?php
            }
        }
    ?>

    
    </body>
    
</html>