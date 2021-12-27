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
                $pune=merrProjektet($pid);
                $antariid=$pune['antariid'];
                $punaid=$pune['punaid'];
                $projekti=$pune['projektiid'];
                $datar=$pune['datar'];
                $pershkrimi=$pune['pershkrimi'];
                }

                if(isset($_POST['fshijPune'])){
                    fshijPune($_GET['punaid']);
                }
            ?>
        

          <form id="login" action="" method="post">
                <legend>Forma per regjistrim</legend> 
                <label>Emri:</label>
                <select name="projekti" id="projekti">
                    <?php
                        $punet=merrProjektet();
                        while ($pune=mysqli_fetch_assoc($punet)) {
                            $projektiid=$pune['projektiid'];
                            $emri=$pune['emri'];
                            echo "<option value='{$projektiid}'>{$emri}</option>";
                        }
                    ?>
                </select>
                <label>Date e regjistrimit:</label>
                <input type="date" name="datar" id="datar">
                <label>Pershkrimi:</label>
                <textarea name="pershkrimi"></textarea>
                <input type="submit" name="fshijPune" value="Fshij">
            </form>
                        
        </section>
    </main>
    <?php include "inc/footer.php";?>
