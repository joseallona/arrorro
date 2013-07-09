/*
ON MENU SELECTION.

To mark a link from the navigation as selected, either:

1. Apply to the link element a class="selected", or
2. Apply to the link an id="btn_sectionName", where sectionName is the BODY element's id.

Additionally, if a link targets the current file, it will be automatically marked as selected.
*/



autoSelectMenu = true; 

var prevEl;


function init(){
	
	// quit if this function has already been called
	if (arguments.callee.done) return;
	
	// flag this function so we don't do the same thing twice
	arguments.callee.done = true;
	
	// kill the timer
	if (_timer) {
		clearInterval(_timer);
		_timer = null;
	}
	
	
	nav = navigator.userAgent.toLowerCase();
	
	/* Add class="selected" to any link with id="btn_sectionName", 
	   where sectionName is the BODY element's id.*/
	links = document.getElementsBySelector('a');
	for (var i=0, t=links.length; i<t ;i++){
		if (linkHasBodyId(links[i].id)){
			links[i].className += ' selected';	
		}
	}
		
	/* Mark as selected any link that targets the current file */
	if (autoSelectMenu){
		fileName = getFileName(location.href);
		linksProdMenu = document.getElementsBySelector('a');

		for (var i=0, t=linksProdMenu.length; i<t; i++){
			if (fileName == getFileName(linksProdMenu[i].href)){
				linksProdMenu[i].className += ' selected';
			}
		}
	}	

	/* Add rollover class to submenu items
	if (document.getElementById('subMenu') && nav.indexOf('msie 5.0') != -1){
		var links = document.getElementsBySelector('#subMenu a');
		for (var i=0, t=links.length; i<t ;i++){
			links[i].setAttribute('class',' rollover');	
		}	
	}*/
	
	/* For all image links with class="rollover", on mouseover they wil 
	*/
	var links = document.getElementsBySelector('a.rollover');
	var tmpImg = [];

	for (var i=0, t=links.length; i<t ;i++){
		var img = links[i].getElementsByTagName('img')[0];

		addEvent(links[i], 'focus', rollOver); /* FIX apply for all links not just images */
		addEvent(links[i], 'blur', rollOut);			

		if (img){
			// Assign over and out events
			addEvent(links[i], 'mouseover', rollOver);
			addEvent(links[i], 'mouseout', rollOut);
			
			// Preload images
			tmpImg[i] = new Image(img.width, img.height);
			tmpImg[i].setAttribute('src', getImg(img, 'over'));
			
			// Where a link has class="selected", apply image with the same name and  "_selected" suffix		
			if (links[i].className.indexOf('selected') != -1){
				img.setAttribute('src', getImg(img, 'selected'));
			}	
		}
	}

	
}


// DEAN EDWARDS ONLOAD FIX http://dean.edwards.name/weblog/2006/06/again/  
/* for Mozilla */
if (document.addEventListener) {
	document.addEventListener("DOMContentLoaded", init, false);
}

/* for Internet Explorer */
/*@cc_on 
@if (@_win32 && @_jscript_version > 5.5)
	document.write("<script id=__ie_onload defer src=//0><\/scr"+"ipt>");
	var script = document.getElementById("__ie_onload");
	script.onreadystatechange = function() {
		if (this.readyState == "complete") {
			init(); // call the onload handler
		}
	};
@end @*/

/* for Safari */
if (/WebKit/i.test(navigator.userAgent)) { // sniff
	var _timer = setInterval(function() {
		if (/loaded|complete/.test(document.readyState)) {
			init(); // call the onload handler
		}
	}, 10);
}

/* for other browsers */
window.onload = init;




function getFileName(str){
	var arr = str.split("/");
	return arr[arr.length-1];
}


function rollOver(e){ 
	if (this.className.indexOf('selected') == -1){
		this.className += ' selected'; 
		var img = this.getElementsByTagName('img')[0];
		if (img){img.src = getImg(img, 'over');}
	}
}

function rollOut(e){
	el = this;
	el.className = el.className.replace('selected','');

	var img = el.getElementsByTagName('img')[0];	
	if (img){
		if (!linkHasBodyId(el.id) && el.className.indexOf('selected') == -1){
			var imgNormal = img.getAttribute('src').replace('_over.','.')
		} else {
			var imgNormal = img.getAttribute('src').replace('_over.','_selected.')	
		}
		img.src = imgNormal;
	}
}

function getImg(img, status){
	return img.getAttribute('src').replace(/(_over|_selected)?.(gif|jpg|png)/ig, '_' + status + '.$2')	
}

function linkHasBodyId(linkId){
	if (!linkId){return false;}
	bodyId = document.getElementsByTagName("BODY")[0].id;
	linkSection = linkId.split("_");
	if (linkSection.length == 2){linkSection = linkSection[1];} else {linkSection = false;}
	return (linkSection && linkSection == bodyId);
}


/*
addEvent(element, type, handler)
  ie: addEvent(window, "load", init);
  Includes removeEvent, preventDefault and stopPropagation.
  Source: http://therealcrisp.xs4all.nl/upload/addEvent_dean.html
*/
function addEvent(element, type, handler)
{
	if (element.addEventListener){
		element.addEventListener(type, handler, false);
	}else
	{
		if (!handler.$$guid) {handler.$$guid = addEvent.guid++;}
		if (!element.events) {element.events = {};}
		var handlers = element.events[type];
		if (!handlers)
		{
			handlers = element.events[type] = {};
			if (element['on' + type]){ handlers[0] = element['on' + type];}
			element['on' + type] = handleEvent;
		}
	
		handlers[handler.$$guid] = handler;
	}
}
addEvent.guid = 1;

function removeEvent(element, type, handler)
{
	if (element.removeEventListener){
		element.removeEventListener(type, handler, false);
	}else if (element.events && element.events[type] && handler.$$guid){
		delete element.events[type][handler.$$guid]; }

}

function handleEvent(event)
{
	event = event || fixEvent(window.event);
	var returnValue = true;
	var handlers = this.events[event.type];

	for (var i in handlers)
	{
		if (!Object.prototype[i])
		{
			this.$$handler = handlers[i];
			if (this.$$handler(event) === false){ returnValue = false;}
		}
	}

	if (this.$$handler) {this.$$handler = null;}

	return returnValue;
}

function fixEvent(event)
{
	event.preventDefault = fixEvent.preventDefault;
	event.stopPropagation = fixEvent.stopPropagation;
	return event;
}
fixEvent.preventDefault = function()
{
	this.returnValue = false;
}
fixEvent.stopPropagation = function()
{
	this.cancelBubble = true;
}

// This little snippet fixes the problem that the onload attribute on the body-element will overwrite
// previous attached events on the window object for the onload event
if (!window.addEventListener)
{
	document.onreadystatechange = function()
	{
		if (window.onload && window.onload != handleEvent)
		{
			addEvent(window, 'load', window.onload);
			window.onload = handleEvent;
		}
	}
}




/*
document.getElementsBySelector(selector) 
  ie: elements = document.getElementsBySelect('div#main p a.external')
  Source: http://simon.incutio.com/archive/2003/03/25/getElementsBySelector
  Works in Phoenix 0.5, Mozilla 1.3, Opera 7, Internet Explorer 6, Internet Explorer 5 on Windows
  Opera 7 fails 
*/

function getAllChildren(e) {
  // Returns all children of element. Workaround required for IE5/Windows. Ugh.
  return e.all ? e.all : e.getElementsByTagName('*');
}

document.getElementsBySelector = function(selector) {
  // Attempt to fail gracefully in lesser browsers
  if (!document.getElementsByTagName) {
    return new Array();
  }
  // Split selector in to tokens
  var tokens = selector.split(' ');
  var currentContext = new Array(document);
  for (var i = 0; i < tokens.length; i++) {
    token = tokens[i].replace(/^\s+/,'').replace(/\s+$/,'');
    if (token.indexOf('#') > -1) {
      // Token is an ID selector
      var bits = token.split('#');
      var tagName = bits[0];
      var id = bits[1];
      var element = document.getElementById(id);
      if (tagName && element.nodeName.toLowerCase() != tagName) {
        // tag with that ID not found, return false
        return new Array();
      }
      // Set currentContext to contain just this element
      currentContext = new Array(element);
      continue; // Skip to next token
    }
    if (token.indexOf('.') > -1) {
      // Token contains a class selector
      var bits = token.split('.');
      var tagName = bits[0];
      var className = bits[1];
      if (!tagName) {
        tagName = '*';
      }
      // Get elements matching tag, filter them for class selector
      var found = new Array;
      var foundCount = 0;
      for (var h = 0; h < currentContext.length; h++) {
        var elements;
        if (tagName == '*') {
            elements = getAllChildren(currentContext[h]);
        } else {
            elements = currentContext[h].getElementsByTagName(tagName);
        }
        for (var j = 0; j < elements.length; j++) {
          found[foundCount++] = elements[j];
        }
      }
      currentContext = new Array;
      var currentContextIndex = 0;
      for (var k = 0; k < found.length; k++) {
        if (found[k].className && found[k].className.match(new RegExp('\\b'+className+'\\b'))) {
          currentContext[currentContextIndex++] = found[k];
        }
      }
      continue; // Skip to next token
    }
    // Code to deal with attribute selectors
    if (token.match(/^(\w*)\[(\w+)([=~\|\^\$\*]?)=?"?([^\]"]*)"?\]$/)) {
      var tagName = RegExp.$1;
      var attrName = RegExp.$2;
      var attrOperator = RegExp.$3;
      var attrValue = RegExp.$4;
      if (!tagName) {
        tagName = '*';
      }
      // Grab all of the tagName elements within current context
      var found = new Array;
      var foundCount = 0;
      for (var h = 0; h < currentContext.length; h++) {
        var elements;
        if (tagName == '*') {
            elements = getAllChildren(currentContext[h]);
        } else {
            elements = currentContext[h].getElementsByTagName(tagName);
        }
        for (var j = 0; j < elements.length; j++) {
          found[foundCount++] = elements[j];
        }
      }
      currentContext = new Array;
      var currentContextIndex = 0;
      var checkFunction; // This function will be used to filter the elements
      switch (attrOperator) {
        case '=': // Equality
          checkFunction = function(e) { return (e.getAttribute(attrName) == attrValue); };
          break;
        case '~': // Match one of space seperated words 
          checkFunction = function(e) { return (e.getAttribute(attrName).match(new RegExp('\\b'+attrValue+'\\b'))); };
          break;
        case '|': // Match start with value followed by optional hyphen
          checkFunction = function(e) { return (e.getAttribute(attrName).match(new RegExp('^'+attrValue+'-?'))); };
          break;
        case '^': // Match starts with value
          checkFunction = function(e) { return (e.getAttribute(attrName).indexOf(attrValue) == 0); };
          break;
        case '$': // Match ends with value - fails with "Warning" in Opera 7
          checkFunction = function(e) { return (e.getAttribute(attrName).lastIndexOf(attrValue) == e.getAttribute(attrName).length - attrValue.length); };
          break;
        case '*': // Match ends with value
          checkFunction = function(e) { return (e.getAttribute(attrName).indexOf(attrValue) > -1); };
          break;
        default :
          // Just test for existence of attribute
          checkFunction = function(e) { return e.getAttribute(attrName); };
      }
      currentContext = new Array;
      var currentContextIndex = 0;
      for (var k = 0; k < found.length; k++) {
        if (checkFunction(found[k])) {
          currentContext[currentContextIndex++] = found[k];
        }
      }
      // alert('Attribute Selector: '+tagName+' '+attrName+' '+attrOperator+' '+attrValue);
      continue; // Skip to next token
    }
    // If we get here, token is JUST an element (not a class or ID selector)
    tagName = token;
    var found = new Array;
    var foundCount = 0;
    for (var h = 0; h < currentContext.length; h++) {
      var elements = currentContext[h].getElementsByTagName(tagName);
      for (var j = 0; j < elements.length; j++) {
        found[foundCount++] = elements[j];
      }
    }
    currentContext = found;
  }
  return currentContext;
}

/* That revolting regular expression explained 
/^(\w+)\[(\w+)([=~\|\^\$\*]?)=?"?([^\]"]*)"?\]$/
  \---/  \---/\-------------/    \-------/
    |      |         |               |
    |      |         |           The value
    |      |    ~,|,^,$,* or =
    |   Attribute 
   Tag
*/




