/*!

Name: Instagram Lite
Dependencies: jQuery
Author: Michael Lynch
Author URL: http://michaelynch.com
Date Created: January 14, 2014
Licensed under the MIT license

*/

;(function($) {

	$.fn.instagramLite = function(options) {

		// return if no element was bound
		// so chained events can continue
		if(!this.length) {
			return this;
		}

		// define plugin
		plugin = this;

		// define default parameters
		plugin.defaults = {
			accessToken: null,
			user_id: 'self',
			limit: null,
			list: true,
			videos: false,
			urls: false,
			captions: false,
			date: false,
			likes: false,
			comments_count: false,
			error: function() {},
			success: function() {}
		}

		// vars
		var s = $.extend({}, plugin.defaults, options),
			el = $(this);

		var formatCaption = function(caption) {

			var words = caption.split(' '),
				newCaption = '';

			for(var i = 0; i < words.length; i++) {

				var word;

				if(words[i][0] == '@') {
					var a = '<a href="http://instagram.com/'+words[i].replace('@', '').toLowerCase()+'" target="_blank">'+words[i]+'</a>';
					word = a;
				} else if(words[i][0] == '#') {
					var a = '<a href="http://instagram.com/explore/tags/'+words[i].replace('#', '').toLowerCase()+'" target="_blank">'+words[i]+'</a>';
					word = a;
				} else {
					word = words[i]
				}

				newCaption += word + ' ';
			}

			return newCaption;

		};

		var constructMedia = function(data) {

			// for each piece of media returned
			for(var i = 0; i < data.length; i++) {

				// define media namespace
				var thisMedia = data[i],
					item;

				// if media type is image or videos is set to false
				if(thisMedia.type === 'image' || thisMedia.type === 'carousel' || !s.videos) {

					// construct image
					item = '<img class="il-photo__img" src="'+thisMedia.images.standard_resolution.url+'" alt="Instagram Image" data-filter="'+thisMedia.filter+'" />';

					// if url setting is true
					if(s.urls) {
						item = '<a href="'+thisMedia.link+'" target="_blank">'+item+'</a>';
					}

					if(s.captions || s.date || s.likes || s.comments_count) {
						item += '<div class="il-photo__meta">';
					}

					// if caption setting is true
					if(s.captions && thisMedia.caption) {
						item += '<div class="il-photo__caption" data-caption-id="'+thisMedia.caption.id+'">'+formatCaption(thisMedia.caption.text)+'</div>';
					}

					// if date setting is true
					if(s.date) {

						var date = new Date(thisMedia.created_time * 1000),
							day = date.getDate(),
							month = date.getMonth() + 1,
							year = date.getFullYear(),
							hours = date.getHours(),
							minutes = date.getMinutes(),
							seconds = date.getSeconds();

						var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
						date =  day +' '+monthNames[month]+' '+ year;

						item += '<div class="il-photo__date " >\
										 	<i class="fa fa-instagram fa-2 " aria-hidden="true"></i>'+
										 		'    '+date+
										 	'<span class="share-line"  ></span>'+
										 	'<i class="fa fa-share-alt" id="share" onclick="showSocialShare(this)" aria-hidden="true"></i>\
											<ul class="social-share SocialShare ">\
												<span class="ssk-group img-responsive inner" data-url="'+thisMedia.link+'" data-text="share text default">\
													<a href="" class="ssk ssk-facebook" title="facebook"></a>\
													<a href="" class="ssk ssk-twitter" title="twitter"></a>\
												</span>\
											</ul>\
										</div>';
					}

					// if likes setting is true
					if(s.likes) {
						item += '<div class="il-photo__likes">'+thisMedia.likes.count+'</div>';
					}

					// if caption setting is true
					if(s.comments_count && thisMedia.comments) {
						item += '<div class="il-photo__comments">'+thisMedia.comments.count+'</div>';
					}

					if(s.captions || s.date || s.likes || s.comments_count) {
						item += '</div>';
					}
				}

				if(thisMedia.type === 'video' && s.videos) {

					if(thisMedia.videos) {

						var src;

						if(thisMedia.videos.standard_resolution) {
							src = thisMedia.videos.standard_resolution.url;
						} else if(thisMedia.videos.low_resolution) {
							src = thisMedia.videos.low_resolution.url;
						} else if(thisMedia.videos.low_bandwidth) {
							src = thisMedia.videos.low_bandwidth.url;
						}

						item = '<video poster="'+thisMedia.images.standard_resolution.url+'" controls>';
						item += '<source src="'+src+'" type="video/mp4;"></source>';
						item += '</video>';
					}
				}

				// if list setting is true
				if(s.list && item) {

					// redefine item with wrapping list item
					item = '<div class="slider-h3" data-instagram-id="'+thisMedia.id+'">'+item+'</div>';
					// item = '<div class="slider-h3" style="margin-right:2px;" data-instagram-id="'+thisMedia.id+'">'+item+'</div>';
				}

				// append image / video
				if(item !== '') {
					el.append(item);
				}
			}
		}

		var loadContent = function() {

			// if access token
			if(s.accessToken) {

				// construct API endpoint
				var url = 'https://api.instagram.com/v1/users/'+s.user_id+'/media/recent/?access_token='+s.accessToken+'&count='+s.limit;

				$.ajax({
					type: 'GET',
					url: url,
					dataType: 'jsonp',
					success: function(data) {

						// if success status
						if(data.meta.code === 200 && data.data.length) {

							// construct media
							constructMedia(data.data);

							// execute success callback
							s.success.call(this);
							SocialShareKit.init();
							$(document).ready(function() {
							    $('.insta-slider').slick({
							        centerMode: true,
							        centerPadding: '0px',
							        slidesToShow: 4,
							        slidesToScroll: 1,
							        speed: 1500,
							        index: 2,
							        focusOnSelect:false,
							        dots:false,
									arrows:true,
									infinite: true,

							        responsive: [{
							            breakpoint: 1024,
							            settings: {
							                arrows: false,
							                centerMode: false,
							                // centerPadding: '40px',
							                slidesToShow: 3,
							                slidesToScroll: 1,
							                infinite: true,
							                dots: false
							            }
							        },{
							            breakpoint: 991,
							            settings: {
							                arrows: true,
							                centerMode: false,
							                // centerPadding: '40px',
							                slidesToShow: 3,
							                slidesToScroll: 1,
							            }
							        },{
							            breakpoint: 767,
							            settings: {
							                arrows: false,
							                centerMode: false,
							                dots:false,
							                // centerPadding: '40px',
							                slidesToShow: 2,
							                slidesToScroll: 1,
							            }
							        }, {
							            breakpoint: 480,
							            settings: {
							                arrows: false,
							                centerMode: false,
							                dots:false,
							                // centerPadding: '40px',
							                slidesToShow: 1,
							                slidesToScroll: 1
							            }
							        }]
							    });
							});

						} else {
							// execute error callback
							s.error.call(this);
						}
					},
					error: function() {
						// execute error callback
						s.error.call(this);
					}
				});
			}
		}

		// init
		loadContent();

	}
})(jQuery);
