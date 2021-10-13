
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
            <th><?php echo $row['username']; ?></th>
            <th><?php echo $row['password']; ?></th>
        </tr>
        <?php
        }
 ?>
    </table>
</main>
