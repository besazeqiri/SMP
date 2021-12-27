<?php

    if (isset($_POST['login'])) {
        Login($_POST['email'],$_POST['password']);
    }

?>
        <aside id="sidebar">
            <form id="login" action="" method="post">
                <legend>Forma per login</legend> 
                <label>Email:</label>
                <input type="email" name="email" id="perdoruesi" ><br />
                <label>Password:</label>
                <input type="password" name="password" id="paswordi"><br />
                <input type="submit" name="login" value="Log in">
            </form>
            <div id="errormessage" style="float:left;width:100%; border:1px solid black; text-align:center;"></div>
            <h3>SMP ka keto funksionalitete:</h3>
            <ol>
                <li>Menaxhimin e anetareve(Shtimin| Fshirjen | Modifikimin)</li>
                <li>Menaxhimin e projekteve(Shtimin| Fshirjen | Modifikimin)</li>
                <li>Menaxhimin e puneve(Shtimin| Fshirjen | Modifikimin)</li>
                <li>Hyrjen dhe Daljen nga sistemi</li>
                <li>Menaxhime te tjera</li>
            </ol>
            <h3>SMP ka keto funksionalitete:</h3>
            <ol>
                <li>HTML & CSS Teori dhe Ushtrime</li>
                <li>HTML & CSS  Praktika</li>
                <li>JavaScript & jQuery Teori dhe Ushtrime</li>
                <li>JavaScript & jQuery Praktika</li>
                <li>MySQL dhe PHP Teori dhe Ushtrime</li>
                <li>MySQL dhe PHP Praktika </li>
                <li>Kodimi i projektit real DEMO SMP - Sistemi per menaxhimin e projekteve </li>
                <li>Detajet e trajnimit - <a href="www.tick-ks.com">TICK</a></li>
                
            </ol>
        </aside>
        <script>
        $("#login").submit(function(event){
    var perdoruesi=$("#perdoruesi").val();
    var paswordi=$("#paswordi").val();

    var errors=false;
    var message="";
    if(perdoruesi==""){
        message+="Ju lutem plotesoni email-in! <br>";
        errors=true;
    }
    if(paswordi==""){
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