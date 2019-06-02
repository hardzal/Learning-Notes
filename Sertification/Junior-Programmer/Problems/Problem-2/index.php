<?php
require_once './head.php';
require_once './header.php';
?>
        <div class='row'>
            <div class='col-md-8'>
                <div class='form-group'>
                    <form method='GET' action='search.php' class='form-inline'>
                        <input type='search' name='q' class='form-control mr-sm-2' aria-label="Search" placeholder='Cari..'/>
                        <input type='submit' name='submit' value='Cari' class='btn btn-primary'/>
                    </form>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-8'>                
            <a href='create.php' class='btn btn-primary'>Create Data</a>
                <?php
                    $act = isset($_GET['action']) ? $_GET['action'] : "";
                    if(!empty($act)) {
                        if($act == 'delete') {
                            echo "<div class='alert alert-danger'>Sukses menghapus data!</div>";
                        } else if($act == 'update') {
                            echo "<div class='alert alert-primary'>Sukses memperbaharui data!</div>";
                        } else if($act == 'create') {
                            echo "<div class='alert alert-success'>Sukses menambahkan data!</div>";
                        }
                    }
                    if($crud->checkRow("SELECT * FROM karyawan") > 0) {
                ?>
                    <div class='table-responsive'>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th colspan='2' class='text-center'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach($crud->showAll() as $data) {
                            ?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$data['nik'];?></td>
                                    <td><?=$data['nama'];?></td>
                                    <td><a href='edit.php?id=<?=$data['id'];?>' class='btn btn-info'>Edit</a></td>
                                    <td><a href='delete.php?id=<?=$data['id'];?>' class='btn btn-danger' onclick="return confirm('apakah kamu yakin ingin menghapusnya?');">Delete</a></td>
                                </tr>
                                <?php $no++;} ?>
                        </tbody>
                    </table>
                    </div>
                <?php
                    } else {
                        echo "<p>Belum tersedia data!</p>";
                    }
                ?>
            </div>
        </div>
<?php
require_once './footer.php';
?>
