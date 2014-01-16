<?php $customimg = get_post_meta($post->ID,"_eo_cust_post_feat_img",true); ?>
<?php
global $eo_options;
$lsiz = $eo_options["loop_siz"];
($lsiz == "double") ? $post_cl = 'col-lg-6' : $post_cl = 'clearfix';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_cl); ?> role="article">
    <header>    
		<div class="page-header"><h2 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
    </header> <!-- end article header -->
	<section class="post_content">
		  <?php   if ( has_post_thumbnail() ) { 
                     $thumbargs = array(
                //	'src'	=> $src,
                    'class' => 'feat-thumb img-responsive',
                    'alt'	=> trim(strip_tags(get_the_title() ) ),
                    'title'	=> trim(strip_tags(get_the_title() ) )
                    );
                    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
                    echo '<a href="' . $large_image_url[0] . '" class="thumbnail cboxElement cbinl col-sm-3 col-md-4 col-lg-3">';
                    the_post_thumbnail( 'eo-highlight',$thumbargs ); 
                    echo '</a>';
                }
                elseif($customimg) { 
                    $pimg = '<a href="'.$customimg. '" class="thumbnail cboxElement cbinl col-sm-3 col-md-4 col-lg-3" title="' . the_title_attribute('echo=0') . '"><img src="'.$customimg.'" class="featurette-image img-responsive custimg" /></a>';
                    echo $pimg;
                }
                    the_content();
                ?>
	</section> <!-- end article section -->
  
  <footer>
      <div class="post_meta"><?php _e("Posted", "bonestheme"); ?>
      	<time datetime="<?php the_time('Y-m-j'); ?>" pubdate><?php echo '<span class="glyphicon glyphicon-time"></span> '.get_the_date('Y-m-d'); ?></time>
        <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "bonestheme"); ?> <?php the_category(', '); ?>.
		<span class="tags"><span class="glyphicon glyphicon-tags"></span><?php the_tags('<span class="tags-title">' . __("Tags", "bonestheme") . ':</span> ', ' ', ''); ?></span>
    </div>
    
  </footer> <!-- end article footer -->

</article> <!-- end article -->