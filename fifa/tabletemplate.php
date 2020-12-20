<?php
// table($result, ["Player_ID", "Acceleration", "Balance",..])

function tableTemplate($results, $headers){
    ?>
        <div class= "row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                <?php
                $i = 0;
                while($i<sizeof($headers)){
                    echo "<th>$headers[$i]</th>";
                    $i = $i+1;
                }
                echo "<th>Action</th>"
                ?>
                </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($results)):
                echo "<tr>";
                    $i = 0;
                    while($i<sizeof($headers)){
                        $temp = $row[$headers[$i]];
                        echo "<td>$temp</td>";
                        $i = $i+1;
                    }?>
                   <td>
                      <a href="crud.php?edit=<?php echo $row['Player_ID'] ?>&table=1;"
                        class="btn btn-info">EDIT</a>

                        <a href="process.php?delete=<?php echo $row['Player_ID'] ?>&table=1;"
                          class="btn btn-danger">DELETE</a>

                  </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
  <?php
    }
?>