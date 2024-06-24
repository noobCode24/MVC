<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progess Bar</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
        integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo _HOST_PATH_ ?>\public\assets\clients\css\book_tickets_css\style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="logo">
                <img src="https://baosonparadise.vn/Uploads/images/logo.png" alt="">
            </div>
            <div class="right-section">
                <div class="contact-info">
                    <span>Hotline: 0565 097 603</span>
                </div>
                <div class="social-media">
                    <a href="https://www.facebook.com/congvienthienduongbaoson/">
                        <img src="https://th.bing.com/th/id/R.2bad70f2d08429a28dfbebd4c237924b?rik=vgEdhJ%2f%2biiEnQQ&riu=http%3a%2f%2fpngimg.com%2fuploads%2ffacebook_logos%2ffacebook_logos_PNG19748.png&ehk=0ZiZ04ZZ6mSJ5oyPxBh1gy4FSYhegWTWyDpCiI73sbw%3d&risl=&pid=ImgRaw&r=0"
                            alt="Facebook" style="width: 30px;">
                    </a>
                    <a href="https://www.youtube.com/channel/UC6ZAzgoSBsqPvYaGOhfZ8Lw">
                        <img src="https://th.bing.com/th/id/OIP.OVUMFVp8elGfMYh-27fTLAHaFO?rs=1&pid=ImgDetMain"
                            alt="YouTube" style="width: 30px;">
                    </a>
                    <a href="https://www.instagram.com/thienduong.baoson/?hl=en">
                        <img src="https://png.pngtree.com/png-vector/20221018/ourmid/pngtree-instagram-social-platform-icon-png-image_6315976.png"
                            alt="Instagram" style="width: 25px;"></a>
                </div>
                <a href="#" class="buy-ticket"><i class="fa-solid fa-cart-shopping"></i>
                    <p>MUA VÉ</p> <span>0</span>
                </a>
                <div class="user-menu">
                    <img src="https://th.bing.com/th/id/OIP.N_YBvMrwwjlxzOtw-UoHawAAAA?w=435&h=435&rs=1&pid=ImgDetMain"
                        alt="User" style="width: 33px; margin-right: 5px;">
                </div>
                <div class="language">
                    <img src="https://media.istockphoto.com/vectors/vietnamese-flag-vector-id864417828?k=6&m=864417828&s=612x612&w=0&h=AbGtQWE0vfKupO0Tpp8ga49MVZq4O2P7HIkIOUxl2rk="
                        alt="Vietnamese" style="width: 34px; margin-right: 5px;">
                    <i class="fa-solid fa-caret-down"></i>
                </div>
            </div>
        </div>

        <!-- end header  -->

        <div class="orientation">
            <div class="progress-bar">
                <div class="line"></div>
                <div class="line2"></div>
                <div class="progress-step active" id="step1">
                    <a href="<?php echo _HOST_PATH_ ?>/clients/Front_page">
                        <div class="step-label active">Thiên đường bảo sơn</div>
                        <i class="fas fa-map-marker-alt step-icon active"></i>
                    </a>
                </div>
                <div class="progress-step" id="step2">
                    <a href="#">
                        <div class="step-label">Chọn vé</div>
                        <i class="fas fa-ticket-alt step-icon"></i>
                    </a>
                </div>
                <div class="progress-step" id="step3">
                    <a href="#">
                        <div class="step-label">Thanh toán</div>
                        <i class="fas fa-credit-card step-icon"></i>
                    </a>
                </div>
                <div class="progress-step" id="step4">
                    <a href="#">
                        <div class="step-label">Kết thúc</div>
                        <i class="fas fa-check step-icon"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- end orientation -->

        <div class="banner">
            <div class="home">
                <div class="home-caledar">
                    <div class="title">
                        <h3>Chọn ngày sử dụng</h3>
                    </div>
                    <div class="datepicker align" id="datepicker"></div>
                    <div class="content">
                        <p class="note">* Quý khách chú ý, ngày sử dụng không được thay đổi sau khi đã đặt vé, vé đã bán
                            không hoàn trả lại. Mọi thắc mắc vui lòng liên hệ với chúng tôi theo <b
                                style="color: yellow">hotline 0985 355 861 hoặc 1900 066 808 bấm phím 1</b></p>
                    </div>
                    <div class="buy-tickets__by-date">
                        <button id="buy-ticket" class="btn-buy-tickets_by-date">Mua vé</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- end banner -->

        <div class="footer">
            <div class="content-footer">
                <p>Copyright © 2023 baosonparadise.vn - Bản quyền website thuộc về CÔNG TY TNHH MỘT THÀNH VIÊN DU LỊCH
                    GIẢI TRÍ THIÊN ĐƯỜNG BẢO SƠN</p>
            </div>
        </div>

        <!-- end footer -->
    </div>

    <script src="<?php echo _HOST_PATH_ ?>\public\assets\clients\js\book_tickets_js\script.js" defer></script>
</body>

</html>