<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php if (isset($validation)) { ?>
        <div class="alert alert-warning">
            <?= $validation->listErrors() ?>
        </div>
    <?php }; ?>
    <form action="<?= base_url("MemberController/addMember") ?>" method="post">
        <table>
            <h3>Registrer ett nytt medlem</h3>
            <tr>
                <th>Epost*:</th>
                <td><input type="email" name="epost" value="<?php if (isset($_POST["epost"])) {
                                                                echo $_POST["epost"];
                                                            } ?> " required></td>
            </tr>
            <tr>
                <th>Fornavn*:</th>
                <td><input type="text" name="fname" value="<?php if (isset($_POST["fname"])) {
                                                                echo $_POST["fname"];
                                                            } ?>" required></td>
            </tr>
            <tr>
                <th>Etternavn*:</th>
                <td><input type="text" name="lname" value="<?php if (isset($_POST["lname"])) {
                                                                echo $_POST["lname"];
                                                            } ?>" required></td>
            </tr>
            <tr>
                <th>Adresse*:</th>
                <td><input type="text" name="address" value="<?php if (isset($_POST["address"])) {
                                                                    echo $_POST["address"];
                                                                } ?>" required></td>
            </tr>
            <tr>
                <th>Postnr*:</th>
                <td><input type="number" name="post_code" value="<?php if (isset($_POST["post_code"])) {
                                                                        echo $_POST["post_code"];
                                                                    } ?>" required></td>
            </tr>
            <tr>
                <th>Poststed:</th>
                <td><input type="text" name="post_area" value="<?php if (isset($_POST["post_area"])) {
                                                                    echo $_POST["post_area"];
                                                                } ?>" required></td>
            </tr>
            <tr>
                <th>Mobilnr*:</th>
                <td><input type="number" name="mobilenr" value="<?php if (isset($_POST["mobilenr"])) {
                                                                    echo $_POST["mobilenr"];
                                                                } ?>" required></td>
            </tr>
            <tr>
                <th>Fødselsdato*:</th>
                <td><input type="date" name="dob" value="<?php if (isset($_POST["dob"])) {
                                                                echo $_POST["dob"];
                                                            } ?>" required></td>
            </tr>
            <tr>
                <th>Kjønn</th>
                <td><select name="gender">
                        </optgroup>
                        <optgroup label="Nå værende">
                            <option value="<?php ?>"><?= isset($_POST["gender"]) ? $_POST["gender"] : "Velg" ?></option>
                        </optgroup>
                        <optgroup label="Kjønn">
                            <option value="Mann">Mann</option>
                            <option value="Dame">Dame</option>
                            <option value="Øsnker ikke å oppgi">Øsnker ikke å oppgi</option>
                    </select></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Opprett medlem">
    </form>
</body>

</html>