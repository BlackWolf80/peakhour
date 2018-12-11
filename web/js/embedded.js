(function(e,g,k,c){if(!g||!k){return}var j,h="iv-embed",n="data-iv",l=[];function m(t,r,q){var v,u,w,p,s;
if(!r){return[]}if(typeof k.getElementsByClassName!=="function"){v=t.getElementsByTagName(q||"*");
u=[];w=new RegExp("(^|\\b)"+r+"(\\b|$)");for(p=0,s=v.length;p<s;p++){if(w.test(v[p].className)){u.push(v[p])
}}return u}return t.getElementsByClassName(r)}function d(p){}function b(p){}function o(p){var q=l[l.length]={el:p};
return d(q)}function a(){var s,r,p;try{s=m(k,h,"DIV");if(s){for(p=s.length,r=0;r<p;
++r){if(!s[r].getAttribute(n)){s[r].setAttribute(n,"1");return o(s[r])}}}}catch(q){}}function f(){if(!k.body){return setTimeout(f,1)
}j=true;a()}function i(){if(k.addEventListener){k.removeEventListener("DOMContentLoaded",i,false);
f()}else{if(k.readyState==="complete"){k.detachEvent("onreadystatechange",i);f()}}}(function(){if(k.readyState==="complete"){setTimeout(f,1)
}else{if(k.addEventListener){k.addEventListener("DOMContentLoaded",i,false);g.addEventListener("load",f,false)
}else{k.attachEvent("onreadystatechange",i);g.attachEvent("onload",f);var r=false;
try{r=g.frameElement==null&&k.documentElement}catch(q){}if(r&&r.doScroll){(function p(){if(!j){try{r.doScroll("left")
}catch(s){return setTimeout(p,50)}f()}})()}}}}())}(window?window.jQuery:null,window,window?window.document:null));