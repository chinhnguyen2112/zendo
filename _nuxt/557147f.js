(window.webpackJsonp=window.webpackJsonp||[]).push([[115],{119:function(t,h,n){"use strict";var e=n(50),r=n(36);function o(){this.pending=null,this.pendingTotal=0,this.blockSize=this.constructor.blockSize,this.outSize=this.constructor.outSize,this.hmacStrength=this.constructor.hmacStrength,this.padLength=this.constructor.padLength/8,this.endian="big",this._delta8=this.blockSize/8,this._delta32=this.blockSize/32}h.BlockHash=o,o.prototype.update=function(t,h){if(t=e.toArray(t,h),this.pending?this.pending=this.pending.concat(t):this.pending=t,this.pendingTotal+=t.length,this.pending.length>=this._delta8){var n=(t=this.pending).length%this._delta8;this.pending=t.slice(t.length-n,t.length),0===this.pending.length&&(this.pending=null),t=e.join32(t,0,t.length-n,this.endian);for(var i=0;i<t.length;i+=this._delta32)this._update(t,i,i+this._delta32)}return this},o.prototype.digest=function(t){return this.update(this._pad()),r(null===this.pending),this._digest(t)},o.prototype._pad=function(){var t=this.pendingTotal,h=this._delta8,n=h-(t+this.padLength)%h,e=new Array(n+this.padLength);e[0]=128;for(var i=1;i<n;i++)e[i]=0;if(t<<=3,"big"===this.endian){for(var r=8;r<this.padLength;r++)e[i++]=0;e[i++]=0,e[i++]=0,e[i++]=0,e[i++]=0,e[i++]=t>>>24&255,e[i++]=t>>>16&255,e[i++]=t>>>8&255,e[i++]=255&t}else for(e[i++]=255&t,e[i++]=t>>>8&255,e[i++]=t>>>16&255,e[i++]=t>>>24&255,e[i++]=0,e[i++]=0,e[i++]=0,e[i++]=0,r=8;r<this.padLength;r++)e[i++]=0;return e}},221:function(t,h,n){var e=h;e.utils=n(50),e.common=n(119),e.sha=n(548),e.ripemd=n(552),e.hmac=n(553),e.sha1=e.sha.sha1,e.sha256=e.sha.sha256,e.sha224=e.sha.sha224,e.sha384=e.sha.sha384,e.sha512=e.sha.sha512,e.ripemd160=e.ripemd.ripemd160},355:function(t,h,n){"use strict";var e=n(50).rotr32;function r(t,h,n){return t&h^~t&n}function o(t,h,n){return t&h^t&n^h&n}function c(t,h,n){return t^h^n}h.ft_1=function(s,t,h,n){return 0===s?r(t,h,n):1===s||3===s?c(t,h,n):2===s?o(t,h,n):void 0},h.ch32=r,h.maj32=o,h.p32=c,h.s0_256=function(t){return e(t,2)^e(t,13)^e(t,22)},h.s1_256=function(t){return e(t,6)^e(t,11)^e(t,25)},h.g0_256=function(t){return e(t,7)^e(t,18)^t>>>3},h.g1_256=function(t){return e(t,17)^e(t,19)^t>>>10}},356:function(t,h,n){"use strict";var e=n(50),r=n(119),o=n(355),c=n(36),l=e.sum32,f=e.sum32_4,d=e.sum32_5,_=o.ch32,v=o.maj32,m=o.s0_256,y=o.s1_256,S=o.g0_256,k=o.g1_256,w=r.BlockHash,z=[1116352408,1899447441,3049323471,3921009573,961987163,1508970993,2453635748,2870763221,3624381080,310598401,607225278,1426881987,1925078388,2162078206,2614888103,3248222580,3835390401,4022224774,264347078,604807628,770255983,1249150122,1555081692,1996064986,2554220882,2821834349,2952996808,3210313671,3336571891,3584528711,113926993,338241895,666307205,773529912,1294757372,1396182291,1695183700,1986661051,2177026350,2456956037,2730485921,2820302411,3259730800,3345764771,3516065817,3600352804,4094571909,275423344,430227734,506948616,659060556,883997877,958139571,1322822218,1537002063,1747873779,1955562222,2024104815,2227730452,2361852424,2428436474,2756734187,3204031479,3329325298];function x(){if(!(this instanceof x))return new x;w.call(this),this.h=[1779033703,3144134277,1013904242,2773480762,1359893119,2600822924,528734635,1541459225],this.k=z,this.W=new Array(64)}e.inherits(x,w),t.exports=x,x.blockSize=512,x.outSize=256,x.hmacStrength=192,x.padLength=64,x.prototype._update=function(t,h){for(var n=this.W,i=0;i<16;i++)n[i]=t[h+i];for(;i<n.length;i++)n[i]=f(k(n[i-2]),n[i-7],S(n[i-15]),n[i-16]);var a=this.h[0],b=this.h[1],e=this.h[2],r=this.h[3],o=this.h[4],w=this.h[5],g=this.h[6],z=this.h[7];for(c(this.k.length===n.length),i=0;i<n.length;i++){var x=d(z,y(o),_(o,w,g),this.k[i],n[i]),A=l(m(a),v(a,b,e));z=g,g=w,w=o,o=l(r,x),r=e,e=b,b=a,a=l(x,A)}this.h[0]=l(this.h[0],a),this.h[1]=l(this.h[1],b),this.h[2]=l(this.h[2],e),this.h[3]=l(this.h[3],r),this.h[4]=l(this.h[4],o),this.h[5]=l(this.h[5],w),this.h[6]=l(this.h[6],g),this.h[7]=l(this.h[7],z)},x.prototype._digest=function(t){return"hex"===t?e.toHex32(this.h,"big"):e.split32(this.h,"big")}},357:function(t,h,n){"use strict";var e=n(50),r=n(119),o=n(36),c=e.rotr64_hi,l=e.rotr64_lo,f=e.shr64_hi,d=e.shr64_lo,_=e.sum64,v=e.sum64_hi,m=e.sum64_lo,y=e.sum64_4_hi,S=e.sum64_4_lo,k=e.sum64_5_hi,w=e.sum64_5_lo,z=r.BlockHash,x=[1116352408,3609767458,1899447441,602891725,3049323471,3964484399,3921009573,2173295548,961987163,4081628472,1508970993,3053834265,2453635748,2937671579,2870763221,3664609560,3624381080,2734883394,310598401,1164996542,607225278,1323610764,1426881987,3590304994,1925078388,4068182383,2162078206,991336113,2614888103,633803317,3248222580,3479774868,3835390401,2666613458,4022224774,944711139,264347078,2341262773,604807628,2007800933,770255983,1495990901,1249150122,1856431235,1555081692,3175218132,1996064986,2198950837,2554220882,3999719339,2821834349,766784016,2952996808,2566594879,3210313671,3203337956,3336571891,1034457026,3584528711,2466948901,113926993,3758326383,338241895,168717936,666307205,1188179964,773529912,1546045734,1294757372,1522805485,1396182291,2643833823,1695183700,2343527390,1986661051,1014477480,2177026350,1206759142,2456956037,344077627,2730485921,1290863460,2820302411,3158454273,3259730800,3505952657,3345764771,106217008,3516065817,3606008344,3600352804,1432725776,4094571909,1467031594,275423344,851169720,430227734,3100823752,506948616,1363258195,659060556,3750685593,883997877,3785050280,958139571,3318307427,1322822218,3812723403,1537002063,2003034995,1747873779,3602036899,1955562222,1575990012,2024104815,1125592928,2227730452,2716904306,2361852424,442776044,2428436474,593698344,2756734187,3733110249,3204031479,2999351573,3329325298,3815920427,3391569614,3928383900,3515267271,566280711,3940187606,3454069534,4118630271,4000239992,116418474,1914138554,174292421,2731055270,289380356,3203993006,460393269,320620315,685471733,587496836,852142971,1086792851,1017036298,365543100,1126000580,2618297676,1288033470,3409855158,1501505948,4234509866,1607167915,987167468,1816402316,1246189591];function A(){if(!(this instanceof A))return new A;z.call(this),this.h=[1779033703,4089235720,3144134277,2227873595,1013904242,4271175723,2773480762,1595750129,1359893119,2917565137,2600822924,725511199,528734635,4215389547,1541459225,327033209],this.k=x,this.W=new Array(160)}function H(t,h,n,e,r){var o=t&n^~t&r;return o<0&&(o+=4294967296),o}function L(t,h,n,e,r,o){var c=h&e^~h&o;return c<0&&(c+=4294967296),c}function V(t,h,n,e,r){var o=t&n^t&r^n&r;return o<0&&(o+=4294967296),o}function E(t,h,n,e,r,o){var c=h&e^h&o^e&o;return c<0&&(c+=4294967296),c}function B(t,h){var n=c(t,h,28)^c(h,t,2)^c(h,t,7);return n<0&&(n+=4294967296),n}function W(t,h){var n=l(t,h,28)^l(h,t,2)^l(h,t,7);return n<0&&(n+=4294967296),n}function K(t,h){var n=c(t,h,14)^c(t,h,18)^c(h,t,9);return n<0&&(n+=4294967296),n}function j(t,h){var n=l(t,h,14)^l(t,h,18)^l(h,t,9);return n<0&&(n+=4294967296),n}function C(t,h){var n=c(t,h,1)^c(t,h,8)^f(t,h,7);return n<0&&(n+=4294967296),n}function I(t,h){var n=l(t,h,1)^l(t,h,8)^d(t,h,7);return n<0&&(n+=4294967296),n}function R(t,h){var n=c(t,h,19)^c(h,t,29)^f(t,h,6);return n<0&&(n+=4294967296),n}function T(t,h){var n=l(t,h,19)^l(h,t,29)^d(t,h,6);return n<0&&(n+=4294967296),n}e.inherits(A,z),t.exports=A,A.blockSize=1024,A.outSize=512,A.hmacStrength=192,A.padLength=128,A.prototype._prepareBlock=function(t,h){for(var n=this.W,i=0;i<32;i++)n[i]=t[h+i];for(;i<n.length;i+=2){var e=R(n[i-4],n[i-3]),r=T(n[i-4],n[i-3]),o=n[i-14],c=n[i-13],l=C(n[i-30],n[i-29]),f=I(n[i-30],n[i-29]),d=n[i-32],_=n[i-31];n[i]=y(e,r,o,c,l,f,d,_),n[i+1]=S(e,r,o,c,l,f,d,_)}},A.prototype._update=function(t,h){this._prepareBlock(t,h);var n=this.W,e=this.h[0],r=this.h[1],c=this.h[2],l=this.h[3],f=this.h[4],d=this.h[5],y=this.h[6],dl=this.h[7],S=this.h[8],z=this.h[9],x=this.h[10],A=this.h[11],C=this.h[12],I=this.h[13],R=this.h[14],T=this.h[15];o(this.k.length===n.length);for(var i=0;i<n.length;i+=2){var J=R,M=T,N=K(S,z),P=j(S,z),O=H(S,z,x,A,C),D=L(S,z,x,A,C,I),F=this.k[i],G=this.k[i+1],Q=n[i],U=n[i+1],X=k(J,M,N,P,O,D,F,G,Q,U),Y=w(J,M,N,P,O,D,F,G,Q,U);J=B(e,r),M=W(e,r),N=V(e,r,c,l,f),P=E(e,r,c,l,f,d);var Z=v(J,M,N,P),$=m(J,M,N,P);R=C,T=I,C=x,I=A,x=S,A=z,S=v(y,dl,X,Y),z=m(dl,dl,X,Y),y=f,dl=d,f=c,d=l,c=e,l=r,e=v(X,Y,Z,$),r=m(X,Y,Z,$)}_(this.h,0,e,r),_(this.h,2,c,l),_(this.h,4,f,d),_(this.h,6,y,dl),_(this.h,8,S,z),_(this.h,10,x,A),_(this.h,12,C,I),_(this.h,14,R,T)},A.prototype._digest=function(t){return"hex"===t?e.toHex32(this.h,"big"):e.split32(this.h,"big")}},410:function(t,h,n){var e=n(718),r=n(400),o=t.exports;for(var c in e)e.hasOwnProperty(c)&&(o[c]=e[c]);function l(t){if("string"==typeof t&&(t=r.parse(t)),t.protocol||(t.protocol="https:"),"https:"!==t.protocol)throw new Error('Protocol "'+t.protocol+'" not supported. Expected "https:"');return t}o.request=function(t,h){return t=l(t),e.request.call(this,t,h)},o.get=function(t,h){return t=l(t),e.get.call(this,t,h)}},50:function(t,h,n){"use strict";var e=n(36),r=n(6);function o(t,i){return 55296==(64512&t.charCodeAt(i))&&(!(i<0||i+1>=t.length)&&56320==(64512&t.charCodeAt(i+1)))}function c(t){return(t>>>24|t>>>8&65280|t<<8&16711680|(255&t)<<24)>>>0}function l(t){return 1===t.length?"0"+t:t}function f(t){return 7===t.length?"0"+t:6===t.length?"00"+t:5===t.length?"000"+t:4===t.length?"0000"+t:3===t.length?"00000"+t:2===t.length?"000000"+t:1===t.length?"0000000"+t:t}h.inherits=r,h.toArray=function(t,h){if(Array.isArray(t))return t.slice();if(!t)return[];var n=[];if("string"==typeof t)if(h){if("hex"===h)for((t=t.replace(/[^a-z0-9]+/gi,"")).length%2!=0&&(t="0"+t),i=0;i<t.length;i+=2)n.push(parseInt(t[i]+t[i+1],16))}else for(var p=0,i=0;i<t.length;i++){var e=t.charCodeAt(i);e<128?n[p++]=e:e<2048?(n[p++]=e>>6|192,n[p++]=63&e|128):o(t,i)?(e=65536+((1023&e)<<10)+(1023&t.charCodeAt(++i)),n[p++]=e>>18|240,n[p++]=e>>12&63|128,n[p++]=e>>6&63|128,n[p++]=63&e|128):(n[p++]=e>>12|224,n[p++]=e>>6&63|128,n[p++]=63&e|128)}else for(i=0;i<t.length;i++)n[i]=0|t[i];return n},h.toHex=function(t){for(var h="",i=0;i<t.length;i++)h+=l(t[i].toString(16));return h},h.htonl=c,h.toHex32=function(t,h){for(var n="",i=0;i<t.length;i++){var e=t[i];"little"===h&&(e=c(e)),n+=f(e.toString(16))}return n},h.zero2=l,h.zero8=f,h.join32=function(t,h,n,r){var o=n-h;e(o%4==0);for(var c=new Array(o/4),i=0,l=h;i<c.length;i++,l+=4){var f;f="big"===r?t[l]<<24|t[l+1]<<16|t[l+2]<<8|t[l+3]:t[l+3]<<24|t[l+2]<<16|t[l+1]<<8|t[l],c[i]=f>>>0}return c},h.split32=function(t,h){for(var n=new Array(4*t.length),i=0,e=0;i<t.length;i++,e+=4){var r=t[i];"big"===h?(n[e]=r>>>24,n[e+1]=r>>>16&255,n[e+2]=r>>>8&255,n[e+3]=255&r):(n[e+3]=r>>>24,n[e+2]=r>>>16&255,n[e+1]=r>>>8&255,n[e]=255&r)}return n},h.rotr32=function(t,b){return t>>>b|t<<32-b},h.rotl32=function(t,b){return t<<b|t>>>32-b},h.sum32=function(a,b){return a+b>>>0},h.sum32_3=function(a,b,t){return a+b+t>>>0},h.sum32_4=function(a,b,t,h){return a+b+t+h>>>0},h.sum32_5=function(a,b,t,h,n){return a+b+t+h+n>>>0},h.sum64=function(t,h,n,e){var r=t[h],o=e+t[h+1]>>>0,c=(o<e?1:0)+n+r;t[h]=c>>>0,t[h+1]=o},h.sum64_hi=function(t,h,n,e){return(h+e>>>0<h?1:0)+t+n>>>0},h.sum64_lo=function(t,h,n,e){return h+e>>>0},h.sum64_4_hi=function(t,h,n,e,r,o,c,dl){var l=0,f=h;return l+=(f=f+e>>>0)<h?1:0,l+=(f=f+o>>>0)<o?1:0,t+n+r+c+(l+=(f=f+dl>>>0)<dl?1:0)>>>0},h.sum64_4_lo=function(t,h,n,e,r,o,c,dl){return h+e+o+dl>>>0},h.sum64_5_hi=function(t,h,n,e,r,o,c,dl,l,f){var d=0,_=h;return d+=(_=_+e>>>0)<h?1:0,d+=(_=_+o>>>0)<o?1:0,d+=(_=_+dl>>>0)<dl?1:0,t+n+r+c+l+(d+=(_=_+f>>>0)<f?1:0)>>>0},h.sum64_5_lo=function(t,h,n,e,r,o,c,dl,l,f){return h+e+o+dl+f>>>0},h.rotr64_hi=function(t,h,n){return(h<<32-n|t>>>n)>>>0},h.rotr64_lo=function(t,h,n){return(t<<32-n|h>>>n)>>>0},h.shr64_hi=function(t,h,n){return t>>>n},h.shr64_lo=function(t,h,n){return(t<<32-n|h>>>n)>>>0}},548:function(t,h,n){"use strict";h.sha1=n(549),h.sha224=n(550),h.sha256=n(356),h.sha384=n(551),h.sha512=n(357)},549:function(t,h,n){"use strict";var e=n(50),r=n(119),o=n(355),c=e.rotl32,l=e.sum32,f=e.sum32_5,d=o.ft_1,_=r.BlockHash,v=[1518500249,1859775393,2400959708,3395469782];function m(){if(!(this instanceof m))return new m;_.call(this),this.h=[1732584193,4023233417,2562383102,271733878,3285377520],this.W=new Array(80)}e.inherits(m,_),t.exports=m,m.blockSize=512,m.outSize=160,m.hmacStrength=80,m.padLength=64,m.prototype._update=function(t,h){for(var n=this.W,i=0;i<16;i++)n[i]=t[h+i];for(;i<n.length;i++)n[i]=c(n[i-3]^n[i-8]^n[i-14]^n[i-16],1);var a=this.h[0],b=this.h[1],e=this.h[2],r=this.h[3],o=this.h[4];for(i=0;i<n.length;i++){var s=~~(i/20),_=f(c(a,5),d(s,b,e,r),o,n[i],v[s]);o=r,r=e,e=c(b,30),b=a,a=_}this.h[0]=l(this.h[0],a),this.h[1]=l(this.h[1],b),this.h[2]=l(this.h[2],e),this.h[3]=l(this.h[3],r),this.h[4]=l(this.h[4],o)},m.prototype._digest=function(t){return"hex"===t?e.toHex32(this.h,"big"):e.split32(this.h,"big")}},550:function(t,h,n){"use strict";var e=n(50),r=n(356);function o(){if(!(this instanceof o))return new o;r.call(this),this.h=[3238371032,914150663,812702999,4144912697,4290775857,1750603025,1694076839,3204075428]}e.inherits(o,r),t.exports=o,o.blockSize=512,o.outSize=224,o.hmacStrength=192,o.padLength=64,o.prototype._digest=function(t){return"hex"===t?e.toHex32(this.h.slice(0,7),"big"):e.split32(this.h.slice(0,7),"big")}},551:function(t,h,n){"use strict";var e=n(50),r=n(357);function o(){if(!(this instanceof o))return new o;r.call(this),this.h=[3418070365,3238371032,1654270250,914150663,2438529370,812702999,355462360,4144912697,1731405415,4290775857,2394180231,1750603025,3675008525,1694076839,1203062813,3204075428]}e.inherits(o,r),t.exports=o,o.blockSize=1024,o.outSize=384,o.hmacStrength=192,o.padLength=128,o.prototype._digest=function(t){return"hex"===t?e.toHex32(this.h.slice(0,12),"big"):e.split32(this.h.slice(0,12),"big")}},552:function(t,h,n){"use strict";var e=n(50),r=n(119),o=e.rotl32,c=e.sum32,l=e.sum32_3,f=e.sum32_4,d=r.BlockHash;function _(){if(!(this instanceof _))return new _;d.call(this),this.h=[1732584193,4023233417,2562383102,271733878,3285377520],this.endian="little"}function v(t,h,n,e){return t<=15?h^n^e:t<=31?h&n|~h&e:t<=47?(h|~n)^e:t<=63?h&e|n&~e:h^(n|~e)}function m(t){return t<=15?0:t<=31?1518500249:t<=47?1859775393:t<=63?2400959708:2840853838}function y(t){return t<=15?1352829926:t<=31?1548603684:t<=47?1836072691:t<=63?2053994217:0}e.inherits(_,d),h.ripemd160=_,_.blockSize=512,_.outSize=160,_.hmacStrength=192,_.padLength=64,_.prototype._update=function(t,h){for(var n=this.h[0],e=this.h[1],r=this.h[2],d=this.h[3],_=this.h[4],z=n,x=e,A=r,H=d,L=_,V=0;V<80;V++){var E=c(o(f(n,v(V,e,r,d),t[S[V]+h],m(V)),s[V]),_);n=_,_=d,d=o(r,10),r=e,e=E,E=c(o(f(z,v(79-V,x,A,H),t[k[V]+h],y(V)),w[V]),L),z=L,L=H,H=o(A,10),A=x,x=E}E=l(this.h[1],r,H),this.h[1]=l(this.h[2],d,L),this.h[2]=l(this.h[3],_,z),this.h[3]=l(this.h[4],n,x),this.h[4]=l(this.h[0],e,A),this.h[0]=E},_.prototype._digest=function(t){return"hex"===t?e.toHex32(this.h,"little"):e.split32(this.h,"little")};var S=[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,7,4,13,1,10,6,15,3,12,0,9,5,2,14,11,8,3,10,14,4,9,15,8,1,2,7,0,6,13,11,5,12,1,9,11,10,0,8,12,4,13,3,7,15,14,5,6,2,4,0,5,9,7,12,2,10,14,1,3,8,11,6,15,13],k=[5,14,7,0,9,2,11,4,13,6,15,8,1,10,3,12,6,11,3,7,0,13,5,10,14,15,8,12,4,9,1,2,15,5,1,3,7,14,6,9,11,8,12,2,10,0,4,13,8,6,4,1,3,11,15,0,5,12,2,13,9,7,10,14,12,15,10,4,1,5,8,7,6,2,13,14,0,3,9,11],s=[11,14,15,12,5,8,7,9,11,13,14,15,6,7,9,8,7,6,8,13,11,9,7,15,7,12,15,9,11,7,13,12,11,13,6,7,14,9,13,15,14,8,13,6,5,12,7,5,11,12,14,15,14,15,9,8,9,14,5,6,8,6,5,12,9,15,5,11,6,8,13,12,5,12,13,14,11,8,5,6],w=[8,9,9,11,13,15,15,5,7,7,8,11,14,14,12,6,9,13,15,7,12,8,9,11,7,7,12,7,6,15,13,11,9,7,15,11,8,6,6,14,12,13,5,14,13,13,7,5,15,5,8,11,14,14,6,14,6,9,12,9,12,5,15,8,8,5,12,9,12,5,14,6,8,13,6,5,15,13,11,11]},553:function(t,h,n){"use strict";var e=n(50),r=n(36);function o(t,h,n){if(!(this instanceof o))return new o(t,h,n);this.Hash=t,this.blockSize=t.blockSize/8,this.outSize=t.outSize/8,this.inner=null,this.outer=null,this._init(e.toArray(h,n))}t.exports=o,o.prototype._init=function(t){t.length>this.blockSize&&(t=(new this.Hash).update(t).digest()),r(t.length<=this.blockSize);for(var i=t.length;i<this.blockSize;i++)t.push(0);for(i=0;i<t.length;i++)t[i]^=54;for(this.inner=(new this.Hash).update(t),i=0;i<t.length;i++)t[i]^=106;this.outer=(new this.Hash).update(t)},o.prototype.update=function(t,h){return this.inner.update(t,h),this},o.prototype.digest=function(t){return this.outer.update(this.inner.digest()),this.outer.digest(t)}},556:function(t,h,n){"use strict";var e=n(221),r=n(353),o=n(36);function c(t){if(!(this instanceof c))return new c(t);this.hash=t.hash,this.predResist=!!t.predResist,this.outLen=this.hash.outSize,this.minEntropy=t.minEntropy||this.hash.hmacStrength,this._reseed=null,this.reseedInterval=null,this.K=null,this.V=null;var h=r.toArray(t.entropy,t.entropyEnc||"hex"),n=r.toArray(t.nonce,t.nonceEnc||"hex"),e=r.toArray(t.pers,t.persEnc||"hex");o(h.length>=this.minEntropy/8,"Not enough entropy. Minimum is: "+this.minEntropy+" bits"),this._init(h,n,e)}t.exports=c,c.prototype._init=function(t,h,n){var e=t.concat(h).concat(n);this.K=new Array(this.outLen/8),this.V=new Array(this.outLen/8);for(var i=0;i<this.V.length;i++)this.K[i]=0,this.V[i]=1;this._update(e),this._reseed=1,this.reseedInterval=281474976710656},c.prototype._hmac=function(){return new e.hmac(this.hash,this.K)},c.prototype._update=function(t){var h=this._hmac().update(this.V).update([0]);t&&(h=h.update(t)),this.K=h.digest(),this.V=this._hmac().update(this.V).digest(),t&&(this.K=this._hmac().update(this.V).update([1]).update(t).digest(),this.V=this._hmac().update(this.V).digest())},c.prototype.reseed=function(t,h,n,e){"string"!=typeof h&&(e=n,n=h,h=null),t=r.toArray(t,h),n=r.toArray(n,e),o(t.length>=this.minEntropy/8,"Not enough entropy. Minimum is: "+this.minEntropy+" bits"),this._update(t.concat(n||[])),this._reseed=1},c.prototype.generate=function(t,h,n,e){if(this._reseed>this.reseedInterval)throw new Error("Reseed is required");"string"!=typeof h&&(e=n,n=h,h=null),n&&(n=r.toArray(n,e||"hex"),this._update(n));for(var o=[];o.length<t;)this.V=this._hmac().update(this.V).digest(),o=o.concat(this.V);var c=o.slice(0,t);return this._update(n),this._reseed++,r.encode(c,h)}}}]);