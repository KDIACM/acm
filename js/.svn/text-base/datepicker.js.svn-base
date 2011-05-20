/*
        DatePicker v3.5 by frequency-decoder.com

        Released under a creative commons Attribution-ShareAlike 2.5 license (http://creativecommons.org/licenses/by-sa/2.5/)

        Please credit frequency-decoder in any derivative work - thanks.
        
        You are free:

        * to copy, distribute, display, and perform the work
        * to make derivative works
        * to make commercial use of the work

        Under the following conditions:

                by Attribution.
                --------------
                You must attribute the work in the manner specified by the author or licensor.

                sa
                --
                Share Alike. If you alter, transform, or build upon this work, you may distribute the resulting work only under a license identical to this one.

        * For any reuse or distribution, you must make clear to others the license terms of this work.
        * Any of these conditions can be waived if you get permission from the copyright holder.
*/
var datePickerController;

(function() {

datePicker.isSupported = typeof document.createElement != "undefined" && typeof document.documentElement != "undefined" && typeof document.documentElement.offsetWidth == "number";

// Detect the users language
datePicker.languageinfo = navigator.language ? navigator.language : navigator.userLanguage;
datePicker.languageinfo = datePicker.languageinfo ? datePicker.languageinfo.toLowerCase().replace(/-[a-z]+$/, "") : 'en';

if(datePicker.languageinfo != 'en') {
        // Load the appropriate language file
        var scriptFiles = document.getElementsByTagName('head')[0].getElementsByTagName('script');
        var loc         = "";

        for(var i = 0, scriptFile; scriptFile = scriptFiles[i]; i++) {
                if(scriptFile.src && scriptFile.src.match(/datepicker/)) {
                        loc = scriptFile.src.replace("datepicker", "lang/" + datePicker.languageinfo);
                        break;
                };
        };

        if(loc != "") {
                datePicker.script      = document.createElement('script');
                datePicker.script.type = "text/javascript";
                datePicker.script.src  = loc;
                datePicker.script.setAttribute("charset", "utf-8");
                document.getElementsByTagName('head')[0].appendChild(datePicker.script);
        };
};

// Defaults for the language should the locale file not load
datePicker.months       = ["January","February","March","April","May","June","July","August","September","October","November","December"];
datePicker.fullDay      = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
datePicker.titles       = ["Previous month","Next month","Previous year","Next year"];
datePicker.daysPerMonth = [31,28,31,30,31,30,31,31,30,31,30,31];

datePicker.getDaysPerMonth = function (nMonth, nYear) {
        nMonth = (nMonth + 12) % 12;
        var res = datePicker.daysPerMonth[nMonth];
        if(((0 == (nYear%4)) && ((0 != (nYear%100)) || (0 == (nYear%400)))) && nMonth == 1) {
                res = 29;
        };
        return res;
};

function datePicker(options) {

        this.defaults = {};
        
        for(opt in options) {
                this[opt] = this.defaults[opt] = options[opt];
        };
        
        this.date              = new Date();
        this.yearinc           = 1;
        this.timer             = null;
        this.pause             = 1000;
        this.timerSet          = false;
        this.opacity           = 0;
        this.opacityTo         = 0;
        this.fadeTimer         = null;
        this.interval          = new Date();
        this.firstDayOfWeek    = this.defaults.firstDayOfWeek = 0;
        this.dateSet           = null;
        this.visible           = false;
        this.disabledDates     = [];
        this.enabledDates      = [];
        this.div;
        this.table;

        var o = this;

        o.events = {

                onkeydown: function (e) {
                        o.stopTimer();

                        if(!o.visible) return false;

                        if (e == null) e = document.parentWindow.event;
                        var kc = e.keyCode ? e.keyCode : e.charCode;

                        if ( kc == 13 ) {
                                // close with update
                                o.returnFormattedDate();
                                o.hide();
                                return o.killEvent(e);
                        } else if ( kc == 27 ) {
                                // close
                                o.hide();
                                return o.killEvent(e);
                        } else if ( kc == 32 || kc == 0 ) {
                                // close
                                o.date =  new Date( );
                                o.updateTable();
                                return o.killEvent(e);
                        };

                        // Internet Explorer fires the keydown event faster than the JavaScript engine can
                        // update the interface. The following attempts to fix this.

                        /*@cc_on@*/
                        /*@if(@_win32)
                                if(new Date().getTime() - o.interval.getTime() < 100) return o.killEvent(e);
                                o.interval = new Date();
                        /*@end@*/

                        if ((kc > 49 && kc < 56) || (kc > 97 && kc < 104)) {
                                if (kc > 96) kc -= (96-48);
                                kc -= 49;
                                o.firstDayOfWeek = (o.firstDayOfWeek + kc) % 7;
                                o.updateTable();
                                return o.killEvent(e);
                        };

                        if ( kc < 37 || kc > 40 ) return true;

                        var d = new Date( o.date ).valueOf();

                        if ( kc == 37 ) {
                                // ctrl + left = previous month
                                if( e.ctrlKey ) {
                                        d = new Date( o.date );
                                        d.setDate( Math.min(d.getDate(), datePicker.getDaysPerMonth(d.getMonth() - 1,d.getFullYear())) ); // no need to catch dec -> jan for the year
                                        d.setMonth( d.getMonth() - 1 );
                                } else {
                                        d -= 24 * 60 * 60 * 1000;
                                        //d = new Date( o.date.getFullYear(), o.date.getMonth(), o.date.getDate() - 1 );
                                };
                        } else if ( kc == 39 ) {
                                // ctrl + right = next month
                                if( e.ctrlKey ) {
                                        d = new Date( o.date );
                                        d.setDate( Math.min(d.getDate(), datePicker.getDaysPerMonth(d.getMonth() + 1,d.getFullYear())) ); // no need to catch dec -> jan for the year
                                        d.setMonth( d.getMonth() + 1 );
                                } else {
                                        d += 24 * 60 * 60 * 1000;
                                        //d = new Date( o.date.getFullYear(), o.date.getMonth(), o.date.getDate() + 1 );
                                };
                        } else if ( kc == 38 ) {
                                // ctrl + up = next year
                                if( e.ctrlKey ) {
                                        d = new Date( o.date );
                                        d.setDate( Math.min(d.getDate(), datePicker.getDaysPerMonth(d.getMonth(),d.getFullYear() + 1)) ); // no need to catch dec -> jan for the year
                                        d.setFullYear( d.getFullYear() + 1 );
                                } else {
                                        d -= 7 * 24 * 60 * 60 * 1000;
                                        //d = new Date( o.date.getFullYear(), o.date.getMonth(), o.date.getDate() - 7 );
                                };
                        } else if ( kc == 40 ) {
                                // ctrl + down = prev year
                                if( e.ctrlKey ) {
                                        d = new Date( o.date );
                                        d.setDate( Math.min(d.getDate(), datePicker.getDaysPerMonth(d.getMonth(),d.getFullYear() - 1)) ); // no need to catch dec -> jan for the year
                                        d.setFullYear( d.getFullYear() - 1 );
                                } else {
                                        d += 7 * 24 * 60 * 60 * 1000;
                                        //d = new Date( o.date.getFullYear(), o.date.getMonth(), o.date.getDate() + 7 );
                                };
                        };

                        var tmpDate = new Date( d );
                        if(!o.outOfRange(tmpDate)) { o.date = tmpDate; };

                        o.updateTable();

                        return o.killEvent(e);
                },
                onmousedown: function(e) {
                        if ( e == null ) e = document.parentWindow.event;
                        var el = e.target != null ? e.target : e.srcElement;
                        o.stopTimer();
                        var found = false;
                        
                        while(el.parentNode) {
                                if(el.id && (el.id == "fd-"+o.id || el.id == "fd-but-"+o.id)) {
                                        found = true;
                                        break;
                                }
                                try {
                                        el = el.parentNode;
                                } catch(err) {
                                        break;
                                }
                        }

                        if(found) return true;

                        datePickerController.hideAll();
                },
                onmouseover: function(e) {
                        o.stopTimer();

                        if(document.getElementById("date-picker-hover")) {
                                document.getElementById("date-picker-hover").id = "";
                        };

                        this.id = "date-picker-hover";

                        o.date.setDate(this.firstChild.nodeValue);
                },
                onclick: function (e) {
                        if(o.opacity != o.opacityTo) return false;
                        if ( e == null ) e = document.parentWindow.event;
                        var el = e.target != null ? e.target : e.srcElement;
                        while ( el.nodeType != 1 ) el = el.parentNode;

                        var d = new Date( o.date );
                        var n = Number( el.firstChild.data );

                        if(isNaN(n)) { return true; };

                        d.setDate( n );
                        o.date = d;

                        o.returnFormattedDate();
                        o.hide();
                        o.stopTimer();
                        return o.killEvent(e);
                },
                incDec:function(e) {
                        if ( e == null ) e = document.parentWindow.event;
                        var el = e.target != null ? e.target : e.srcElement;
                        o.stopTimer();
                        
                        if(el && el.className && el.className.search('disabled') != -1) { return false; }

                        datePickerController.addEvent(document, "mouseup", o.events.clearTimer);

                        o.timerInc      = 1000;
                        o.dayInc        = arguments[1];
                        o.yearInc       = arguments[2];
                        o.monthInc      = arguments[3];
                        o.onTimer();
                        o.startTimer();
                        return o.killEvent(e);
                },
                clearTimer:function(e) {
                        o.stopTimer();
                        o.stopped       = true;
                        o.timerInc      = 1000;
                        o.yearInc       = 0;
                        o.monthInc      = 0;
                        o.dayInc        = 0;
                }
        };
        o.reset = function() {
                for(def in o.defaults) {
                        o[def] = o.defaults[def];
                };
        };
        o.setOpacity = function(op) {
                o.div.style.opacity =  + op/100;
                o.div.style.filter = 'alpha(opacity=' + op + ')';
                o.opacity = op;
        };
        o.fade = function() {
                window.clearTimeout(o.fadeTimer);
                var diff = Math.round(o.opacity + ((o.opacityTo - o.opacity) / 4));

                o.setOpacity(diff);

                if(Math.abs(o.opacityTo - diff) > 3 && !o.noFade) {
                        o.fadeTimer = window.setTimeout(function () { o.fade(); }, 50);
                } else {
                        o.setOpacity(o.opacityTo);
                        if(o.opacityTo == 0) {
                                o.div.style.display = "none";
                                o.visible = false;
                        } else {
                                o.visible = true;
                        }
                        window.clearTimeout(o.fadeTimer);
                        o.fadeTimer = null;
                };
        };
        o.killEvent = function(e) {
                if (e == null) e = document.parentWindow.event;
                
                if (e.stopPropagation) {
                        e.stopPropagation();
                        e.preventDefault();
                }
                /*@cc_on@*/
                /*@if(@_win32)
                e.cancelBubble = true;
                e.returnValue = false;
                /*@end@*/
                return false;
        };
        o.startTimer = function () {
                o.timer = window.setTimeout(o.onTimer, o.timerInc);
                o.timerSet = true;
        };
        o.stopTimer = function () {
                window.clearTimeout(o.timer);
                o.timer = null;
                o.timerSet = false;
        };
        o.onTimer = function() {
                var d = o.date;
                d.setDate( Math.min(d.getDate()+o.dayInc, datePicker.getDaysPerMonth(d.getMonth()+o.monthInc,d.getFullYear()+o.yearInc)) ); // no need to catch dec -> jan for the year
                d.setMonth( d.getMonth() + o.monthInc );
                d.setFullYear( d.getFullYear() + o.yearInc );
                o.date = d;
                if(o.timerInc > 50) { o.timerInc = 50 + Math.round(((o.timerInc - 50) / 1.8)); };
                o.updateTable();
                if(o.timerSet) o.timer = window.setTimeout(o.onTimer, o.timerInc);
        };
        o.getElem = function() {
                return document.getElementById(o.id.replace(/^fd-/, '')) || false;
        };
        o.setRangeLow = function(range) {
                if(String(range).search(/^(\d\d?\d\d)(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])$/) == -1) range = '';
                o.low = o.defaults.low = range;
        };
        o.setRangeHigh = function(range) {
                if(String(range).search(/^(\d\d?\d\d)(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])$/) == -1) range = '';
                o.high = o.defaults.high = range;
        };
        o.setDisabledDays = function(dayArray) {
                o.disableDays = o.defaults.disableDays = dayArray;
        };
        o.setDisabledDates = function(dateArray) {
                var fin = [];
                for(var i = dateArray.length; i-- ;) {
                        if(dateArray[i].match(/^(\d\d\d\d|\*\*\*\*)(0[1-9]|1[012]|\*\*)(0[1-9]|[12][0-9]|3[01])$/) != -1) fin[fin.length] = dateArray[i];
                }
                if(fin.length) {
                        o.disabledDates = fin;
                        o.enabledDates = [];
                };
        };
        o.setEnabledDates = function(dateArray) {
                var fin = [];
                for(var i = dateArray.length; i-- ;) {
                        if(dateArray[i].match(/^(\d\d\d\d|\*\*\*\*)(0[1-9]|1[012]|\*\*)(0[1-9]|[12][0-9]|3[01]|\*\*)$/) != -1 && dateArray[i] != "********") fin[fin.length] = dateArray[i];
                };
                if(fin.length) {
                        o.disabledDates = [];
                        o.enabledDates = fin;
                };
        };
        o.getDisabledDates = function(y, m) {
                if(o.enabledDates.length) return o.getEnabledDates(y, m);
                var obj = {};
                var d = datePicker.getDaysPerMonth(m - 1, y);
                m = m < 10 ? "0" + String(m) : m;
                for(var i = o.disabledDates.length; i-- ;) {
                        var tmp = o.disabledDates[i].replace("****", y).replace("**", m);
                        if(tmp < Number(String(y)+m+"01") || tmp > Number(y+String(m)+d)) continue;
                        obj[tmp] = 1;
                }
                return obj;
        };
        o.getEnabledDates = function(y, m) {
                var obj = {};
                var d = datePicker.getDaysPerMonth(m - 1, y);
                m = m < 10 ? "0" + String(m) : m;
                var day,tmp,de,me,ye,disabled;
                for(var dd = 1; dd <= d; dd++) {
                        day = dd < 10 ? "0" + String(dd) : dd;
                        disabled = true;
                        for(var i = o.enabledDates.length; i-- ;) {
                                tmp = o.enabledDates[i];
                                ye  = String(o.enabledDates[i]).substr(0,4);
                                me  = String(o.enabledDates[i]).substr(4,2);
                                de  = String(o.enabledDates[i]).substr(6,2);

                                if(ye == y && me == m && de == day) {
                                        disabled = false;
                                        break;
                                }
                                
                                if(ye == "****" || me == "**" || de == "**") {
                                        if(ye == "****") tmp = tmp.replace(/^\*\*\*\*/, y);
                                        if(me == "**")   tmp = tmp = tmp.substr(0,4) + String(m) + tmp.substr(6,2);
                                        if(de == "**")   tmp = tmp.replace(/\*\*/, day);

                                        if(tmp == String(y + String(m) + day)) {
                                                disabled = false;
                                                break;
                                        };
                                };
                        };
                        if(disabled) obj[String(y + String(m) + day)] = 1;
                };
                return obj;
        };
        o.setFirstDayOfWeek = function(e) {
                if ( e == null ) e = document.parentWindow.event;
                var elem = e.target != null ? e.target : e.srcElement;

                if(elem.tagName.toLowerCase() != "th") {
                        while(elem.tagName.toLowerCase() != "th") elem = elem.parentNode;
                }
                var cnt = 0;
                while(elem.previousSibling) {
                        elem = elem.previousSibling;
                        if(elem.tagName.toLowerCase() == "th") cnt++;
                }

                o.firstDayOfWeek = (o.firstDayOfWeek + cnt) % 7;
                o.updateTable();
                return o.killEvent(e);
        };
        o.truePosition = function(element) {
                var pos = o.cumulativeOffset(element);
                if(window.opera) { return pos; }
                var iebody   = (document.compatMode && document.compatMode != "BackCompat")? document.documentElement : document.body;
                var dsocleft = document.all ? iebody.scrollLeft : window.pageXOffset;
                var dsoctop  = document.all ? iebody.scrollTop  : window.pageYOffset;
                var posReal  = o.realOffset(element);
                
                var top =  pos[1] - posReal[1] + dsoctop;
                var left = pos[0] - posReal[0] + dsocleft;

                return [left, top];
        };
        o.realOffset = function(element) {
                var t = 0, l = 0;
                do {
                        t += element.scrollTop  || 0;
                        l += element.scrollLeft || 0;
                        element = element.parentNode;
                } while (element);
                return [l, t];
        };
        o.cumulativeOffset = function(element) {
                var t = 0, l = 0;
                do {
                        t += element.offsetTop  || 0;
                        l += element.offsetLeft || 0;
                        element = element.offsetParent;
                } while (element);
                return [l, t];
        };
        o.resize = function() {
                if(!o.created || !o.getElem()) return;
                
                o.div.style.visibility = "hidden";
                o.div.style.left = o.div.style.top = "0px";
                o.div.style.display = "block";
                
                var osh = o.div.offsetHeight;
                var osw = o.div.offsetWidth;
                
                o.div.style.visibility = "visible";
                o.div.style.display = "none";
                
                var elem          = document.getElementById('fd-but-' + o.id);
                var pos           = o.truePosition(elem);
                var trueBody      = (document.compatMode && document.compatMode!="BackCompat") ? document.documentElement : document.body;

                if ( parseInt(trueBody.clientWidth+trueBody.scrollLeft) < parseInt(osw+pos[0])) {
                        o.div.style.left = Math.abs(parseInt((trueBody.clientWidth+trueBody.scrollLeft) - osw)) + "px";
                } else {
                        o.div.style.left  = pos[0] + "px";
                };

                if ( parseInt(trueBody.clientHeight+trueBody.scrollTop) < parseInt(osh+pos[1]+elem.offsetHeight+2)) {
                        o.div.style.top   = Math.abs(parseInt(pos[1] - (osh + 2))) + "px";
                } else {
                        o.div.style.top   = Math.abs(parseInt(pos[1] + elem.offsetHeight + 2)) + "px";
                };

                if(o.iePopUp) {
                        o.iePopUp.style.top    = o.div.style.top;
                        o.iePopUp.style.left   = o.div.style.left;
                        o.iePopUp.style.width  = osw + "px";
                        o.iePopUp.style.height = (osh - 2) + "px";
                };
        };
        o.equaliseDates = function() {
                var clearDayFound = false;
                var tmpDate;
                for(var i = o.low; i <= o.high; i++) {
                        tmpDate = String(i);
                        if(!o.disableDays[new Date(tmpDate.substr(0,4), tmpDate.substr(6,2), tmpDate.substr(4,2)).getDay() - 1]) {
                                clearDayFound = true;
                                break;
                        };
                };
                if(!clearDayFound) o.disableDays = o.defaults.disableDays = [0,0,0,0,0,0,0];
        };
        o.outOfRange = function(tmpDate) {
                if(!o.low && !o.high) return false;

                var level = false;
                if(!tmpDate) {
                        level = true;
                        tmpDate = o.date;
                };
                
                var d           = (tmpDate.getDate() < 10) ? "0" + tmpDate.getDate() : tmpDate.getDate();
                var m           = ((tmpDate.getMonth() + 1) < 10) ? "0" + (tmpDate.getMonth() + 1) : tmpDate.getMonth() + 1;
                var y           = tmpDate.getFullYear();
                var dt          = String(y)+String(m)+String(d);

                if(o.low) {
                        if(parseInt(dt) < parseInt(o.low)) {
                                if(!level) return true;
                                o.date = new Date(o.low.substr(0,4), o.low.substr(4,2)-1, o.low.substr(6,2), 5, 0, 0);
                                return false;
                        };
                };
                if(o.high) {
                        if(parseInt(dt) > parseInt(o.high)) {
                                if(!level) return true;
                                o.date = new Date( o.high.substr(0,4), o.high.substr(4,2)-1, o.high.substr(6,2), 5, 0, 0);
                        };
                };
                return false;
        };
        o.create = function() {
                /*@cc_on@*/
                /*@if(@_jscript_version <= 5.6)
                        if(!document.getElementById("iePopUpHack")) {
                                var loc = "./blank.html";
                                var scriptFiles = document.getElementsByTagName('head')[0].getElementsByTagName('script');
                                for(var i = 0, scriptFile; scriptFile = scriptFiles[i]; i++) {
                                        if(scriptFile.src && scriptFile.src.match(/datepicker.js$/)) {
                                                loc = scriptFile.src.replace("datepicker.js", "blank.html");
                                                break;
                                        };
                                };

                                o.iePopUp = document.createElement('iframe');
                                o.iePopUp.src = loc;
                                o.iePopUp.setAttribute('className','iehack');
                                o.iePopUp.scrolling="no";
                                o.iePopUp.frameBorder="0";
                                o.iePopUp.name = o.iePopUp.id = "iePopUpHack";
                                document.body.appendChild(o.iePopUp);

                        } else {
                                o.iePopUp = document.getElementById("iePopUpHack");
                        };
                /*@end@*/
                
                if(typeof(fdLocale) == "object" && o.locale) {
                        datePicker.titles  = fdLocale.titles;
                        datePicker.months  = fdLocale.months;
                        datePicker.fullDay = fdLocale.fullDay;
                        // Optional parameters
                        if(fdLocale.dayAbbr) datePicker.dayAbbr = fdLocale.dayAbbr;
                        if(fdLocale.firstDayOfWeek) o.firstDayOfWeek = o.defaults.firstDayOfWeek = fdLocale.firstDayOfWeek;
                };
                
                o.div = document.createElement('div');
                o.div.style.zIndex = 9999;
                o.div.id = "fd-"+o.id;
                o.div.className = "datePicker";
                
                document.getElementsByTagName('body')[0].appendChild( o.div );
                
                var tableBody = document.createElement('tbody');
                var tableHead = document.createElement('thead');
                var nbsp = String.fromCharCode( 160 );
                
                o.table = document.createElement('table');
                var tr  = document.createElement('tr');
                var th  = document.createElement('th');

                o.div.appendChild( o.table );
                o.table.appendChild( tableHead );
                tableHead.appendChild(tr);
                tr.appendChild( th );

                // previous year
                var tmpelem = document.createElement('button');
                tmpelem.setAttribute("type", "button");
                tmpelem.className = "prev-but but-spacer";
                tmpelem.id = o.id + "-prev-year-but";
                tmpelem.appendChild(document.createTextNode('\u00AB'));
                tmpelem.title = datePicker.titles[2];
                tmpelem.onmousedown = function(e) { o.events.incDec(e,0,-1,0); };

                th.appendChild( tmpelem );
                
                tmpelem = null;
                
                // previous month
                var tmpelem = document.createElement('button');
                tmpelem.setAttribute("type", "button");
                tmpelem.className = "prev-but";
                tmpelem.id = o.id + "-prev-month-but";
                tmpelem.appendChild(document.createTextNode("\u2039"));
                tmpelem.title = datePicker.titles[0];
                tmpelem.onmousedown = function(e) { o.events.incDec(e,0,0,-1); };
                th.appendChild( tmpelem );
                tmpelem = null;
                
                // title bar
                o.titleBar = document.createElement('th');

                /*@cc_on
                /*@if (@_win32)
                o.titleBar.setAttribute('colSpan','5');
                @else @*/
                o.titleBar.setAttribute('colspan','5');
                /*@end
                @*/

                o.titleBar.setAttribute('text-align','center');
                tr.appendChild( o.titleBar );

                th = document.createElement('th');
                tr.appendChild( th );
                
                // next month
                var tmpelem = document.createElement('button');
                tmpelem.setAttribute("type", "button");
                tmpelem.className = "next-but but-spacer";
                tmpelem.id = o.id + "-next-month-but";
                tmpelem.appendChild(document.createTextNode('\u203A'));
                tmpelem.title = datePicker.titles[1];
                tmpelem.onmousedown = function(e) { o.events.incDec(e,0,0,1); };
                th.appendChild( tmpelem );
                tmpelem = null;
                
                // next year
                var tmpelem = document.createElement('button');
                tmpelem.setAttribute("type", "button");
                tmpelem.className = "next-but";
                tmpelem.id = o.id + "-next-year-but";
                tmpelem.appendChild(document.createTextNode('\u00BB'));
                tmpelem.title = datePicker.titles[3];
                tmpelem.onmousedown = function(e) { o.events.incDec(e,0,1,0); };
                th.appendChild( tmpelem );
                tmpelem = null;

                o.table.appendChild( tableBody );
                
                var row, col;
                
                for(var rows = 0; rows < 7; rows++) {
                        row = document.createElement('tr');

                        if(rows != 0) tableBody.appendChild(row);
                        else          tableHead.appendChild(row);
                        
                        for(var cols = 0; cols < 7; cols++) {
                                col = (rows == 0) ? document.createElement('th') : document.createElement('td');
                                row.appendChild(col);
                                if(rows != 0) {
                                        col.appendChild(document.createTextNode(nbsp));
                                } else {
                                        col.className = "date-picker-day-header";
                                        col.scope = "col";
                                };
                                col = null;
                        }
                        
                        row = null;
                };

                tableBody = tableHead = tr = th = null;
                o.created = true;
        };
        o.setDateFromInput = function() {
                function m2c(val) {
                        return String(val).length < 2 ? "00".substring(0, 2 - String(val).length) + String(val) : val;
                }

                o.dateSet = null;
                
                var elem = o.getElem();
                if(!elem) return;

                if(!o.splitDate) {
                        var date = datePickerController.dateFormat(elem.value, o.format.search(/m-d-y/i) != -1);
                } else {
                        var tm = document.getElementById(o.id+'-mm') ? parseInt(document.getElementById(o.id+'-mm').value) || new Date().getMonth() + 1 : new Date().getMonth() + 1;
                        var td = document.getElementById(o.id+'-dd') ? parseInt(document.getElementById(o.id+'-dd').value) || new Date().getDate() : new Date().getDate();
                        var date = datePickerController.dateFormat(tm + "/" + td + "/" + (elem.value || new Date().getFullYear()), true);
                }

                if(!date) { date = String(new Date().getFullYear()) + m2c(new Date().getMonth() + 1) + m2c(new Date().getDate()); }
                
                var d,m,y;
                 
                y = date.substr(0, 4);
                m = date.substr(4, 2);
                d = date.substr(6, 2);
                
                if(!y || !m || !d || new Date( y, m - 1, d ) == 'Invalid Date' || new Date( y, m - 1, d ) == 'NaN') {
                        o.date = new Date();
                        o.date.setHours(5);
                        return;
                };

                o.date.setMonth(m-1);
                o.date.setFullYear(y);
                o.date.setDate(d);
                o.date.setHours(5);
                o.dateSet = new Date(o.date);
        };
        o.returnFormattedDate = function() {
                var elem = o.getElem();
                if(!elem) return;
                
                var d                   = (o.date.getDate() < 10) ? "0" + o.date.getDate() : o.date.getDate();
                var m                   = ((o.date.getMonth() + 1) < 10) ? "0" + (o.date.getMonth() + 1) : o.date.getMonth() + 1;
                var yyyy                = o.date.getFullYear();
                var disabledDates       = o.getDisabledDates(yyyy, m);
                var weekDay             = ( o.date.getDay() + 6 ) % 7;

                if(!(o.disableDays[weekDay] || String(yyyy)+m+d in disabledDates)) {
                        if(o.splitDate) {
                                document.getElementById(o.id+"-dd").value = d;
                                document.getElementById(o.id+"-mm").value = m;
                                elem.value = yyyy;
                                
                                document.getElementById(o.id+"-dd").focus();
                                if(document.getElementById(o.id+"-dd").onchange) document.getElementById(o.id+"-dd").onchange();
                                if(document.getElementById(o.id+"-mm").onchange) document.getElementById(o.id+"-mm").onchange();
                        } else {
                                elem.value = o.format.replace('y',yyyy).replace('m',m).replace('d',d).replace(/-/g,o.divider);
                                elem.focus();
                        };
                        if(elem.onchange) elem.onchange();
                };
        };
        // Credit where credit's due:
        
        // Most of the logic for this method from the webfx date-picker
        // http://webfx.eae.net/
        
        o.updateTable = function() {

                if(document.getElementById("date-picker-hover")) {
                        document.getElementById("date-picker-hover").id = "";
                };

                var i;
                var str = "";
                var rows = 6;
                var cols = 7;
                var currentWeek = 0;
                var nbsp = String.fromCharCode( 160 );

                var cells = new Array( rows );

                for ( i = 0; i < rows; i++ ) {
                        cells[i] = new Array( cols );
                };
                
                o.outOfRange();

                // Set the tmpDate to the second day of this month (to avoid daylight savings time madness on Windows)
                var tmpDate = new Date( o.date.getFullYear(), o.date.getMonth(), 2 );
                tmpDate.setHours(5);
                
                // Do the disableDates for this year and month
                var m           = ((tmpDate.getMonth() + 1) < 10) ? "0" + (tmpDate.getMonth() + 1) : tmpDate.getMonth() + 1;
                var y           = tmpDate.getFullYear();

                var disabledDates = o.getDisabledDates(o.date.getFullYear(), o.date.getMonth() + 1);
                
                var today = new Date();

                // Title Bar
                var titleText = datePicker.months[o.date.getMonth()] + nbsp + o.date.getFullYear();
                while(o.titleBar.firstChild) o.titleBar.removeChild(o.titleBar.firstChild);
                o.titleBar.appendChild(document.createTextNode(titleText));


                // Previous buttons out of range
                document.getElementById(o.id + "-prev-year-but").className = document.getElementById(o.id + "-prev-year-but").className.replace("disabled", "");
                if(o.outOfRange(new Date((y - 1), Number(m)-1, datePicker.getDaysPerMonth(Number(m)-1, y-1)))) {
                        document.getElementById(o.id + "-prev-year-but").className += " disabled";
                        o.yearInc = 0;
                }

                document.getElementById(o.id + "-prev-month-but").className = document.getElementById(o.id + "-prev-month-but").className.replace("disabled", "");
                if(o.outOfRange(new Date(y, (Number(m) - 2), datePicker.getDaysPerMonth(Number(m)-2, y)))) {
                        document.getElementById(o.id + "-prev-month-but").className += " disabled";
                        o.monthInc = 0;
                }
                
                // Next buttons out of range
                document.getElementById(o.id + "-next-year-but").className = document.getElementById(o.id + "-next-year-but").className.replace("disabled", "");
                if(o.outOfRange(new Date((y + 1), Number(m) - 1, 1))) {
                        document.getElementById(o.id + "-next-year-but").className += " disabled";
                        o.yearInc = 0;
                }

                document.getElementById(o.id + "-next-month-but").className = document.getElementById(o.id + "-next-month-but").className.replace("disabled", "");
                if(o.outOfRange(new Date(y, Number(m), 1))) {
                        document.getElementById(o.id + "-next-month-but").className += " disabled";
                        o.monthInc = 0;
                }
                
                for ( i = 1; i < 32; i++ ) {
                        tmpDate.setDate( i );

                        var weekDay  = ( tmpDate.getDay() + 6 ) % 7;
                        var colIndex = ( (weekDay - o.firstDayOfWeek) + 7 ) % 7;
                        var cell     = { text:"", className:"", id:"" };
                        var d        = (tmpDate.getDate() < 10) ? "0" + tmpDate.getDate() : tmpDate.getDate();
                        var dt       = String(y)+m+d;

                        if ( tmpDate.getMonth() == o.date.getMonth() ) {
                        
                                cells[currentWeek][colIndex] = { text:"", className:"", id:"" };

                                var isToday = tmpDate.getDate() == today.getDate() &&
                                              tmpDate.getMonth() == today.getMonth() &&
                                              tmpDate.getFullYear() == today.getFullYear();

                                if ( o.dateSet != null && o.dateSet.getDate() == tmpDate.getDate() && o.dateSet.getMonth() == tmpDate.getMonth() && o.dateSet.getFullYear() == tmpDate.getFullYear()) {
                                        cells[currentWeek][colIndex].className = "date-picker-selected-date";
                                };
                                if ( o.date.getDate() == tmpDate.getDate() && o.date.getFullYear() == tmpDate.getFullYear()) {
                                        cells[currentWeek][colIndex].id = "date-picker-hover";
                                };

                                if(o.highlightDays[weekDay]) {
                                        cells[currentWeek][colIndex].className += " date-picker-highlight";
                                };
                                if ( isToday ) {
                                        cells[currentWeek][colIndex].className = "date-picker-today";
                                };
                                if(o.outOfRange(tmpDate)) {
                                        cells[currentWeek][colIndex].className = "out-of-range";
                                } else if(o.disableDays[weekDay] || dt in disabledDates) {
                                        cells[currentWeek][colIndex].className = "day-disabled";
                                };
                                cells[currentWeek][colIndex].text = tmpDate.getDate();
                                
                                cells[currentWeek][colIndex].className += " dm-" + tmpDate.getDate() + '-' + tmpDate.getMonth() + " " + " dmy-" + tmpDate.getDate() + '-' + tmpDate.getMonth() + '-' + tmpDate.getFullYear();
                                if ( colIndex == 6 ) currentWeek++;
                        };
                };

                // Table headers
                var lnk, d, butt;
                var ths = o.table.getElementsByTagName('thead')[0].getElementsByTagName('tr')[1].getElementsByTagName('th');
                for ( var y = 0; y < 7; y++ ) {
                        d = (o.firstDayOfWeek + y) % 7;

                        butt = ths[y].getElementsByTagName("button");
                        if(butt.length && butt.length > 0) {
                                butt[0].onclick = butt.onkeypress = null;
                        }
                        
                        while(ths[y].firstChild) ths[y].removeChild(ths[y].firstChild);

                        ths[y].title = datePicker.fullDay[d];

                        // Don't create a button for the first day header
                        if(y > 0) {
                                but = document.createElement("BUTTON");
                                but.className = "fd-day-header";
                                but.onclick = but.onkeypress = ths[y].onclick = o.setFirstDayOfWeek;
                                but.appendChild(document.createTextNode(datePicker.dayAbbr ? datePicker.dayAbbr[d] : datePicker.fullDay[d].charAt(0)));
                                ths[y].appendChild(but);
                                but.title = datePicker.fullDay[d];
                                but = null;
                        } else {
                                ths[y].appendChild(document.createTextNode(datePicker.dayAbbr ? datePicker.dayAbbr[d] : datePicker.fullDay[d].charAt(0)));
                                ths[y].onclick = null;
                        };
                };

                var trs = o.table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
                var tmpCell;

                for ( var y = 0; y < rows; y++ ) {
                        var tds = trs[y].getElementsByTagName('td');
                        for (var x = 0; x < cols; x++) {
                                tmpCell = tds[x];

                                while(tmpCell.firstChild) tmpCell.removeChild(tmpCell.firstChild);

                                if ( typeof cells[y][x] != "undefined" ) {
                                        tmpCell.className = cells[y][x].className;
                                        tmpCell.id = cells[y][x].id;
                                        
                                        tmpCell.appendChild(document.createTextNode(cells[y][x].text));
                                        
                                        if(cells[y][x].className != "out-of-range") {
                                                tmpCell.onmouseover = o.events.onmouseover;
                                                tmpCell.onclick = cells[y][x].className.search(/day-disabled|out-of-range/) != -1 ? o.killEvent : o.events.onclick;
                                                tmpCell.title = datePicker.months[o.date.getMonth()] + nbsp + cells[y][x].text + "," + nbsp + o.date.getFullYear();
                                        } else {
                                                tmpCell.onmouseover = null;
                                                tmpCell.onclick = o.killEvent;
                                                tmpCell.title = "";
                                        };
                                } else {
                                        tmpCell.className = "";
                                        tmpCell.id = "";
                                        tmpCell.onmouseover = null;
                                        tmpCell.onclick = function(e) { return o.killEvent(e); };
                                        tmpCell.appendChild(document.createTextNode(nbsp));
                                        tmpCell.title = "";
                                };
                        };
                };
        };
        o.init = function() {
                if(o.low && o.high && (o.high - o.low < 7)) { o.equaliseDates(); }
                //o.setDateFromInput();
                o.fade();
        };
        o.show = function() {
                var elem = o.getElem();
                if(!elem || o.visible || elem.disabled) return;

                o.reset();
                o.setDateFromInput();
                o.updateTable();
                o.resize();
                
                datePickerController.addEvent(document, "mousedown", o.events.onmousedown);
                datePickerController.addEvent(document, "keypress", o.events.onkeydown);

                // Internet Explorer requires the keydown event in order to catch arrow keys
                
                /*@cc_on@*/
                /*@if(@_win32)
                        datePickerController.removeEvent(document, "keypress", o.events.onkeydown);
                        datePickerController.addEvent(document, "keydown", o.events.onkeydown);
                /*@end@*/

                o.opacityTo = o.noFade ? 99 : 90;
                o.div.style.display = "block";
                if(o.iePopUp) { o.iePopUp.style.display = "block"; }
                o.fade();
                o.visible = true;
        };
        o.hide = function()   {
                if(!o.visible) return;
                o.stopTimer();
                try { datePickerController.removeEvent(document, "mousedown", o.events.onmousedown); }  catch(e) { };
                try { datePickerController.removeEvent(document, "mouseup", o.events.clearTimer); }     catch(e) { };
                try { datePickerController.removeEvent(document, "keypress", o.events.onkeydown); }     catch(e) { };
                try { datePickerController.removeEvent(document, "keydown", o.events.onkeydown); }      catch(e) { };
                if(o.iePopUp) { o.iePopUp.style.display = "none"; };
                o.opacityTo = 0;
                o.fade();
                o.visible = false;
        };
        o.destroy = function() {
                // Cleanup for Internet Explorer
                try { datePickerController.removeEvent(document, "mousedown", o.events.onmousedown); }  catch(e) { };
                try { datePickerController.removeEvent(document, "mouseup", o.events.clearTimer); }     catch(e) { };
                try { datePickerController.removeEvent(document, "keypress", o.events.onkeydown); }     catch(e) { };
                try { datePickerController.removeEvent(document, "keydown", o.events.onkeydown); }      catch(e) { };

                var ths = o.table.getElementsByTagName("th");
                for(var i = 0, th; th = ths[i]; i++) {
                        th.onmouseover = th.onmouseout = th.onmousedown = th.onclick = null;
                }
                
                var tds = o.table.getElementsByTagName("td");
                for(var i = 0, td; td = tds[i]; i++) {
                        td.onmouseover = td.onclick = null;
                }

                var butts = o.table.getElementsByTagName("button");
                for(var i = 0, butt; butt = butts[i]; i++) {
                        butt.onmousedown = butt.onclick = butt.onkeypress = null;
                }
                
                clearTimeout(o.fadeTimer);
                clearTimeout(o.timer);
                o.fadeTimer = o.timer = null;
                
                /*@cc_on@*/
                /*@if(@_jscript_version <= 5.6)
                        o.iePopUp = null;
                /*@end@*/
                
                if(document.getElementById(o.id.replace(/^fd-/, 'fd-but-'))) {
                        var butt = document.getElementById(o.id.replace(/^fd-/, 'fd-but-'));
                        butt.onclick = butt.onpress = null;
                }
                
                o.titleBar = o.table = o.div = null;

                o = null;
        };
        
        o.create();
        o.init();
};

datePickerController = {
        datePickers: {},
        addEvent: function(obj, type, fn, tmp) {
                tmp || (tmp = true);
                if( obj.attachEvent ) {
                        obj["e"+type+fn] = fn;
                        obj[type+fn] = function(){obj["e"+type+fn]( window.event );};
                        obj.attachEvent( "on"+type, obj[type+fn] );
                } else {
                        obj.addEventListener( type, fn, true );
                };
        },
        removeEvent: function(obj, type, fn, tmp) {
                tmp || (tmp = true);
                if( obj.detachEvent ) {
                        obj.detachEvent( "on"+type, obj[type+fn] );
                        obj[type+fn] = null;
                } else {
                        obj.removeEventListener( type, fn, true );
                };
        },
        hideAll: function(exception) {
                for(dp in datePickerController.datePickers) {
                        if(exception && exception == datePickerController.datePickers[dp].id) { continue; };
                        if(document.getElementById(datePickerController.datePickers[dp].id))  { datePickerController.datePickers[dp].hide(); };
                };
        },
        cleanUp: function() {
                var dp;
                for(dp in datePickerController.datePickers) {
                        if(!document.getElementById(datePickerController.datePickers[dp].id)) {
                                dpElem = document.getElementById("fd-"+datePickerController.datePickers[dp].id);
                                datePickerController.datePickers[dp].destroy();
                                datePickerController.datePickers[dp] = null;
                                delete datePickerController.datePickers[dp];
                                if(dpElem) {
                                        dpElem.parentNode.removeChild(dpElem);
                                };
                        };
                };
        },
        destroy: function() {
                for(dp in datePickerController.datePickers) {
                        datePickerController.datePickers[dp].destroy();
                        datePickerController.datePickers[dp] = null;
                        delete datePickerController.datePickers[dp];
                };
                datePickerController.datePickers = null;
                 /*@cc_on@*/
                /*@if(@_jscript_version <= 5.6)
                        if(document.getElementById("iePopUpHack")) {
                                document.body.removeChild(document.getElementById("iePopUpHack"));

                        }
                /*@end@*/
                datePicker.script = null;
                
                datePickerController.removeEvent(window, 'load', datePickerController.create);
                datePickerController.removeEvent(window, 'unload', datePickerController.destroy);

        },
        dateFormat: function(dateIn, favourMDY) {
                var dateTest = [
                        { regExp:/^(0?[1-9]|[12][0-9]|3[01])([- \/.])(0?[1-9]|1[012])([- \/.])((\d\d)?\d\d)$/, d:1, m:3, y:5 },  // dmy
                        { regExp:/^(0?[1-9]|1[012])([- \/.])(0?[1-9]|[12][0-9]|3[01])([- \/.])((\d\d)?\d\d)$/, d:3, m:1, y:5 },  // mdy
                        { regExp:/^(\d\d\d\d)([- \/.])(0?[1-9]|1[012])([- \/.])(0?[1-9]|[12][0-9]|3[01])$/,    d:5, m:3, y:1 }   // ymd
                        ];

                var start;
                var cnt = 0;
                
                while(cnt < 3) {
                        start = (cnt + (favourMDY ? 4 : 3)) % 3;

                        if(dateIn.match(dateTest[start].regExp)) {
                                res = dateIn.match(dateTest[start].regExp);
                                y = res[dateTest[start].y];
                                m = res[dateTest[start].m];
                                d = res[dateTest[start].d];
                                if(m.length == 1) m = "0" + m;
                                if(d.length == 1) d = "0" + d;
                                if(y.length != 4) y = (parseInt(y) < 50) ? '20' + y : '19' + y;

                                return String(y)+m+d;
                        };
                        
                        cnt++;
                };

                return 0;
        },
        create: function() {
                if(!datePicker.isSupported) return;

                datePickerController.cleanUp();
                
                var inputs = document.getElementsByTagName('input');

                var regExp1 = /disable-days-([1-7]){1,6}/g;             // the days to disable
                var regExp2 = /no-transparency/g;                       // do not use transparency effects
                var regExp3 = /highlight-days-([1-7]){1,7}/g;           // the days to highlight in red
                var regExp4 = /range-low-(\d\d\d\d-\d\d-\d\d)/g;        // the lowest selectable date
                var regExp5 = /range-high-(\d\d\d\d-\d\d-\d\d)/g;       // the highest selectable date
                var regExp6 = /format-(d-m-y|m-d-y|y-m-d|d-m)/g;            // the input/output date format
                var regExp7 = /divider-(dot|slash|space|dash)/g;        // the character used to divide the date
                var regExp8 = /no-locale/g;                             // do not attempt to detect the browser language

                for(var i=0, inp; inp = inputs[i]; i++) {
                        if(inp.className && (inp.className.search(regExp6) != -1 || inp.className.search(/split-date/) != -1) && inp.type == "text" && inp.name) {

                                if(!inp.id) {
                                        // Internet explorer requires you to give each input a unique ID attribute.
                                        if(document.getElementById(inp.name)) continue;
                                        inp.id = inp.name;
                                };

                                var options = {
                                        id:inp.id,
                                        low:"",
                                        high:"",
                                        divider:"/",
                                        format:"d-m-y",
                                        highlightDays:[0,0,0,0,0,1,1],
                                        disableDays:[0,0,0,0,0,0,0],
                                        locale:inp.className.search(regExp8) == -1,
                                        splitDate:0,
                                        noFade:inp.className.search(regExp2) != -1
                                };

                                // Split the date into three parts ?
                                if(inp.className.search(/split-date/) != -1) {
                                        if(document.getElementById(inp.id+'-dd') && document.getElementById(inp.id+'-mm') && document.getElementById(inp.id+'-dd').tagName.toLowerCase() == "input" && document.getElementById(inp.id+'-mm').tagName.toLowerCase() == "input") {
                                                options.splitDate = 1;
                                        };
                                };
                                
                                // Date format(variations of d-m-y)
                                if(inp.className.search(regExp6) != -1) {
                                        options.format = inp.className.match(regExp6)[0].replace('format-','');
                                };
                                
                                // What divider to use, a "/", "-", "." or " "
                                if(inp.className.search(regExp7) != -1) {
                                        var dividers = { dot:".", space:" ", dash:"-", slash:"/" };
                                        options.divider = (inp.className.match(regExp7)[0].replace('divider-','') in dividers) ? dividers[inp.className.match(regExp7)[0].replace('divider-','')] : "/";
                                };

                                // The days to highlight
                                if(inp.className.search(regExp3) != -1) {
                                        var tmp = inp.className.match(regExp3)[0].replace(/highlight-days-/, '');
                                        options.highlightDays = [0,0,0,0,0,0,0];
                                        for(var j = 0; j < tmp.length; j++) {
                                                options.highlightDays[tmp.charAt(j) - 1] = 1;
                                        };
                                };

                                // The days to disable
                                if(inp.className.search(regExp1) != -1) {
                                        var tmp = inp.className.match(regExp1)[0].replace(/disable-days-/, '');
                                        options.disableDays = [0,0,0,0,0,0,0];
                                        for(var j = 0; j < tmp.length; j++) {
                                                options.disableDays[tmp.charAt(j) - 1] = 1;
                                        };
                                };
                                
                                // The lower limit
                                if(inp.className.search(/range-low-today/i) != -1) {
                                        options.low = datePickerController.dateFormat((new Date().getMonth() + 1) + "/" + new Date().getDate() + "/" + new Date().getFullYear(), true);
                                } else if(inp.className.search(regExp4) != -1) {
                                        options.low = datePickerController.dateFormat(inp.className.match(regExp4)[0].replace(/range-low-/, ''), false);
                                        if(!options.low) {
                                                options.low = '';
                                        };
                                };

                                // The higher limit
                                if(inp.className.search(/range-high-today/i) != -1 && inp.className.search(/range-low-today/i) == -1) {
                                        options.high = datePickerController.dateFormat((new Date().getMonth() + 1) + "/" + new Date().getDate() + "/" + new Date().getFullYear(), true);
                                } else if(inp.className.search(regExp5) != -1) {
                                        options.high = datePickerController.dateFormat(inp.className.match(regExp5)[0].replace(/range-high-/, ''), false);
                                        if(!options.high) {
                                                options.high = '';
                                        };
                                };

                                // Datepicker is already created so reset it's defaults
                                if(document.getElementById('fd-'+inp.id)) {
                                        for(var opt in options) {
                                                datePickerController.datePickers[inp.id].defaults[opt] = options[opt];
                                        };
                                        datePickerController.datePickers[inp.id].enabledDays = datePickerController.datePickers[inp.id].disabledDays = [];
                                };
                                
                                // Create the button (if needs be)
                                if(!document.getElementById("fd-but-" + inp.id)) {
                                        var but = document.createElement('button');
                                        but.setAttribute("type", "button");
                                        but.className = "date-picker-control";

                                        but.id = "fd-but-" + inp.id;
                                        but.appendChild(document.createTextNode(String.fromCharCode( 160 )));
                                
                                        if(inp.nextSibling) {
                                                inp.parentNode.insertBefore(but, inp.nextSibling);
                                        } else {
                                                inp.parentNode.appendChild(but);
                                        };
                                } else {
                                        var but = document.getElementById("fd-but-" + inp.id);
                                };
                                
                                // Add button events
                                but.onclick = but.onpress = function() {
                                        var inpId = this.id.replace('fd-but-','');
                                        datePickerController.hideAll(inpId);
                                        if(inpId in datePickerController.datePickers && !datePickerController.datePickers[inpId].visible) {
                                                datePickerController.datePickers[inpId].show();
                                        };
                                        return false;
                                };
                                
                                // Create the datePicker (if needs be)
                                if(!document.getElementById('fd-'+inp.id)) {
                                        datePickerController.datePickers[inp.id] = new datePicker(options);
                                };

                                but = null;
                        };
                };
        }

};


})();

datePickerController.addEvent(window, 'load', datePickerController.create);
datePickerController.addEvent(window, 'unload', datePickerController.destroy);

