<?php
    require_once './head.php';
    require_once './header.php';

    $crud = new Crud($conn);
    echo "<script type='text/javascript'>";
    if(!$crud->checkId()) {
        echo "alert('Tidak ada id ditemukan');";
        echo "window.location.replace('index.php');";
    } else {
        $id = filter_var($crud->validate($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
        
        if($crud->delete($id)) {
            echo "alert('Berhasil menghapus data!');";
            echo "window.location.replace('index.php?action=delete');";
        }
    }
    echo "</script>";
    require_once './footer.php';
?>