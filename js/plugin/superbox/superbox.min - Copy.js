/*! SmartAdmin - v1.5 - 2014-10-13 */
!function(a){a.fn.SuperBox=function(){
var posid = $( '#posid' ).val();
var posid_id = $( '#posid'+posid+'' ).val();


var b=a('<div class="superbox-show"></div>'),
c=a('<img src="" class="superbox-current-img"><div id="imgInfoBox" class="superbox-imageinfo inline-block"> <h1>Image Title</h1><span><p><em>http://imagelink.com/thisimage.jpg</em></p><input type="hidden" id="posid1" class="superbox-img-description">Image description</input><p><a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="load_reev_comments_collection('+posid+')">Load '+posid+' comments</a></p></span> <div class=" padding-5" id="loading_reev_collection'+posid+'"></div><div class="row"><div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'+posid+'"></div></div></div>'),
d=a('<div class="superbox-close txt-color-white"><i class="fa fa-times fa-lg"></i></div>');

b.append(c).append(d);
a(".superbox-imageinfo");
return this.each(function()
{ 

a(".superbox-list").click(function()
{$this=a(this);
//console.log($( '#posid_id' ).val());
var d=$this.find(".superbox-img"),
e=d.data("img"),
f=d.attr("alt")||"No description",g=e,h=d.attr("title")||"No Title";

console.log(f);
f=d.attr("alt");
w="works";
document.getElementById('posid').innerHTML ="w"; 

c.attr("src",e),a(".superbox-list").removeClass("active"),$this.addClass("active"),c.find("em").text(g),c.find(">:first-child").text(h),c.find(".superbox-img-description").text(f),0==a(".superbox-current-img").css("opacity")&&a(".superbox-current-img").animate({"opacity":1}),a(this).next().hasClass("superbox-show")?(a(".superbox-list").removeClass("active"),b.toggle()):(b.insertAfter(this).css("display","block"),$this.addClass("active")),a("html, body").animate({"scrollTop":b.position().top-d.width()},"medium")}),a(".superbox").on("click",".superbox-close",function(){a(".superbox-list").removeClass("active"),a(".superbox-current-img").animate({"opacity":0},200,function(){a(".superbox-show").slideUp()})})})}}(jQuery);


