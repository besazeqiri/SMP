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
            
            <section id="projects">
                <h4>Projektet e fundit</h4>
                <?php
                    $projektet=merrProjektet();
                    //$pi=0;
                    while ($projekti=mysqli_fetch_assoc($projektet)) {
                        $projektiid=$projekti['projektiid'];
                        $emri=$projekti['emri'];
                        $pershkrimi=$projekti['pershkrimi'];
                        echo "<article class='pitem'>";
                        echo "<img src='images/pitem{$projektiid}.png' alt='Projekti i pare'>";
                        echo "<h4>{$emri}</h4>";
                        if(strlen($pershkrimi)>300){
                            $pershkrimi=substr($pershkrimi,0,300) . "...";
                        }
                        echo "<p>{$pershkrimi}</p>";
                        echo "<a href='projekt.php?projektiid={$projektiid}'>me shume --&gt;&gt;</a>";
                        echo "</article>";
                        //$pi++;
                        if($projektiid==3) break;
                    }
                ?>
            </section>
            <table id="members">    
                <tr><th>Emri dhe Mbiemri</th><th>Telefoni</th><th>Email</th></tr>
                <?php                    
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
                            echo "</tr>";
                            if($i>5)break;
                         }
                    }else{
                        echo "Nuk ka shenime ne DB";
                    }
                
                ?>
            </table>
                        
        </section>
        <?php include "inc/sidebar.php";?>
    </main>
    <?php include "inc/footer.php";?>
