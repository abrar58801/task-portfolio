<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />

<?php
require './inc/head.php';
require './inc/header.php';
?>

<style>
    .single_item {
        display: grid;
        grid-template-rows: 1fr auto;
        break-inside: avoid;
        margin-bottom: 30px;
    }

    .single_item>.gallery_img {
        grid-row: 1 / -1;
        grid-column: 1;
        box-shadow: 0 0 5px cyan, 0 0 5px cyan, 0 0 15px cyan, 0 0 10px cyan;
        border-radius: 10px;
        overflow: hidden;
    }

    .masonry_wrap {
        column-count: 4;
        column-gap: 30px;
    }

    @media only screen and (max-width: 980px) {
        .masonry_wrap {
            column-count: 4;
        }
    }

    @media only screen and (max-width: 767px) {

        .masonry_wrap {
            column-count: 2;
            column-gap: 15px
        }

        .single_item {
            margin-bottom: 15px
        }
    }
</style>


<div class="masonry_wrap px-2 py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                $select_gallery = runFatch("SELECT * FROM tbl_gallery ORDER BY id DESC");
                if ($select_gallery) {
                    foreach ($select_gallery as $gallery) {
                ?>
                        <div class="single_item selfie">
                            <a href="./upload/<?= @$gallery['image'] ?>"
                                class="gallery_img fancylight popup-btn" data-fancybox-group="light">
                                <img class="img-fluid w-100"
                                    src="./upload/<?= @$gallery['image'] ?>"
                                    alt="">
                            </a>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <h4 class="text-danger"> Not Added! </h4>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php
require './inc/footer.php';
require './inc/script.php';
?>


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>


<script>
    // $('.portfolio-item').isotope({
    //      itemSelector: '.item',
    //      layoutMode: 'fitRows'
    //  });
    $('.portfolio-menu ul li').click(function() {
        $('.portfolio-menu ul li').removeClass('active');
        $(this).addClass('active');


        var selector = $(this).attr('data-filter');
        $('.portfolio-item').isotope({
            filter: selector
        });
        return false;
    });
    $(document).ready(function() {
        var popup_btn = $('.popup-btn');
        popup_btn.magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>