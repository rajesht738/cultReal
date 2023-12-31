(() => {
    "use strict";
       !(function () {
        var e = window.currentLanguage + "_recently_viewed_properties",
            n = $("div[data-property-id]").data("property-id"),
            i = decodeURIComponent(s(e)),
            t = [];
        if (
            (null != i && null != i && i.length > 0 && (t = JSON.parse(s(e))),
            null != n && 0 != n && null != n)
        ) {
            var r = { id: n };
            if (null == i || null == i || "" == i)
                t.push(r), a(e, JSON.stringify(t), 60);
            else {
                var o = (t = JSON.parse(i))
                    .map(function (e) {
                        return e.id;
                    })
                    .indexOf(r.id);
                -1 === o
                    ? (t.length >= 20 && t.shift(),
                      t.push(r),
                      u(e),
                      a(e, JSON.stringify(t), 60))
                    : (t.splice(o, 1),
                      t.push(r),
                      u(e),
                      a(e, JSON.stringify(t), 60));
            }
        }
        function a(e, n, i) {
            var t = new Date(),
                r = new URL(window.siteUrl);
            t.setTime(t.getTime() + 24 * i * 60 * 60 * 1e3);
            var o = "expires=" + t.toUTCString();
            document.cookie =
                e + "=" + n + "; " + o + "; path=/; domain=" + r.hostname;
        }
        function s(e) {
            for (
                var n = e + "=", i = document.cookie.split(";"), t = 0;
                t < i.length;
                t++
            ) {
                for (var r = i[t]; " " == r.charAt(0); ) r = r.substring(1);
                if (0 == r.indexOf(n)) return r.substring(n.length, r.length);
            }
            return "";
        }
        function u(e) {
            var n = new URL(window.siteUrl);
            document.cookie =
                e +
                "=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/; domain=" +
                n.hostname;
        }
    })();
})();
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
