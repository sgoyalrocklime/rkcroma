<?php
get_header();

?>

    <section class="content news-grid" id="404">

        <div class="container" id="contnt">
            <div class="row">
                <div class="col-lg-12 er404">
                    <h1>404</h1>
                    <h2>OOPS, SORRY WE CAN'T FIND THAT PAGE!</h2>
                    <h4>Either something went wrong or the page doesnt exists anymore.</h4><br>
                    <a href="http://cromalam.com" class="hm_btn">HOME PAGE</a>
                </div>
            </div>
        </div>

    </section>
<style>
    section#404{width: 100%;padding: 250px 0px;}
    .col-lg-12.er404 {text-align: center;}
    .er404 h1 {
        color: #fff;
        font-size: 100pt;
        font-weight: bolder;
    }.er404 h2, h4 {
         color: #828181;padding: 50px 0 0;
     }
    .er404 h2 {
        font-size: 20pt;
    }
    .er404 .hm_btn {
        background-color: #ce0b0b;
        color: #fff;
        font-size: 12pt;
        padding: 10px 20px;
    }
</style>
<?php

get_footer();