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
            
            <div id="message"><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?></div>
            <table id="members">    
                <tr><th>Projekti</th><th>Data</th><th>Pershkrimi</th> <th>Edit</th> <th>Delete</th></tr>
                <?php
                    
                    //mysqli_select_db();
                    $punet=merrPunet();
                    if(mysqli_num_rows($punet)>0){
                        $i=0;
                        while ($puna=mysqli_fetch_assoc($punet)) {
                            //print_r($antari);echo "<br>";
                            if($i % 2==0){
                                echo "<tr>";
                            }else{
                                echo "<tr class='alt'>";
                            }
                            $punaid=$puna['punaid'];
                            $i++;
                            echo "<td>" . $puna['emri'] . "</td>";
                            echo "<td>". $puna['data'] ."</td>";
                            echo "<td>". $puna['pershkrimi'] ."</td>";
                            echo "<td><a href='modifiko_pune.php?punaid={$punaid}'> Edit</a> </td>";
                            echo "<td><a href='fshij_pune.php?punaid={$punaid}'> Delete</a> </td>";
                            echo "</tr>";
                        }
                    }else{
                        echo "Nuk ka shenime ne DB";
                    }
                
                ?>
                <tr><th>Projekti</th><th>Data</th><th>Pershkrimi</th> <th colspan="2"><a href="shto_pune.php">Shto</a></th></tr>
            </table>
                        
        </section>
      
    </main>
    <?php include "inc/footer.php";?>
