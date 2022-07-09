<!DOCTYPE html>
<html>
    <body>
        <div align="center">
            <form action="<?php echo base_url() . "index.php/managemytasks/payingtask" ?>" method="post" enctype="multipart/form-data">
            <h1>COMMIT PAYMENT</h1>
                <table>
                    <tr>
                        <td>Receipt of Transaction</td>
                        <td>:</td>
                        <td><input type="file" id="buktitransaksi" name="buktitransaksi" width="20" /></td>
                    </tr>
                </table>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>