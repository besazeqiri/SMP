<?php
    include 'functions.php';
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SMP Projekti</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="jquery-1.12.1.js"></script>
</head>
<body>
    <header class="container header">
        <aside id="slogan">
            <h2>SMP</h2>
            <p> Sistemi per menaxhimin e projekteve</p>
        </aside>
        <nav id="navbar">
            <ul>
                <li><a href="index.php">Ballina</a></li>
                <?php
                   
                    if(isset($_SESSION['anetari'])){
                        echo "<li><a href='punet.php'>Punet</a></li>";
                        if($_SESSION['anetari']['roli']==1){
                            echo "<li><a href='projektet.php'>Projektet</a></li>";
                            echo "<li><a href='anetaret.php'>Anetaret</a></li>";
                        }
                        echo "<li> " . $_SESSION['anetari'] ['emrimbiemri'] . "</li>"; 
                    }
                    
                ?>
            </ul>
        </nav>
    </header>