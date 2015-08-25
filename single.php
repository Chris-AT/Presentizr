<?php

get_header();

if(have_posts()) {
    get_template_part('content', 'post');
}
else {
    get_template_part('content', 'none');
}
get_footer();
