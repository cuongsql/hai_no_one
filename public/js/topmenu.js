//    jQuery(document).ready(function($) {
//             $("#get-notifications").click(function(event) {
//             var notf_list = $("#notifications__list");
//             var preloader = notf_list.next('.preloader').clone().removeClass('hidden');
//             notf_list.html(preloader);
//             get_notifications();
//             delay(function(){
            
//             },400);
//         });
//         $("#get-follow-requests").click(function(event) {
//             var notf_list = $("#requests__list");
//             var preloader = notf_list.next('.preloader').clone().removeClass('hidden');
//             notf_list.html(preloader);
//             get_requests();
//             delay(function(){
            
//             },400);
//         });
        
//         $("input#search-users").blur(function(event) {
//             delay(function(){
//                 $(".search-result").fadeOut(10);
//             },500);
//         });
    
//         $("input#search-users").focus(function(event) {
//             delay(function(){
//                 $(".search-result").fadeIn(10);
//             },500);
//         });
    
//         $(document).ready(function() {
//             $(window).keydown(function(event){
//                 if(event.keyCode == 13) {
//                     event.preventDefault();
//                     return false;
//                 }
//             });
//         });
    
//         $("input#search-users").keyup(function(event) {
//             var keyword =  $(this).val();
//             var desturl = link('main/search-users');
//             var zis     = $(this);
    
//             if( $('body').attr('data-app') == 'blog' ){
//                 desturl = link('main/search-blog');
//                 if(event.which === 13){
//                     event.preventDefault();
//                     event.stopImmediatePropagation();
//                     console.log(keyword);
    
//                     $.ajax({
//                         url: desturl,
//                         type: 'POST',
//                         dataType: 'json',
//                         data: {kw:keyword},
//                     })
//                     .done(function(data) {
//                         if (data.status == 200) {
//                             $(".home-posts-container").html(data.html);
//                         }
//                     });
    
//                     return false;
//                 }
//             }else{
    
//                 if (/^\#(.+)/.test(keyword)) {
//                     desturl = link('main/search-posts');
//                     keyword = keyword.substring(1);
//                 }
    
//                 if (keyword.length >= 3) {
//                     zis.siblings('.pp_head_search_loader').fadeIn(100);
//                     $.ajax({
//                         url: desturl,
//                         type: 'POST',
//                         dataType: 'json',
//                         data: {kw:keyword},
//                     })
//                     .done(function(data) {
//                         if (data.status == 200) {
//                             $(".search-result").html(data.html);
//                         }
//                         else{
//                             $(".search-result").empty();
//                         }
//                     });
    
//                     delay(function(){
//                         zis.siblings('.pp_head_search_loader').fadeOut(100);
//                     },500);
//                 }
    
//             }
    
//         });
//     });
    
    
//     var didScroll;
//     var lastScrollTop = 0;
//     var delta = 5;
//     var navbarHeight = $('#header_nav').outerHeight();
    
//     $(window).scroll(function(event){
//         didScroll = true;
//     });
    
//     setInterval(function() {
//         if (didScroll) {
//             hasScrolled();
//             didScroll = false;
//         }
//     }, 250);
    
//     function hasScrolled() {
//         var st = $(this).scrollTop();
//         if(Math.abs(lastScrollTop - st) <= delta)
//             return;
//         if (st > lastScrollTop && st > navbarHeight){
//             $('nav.navbar-fixed-top').removeClass('nav-down').addClass('nav_up');
//         } else {
//             if(st + $(window).height() < $(document).height()) {
//                 $('nav.navbar-fixed-top').removeClass('nav_up').addClass('nav-down');
//             }
//         }
//         lastScrollTop = st;
//     }
       
//       jQuery(document).ready(function($) {
//         $(".create-new-post").click(function(event) {
//             var post_type = $(this).attr('data-type');
//             if (post_type) {
//                 $("#modal-progress").removeClass('hidden');
//                 $.ajax({
//                     url: link('posts/new-' + post_type),
//                     type: 'GET',
//                     dataType: 'json',
//                 })
//                 .done(function(data) {
//                     if (data.status == 200) {
//                         $('body').addClass('active');
//                         $("#create-newpost").html(data.html).fadeIn(100);
//                     }
//                     else{
//                         if (data.message) {
//                             $.toast(data.message,{
//                               duration: 5000, 
//                               type: '',
//                               align: 'top-right',
//                               singleton: false
//                             });
//                         }
//                     }
//                     $("#modal-progress").addClass('hidden');
//                 });
//             }
//         });
//         $(document).on('click','#close-anim-modal',function(event) {
//             $("#create-newpost").fadeOut(100,function(){
//                 $(this).empty();
//                 $("body").removeClass('active');
//             });
//         });
//         $(document).on('click','#close-anim-image-modal',function(event) {
//             $("#create-newpost").fadeOut(100,function(){
//                 $(this).empty();
//                 $("body").removeClass('active');
//             });
//             if (typeof(JEEFACEFILTERAPI) != 'undefined') {
//               var tracks = JEEFACEFILTERAPI.getVideoInfo().getTracks();
//               if (typeof(tracks) != 'undefined'){
//                   for (var i = 0; i < tracks.length; i++) {
//                       tracks[i].stop();
//                   }
//               }
//             }
//             delete window.rvideo;
//             delete window.cframe;
//             delete window.rvideo_thumb;
//             clearInterval(video_timer_);
//             totalSeconds = 0;
//             secondsLabel.innerHTML = '00';
//             minutesLabel.innerHTML = '00';
//             if (typeof (mediaRecorder) != 'undefined') {
//                 if (mediaRecorder.state == 'recording') {
//                     mediaRecorder.stop();
//                 }
//             }
            
    
    
//             $('.fireworks').remove();
//             $('.faceDeform').remove();
//             $('.dog_face').remove();
//             $('.football').remove();
//             $('.matrix').remove();
//             $('.luffys_hat_1').remove();
//             $('.luffys_hat_2').remove();
//             $('.cloud').remove();
//         });
//         $(document).keyup(function(e) {
//             if (e.keyCode == 27) {
//                 $("#create-newpost").fadeOut(100,function(){
//                 $(this).empty();
//                 $("body").removeClass('active');
//             });
//             }
//         });
//       });