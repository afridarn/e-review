<!DOCTYPE html>
<html>
    <body>
        <div align="center">
            <form action="<?php echo base_url() . "index.php/managemytasks/addingtask" ?>" method="post" enctype="multipart/form-data">
            <h1>Add New Task</h1>
            <h3>Please fill the following data for article submission : </h3>
                <table>
                    <tr>
                        <td>Title</td>
                        <td>: </td>
                        <td><input type="text" id="judul" name="judul" width="100" /></td>
                    </tr>
                    <tr>
                        <td>Keywords</td>
                        <td>: </td>
                        <td><input type="text" id="katakunci" name="katakunci" width="100" /></td>
                    </tr>
                    <tr>
                        <td>Authors</td>
                        <td>: </td>
                        <td><input type="text" id="authors" name="authors" width="100" /></td>
                    </tr>
                    <tr>
                        <td>Article Field</td>
                        <td>: </td>
                        <td><input type="text" id="bidangilmu" name="bidangilmu" width="100" /></td>
                    </tr>
                    <tr>
                        <td>Word Count</td>
                        <td>: </td>
                        <td><input type="number" id="jumlahkata" name="jumlahkata" width="100" /></td>
                    </tr>
                    <tr>
                        <td>Reviewer's User ID</td>
                        <td>: </td>
                        <td><input type="number" id="iduserreviewer" name="iduserreviewer" width="100" /></td>
                    </tr>
                    <tr>
                        <td>Deadline Date</td>
                        <td>: </td>
                        <td><input type="date" id="deadline" name="deadline" width="100" /></td>
                    </tr>
                    <tr>
                        <td>Article Files</td>
                        <td>:</td>
                        <td><input type="file" id="userfile" name="userfile" width="20" /></td>
                    </tr>
                </table>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>