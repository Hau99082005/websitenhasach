<?php 
 include 'config/connect.php';
 session_start();

 class cart {
    public $id, $name, $image, $price, $quantity;
    function __construct($id, $name, $image, $price, $quantity) {
      $this->id = $id;
      $this->name = $name;
      $this->image = $image;
      $this->price = $price;
      $this->quantity = $quantity;

    }
}
 function _header($title) {
    $s = '
       <!DOCTYPE html>
       <html lang="en">
    <head>
    <title>'.$title.'</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="180x180" href="images/icons/android-chrome-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/icons/favicon-32x32.png">
       <link rel="icon" type="image/png" sizes="16x16" href="images/icons/favicon-16x16.png">
        <link rel="manifest" href="images/icons/site.webmanifest">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="boottrap/css/bootstrap.min.css">
    <script src="boottrap/js/bootstrap.bundle.js"></script>
    <script src="boottrap/js/bootstrap.min.js"></script>
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    </head>

    <body>
    
    ';
    echo $s;
 }
 function _footer() {
    $s = '
      <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo"><a href="index.php"><img src="images/icons/logo.png" width="150px" height="150px"></a></h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            70 Nguyễn Huệ - Phường Vĩnh Ninh - TP Huế
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:07998998755">07998998755</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:nguyenvannnhan07092005@gmail.com">nguyenvannnhan07092005@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Danh Mục</h2>
                    <ul class="list-unstyled text-light footer-link-list">';
                      $q = Database::query("SELECT * FROM `categories`");
                      while($r = $q->fetch_array()) {
                        $s .= '<li><a class="text-decoration-none" href="sanpham.php?id_category=' . $r['id'] . '">'.$r['name'].'</a></li>';
                      }
                    $s .= '</ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Thông tin thêm</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="index.php">Trang chủ</a></li>
                        <li><a class="text-decoration-none" href="gioithieu.php">Giới thiệu</a></li>
                        <li><a class="text-decoration-none" href="lienhe.php">Liên Hệ</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Địa chỉ email của bạn">
                        <div class="input-group-text btn-success text-light">Gửi</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                             &copy; 2024 Bản quyền thuộc về <a rel="sponsored" href="https://templatemo.com" target="_blank" style="text-decoration: none;">Nhân & Đức</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>
    ';
    echo $s;
 }

 function _navbar() {
    if(isset($_GET['id_product']))addtoCartProduct($_GET['id_product']);
    if(isset($_GET['clear']))unset($_SESSION['cart']);
    $s = '
        <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:nguyenvannnhan07092005@gmail.com">nguyenvannnhan07092005@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:07998998755">07998998755</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                <img src="images/icons/logo.png" alt="" width="150px" height="150px">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gioithieu.php">Giới thiệu</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="sanpham.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cửa Hàng
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                            // Thêm các danh mục từ cơ sở dữ liệu
                              $q = Database::query("SELECT * FROM `categories`");
                          while ($r = $q->fetch_array()) {
                         $s .= '<li><a class="dropdown-item" href="sanpham.php?id_category=' . $r['id'] . '">'.$r['name'].'</a></li>';
                        }
                        $s .= '</ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lienhe.php">Liên Hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="giohang.php">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">';
                                    if(!isset($_SESSION['cart'])) $s.= '0';
                                    else $s.= count($_SESSION['cart']);
                                    $s.= '</span>
                    </a>';
                    if(!isset($_SESSION['user'])) {
                    $s .= '<a class="nav-icon position-relative text-decoration-none" href="dangnhap.php">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>';  
                    }else {
                        $s .= '<i class="fa fa-user"></i><span>Chào '.splitName($_SESSION['user']['name']).'</span>
                              <a href="dangxuat.php"><i class="fa fa-sign-out"></i></a>
                        ';
                    }
                 $s .= '</div>
            </div>

        </div>
    </nav>
    ';
    echo $s;
}

 function _modal() {
    $s = '
         <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
     <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">';
     $q = Database::query("SELECT * FROM `banner`");
     while($r = $q->fetch_array()) {
     $s .= '<div class="carousel-item active" data-bs-interval="3000">
      <img src="images/'.$r['image'].'" class="d-block w-100" alt="...">
    </div>';
     }
   $s .= '</div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
    </div>
    ';
    echo $s;
 }

 function _categories() {
    $s = '
        <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Hạng mục trong tháng</h1>
            </div>
        </div>
        <div class="row">';
         $q = Database::query("SELECT * FROM `products` ORDER BY RAND() LIMIT 3");
         while($r = $q->fetch_array()) {
            $s .= '<div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="images/'.$r['image'].'" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">'.$r['name'].'</h5>
                <p class="text-center">'.$r['price'].'<sup>đ</sup></p>
                <p class="text-center"><a class="btn btn-success" href="';
                            if(!isset($_SESSION['user']))
                            $s .= 'dangnhap.php';
                         else 
                            $s .= 'sanpham.php?id_product='.$r['id'];
                            $s.='"><i class="fa fa-shopping-cart"></i></a></p>
            </div>';
         }
        $s .= '</div>
    </section>
    
    ';
    echo $s;
 }

 function _product() {
    $s = '
          <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Sản phẩm nổi bật</h1>    
                </div>
            </div>
            <div class="row">';
             $q1 = Database::query("SELECT * FROM `products` ORDER BY RAND() LIMIT 6");
             while($r1 = $q1->fetch_array()) {
                $s .= '<div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="images/'.$r1['image'].'" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">'.$r1['price'].'<sup>đ</sup></li>
                            </ul>
                            <a href="';
                            if(!isset($_SESSION['user']))
                            $s .= 'dangnhap.php';
                         else 
                            $s .= 'sanpham.php?id_product='.$r1['id'];
                            $s.='" class="h2 text-decoration-none text-dark">'.$r1['name'].'</a>
                            <a class="btn btn-success" href="';
                            if(!isset($_SESSION['user']))
                            $s .= 'dangnhap.php';
                         else 
                            $s .= 'sanpham.php?id_product='.$r1['id'];
                            $s.='"><i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>';
             }
            $s .= '</div>
        </div>
    </section>
    
    ';
    echo $s;
 }
 
 function _sanpham() {
    $s = '';
    $categoriesQuery = "SELECT * FROM `categories`";
    $productsQuery = "SELECT * FROM `products` WHERE status=true";

    // Kiểm tra xem 'id_category' đã được đặt chưa
    if (isset($_GET['id_category']) && is_numeric($_GET['id_category'])) {
        $id_category = intval($_GET['id_category']);
        $categoriesQuery .= " WHERE id=$id_category";
        $productsQuery .= " AND id_category=$id_category";
    }

    // Kiểm tra xem từ khóa tìm kiếm 'q' có được đặt không
    if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
        $searchTerm = Database::getConnection()->escape_string(trim($_GET['q'])); // Escape đầu vào để tránh SQL Injection
        $productsQuery .= " AND name LIKE '%$searchTerm%'";
    }

    // Tìm nạp danh mục
    $categoriesResult = Database::query($categoriesQuery);
    if (!$categoriesResult) {
        die("Lỗi khi tìm nạp danh mục");
    }

    $s .= '
        <!-- Modal -->
        <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="w-100 pt-1 mb-5 text-right">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="sanpham.php" method="get" class="modal-content modal-body border-0 p-0">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Tìm kiếm" value="' . (isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '') . '">
                        <button type="submit" class="input-group-text bg-success text-light">
                            <i class="fa fa-fw fa-search text-white"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Start Content -->
        <div class="container py-5">
            <div class="row">

                <div class="col-lg-3">
                    <h1 class="h2 pb-4">Danh Mục</h1>
                    <ul class="list-unstyled templatemo-accordion">
                        <li class="pb-3">
                            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                                Tên Danh Mục
                                <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                            </a>
                            <ul id="collapseThree" class="collapse list-unstyled pl-3">';
                             // Hiển thị liên kết danh mục
                             while ($r = $categoriesResult->fetch_array()) {
                              $s .= '<li><a class="text-decoration-none" href="sanpham.php?id_category=' . $r['id'] . '">' . $r['name'] . '</a></li>';
                            }
                         $s .= '</ul>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="row">';
                     // Lấy sản phẩm
                         $productsResult = Database::query($productsQuery);
                         if ($productsResult) {
                         while ($r1 = $productsResult->fetch_array()) {
                           $s .= '<div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="images/' . $r1['image'] . '">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2" href="';
            $s .= isset($_SESSION['user']) ? 'sanpham.php?id_product=' . $r1['id'] : 'dangnhap.php';
            $s .= '"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="h3 text-decoration-none">' . $r1['name'] . '</p>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">' . $r1['price'] . '<sup>đ</sup></p>
                            </div>
                        </div>
                    </div>';
        }
    }

    $s .= '        </div>
                </div>
            </div>
        </div>
        <!-- End Content -->
    ';

    echo $s;
}

 function _contact() {
    $s = '
        <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Tìm kiếm...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Liên Hệ</h1>
        </div>
    </div>

    <!-- Start Map -->
    <div id="mapid" style="width: 100%; height: 300px;">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.3536849106467!2d107.58544287460766!3d16.457619228924464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a14771646be3%3A0x2fd0ad0d9227d5b0!2zNzAgTmd1eeG7hW4gSHXhu4csIFbEqW5oIE5pbmgsIEh14bq_LCBUaOG7q2EgVGhpw6puIEh14bq_LCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1734309586427!5m2!1svi!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Tên</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="tên">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Tin nhắn</label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="Tin nhắn" rows="8"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Gửi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    ';
    echo $s;
}

function login(){
    if (isset($_POST['emailphone']) && isset($_POST['password'])) {
        if (is_numeric($_POST['emailphone'])) {
            $x = 'phone';
        } else {
            $x = 'email';
        }
        
        $q = Database::query("SELECT * FROM users WHERE $x = '{$_POST['emailphone']}' AND password = '{$_POST['password']}'");
        if ($r = $q->fetch_array()) {
            if ($r['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                $_SESSION['user'] = $r;
                if (isset($_POST['remember_me'])) {
                    setcookie('emailphone', $_POST['emailphone'], time() + (86400 * 30), "/"); 
                    setcookie('password', $_POST['password'], time() + (86400 * 30), "/"); 
                } else {
                    setcookie('emailphone', '', time() - 3600, "/");
                    setcookie('password', '', time() - 3600, "/");
                }
                
                header("Location:  index.php");
            }
        } else {
            $_SESSION['login_fail'] = 'Dữ liệu nhập không chính xác!!!';
            header("Location: dangnhap.php");
        }
    }

    $saved_emailphone = isset($_COOKIE['emailphone']) ? $_COOKIE['emailphone'] : '';
    $saved_password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';

    $s = '
    <section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">';
        $q = Database::query("SELECT * FROM `dangnhap`");
        while($r = $q->fetch_array()) {
        $s .= '<div class="col-md-9 col-lg-6 col-xl-5">
            <img src="assets/images/'.$r['image'].'"
            class="img-fluid" alt="Sample image">
        </div>';
        }
        $s .= '<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action="" method="post">
            <h2 style="padding: 40px 0 25px 0">Đăng Nhập</h2>';
           if (isset($_SESSION['login_fail'])) {
               $s .= '<div style="color: red;">'.$_SESSION['login_fail'].'</div>';
               unset($_SESSION['login_fail']); 
           }
           
            $s .= '<!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="emailphone" class="form-control form-control-lg"
                placeholder="Nhập vào số điện thoại của bạn" value="' . htmlspecialchars($saved_emailphone) . '" />
            </div>
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-3">
                <input type="password" name="password" class="form-control form-control-lg"
                placeholder="Nhập vào mật khẩu" id="password" value="' . htmlspecialchars($saved_password) . '" />
                <button type="button" onclick="togglePassword()" class="btn btn-secondary btn-sm mt-2">Hiện/Ẩn mật khẩu</button>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <!-- Remember Me Checkbox -->
                <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" name="remember_me" value="1" id="form2Example3"' . (!empty($saved_emailphone) ? ' checked' : '') . ' />
                    <label class="form-check-label" for="form2Example3">
                        Ghi nhớ mật khẩu    
                    </label>
                </div>
                <a href="#!" class="text-body">Quên mật khẩu?</a>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng Nhập</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản? <a href="dangky.php"
                    class="link-danger">Đăng ký</a></p>
            </div>
            </form>
        </div>
        </div>
    </div>
    
    </section>

    <script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
    </script>
    ';

    echo $s;
}

 function splitName($str){
        $rs = NULL;
        $word = mb_split(' ', $str);
        $n = count($word)-1;
        if ($n > 0) {$rs = $word[$n];}

        return $rs;
}
function register(){
    $errName = $errPhone = $errPass = $errRepass = '';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['name'])) {
            $errName = "Vui lòng nhập vào tên của bạn!";
        }
        if (empty($_POST['phone'])) {
            $errPhone = "Cần có 1 số điện thoại!";
        } else {
            if (!preg_match('/^\d{10}$/', $_POST['phone'])) {
                $errPhone = "Số điện thoại phải có đúng 10 chữ số!";
            } else {
                $phoneCheckQuery = "SELECT COUNT(*) FROM users WHERE phone='" . $_POST['phone'] . "'";
                $phoneCheckResult = Database::query($phoneCheckQuery);
                $phoneExists = $phoneCheckResult->fetch_array()[0];

                if ($phoneExists > 0) {
                    $errPhone = "Số điện thoại đã tồn tại!";
                }
            }
        }
        if (empty($_POST['pass'])) {
            $errPass = "Vui lòng nhập mật khẩu!";
        }
        if (empty($_POST['repass'])) {
            $errRepass = "Vui lòng xác nhận mật khẩu!";
        } else {
            if ($_POST['pass'] != $_POST['repass']) {
                $errRepass = "Mật khẩu không khớp!";
            }
        }
        if ($errName == '' && $errPhone == '' && $errPass == '' && $errRepass == '') {
            $insertQuery = "INSERT INTO users(name, phone, password, role) VALUES('".$_POST['name']."', '".$_POST['phone']."', '".$_POST['pass']."', '')";
            Database::query($insertQuery);
            $userQuery = "SELECT * FROM users WHERE phone='" . $_POST['phone'] . "' AND password='" . $_POST['pass'] . "'";
            $userResult = Database::query($userQuery);
            $_SESSION['user'] = $userResult->fetch_array();
            header("location: index.php");
        }
    }

    $s = '
        <section class="vh-80" style="background-color: #eee; border: none; border-radius: none;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-3">
                    <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng Ký</p>

                        <form class="mx-1 mx-md-4" action="" method="post">

                        <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fa fa-user"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example1c">Tên của bạn</label>
                            <input type="text" name="name" class="form-control" />
                            <span style="color: red;">'.$errName.'</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fa fa-phone"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Số điện thoại của bạn</label>
                            <input type="text" name="phone" class="form-control" />
                            <span style="color: red;">'.$errPhone.'</span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fa fa-lock"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4c">Mật Khẩu</label>
                            <input type="password" id="pass" name="pass" class="form-control" />
                            <span style="color: red;">'.$errPass.'</span>
                            <input type="checkbox" onclick="togglePassword(\'pass\')"> Hiển thị mật khẩu
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fa fa-key"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4cd">Xác nhận mật khẩu</label>
                            <input type="password" id="repass" name="repass" class="form-control" />
                            <span style="color: red;">'.$errRepass.'</span>
                            <input type="checkbox" onclick="togglePassword(\'repass\')"> Hiển thị mật khẩu
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Đăng ký</button>
                        </div>

                        </form>

                    </div>';
                    $q = Database::query("SELECT * FROM `dangky`");
                    while($r = $q->fetch_array()) {
                    $s .= '<div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                        <img src="assets/images/'.$r['image'].'"
                        class="img-fluid" alt="Sample image">
                    </div>';
                    }
                   $s .= '</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </section>
        
        <script>
        function togglePassword(fieldId) {
            var field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
            } else {
                field.type = "password";
            }
        }
        </script>
    ';
    echo $s;
}


function addtoCartProduct($id_product) {
    $q = Database::query("SELECT * FROM `products` WHERE id =". $id_product);
    $r = $q->fetch_array();
    if(isset($_SESSION['cart'])) {
        $a = $_SESSION['cart'];
        for($i = 0; $i <count($a); $i++) 
            if($r['id']==$a[$i]->id)break;
        if($i<count($a))$a[$i]->quantity++;
        else  $a[count($a)] = new cart($r['id'], $r['name'], $r['image'], $r['price'], 1);
        
    }else {
        $a = array();
        $a[0] = new cart($r['id'], $r['name'], $r['image'], $r['price'], 1);
    }
    $_SESSION['cart'] = $a;
}

function cart() {
    $total = 0.0;
    // Xử lý xóa từng sản phẩm
    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
        $deleteIndex = (int)$_GET['delete'];
        if (isset($_SESSION['cart'][$deleteIndex])) {
            unset($_SESSION['cart'][$deleteIndex]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset lại index
        }
    }
    // Xử lý cập nhật số lượng
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
        foreach ($_POST['quantities'] as $index => $quantity) {
            if (isset($_SESSION['cart'][$index]) && is_numeric($quantity) && $quantity > 0) {
                $_SESSION['cart'][$index]->quantity = (int)$quantity;
            }
        }
    }
    // Tính tổng tiền
    if (isset($_SESSION['cart'])) {
        $a = $_SESSION['cart'];
        foreach ($a as $item) {
            $item_total = $item->quantity * $item->price * 1000;
            $total += $item_total;
        }
    }
    // Hiển thị giỏ hàng
    $s = '
        <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="giohang.php">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th class="p-name">Tên</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                        <th>Xoá</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                if (isset($_SESSION['cart'])) {
                                $a = $_SESSION['cart'];
                                foreach ($a as $index => $item) {
                                $item_total = $item->quantity * $item->price * 1000;
                                $s .= '<tr>
                               <td class="cart-pic first-row"><img src="images/' . $item->image . '" alt="" style="width="150px" height="150px""></td>
                                <td class="cart-title first-row">
                                <h5>' . $item->name . '</h5>
                                </td>
                                <td class="p-price first-row">'.$item->price.'<sup>đ</sup></td>
                                <td class="qua-col first-row">
                               <div class="quantity">
                                <input type="number" name="quantities[' . $index . ']" value="' . $item->quantity . '" min="1" style="width: 50px;">
                            </div>
                        </td>
                        <td class="total-price first-row">' . number_format($item_total, 0, '.', '.') . '<sup>đ</sup></td>
                      <td class="close-td first-row"><a href="giohang.php?delete=' . $index . '" style="background: #F08080; 
                           width: 80px; 
                           height: 40px; 
                           display: flex; 
                          justify-content: center; 
                          align-items: center; 
                          border-radius: 10px; 
                         font-weight: bolder;
                         color: white; 
                         font-size: 16px; 
                         text-decoration: none;">
                        <i class="fa fa-close"></i>
                         </a>
                        </td>
                    </tr>';
                    }
                   }
                     $s .= '</tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="index.php" class="primary-btn continue-shop">Tiếp Tục Mua Sắm</a>
                                    <button type="submit" name="update_cart" class="primary-btn up-cart">Cập Nhật</button>
                                    <a href="giohang.php?clear=OK" class="primary-btn up-cart" style="text-decoration: none;"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="cart-total">Tổng Tiền <span>' . number_format($total, 0, '.', '.') . '<sup>đ</sup></span></li>
                                    </ul>
                                    <a href="thanhtoan.php" class="proceed-btn" style="text-decoration: none;">Tiếp Tục Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>';
    echo $s;
}

function _checkout($title) {
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $total = 0;
    foreach ($cart as $item) {
        $total += $item->quantity * $item->price * 1000;
    }
    $s = '
    <section class="checkout-section spad">
        <div class="container">
            <form action="process_order.php" class="checkout-form" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>'.$title.'</h4>
                          <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Họ Tên <span>*</span></p>
                                        <input type="text" name="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Địa Chỉ <span>*</span></p>
                                <input type="text" name="address" placeholder="Nhập địa chỉ của bạn" required>
                            </div>
                            <div class="checkout__input">
                                <p>Số điện thoại <span>*</span></p>
                                <input type="text" name="phone" required>
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú</p>
                                <input type="text" name="note" placeholder="Ghi chú về đơn hàng (nếu có)">
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Đơn Hàng Của Bạn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                <li>Sản Phẩm <span>Tổng Tiền</span></li>
                                ';
                                foreach ($cart as $item) {
                                    $item_total = $item->quantity * $item->price * 1000;
                                    $s .= '
                                    <li class="fw-normal">'.$item->name.'x '.$item->quantity.' <span>'.number_format($item_total, 0, '.','.').'<sup>đ</sup></span></li>
                               ';
                                }
                                $s.= '
                                <li class="total-price">Tổng tiền <span>'.number_format($total, 0, '.','.').'<sup>đ</sup></span></li></ul>
                            
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn" style="color: white;">Đặt Đơn</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>  
    </section>
    ';
    echo $s;
}

function _gioithieu() {
    $s = '
        <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <section class="bg-success py-5">
        <div class="container">';
         $q = Database::query("SELECT * FROM `blog`");
         while($r = $q->fetch_array()) {
            $s .= '<div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>'.$r['title'].'</h1>
                    <p>'.$r['pagaph'].'</p>
                    <span>'.$r['day'].'</span>
                </div>
                <div class="col-md-4">
                    <img src="images/'.$r['image'].'" alt="About Hero" style="width="150px"; height="200px;"">
                </div>
            </div>';
         }
        $s .= '</div>
    </section>
    <!-- Close Banner -->

    <!-- Start Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Dịch vụ của chúng tôi</h1>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Dịch vụ giao hàng</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                    <h2 class="h5 mt-4 text-center">Vận chuyển và trả lại</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                    <h2 class="h5 mt-4 text-center">Khuyến mãi</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                    <h2 class="h5 mt-4 text-center">Dịch vụ 24 giờ</h2>
                </div>
            </div>
        </div>
    </section>
    ';
    echo $s;
}

?>