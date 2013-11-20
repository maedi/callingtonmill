<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
	<div class="node-inner">
    
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>

    <?php print $user_picture; ?>
		    
    <?php if ($display_submitted): ?>
      <span class="submitted"><?php print $date; ?> — <?php print $name; ?></span>
    <?php endif; ?>

  	<div class="content">
  	  <?php 
  	    // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content);
       ?>
  	</div>
  	
    <?php if (!empty($content['links']['terms'])): ?>
      <div class="terms"><?php print render($content['links']['terms']); ?></div>
    <?php endif;?>
  	
    <?php if (!empty($content['links'])): ?>
	    <div class="links"><?php print render($content['links']); ?></div>
	  <?php endif; ?>

		<?php if ($location) : ?>
			<div id="google-map">	
				<?php
				      if ( ($location['latitude'] != 0) && ($location['longitude'] != 0) && ($teaser != 1) )
				      {
				        $homes=array('id' => 'outfittermap',
				             'zoom' => 15,
				             'behavior' => 'autozoom',
				             'width' => '400px',
				             'height' => '300px',
				             'maptype' => 'normal',
				             'latitude' => $location['latitude'],
				             'longitude'=> $location['longitude'],
				             'markers' =>
				               array( array(
				               
				                 'markername' => 'blue',
				                 'latitude' => $location['latitude'],
				                 'longitude' => $location['longitude']
				               ))
				        );

				        $outfittermap = theme('gmap', array('#settings' => $homes));
				        print $outfittermap;
				      }
				?>
			</div>	
		<?php endif; ?>

        
	</div> <!-- /node-inner -->
</div> <!-- /node-->

<?php print render($content['comments']); ?>