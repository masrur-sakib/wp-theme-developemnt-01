<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
                if(is_active_sidebar("footer-left")){
                    dynamic_sidebar("footer-left");
                }
                ?>
            </div>
            <div class="col-md-6">
                <?php
                if(is_active_sidebar("footer-right")){
                    dynamic_sidebar("footer-right");
                }
                ?>
                <div class="footer_menu">
                    <h2>Page Links</h2>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footermenu',
                            'menu_id'        => 'footermenucontainer',
                            'menu_class'     => 'list-inline text-left',
                        )
                    )
                    ?>
                </div>
            </div>
        </div>
        <div>
            &copy; Masrur Sakib - All Rights Reserved
        </div>
    </div>
</div>
