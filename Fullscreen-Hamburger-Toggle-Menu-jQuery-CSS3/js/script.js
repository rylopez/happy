// jQuery fullscreen-menu script example.

// Click to toggle the hamburger-icon animation and add the fullscreen-menu overlay.
$(document).ready(function(){
	$('#nav-icon').click(function(){
		$(this).toggleClass('animate-icon');
		$('#overlay').fadeToggle();
	});
});

// Clicking anywhere on the overlay closes the fullscreen-menu overlay and resets hamburger-icon.
$(document).ready(function(){
	$('#overlay').click(function(){
		$('#nav-icon').removeClass('animate-icon');
		$('#overlay').toggle();
	});
});
