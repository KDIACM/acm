$(document).ready(function(){
$("td").each(function(i){
setClickable(this, i);
})
});
	
function setClickable(obj, i) {
$(obj).click(function() {
var textarea = '<div><textarea rows="4" cols="60">'+$(this).html()+'</textarea>';
var button	 = '<div><input type="button" value="SAVE" class="saveButton" /> OR <input type="button" value="CANCEL" class="cancelButton" /></div></div>';
var revert = $(obj).html();
$(obj).after(textarea+button).remove();
$('.saveButton').click(function(){saveChanges(this, false, i);});
$('.cancelButton').click(function(){saveChanges(this, revert, i);});
})
.mouseover(function() {
$(obj).addClass("editable");
})
.mouseout(function() {
$(obj).removeClass("editable");
});
}//end of function setClickable

function saveChanges(obj, cancel, n) {
if(!cancel) {
var t = $(obj).parent().siblings(0).val();
$.post("test.php",{
  content: t,
  n: n
},function(txt){
alert( txt);
});
}
else {
var t = cancel;
}
if(t=='') t='(click to add text)';
$(obj).parent().parent().after('<td>'+t+'</td>').remove();
setClickable($("td").get(n), n);
}	