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


            <table id="members">    
                <tr><th>Emri </th><th>Pershkrimi</th><th>Data e fillimit</th> <th>Data e mbarimit</th> <th>Edit</th> <th> Delete</th></tr>
              <?php
                //mysqli_select_db();
                    $projektet=merrProjektet();
                    if(mysqli_num_rows($projektet)>0){
                     
                        while ($projekti=mysqli_fetch_assoc($projektet)) {
                            //print_r($projekti);echo "<br>";
                            
                                echo "<tr>";
                            
                            
                            $projektiid=$projekti['projektiid'];
                        
                            echo "<td>" . $projekti['emri']."</td>";
                            echo "<td>". $projekti['pershkrimi'] ."</td>";
                            echo "<td>". $projekti['datafillimit'] ."</td>";
                            echo "<td>". $projekti['datambarimit'] ."</td>";
                            echo "<td><a href='modifiko_projekt.php?pid={$projektiid}'> Edit</a> </td>";
                            echo "<td><a href='fshij_projekt.php?pid={$projektiid}'> Delete</a> </td>";
                            echo "</tr>";
                        }
                    }else{
                        echo "Nuk ka shenime ne DB";
                    }
                
                ?>
            <tr><th>Emri</th><th>Pershkrimi</th><th>Data e fillimit</th><th>Data e mbarimit</th> <th colspan="2"><a href="shto_projekt.php">Shto</a></th></tr>
            </table>
        </section>
    </main>
    <?php include "inc/footer.php";?>