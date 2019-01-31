<div class="col6 latest-post-item highlighted"> 
            <div class="highlight-wrapper"> 
                <div class="img-container noto text-uppercase">
                    <div class="img-wrap o-fit">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large');?></a> 
                    </div>
                </div>
                <div class="text-wrap flex flex-wrap">
                    <div class="col5 title-wrapper">
                        <!-- <div class="caption noto">Caption</div> -->
                        <?php
                    $categories = get_the_category();
                    $categid=$categories[0]->term_id;
                    $ancestorId='';
                    if(count(get_ancestors($categid, 'category'))){
                        $ancestorId=get_ancestors($categid, 'category')[0];
                    }
                    $cat_slug=$categories[0]->slug;
                    if($ancestorId){                                            $anc_slug=get_category($ancestorId)->slug;
                    }
                    else{
                        $anc_slug='';
                    }
                    
                    if ( $categories[0] ) {
                    echo '<h5 class="caption title noto"><a href="' . get_category_link( $categid ) . '">' . $categories[0]->cat_name . '</a></h5>';
                        }
                        ?>
                        <div class="post-date-wrap">
                            <p class="month-year noto"><?php echo get_the_time('M Y.');?></p>
                            <span class="day frank"><?php echo get_the_time('d');?></span>
                        </div>
                        <div class="title frank">
                            <?php $the_title = get_the_title(); ?>
                            <a title="<?php if(strlen($the_title) > 45) echo $the_title; ?>" href="<?php the_permalink(); ?>"><?php 
                                    if(strlen($the_title) > 50)
                                     $the_title = substr($the_title,0,47) . "...";
                                     echo $the_title; ?></a>
                        </div>
                    </div>
                    <div class="col7">
                        <div class="content-wrapper">
                            <div class="<?php echo $cat_slug.' '.$anc_slug;?> author title-bar noto">
                            <?php echo '<span class="text-capitalize">'. ucwords(get_the_author_posts_link() ) .'</span> | ' . __('AUTOR','bud3');?>
                        	</div>
                            <div class="content frank"><?php the_excerpt();?></div>
                        </div>
                    </div>
                    <a class="post-link noto t-bold" href="<?php echo get_the_permalink();?>">+</a>
                </div>
            </div>
             <?php 
                    $the_title = get_the_title();
                    $word_count = str_word_count($the_title);
                    $custom_title = get_field('long_post_or_big_post_custom_title');

                    if($custom_title) {
                ?>
            <h3 class="<?php echo $cat_slug.' '.$anc_slug;?> text-uppercase title-bar">
               
                <a href="<?php the_permalink(); ?>">
                    <?php 
                     /*   if ($word_count <= 2) {
                            $str = str_replace(" ","<br />",$the_title);
                             echo $str; 

                        } else {
                           echo  $the_title; 
                        }*/
                        echo $custom_title;
                         //   $result = preg_replace("/(<[^>]+>)?\\w*/us", "<span>$0</span>", $the_title);
                       
                    ?>                    
                </a>                  
            </h3>
             <?php } //endif custom_title?>
        </div>