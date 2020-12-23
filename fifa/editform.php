<?php
function editForm($id, $headers, $values, $headerTypes){
    ?>
    <div class="row justify-content-center">
        <form action="" method="POST" id = "editForm">
            <div class="form-group">
                <label>PlayerID</label>
                <input name="Player_ID" id="player_id"  class="form-control" disabled="true" value= <?php echo $id ?>>
            </div>
            <?php
            // while(mysqli_fetch_assoc($id)):
                $i= 0;
                while($i<sizeof($headers)){
            ?>
                <div class="form-group">
                    <label><?php echo $headers[$i] ?></label>
                    <input type="<?php echo $headerTypes[$i] ?>" value="<?php echo $values[$i] ?>" name="<?php echo $headers[$i] ?>" class="form-control"
                     placeholder="Enter the <?php echo $headers[$i] ?>" >
                </div>
            <?php
                $i = $i+1;
                } ?>
            <button type="submit" class="btn btn-info" name="edit">EDIT</button>
        </form>
    </div>
<?php
}
?>