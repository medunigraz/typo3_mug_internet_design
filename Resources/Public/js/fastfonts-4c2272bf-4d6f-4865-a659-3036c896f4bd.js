var MonoTypeWebFonts={};MonoTypeWebFonts.addEvent=function(e,n){if("undefined"!=typeof MonoTypeWebFonts.loadFonts)MonoTypeWebFonts.addEvent(e,n);else{var o=this;setTimeout(function(){o.addEvent(e,n)},0)}};mti_loadScript( function () {if(window.addEventListener){  window.addEventListener('load', function(){MonoTypeWebFonts.cleanup();}, false);}else if(window.attachEvent){  window.attachEvent('onload', function(){MonoTypeWebFonts.cleanup();});}MonoTypeWebFonts.loadColo = function(){};MonoTypeWebFonts.cleanupExecuted = false;MonoTypeWebFonts.cleanup = function(){if(MonoTypeWebFonts.cleanupExecuted === true){ return; }MonoTypeWebFonts.cleanupExecuted = (window['mti_element_cache'].length > 0);var className = document.documentElement.className;var MTIConfig = window['MTIConfig'] || { 'RemoveMTIClass': false };if(MTIConfig['RemoveMTIClass']==true){eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('8 l(2,n){n(2);2=2.D;r(2){l(2,n);2=2.A}}8 e(4){9(j.e){o j.e(4)}x{5 k=[];l(j.I,8(2){5 a,c=2.4,i;9(c){a=c.z(\' \');p(i=0;i<a.f;i++){9(a[i]===4){k.F(2);J}}}});o k}}H(8(){5 3=e(\'m\');5 u=E.K;5 h=u.B(),C=8(t){o h.G(t)>-1},b=(!(/R|T/i.q(h))&&/S\\s(\\d)/.q(h)),c=L;9((v.$1==6)||(v.$1==7)){c=Q}r(3.f>0){p(5 i=0;i<3.f;i++){5 w=3[i].4.z(\' \');9(w.f==1&&!c){3[i].M(\'N\')}x{3[i].4=3[i].4.y(/m/O,\' \').y(/^\\s+|\\s+$/g,\'\')}}3=e(\'m\')}},P);',56,56,'||node|mti_elements|className|var|||function|if|||||getElementsByClassName|length||ua||document|results|walkTheDOM|mti_font_element|func|return|for|test|while||||RegExp|classList|else|replace|split|nextSibling|toLowerCase|is|firstChild|navigator|push|indexOf|setTimeout|body|break|userAgent|false|removeAttribute|class|ig|40000|true|opera|msie|webtv'.split('|'),0,{}))}className = className;if(!document.getElementById('MonoTypeFontApiFontTracker')){eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('5 3="6://j.i.z/t/1.7";a(k.l.h==\'8:\'){3=3.g(/6:/,\'8:\')}5 b=9.d(\'e\')[0];5 2=9.v(\'w\');a(2){2.4(\'y\',\'u\');2.4(\'s\',\'o/7\');2.4(\'q\',\'r\');2.4(\'f\',3+"?p=x&n=m");b.c(2)}',36,36,'||cssEle|fontTrackingUrl|setAttribute|var|http|css|https|document|if|head|appendChild|getElementsByTagName|HEAD|href|replace|protocol|fonts|fast|window|location|4c2272bf-4d6f-4865-a659-3036c896f4bd|projectid|text|apiType|rel|stylesheet|type||MonoTypeFontApiFontTracker|createElement|LINK|js|id|net'.split('|'),0,{}))}window['mti_element_cache'] = [];};MonoTypeWebFonts._fontActiveEventList = [];MonoTypeWebFonts._fontLoadingEventList = [];MonoTypeWebFonts._activeEventList = [];MonoTypeWebFonts._inActiveEventList = [];MonoTypeWebFonts.addEvent = function(eventName, callbackFunction){   if(eventName.toLowerCase() == 'fontactive'){      MonoTypeWebFonts._fontActiveEventList.push(callbackFunction);  }else if(eventName.toLowerCase() == 'fontloading'){      MonoTypeWebFonts._fontLoadingEventList.push(callbackFunction);  }else if(eventName.toLowerCase() == 'inactive'){      MonoTypeWebFonts._inActiveEventList.push(callbackFunction);  }else if(eventName.toLowerCase() == 'active'){      MonoTypeWebFonts._activeEventList.push(callbackFunction);  }};MonoTypeWebFonts.loadFonts = function(){MonoTypeWebFonts.load({monotype:{efg:false, reqSub:false, enableOtf: false, otfJsParentUrl: 'https://fast.fonts.net/jsapi/otjs/', pfL:[{'fontfamily' : "Trebuchet W01 Regular" ,contentIds :{WOFF: '2ce511de-aa95-4ce0-84ae-f462ece99bf7',WOFF2: 'f2c6415f-9bf2-4714-8c9e-98f1215e4f24'}, enableSubsetting : false, enableOtf: false}],selectorFontMap:{},ck:'d44f19a684109620e4841579a690e818ae205577778b3594a25a229534a2ec191951bacd3d010530cabcc25edad50217fea529464460dd27865fee993726597f19d9366b0af28b786e7cb7fa1472f0533e4cd9b59568e9aa61061e7f823186ed39bef79a69',fcURL:'http://fast.fonts.net/dv2/',env:'',projectId:'4c2272bf-4d6f-4865-a659-3036c896f4bd',EOD:null},fontloading:function(fontFamily, fontDescription){  for(var i=0; i<MonoTypeWebFonts._fontLoadingEventList.length; i++){      MonoTypeWebFonts._fontLoadingEventList[i].call(MonoTypeWebFonts, fontFamily, fontDescription);  }},fontactive:function(fontFamily, fontDescription) {  for(var i=0; i<MonoTypeWebFonts._fontActiveEventList.length; i++){      MonoTypeWebFonts._fontActiveEventList[i].call(MonoTypeWebFonts, fontFamily, fontDescription);  }},inactive:function(){  MonoTypeWebFonts.cleanup();  for(var i=0; i<MonoTypeWebFonts._inActiveEventList.length; i++){      MonoTypeWebFonts._inActiveEventList[i].call(MonoTypeWebFonts);  }},active:function(){  MonoTypeWebFonts.cleanup();  for(var i=0; i<MonoTypeWebFonts._activeEventList.length; i++){      MonoTypeWebFonts._activeEventList[i].call(MonoTypeWebFonts);  }}});};try {MonoTypeWebFonts.loadFonts(); } catch (e) {}setTimeout(function(){ MonoTypeWebFonts.cleanup(); }, 40000);});function mti_loadScript(a) { "undefined"!=typeof MTIConfig&&1==MTIConfig.EnableCustomFOUTHandler&&(document.documentElement.style.visibility="hidden");var mti_coreJsURL="https://fast.fonts.net/jsapi/core/mt.js";var env="";var UA=navigator.userAgent.toLowerCase(),isIE8=-1!=UA.indexOf("msie")?parseInt(UA.split("msie")[1]):!1;isIE8&&(mti_coreJsURL="https://fast.fonts.net/jsapi/core/mti.js");"undefined"!=typeof MTIConfig&&1==MTIConfig.EnableDSForAllFonts&&(mti_coreJsURL=isIE8?"https://fast.fonts.net/jsapi/core/mti_cjk.js":"https://fast.fonts.net/jsapi/core/mt_cjk.js");if("undefined"!=typeof MTIConfig&&"undefined"!=typeof MTIConfig.version&&""!=MTIConfig.version){var fileName=mti_coreJsURL.split("/").pop();mti_coreJsURL="https://fast.fonts.net/jsapi/core/"+MTIConfig.version+"/"+fileName}var b=document.createElement("script");b.type="text/javascript",b.readyState?b.onreadystatechange=function(){("loaded"==b.readyState||"complete"==b.readyState)&&(b.onreadystatechange=null,a())}:b.onload=function(){a()},b.src=mti_coreJsURL,document.getElementsByTagName("head")[0].appendChild(b);};