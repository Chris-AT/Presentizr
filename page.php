<?php

get_header();

if(have_posts()) {
    get_template_part('content', 'page');
    if(comments_open() || get_comments_number()) {
        comments_template();
    }
}
else {
    get_template_part('content', 'none');
}

get_footer();
