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
                
                if(isset($_POST['shtoAnetar'])){
                    shtoAnetar($_POST['emri'], $_POST['mbiemri'], $_POST['telefoni'] , $_POST['email'],$_POST['password']);
                }
            ?>


            <form id="login" action="" method="post">
                <legend>Forma per regjistrim</legend> 
                <label>Emri:</label>
                <input type="text" name="emri" id="emri"><br />
                <label>Mbiemri:</label>
                <input type="text" name="mbiemri" id="mbiemri"><br />
                <label>Email:</label>
                <input type="email" name="email" id="email"><br />
                <label>Telefoni:</label>
                <input type="text" name="telefoni" id="telefoni"><br />
                <label>Password:</label>
                <input type="password" name="password" id="password"><br />
                
                <input type="submit" name="shtoAnetar" value="Regjistrohu">
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
