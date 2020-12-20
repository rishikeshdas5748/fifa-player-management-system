<?php


function formTemplate($results, $headers, $header2){
    ?>
    <div class="row justify-content-center">
        <form action="" method="POST" id = "editForm">
            <div class="form-group">
                <label>PlayerID</label>

                <select name="Player_ID" id="player_id"  class="form-control">
                <?php
                while ($row = mysqli_fetch_assoc($results)):
                    echo "<script>console.log('Debug Out:$row')</script>";
                    ?>

                    <option value=<?php echo $row["Player_ID"] ?>><?php echo $row["Player_ID"] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <?php
            // while(mysqli_fetch_assoc($results)):
                $i= 0;
                while($i<sizeof($headers)){

            ?>

                <div class="form-group">
                    <label><? echo $headers[$i] ?></label>
                    <input type="<?php echo $header2[$i] ?>" name="<?php echo $headers[$i] ?>" class="form-control"
                     placeholder="Enter the <?php echo $headers[$i] ?>" >
                </div>


    <?php
        $i = $i+1;
                 } ?>
                    <button type="submit" class="btn btn-primary" name="insert">INSERT</button>



            </form>
            </div>

       <?php
       }
       ?>
