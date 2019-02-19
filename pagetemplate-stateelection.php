<?php
/**
 * Template Name: State Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package setopati
 */

get_header(); ?>
    <!-- main container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- right side -->
        <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 col-sm-12 col-xs-12 site-main" id="post-single">                       
			<?php while ( have_posts() ) : the_post(); ?>
            
				            <center><h1><?php the_title(); ?></h1></center>
            
						<table class="table table-striped comparison-table table-responsive">
                                <tbody>
                                  <tr>
                                    <th rowspan="2" style="border-right:1px solid #ddd;" >दल</th>
                                    <th colspan="2" style="border-right:1px solid #ddd;"><center><strong>प्रदेश सभा</strong></center></th>
                                  </tr>
                                  <tr>
                    
                                    <th>विजयी </th>
                                    <th style="border-right:1px solid #ddd;">अग्रता</th>
                                  </tr>
                                  

											<?php
                                            if( have_rows('party_wise_table') ):
                                                while ( have_rows('party_wise_table') ) : the_row(); 
											?>
                                            
                                              <tr>
                                                <td>
                                                  <p>
                                                    <img src="<?php echo the_sub_field('party_logo'); ?>" alt="" class="img-circle" style="height: 40px;width: 40px; display:inline;">
                                                    <span style="display:inline;"><?php echo the_sub_field('party_name'); ?></span>
                                                  </p>
                                                </td>
                                                
	                                                                 
												<?php 
                                                if( have_rows('state') ): 
                                                while( have_rows('state') ): the_row(); 
                                                $state_win = get_sub_field('state_win');
                                                $state_leading = get_sub_field('state_leading');
                                                ?>                                                                                  
                                                                                             
                                                <td><strong><?php echo $state_win ; ?></strong></td>
                                                <td><strong><?php echo $state_leading; ?></strong></td>
                                                
												<?php endwhile; ?>
                                                <?php endif; ?>                                                   
                                                
                                              </tr>     
                                              
											<?php																										
                                                endwhile;
                                            else :
                                            endif;                                            
                                            ?>                                                  
                                                                                                                                                         
                                </tbody>
                             </table>            
        	

	        <?php endwhile; // End of the loop.?>          
        <!-- end right side -->
        
        <div class="clearfix"></div>   
   
		   
		<div class="election2-result">
            <div class="text">
				<center><img src="https://setopati.com/wp-content/uploads/2017/12/25114852_1694734823890511_77450172_n.jpg" class="img-responsive"></center>
            </div>
            <div class="states">
              <ul>
                <li><a href="https://setopati.com/state-one">१</a></li>
                <li><a href="https://setopati.com/state-two">२</a></li>
                <li><a href="https://setopati.com/state-three">३</a></li>
                <li><a href="https://setopati.com/state-four">४</a></li>
                <li><a href="https://setopati.com/state-five">५</a></li>
                <li><a href="https://setopati.com/state-six">६</a></li>
                <li><a href="https://setopati.com/state-seven">७</a></li>
              </ul>
            </div>
          </div>           
        
	    </div>
        <!-- left side -->
        <!-- end left side -->
      </div>
      <!-- end row -->
    </div>
    <!-- end main container -->

<?php get_footer(); ?>