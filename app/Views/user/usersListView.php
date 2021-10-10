
<main>
    <table>
        <tr>
            <th>ID</th>
            <th>Brukernavn</th>
            <th>Passord</th>
        </tr>
        <?php
        foreach ($users as $row){
        ?>
        <tr>
            <th><?php echo $row['id']; ?></th>
            <th><?php echo $row['bruker_navn']; ?></th>
            <th><?php echo $row['bruker_passord']; ?></th>
        </tr>
        <?php
        }
 ?>
    </table>
</main>

