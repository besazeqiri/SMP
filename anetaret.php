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
                <tr><th>Emri dhe Mbiemri</th><th>Telefoni</th><th>Email</th> <th>Edit</th> <th>Delete</th></tr>
                <?php
                    
                    //mysqli_select_db();
                    $anetaret=merrAnetaret();
                    if(mysqli_num_rows($anetaret)>0){
                        $i=0;
                        while ($antari=mysqli_fetch_assoc($anetaret)) {
                            //print_r($antari);echo "<br>";
                            if($i % 2==0){
                                echo "<tr>";
                            }else{
                                echo "<tr class='alt'>";
                            }
                            $antariid=$antari['antariid'];
                            $i++;
                            echo "<td>" . $antari['emri']. " " . $antari['mbiemri'] . "</td>";
                            echo "<td>". $antari['telefoni'] ."</td>";
                            echo "<td>". $antari['email'] ."</td>";
                            echo "<td><a href='modifiko_anetar.php?aid={$antariid}'> Edit</a> </td>";
                            echo "<td><a href='fshij_anetar.php?aid={$antariid}'> Delete</a> </td>";
                            echo "</tr>";
                        }
                    }else{
                        echo "Nuk ka shenime ne DB";
                    }
                
                ?>
                <tr><th>Emri dhe Mbiemri</th><th>Telefoni</th><th>Email</th> <th colspan="2"><a href="shto_anetar.php">Shto</a></th></tr>
            </table>
                        
        </section>
        
    </main>
    <?php include "inc/footer.php";?>
