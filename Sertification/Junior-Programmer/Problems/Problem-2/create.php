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
                        if($crud->create($data)) {
                            echo "<script>";
                            echo "alert('Berhasil menambahkan data!');";
                            echo "window.location.href = 'index.php?action=create'</script>";
                        }
                    } else {
                        echo "<div class='alert alert-warning'>NIK tidak memenuhi syarat!</div>";
                    }
                }
            ?>
            <form method='POST' action=''>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik"  name='nik' placeholder="Enter NIK" autocomplete="off" required/>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name='nama' class="form-control" id="nama" placeholder="Enter Nama" autocomplete='off' required/>
                </div>
                <input type='submit' class='btn btn-primary' name='submit'/>
            </form>
        </div>
    </div>
<?php
require_once './footer.php';
?>