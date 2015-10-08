</div> <!-- #wrapper -->
<?php if(is_active_sidebar('sidebar-footer') && !is_home()) : ?>
<div class="row footer">
    <div class="col-xs-12" id="footerliselector">
    <?php get_sidebar(); ?>
    </div>
</div> <!-- .row .footer -->
<?php endif; ?>
</div> <!-- .container -->
<div class="creditsContainer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 credits">
                proudly designed by Chris-AT <a href="#" id="scrolltotop"><?php _e('Scroll to top', 'presentizr'); ?></a>
            </div> <!-- .col-cs-12 .credits -->
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .creditsContainer -->

<?php wp_footer(); ?>

</body>
</html>

