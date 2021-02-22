<?php 
    if ( !is_active_sidebar( 'principal')) {
        return;
    }
?>


<aside>
<?php dynamic_sidebar('principal') ?>
</aside>