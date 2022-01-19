<script src="{{URL::asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{URL::asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/easing/easing.js')}}"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b398c764af8e57442dc3e17/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!-- Back To Top-->
<script>
 
jQuery(document).ready(function() {
 
var offset = 250;
 
var duration = 300;
 
jQuery(window).scroll(function() {
 
if (jQuery(this).scrollTop() > offset) {
 
jQuery('.back-to-top').fadeIn(duration);
 
} else {
 
jQuery('.back-to-top').fadeOut(duration);
 
}
});
 
 
 
jQuery('.back-to-top').click(function(event) {
 
event.preventDefault();
 
jQuery('html, body').animate({scrollTop: 0}, duration);
 
return false;
 
})
 
});
 
</script>