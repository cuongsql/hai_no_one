	function follow(user_id,object){
		if (!user_id || !object) { return false; }
		if (not(is_logged())) {
			redirect('welcome');
			return false;
		}

		object = $(object);

		var profile_type = object.attr('data-profile-type');
		if (profile_type == 0 || profile_type == 1) {
			if(object.hasClass('btn-requested') == true){
				object.find('span').text("Follow");
				object.find('svg').html('<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line>');

				if (object.hasClass('btn-requested')) {
					object.removeClass('btn-requested');
				}
			}
			else if(object.hasClass('btn-following') == true){
				object.find('span').text("Follow");
				object.find('svg').html('<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line>');

				if (object.hasClass('btn-following')) {
					object.removeClass('btn-following');
				}
			}
			else if (object.hasClass('btn-following') == false && object.hasClass('btn-requested') == false) {
				object.find('span').text("Requested");
				object.find('svg').html('<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline>');

				if (!object.hasClass('btn-requested')) {
					object.addClass('btn-requested');
				}
			}
		}
		else{
			if (object.hasClass('btn-following') == false) {
				object.find('span').text("Following");
				object.find('svg').html('<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline>');

				if (!object.hasClass('btn-following')) {
					object.addClass('btn-following');
				}
			}
			else if(object.hasClass('btn-following') == true){
				object.find('span').text("Follow");
				object.find('svg').html('<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line>');

				if (object.hasClass('btn-following')) {
					object.removeClass('btn-following');
				}
			}
			else{
				return false;
			}

		}

		
		
		$.ajax({
			url: link('main/follow'),
			type: 'GET',
			dataType: 'json',
			data: {user_id:user_id},
		}).done(function(data) {});
	}

	function report_post(post_id,zis) {
		if (not(is_logged())) {
			redirect('welcome');
			return false;
		}
		if (!post_id || !zis) {
			return false;
		}

		$.ajax({
			url: link('posts/report'),
			type: 'POST',
			dataType: 'json',
			data: {id: post_id},
		})
		.done(function(data) {
			if (data.status == 200 && data.code == 1) {
				$(zis).find('a').text('Cancel report');
			}
			else if(data.status == 200 && data.code == 0){
				$(zis).find('a').text('Report this post');
			}

			$.toast(data.message,{
              duration: 5000, 
              type: '',
              align: 'top-right',
              singleton: false
            });
		});
	}
// time ago plugin    
!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):t(jQuery)}(function(t){t.timeago=function(e){return e instanceof Date?o(e):o("string"==typeof e?t.timeago.parse(e):"number"==typeof e?new Date(e):t.timeago.datetime(e))};var e=t.timeago;t.extend(t.timeago,{settings:{refreshMillis:6e4,allowPast:!0,allowFuture:!1,localeTitle:!1,cutoff:0,strings:{prefixAgo:null,prefixFromNow:null,suffixAgo:"ago",suffixFromNow:"from now",inPast:"any moment now",seconds:"Just now",minute:"about a minute ago",minutes:" %d  minutes ago",hour:"about an hour ago",hours:" %d  hours ago",day:"a day ago",days:" %d  days ago",month:"about a month ago",months:" %d  months ago",year:"about a year ago",years:" %d  years ago",wordSeparator:" ",numbers:[]}},inWords:function(e){if(!this.settings.allowPast&&!this.settings.allowFuture)throw"timeago allowPast and allowFuture settings can not both be set to false.";var a=this.settings.strings,i=a.prefixAgo;a.suffixAgo;if(this.settings.allowFuture&&e<0&&(i=a.prefixFromNow,a.suffixFromNow),!this.settings.allowPast&&e>=0)return this.settings.strings.inPast;var o=Math.abs(e)/1e3,n=o/60,r=n/60,s=r/24,l=s/365;function m(i,o){var n=t.isFunction(i)?i(o,e):i,r=a.numbers&&a.numbers[o]||o;return n.replace(/%d/i,r)}var u=o<45&&m(a.seconds,Math.round(o))||o<90&&m(a.minute,1)||n<45&&m(a.minutes,Math.round(n))||n<90&&m(a.hour,1)||r<24&&m(a.hours,Math.round(r))||r<42&&m(a.day,1)||s<30&&m(a.days,Math.round(s))||s<45&&m(a.month,1)||s<365&&m(a.months,Math.round(s/30))||l<1.5&&m(a.year,1)||m(a.years,Math.round(l)),h=a.wordSeparator||"";return void 0===a.wordSeparator&&(h=" "),t.trim([i,u].join(h))},parse:function(e){var a=t.trim(e);return a=(a=(a=(a=(a=a.replace(/\.\d+/,"")).replace(/-/,"/").replace(/-/,"/")).replace(/T/," ").replace(/Z/," UTC")).replace(/([\+\-]\d\d)\:?(\d\d)/," $1$2")).replace(/([\+\-]\d\d)$/," $100"),new Date(a)},datetime:function(a){var i=e.isTime(a)?t(a).attr("datetime"):t(a).attr("title");return e.parse(i)},isTime:function(e){return"time"===t(e).get(0).tagName.toLowerCase()}});var a={init:function(){var a=t.proxy(i,this);a();var o=e.settings;o.refreshMillis>0&&(this._timeagoInterval=setInterval(a,o.refreshMillis))},update:function(a){var o=e.parse(a);t(this).data("timeago",{datetime:o}),e.settings.localeTitle&&t(this).attr("title",o.toLocaleString()),i.apply(this)},updateFromDOM:function(){t(this).data("timeago",{datetime:e.parse(e.isTime(this)?t(this).attr("datetime"):t(this).attr("title"))}),i.apply(this)},dispose:function(){this._timeagoInterval&&(window.clearInterval(this._timeagoInterval),this._timeagoInterval=null)}};function i(){var a=function(a){if(!(a=t(a)).data("timeago")){a.data("timeago",{datetime:e.datetime(a)});var i=t.trim(a.text());e.settings.localeTitle?a.attr("title",a.data("timeago").datetime.toLocaleString()):!(i.length>0)||e.isTime(a)&&a.attr("title")||a.attr("title",i)}return a.data("timeago")}(this),i=e.settings;return isNaN(a.datetime)||(0==i.cutoff||Math.abs(n(a.datetime))<i.cutoff)&&t(this).text(o(a.datetime)),this}function o(t){return e.inWords(n(t))}function n(t){return(new Date).getTime()-t.getTime()}t.fn.timeago=function(t,e){var i=t?a[t]:a.init;if(!i)throw new Error("Unknown function name '"+t+"' for timeago");return this.each(function(){i.call(this,e)}),this},document.createElement("abbr"),document.createElement("time")}),$(function(){setInterval(function(){$(".time-ago").length>0&&$(".time-ago").timeago()},600)});