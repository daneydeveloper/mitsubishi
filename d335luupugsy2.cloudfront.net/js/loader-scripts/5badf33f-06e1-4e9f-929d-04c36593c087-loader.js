"use strict";var RDStation=function(){var t={};return t.windowLoaded=!1,window.addEventListener("load",function(){t.windowLoaded=!0}),t}();!function(){function t(t){"complete"===document.readyState?t():window.addEventListener("load",t)}var e=function(){var t=document.createElement("iframe");t.onload=function(){RDStation.windowLoaded=!0,o()},t.setAttribute("style","width: 1px; height: 1px; position: absolute; top: -100px;"),t.setAttribute("id","rd_tmgr"),document.body.appendChild(t)},n=function(t){for(var e=t+"=",n=document.cookie.split(";"),a=0;a<n.length;a++){for(var o=n[a];" "==o.charAt(0);)o=o.substring(1,o.length);if(0===o.indexOf(e))return o.substring(e.length,o.length)}return null},a=function(){if(window.opener){var t=null!==n("__trf.src")?"true":"false";window.opener.postMessage({task:"checkTagManager",tagManagerChecked:t},"https://app.rdstation.com.br")}},o=function(){var t=document.createElement("script"),e=function(){TrafficSourceCookie.init("__trf.src",".grupognc.com.br"),a()};t.setAttribute("type","text/javascript"),t.setAttribute("src","https://d335luupugsy2.cloudfront.net/js/traffic-source-cookie/stable/traffic-source-cookie.min.js"),t.readyState?t.onreadystatechange=function(){("loaded"==t.readyState||"complete"==t.readyState)&&(t.onreadystatechange=null,e())}:t.onload=function(){e()},document.body.appendChild(t);var n=document.createElement("script"),o=function(){LeadTracking.init({token:"0af98a50f5967a4997899942022757ea"})};n.setAttribute("type","text/javascript"),n.setAttribute("src","https://d335luupugsy2.cloudfront.net/js/lead-tracking/stable/lead-tracking.min.js"),n.readyState?n.onreadystatechange=function(){("loaded"==n.readyState||"complete"==n.readyState)&&(n.onreadystatechange=null,o())}:n.onload=function(){o()},document.body.appendChild(n);var r=document.createElement("script"),d=function(){RdstationPopup.init("0af98a50f5967a4997899942022757ea",21329,"UA-85745945-1")};r.setAttribute("type","text/javascript"),r.setAttribute("src","https://d335luupugsy2.cloudfront.net/js/rdstation-popups/stable/rdstation-popup.min.js?v=1"),r.readyState?r.onreadystatechange=function(){("loaded"==r.readyState||"complete"==r.readyState)&&(r.onreadystatechange=null,d())}:r.onload=function(){d()},document.body.appendChild(r)};t(e)}();