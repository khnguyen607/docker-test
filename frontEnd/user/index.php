<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- favicon icon -->
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico" type="image/x-icon">

    <!-- Include fontawesome CDN -->
    <link rel="stylesheet" href="assets/lib/fontawesome/css/all.min.css" />

    <!-- Include google fonts CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">

    <style>
        /* Initial state: fully transparent */
        main {
            opacity: 0;
            /* Apply transition effect to opacity property */
            transition: opacity 0.5s ease-in-out;
        }

        /* When section.thesidebar_section is visible (e.g., after a class is added via JavaScript) */
        main.show {
            opacity: 1;
        }
    </style>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <!-- body wrap start -->
    <div class="body-wrap overflow-hidden">
        <!-- back-to-top start -->
        <div class="backtotop">
            <a href="#!" class="scroll">
                <i class="fas fa-arrow-up fw-bold"></i>
            </a>
        </div>
        <!-- back-to-top end -->
        <header class="header_section header_1"></header>
        <section class="sidebar_section"></section>

        <!-- main body start -->
        <?php
        // Xác định router và trang cần được tải
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        // Kiểm tra xem trang có tồn tại hay không
        $page_path = "pages/$page/$page";
        if (file_exists("$page_path.html")) {
            // Tải tệp HTML tương ứng
            include_once("$page_path.html");
        } else {
            // Trang không tồn tại, xử lý bằng cách hiển thị trang 404 hoặc trang mặc định khác
            include_once("pages/404/index.html");
        }
        ?>
        <!-- main body end -->

        <footer class="footer_section position-relative"></footer>

    </div>
    <!-- body wrap end -->
    <script src="shared/scripts/app.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/nice-select.min.js"></script>
    <script src="assets/js/countdown.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/custom.js"></script>

    <script src="shared/scripts/init.js"></script>
    <?php
    echo "<script src='$page_path.js'></script>"
    ?>
</body>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var main = document.querySelector("main");
        main.classList.add("show"); // Add the "show" class to trigger the animation
    });
</script>

</html>