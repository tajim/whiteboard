<?php
/**
 * Template part for displaying Election Tabel on Homepage
 *
 * @package setopati
 */
?>


<div class="container">

			<div class="election-2">

					<?php             
                    $query_args = array(
                    'post_type' => 'page',
                    'posts_per_page' => 1,
					'post__in' => array(54197) //live
                    );                            
                    $the_query = new WP_Query( $query_args ); ?>                            
                    <?php if ( $the_query->have_posts() ) : ?>                            
                    
                    <div class="header-labels">
                    <h2>प्रतिनिधि सभा निर्वाचन परिणाम</h2>
                   </div> 

                              <table class="table table-striped comparison-table table-responsive">
                                <tbody>
                                  <tr>
                                    <th rowspan="2" >दल</th>
                                    <th colspan="2" style="border-right:1px solid #ddd;"><center><strong>प्रतिनिधि सभा</strong></center></th>
                                    <th colspan="2" style="border-right:1px solid #ddd;"><center><strong>प्रदेश सभा</strong></center></th>
                                  </tr>
                                  <tr>
                    
                                    <th>विजयी </th>
                                    <th style="border-right:1px solid #ddd;">अग्रता</th>
                                    <th>विजयी </th>
                                    <th style="border-right:1px solid #ddd;">अग्रता</th>
                                  </tr>
                                  
                                  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>                   

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
                                                if( have_rows('center') ): 
                                                while( have_rows('center') ): the_row(); 
                                                $center_win = get_sub_field('center_win');
                                                $center_leading = get_sub_field('center_leading');
                                                ?>                                                
                                                
                                                <td><strong><?php echo $center_win; ?></strong></td>
                                                <td><strong><?php echo $center_leading; ?></strong></td>

												<?php endwhile; ?>
                                                <?php endif; ?>   
                                                                  
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
	          </div>
                   
                    <?php endwhile; ?>
                    <!-- end of the loop -->                            
                    <?php wp_reset_postdata(); ?>                            
                    <?php else:  ?>
                    <?php endif; ?>                                    

        <div class="clearfix"></div>   
   
		   
		<div class="election2-result">
            <div class="text">
				<center><img src="https://setopati.com/wp-content/uploads/2017/12/25114852_1694734823890511_77450172_n.jpg" class="img-responsive"><!--	center--></center>
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
          
		  <div class="clearfix"></div>          
          
          

                        <div class="election2-live">
                        
					<?php             
                    $query_args = array(
                    'post_type' => 'page',
                    'posts_per_page' => 1,
					'post__in' => array(54197) //live									
                    );                            
                    $the_query = new WP_Query( $query_args ); ?>                            
                    <?php if ( $the_query->have_posts() ) : ?>            
                                  
                            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>                     
                                    <div class="col-lg-4  col-lg-offset-2 col-sm-6">
                                      <div class="live-table">
										<img src="https://setopati.com/wp-content/uploads/2017/12/24992142_1694510270579633_1311229921_n.jpg" class="img-responsive">
                                        <div class="table-wrapper">
                                        
                                            <?php
											$count = 1;
                                            if( have_rows('top_leaders_table') ):
                                            while ( have_rows('top_leaders_table') ) : the_row();
											if ($count % 2  == 0) {											
											 	$grayclass = "table-gray";
											}
											else {
											 	$grayclass = "notgray";											
											}
                                            ?>
                                            
                                              <table class="table table-bordered <?php echo $grayclass; ?>">
                                                <tr>
                                                  <th><?php the_sub_field('leader_name'); ?></th>
                                                  <th><?php the_sub_field('leader_vote'); ?></th>
                                                </tr>
                                                <tr>
                                                  <th><?php the_sub_field('opponent_name'); ?></th>
                                                  <th><?php the_sub_field('opponent_vote'); ?></th>
                                                </tr>
                                              </table>                    
                                            
                                            <?php
											$count++;
                                            endwhile;					
                                            else :
                                            endif;
                                            ?>                
                                                          
                                        </div>
                                      </div>
                                    </div>
						<?php endwhile; ?>
                        <!-- end of the loop -->                            
                        <?php wp_reset_postdata(); ?>                            
                        <?php else:  ?>
                        <?php endif; ?>             
                         
                        <div class="col-lg-4 col-lg-offset-right-2 col-sm-6">
                          <div class="live-text">
							<img src="https://setopati.com/wp-content/uploads/2017/12/24829059_1693635630667097_172823460_n-1.jpg" style="max-width:100%; height:auto;" />
                            <div class="text-wrapper">
                              <a class="twitter-timeline"
                              href="https://twitter.com/setopati">
                              Tweets by @setopati
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>          
   
   
                                                                                           
</div>                    
   
        <div class="clearfix"></div>