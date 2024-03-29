<?php
session_start();
$dbconn;
dbconn();
function dbconn(){
    global $dbconn;
    $dbconn=mysqli_connect("localhost","root","","smp");
    if(!$dbconn){
        die("Deshtoi te lidhet me DB" . mysqli_error($dbconn));
    }
}

function Login($email,$password){
    global $dbconn;
    $sql="SELECT antariid,emri, mbiemri, telefoni, email,fjalekalimi,roli FROM antaret WHERE ";
    $sql.=" email='$email' AND fjalekalimi='$password'";
    $res=mysqli_query($dbconn,$sql);
    $userdata=mysqli_fetch_assoc($res);
    $anetari=array();
    $anetari['antariid']=$userdata['antariid'];
    $anetari['emrimbiemri']=$userdata['emri'] . " " . $userdata['mbiemri'];
    $anetari['roli']=$userdata['roli'];
    $_SESSION['anetari']=$anetari;
    header("location: punet.php");
}


/** Funksionet per Anetaret */
function merrAnetaret(){
    global $dbconn;
    $sql="SELECT antariid,emri, mbiemri, telefoni, email FROM antaret";
    return mysqli_query($dbconn,$sql); 
}
function merrAnetar($antariid){
    global $dbconn;
    $sql="SELECT antariid,emri, mbiemri, telefoni, email,fjalekalimi FROM antaret WHERE antariid=$antariid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);

}
function shtoAnetar($emri, $mbiemri, $telefoni, $email,$fjalekalimi){
    global $dbconn;
    $sql="INSERT INTO antaret(emri, mbiemri, telefoni, email,fjalekalimi) VALUES ";
    $sql.= "('$emri', '$mbiemri', '$telefoni', '$email','$fjalekalimi')";
    $result=mysqli_query($dbconn,$sql);
    if($result){
        $_SESSION['message']="Anetari u shtua me sukses";
        header("location: anetaret.php");
    }else{
        die ("Anetari deshtoi te shtohet " . mysqli_error($dbconn));
    }
}
function modifikoAnetar($antariid,$emri, $mbiemri, $telefoni, $email,$fjalekalimi){
    global $dbconn;
    $sql="UPDATE antaret SET emri='$emri',mbiemri='$mbiemri', telefoni='$telefoni',";
    $sql.=" email='$email',fjalekalimi='$fjalekalimi' WHERE antariid=$antariid";
    $result=mysqli_query($dbconn,$sql);
    if($result){
        $_SESSION['message']="Anetari u modifikua me sukses";
        header("location: anetaret.php");
    }else{
        die ("Anetari deshtoi te modifikohet " . mysqli_error($dbconn));
    }
}
function fshijAnetar($antariid){
    global $dbconn;
    $sql="DELETE FROM antaret WHERE antariid=$antariid";
    $result=mysqli_query($dbconn,$sql);
    if($result){
        $_SESSION['message']="Anetari u fshi me sukses";
        header("location: anetaret.php");
    }else{
        die ("Anetari deshtoi te fshihet " . mysqli_error($dbconn));
    }
}

/** Funksionet per Projektet */
function merrProjektet(){
    global $dbconn;
    $sql="SELECT projektiid, emri, pershkrimi, datafillimit, datambarimit FROM projektet ORDER BY projektiid desc ";
    return mysqli_query($dbconn,$sql); 
}

function merrProjekt($projektiid){
    global $dbconn;
    $sql="SELECT projektiid,emri, pershkrimi, datafillimit, datambarimit FROM projektet WHERE projektiid=$projektiid ";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);
}
function shtoProjekt($emri, $pershkrimi, $datafillimit, $datambarimit,){
    global $dbconn;
    $sql="INSERT INTO projektet(emri, pershkrimi, datafillimit, datambarimit) VALUES ";
    $sql.= "('$emri', '$pershkrimi', '$datafillimit', '$datambarimit')";
    $result=mysqli_query($dbconn,$sql);
    if($result){
        $_SESSION['message']="Projekti u shtua me sukses";
        header("location: projektet.php");
    }else{
        die ("Projekti deshtoi te shtohet " . mysqli_error($dbconn));
    }
}

function modifikoProjekt($projektiid,$emri, $pershkrimi, $datafillimit, $datambarimit){
    global $dbconn;
    $sql="UPDATE projektet SET emri='$emri',pershkrimi='$pershkrimi', datafillimit='$datafillimit',";
    $sql.=" datambarimit='$datambarimit' WHERE projektiid=$projektiid";
    $result=mysqli_query($dbconn,$sql);
    if($result){
        $_SESSION['message']="Projekti u modifikua me sukses";
        header("location: projektet.php");
    }else{
        die ("Projekti deshtoi te modifikohet " . mysqli_error($dbconn));
    }
}


function fshijProjekt($projektiid){
    global $dbconn;
    $sql="DELETE FROM projektet WHERE projektiid=$projektiid";
    $result=mysqli_query($dbconn,$sql);
    if($result){
        $_SESSION['message']="Projekti u fshij me sukses";
        header("location: projektet.php");
    }else{
        die ("Projekti deshtoi te fshihet " . mysqli_error($dbconn));
    }
}


/** Funksionet per Punet */
function merrPunet(){
    global $dbconn;
    $sql="SELECT p.punaid, p.projektiid,pr.emri,p.data, p.pershkrimi FROM punet p ";
    $sql.="INNER JOIN projektet pr ON p.projektiid=pr.projektiid";
   /* $antariid=$_SESSION['anetari']['antariid'];
    if($_SESSION['anetari']['roli']!=1){
        $sql.= " WHERE p.antariid = $antariid";
    }*/
    return mysqli_query($dbconn,$sql); 
}
function merrPune($punaid){
    global $dbconn;
    $sql="SELECT p.punaid, p.projektiid,pr.emri,p.data, p.pershkrimi FROM punet p ";
    $sql.="INNER JOIN projektet pr ON p.projektiid=pr.projektiid WHERE p.punaid=$punaid";
    $puna=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($puna); 
}
function shtoPune($antariid, $projektiid, $data , $pershkrimi){
    global $dbconn;
    $sql="INSERT INTO punet(antariid, projektiid, data, pershkrimi) VALUES ";
    $sql.= "('$antariid', '$projektiid', '$data', '$pershkrimi')";
    $result=mysqli_query($dbconn,$sql);
    if($result){
        $_SESSION['message']="Puna u shtua me sukses";
        header("location: punet.php");
    }else{
        die ("Puna deshtoi te shtohet " . mysqli_error($dbconn));
    }
}

function modifikoPune($punaid,$antariid, $projektiid, $data , $pershkrimi){
    global $dbconn;
    $sql="UPDATE punet SET antariid='$antariid',projektiid='$projektiid', data='$data',";
    $sql.=" pershkrimi='$pershkrimi' WHERE punaid=$punaid";
    $result=mysqli_query($dbconn,$sql);
    if($result){
        $_SESSION['message']="Puna u modifiku me sukses";
        header("location: punet.php");
    }else{
        die ("Puna deshtoi te modifikohet " . mysqli_error($dbconn));
    }
}

function fshijPune($punaid){
    global $dbconn;
    $sql="DELETE FROM punet WHERE punaid=$punaid";
    $result=mysqli_query($dbconn,$sql);
    if($result){
        $_SESSION['message']="Puna u fshi me sukses";
        header("location: punet.php");
    }else{
        die ("Puna deshtoi te fshihet " . mysqli_error($dbconn));
    }
}

?>