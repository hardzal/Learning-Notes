<?php
require_once './head.php';
require_once './header.php';
?>
    <div class='row'>
        <div class='col-md-8'>
            <?php
                if(isset($_POST['submit'])) {
                    if($crud->checkNumber($_POST['nik'])) {
                        $data['nik'] = $crud->validate($_POST['nik']);
                        $data['nama'] = $crud->validate($_POST['nama']);
                        if($crud->update($data)) {
                            echo "<script>";
                            echo "alert('Berhasil memperbaharui data!');";
                            echo "window.location.href = 'index.php?action=update'</script>";
                        }
                    } else {
                        echo "<div class='alert alert-warning'>NIK tidak memenuhi syarat!</div>";
                    }
                }
                if(!$crud->checkId()) {
                 
                    echo "<script>";
                    echo "alert('Tidak ada id ditemukan');";
                    echo "window.location.replace = 'index.php';";
                    echo "</script>";
                    exit;
                }
                $id = $crud->validate($_GET['id']);
                $data = $crud->showById($id);
            ?>
            <form method='POST' action=''>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" readonly name='nik' value="<?=$data['nik'];?>" autocomplete="off" required/>
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name='nama' class="form-control" id="name" value="<?=$data['nama'];?>" autocomplete='off' required/>
                </div>
                <input type='submit' class='btn btn-primary' name='submit'/>
            </form>
        </div>
    </div>
<?php
require_once './footer.php';
?>