jQuery(document).ready(function($){
	// set the height of the div to 76px, add some CSS and then add the Show More button after the content
	$('.spc-parent-comment').css('height','76px').css('overflow-y','hidden').after('<div class="spc-show-more" style="color:#555555; cursor:pointer; font-size:.9em; text-align:center; border-top:1px solid #DDDDDD;">Show more &darr;</div>');
	// bind the Show More button click event so we can manipulate the content and button state
	$('.spc-show-more').on('click',function() {
		// if it's partially hidden, clicking the button will show everything and change the button to Show Less
		if ($(this).prev('.spc-parent-comment').height()<=76) {
			$(this).prev('.spc-parent-comment').animate({height:'100%'},500,function(){
				$(this).next('.spc-show-more').html('Show less &uarr;');
			});
		}
		// else if it's fully shown, clicking the button will revert back to 76px and change the button to Show More
		else {
			$(this).prev('.spc-parent-comment').animate({height:'76px'},500,function(){
				$(this).next('.spc-show-more').html('Show more &darr;');
			});
		}
	});
});