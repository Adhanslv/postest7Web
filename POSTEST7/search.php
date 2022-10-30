<?php
$dbh=new PDO("mysql:host=localhost;dbname=sepeda","root","");
if(isset($_POST['cari'])){
        $pencarian="%".$_POST['kata']."%";
        try{
            $cari=$dbh->prepare("select * from tb_user where id like :nama");
            $cari->BindParam(":nama",$pencarian, PDO::PARAM_STR);
            $cari->execute();
            if($cari->rowCount()<1){
                echo "<i> Tidak ada hasil untuk pencarian kata <b>\"".$_POST['kata']."\"</i></b>";
            }else{
                while($t=$cari->fetch()){
                ?>
    <form method="POST" class="cari" action="search.php">
        <input type="text" placeholder="Cari Nama Barang" name="kata">
        <button type="submit" name="cari"><i class="fa fa-search" class="cari"></i></button>
    </form>

<div class="box">   
    <table class="table" border="1" align="center">
        <tr>
            <th>ID</th>
            <th>Gambar</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <tr>
            <td><?php echo $t ['id']?></td>
            <td><img src="tampilan/<?=$t['gambar']?>" alt="status-gambar" width="100px"></td>
            <td><?php echo $t ['username']?></td>
            <td><?php echo $t ['psw']?></td>
            <td><?php echo $t ['email']?></td>
            <td>
                <button><a href="ubah.php?id=<?php echo $t ['id']?>=<?php echo $t['id']?>"
                    onclick="return confirm('Apakah Anda Ingin MengUbah Data ini')"><i class="fa fa-pencil"></i></button></a>
                -
                <button><a href="hapus.php?id=<?php echo $data ['id']?>=<?php echo $t['id']?>"
                    onclick="return confirm('Apakah Anda Ingin MengHapus Data ini')"><i class="fa fa-trash"></i></button></a>
            </td>
        </tr>
    </table>
</div>
<?php
                }
            }   
        }catch(PDOException $e){
            echo $e->getMessage();
        }
}
?>
</div>