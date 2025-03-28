<main class="w-full main-content">
    <?php
    if(isset($_GET['action']) && $_GET['query']){
        $page = $_GET['action'];
        $query = $_GET['query'];
    }else{
        $page = '';
        $query = '';
    }
    if ($page === 'trangchu') {
        include 'modules/quanlikhoahoc/lietke.php';
    } elseif ($page === 'quanlikhoahoc'/*menu*/  && $query === 'them') {
        include 'modules/quanlikhoahoc/them.php';
        include 'modules/quanlikhoahoc/lietke.php';
    } elseif ($page === 'quanlikhoahoc' && $query === 'sua') {
        include 'modules/quanlikhoahoc/sua.php';
    } elseif ($page == 'quanlidangkyhocphan' && $query == 'them'){
        include 'modules/quanlidangkyhocphan/them.php';
        include 'modules/quanlidangkyhocphan/lietke.php';
    } elseif ($page == 'quanlidangkyhocphan' && $query == 'sua'){
        include 'modules/quanlidangkyhocphan/sua.php';
    } elseif ($page == 'quanlidiem' && $query == 'them'){
        include 'modules/quanlidiem/them.php';
        include 'modules/quanlidiem/lietke.php';
    } elseif ($page == 'quanlidiem' && $query == 'sua'){
        include 'modules/quanlidiem/sua.php';
    } elseif ($page == 'quanlihocsinh' && $query == 'them'){
        include 'modules/quanlihocsinh/them.php';
        include 'modules/quanlihocsinh/lietke.php';
    } elseif ($page == 'quanlihocsinh' && $query == 'sua'){
        include 'modules/quanlihocsinh/sua.php';
    } elseif ($page == 'tailieuhoctap' && $query == 'them'){
        include 'modules/tailieuhoctap/them.php';
        include 'modules/tailieuhoctap/lietke.php';
    } elseif ($page == 'tailieuhoctap' && $query == 'sua'){
        include 'modules/tailieuhoctap/sua.php';
    }
    else {
        include 'modules/quanlikhoahoc/lietke.php';
    }
    ?>
</main>