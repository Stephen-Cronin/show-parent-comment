jQuery(document).ready(function($){
	// set the height of the div to 25px, add some CSS and then add the Show More button after the content
	$('.spc-parent-comment').css('height','35px').css('overflow-y','hidden').before('<div class="spc-show-more" style="cursor:pointer; font-style:normal;">Show more &#9656;</div>');
	// bind the Show More button click event so we can manipulate the content and button state
	$('.spc-show-more').on('click',function() {
		// if it's partially hidden, clicking the button will show everything and change the button to Show Less
		if ($(this).next('.spc-parent-comment').height()<=35) {
			$(this).next('.spc-parent-comment').animate({height:'100%'},100,function(){
				$(this).prev('.spc-show-more').html('Show less &#9662;');
			});
		}
		// else if it's fully shown, clicking the button will revert back to 76px and change the button to Show More
		else {
			$(this).next('.spc-parent-comment').animate({height:'35px'},100,function(){
				$(this).prev('.spc-show-more').html('Show more &#9656;');
			});
		}
	});
});