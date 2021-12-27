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
                if (isset($_POST['modifikoProjekt'])) {
                    modifikoProjekt($_POST['projektiid'],$_POST['emri'], $_POST['pershkrimi'], $_POST['datafillimit'] , $_POST['datambarimit']);
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
                
                <input type="submit" name="modifikoProjekt" value="Modifiko">
            </form>  
            <div id="errormessage" style="float:left;width:100%; border:1px solid black; text-align:center; "></div>
      
        </section>
        <script>
            $("#login").submit(function(event){
                var emri=$("#emri").val();
                var pershkrimi=$("#pershkrimi").val();
                var datafillimit=$("#datafillimit").val();
                var datambarimit=$("#datambarimit").val();
              

                var errors=false;
                var message="";
                if(emri==""){
                    message+="Ju lutem plotesoni emrin e projektit! <br>";
                    errors=true;
                }
                if(pershkrimi==""){
                    message+="Ju lutem plotesoni pershkrimin e projektit! <br>";
                    errors=true;
                }

                if(datafillimit==""){
                    message+="Ju lutem plotesoni daten e fillimit te projektit! <br>";
                    errors=true;
                }

                if(datambarimit==""){
                    message+="Ju lutem plotesoni daten e mbarimit te projektit! <br>";
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
