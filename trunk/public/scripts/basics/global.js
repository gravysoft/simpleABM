/**
 * Extensions and utility functions
 */

var mobile = (/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));
var windowsWidth = $(window).width();
var windowsHeight = $(window).height();

/* Retrieves browser name based on declared ones. Beta version. Check the names for IE*/
function userAgent(){
    agent = navigator.userAgent;
    expected = ["Chrome", "Firefox", "Safari", "IE"];
   
    for(var e in expected)
    { 
//        fb(agent); // a long string where we must look for a certain name
//        fb(agent.search(expected[e]));
        if (agent.search(expected[e]) != -1)
            return expected[e];    
    }  
    return null;
};

/**
 * Alias of console.debug()
 */
function fb(s) {
	try{
        if (console)
        {
            if (typeof console.debug == 'function') 
                console.debug(s);
            else
                console.log(s); // .log instead of .debug for ie compatibility
        }
    } catch(e){
        
    }
}

/**
 * Something like empty() in PHP
 * If str is equal false, it will return true, because it is actually empty.
 */
function isEmpty(str)
{ 
    if ( (typeof str == "undefined") || !str || 0 === str.length )
        return true;    
    return false;
}

/**
 * Something like isset() in PHP
 * If item is equal false, it will return false, because it is defined.
 */
function isUndefined(item)
{ 
    if ( (typeof item == "undefined") )
        return true;    
    return false;
}

// a more complete typeof resource
function typeOf(o){
	var type = typeof o;
         //If typeof return something different than object then returns it.
	if (type !== 'object') {
		return type;
         //If it is an instance of the Array then return "array"
	} else if (Object.prototype.toString.call(o) === '[object Array]') {
		return 'array';
         //If it is null then return "null"
	} else if (o === null) {
		return 'null';
       //if it gets here then it is an "object"
	} else {
		return 'object';
	}
}

/* number, decimals*/
function round(num, dec) {
  if(!dec) var dec= 2;
  var result = String(Math.round(num*Math.pow(10,dec))/Math.pow(10,dec));
  if(result.indexOf('.')<0) {result+= '.';}
  while(result.length- result.indexOf('.')<=dec) {result+= '0';}
  return result;
}

function randomFromTo(from, to){
    return Math.floor(Math.random() * (to - from + 1) + from);
}

// get vars from current URI
// Use it like this: getUriVar("goTo")
function getUriVar(variable, customURI) {
    
    var query;
    if(typeof customURI === "undefined"){
        query = window.location.search.substring(1);
    } else {
        query = customURI.substr(customURI.indexOf('?')+1);
    };
    
    var vars = query.split("&");
  
    for (var i = 0; i < vars.length; i++) {
        
        var pair = vars[i].split("=");
      
        if (pair[0] == variable) {
            return unescape(pair[1]);
        }
    }
    return false;
}

// Camel Case from underscore strings
String.prototype.ucfirst = function () {

    // Split the string into words if string contains multiple words.
    var x = this.split(/\s+/g);

    for (var i = 0; i < x.length; i++) {

        // Splits the word into two parts. One part being the first letter,
        // second being the rest of the word.
        var parts = x[i].match(/(\w)(\w*)/);

        // Put it back together but uppercase the first letter and
        // lowercase the rest of the word.
        x[i] = parts[1].toUpperCase() + parts[2].toLowerCase();
    }

    // Rejoin the string and return.
    return x.join(' ');
};



if (!String.prototype.escapeHTML) {
	String.prototype.escapeHTML = function() {
		return this.replace("<", "&lt;").replace(">", "&gt;").replace('"', "&quot;");
	};
}

