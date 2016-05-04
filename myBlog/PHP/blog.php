<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myBlog | Home</title>
    <link rel="stylesheet" href="assets/css/styles.css"  type='text/css'>
    <link rel="stylesheet" href="assets/css/unsemantic-grid-responsive-tablet.css" type='text/css'>
    <link rel="stylesheet" href="assets/css/unsemantic-grid-desktop.css" type='text/css'>
    <link rel="stylesheet" href="assets/css/unsemantic-grid-mobile.css" type='text/css'>
    <link rel="stylesheet" href="assets/css/unsemantic-grid-responsive.css" type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
</head>
<body>
<!--Start of Header-->
<header>
    <div id="headText">
        <h1>myBlog</h1>
        <h2>Because the internet needs to think what i think</h2>
    </div>
    <div>
        <nav>
            <ul>
                <li><a href="blog.php">All Blog Items</a> </li>
                <li><a href="blog.php">Work Blog Items</a></li>
                <li><a href="blog.php">University Blog Items</a> </li>
                <li><a href="blog.php">Family Blog Items</a></li>
                <li><a href="add.php">Insert Blog Item</a> </li>
            </ul>
        </nav>
    </div>
</header>
<!--End of Header-->

<!--Start of Page Main-->
<main class= "grid-container">
    <section class= "grid-55" id="cont1">
        <article>
            <div id= "allBugs">
                <?php
                include("dbConnect.php"); // Establish Connection with DB

                $sql = "SELECT * FROM blogview"; //Query DB for data.
                $myquery = mysqli_query($db,$sql);

                if ($myquery->num_rows > 0) {
                    echo "<h2>All Blog Items</h2>";
                }
                while($row = $myquery->fetch_array()) {

                    echo "<h3>". $row["entryTitle"] ." <p>by</p>". $row["submitter"] ."</h3><br><p>". $row["submitter"] ."</p><p>". $row["entrySummary"] ."</p><div class=\"block_1\"> </div><hr/>";
                }
                ?>
            </div>
        </article>
    </section>
    <section class= "grid-45" id="cont2">
        <img src="assets/images/logo.png" alt="blog_pic" id="logo">
    </section>
</main>
<!--End of Page Main-->

<!--Start of Footer-->
<footer>
    <div class=\"block_1\"> </div><hr/>
    <p>Designed by Obed Kraine Boachie, 2016.</p>
</footer>
<!--End of Footer-->
</body>
</html>