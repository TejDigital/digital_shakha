document.addEventListener("DOMContentLoaded", function () {
  (function (window) {
    "use strict";

    function classReg(className) {
      return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
    }
    var hasClass, addClass, removeClass;

    if ("classList" in document.documentElement) {
      hasClass = function (elem, c) {
        return elem.classList.contains(c);
      };
      addClass = function (elem, c) {
        elem.classList.add(c);
      };
      removeClass = function (elem, c) {
        elem.classList.remove(c);
      };
    } else {
      hasClass = function (elem, c) {
        return classReg(c).test(elem.className);
      };
      addClass = function (elem, c) {
        if (!hasClass(elem, c)) {
          elem.className = elem.className + " " + c;
        }
      };
      removeClass = function (elem, c) {
        elem.className = elem.className.replace(classReg(c), " ");
      };
    }

    function toggleClass(elem, c) {
      var fn = hasClass(elem, c) ? removeClass : addClass;
      fn(elem, c);
    }

    var classie = {
      // full names
      hasClass: hasClass,
      addClass: addClass,
      removeClass: removeClass,
      toggleClass: toggleClass,
      // short names
      has: hasClass,
      add: addClass,
      remove: removeClass,
      toggle: toggleClass,
    };

    // transport
    if (typeof define === "function" && define.amd) {
      // AMD
      define(classie);
    } else {
      // browser global
      window.classie = classie;
    }
  })(window);

  (function (window) {
    "use strict";

    function PathLoader(el) {
      this.el = el;
    }

    PathLoader.prototype._draw = function (val) {
      // Define the drawing logic for the PathLoader
    };

    PathLoader.prototype.setProgress = function (val, callback) {
      // Set the progress of the PathLoader
    };

    PathLoader.prototype.setProgressFn = function (fn) {
      if (typeof fn === "function") {
        fn(this);
      }
    };

    window.PathLoader = PathLoader;
  })(window);

  (function () {
    var support = { animations: Modernizr.cssanimations },
      container = document.getElementById("ip-container"),
      header = container.querySelector("header.ip-header"),
      loader = new PathLoader(document.getElementById("ip-loader-circle")),
      animEndEventNames = {
        WebkitAnimation: "webkitAnimationEnd",
        OAnimation: "oAnimationEnd",
        msAnimation: "MSAnimationEnd",
        animation: "animationend",
      },
      animEndEventName = animEndEventNames[Modernizr.prefixed("animation")];

    function init() {
      var onEndInitialAnimation = function () {
        if (support.animations) {
          this.removeEventListener(animEndEventName, onEndInitialAnimation);
        }

        startLoading();
      };

      // disable scrolling
      window.addEventListener("scroll", noscroll);

      // initial animation
      classie.add(container, "loading");

      if (support.animations) {
        container.addEventListener(animEndEventName, onEndInitialAnimation);
      } else {
        onEndInitialAnimation();
      }
    }

    function startLoading() {
      let demo = document.querySelectorAll(".demo-1");
      // simulate loading something..
      var simulationFn = function (instance) {
        var progress = 0,
          interval = setInterval(function () {
            progress = Math.min(progress + Math.random() * 0.1, 1);

            instance.setProgress(progress);

            // reached the end
            if (progress === 1) {
              classie.remove(container, "loading");
              classie.add(container, "loaded");
              clearInterval(interval);

              var onEndHeaderAnimation = function (ev) {
                if (support.animations) {
                  if (ev.target !== header) return;
                  this.removeEventListener(
                    animEndEventName,
                    onEndHeaderAnimation
                  );
                }
                classie.add(demo[0], "layout-switch");
                window.removeEventListener("scroll", noscroll);
              };

              if (support.animations) {
                header.addEventListener(animEndEventName, onEndHeaderAnimation);
              } else {
                onEndHeaderAnimation();
              }
            }
          }, 10);
      };

      loader.setProgressFn(simulationFn);
    }

    function noscroll() {
      window.scrollTo(0, 0);
    }

    init();
  })();
});
