/*
 * Buttons helper for fancyBox
 * version: 1.0.2
 * @requires fancyBox v2.0 or later
 *
 * Usage: 
 *     $(".fancybox").fancybox({
 *         buttons: {
 *             position : 'top'
 *         }
 *     });
 * 
 * Options:
 *     tpl - HTML template
 *     position - 'top' or 'bottom'
 * 
 */
(function(a){var b=a.fancybox;b.helpers.buttons={tpl:'<div id="fancybox-buttons"><ul><li><a class="btnPrev" title="Previous" href="javascript:;"></a></li><li><a class="btnPlay" title="Start slideshow" href="javascript:;"></a></li><li><a class="btnNext" title="Next" href="javascript:;"></a></li><li><a class="btnToggle" title="Toggle size" href="javascript:;"></a></li><li><a class="btnClose" title="Close" href="javascript:jQuery.fancybox.close();"></a></li></ul></div>',list:null,buttons:{},update:function(){var c=this.buttons.toggle.removeClass("btnDisabled btnToggleOn");if(b.current.canShrink){c.addClass("btnToggleOn")}else{if(!b.current.canExpand){c.addClass("btnDisabled")}}},beforeLoad:function(c){if(b.group.length<2){b.coming.helpers.buttons=false;b.coming.closeBtn=true;return}b.coming.margin[c.position==="bottom"?2:0]+=30},onPlayStart:function(){if(this.list){this.buttons.play.attr("title","Pause slideshow").addClass("btnPlayOn")}},onPlayEnd:function(){if(this.list){this.buttons.play.attr("title","Start slideshow").removeClass("btnPlayOn")}},afterShow:function(d){var c;if(!this.list){this.list=a(d.tpl||this.tpl).addClass(d.position||"top").appendTo("body");this.buttons={prev:this.list.find(".btnPrev").click(b.prev),next:this.list.find(".btnNext").click(b.next),play:this.list.find(".btnPlay").click(b.play),toggle:this.list.find(".btnToggle").click(b.toggle)}}c=this.buttons;if(b.current.index>0||b.current.loop){c.prev.removeClass("btnDisabled")}else{c.prev.addClass("btnDisabled")}if(b.current.loop||b.current.index<b.group.length-1){c.next.removeClass("btnDisabled");c.play.removeClass("btnDisabled")}else{c.next.addClass("btnDisabled");c.play.addClass("btnDisabled")}this.update()},onUpdate:function(){this.update()},beforeClose:function(){if(this.list){this.list.remove()}this.list=null;this.buttons={}}}}(jQuery));