function Config(dataIslandId){var me=this;var fileName;var req;var id=dataIslandId;var multispaceRe=/\s{2,}/g;var crRe=/\n/g;var values=new Array();var xml=null;var funcArray=new Array();me.getXML=function(){return xml;}
function content(tag,removeMultispaces){var r="";if(tag&&tag.firstChild&&tag.firstChild.nodeValue){r=tag.firstChild.nodeValue;}
if(removeMultispaces){r=r.replace(multispaceRe,' ');}
return r;}
function getArrayValues(tag){var childNodes=DOMHelpers.getAllChildElements(tag);var returnValue=new Array();for(var i=0;i<childNodes.length;i++){var childNode=childNodes[i]
returnValue[childNode.nodeName]=XMLHelpers.nodeToObject(childNode)}
return returnValue;}
function cloneObject(obj){for(i in obj){this[i]=what[obj];}}
me.getValue=function(s,defaultValue){if(values){var theValue=values[s];if(theValue!=null){return theValue}
else{return defaultValue}}
else
if(defaultValue){return defaultValue;}
else{return null;}}
me.getNormalizedValue=function(s,defaultValue){var crRe=new RegExp("\n","g");var r=me.getValue(s,defaultValue);if(typeof(r)=='string'){return r.replace(crRe,' ');}
else{return r;}}
me.getScriptedValue=function(s,macros,defaultValue){var r=me.getNormalizedValue(s,defaultValue);switch(typeof(r)){case"string":return resolveMacrosInString(r,macros);break;case"object":var arr=me.getValue(s,defaultValue);var cloneArr=new Array();for(var i in arr){var obj=arr[i];var cloneObj=new Object();for(var property in obj){if(typeof(obj[property])=='string'){cloneObj[property]=resolveMacrosInString(obj[property],macros);}}
cloneArr[i]=cloneObj;}
return cloneArr;break;default:return null;}}
function resolveMacrosInString(string,macros){for(i in macros){var value=macros[i]
if(!value){value="";}
var reString='@'+i+'@';var re=new RegExp(reString,'g');string=string.replace(re,value)}
return string;}
me.getScriptedValueByPriority=function(newMacro,oldMacro,macros,defaultValue){var newMacroValue=me.getScriptedValue(newMacro,macros,defaultValue);if(newMacroValue){return newMacroValue;}
else{return me.getScriptedValue(oldMacro,macros,defaultValue);}}
me.getIntegerValue=function(s,defaultValue){return parseInt(me.getValue(s,defaultValue));}
function setValue(name,valueToSet){values[name]=valueToSet;}
me.init=function(){if(EventHelpers.hasPageLoadHappened(arguments))
return;var configComment=document.getElementById(id);if(!configComment){return;}
var data=StringHelpers.uncommentHTML(configComment.innerHTML).trim();if(data.indexOf('xml=')==0){fileName=data.split('=')[1];req=XMLHelpers.getXMLHttpRequest(fileName,getOuterConfigRequestHandler,'GET','',false)
getOuterConfigRequestHandler();}
else{if(!configComment){alert('no config island.  Exiting.');return;}
xml=XMLHelpers.parseXMLDataIsland(configComment);parseConfigXML(xml)
loadEventHandler();}}
function parseConfigXML(configDoc){if(configDoc){var configTag=configDoc.getElementsByTagName('config')[0];if(!configTag){alert('no config tag in XML');return;}
var tags=configTag.childNodes;index(tags,"");}
else{}}
function getOuterConfigRequestHandler(){if(!req){return;}
if(req.readyState==ReadyState.COMPLETED){if(req.status==HttpCode.OK||req.status==HttpCode.LOCAL_OK){xml=req.responseXML
parseConfigXML(xml);req=null;loadEventHandler();}
else
if(req.status==HttpCode.NOT_FOUND){alert("config: "+fileName+" not found");}
else{alert('config: an unknown error has occured');}}}
function index(tags,prefix){if(!tags){return;}
for(var i=0;i<tags.length;i++){var theTag=tags[i];if(theTag.nodeType==DOMNode.ELEMENT_NODE){var tagName=theTag.nodeName;var childNodes=DOMHelpers.getAllChildElements(theTag);var datatype=DOMHelpers.getAttributeValue(theTag,'datatype');var removeMultispaces=(DOMHelpers.getAttributeValue(theTag,'removeMultispaces')=='true');if(datatype=='array'){setValue((prefix+'.'+tagName),getArrayValues(theTag));}
else
if(childNodes.length==0){setValue((prefix+'.'+tagName),content(theTag,removeMultispaces));}
else{if(prefix==''){index(childNodes,(tagName));}
else{index(childNodes,(prefix+'.'+tagName));}}}}}
me.addLoadEvent=function(func){funcArray.push(func);}
function loadEventHandler(){for(var i=0;i<funcArray.length;i++){funcArray[i]();}}
var StringHelpers=new function(){var me=this;me.initWhitespaceRe=/^\s\s*/;me.endWhitespaceRe=/\s\s*$/;me.whitespaceRe=/\s/;me.uncommentHTML=function(s){if(s.indexOf('-->')!=-1&&s.indexOf('<!--')!=-1){return s.replace("<!--","").replace("-->","");}
else{return s;}}}
var XMLHelpers=new function(){var me=this;var JSPcommentRe=new RegExp("<%(--)?([\\w\\W]*?)(--)?%>",'g');var beginningHTMLCommentRe=new RegExp("<!--");var endHTMLCommentRe=new RegExp("-->");me.getXMLHttpRequest=function(url,processReqChange){var req;if(window.XMLHttpRequest){req=new XMLHttpRequest();}
else
if(window.ActiveXObject){try{req=new ActiveXObject('Msxml2.XMLHTTP');}
catch(ex){req=new ActiveXObject("Microsoft.XMLHTTP");}}
else{return null;}
req.onreadystatechange=processReqChange;req.open("GET",url,true);req.setRequestHeader("If-Modified-Since","Sat, 1 Jan 2000 00:00:00 GMT");req.send("");return req;}
me.nodeToObject=function(node){var descendants=node.childNodes;var result=new Object();for(var i=0;i<descendants.length;i++){var descendant=descendants[i]
if(descendant.nodeType==DOMNode.ELEMENT_NODE){result[descendant.nodeName]=DOMHelpers.getTextContent(descendant);}}
return result;}
me.parseXMLDataIsland=function(obj){return me.parseXML(obj.innerHTML.replace(JSPcommentRe,'').replace(beginningHTMLCommentRe,'').replace(endHTMLCommentRe,''))}
me.parseXML=function(xmlString){var myDocument;if(document.implementation&&document.implementation.createDocument){var parser=new DOMParser();myDocument=parser.parseFromString(xmlString,"text/xml");}
else
if(window.ActiveXObject){myDocument=new ActiveXObject("Microsoft.XMLDOM");myDocument.async="false";myDocument.loadXML(xmlString);}
return myDocument;}}
var DOMHelpers=new function(){var me=this;me.getAllChildElements=function(obj){var allNodes=obj.childNodes;var childElements=new Array();for(var i=0;i<allNodes.length;i++){var node=allNodes[i];if(node.nodeType==DOMNode.ELEMENT_NODE){childElements.push(node);}}
return childElements;}
me.getAttributeByName=function(obj,attrName){var i;var attributes=obj.attributes;for(i=0;i<attributes.length;i++){var attr=attributes[i]
if(attr.nodeName==attrName&&attr.specified){return attr;}}
return null;}
me.getAttributeValue=function(obj,attrName){var attr=me.getAttributeByName(obj,attrName);if(attr!=null){return attr.nodeValue;}
else{return null;}}
me.getTextContent=function(tag){if(!tag||!tag.firstChild)
return"";var children=tag.childNodes;var s="";for(var i=0;i<children.length;i++){var child=children[i];var nodeType=child.nodeType;if(nodeType==DOMNode.TEXT_NODE||nodeType==DOMNode.CDATA_SECTION_NODE){s+=child.nodeValue;}}
return s;}}
var DOMNode=new function(){var me=this;this.ELEMENT_NODE=1;this.ATTRIBUTE_NODE=2;this.TEXT_NODE=3;this.CDATA_SECTION_NODE=4;this.ENTITY_REFERENCE_NODE=5;this.ENTITY_NODE=6;this.PROCESSING_INSTRUCTION_NODE=7;this.COMMENT_NODE=8;this.DOCUMENT_NODE=9;this.DOCUMENT_TYPE_NODE=10;this.DOCUMENT_FRAGMENT_NODE=11;this.NOTATION_NODE=12;}
var ReadyState=new function(){var me=this;me.UNINITIALIZED=0;me.LOADING=1;me.LOADED=2;me.INTERACTIVE=3;me.COMPLETED=4;}
var HttpCode=new function(){var me=this;me.LOCAL_OK=0;me.CONTINUE=100;me.SWITCHING_PROTOCOLS=101;me.PROCESSING=102;me.OK=200;me.CREATED=201;me.ACCEPTED=202;me.NONAUTHORITATIVE_INFO=203;me.NO_CONTENT=204;me.RESET_CONTENT=205;me.PARTIAL_CONTENT=206;me.MULTI_STATUS=207;me.MULTIPLE_CHOICES=300;me.MOVED_PERMANENTLY=301;me.FOUND=302;me.SEE_OTHER=303;me.NOT_MODIFIED=304;me.USE_PROXY=305;me.SWITCH_PROXY;me.TEMPORARY_REDIRECT=307;me.BAD_REQUEST=400;me.UNAUTHORIZED=401;me.PAYMENT_REQUIRED=402;me.FORBIDDEN=403;me.NOT_FOUND=404;me.METHOD_NOT_ALLOWED=405;me.NOT_ACCEPTABLE=406;me.PROXY_AUTHENTICATION=407;me.REQUEST_TIMEOUT=408;me.CONFLICT=409;me.GONE=410;me.LENGTH_REQUIRED=411;me.PRECONDITION_FAILED=412;me.REQUEST_ENTITY_TOO_LARGE=413;me.REQUEST_URI_TOO_LONG=414;me.UNSUPPORTED_MEDIA_TYPE=415;me.REQUESTED_RANGE_NOT_SATISFIABLE=416;me.EXPECTATION_FAILED=417;me.UNPROCESSABLE_ENTITY=422;me.LOCKED=423;me.FAILED_DEPENDENCY=424;me.UNORDERED_COLLECTION=425;me.UPGRADE_REQUIRED=426;me.RETRY_WITH=449
me.INTERNAL_SERVER_ERROR=500;me.NOT_IMPLEMENTED=501;me.BAD_GATEWAY=502;me.SERVICE_UNAVAILABLE=503;me.GATEWAY_TIMEOUT=504;me.HTTP_VERSION_NOT_SUPPORTED=505;me.INSUFFICIENT_STORAGE=507;me.BANDWIDTH_LIMIT_EXCEEDED=509;me.isInformational=function(n){return(100<=n&&n<=199);}
me.isSuccessful=function(n){return(200<=n&&n<=299)}
me.isRedirection=function(n){return(300<=n&&n<=399);}
me.isClientError=function(n){return(400<=n&&n<=499);}
me.isServerError=function(n){return(500<=n&&n<=599);}}
String.prototype.trim=function(){var str=this;if(this.length>6000){str=this.replace(StringHelpers.initWhitespaceRe,'');var i=str.length;while(StringHelpers.whitespaceRe.test(str.charAt(--i)));return str.slice(0,i+1);}else{return this.replace(StringHelpers.initWhitespaceRe,'').replace(StringHelpers.endWhitespaceRe,'');}};}
var config=new Config('config');EventHelpers.addPageLoadEvent("config.init");