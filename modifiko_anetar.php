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
                
                if(isset($_GET['aid'])){
                    $aid=$_GET['aid'];
                    $antari=merrAnetar($aid);
                    $antariid=$antari['antariid'];
                    $emri=$antari['emri'];
                    $mbiemri=$antari['mbiemri'];
                    $telefoni=$antari['telefoni'];
                    $email=$antari['email'];
                    $password=$antari['fjalekalimi'];
                }
                if (isset($_POST['modifikoAnetar'])) {
                    modifikoAnetar($_POST['antariid'],$_POST['emri'], $_POST['mbiemri'], $_POST['telefoni'] , $_POST['email'],$_POST['password']);
                }
            
            ?>
           <form id="login" action="" method="post">
                <legend>Forma per regjistrim</legend>
                <input type="hidden" name="antariid" id="antariid" value="<?php if(!empty($antariid)){ echo $antariid; } ?>"><br />
                <label>Emri:</label>
                <input type="text" name="emri" id="emri" value="<?php if(!empty($emri)){ echo $emri; } ?>"><br />
                <label>Mbiemri:</label>
                <input type="text" name="mbiemri" id="mbiemri" value="<?php if(!empty($mbiemri)){ echo $mbiemri; } ?>"><br />
                <label>Email:</label>
                <input type="email" name="email" id="email" value="<?php if(!empty($email)){ echo $email; } ?>"><br />
                <label>Telefoni:</label>
                <input type="text" name="telefoni" id="telefoni" value="<?php if(!empty($telefoni)){ echo $telefoni; } ?>"><br />
                <label>Password:</label>
                <input type="password" name="password" id="password" value="<?php if(!empty($password)){ echo $password; } ?>"><br />
                
                <input type="submit" name="modifikoAnetar" value="Modifiko">
            </form>
                       
            <div id="errormessage" style="float:left;width:100%; border:1px solid black; text-align:center; "></div>
    
        </section>
        <script>
            $("#login").submit(function(event){
                var emri=$("#emri").val();
                var mbiemri=$("#mbiemri").val();
                var email=$("#email").val();
                var telefoni=$("#telefoni").val();
                var password=$("#password").val();

                var errors=false;
                var message="";
                if(emri==""){
                    message+="Ju lutem plotesoni emrin! <br>";
                    errors=true;
                }
                if(mbiemri==""){
                    message+="Ju lutem plotesoni mbiemrin! <br>";
                    errors=true;
                }

                if(email==""){
                    message+="Ju lutem plotesoni email-in! <br>";
                    errors=true;
                }

                if(telefoni==""){
                    message+="Ju lutem plotesoni telefonin! <br>";
                    errors=true;
                }

                if(password==""){
                    message+="Ju lutem plotesoni password-in! <br>";
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
