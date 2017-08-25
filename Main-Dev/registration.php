
    <h1>Registration</h2>

    <form id="registration" name="registration" method="post" action="admin/wbpl_add-edit.php?action=insert_registration">
        <table>
            <tr>
                <td>Name</td>
                <td></td>
                <td></td>
                <td>
                    <input type="text" name="name_user" id="name_user" style="width:187px;"></input>
                </td>
                <td class="mustbe">
                    <?php
                    if (isset($_GET['err'])) {
                        if ($_GET['err'] == 1) {
                            echo "Name must be filled.";
                        }else if ($_GET['err'] == 2) {
                            echo "Only alphabet letters.";
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Username</td>
                <td></td>
                <td></td>
                <td><input type="text" name="username_user" id="username_user" style="width:187px;"></input></td>
                <td class="mustbe">
                    <?php
                    if (isset($_GET['err'])) {
                        if ($_GET['err'] == 3) {
                            echo "Username must be filled.";
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Password</td>
                <td></td>
                <td></td>
                <td><input type="text" name="pass_user" id="pass_user" style="width:187px;"></input></td>
                <td class="mustbe">
                    <?php
                    if (isset($_GET['err'])) {
                        if ($_GET['err'] == 4) {
                            echo "Password must be filled.";
                        }else if ($_GET['err'] == 41) {
                            echo "Password must be filled more than 5 characters..";
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Confirm Password</td>
                <td></td>
                <td></td>
                <td><input type="text" name="cpass_user" id="cpass_user" style="width:187px;"></input></td>
                <td class="mustbe">
                    <?php
                    if (isset($_GET['err'])) {
                        if ($_GET['err'] == 5) {
                            echo "Confirm password must be filled.";
                        }else if ($_GET['err'] == 51) {
                            echo "Match with password.";
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Gender</td>
                <td></td>
                <td></td>
                <td>
                    <input type="radio" name="gender_user" id="gender_user_male" value="Male">Male</input>
                    <input type="radio" name="gender_user" id="gender_female" value="Female">Female</input>
                </td>
                <td class="mustbe">
                    <?php
                    if (isset($_GET['err'])) {
                        if ($_GET['err'] == 6) {
                            echo "Gender must be choosen.";
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Address</td>
                <td></td>
                <td></td>
                <td><textarea name="address_user" id="address_user"></textarea></td>
                <td class="mustbe">
                    <?php
                    if (isset($_GET['err'])) {
                        if ($_GET['err'] == 7) {
                            echo "Address must be filled.";
                        }else if ($_GET['err'] == 71) {
                            echo "Must be contain “street” word.";
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Phone</td>
                <td></td>
                <td></td>
                <td><input type="text" name="phone_user" id="phone_user" style="width:187px;"></input></td>
                <td class="mustbe">
                    <?php
                    if (isset($_GET['err'])) {
                        if ($_GET['err'] == 8) {
                            echo "Phone must be filled.";
                        }else if ($_GET['err'] == 81) {
                            echo "Must be contain only numbers.";
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>E-Mail</td>
                <td></td>
                <td></td>
                <td><input type="text" name="email_user" id="email_user" style="width:187px;"></input></td>
                <td class="mustbe">
                    <?php
                    if (isset($_GET['err'])) {
                        if ($_GET['err'] == 9) {
                            echo "E-Mail must be filled.";
                        }else if ($_GET['err'] == 91) {
                            echo "Must be contain match with email format.";
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><input class="btn btn-primary" type="submit" name="register_user" value="Register" /></td>
            </tr>

            <tr>
                <td align=right colspan='4'>
                    <?php
                    if (isset($_GET['status'])) {
                        if ($_GET['status'] == 0) {
                            echo "Registrasi berhasil";
                        } else {
                            echo "Registrasi gagal";
                        }
                    }
                    ?>
                </td>
            </tr>
        </table>
    </form>
