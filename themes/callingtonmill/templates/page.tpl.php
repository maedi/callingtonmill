<div id="wrap">
  <div id="page" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  
    <!-- ______________________ HEADER _______________________ -->
  
    <div id="header">
  
      <div id="header-shadow"></div>

      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
	    <img id="logo" src="/<?php print path_to_theme() ?>/images/logo.png">
	  </a>
	  
	  <div id="user">
  	    <?php if (user_is_logged_in()) { ?>
  	      <a href="/user">My Account</a>
	    <?php } else { ?>
		  <a href="/user">Login</a>
	    <?php } ?>
	  </div>

      <?php if ($page['header']): ?>
        <div id="slideshow">
          <?php print render($page['header']); ?>
        </div>
      <?php endif; ?>
  
    </div> <!-- /header -->
  
    <!-- ______________________ MAIN _______________________ -->
  
    <div id="main" class="clearfix">
  
      <div id="content">
        <div id="content-inner" class="inner column center">
  
          <?php if ($breadcrumb || $title|| $messages || $tabs || $action_links): ?>
            <div id="content-header">
  
              <?php print $breadcrumb; ?>
  
              <?php if ($page['highlight']): ?>
                <div id="highlight"><?php print render($page['highlight']) ?></div>
              <?php endif; ?>

	          <?php if ($title): ?>
	          
                <?php
                global $user;
                if (in_array('administrator', array_values($user->roles)) || in_array('staff', array_values($user->roles))) {
                  if(arg(2) != 'edit' && isset($node)) {
			        $destination = drupal_get_destination();
			        $destination = $destination['destination'];              
                  ?>
                    <a id="edit" class="btn" href="/node/<?php print $node->nid ?>/edit?destination=<?php print $destination ?>">Edit Page</a>
                  <?php
                  }
                }
                ?>

              <?php endif; ?>

              <?php if ($title): ?>
                <h1 class="title"><?php print $title; ?></h1>
              <?php endif; ?>
  
              <?php print $messages; ?>
              <?php print render($page['help']); ?>
              
              
<?php
  if(isset($node)) {
    if ($tabs && $node->type == 'product') {
?>
  <div class="tabs"><?php print render($tabs); ?></div>
<?php
    }
  }
?>
  
              <?php if ($action_links): ?>
                <ul class="action-links"><?php print render($action_links); ?></ul>
              <?php endif; ?>
              
            </div> <!-- /#content-header -->
          <?php endif; ?>
  
          <div id="content-area">
            <?php print render($page['content']) ?>
            <?php print render($page['content_bottom']) ?>
          </div>
  
          <?php print $feed_icons; ?>
  
        </div>
      </div> <!-- /content-inner /content -->
  
      <?php if ($main_menu || $secondary_menu): ?>
        <div id="navigation" class="menu <?php if (!empty($main_menu)) {print "with-primary";} if (!empty($secondary_menu)) {print " with-secondary";} ?>">
          <?php print theme('links', array('links' => $main_menu, 'attributes' => array('id' => 'primary', 'class' => array('links', 'clearfix', 'main-menu')))); ?>
          <?php //print theme('links', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary', 'class' => array('links', 'clearfix', 'sub-menu')))); ?>
        </div>
      <?php endif; ?>
  
  
      <?php if ($page['sidebar_second']): ?>
        <div id="sidebar" class="column sidebar second">
          <div id="sidebar-inner" class="inner">
            <?php print render($page['sidebar_second']); ?>
          </div>
        </div>
      <?php endif; ?> <!-- /sidebar-second -->
  
    </div> <!-- /main -->
  
    <!-- ______________________ FOOTER _______________________ -->
  
    <?php if ($page['footer']): ?>
      <div id="footer">
	    <div class="inner">
          <?php print render($page['footer']); ?>

          <div id="est">
	        <big>est. 1837</big>
	        <p>&copy; <?php print date('Y'); ?> Southern Midlands Council</p>
	      </div>
	
        </div>

      </div> <!-- /footer -->
    <?php endif; ?>


    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-2597912-12']);
      _gaq.push(['_setDomainName', 'callingtonmill.com.au']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
    
  
  </div> <!-- /page -->
</div> <!-- /wrap -->