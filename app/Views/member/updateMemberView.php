<main>
    <a href="<?= base_url("/listMembers") ?>">Tilbake</a>

    <form action="<?= base_url("/update/".$id) ?>" method="post">
        <table>
            <h3>Registrer ett nytt medlem</h3>
            <tr>
                <th>Epost*:</th>
                <td><input type="email" name="epost" value="<?= $member['email'] ?> " required></td>
            </tr>
            <tr>
                <th>Fornavn*:</th>
                <td><input type="text" name="fname" value="<?= $member['fname'] ?>" required></td>
            </tr>
            <tr>
                <th>Etternavn*:</th>
                <td><input type="text" name="lname" value="<?= $member['lname'] ?>" required></td>
            </tr>
            <tr>
                <th>Adresse*:</th>
                <td><input type="text" name="address" value="<?= $member['street_name'] ?>" required></td>
            </tr>
            <tr>
                <th>Postnr*:</th>
                <td><input type="number" name="post_code" value="<?= $member['post_code'] ?>" required></td>
            </tr>
            <tr>
                <th>Poststed:</th>
                <td><input type="text" name="post_area" value="<?= $member['post_area'] ?>" required></td>
            </tr>
            <tr>
                <th>Mobilnr*:</th>
                <td><input type="number" name="mobile_nr" value="<?= $member['mobile_nr'] ?>" required></td>
            </tr>
            <tr>
                <th>Fødselsdato*:</th>
                <td><input type="date" name="dob" value="<?= $member['dob'] ?>" required></td>
            </tr>
            <tr>
                <th>Kjønn</th>
                <td><select name="gender">
                        <optgroup label="Nå værende">
                            <option value="<?= $member['gender'] ?>"><?= $member['gender'] ?></option>
                        </optgroup>
                        <optgroup label="Kjønn">
                            <option value="Mann">Mann</option>
                            <option value="Dame">Dame</option>
                            <option value="Øsnker ikke å oppgi">Øsnker ikke å oppgi</option>
                        </optgroup>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Oppdater">
    </form>
</main>