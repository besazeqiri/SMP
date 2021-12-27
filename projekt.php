<?php error_reporting(0);?>
<?php include "inc/header.php";?>
<main class="container page">
        <section id="content">
            <h3>SMP Projekti - Pershkrimi</h3>
            <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat dicta rerum eos. Consectetur error beatae, consequuntur, ratione rem perferendis expedita maiores sequi nesciunt consequatur cupiditate magni! Cum fugiat aliquid deleniti.
            <br><br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat dicta rerum eos. Consectetur error beatae, consequuntur, ratione rem perferendis expedita maiores sequi nesciunt consequatur cupiditate magni! Cum fugiat aliquid deleniti.
            </p>
            <hr />
        
        <?php
             if(isset($_GET['projektiid'])){
                $projektiid=$_GET['projektiid'];
                $projekti=merrProjekt($projektiid);
                $projektiid=$projekti['projektiid'];
                $emri=$projekti['emri'];
                $pershkrimi=$projekti['pershkrimi'];
                $datafillimit=$projekti['datafillimit'];
                $datambarimit=$projekti['datambarimit'];

            }
           ?>
        

           <?php
               if($projekti){
                    echo"<h1>Projekti</h1>";
                    echo "<article class='pitem'>";
                    echo "<img src='images/pitem{$projektiid}.png' alt='Projekti i pare'>";
                    echo "<h4>{$emri}</h4>";
                    echo "<p>{$pershkrimi}</p>";
                    echo "<p>{$datafillimit}</p>";
                    echo "<p>{$datambarimit}</p>";
                    echo "</article>";
                }
                if(!$projekti){
                echo "<h2>Projekti nuk eshte i regjistruar!!</h2>";
                }
              
        ?>
</section>
</main>
<?php include "inc/footer.php";?>