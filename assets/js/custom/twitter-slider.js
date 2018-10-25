
/**
 * Tweetie: A simple Twitter feed plugin
 * Author: Sonny T. <hi@sonnyt.com>, sonnyt.com
 */

!function(e){"use strict";e.fn.twittie=function(){var t=arguments[0]instanceof Object?arguments[0]:{},a="function"==typeof arguments[0]?arguments[0]:arguments[1],r=e.extend({username:null,list:null,hashtag:null,count:10,hideReplies:!1,dateFormat:"%b/%d/%Y",template:"{{date}} - {{tweet}}",apiPath:twitterConfig.tweeter_api_url,loadingText:"Loading..."},t);r.list&&!r.username&&e.error("If you want to fetch tweets from a list, you must define the username of the list owner.");var n=function(e){var t=e.replace(/(https?:\/\/([-\w\.]+)+(:\d+)?(\/([\w\/_\.]*(\?\S+)?)?)?)/gi,'<a href="$1" target="_blank" title="Visit this link">$1</a>').replace(/#([a-zA-Z0-9_]+)/g,'<a href="https://twitter.com/search?q=%23$1&amp;src=hash" target="_blank" title="Search for #$1">#$1</a>').replace(/@([a-zA-Z0-9_]+)/g,'<a href="https://twitter.com/$1" target="_blank" title="$1 on Twitter">@$1</a>');return t},s=function(e){var t=e.split(" ");e=new Date(Date.parse(t[1]+" "+t[2]+", "+t[5]+" "+t[3]+" UTC"));for(var a=["January","February","March","April","May","June","July","August","September","October","November","December"],n={"%d":e.getDate(),"%m":e.getMonth()+1,"%b":a[e.getMonth()].substr(0,3),"%B":a[e.getMonth()],"%y":String(e.getFullYear()).slice(-2),"%Y":e.getFullYear()},s=r.dateFormat,i=r.dateFormat.match(/%[dmbByY]/g),u=0,l=i.length;l>u;u++)s=s.replace(i[u],n[i[u]]);return s},i=function(e){for(var t=r.template,a=["date","tweet","avatar","url","tweetId","retweeted","screen_name","user_name"],n=0,s=a.length;s>n;n++)t=t.replace(new RegExp("{{"+a[n]+"}}","gi"),e[a[n]]);return t};this.html("<span>"+r.loadingText+"</span>");var u=this;e.getJSON(r.apiPath,{username:r.username,list:r.list,hashtag:r.hashtag,count:r.count,exclude_replies:r.hideReplies},function(e){u.find("span").fadeOut("fast",function(){u.html('<div class="allTweets"></div>');for(var t=0;t<r.count;t++){var l=!1;if(e[t])l=e[t];else{if(void 0===e.statuses||!e.statuses[t])break;l=e.statuses[t]}var o={user_name:l.user.name,date:s(l.created_at),tweet:n(l.retweeted?"RT @"+l.user.screen_name+": "+l.retweeted_status.text:l.text),avatar:'<img src="'+l.user.profile_image_url+'" />',url:"https://twitter.com/"+l.user.screen_name+"/status/"+l.id_str,tweetId:l.id_str,retweeted:l.retweeted,screen_name:n("@"+l.user.screen_name)};u.find(".allTweets").append('<div class="single-tweet">'+i(o)+"</div>")}"function"==typeof a&&a()})})}}(jQuery);


jQuery('document').ready(function(){

	"use strict";
 
	var twitterSlider = jQuery('.tweetSlider');

	if ( twitterSlider.length > 0 ) {

		twitterSlider.each(function(){

			var $this = jQuery(this);

			var tweetData = $this.data('tweet-setting');
 
			tweetData.num_tweet = ( tweetData.num_tweet && tweetData.num_tweet > 0 ) ? tweetData.num_tweet : 3;

			$this.twittie({
				apiPath: twitterConfig.tweeter_api_url,
				count : tweetData.num_tweet,
				template : '<div class="twitter-info"><div class="tweet-text"><p>{{tweet}}</p></div><div class="twitt-tools"><ul class="twiiter-options"><li><a class="relpy-btn" href="https://twitter.com/intent/tweet?in_reply_to={{tweetId}}"><i class="zmdi zmdi-mail-reply"></i><span>Reply</span></a></li><li><a class="retweet-btn" href="https://twitter.com/intent/retweet?tweet_id={{tweetId}}"><i class="zmdi zmdi-repeat"></i><span>Retweet</span></a></li><li><a class="favorite-btn" href="https://twitter.com/intent/favorite?tweet_id={{tweetId}}"><i class="zmdi zmdi-favorite"></i><span>Favorite</span></a></li></ul></div></div>'

			}, function(){

				var tweetSlider = $this.find('.allTweets');
				var slidespeed 	= 500;
				var pagenationspeed = 300;
				var trstyle = false;

				if( tweetData.ts_duration ) {
					slidespeed 	= tweetData.ts_duration;
				}

				if( tweetData.ts_page_duration ) {
					pagenationspeed = tweetData.ts_page_duration;
				}

				if ( tweetData.tslider_tstyle == 'ts_fade' ) {
					trstyle = 'fade';
				}

				tweetSlider.owlCarousel({
					singleItem 		: true,
					pagination 		: true,
					autoPlay 		: true,
					stopOnHover 	: true,
					slideSpeed 		: slidespeed,
					paginationSpeed : pagenationspeed,
					transitionStyle : trstyle
				});
			});

		});
	}

});