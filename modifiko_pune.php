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
                if(isset($_POST['modifikoPune'])){
                    modifikoPune($_GET['punaid'],$_SESSION['anetari']['antariid'], $_POST['projekti'], $_POST['datar'] , $_POST['pershkrimi']);
                }
            ?>
    
          <form id="login" action="" method="post">
                <legend>Forma per regjistrim</legend> 
                <label>Emri:</label>
                <select name="projekti" id="projekti" >
              <option value="<?php if(!empty($projekti)){ echo $projekti; } ?>"></option><br />
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
                <input type="date" name="datar" id="datar" value="<?php if(!empty($datar)){ echo $datar; } ?>">
                <label>Pershkrimi:</label>
                <textarea name="pershkrimi" id="pershkrimi"></textarea>
                <input type="submit" name="modifikoPune" value="modifiko">
            </form>
            <div id="errormessage" style="float:left;width:100%; border:1px solid black; text-align:center;"></div>                     
        </section>

        <script>
            $("#login").submit(function(event){
                var projekti=$("#projekti").val();
                var datar=$("#datar").val();
                var pershkrimi=$("#pershkrimi").val();
                
              

                var errors=false;
                var message="";
                if(projekti==""){
                    message+="Ju lutem zgjedhni projektin! <br>";
                    errors=true;
                }
                if(datar==""){
                    message+="Ju lutem plotesoni daten e projektit! <br>";
                    errors=true;
                }

                if(pershkrimi==""){
                    message+="Ju lutem plotesoni pershkrimi projektit! <br>";
                    errors=true;
                }

                
                if(errors){
                    $("#errormessage").html(message);
                    return false;
                }else{
                    return true;
                }
            });
    </script>

    </main>
    <?php include "inc/footer.php";?>
