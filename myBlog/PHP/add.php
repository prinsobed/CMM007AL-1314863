<?php
/**
 * Created by PhpStorm.
 * User: 1314863
 * Date: 14/03/2016
 * Time: 10:14
 */
define('DB_SERVER', 'ap-cdbr-azure-east-c.cloudapp.net');
define('DB_USERNAME','baffe4b0cb391d');
define('DB_PASSWORD', 'a091b3e1');
define('DB_DATABASE', 'cmm007aldb-1314863');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (!$db) {
    die("Connection Failed Buddie: " . mysqli_connect_error());
}
?>

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
        <a href="blog.php"><h1><span class='goHome'>myBlog</span></h1></a>
        <h2>Because the internet needs to think what i think</h2>
    </div>
    <div>
        <nav>
            <ul id="nav1">
                <li id="i1"><a id="a1" href="blog.php">All Blog Items</a> </li>
                <li id="i2"><a id="a2" href="blog.php?category=Work">Work Blog Items</a></li>
                <li id="i3"><a id="a3" href="blog.php?category=University">University Blog Items</a> </li>
                <li id="i4"><a id="a4" href="blog.php?category=Family">Family Blog Items</a></li>
                <li id="i5"><a id="a5" href="add.php">Insert Blog Item</a> </li>
            </ul>
        </nav>
</header>
<!--End of Header-->

<!--Start of Page Main-->
<main class= "grid-container">
    <section class= "grid-55" id="cont1">
        <article>
            <div id="blogAdd">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    ?>
                    <form action = '<?{$_SERVER['PHP_SELF'];}?>' method = 'POST'>
                        <ul class='form-style-1'>
                            <li>
                                <label for = 'title'>Entry Title: <span class='required'>*</span></label>
                                <input type='text' name='entrytitle' class='field-text' value=''  accesskey='1' placeholder='Blog Title' required/><br>
                            </li>
                            <li>
                                <label for = 'blogCategory'>Category: <span class='required'>*</span></label>
                                <select name='blogCategory' class='field-select' id='blogCategory' accesskey='2' required>
                                    <option value= ' '>Select Category Option</option>
                                    <option value='Work'>Work</option>
                                    <option value='University'>University</option>
                                    <option value='Family'>Family</option>
                                </select>
                            </li>
                            <br>
                            <li>
                                <label for = 'blogSummary'>Entry Summary: <span class='required'>*</span></label>
                                <textarea name='blogSummary' class='field-long' id='blogSummary' accesskey='3' placeholder='Your comments on this Title' required></textarea>
                            </li>
                            <br>
                            <li>
                                <label for = 'submitter'>Submitted By: <span class='required'>*</span></label>
                                <input type='text' name='submitter' class='field-text'   accesskey='4' placeholder='Your name' /><br>
                            </li>
                            <li>
                                <input type='submit' value='Submit' accesskey='5'>
                            </li>
                        </ul>
                    </form>
                <?}

                elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // execute if requested using HTTP POST Method
                    if($_POST['entryTitle'] == ' '){
                        header("Location: add.php?failed=1");
                    }
                    $myentrytitle=$_POST['entrytitle'];
                    $mycategory=$_POST['blogCategory'];
                    $mysummary=$_POST['blogSummary'];
                    $mysubmitter=$_POST['submitter'];


                    $sql = "INSERT INTO blogview(entryTitle,category, entrySummary, submitter)
                VALUES ('$myentrytitle','$mycategory','$mysummary','$mysubmitter')";
                    mysqli_query($db, $sql);
                    header('location: blog.php');
                }
                else{
                    header('location: index.php');
                }
                ?>
            </div>
        </article>
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