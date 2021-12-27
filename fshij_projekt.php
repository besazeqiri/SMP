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
                
                if(isset($_GET['pid'])){
                    $pid=$_GET['pid'];
                    $projekti=merrProjekt($pid);
                    $projektiid=$projekti['projektiid'];
                    $emri=$projekti['emri'];
                    $pershkrimi=$projekti['pershkrimi'];
                    $datafillimit=$projekti['datafillimit'];
                    $datambarimit=$projekti['datambarimit'];
                }
                if (isset($_POST['fshijProjekt'])) {
                    fshijProjekt($_POST['projektiid']);
                }
            
            ?>
           <form id="login" action="" method="post">
                <legend>Forma per regjistrim</legend>
                <input type="hidden" name="projektiid" id="projektiid" value="<?php if(!empty($projektiid)){ echo $projektiid; } ?>"><br />
                <label>Emri:</label>
                <input type="text" name="emri" id="emri" value="<?php if(!empty($emri)){ echo $emri; } ?>"><br />
                <label>Pershkrimi:</label>
                <input type="text" name="pershkrimi" id="pershkrimi" value="<?php if(!empty($pershkrimi)){ echo $pershkrimi; } ?>"><br />
                <label>Data e fillimit:</label>
                <input type="date" name="datafillimit" id="datafillimit" value="<?php if(!empty($datafillimit)){ echo $datafillimit; } ?>"><br />
                <label>Data e mbarimit:</label>
                <input type="date" name="datambarimit" id="datambarimit" value="<?php if(!empty($datambarimit)){ echo $datambarimit; } ?>"><br />                 
                <input type="submit" name="fshijProjekt" value="Fshij">
            </form>
        </section>
    </main>
    <?php include "inc/footer.php";?>
