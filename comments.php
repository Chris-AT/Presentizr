<div class="row">
    <div class="col-xs-12">

<?php
/**
 * TODO: Styling the comments
 */
if(comments_open()) {
comment_form();
}
comments_number();
wp_list_comments();
paginate_comments_links(); ?>
    </div> <!-- .col-xs-12 -->
</div> <!-- .row -->