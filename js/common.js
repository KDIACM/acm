/*var Event = {
	add: function(obj,type,fn) {
		if (obj.attachEvent) {
			obj['e'+type+fn] = fn;
			obj[type+fn] = function() { obj['e'+type+fn](window.event); }
			obj.attachEvent('on'+type,obj[type+fn]);
		} else
		obj.addEventListener(type,fn,false);
	},
	remove: function(obj,type,fn) {
		if (obj.detachEvent) {
			obj.detachEvent('on'+type,obj[type+fn]);
			obj[type+fn] = null;
		} else
		obj.removeEventListener(type,fn,false);
	}
}

function $() {
	var elements = new Array();
	for (var i=0;i<arguments.length;i++) {
		var element = arguments[i];
		if (typeof element == 'string') element = document.getElementById(element);
		if (arguments.length == 1) return element;
		elements.push(element);
	}
	return elements;
}

var ZebraTable = {
	bgcolor: '',
	classname: '',
	stripe: function(el) {
		if (!$(el)) return;
		var rows = $(el).getElementsByTagName('tr');
		for (var i=1,len=rows.length;i<len;i++) {
			if (i % 2 == 0) rows[i].className = 'alt';
			Event.add(rows[i],'mouseover',function() { ZebraTable.mouseover(this); });
			Event.add(rows[i],'mouseout',function() { ZebraTable.mouseout(this); });
		}
	},
	mouseover: function(row) {
		this.bgcolor = row.style.backgroundColor;
		this.classname = row.className;
		row.className = 'over';
	},
	mouseout: function(row) {
		row.className = this.classname;
		row.style.backgroundColor = this.bgcolor;
	}
}


/*function hoverOff(hoverElement) {
	hoverElement.className = "hoverOff";
}
function hoverOn(hoverElement) {
	hoverElement.className = "hoverOn";
}

function clickclear(thisfield, defaulttext) {
	if (thisfield.value == defaulttext) {
		thisfield.value = "";
	}
}
function clickrecall(thisfield, defaulttext) {
	if (thisfield.value == "") {
		thisfield.value = defaulttext;
	}
}*/

/*var panes = new Array();

function setupPanes(containerId, defaultTabId) {
  // go through the DOM, find each tab-container
  // set up the panes array with named panes
  // find the max height, set tab-panes to that height
  panes[containerId] = new Array();
  var maxHeight = 0; var maxWidth = 0;
  var container = document.getElementById(containerId);
  var paneContainer = container.getElementsByTagName("div")[0];
  var paneList = paneContainer.childNodes;
  for (var i=0; i < paneList.length; i++ ) {
    var pane = paneList[i];
    if (pane.nodeType != 1) continue;
    if (pane.offsetHeight > maxHeight) maxHeight = pane.offsetHeight;
    if (pane.offsetWidth  > maxWidth ) maxWidth  = pane.offsetWidth;
    panes[containerId][pane.id] = pane;
    pane.style.display = "none";
  }
    paneContainer.style.height = maxHeight + "px";
    paneContainer.style.width  = maxWidth + "px";
    document.getElementById(defaultTabId).onclick();
}

function showPane(paneId, activeTab) {
  // make tab active class
  // hide other panes (siblings)
  // make pane visible
  
    for (var con in panes) {
    activeTab.blur();
    activeTab.className = "tab-active";
    if (panes[con][paneId] != null) { // tab and pane are members of this container
      var pane = document.getElementById(paneId);
      pane.style.display = "block";
      var container = document.getElementById(con);
      var tabs = container.getElementsByTagName("ul")[0];
      var tabList = tabs.getElementsByTagName("a")
      for (var i=0; i<tabList.length; i++ ) {
        var tab = tabList[i];
        if (tab != activeTab) tab.className = "tab-disabled";
      }
      for (var i in panes[con]) {
        var pane = panes[con][i];
        if (pane == undefined) continue;
        if (pane.id == paneId) continue;
        pane.style.display = "none"
      }
    }
  }
  return false;    
}


  // this function is need to work around 
  // a bug in IE related to element attributes
  function hasClass(obj) {
     var result = false;
     if (obj.getAttributeNode("class") != null) {
         result = obj.getAttributeNode("class").value;
     }
     return result;
  }   

 function stripe(id) {

    // the flag we'll use to keep track of 
    // whether the current row is odd or even
    var even = false;
  
    // if arguments are provided to specify the colours
    // of the even & odd rows, then use the them;
    // otherwise use the following defaults:
    var evenColor = arguments[1] ? arguments[1] : "#fff";
    var oddColor = arguments[2] ? arguments[2] : "#eee";
  
    // obtain a reference to the desired table
    // if no such table exists, abort
    var table = document.getElementById(id);
    if (! table) { return; }
    
    // by definition, tables can have more than one tbody
    // element, so we'll have to get the list of child
    // &lt;tbody&gt;s 
    var tbodies = table.getElementsByTagName("tbody");

    // and iterate through them...
    for (var h = 0; h < tbodies.length; h++) {
    
     // find all the &lt;tr&gt; elements... 
      var trs = tbodies[h].getElementsByTagName("tr");
      
      // ... and iterate through them
      for (var i = 0; i < trs.length; i++) {

	    // avoid rows that have a class attribute
        // or backgroundColor style
	    if (!hasClass(trs[i]) && ! trs[i].style.backgroundColor) {
 
         // get all the cells in this row...
          var tds = trs[i].getElementsByTagName("td");
        
          // and iterate through them...
          for (var j = 0; j < tds.length; j++) {
        
            var mytd = tds[j];

            // avoid cells that have a class attribute
            // or backgroundColor style
	        if (! hasClass(mytd) && ! mytd.style.backgroundColor) {
        
		      mytd.style.backgroundColor = even ? evenColor : oddColor;
              
            }
          }
        }
        // flip from odd to even, or vice-versa
        even =  ! even;
      }
    }
  }

/*if( document.addEventListener ) document.addEventListener( 'DOMContentLoaded', form1, false );

function form1(){
  // Hide forms
  $( 'form.form1' ).hide().end();
  
  // Processing
  $( 'form.form1' ).find( 'li/label' ).not( '.noform1' ).each( function( i ){
    var labelContent = this.innerHTML;
    var labelWidth = document.defaultView.getComputedStyle( this, '' ).getPropertyValue( 'width' );
    var labelSpan = document.createElement( 'span' );
        labelSpan.style.display = 'block';
        labelSpan.style.width = labelWidth;
        labelSpan.innerHTML = labelContent;
    this.style.display = '-moz-inline-box';
    this.innerHTML = null;
    this.appendChild( labelSpan );
  } ).end();
  
  // Show forms
  $( 'form.form1' ).show().end();
}


/*************************************************************************
  This code is from Dynamic Web Coding at http://www.dyn-web.com/
  Copyright 2001-3 by Sharon Paine 
  See Terms of Use at http://www.dyn-web.com/bus/terms.html
  regarding conditions under which you may use this code.
  This notice must be retained in the code as is!
*************************************************************************/

// onresize for ns4
var origWidth, origHeight;
if (document.layers) {
	origWidth = window.innerWidth; origHeight = window.innerHeight;
	window.onresize = function() { if (window.innerWidth != origWidth || window.innerHeight != origHeight) history.go(0); }
}

var cur_lyr;	// holds id of currently visible layer
function swapLayers(id) {
  if (cur_lyr) hideLayer(cur_lyr);
  showLayer(id);
  cur_lyr = id;
}

function showLayer(id) {
  var lyr = getElemRefs(id);
  if (lyr && lyr.css) lyr.css.display = "block";
}

function hideLayer(id) {
  var lyr = getElemRefs(id);
  if (lyr && lyr.css) lyr.css.display = "none";
}

function getElemRefs(id) {
	var el = (document.getElementById)? document.getElementById(id): (document.all)? document.all[id]: (document.layers)? document.layers[id]: null;
	if (el) el.css = (el.style)? el.style: el;
	return el;
}


/***********************************************
* Switch Menu script- by Martial B of http://getElementById.com/
* Modified by Dynamic Drive for format & NS4/IE4 compatibility
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var persistmenu="yes" //"yes" or "no". Make sure each SPAN content contains an incrementing ID starting at 1 (id="sub1", id="sub2", etc)
var persisttype="sitewide" //enter "sitewide" for menu to persist across site, "local" for this page only

if (document.getElementById){ //DynamicDrive.com change
document.write('<style type="text/css">\n')
document.write('.submenu{display: none;}\n')
document.write('</style>\n')
}

function SwitchMenu(obj){
	if(document.getElementById){
	var el = document.getElementById(obj);
	var ar = document.getElementById("navigation").getElementsByTagName("ul"); //DynamicDrive.com change
		if(el.style.display != "block"){ //DynamicDrive.com change
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") //DynamicDrive.com change
				ar[i].style.display = "none";
			}			
			el.style.display = "block";
		}else{
			el.style.display = "none";
		}
	}
	swapLayers('navigation_container');
	el.style.display = "block";
}

function get_cookie(Name) { 
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { 
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function onloadfunction(){
if (persistmenu=="yes"){
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=get_cookie(cookiename)
if (cookievalue!="")
document.getElementById(cookievalue).style.display="block"
}
}

function savemenustate(){
var inc=1, blockid=""
while (document.getElementById("sub"+inc)){
if (document.getElementById("sub"+inc).style.display=="block"){
blockid="sub"+inc
break
}
inc++
}
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid
document.cookie=cookiename+"="+cookievalue
}

if (window.addEventListener)
window.addEventListener("load", onloadfunction, false)
else if (window.attachEvent)
window.attachEvent("onload", onloadfunction)
else if (document.getElementById)
window.onload=onloadfunction

if (persistmenu=="yes" && document.getElementById)
window.onunload=savemenustate


window.onload = function() {
	/*stripe('tabular', '#d2e6f2' , '#fff');
	stripe('tabular1', '#d2e6f2' , '#fff');
	stripe('tabular2', '#d2e6f2' , '#fff');*/
	//swapLayers('side_bar_container');
	//swapLayers('slide_menu1');
	hideLayer("navigation_container");
	swapLayers("slide_menu1");
	//ZebraTable.stripe('table1');
	
}

function AddLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}
