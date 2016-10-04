<?php
/*
 * Title: Contact Info
 * Post Type: contacts2
 */

piklist( 'field', array(
    'type'      => 'text',
    'field'     => 'cm_company_name',
    'label'     => 'Company Name'
));

piklist( 'field', array(
    'type'      => 'text',
    'field'     => 'cm_email_address',
    'label'     => 'Email Address'
));

piklist('field', array(
    'type'      => 'group',
    'field'     => 'cm_address_group_add_more',
    'add_more'  => true,
    'label'     => __('Address(es)', 'cpt-contacts'),
    'fields'    => array(        
        array(
            'type'  => 'text',
            'field'  => 'cm_address_1',
//            'label' => __('Street Address', 'cpt-contacts'),
            'columns'   => 12,
            'attributes'    => array(
                'placeholder'   => 'Street Address'
            )
        ),
        array(
            'type'  => 'text',
            'field'  => 'cm_address_2',
//            'label' => __('P.O. Box, Suite, etc.', 'cpt-contacts'),
            'columns'   => 12,
            'attributes'    => array(
                'placeholder'   => 'P.O. Box, Suite, etc.'
            )
        ),
        array(
            'type'  => 'text',
            'field'  => 'cm_city',
//            'label' => __('City', 'cpt-contacts'),
            'columns'   => 12,
            'attributes'    => array(
                'placeholder'   => 'City'
            )
        ),
        array(
            'type'  => 'text',
            'field'  => 'cm_state',
//            'label' => __('State', 'cpt-contacts'),
            'columns'   => 4,
            'choices'   => piklist_demo_get_states(),
            'attributes'    => array(
                'placeholder'   => 'State'
            )
        ),
        array(
            'type'  => 'text',
            'field'  => 'cm_postal_code',
//            'label' => __('Postal Code', 'cpt-contacts'),
            'columns'   => 3,
            'attributes'    => array(
                'placeholder'   => 'Postal Code'
            )
        ),
        array(
            'type'  => 'select',
            'field'  => 'cm_address_type',
            'label' => __('Select Address Type', 'cpt-contacts'),
            'columns'   => 4,
            'choices'   => array(
                'home'  => 'Home',
                'work'  => 'Work'
            )
        )
    )
));

piklist('field', array(
    'type'      => 'group',
    'label'     => __('Phone Numbers', 'cpt-contacts'),
    'add_more'  => true,
    'fields'    => array(
        array(
            'type'      => 'select',
            'field'     => 'cm_phone_num_type',
            'label'     => 'Type',
            'choices'   => array(
                'mobile'    => 'Mobile',
                'home'      => 'Home',
                'work'      => 'Work'
            ),
            'columns'   => 3
        ),
        array(
            'type'      => 'text',
            'field'     => 'cm_phone_number',
            'label'     => 'Phone Number',
            'columns'   => 6
        )
    )
));


//piklist( 'field', array(
//    'type'      => 'text',
//    'field'     => 'cm_phone_number',
//    'label'     => 'Phone Number',
//    'add_more'  => true
//));

piklist( 'field', array(
    'type'      => 'datepicker',
    'field'     => 'cm_date_met',
    'label'     => 'Date Met'
));

piklist( 'field', array(
    'type'      => 'select',
    'field'     => 'cm_relationship',
    'label'     => 'Relationship',
    'choices'   => array(
        'friend'        => 'Friend',
        'biz'           => 'Biz Contact',
        'acquaintance'  => 'Aquaintance',
    ),
    'attributes' => array(
        'multiple'  => 'multiple'
    )
));

piklist( 'field', array(
    'type'      => 'textarea',
    'field'     => 'cm_notes',
    'label'     => 'Notes',
    'attributes' => array(
        'rows'  => 10,
        'cols'  => 50,
        'class' => 'contact-notes'
    )
));
