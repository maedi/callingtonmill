<?php if ($teaser): ?>

	<div class="teaser">

		
			<span style="float:right">				
					<?php if($node->field_standard[0]['safe'] != NULL) : ?>
							<img src="/<?php print path_to_theme() ?>/images/aba-small.png" title="Artisan Baker Association" />
					<?php endif; ?>
			</span>

  
		<?php print $node->field_photo[0]['view']; ?>
		
		<div class="heading">
		
			<h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?> (<?php print $node->locations[0]['country_name'] ?>)</a></h2>
		
		</div>
		
		<p><?php print shorten_this($content, 140) ?>&#8230; <a href="<?php print $node_url ?>">read more</a></p>
		
	</div>

<?php else: ?>	

	<div id="aside" class="bakery">

		
		<ul>
			<?php foreach($node->field_link as $num => $array) { ?>
				<li><a href="<?php print $node->field_link[$num]['display_url']?>"><?php print $node->field_link[$num]['title']?></a></li>
			<?php } ?>
			
			<?php if($node->field_gallery_url[0]['view'] != NULL) : ?>
				<li class="icon-gallery"><a href="<?php print $node->field_gallery_url[0]['view'] ?>">Photo gallery</a></li>
			<?php endif; ?>
		</ul>
		
		<span class="photos">
			<?php print $node->field_photo[0]['view']; ?>	
			<?php
	
			if(isset($node->field_photo[1]['view'])) :

			$go_through_these = count($node->field_photo) - 1;

			for($i = 1; $i <= $go_through_these; $i++) {
			?>
				<a href="/bread/bakery/<?php print $node->field_photo[$i]['filename'] ?>" class="thickbox" rel="gallery-<?php print $node->nid ?>" alt="<?php print $node->field_photo[$i]['data']['description'] ?>" title="<?php print $node->field_photo[$i]['data']['description'] ?>" >
					<img class="small" alt="<?php print $node->field_photo[$i]['data']['description'] ?>" title="<?php print $node->field_photo[$i]['data']['description'] ?>" src="/bread/imagecache/bakery_half/bakery/<?php print $node->field_photo[$i]['filename'] ?>" />
				</a>
			<?php
			}
			;endif
			?>
		</span>
		
	</div>

	<?php print $node->content['body']['#value'] ?>
	
	
	<div class="section contact" id="contact">
		
		
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
					
		<h2>Contact details</h2>
		
		<ul>
			<p><strong>Address:</strong><br /><?php print $node->locations[0]['city'] ?>, <?php print $node->locations[0]['province_name'] ?>, <?php print $node->locations[0]['country_name'] ?>. <?php print $node->locations[0]['additional'] ?><p>
				
			<?php if($node->field_phone[0]['view'] != NULL) : ?>		
				<p><strong>Phone: </strong> <?php print $node->field_phone[0]['view'] ?></p>
			<?php endif; ?>			
		
			<?php if($node->field_website[0]['view'] != NULL) : ?>		
				<p><strong>Website: </strong> <?php print $node->field_website[0]['view'] ?></p>
			<?php endif; ?>
			
			<?php if($node->field_email[0]['view'] != NULL) : ?>		
				<p><strong>Email: </strong> <?php print $node->field_email[0]['view'] ?></p>
			<?php endif; ?>
			
			<?php if($node->locations[0]['additional'] != NULL) : ?>
				<p><strong>Additional details: </strong></p>
			<?php endif; ?>
			
			<?php if($node->field_contact_details[0]['view'] != NULL) : ?>
				<p><strong>Additional details:</strong><br /><?php print $node->field_contact_details[0]['view'] ?></p>
			<?php endif; ?>
		</ul>					
	</div>

	
	<h2 id="aba">Product Standards</h2>
	
	<div style="overflow:auto;">
	<p><a href="http://artisanbaker.org">Artisan Baker Association</a> members are encouraged to list their products and their corresponding sourdough baking standards below. Please see <a href="http://artisanbaker.org/standards">www.artisanbaker.org/standards</a> for a full description of the standards.</p>

	<img src="/<?php print path_to_theme() ?>/images/aba-small.png" style="float:left" title="Artisan Baker Association" />
	
	<?php if($node->field_standard[0]['safe'] != NULL) :
	
		$link = 'http://artisanbaker.org/standards';
		
	?>
	<table style="float:left; margin-left:0.4em">
		<thead>
			<th>Product:</th>
			<th>Standard:</th>
		</thead>
		<tbody>
			<?php foreach($node->field_standard as $num => $safe) { ?>
			<tr>
				<td>
					<?php print $node->field_product[$num]['safe'] ?>
				</td>
				<td>
					<?php 
					
					
						if($node->field_standard[$num]['safe'] == 1) { $standard = '<a href="'.$link.'#art10">ART 10 - Organic Sourdough Wholegrain</a>'; };

						if($node->field_standard[$num]['safe'] == 2) { $standard = '<a href="'.$link.'#art11">ART 11 - Organic Sourdough Sifted</a>'; };

						if($node->field_standard[$num]['safe'] == 3) { $standard = '<a href="'.$link.'#art12">ART 12 - Organic Sourdough Wholemeal</a>';	 };

						if($node->field_standard[$num]['safe'] == 4) { $standard = '<a href="'.$link.'#art20">ART 20 - Organic Sourdough Unbleached White</a>'; };

						if($node->field_standard[$num]['safe'] == 5) { $standard = '<a href="'.$link.'#art21">ART 21 - Sourdough Wholemeal OR Unbleached White</a>'; };

						if($node->field_standard[$num]['safe'] == 6) { $standard = '<a href="'.$link.'#art22">ART 22 - Organic Pre-Ferment Wholemeal OR Unbleached White</a>'; };

						if($node->field_standard[$num]['safe'] == 7) { $standard = '<a href="'.$link.'#art30">ART 30 - Organic Yeast Bread Wholemeal OR Unbleached White</a>'; };

						if($node->field_standard[$num]['safe'] == 8) { $standard = '<a href="'.$link.'#art30">ART 31 - Organic Sourdough Wholemeal OR Unbleached White+</a>'; };					

						if($node->field_standard[$num]['safe'] == 9) { $standard = '<a href="'.$link.'#art32">ART 32 - Organic Yeast Bread Wholemeal OR Unbleached White+</a>'; };

					
						print $standard;
						
					?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php
		else:
	?>				
	<table>
		<thead>
			<th>Product:</th>
			<th>Standard:</th>
		</thead>
		<tbody>
			<tr><td colspan="2">This bakery has not yet provided product standards</td></tr>
		</tbody>
	</table>
	<?php endif; ?>
	</div>
	
	<?php if ($links): ?>
      <div class="buttons"><?php print $links; ?></div>
    <?php endif; ?>

<?php endif; ?>