<!DOCTYPE html>
<html>

    <body>
        
        <h1>Reject Task</h1>>
        <form>   
            <h4><center> BIODATA </h4>
                <table  align= center border="1">
                    <tr>
                        <td style=background-color:orange> Name</td> 
                        <td>Melati Angel Santini</td>
                    </tr>
                    <tr>
                        <td style=background-color:orange> Education </td>
                        <td> S1 Sastra Sejarah UGM 2008 </td>
                    </tr>
                    <tr>
                        <td style=background-color:orange>Competence of reviewers in the field </td>
                        <td> Teknologi, Pendidikan, dan Kesehatan </td>
                    </tr>
                    <tr>
                        <td style=background-color:orange>  Profession </td>
                        <td>Has been a reviewer for 3 years</td>
                    </tr>
                    <tr>
                        <td style=background-color:orange> Publication </td>
                        <td> Thesis, Jurnal, Scientific Article </td>
                    </tr>
                </table>
                <p>
                    <view> Editor: Ida Kusuma</view>
                </p>
                <p>
                    <view>Article Title : SENGKETA DUMPING ANTAR NEGARA SUATU TINJAUAN HUKUM PERDAGANGAN INTERNASIONAL</view>
                </p>
                <p>
                        <label>Article field: </label>
                        <select>
                            <option value="law">Law</option>
                        </select>
                </p>
                <p>
                        <label>Accept or Reject : </label>
                        <select>
                            <option value="Reject">Reject</option>
                        </select>
                </p>
                <p>
                        <label> Reject : </label>
                        <input type="text" name="judul">
                </p>
        </form>
            <table border="1">
                <tr style=background-color:orange>
                    <td>List Reject Task </td>
                </tr>
                <tr>
                    <td>SENGKETA DUMPING ANTAR NEGARA SUATU TINJAUAN HUKUM PERDAGANGAN INTERNASIONAL</td>
                </tr>
                <tr>
                    <td>Kualitas Pelayanan Administrasi di Kantor Urusan Agama SIM Satlantas Kabupaten Wonogiri</td>
                </tr>
            </table>
        <form>
            <p>
                <label> Scoring editor perfomance </label>
                <div class="rating">
                    <input type="radio" name="star" id="star1"><label for="star1"></label>
                    <input type="radio" name="star" id="star2"><label for="star2"></label>
                    <input type="radio" name="star" id="star3"><label for="star3"></label>
                    <input type="radio" name="star" id="star4"><label for="star4"></label>
                    <input type="radio" name="star" id="star5"><label for="star5"></label>
                </div>
            </p>
            <p>
                <input type="submit" name="submit" value="Submit"/>
            </p>
        </form>
        </body>
 
</html>