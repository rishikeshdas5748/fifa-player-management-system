<?php
function editForm($id, $headers, $values, $headerTypes, $tablenum){
    ?>
    <div class="row justify-content-center">
        <form action="edit_process.php" method="POST" id = "editForm">
                <input type="hidden" name="tablenum" value="<?php echo $tablenum; ?>"/>
                <input type="hidden" name="Player_iD" value="<?php echo $id; ?>"/>
            <div class="form-group">
                <label>PlayerID</label>
                <input name="Player_ID" class="form-control" disabled="true" value= <?php echo $id ?>>
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
            <button type="submit" class="btn btn-info" name="edit">SAVE</button>
        </form>
    </div>
<?php
}
?>