/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 123);
/******/ })
/************************************************************************/
/******/ ({

/***/ 115:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(6)(
  /* script */
  __webpack_require__(78),
  /* template */
  __webpack_require__(116),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "/Users/victor/dev/my/resources/assets/js/components/stockOverview.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] stockOverview.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-235cb4ff", Component.options)
  } else {
    hotAPI.reload("data-v-235cb4ff", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 116:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('el-table', {
    staticStyle: {
      "width": "100%"
    },
    attrs: {
      "data": _vm.data,
      "stripe": ""
    }
  }, [_c('el-table-column', {
    attrs: {
      "prop": "model",
      "label": "名称"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "category",
      "label": "类型"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "brand",
      "label": "品牌"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "factory_serial_number",
      "label": "序列号"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "remain_amount",
      "label": "剩余数量",
      "sortable": ""
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "label": "",
      "width": "100"
    },
    scopedSlots: _vm._u([
      ["default", function(scope) {
        return [_c('el-button', {
          attrs: {
            "type": "text",
            "size": "small"
          }
        }, [_vm._v("查看")]), _vm._v(" "), _c('el-button', {
          attrs: {
            "type": "text",
            "size": "small"
          }
        }, [_vm._v("编辑")])]
      }]
    ])
  })], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-235cb4ff", module.exports)
  }
}

/***/ }),

/***/ 123:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(33);


/***/ }),

/***/ 33:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_stockOverview_vue__ = __webpack_require__(115);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_stockOverview_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_stockOverview_vue__);


var addParts = new Vue({
  el: '#main',
  components: {
    'stock-overview': __WEBPACK_IMPORTED_MODULE_0__components_stockOverview_vue___default.a
  },
  template: "<stock-overview :datasource='datasource'></stock-overview>",
  data: {
    datasource: '/ajax/produce/create/getCreateStock'
  }
});

/***/ }),

/***/ 6:
/***/ (function(module, exports) {

// this module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  scopeId,
  cssModules
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  // inject cssModules
  if (cssModules) {
    var computed = Object.create(options.computed || null)
    Object.keys(cssModules).forEach(function (key) {
      var module = cssModules[key]
      computed[key] = function () { return module }
    })
    options.computed = computed
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 78:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

// import stockOverviewTable from './stockOverviewTable.vue'
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['datasource'],
  // components: {
  //   'table-overview': stockOverviewTable
  // },
  data: function data() {
    return {
      data: [{ "stock_id": 1, "model": "842-A5", "category": "\u6C34\u6CF5", "brand": "CRI", "origin_serial_number": "2kd537rk", "factory_serial_number": "vjhk", "remain_amount": 18 }, { "stock_id": 2, "model": "64C-50", "category": "\u6C34\u6CF5", "brand": "F3", "origin_serial_number": "56ytr", "factory_serial_number": "y8gohuvkj", "remain_amount": 47 }]
      //  {"stock_id":3,"model":"CF9400","category":"\u538b\u7f29\u673a","brand":"SIKE","origin_serial_number":"fwguivkjjvr893","factory_serial_number":"7r6ty8oui","remain_amount":3},
      //  {"stock_id":4,"model":"CF6100","category":"\u538b\u7f29\u673a","brand":"SIKE","origin_serial_number":"6r8t7iogjkrhcs","factory_serial_number":"9u8y7itu","remain_amount":83}]
      //  options: [{
      //    value: 'category',
      //    label: 'category',
      //    children: [{
      //      value: 'factory_serial_number',
      //      label: 'name'
      //    }]
      //  }],
    };
  },

  methods: {
    filterBrand: function filterBrand(value, row) {
      console.log(value, row);
      return row.brand === value;
    }
  },
  created: function created() {
    var _this = this;

    axios.get(this.datasource).then(function (response) {
      // JSON responses are automatically parsed.
      _this.data = response.data;
      console.log(_this.data);
    }).catch(function (e) {
      console.error(e);
    });
  }
});

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgZGFhOWMyNTBkNDM4N2Y2MjM5NTUiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9jb21wb25lbnRzL3N0b2NrT3ZlcnZpZXcudnVlIiwid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9zdG9ja092ZXJ2aWV3LnZ1ZT85YzMyIiwid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvanMvc3RvY2tPdmVydmlldy5qcyIsIndlYnBhY2s6Ly8vLi9+L3Z1ZS1sb2FkZXIvbGliL2NvbXBvbmVudC1ub3JtYWxpemVyLmpzIiwid2VicGFjazovLy9zdG9ja092ZXJ2aWV3LnZ1ZSJdLCJuYW1lcyI6WyJhZGRQYXJ0cyIsIlZ1ZSIsImVsIiwiY29tcG9uZW50cyIsIlN0b2NrT3ZlcnZpZXciLCJ0ZW1wbGF0ZSIsImRhdGEiLCJkYXRhc291cmNlIl0sIm1hcHBpbmdzIjoiO0FBQUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0EsbURBQTJDLGNBQWM7O0FBRXpEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBSztBQUNMO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsbUNBQTJCLDBCQUEwQixFQUFFO0FBQ3ZELHlDQUFpQyxlQUFlO0FBQ2hEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLDhEQUFzRCwrREFBK0Q7O0FBRXJIO0FBQ0E7O0FBRUE7QUFDQTs7Ozs7Ozs7QUNoRUE7QUFDQTtBQUNBLHdCQUFxSjtBQUNySjtBQUNBLHlCQUF5RztBQUN6RztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSwrRUFBK0UsaURBQWlELElBQUk7QUFDcEksbUNBQW1DOztBQUVuQztBQUNBLFlBQWlCO0FBQ2pCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0EsQ0FBQzs7QUFFRDs7Ozs7Ozs7QUMzQkEsZ0JBQWdCLG1CQUFtQixhQUFhLDBCQUEwQjtBQUMxRTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1QsT0FBTztBQUNQO0FBQ0EsR0FBRztBQUNILENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDOzs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FDL0RBOztBQUVBLElBQU1BLFdBQVcsSUFBSUMsR0FBSixDQUFRO0FBQ3ZCQyxNQUFJLE9BRG1CO0FBRXZCQyxjQUFZO0FBQ1osc0JBQWtCLHFFQUFBQztBQUROLEdBRlc7QUFLdkJDLFlBQVUsNERBTGE7QUFNdkJDLFFBQU07QUFDSkMsZ0JBQVk7QUFEUjtBQU5pQixDQUFSLENBQWpCLEM7Ozs7Ozs7QUNGQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLG1DQUFtQztBQUNuQyxLQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUNMQTtBQUNBO1VBRUE7QUFDQTtBQUNBO0FBQ0E7d0JBQ0E7O1lBRUEsdUtBQ0EsNktBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQTtBQWRBO0FBZUE7OztrREFFQTt5QkFDQTsyQkFDQTtBQUVBO0FBTEE7O0FBTUE7O21CQUNBLHFDQUNBO0FBQ0E7NEJBQ0E7d0JBQ0E7QUFDQSwwQkFDQTtvQkFDQTtBQUNBO0FBQ0E7QUF0Q0EsRyIsImZpbGUiOiIvanMvc3RvY2tPdmVydmlldy5qcyIsInNvdXJjZXNDb250ZW50IjpbIiBcdC8vIFRoZSBtb2R1bGUgY2FjaGVcbiBcdHZhciBpbnN0YWxsZWRNb2R1bGVzID0ge307XG5cbiBcdC8vIFRoZSByZXF1aXJlIGZ1bmN0aW9uXG4gXHRmdW5jdGlvbiBfX3dlYnBhY2tfcmVxdWlyZV9fKG1vZHVsZUlkKSB7XG5cbiBcdFx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG4gXHRcdGlmKGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdKVxuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuXG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBpZGVudGl0eSBmdW5jdGlvbiBmb3IgY2FsbGluZyBoYXJtb255IGltcG9ydHMgd2l0aCB0aGUgY29ycmVjdCBjb250ZXh0XG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmkgPSBmdW5jdGlvbih2YWx1ZSkgeyByZXR1cm4gdmFsdWU7IH07XG5cbiBcdC8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb24gZm9yIGhhcm1vbnkgZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kID0gZnVuY3Rpb24oZXhwb3J0cywgbmFtZSwgZ2V0dGVyKSB7XG4gXHRcdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywgbmFtZSkpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgbmFtZSwge1xuIFx0XHRcdFx0Y29uZmlndXJhYmxlOiBmYWxzZSxcbiBcdFx0XHRcdGVudW1lcmFibGU6IHRydWUsXG4gXHRcdFx0XHRnZXQ6IGdldHRlclxuIFx0XHRcdH0pO1xuIFx0XHR9XG4gXHR9O1xuXG4gXHQvLyBnZXREZWZhdWx0RXhwb3J0IGZ1bmN0aW9uIGZvciBjb21wYXRpYmlsaXR5IHdpdGggbm9uLWhhcm1vbnkgbW9kdWxlc1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5uID0gZnVuY3Rpb24obW9kdWxlKSB7XG4gXHRcdHZhciBnZXR0ZXIgPSBtb2R1bGUgJiYgbW9kdWxlLl9fZXNNb2R1bGUgP1xuIFx0XHRcdGZ1bmN0aW9uIGdldERlZmF1bHQoKSB7IHJldHVybiBtb2R1bGVbJ2RlZmF1bHQnXTsgfSA6XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0TW9kdWxlRXhwb3J0cygpIHsgcmV0dXJuIG1vZHVsZTsgfTtcbiBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kKGdldHRlciwgJ2EnLCBnZXR0ZXIpO1xuIFx0XHRyZXR1cm4gZ2V0dGVyO1xuIFx0fTtcblxuIFx0Ly8gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSBmdW5jdGlvbihvYmplY3QsIHByb3BlcnR5KSB7IHJldHVybiBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqZWN0LCBwcm9wZXJ0eSk7IH07XG5cbiBcdC8vIF9fd2VicGFja19wdWJsaWNfcGF0aF9fXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnAgPSBcIlwiO1xuXG4gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbiBcdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKF9fd2VicGFja19yZXF1aXJlX18ucyA9IDEyMyk7XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gd2VicGFjay9ib290c3RyYXAgZGFhOWMyNTBkNDM4N2Y2MjM5NTUiLCJ2YXIgQ29tcG9uZW50ID0gcmVxdWlyZShcIiEuLi8uLi8uLi8uLi9ub2RlX21vZHVsZXMvdnVlLWxvYWRlci9saWIvY29tcG9uZW50LW5vcm1hbGl6ZXJcIikoXG4gIC8qIHNjcmlwdCAqL1xuICByZXF1aXJlKFwiISFiYWJlbC1sb2FkZXI/e1xcXCJjYWNoZURpcmVjdG9yeVxcXCI6dHJ1ZSxcXFwicHJlc2V0c1xcXCI6W1tcXFwiZW52XFxcIix7XFxcIm1vZHVsZXNcXFwiOmZhbHNlLFxcXCJ0YXJnZXRzXFxcIjp7XFxcImJyb3dzZXJzXFxcIjpbXFxcIj4gMiVcXFwiXSxcXFwidWdsaWZ5XFxcIjp0cnVlfX1dXX0hLi4vLi4vLi4vLi4vbm9kZV9tb2R1bGVzL3Z1ZS1sb2FkZXIvbGliL3NlbGVjdG9yP3R5cGU9c2NyaXB0JmluZGV4PTAhLi9zdG9ja092ZXJ2aWV3LnZ1ZVwiKSxcbiAgLyogdGVtcGxhdGUgKi9cbiAgcmVxdWlyZShcIiEhLi4vLi4vLi4vLi4vbm9kZV9tb2R1bGVzL3Z1ZS1sb2FkZXIvbGliL3RlbXBsYXRlLWNvbXBpbGVyL2luZGV4P3tcXFwiaWRcXFwiOlxcXCJkYXRhLXYtMjM1Y2I0ZmZcXFwifSEuLi8uLi8uLi8uLi9ub2RlX21vZHVsZXMvdnVlLWxvYWRlci9saWIvc2VsZWN0b3I/dHlwZT10ZW1wbGF0ZSZpbmRleD0wIS4vc3RvY2tPdmVydmlldy52dWVcIiksXG4gIC8qIHNjb3BlSWQgKi9cbiAgbnVsbCxcbiAgLyogY3NzTW9kdWxlcyAqL1xuICBudWxsXG4pXG5Db21wb25lbnQub3B0aW9ucy5fX2ZpbGUgPSBcIi9Vc2Vycy92aWN0b3IvZGV2L215L3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9zdG9ja092ZXJ2aWV3LnZ1ZVwiXG5pZiAoQ29tcG9uZW50LmVzTW9kdWxlICYmIE9iamVjdC5rZXlzKENvbXBvbmVudC5lc01vZHVsZSkuc29tZShmdW5jdGlvbiAoa2V5KSB7cmV0dXJuIGtleSAhPT0gXCJkZWZhdWx0XCIgJiYga2V5ICE9PSBcIl9fZXNNb2R1bGVcIn0pKSB7Y29uc29sZS5lcnJvcihcIm5hbWVkIGV4cG9ydHMgYXJlIG5vdCBzdXBwb3J0ZWQgaW4gKi52dWUgZmlsZXMuXCIpfVxuaWYgKENvbXBvbmVudC5vcHRpb25zLmZ1bmN0aW9uYWwpIHtjb25zb2xlLmVycm9yKFwiW3Z1ZS1sb2FkZXJdIHN0b2NrT3ZlcnZpZXcudnVlOiBmdW5jdGlvbmFsIGNvbXBvbmVudHMgYXJlIG5vdCBzdXBwb3J0ZWQgd2l0aCB0ZW1wbGF0ZXMsIHRoZXkgc2hvdWxkIHVzZSByZW5kZXIgZnVuY3Rpb25zLlwiKX1cblxuLyogaG90IHJlbG9hZCAqL1xuaWYgKG1vZHVsZS5ob3QpIHsoZnVuY3Rpb24gKCkge1xuICB2YXIgaG90QVBJID0gcmVxdWlyZShcInZ1ZS1ob3QtcmVsb2FkLWFwaVwiKVxuICBob3RBUEkuaW5zdGFsbChyZXF1aXJlKFwidnVlXCIpLCBmYWxzZSlcbiAgaWYgKCFob3RBUEkuY29tcGF0aWJsZSkgcmV0dXJuXG4gIG1vZHVsZS5ob3QuYWNjZXB0KClcbiAgaWYgKCFtb2R1bGUuaG90LmRhdGEpIHtcbiAgICBob3RBUEkuY3JlYXRlUmVjb3JkKFwiZGF0YS12LTIzNWNiNGZmXCIsIENvbXBvbmVudC5vcHRpb25zKVxuICB9IGVsc2Uge1xuICAgIGhvdEFQSS5yZWxvYWQoXCJkYXRhLXYtMjM1Y2I0ZmZcIiwgQ29tcG9uZW50Lm9wdGlvbnMpXG4gIH1cbn0pKCl9XG5cbm1vZHVsZS5leHBvcnRzID0gQ29tcG9uZW50LmV4cG9ydHNcblxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9jb21wb25lbnRzL3N0b2NrT3ZlcnZpZXcudnVlXG4vLyBtb2R1bGUgaWQgPSAxMTVcbi8vIG1vZHVsZSBjaHVua3MgPSAxIiwibW9kdWxlLmV4cG9ydHM9e3JlbmRlcjpmdW5jdGlvbiAoKXt2YXIgX3ZtPXRoaXM7dmFyIF9oPV92bS4kY3JlYXRlRWxlbWVudDt2YXIgX2M9X3ZtLl9zZWxmLl9jfHxfaDtcbiAgcmV0dXJuIF9jKCdlbC10YWJsZScsIHtcbiAgICBzdGF0aWNTdHlsZToge1xuICAgICAgXCJ3aWR0aFwiOiBcIjEwMCVcIlxuICAgIH0sXG4gICAgYXR0cnM6IHtcbiAgICAgIFwiZGF0YVwiOiBfdm0uZGF0YSxcbiAgICAgIFwic3RyaXBlXCI6IFwiXCJcbiAgICB9XG4gIH0sIFtfYygnZWwtdGFibGUtY29sdW1uJywge1xuICAgIGF0dHJzOiB7XG4gICAgICBcInByb3BcIjogXCJtb2RlbFwiLFxuICAgICAgXCJsYWJlbFwiOiBcIuWQjeensFwiXG4gICAgfVxuICB9KSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLXRhYmxlLWNvbHVtbicsIHtcbiAgICBhdHRyczoge1xuICAgICAgXCJwcm9wXCI6IFwiY2F0ZWdvcnlcIixcbiAgICAgIFwibGFiZWxcIjogXCLnsbvlnotcIlxuICAgIH1cbiAgfSksIF92bS5fdihcIiBcIiksIF9jKCdlbC10YWJsZS1jb2x1bW4nLCB7XG4gICAgYXR0cnM6IHtcbiAgICAgIFwicHJvcFwiOiBcImJyYW5kXCIsXG4gICAgICBcImxhYmVsXCI6IFwi5ZOB54mMXCJcbiAgICB9XG4gIH0pLCBfdm0uX3YoXCIgXCIpLCBfYygnZWwtdGFibGUtY29sdW1uJywge1xuICAgIGF0dHJzOiB7XG4gICAgICBcInByb3BcIjogXCJmYWN0b3J5X3NlcmlhbF9udW1iZXJcIixcbiAgICAgIFwibGFiZWxcIjogXCLluo/liJflj7dcIlxuICAgIH1cbiAgfSksIF92bS5fdihcIiBcIiksIF9jKCdlbC10YWJsZS1jb2x1bW4nLCB7XG4gICAgYXR0cnM6IHtcbiAgICAgIFwicHJvcFwiOiBcInJlbWFpbl9hbW91bnRcIixcbiAgICAgIFwibGFiZWxcIjogXCLliankvZnmlbDph49cIixcbiAgICAgIFwic29ydGFibGVcIjogXCJcIlxuICAgIH1cbiAgfSksIF92bS5fdihcIiBcIiksIF9jKCdlbC10YWJsZS1jb2x1bW4nLCB7XG4gICAgYXR0cnM6IHtcbiAgICAgIFwibGFiZWxcIjogXCJcIixcbiAgICAgIFwid2lkdGhcIjogXCIxMDBcIlxuICAgIH0sXG4gICAgc2NvcGVkU2xvdHM6IF92bS5fdShbXG4gICAgICBbXCJkZWZhdWx0XCIsIGZ1bmN0aW9uKHNjb3BlKSB7XG4gICAgICAgIHJldHVybiBbX2MoJ2VsLWJ1dHRvbicsIHtcbiAgICAgICAgICBhdHRyczoge1xuICAgICAgICAgICAgXCJ0eXBlXCI6IFwidGV4dFwiLFxuICAgICAgICAgICAgXCJzaXplXCI6IFwic21hbGxcIlxuICAgICAgICAgIH1cbiAgICAgICAgfSwgW192bS5fdihcIuafpeeci1wiKV0pLCBfdm0uX3YoXCIgXCIpLCBfYygnZWwtYnV0dG9uJywge1xuICAgICAgICAgIGF0dHJzOiB7XG4gICAgICAgICAgICBcInR5cGVcIjogXCJ0ZXh0XCIsXG4gICAgICAgICAgICBcInNpemVcIjogXCJzbWFsbFwiXG4gICAgICAgICAgfVxuICAgICAgICB9LCBbX3ZtLl92KFwi57yW6L6RXCIpXSldXG4gICAgICB9XVxuICAgIF0pXG4gIH0pXSwgMSlcbn0sc3RhdGljUmVuZGVyRm5zOiBbXX1cbm1vZHVsZS5leHBvcnRzLnJlbmRlci5fd2l0aFN0cmlwcGVkID0gdHJ1ZVxuaWYgKG1vZHVsZS5ob3QpIHtcbiAgbW9kdWxlLmhvdC5hY2NlcHQoKVxuICBpZiAobW9kdWxlLmhvdC5kYXRhKSB7XG4gICAgIHJlcXVpcmUoXCJ2dWUtaG90LXJlbG9hZC1hcGlcIikucmVyZW5kZXIoXCJkYXRhLXYtMjM1Y2I0ZmZcIiwgbW9kdWxlLmV4cG9ydHMpXG4gIH1cbn1cblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL34vdnVlLWxvYWRlci9saWIvdGVtcGxhdGUtY29tcGlsZXI/e1wiaWRcIjpcImRhdGEtdi0yMzVjYjRmZlwifSEuL34vdnVlLWxvYWRlci9saWIvc2VsZWN0b3IuanM/dHlwZT10ZW1wbGF0ZSZpbmRleD0wIS4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9jb21wb25lbnRzL3N0b2NrT3ZlcnZpZXcudnVlXG4vLyBtb2R1bGUgaWQgPSAxMTZcbi8vIG1vZHVsZSBjaHVua3MgPSAxIiwiaW1wb3J0IFN0b2NrT3ZlcnZpZXcgZnJvbSAnLi9jb21wb25lbnRzL3N0b2NrT3ZlcnZpZXcudnVlJ1xuXG5jb25zdCBhZGRQYXJ0cyA9IG5ldyBWdWUoe1xuICBlbDogJyNtYWluJyxcbiAgY29tcG9uZW50czoge1xuICAnc3RvY2stb3ZlcnZpZXcnOiBTdG9ja092ZXJ2aWV3XG4gIH0sXG4gIHRlbXBsYXRlOiBcIjxzdG9jay1vdmVydmlldyA6ZGF0YXNvdXJjZT0nZGF0YXNvdXJjZSc+PC9zdG9jay1vdmVydmlldz5cIixcbiAgZGF0YToge1xuICAgIGRhdGFzb3VyY2U6ICcvYWpheC9wcm9kdWNlL2NyZWF0ZS9nZXRDcmVhdGVTdG9jaydcbiAgfVxufSlcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3Jlc291cmNlcy9hc3NldHMvanMvc3RvY2tPdmVydmlldy5qcyIsIi8vIHRoaXMgbW9kdWxlIGlzIGEgcnVudGltZSB1dGlsaXR5IGZvciBjbGVhbmVyIGNvbXBvbmVudCBtb2R1bGUgb3V0cHV0IGFuZCB3aWxsXG4vLyBiZSBpbmNsdWRlZCBpbiB0aGUgZmluYWwgd2VicGFjayB1c2VyIGJ1bmRsZVxuXG5tb2R1bGUuZXhwb3J0cyA9IGZ1bmN0aW9uIG5vcm1hbGl6ZUNvbXBvbmVudCAoXG4gIHJhd1NjcmlwdEV4cG9ydHMsXG4gIGNvbXBpbGVkVGVtcGxhdGUsXG4gIHNjb3BlSWQsXG4gIGNzc01vZHVsZXNcbikge1xuICB2YXIgZXNNb2R1bGVcbiAgdmFyIHNjcmlwdEV4cG9ydHMgPSByYXdTY3JpcHRFeHBvcnRzID0gcmF3U2NyaXB0RXhwb3J0cyB8fCB7fVxuXG4gIC8vIEVTNiBtb2R1bGVzIGludGVyb3BcbiAgdmFyIHR5cGUgPSB0eXBlb2YgcmF3U2NyaXB0RXhwb3J0cy5kZWZhdWx0XG4gIGlmICh0eXBlID09PSAnb2JqZWN0JyB8fCB0eXBlID09PSAnZnVuY3Rpb24nKSB7XG4gICAgZXNNb2R1bGUgPSByYXdTY3JpcHRFeHBvcnRzXG4gICAgc2NyaXB0RXhwb3J0cyA9IHJhd1NjcmlwdEV4cG9ydHMuZGVmYXVsdFxuICB9XG5cbiAgLy8gVnVlLmV4dGVuZCBjb25zdHJ1Y3RvciBleHBvcnQgaW50ZXJvcFxuICB2YXIgb3B0aW9ucyA9IHR5cGVvZiBzY3JpcHRFeHBvcnRzID09PSAnZnVuY3Rpb24nXG4gICAgPyBzY3JpcHRFeHBvcnRzLm9wdGlvbnNcbiAgICA6IHNjcmlwdEV4cG9ydHNcblxuICAvLyByZW5kZXIgZnVuY3Rpb25zXG4gIGlmIChjb21waWxlZFRlbXBsYXRlKSB7XG4gICAgb3B0aW9ucy5yZW5kZXIgPSBjb21waWxlZFRlbXBsYXRlLnJlbmRlclxuICAgIG9wdGlvbnMuc3RhdGljUmVuZGVyRm5zID0gY29tcGlsZWRUZW1wbGF0ZS5zdGF0aWNSZW5kZXJGbnNcbiAgfVxuXG4gIC8vIHNjb3BlZElkXG4gIGlmIChzY29wZUlkKSB7XG4gICAgb3B0aW9ucy5fc2NvcGVJZCA9IHNjb3BlSWRcbiAgfVxuXG4gIC8vIGluamVjdCBjc3NNb2R1bGVzXG4gIGlmIChjc3NNb2R1bGVzKSB7XG4gICAgdmFyIGNvbXB1dGVkID0gT2JqZWN0LmNyZWF0ZShvcHRpb25zLmNvbXB1dGVkIHx8IG51bGwpXG4gICAgT2JqZWN0LmtleXMoY3NzTW9kdWxlcykuZm9yRWFjaChmdW5jdGlvbiAoa2V5KSB7XG4gICAgICB2YXIgbW9kdWxlID0gY3NzTW9kdWxlc1trZXldXG4gICAgICBjb21wdXRlZFtrZXldID0gZnVuY3Rpb24gKCkgeyByZXR1cm4gbW9kdWxlIH1cbiAgICB9KVxuICAgIG9wdGlvbnMuY29tcHV0ZWQgPSBjb21wdXRlZFxuICB9XG5cbiAgcmV0dXJuIHtcbiAgICBlc01vZHVsZTogZXNNb2R1bGUsXG4gICAgZXhwb3J0czogc2NyaXB0RXhwb3J0cyxcbiAgICBvcHRpb25zOiBvcHRpb25zXG4gIH1cbn1cblxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vfi92dWUtbG9hZGVyL2xpYi9jb21wb25lbnQtbm9ybWFsaXplci5qc1xuLy8gbW9kdWxlIGlkID0gNlxuLy8gbW9kdWxlIGNodW5rcyA9IDAgMSAyIiwiPHRlbXBsYXRlPlxuXG4gIDxlbC10YWJsZVxuICAgIDpkYXRhPVwiZGF0YVwiXG4gICAgc3RyaXBlXG4gICAgc3R5bGU9XCJ3aWR0aDogMTAwJVwiPlxuICAgIDxlbC10YWJsZS1jb2x1bW5cbiAgICAgIHByb3A9XCJtb2RlbFwiXG4gICAgICBsYWJlbD1cIuWQjeensFwiPlxuICAgIDwvZWwtdGFibGUtY29sdW1uPlxuICAgIDxlbC10YWJsZS1jb2x1bW5cbiAgICAgIHByb3A9XCJjYXRlZ29yeVwiXG4gICAgICBsYWJlbD1cIuexu+Wei1wiPlxuICAgIDwvZWwtdGFibGUtY29sdW1uPlxuICAgIDxlbC10YWJsZS1jb2x1bW5cbiAgICAgIHByb3A9XCJicmFuZFwiXG4gICAgICBsYWJlbD1cIuWTgeeJjFwiXG4gICAgICA+XG4gICAgICA8IS0tIDx0ZW1wbGF0ZSBzY29wZT1cInNjb3BlXCI+XG4gICAgICAgIDxlbC10YWdcbiAgICAgICAgICB0eXBlPSdwcmltYXJ5J1xuICAgICAgICAgIGNsb3NlLXRyYW5zaXRpb24+e3tzY29wZS5yb3cudGFnfX08L2VsLXRhZz5cbiAgICAgIDwvdGVtcGxhdGU+IC0tPlxuICAgIDwvZWwtdGFibGUtY29sdW1uPlxuICAgIDxlbC10YWJsZS1jb2x1bW5cbiAgICAgIHByb3A9XCJmYWN0b3J5X3NlcmlhbF9udW1iZXJcIlxuICAgICAgbGFiZWw9XCLluo/liJflj7dcIj5cbiAgICA8L2VsLXRhYmxlLWNvbHVtbj5cbiAgICA8ZWwtdGFibGUtY29sdW1uXG4gICAgICBwcm9wPVwicmVtYWluX2Ftb3VudFwiXG4gICAgICBsYWJlbD1cIuWJqeS9meaVsOmHj1wiXG4gICAgICBzb3J0YWJsZT5cbiAgICA8L2VsLXRhYmxlLWNvbHVtbj5cbiAgICA8ZWwtdGFibGUtY29sdW1uXG4gICAgICBsYWJlbD1cIlwiXG4gICAgICB3aWR0aD1cIjEwMFwiPlxuICAgICAgPHRlbXBsYXRlIHNjb3BlPVwic2NvcGVcIj5cbiAgICAgICAgPGVsLWJ1dHRvbiB0eXBlPVwidGV4dFwiIHNpemU9XCJzbWFsbFwiPuafpeecizwvZWwtYnV0dG9uPlxuICAgICAgICA8ZWwtYnV0dG9uIHR5cGU9XCJ0ZXh0XCIgc2l6ZT1cInNtYWxsXCI+57yW6L6RPC9lbC1idXR0b24+XG4gICAgICA8L3RlbXBsYXRlPlxuICAgIDwvZWwtdGFibGUtY29sdW1uPlxuICA8L2VsLXRhYmxlPlxuPC90ZW1wbGF0ZT5cblxuPHNjcmlwdD5cbiAgLy8gaW1wb3J0IHN0b2NrT3ZlcnZpZXdUYWJsZSBmcm9tICcuL3N0b2NrT3ZlcnZpZXdUYWJsZS52dWUnXG4gIGV4cG9ydCBkZWZhdWx0IHtcbiAgICBwcm9wczogWydkYXRhc291cmNlJ10sXG4gICAgLy8gY29tcG9uZW50czoge1xuICAgIC8vICAgJ3RhYmxlLW92ZXJ2aWV3Jzogc3RvY2tPdmVydmlld1RhYmxlXG4gICAgLy8gfSxcbiAgICBkYXRhICgpIHtcbiAgICAgIHJldHVybiB7XG4gICAgICAgICBkYXRhOltcbiAgICAgICAgICAge1wic3RvY2tfaWRcIjoxLFwibW9kZWxcIjpcIjg0Mi1BNVwiLFwiY2F0ZWdvcnlcIjpcIlxcdTZjMzRcXHU2Y2Y1XCIsXCJicmFuZFwiOlwiQ1JJXCIsXCJvcmlnaW5fc2VyaWFsX251bWJlclwiOlwiMmtkNTM3cmtcIixcImZhY3Rvcnlfc2VyaWFsX251bWJlclwiOlwidmpoa1wiLFwicmVtYWluX2Ftb3VudFwiOjE4fSxcbiAgICAgICAgICAge1wic3RvY2tfaWRcIjoyLFwibW9kZWxcIjpcIjY0Qy01MFwiLFwiY2F0ZWdvcnlcIjpcIlxcdTZjMzRcXHU2Y2Y1XCIsXCJicmFuZFwiOlwiRjNcIixcIm9yaWdpbl9zZXJpYWxfbnVtYmVyXCI6XCI1Nnl0clwiLFwiZmFjdG9yeV9zZXJpYWxfbnVtYmVyXCI6XCJ5OGdvaHV2a2pcIixcInJlbWFpbl9hbW91bnRcIjo0N31dXG4gICAgICAgICAgLy8gIHtcInN0b2NrX2lkXCI6MyxcIm1vZGVsXCI6XCJDRjk0MDBcIixcImNhdGVnb3J5XCI6XCJcXHU1MzhiXFx1N2YyOVxcdTY3M2FcIixcImJyYW5kXCI6XCJTSUtFXCIsXCJvcmlnaW5fc2VyaWFsX251bWJlclwiOlwiZndndWl2a2pqdnI4OTNcIixcImZhY3Rvcnlfc2VyaWFsX251bWJlclwiOlwiN3I2dHk4b3VpXCIsXCJyZW1haW5fYW1vdW50XCI6M30sXG4gICAgICAgICAgLy8gIHtcInN0b2NrX2lkXCI6NCxcIm1vZGVsXCI6XCJDRjYxMDBcIixcImNhdGVnb3J5XCI6XCJcXHU1MzhiXFx1N2YyOVxcdTY3M2FcIixcImJyYW5kXCI6XCJTSUtFXCIsXCJvcmlnaW5fc2VyaWFsX251bWJlclwiOlwiNnI4dDdpb2dqa3JoY3NcIixcImZhY3Rvcnlfc2VyaWFsX251bWJlclwiOlwiOXU4eTdpdHVcIixcInJlbWFpbl9hbW91bnRcIjo4M31dXG4gICAgICAgIC8vICBvcHRpb25zOiBbe1xuICAgICAgICAvLyAgICB2YWx1ZTogJ2NhdGVnb3J5JyxcbiAgICAgICAgLy8gICAgbGFiZWw6ICdjYXRlZ29yeScsXG4gICAgICAgIC8vICAgIGNoaWxkcmVuOiBbe1xuICAgICAgICAvLyAgICAgIHZhbHVlOiAnZmFjdG9yeV9zZXJpYWxfbnVtYmVyJyxcbiAgICAgICAgLy8gICAgICBsYWJlbDogJ25hbWUnXG4gICAgICAgIC8vICAgIH1dXG4gICAgICAgIC8vICB9XSxcbiAgICAgICB9XG4gICAgfSxcbiAgICBtZXRob2RzOiB7XG4gICAgICBmaWx0ZXJCcmFuZCh2YWx1ZSwgcm93KSB7XG4gICAgICAgIGNvbnNvbGUubG9nKHZhbHVlLCByb3cpXG4gICAgICAgIHJldHVybiByb3cuYnJhbmQgPT09IHZhbHVlO1xuICAgICAgfVxuICAgIH0sXG4gICAgY3JlYXRlZCgpIHtcbiAgICAgIGF4aW9zLmdldCh0aGlzLmRhdGFzb3VyY2UpXG4gICAgICAudGhlbihyZXNwb25zZSA9PiB7XG4gICAgICAgIC8vIEpTT04gcmVzcG9uc2VzIGFyZSBhdXRvbWF0aWNhbGx5IHBhcnNlZC5cbiAgICAgICAgdGhpcy5kYXRhID0gcmVzcG9uc2UuZGF0YVxuICAgICAgICBjb25zb2xlLmxvZyh0aGlzLmRhdGEpXG4gICAgICB9KVxuICAgICAgLmNhdGNoKGUgPT4ge1xuICAgICAgICBjb25zb2xlLmVycm9yKGUpXG4gICAgICB9KVxuICAgIH1cbiAgfVxuPC9zY3JpcHQ+XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gc3RvY2tPdmVydmlldy52dWU/Mzg5OTRiZjciXSwic291cmNlUm9vdCI6IiJ9