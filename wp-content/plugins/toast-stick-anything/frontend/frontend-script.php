<?php function addToastsiJavascript(){ ?>
<?php $json = stripslashes(get_option('toastsi-json')); ?>
<?php $items = json_decode($json); ?>

<script>
jQuery(window).ready(function(){
<?php foreach($items as $item): ?>	
setTimeout(function(){
	// $item->blocked
	// $item->margintop
	// $item->name
	// $item->screenwidth
	
	
jQuery('<?php echo $item->name; ?>').each(function(){
		var element = jQuery(this);
		var elementOffsetTop = jQuery(this).offset().top - <?php echo $item->margintop; ?>;
		var elementOffsetLeft = jQuery(this).offset().left - parseInt(jQuery(this).css('margin-left'));
		var elementHeight = jQuery(this).outerHeight();
		var elementMarginLeft = parseInt(jQuery(this).css('margin-left'));
		var elementMarginRight = parseInt(jQuery(this).css('margin-right'));
		var elementWidth = jQuery(this).outerWidth();
		var parentHeight = jQuery(this).parent().height() + jQuery(this).parent().offset().top;
	
if(jQuery(window).width() > <?php echo $item->screenwidth; ?>){
	jQuery(window).on('scroll', function(){
		var scrollPosition = jQuery(window).scrollTop();
		elementWidth = jQuery(element).outerWidth();
		elementHeight = jQuery(element).outerHeight();	
	
		if(scrollPosition > elementOffsetTop){
			if(! jQuery(element).next().hasClass('cloned-sti')){
				jQuery(element).after(jQuery(element).clone().css({'opacity': 0, 'margin-left': elementMarginLeft, 'margin-right': elementMarginRight}).addClass('cloned-sti'))
				jQuery(element).addClass('element-stuck');
			}
			jQuery(element).css({'position': 'fixed', 'top': <?php echo $item->margintop; ?>, 'left': elementOffsetLeft, 'height': elementHeight, 'width': elementWidth, 'margin-left': elementMarginLeft, 'margin-right': elementMarginRight});
		}else{
			jQuery(element).removeAttr('style');
			jQuery(element).next('.cloned-sti').remove();
			jQuery(element).removeClass('element-stuck');
		}
	
	<?php if($item->blocked == 'enabled'): ?>
	if(jQuery(element).offset().top + elementHeight > parentHeight){
		var minusAmount = parentHeight - (jQuery(element).offset().top + elementHeight);
		jQuery(element).css({'position': 'fixed', 'top': minusAmount + <?php echo $item->margintop; ?>});
	}
	
	<?php endif; ?>
	
	})//SCROLL FUNCTION
}//SCREENWIDTH
});
		
}, 300);
<?php endforeach; ?>
		
})	
</script>
<?php }
add_action('wp_footer', 'addToastsiJavascript'); ?>