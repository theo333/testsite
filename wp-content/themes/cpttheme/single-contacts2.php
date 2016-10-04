<?php
/**
 * The template for displaying custom post type "portfolio2" single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php
		while ( have_posts() ) {
            the_post();

            // replaced line below with contents of content-contacts2.php
//			get_template_part( 'template-parts/content-contacts2', get_post_format() );
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                        // replace with custom post type header
                        // the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

                    ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                        $id         = get_the_ID();  // === $post->ID  ???
                        $name       = get_the_title($id);
            //            $name = $post->post_title;  // same as above?
                        $company    = get_post_meta( $id, 'cm_company_name', true );
                        $email      = get_post_meta( $id, 'cm_email_address', true );
                        $phone      = get_post_meta( $id, 'cm_phone_number', true );
                        $date_met   = get_post_meta( $id, 'cm_date_met', true );
                        $notes      = get_post_meta( $id, 'cm_notes', true );
            


                    // can have multiple relationships, so use join() or implode() to display all relationships.  
                    // ? What is difference between join(glue, array) and implode(glue, array) ?
                    // ? Do not need foreach loop ?
            
                        // 1. can use join() to display list of relationships
                        // ? is the if statement useful here ?
                        if ( 'cm_relationship' ) {
                            $relationships_join = join( ', ', get_post_meta( $id, 'cm_relationship', false ));  
                        }
            
                        // 2. can also use implode() to display list of relationships 
                        // could not initially get to work since I was trying to do this within foreach loop. :(
                        $relationships = get_post_meta( $id, 'cm_relationship', false );
     
                        if ( $relationships ) {
                            $relationships_implode = implode(', ', $relationships);
                        }
                        
                    // ****************** PHONE NUMBERS **************************  
                    // loop thru since can have multiple phone numbers




                    // ******************* ADDRESSES *****************************        
                    // loop thru since can have multiple addresses
                        $address_group_add_mores = get_post_meta( $id, 'cm_address_group_add_more', false );
    //                        $address_1s  = get_post_meta( $id, 'cm_address_1', false ); // ? why is array empty ?


                          // **************************************************************            
//                        // FOR DEBUGGING PURPOSES ONLY:  output array         
//                        var_dump($address_group_add_mores);
//            
//                        echo 'address_1s';
//                        var_dump($address_1s);  // ? why is array empty ?


//                        echo 'address_group_add_mores';
////                        echo join(', ', $address_group_add_mores[0]);
//                        var_dump($address_group_add_mores[0][0]['cm_address_1']);
//                        echo $address_group_add_mores[0][0]['cm_address_1'] . '<br/>';
//                        echo $address_group_add_mores[0][1]['cm_address_1'] . '<br/>';
//            
//                        foreach ($address_group_add_mores[0] as $value) {
//                            echo join(', ', $value) . '<br/>';
//                            
//                        }

                        $length = count($address_group_add_mores[0]);

                        for ($i = 0; $i < $length; $i++) {

                        // **************************************************************
                        // Using echo HTML method:
//                            $address_1 = $address_group_add_mores[0][$i]['cm_address_1'];
//                            if ($address_group_add_mores[0][$i]['cm_address_2']) {
//                                $address_2 = $address_group_add_mores[0][$i]['cm_address_2'];
//                            } Else {
//                                $address_2 = "";
//                            }
//                            $city = $address_group_add_mores[0][$i]['cm_city'];
//                            $state = $address_group_add_mores[0][$i]['cm_state'];
//                            $postal_code = $address_group_add_mores[0][$i]['cm_postal_code'];
//                            
//                            // problem with this code is that if var like $address_2 does not exist, then will display value from prior $i, which is why I used the if else statement above
//                            echo "<b>" . "Using echo HTML method:" . "</b><br/>";
//                            echo <<<HTML
//                                $address_1<br/>
//                                $address_2<br/>
//                                $city, $state $postal_code<br/><br/>
//HTML;

                        // **************************************************************
                        // Echoing out each line:
//                            echo "<b>Echoing out each line:</b><br/>";
//                            echo $address_group_add_mores[0][$i]['cm_address_1'] . '<br/>';
//                            if ($address_group_add_mores[0][$i]['cm_address_2']) {
//                                echo $address_group_add_mores[0][$i]['cm_address_2'] . '<br/>';
//                            }
//                            echo $address_group_add_mores[0][$i]['cm_city'] . ', ' . $address_group_add_mores[0][$i]['cm_state'] . '&nbsp;&nbsp;' . $address_group_add_mores[0][$i]['cm_postal_code'] . '<br/>';
////                            echo $address_group_add_mores[0][$i]['cm_address_type'] . '<br/>';
//                            echo '<br/><br/>';


                        // **************************************************************
                        // Using output_addr Method:
//                        echo "<b>Using output_addr Method:</b><br/>";
                        $output_addr = '<b>(' . $address_group_add_mores[0][$i]['cm_address_type'] . ')</b><br/>';
                        $output_addr .= $address_group_add_mores[0][$i]['cm_address_1'] . '<br/>';

                        if ($address_group_add_mores[0][$i]['cm_address_2']) {
                            $output_addr .=  $address_group_add_mores[0][$i]['cm_address_2'] . '<br/>';
                        }

                        $output_addr .= $address_group_add_mores[0][$i]['cm_city'] . ', ' . $address_group_add_mores[0][$i]['cm_state'] . '&nbsp;&nbsp;' . $address_group_add_mores[0][$i]['cm_postal_code'] . '<br/>';

//                            $output_addr .= '<br/><br/>';

//                        echo $output_addr;

                    }

                    // function to output address(es) info
                    // ? how to pass in arguments or values to this function - e.g. $id, etc. ?
                    function address_output() {
                        // Using output_addr Method:
                        $id         = get_the_ID();  
                        $address_group_add_mores = get_post_meta( $id, 'cm_address_group_add_more', false );
                        $length = count($address_group_add_mores[0]);

                        for ($i = 0; $i < $length; $i++) {

                            $output_addr = '<b>(' . $address_group_add_mores[0][$i]['cm_address_type'] . ')</b><br/>';
                            $output_addr .= $address_group_add_mores[0][$i]['cm_address_1'] . '<br/>';

                            if ($address_group_add_mores[0][$i]['cm_address_2']) {
                                $output_addr .=  $address_group_add_mores[0][$i]['cm_address_2'] . '<br/>';
                            }

                            $output_addr .= $address_group_add_mores[0][$i]['cm_city'] . ', ' . $address_group_add_mores[0][$i]['cm_state'] . '&nbsp;&nbsp;' . $address_group_add_mores[0][$i]['cm_postal_code'] . '<br/><br/>';
                            
                        echo $output_addr;
                        }

                    }
                    
                    address_output();

                    // **************************************************************
                    // create output string and display on screen
                    // prob: does not enable to show multiple Addresses or Phone Numbers

//                        $labels = array('Company:', 'Email Address:', 'Phone Number:', 'Date Met:', 'Relationships:', 'Notes:');
//                        $values = array($company, $email, $phone, $date_met, $output_rel, $notes);

                    echo "<br/><br/>---------------------------------<br/>prob: does not enable to show multiple Addresses or Phone Numbers";
                    echo "<h3>$name</h3>";

                    $info_output = array(
                        'Company'                  => $company,
                        'Email Address'            => $email,
                        'Phone Number'             => $phone,
                        'Address'                  => $output_addr,
                        'Date Met'                 => $date_met,
                        'Relationships(join)'      => $relationships_join,
                        'Relationships(implode)'   => $relationships_implode,
                        'Notes'                    => $notes
                    );

                    foreach( $info_output as $info_key => $info_value) {
                        if ($info_value) {
                            echo "<b>$info_key:</b>" . "&nbsp;&nbsp;" . "$info_value" . "<br/>";  

//                                echo "<br/><br/><br/><br/><br/>";
//                                echo "<li>" . "<b>$info_key</b>". "</li><li>" . "$info_value" . "</li>";
                        }
                    }

            
                    // **************************************************************
                    // first attempt - prob is can not display multiple Addresses or Phone Numbers
//                        echo <<<HTML
//                            <h3>$name</h3>
//                            <b>Company:</b> $company<br/>
//                            <b>Email Address:</b> $email<br/>
//                            <b>Phone Number:</b> $phone<br/>
//                            <b>Date Met:</b> $date_met<br/>
//                            <b>Relationships:</b> $output_rel<br/>
//                            <b>Notes:</b> $notes
//HTML;
                    ?>

                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php _s_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-## -->            
        <?php    
            
			// the_post_navigation();

        } // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
