/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

function stack_filters_add_event() {
  var stack_filters = document.getElementsByClassName('stack-filter');

  for (i = 0; i < stack_filters.length; i++) {
    stack_filters[i].addEventListener("click", function (event) {
      event.preventDefault();
      stack = this.dataset.techStack;
      other_active = document.getElementsByClassName("active");

      for (j = 0; j < other_active.length; j++) {
        other_active[j].classList.remove("active");
      }

      this.classList.add("active");
      stack_filter(stack);
    });
  }
}

function education_dropdown_add_event() {
  var education_items = document.getElementsByClassName('education');

  for (i = 0; i < education_items.length; i++) {
    var icon_link = education_items[i].querySelector('a');
    icon_link.addEventListener("click", function (event) {
      event.preventDefault();
      var icon = this.querySelector('i');
      education_body = this.parentElement.parentElement.querySelector('.body');
      education_header = this.parentElement.parentElement.querySelector('.header');

      if (icon.classList.contains("fa-chevron-down")) {
        icon.classList.remove("fa-chevron-down");
        icon.classList.add("fa-chevron-up");
        education_header.classList.add("open");
        education_header.classList.remove("closed");
        education_body.style = "display: block;";
      } else {
        icon.classList.remove("fa-chevron-up");
        icon.classList.add("fa-chevron-down");
        education_header.classList.add("closed");
        education_header.classList.remove("open");
        education_body.style = "display: none;";
      }
    });
  }
}

function stack_filter(selected_stack) {
  proj_cards = document.getElementsByClassName("project-card");

  for (idx = 0; idx < proj_cards.length; idx++) {
    stack = proj_cards[idx].dataset.techStack;
    stack = stack.split(" ");

    if (selected_stack == "all-active") {
      proj_cards[idx].style.display = "block";
    } else {
      if (!stack.includes(selected_stack)) {
        proj_cards[idx].style.display = "none";
      } else {
        proj_cards[idx].style.display = "block";
      }
    }
  }
}

function setUserAcceptanceCookie() {
  var expiry_date = new Date();
  expiry_date.setTime(expiry_date.getTime() + 14 * 24 * 60 * 60 * 1000);
  var expires = "expires=" + expiry_date.toUTCString();
  document.cookie = "cookies_accept=true;" + expires + ";path=/";
  return;
}

function getUserAcceptanceCookie() {
  var name = "cookies_accept=";
  var cookie_array = document.cookie.split(';');

  for (var idx = 0; idx < cookie_array.length; idx++) {
    var element = cookie_array[idx];

    while (element.charAt(0) == ' ') {
      element = element.substring(1);
    }

    if (element.indexOf(name) == 0) {
      return element.substring(name.length, element.length);
    }
  }
}

function checkUserAcceptanceCookie() {
  var cookie = getUserAcceptanceCookie();

  if (cookie == "true") {
    return;
  } else {
    createCookieBanner();
  }
}

function createCookieBanner() {
  var cookies_container = document.createElement("div");
  cookies_container.setAttribute("id", "cookies");
  var wrapper = document.createElement("div");
  wrapper.setAttribute("class", "grid-container");
  cookies_container.appendChild(wrapper);
  var grid = document.createElement("div");
  grid.setAttribute("class", "grid");
  wrapper.appendChild(grid);
  var text = document.createElement("p");
  text.setAttribute("class", "small-12 medium-10 large-10 xlarge-10");
  text.innerHTML = "This website uses cookies for analytical purposes to improve your user experience.";
  grid.appendChild(text);
  var button_container = document.createElement("p");
  button_container.setAttribute("class", "button small-12 medium-2 large-2 xlarge-2");
  grid.appendChild(button_container);
  var link = document.createElement("a");
  link.setAttribute("href", "#");
  link.setAttribute("id", "cookies-accept");
  link.innerHTML = "Close <span class='fa fa-times-circle right'></span>";

  link.onclick = function () {
    event.preventDefault();
    setUserAcceptanceCookie();
    removeCookieBanner();
  };

  button_container.appendChild(link);
  document.body.appendChild(cookies_container);
}

function removeCookieBanner() {
  var cookie_banner = document.getElementById("cookies");
  cookie_banner.remove();
  return;
}

function toggle_mobile_nav() {
  var bars = document.getElementById('bars');
  bars.addEventListener("click", function (event) {
    event.preventDefault();
    nav_links = bars.parentElement.querySelectorAll('a');

    for (idx = 0; idx < nav_links.length; idx++) {
      if (bars.classList.contains('hidden')) {
        nav_links[idx].classList.remove('hidden');
        nav_links[idx].classList.add('show');
      } else {
        nav_links[idx].classList.remove('show');
        nav_links[idx].classList.add('hidden');
      }
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  stack_filters_add_event();
  education_dropdown_add_event();
  checkUserAcceptanceCookie();
  toggle_mobile_nav();
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;