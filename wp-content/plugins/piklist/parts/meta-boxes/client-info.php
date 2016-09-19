<?php
/*
 * Title: Client Info
 * Post Type: portfolio2
 */

piklist('field', array(
    'type' => 'url'
    ,'field' => 'client_url'
    ,'label' => 'Client Website URL'
));

piklist('field', array(
    'type' => 'file'
    ,'field' => 'internal_page_screenshot'
    ,'label' => 'Internal Page Screenshot'
    ,'description' => 'Upload screenshot of page other than homepage.'
    ,'options' => array(
        'modal_title' => 'Add Image'
        ,'button' => 'Add Image'
    )
));

