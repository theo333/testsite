<?php
/*
 * Title: Contact Info
 * Post Type: contacts2
 */

piklist( 'field', array(
    'type'      => 'text',
    'field'    => 'cm_company_name',
    'label'    => 'Company Name'
));

piklist( 'field', array(
    'type'      => 'text',
    'field'    => 'cm_email_address',
    'label'    => 'Email Address'
));

piklist( 'field', array(
    'type'      => 'text',
    'field'    => 'cm_phone_number',
    'label'    => 'Phone Number'
));

piklist( 'field', array(
    'type'      => 'datepicker',
    'field'    => 'cm_date_met',
    'label'    => 'Date Met'
));

piklist( 'field', array(
    'type'      => 'select',
    'field'    => 'cm_relationship',
    'label'    => 'Relationship',
    'choices'  => array(
        'friend'  => 'Friend',
        'biz'  => 'Biz Contact',
        'acquaintance' => 'Aquaintance',
    ),
    'attributes' => array(
        'multiple'  => 'multiple'
    )
));

piklist( 'field', array(
    'type'      => 'textarea',
    'field'    => 'cm_notes',
    'label'    => 'Notes',
    'attributes' => array(
        'rows'  => 10,
        'cols' => 50,
        'class' => 'contact-notes'
    )
));
