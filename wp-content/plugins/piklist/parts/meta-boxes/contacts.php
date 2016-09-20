<?php
/*
 * Title: Contact Info
 * Post Type: contacts2
 */

piklist( 'field', array(
    'type'      => 'text'
    ,'field'    => 'company_name'
    ,'label'    => 'Company Name'
));

piklist( 'field', array(
    'type'      => 'text'
    ,'field'    => 'email_address'
    ,'label'    => 'Email Address'
));

piklist( 'field', array(
    'type'      => 'text'
    ,'field'    => 'phone_number'
    ,'label'    => 'Phone Number'
));

piklist( 'field', array(
    'type'      => 'datepicker'
    ,'field'    => 'date_met'
    ,'label'    => 'Date Met'
));

piklist( 'field', array(
    'type'      => 'select'
    ,'field'    => 'relationship'
    ,'label'    => 'Relationship'
    ,'choices'  => array(
        'friend'  => 'Friend'
        ,'biz'  => 'Biz Contact'
        ,'acquaintance' => 'Aquaintance'
    )
    ,'attributes' => array(
        'multiple'  => 'multiple'
    )
));

piklist( 'field', array(
    'type'      => 'textarea'
    ,'field'    => 'notes'
    ,'label'    => 'Notes'
    ,'attributes' => array(
        'rows'  => 10
        ,'cols' => 50
        ,'class' => 'contact-notes'
    )
));
