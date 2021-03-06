(function() {
	if ( typeof _ncf == "undefined") {
		return;
	}
	_ncf.c = {
		"eA" : "",
		"xB" : "ncf",
		"mC" : "http://log.zhongchou.cn/n.gif?act=pb&",
		"dD" : [],
		"ver" : "1.1"
	};
	var N = {
		"eu" : encodeURIComponent,
		"i" : parseInt,
		"d" : 24 * 3600 * 1000,
		"p" : "0001",
		"c" : "0000",
		"wlh" : window.location.href,
		"t" : function() {
			return new Date().getTime()
		},
		"m" : function() {
			return Math.round(Math.random() * 8999 + 1000)
		}
	}, eE = function(n) {
		var ar = document.cookie.match(new RegExp("(^| )" + n + "=([^;]*)(;|$)"));
		return ar ? unescape(ar[2]) : null;
	}, jF = function(n, v, et) {
		var e = new Date();
		e.setTime(e.getTime() + et);
		document.cookie = n + "=" + escape(v) + ";path=/;" + (et > 0 ? ("expires=" + e.toGMTString() + ";") : "");
	}, bG = function(o, e, f) {
		o.addEventListener ? o.addEventListener(e, f, false) : o.attachEvent('on' + e, function() {
			f.call(o)
		});
	}, fH = function(o) {
		var s = [];
		for (var k in o) {
			s.push(k + '=' + o[k]);
		}
		return s.join('&');
	}, gI = function(ua) {
		var s = {};
		var sa = {
			"ep" : ["qihu", "se 2.x", "msie", "firefox", "opera", "chrome", "safari"],
			"ie" : ["msie 9", "msie 8", "msie 7", "msie 6", "msie"],
			"os" : ["windows nt 5.1", "windows nt 5.2", "windows nt 6.0", "windows nt 6.1", "windows nt", "ipad", "iphone", "macintosh", "android", "linux"],
			"la" : ["zh-cn", "en-us", "zh-tw"],
			"b" : ["wow64"]
		};
		for (var k in sa) {
			s[k] = 0;
			var si = sa[k];
			for (var j = 0; j < si.length; j++) {
				if (ua.indexOf(si[j]) > -1) {
					s[k] = (j + 1).toString(16);
					break;
				}
			}
		}
		return fH(s);
	}, rJ = function() {
		return ('&sr=' + window.screen.width + 'x' + window.screen.height + '&sp=' + document.documentElement.clientWidth + 'x' + document.documentElement.clientHeight);
	};
	function dK(na) {
		var m = (N.i(na, 16) + 1).toString(16);
		if (m.indexOf(".") > 0) {
			m = m.split('.')[0];
		}
		while (m.length < 4) {
			m = "0" + m;
		}
		return m;
	}

	function xL(f) {
		var u1 = eE("_ncf1"), u2 = eE("_ncf2"), v1 = [], v2 = [];
		if (!u1) {
			v1 = [N.t(), N.m(), N.p, N.c, N.p, N.c, 0];
		} else {
			v1 = u1.split(".");
			var tM = N.i(N.t() / N.d) - N.i(v1[0] / N.d);
			var dN = tM - N.i(v1[6] || 0);
			if (dN >= 1) {
				v1[6] = tM;
				v1[4] = N.p;
				v1[5] = f == 1 ? N.c : N.p;
			} else {
				if (f == 1) {
					v1[4] = dK(v1[4]);
				} else {
					v1[5] = dK(v1[5]);
				}
			}
			if (f == 1) {
				v1[2] = dK(v1[2]);
			} else {
				v1[3] = dK(v1[3]);
			}
		}
		if (!u2) {
			v2 = [N.t(), N.m(), N.p, N.c];
		} else {
			v2 = u2.split(".");
			if (f == 1) {
				v2[2] = dK(v2[2]);
			} else {
				v2[3] = dK(v2[3]);
			}
		}
		u1 = v1.join(".");
		u2 = v2.join(".");
		jF("_ncf1", u1, 30 * N.d);
		jF("_ncf2", u2, 0);
		return ("&uv=" + u1 + "&cuv=" + u2);
	}

	function vP() {
		try {
			var hQ = _ncf.channel, cn = '', cv = '', r = '', cr = {};
			for (var i = 0; i < hQ.length; i++) {
				cn = hQ[i];
				if (!/^[0-9a-z]+$/i.test(cn)) {
					continue;
				}
				if (N.wlh.indexOf(cn) > -1) {
					r = new RegExp("^.*" + cn + "=([_0-9a-z]+).*$", "i");
					cv = N.wlh.replace(r, "$1");
					if (cv) {
						jF(cn, cv, 0);
					}
				}
				_ncf.pck[cn] = cn;
			}
		} catch(e) {
		}
	}

	function lR() {
		vP();
		var uS = {
			"prd" : _ncf.prd,
			"ver" : _ncf.c.ver
		}, uT = _ncf.pck;
		for (var k in uT) {
			uS[uT[k]] = N.eu(eE(k) || '');
		}
		uS['rf'] = document.referrer ? N.eu(document.referrer) : "";
		try {
			uS['pt'] = N.eu(document.getElementsByTagName("title")[0].innerHTML);
		} catch(e) {
		}
		uS['pu'] = N.eu(N.wlh);
		var ua = navigator.userAgent.toLowerCase();
		_ncf.c.eA += '&' + fH(uS) + '&' + gI(ua);
	}

	function fU(sr) {
		var re = ['', '', '', ''];
		try {
			re[1] = sr.getAttribute('pburl') || sr.getAttribute('href');
			re[2] = sr.getAttribute('pbtitle') || sr.innerHTML;
			var tV = ['', '', '', '', 0];
			var cW = ['pbid', 'id', 'pbtag', 'class'];
			var aX = function(a, b) {
				a[0] = [b[1], b[3], b[0]].join('.');
				a[3] = b[2];
				return a;
			};
			var pn = sr;
			var j = 0;
			while (pn) {
				var i = j == 0 ? 2 : 0;
				for (i; i < 4; i++) {
					var mn = pn.getAttribute(cW[i]);
					if (mn && !tV[i]) {
						tV[i] = mn;
						tV[4]++;
						if (tV[4] == 4)
							return aX(re, tV);
					}
				}
				pn = pn.parentNode;
				j++;
			}
		} catch(e) {
		}
		return aX(re, tV);
	}

	function vY(e) {
		var cx = e.clientX, cy = e.clientY, cw = document.body.clientWidth, st = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
		return [N.i(cx - cw / 2), cy + st].join(".");
	}

	function mZ(e) {
		e = e || window.event;
		var sr = e.target || e.srcElement;
		var bBA = sr.tagName;
		if (bBA && bBA.toUpperCase() != 'A') {
			sr = sr.parentNode;
			if (sr) {
				bBA = sr.tagName;
			}
		}
		if (bBA && bBA.toUpperCase() == 'A') {
			_ncf.pingback(2, [e, sr]);
		}
	}
	_ncf.pingback = function(pt, v) {
		var t = N.t();
		var eBB = [_ncf.c.eA, xL(pt) + rJ(), '', '', ''];
		if (pt == 1 && typeof lst != "undefined" && lst.t0) {
			eBB[0] += '&co=' + (t - lst.t0);
		}
		if (pt == 2) {
			var po = vY(v[0]);
			var re = fU(v[1]);
			eBB[2] = ['&md=' + N.eu(re[0]), '&url=' + N.eu(re[1]), '&un=' + N.eu(re[2]), '&tag=' + N.eu(re[3]), '&pos=' + po].join('');
		} else if (pt != 1) {
			eBB[2] = v;
		}
		_ncf.pstr = "";
		_ncf.pfunc && _ncf.pfunc(pt);
		eBB[3] = _ncf.pstr;
		eBB[4] = _ncf.pcon;
		var i = _ncf.c.dD.length;
		_ncf.c.dD[i] = new Image();
		_ncf.c.dD[i].src = _ncf.c.mC + 'pid=' + _ncf.c.xB + '&t=' + t + '&tp=' + (pt == 1 ? 'pv' : 'ct') + eBB.join('') + '&-';
	};
	try {
		lR();
		_ncf.pingback(1);
		bG(document, "mousedown", mZ);
	} catch(e) {
	}
})(); 