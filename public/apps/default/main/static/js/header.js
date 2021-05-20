$(document).on('click', 'a[data-ajax]', function (event) {
    $('body').addClass('app-loading');
    event.preventDefault();
    var url = $(this).attr('data-ajax');
    clearInterval(window.chat_interval);
    $(".lightbox__container").empty();
    $.post(site_url(url), {param1: 'value1'}, function (htmlData, textStatus, xhr) {
        window.scrollTo(0, 0);
        data = JSON.parse($(htmlData).filter('#json-data').val());
        $('#page_content').html(htmlData);
        if (typeof (data.url) == 'undefined') {
            //window.location.href = site_url('');
        } else {
            if (!data.footer) {
                $('footer').hide();
            } else {
                $('footer').show();
            }
            if (!data.header) {
                $('#header_nav').hide();
            } else {
                $('#header_nav').show();
            }
            window.history.pushState({state: 'new'}, '', site_url(data.url));
            $('title').html(data.page_title);
            if (data.app_name == 'settings' || data.app_name == 'profile') {
                $('#avatar_active').addClass('active');
            } else {
                $('#avatar_active').removeClass('active');
            }
            if (data.app_name == 'explore') {
                $('#explore_nav').addClass('active');
                $('#home_nav').removeClass('active');
                $('.home_script').remove();
                $('.profile_script').remove();
                $('.posts_script').remove();
            }
            if (data.app_name == 'home') {
                $('#home_nav').find('a').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#66757f" class="feather feather-home"><defs xmlns="http://www.w3.org/2000/svg"><linearGradient x1="19.28%" y1="86.72%" x2="88.05%" y2="12.24%" id="home"><stop stop-color="#5cb933" offset="0%"/><stop stop-color="#459522" offset="49.5%"/><stop stop-color="#41991a" offset="100%"/></linearGradient></defs><path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" fill="url(#home)"/></svg>  <span>Home</span>');
                $('#explore_nav').find('a').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#66757f" class="feather feather-compass"><path d="M7,17L10.2,10.2L17,7L13.8,13.8L7,17M12,11.1A0.9,0.9 0 0,0 11.1,12A0.9,0.9 0 0,0 12,12.9A0.9,0.9 0 0,0 12.9,12A0.9,0.9 0 0,0 12,11.1M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z" /></svg> <span>Explore</span>');
                $('.profile_script').remove();
                $('.posts_script').remove();
                $('#home_nav').addClass('active');
                $('#explore_nav').removeClass('active');
                if ($('.home_script').length == 0) {
                    $('head').append($('<script>', {
                        src: "https://demo.pixelphotoscript.com/apps/default/main/static/js/libs/afterglow.min.js",
                        class: "home_script"
                    }), $('<script>', {
                        src: "https://demo.pixelphotoscript.com/apps/default/main/static/js/libs/jquery.pause.js",
                        class: "home_script"
                    }));
                }
            }
            if (data.app_name == 'profile') {
                $('.home_script').remove();
                $('.posts_script').remove();
                $('#home_nav').removeClass('active');
                $('#explore_nav').removeClass('active');
                if ($('.profile_script').length == 0) {
                    $('head').append($('<script>', {
                        src: "https://demo.pixelphotoscript.com/apps/default/main/static/js/libs/jquery.equalheights.js",
                        class: "profile_script"
                    }));
                }
            }
            if (data.app_name == 'explore') {
                $('#home_nav').find('a').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#66757f" class="feather feather-home"><path d="M9,19V13H11L13,13H15V19H18V10.91L12,4.91L6,10.91V19H9M12,2.09L21.91,12H20V21H13V15H11V21H4V12H2.09L12,2.09Z" /></svg> <span>Home</span>');
                $('#explore_nav').find('a').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#66757f" class="feather feather-compass"><defs xmlns="http://www.w3.org/2000/svg"><linearGradient x1="19.28%" y1="86.72%" x2="88.05%" y2="12.24%" id="explore"><stop stop-color="#3D3695" offset="0%"/><stop stop-color="#953594" offset="49.5%"/><stop stop-color="#DA2129" offset="100%"/></linearGradient></defs><path d="M12 10.9c-.61 0-1.1.49-1.1 1.1s.49 1.1 1.1 1.1c.61 0 1.1-.49 1.1-1.1s-.49-1.1-1.1-1.1zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm2.19 12.19L6 18l3.81-8.19L18 6l-3.81 8.19z" fill="url(#explore)"/></svg> <span>Explore</span>');
            }
            if (data.app_name != 'explore' && data.app_name != 'home') {
                $('#home_nav').find('a').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#66757f" class="feather feather-home"><path d="M9,19V13H11L13,13H15V19H18V10.91L12,4.91L6,10.91V19H9M12,2.09L21.91,12H20V21H13V15H11V21H4V12H2.09L12,2.09Z" /></svg> <span>Home</span>');
                $('#explore_nav').find('a').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#66757f" class="feather feather-compass"><path d="M7,17L10.2,10.2L17,7L13.8,13.8L7,17M12,11.1A0.9,0.9 0 0,0 11.1,12A0.9,0.9 0 0,0 12,12.9A0.9,0.9 0 0,0 12.9,12A0.9,0.9 0 0,0 12,11.1M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z" /></svg> <span>Explore</span>');
                $('#home_nav').removeClass('active');
                $('#explore_nav').removeClass('active');
            }

            if (data.app_name == 'posts') {
                $('.home_script').remove();
                $('.profile_script').remove();
                $('#home_nav').removeClass('active');
                $('#explore_nav').removeClass('active');
                if ($('.posts_script').length == 0) {
                    $('head').append($('<script>', {
                        src: "https://demo.pixelphotoscript.com/apps/default/main/static/js/libs/afterglow.min.js",
                        class: "posts_script"
                    }));
                }
            }
            if (data.app_name == 'explore' || data.app_name == 'tags' || data.app_name == 'profile' || data.app_name == 'home') {
                if ($('.grid_a').length == 0) {
                    $('head').append($('<script>', {
                        src: "https://demo.pixelphotoscript.com/apps/default/main/static/js/libs/gridAlicious/jquery.grid-a-licious.js",
                        class: "grid_a"
                    }));
                }
            } else {
                $('.grid_a').remove();
            }
            $('#messages_nav').removeClass('active');
            if (data.app_name == 'messages') {
                $('#messages_nav').addClass('active');
            }

            $('#page_content').attr('class', 'container container-' + data.app_name + ' container-' + data.app_name + '-main');
            $('body').attr('data-app', data.app_name);
            $('body').attr('class', 'body-' + data.app_name);
            $('#header_').attr('class', 'container container-' + data.app_name + ' container-' + data.app_name + '-header');
            if (data.app_name != 'profile' || data.app_name != 'explore') {
                $('#footer_').attr('class', 'container container-' + data.app_name + ' container-' + data.app_name + '-main');
            } else {
                $('#footer_').attr('class', 'container container-' + data.app_name);
            }
            if (data.app_name == 'startup') {
                $('footer').attr('class', 'footer_class');
            }
            $('.tl-follow-suggestions').slick({
                infinite: false,
                slidesToShow: 4,
                variableWidth: false,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 300,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
            $('.post-follow-suggestions').slick({
                infinite: false,
                slidesToShow: 5,
                variableWidth: false,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 300,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
            $('body').removeClass('app-loading');
        }

    });

});
