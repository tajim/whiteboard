<?php
/**
 * Template part for displaying Election Tabel on Homepage
 *
 * @package setopati
 */
?>


<div class="container">
                                
					<?php             
                    $query_args = array(
                    'post_type' => 'page',
                    'posts_per_page' => 1,
//					'post__in' => array(45787) //local										
					'post__in' => array(52412) //staging									
//					'post__in' => array(54197)	//livesite																			
                    );                            
                    $the_query = new WP_Query( $query_args ); ?>                            
                    <?php if ( $the_query->have_posts() ) : ?>                            
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>     
                    
                    
                        <div class="header-labels">
                                <h2>स्थानीय निर्वाचन परिणाम</h2>
                                <br /><br />
                           </div>                                                                        
                           
	                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                            <div class="header-labels">
                            <h2>Election Live Updates</h2>
                            </div>                            
							<a class="twitter-timeline" data-width="290" data-height="708" data-link-color="#1F7163" href="https://twitter.com/setopati">Tweets by @setopati</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>                                                         
                                               
	                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        
	                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <table class="table table-striped comparison-table table-responsive">
	                                <tr><th colspan="3">सबै मेयर/अध्यक्षमा को अगाडि</th></tr>
                                    <tr>
                                        <td class="heading">दल</td>
                                        <td class="heading">विजयी </td>
                                        <td class="heading">अग्रता</td>
                                    </tr>                                    
                                    
									<?php
                                    if( have_rows('party_wide_table') ):
                                        while ( have_rows('party_wide_table') ) : the_row();
                                    ?>
                                    <tr>
                                        <td><?php the_sub_field('party_name'); ?></td>
                                        <td><?php the_sub_field('party_win'); ?></td>
                                        <td><?php the_sub_field('party_leading'); ?></td>
                                    </tr>                                                                           
                                    <?php
                                        endwhile;
                                    
                                    else :
                                    endif;
                                    ?>                                                                        

                                    
                                </table>
                            </div>
                            
	                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <table class="table table-striped comparison-table table-responsive">
	                                <tr><th colspan="3">वीरगन्ज महानगरपालिका</th></tr>
                                    <tr>
                                        <td class="heading">उम्मेदवार</td>
                                        <td class="heading">मेयर</td>
                                        <td class="heading">उपमेयर</td>
                                    </tr>                                    
									<?php
                                    if( have_rows('birgunj_table') ):
                                        while ( have_rows('birgunj_table') ) : the_row();
                                    ?>
                                    <tr>
                                        <td><?php the_sub_field('candiate_name'); ?></td>
                                        <td><?php the_sub_field('mayor_votes'); ?></td>
                                        <td><?php the_sub_field('upmayor_votes'); ?></td>
                                    </tr>                                                                           
                                    <?php
                                        endwhile;
                                    
                                    else :
                                    endif;
                                    ?>                                       
                                </table>
                            </div>             
                            
							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <table class="table table-striped comparison-table table-responsive">
	                                <tr><th colspan="3">जनकपुर उपमहानगरपालिका</th></tr>
                                    <tr>
                                        <td class="heading">उम्मेदवार</td>
                                        <td class="heading">मेयर</td>
                                        <td class="heading">उपमेयर</td>
                                    </tr>                                    
									<?php
                                    if( have_rows('janakpur_table') ):
                                        while ( have_rows('janakpur_table') ) : the_row();
                                    ?>
                                    <tr>
                                        <td><?php the_sub_field('candiate_name'); ?></td>
                                        <td><?php the_sub_field('mayor_votes'); ?></td>
                                        <td><?php the_sub_field('upmayor_votes'); ?></td>
                                    </tr>                                                                           
                                    <?php
                                        endwhile;
                                    
                                    else :
                                    endif;
                                    ?>                                       
                                </table>
                            </div>             
                            
                            <div class="clearfix"></div>                                           
                            
	                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <table class="table table-striped comparison-table table-responsive">
	                                <tr><th colspan="3">जीतपुर सिमरा उपमहानगरपालिका</th></tr>
                                    <tr>
                                        <td class="heading">उम्मेदवार</td>
                                        <td class="heading">मेयर</td>
                                        <td class="heading">उपमेयर</td>
                                    </tr>                                    
									<?php
                                    if( have_rows('jeetpur-simara_table') ):
                                        while ( have_rows('jeetpur-simara_table') ) : the_row();
                                    ?>
                                    <tr>
                                        <td><?php the_sub_field('candiate_name'); ?></td>
                                        <td><?php the_sub_field('mayor_votes'); ?></td>
                                        <td><?php the_sub_field('upmayor_votes'); ?></td>
                                    </tr>                                                                           
                                    <?php
                                        endwhile;
                                    
                                    else :
                                    endif;
                                    ?>                                       
                                </table>
                            </div>             
                                                        
	                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <table class="table table-striped comparison-table table-responsive">
	                                <tr><th colspan="3">कलैया उपमहानगरपालिका</th></tr>
                                    <tr>
                                        <td class="heading">उम्मेदवार</td>
                                        <td class="heading">मेयर</td>
                                        <td class="heading">उपमेयर</td>
                                    </tr>                                    
									<?php
                                    if( have_rows('kalaiya_table') ):
                                        while ( have_rows('kalaiya_table') ) : the_row();
                                    ?>
                                    <tr>
                                        <td><?php the_sub_field('candiate_name'); ?></td>
                                        <td><?php the_sub_field('mayor_votes'); ?></td>
                                        <td><?php the_sub_field('upmayor_votes'); ?></td>
                                    </tr>                                                                           
                                    <?php
                                        endwhile;
                                    
                                    else :
                                    endif;
                                    ?>                                       
                                </table>
                            </div>             
                            	                                     
                            
	                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <table class="table table-striped comparison-table table-responsive">
	                                <tr><th colspan="3">लहान नगरपालिका</th></tr>
                                    <tr>
                                        <td class="heading">उम्मेदवार</td>
                                        <td class="heading">मेयर</td>
                                        <td class="heading">उपमेयर</td>
                                    </tr>                                    
									<?php
                                    if( have_rows('lahan_table') ):
                                        while ( have_rows('lahan_table') ) : the_row();
                                    ?>
                                    <tr>
                                        <td><?php the_sub_field('candiate_name'); ?></td>
                                        <td><?php the_sub_field('mayor_votes'); ?></td>
                                        <td><?php the_sub_field('upmayor_votes'); ?></td>
                                    </tr>                                                                           
                                    <?php
                                        endwhile;
                                    
                                    else :
                                    endif;
                                    ?>                                       
                                </table>
                            </div>             
                            
                            <div class="clearfix"></div>                            
                            
<div class="block-ad">
	<center><a target="_blank" href="http://www.nicasiabank.com/"><img class="aligncenter img-responsive hidden" src="http://setopati.com/wp-content/uploads/2017/06/nic-asia.gif" alt=""></a></center>
</div>                                                        

                            <div class="clearfix"></div>                            
                            
	                                     
                            
	                                     
                            
	                                                                                                                                                                                                                                         
                            
							                                                  
                             <div class="clearfix"></div>
							                            
                        
                        </div>
                        
	                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-md hidden-lg">
                            <div class="header-labels">
                            <h2>Election Live Updates</h2>
                            </div>                            
							<a class="twitter-timeline" data-width="320" data-height="408" data-link-color="#1F7163" href="https://twitter.com/setopati">Tweets by @setopati</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>                                                         
                        
                                          
                        
                    
                    <?php 
                    endwhile; 
                    ?>
                    <!-- end of the loop -->                            
                    <?php wp_reset_postdata(); ?>                            
                    <?php else:  ?>
                    <?php endif; ?>                                          
                    
</div>                    

       
        <div class="clearfix"></div>