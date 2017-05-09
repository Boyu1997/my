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
/******/ 	return __webpack_require__(__webpack_require__.s = 114);
/******/ })
/************************************************************************/
/******/ ({

/***/ 106:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(7)(
  /* script */
  __webpack_require__(74),
  /* template */
  __webpack_require__(110),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "/Applications/MAMP/htdocs/my/resources/assets/js/components/addParts.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] addParts.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-5e51679f", Component.options)
  } else {
    hotAPI.reload("data-v-5e51679f", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 110:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('el-row', [_c('el-button', {
    nativeOn: {
      "click": function($event) {
        _vm.visible = true
      }
    }
  }, [_vm._v("添加零件")]), _vm._v(" "), _c('el-dialog', {
    attrs: {
      "title": "选择零件"
    },
    model: {
      value: (_vm.visible),
      callback: function($$v) {
        _vm.visible = $$v
      },
      expression: "visible"
    }
  }, [_c('form', {
    staticClass: "form-horizontal"
  }, [_c('div', {
    staticClass: "modal-body"
  }, [_c('div', {
    staticClass: "form-group"
  }, [_c('label', {
    staticClass: "col-sm-2 control-label",
    attrs: {
      "for": "stock_id"
    }
  }, [_vm._v("零件")]), _vm._v(" "), _c('div', {
    staticClass: "col-sm-10 col-md-9"
  }, [_c('select', {
    staticClass: "form-control",
    attrs: {
      "id": "stock_category"
    }
  }, [_c('option', {
    attrs: {
      "value": "0",
      "required": ""
    }
  }, [_vm._v("请选择分类")])]), _vm._v(" "), _c('select', {
    staticClass: "form-control",
    attrs: {
      "id": "stock_id"
    }
  }, [_c('option', {
    attrs: {
      "value": "0",
      "required": ""
    }
  }, [_vm._v("请选择零件")])]), _vm._v(" "), _c('div', {
    staticClass: "error stock_id_error"
  })]), _vm._v(" "), _c('label', {
    staticClass: "col-sm-2 control-label",
    attrs: {
      "for": "use_amount",
      "required": ""
    }
  }, [_vm._v("使用数量")]), _vm._v(" "), _c('div', {
    staticClass: "col-sm-10 col-md-9"
  }, [_c('input', {
    staticClass: "form-control",
    attrs: {
      "type": "number",
      "name": "use_amount",
      "id": "use_amount",
      "value": "",
      "placeholder": "请输入使用数量"
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "error use_amount_error"
  }), _vm._v(" "), _c('p', {
    staticClass: "text_after_iwnput"
  }, [_vm._v("没有您在找的零件 ？请与库管人员联系或联系网站管理员。")])])])])]), _vm._v(" "), _c('el-cascader', {
    attrs: {
      "placeholder": "搜索零件",
      "options": _vm.options,
      "filterable": ""
    }
  }), _vm._v(" "), _c('span', {
    staticClass: "dialog-footer",
    slot: "footer"
  }, [_c('el-button', {
    on: {
      "click": function($event) {
        _vm.visible = false
      }
    }
  }, [_vm._v("取消")]), _vm._v(" "), _c('el-button', {
    attrs: {
      "type": "primary",
      "id": "create_stock_submit"
    },
    on: {
      "click": function($event) {
        _vm.visible = false
      }
    }
  }, [_vm._v("确认")])], 1)], 1)], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-5e51679f", module.exports)
  }
}

/***/ }),

/***/ 114:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(32);


/***/ }),

/***/ 32:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_addParts_vue__ = __webpack_require__(106);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_addParts_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_addParts_vue__);


var addParts = new Vue({
  el: '#add-parts',
  components: {
    'add-parts': __WEBPACK_IMPORTED_MODULE_0__components_addParts_vue___default.a
  },
  template: "<add-parts :datasource='datasource'></add-parts>",
  data: {
    datasource: '/ajax/produce/create/getCreateStock'
  }
});

/***/ }),

/***/ 7:
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

/***/ 74:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['datasource'],
  data: function data() {
    return {
      visible: false,
      rawData: [{ "stock_id": 1, "model": "842-A5", "category": "\u6C34\u6CF5", "brand": "CRI", "origin_serial_number": "2kd537rk", "factory_serial_number": "vjhk", "remain_amount": 18 }, { "stock_id": 2, "model": "64C-50", "category": "\u6C34\u6CF5", "brand": "F3", "origin_serial_number": "56ytr", "factory_serial_number": "y8gohuvkj", "remain_amount": 47 }, { "stock_id": 3, "model": "CF9400", "category": "\u538B\u7F29\u673A", "brand": "SIKE", "origin_serial_number": "fwguivkjjvr893", "factory_serial_number": "7r6ty8oui", "remain_amount": 3 }, { "stock_id": 4, "model": "CF6100", "category": "\u538B\u7F29\u673A", "brand": "SIKE", "origin_serial_number": "6r8t7iogjkrhcs", "factory_serial_number": "9u8y7itu", "remain_amount": 83 }]
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

  computed: {
    options: function options() {
      var groupBy = function groupBy(xs, key) {
        return xs.reduce(function (rv, x) {
          (rv[x[key]] = rv[x[key]] || []).push(x);
          return rv;
        }, {});
      };
      var childrenKeyVal = function childrenKeyVal(d) {
        return d.reduce(function (ac, v) {
          ac.push({ label: v.model, value: v.stock_id });
          return ac;
        }, []);
      };
      var keyValue = function keyValue(d) {
        return Object.keys(d).reduce(function (ac, v) {
          ac.push({
            label: v,
            value: v,
            children: childrenKeyVal(d[v])
          });
          return ac;
        }, []);
      };
      return keyValue(groupBy(this.rawData, 'category'));
    }
  },
  created: function created() {
    var _this = this;

    axios.get(this.datasource).then(function (response) {
      // JSON responses are automatically parsed.
      _this.rawData = response.data;
      console.log(_this.rawData);
    }).catch(function (e) {
      console.error(e);
    });
  }
});

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgNmYzZDJlMzRhOTBkZjQ0ZTRhOTI/OGY5ZCIsIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvYWRkUGFydHMudnVlIiwid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9hZGRQYXJ0cy52dWU/MjkzYSIsIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2pzL2NyZWF0ZVByb2R1Y2UuanMiLCJ3ZWJwYWNrOi8vLy4vfi92dWUtbG9hZGVyL2xpYi9jb21wb25lbnQtbm9ybWFsaXplci5qcz9kNGYzIiwid2VicGFjazovLy9hZGRQYXJ0cy52dWUiXSwibmFtZXMiOlsiYWRkUGFydHMiLCJWdWUiLCJlbCIsImNvbXBvbmVudHMiLCJBZGRQYXJ0cyIsInRlbXBsYXRlIiwiZGF0YSIsImRhdGFzb3VyY2UiXSwibWFwcGluZ3MiOiI7QUFBQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOzs7QUFHQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQSxtREFBMkMsY0FBYzs7QUFFekQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxtQ0FBMkIsMEJBQTBCLEVBQUU7QUFDdkQseUNBQWlDLGVBQWU7QUFDaEQ7QUFDQTtBQUNBOztBQUVBO0FBQ0EsOERBQXNELCtEQUErRDs7QUFFckg7QUFDQTs7QUFFQTtBQUNBOzs7Ozs7OztBQ2hFQTtBQUNBO0FBQ0Esd0JBQXFKO0FBQ3JKO0FBQ0EseUJBQXlHO0FBQ3pHO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLCtFQUErRSxpREFBaUQsSUFBSTtBQUNwSSxtQ0FBbUM7O0FBRW5DO0FBQ0EsWUFBaUI7QUFDakI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQSxDQUFDOztBQUVEOzs7Ozs7OztBQzNCQSxnQkFBZ0IsbUJBQW1CLGFBQWEsMEJBQTBCO0FBQzFFO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQSxHQUFHO0FBQ0g7QUFDQSxHQUFHO0FBQ0g7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0EsR0FBRztBQUNIO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNILENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDOzs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FDM0dBOztBQUVBLElBQU1BLFdBQVcsSUFBSUMsR0FBSixDQUFRO0FBQ3ZCQyxNQUFJLFlBRG1CO0FBRXZCQyxjQUFZO0FBQ1osaUJBQWEsZ0VBQUFDO0FBREQsR0FGVztBQUt2QkMsWUFBVSxrREFMYTtBQU12QkMsUUFBTTtBQUNKQyxnQkFBWTtBQURSO0FBTmlCLENBQVIsQ0FBakIsQzs7Ozs7OztBQ0ZBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsbUNBQW1DO0FBQ25DLEtBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQ2RBO1VBRUE7d0JBQ0E7O2VBRUE7ZUFDQSx1S0FDQSw2S0FDQSw4TEFDQSw0TEFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUE7QUFmQTtBQWdCQTs7O2dDQUVBOzhDQUNBOzBDQUNBOytDQUNBO2lCQUNBO1dBQ0E7QUFDQTtzREFDQTt5Q0FDQTs2Q0FDQTtpQkFDQTtXQUNBO0FBQ0E7MENBQ0E7c0RBQ0E7O21CQUVBO21CQUNBO3VDQUVBO0FBSkE7aUJBS0E7V0FDQTtBQUNBOzRDQUNBO0FBRUE7QUExQkE7O0FBMkJBOzttQkFDQSxxQ0FDQTtBQUNBOytCQUNBO3dCQUNBO0FBQ0EsMEJBQ0E7b0JBQ0E7QUFDQTtBQUNBO0FBekRBLEciLCJmaWxlIjoiL2pzL2NyZWF0ZVByb2R1Y2UuanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSlcbiBcdFx0XHRyZXR1cm4gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0uZXhwb3J0cztcblxuIFx0XHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuIFx0XHR2YXIgbW9kdWxlID0gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0gPSB7XG4gXHRcdFx0aTogbW9kdWxlSWQsXG4gXHRcdFx0bDogZmFsc2UsXG4gXHRcdFx0ZXhwb3J0czoge31cbiBcdFx0fTtcblxuIFx0XHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cbiBcdFx0bW9kdWxlc1ttb2R1bGVJZF0uY2FsbChtb2R1bGUuZXhwb3J0cywgbW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cbiBcdFx0Ly8gRmxhZyB0aGUgbW9kdWxlIGFzIGxvYWRlZFxuIFx0XHRtb2R1bGUubCA9IHRydWU7XG5cbiBcdFx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcbiBcdFx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xuIFx0fVxuXG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlcyBvYmplY3QgKF9fd2VicGFja19tb2R1bGVzX18pXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm0gPSBtb2R1bGVzO1xuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZSBjYWNoZVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5jID0gaW5zdGFsbGVkTW9kdWxlcztcblxuIFx0Ly8gaWRlbnRpdHkgZnVuY3Rpb24gZm9yIGNhbGxpbmcgaGFybW9ueSBpbXBvcnRzIHdpdGggdGhlIGNvcnJlY3QgY29udGV4dFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5pID0gZnVuY3Rpb24odmFsdWUpIHsgcmV0dXJuIHZhbHVlOyB9O1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCJcIjtcblxuIFx0Ly8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4gXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhfX3dlYnBhY2tfcmVxdWlyZV9fLnMgPSAxMTQpO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHdlYnBhY2svYm9vdHN0cmFwIDZmM2QyZTM0YTkwZGY0NGU0YTkyIiwidmFyIENvbXBvbmVudCA9IHJlcXVpcmUoXCIhLi4vLi4vLi4vLi4vbm9kZV9tb2R1bGVzL3Z1ZS1sb2FkZXIvbGliL2NvbXBvbmVudC1ub3JtYWxpemVyXCIpKFxuICAvKiBzY3JpcHQgKi9cbiAgcmVxdWlyZShcIiEhYmFiZWwtbG9hZGVyP3tcXFwiY2FjaGVEaXJlY3RvcnlcXFwiOnRydWUsXFxcInByZXNldHNcXFwiOltbXFxcImVudlxcXCIse1xcXCJtb2R1bGVzXFxcIjpmYWxzZSxcXFwidGFyZ2V0c1xcXCI6e1xcXCJicm93c2Vyc1xcXCI6W1xcXCI+IDIlXFxcIl0sXFxcInVnbGlmeVxcXCI6dHJ1ZX19XV19IS4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvcj90eXBlPXNjcmlwdCZpbmRleD0wIS4vYWRkUGFydHMudnVlXCIpLFxuICAvKiB0ZW1wbGF0ZSAqL1xuICByZXF1aXJlKFwiISEuLi8uLi8uLi8uLi9ub2RlX21vZHVsZXMvdnVlLWxvYWRlci9saWIvdGVtcGxhdGUtY29tcGlsZXIvaW5kZXg/e1xcXCJpZFxcXCI6XFxcImRhdGEtdi01ZTUxNjc5ZlxcXCJ9IS4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvcj90eXBlPXRlbXBsYXRlJmluZGV4PTAhLi9hZGRQYXJ0cy52dWVcIiksXG4gIC8qIHNjb3BlSWQgKi9cbiAgbnVsbCxcbiAgLyogY3NzTW9kdWxlcyAqL1xuICBudWxsXG4pXG5Db21wb25lbnQub3B0aW9ucy5fX2ZpbGUgPSBcIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvbXkvcmVzb3VyY2VzL2Fzc2V0cy9qcy9jb21wb25lbnRzL2FkZFBhcnRzLnZ1ZVwiXG5pZiAoQ29tcG9uZW50LmVzTW9kdWxlICYmIE9iamVjdC5rZXlzKENvbXBvbmVudC5lc01vZHVsZSkuc29tZShmdW5jdGlvbiAoa2V5KSB7cmV0dXJuIGtleSAhPT0gXCJkZWZhdWx0XCIgJiYga2V5ICE9PSBcIl9fZXNNb2R1bGVcIn0pKSB7Y29uc29sZS5lcnJvcihcIm5hbWVkIGV4cG9ydHMgYXJlIG5vdCBzdXBwb3J0ZWQgaW4gKi52dWUgZmlsZXMuXCIpfVxuaWYgKENvbXBvbmVudC5vcHRpb25zLmZ1bmN0aW9uYWwpIHtjb25zb2xlLmVycm9yKFwiW3Z1ZS1sb2FkZXJdIGFkZFBhcnRzLnZ1ZTogZnVuY3Rpb25hbCBjb21wb25lbnRzIGFyZSBub3Qgc3VwcG9ydGVkIHdpdGggdGVtcGxhdGVzLCB0aGV5IHNob3VsZCB1c2UgcmVuZGVyIGZ1bmN0aW9ucy5cIil9XG5cbi8qIGhvdCByZWxvYWQgKi9cbmlmIChtb2R1bGUuaG90KSB7KGZ1bmN0aW9uICgpIHtcbiAgdmFyIGhvdEFQSSA9IHJlcXVpcmUoXCJ2dWUtaG90LXJlbG9hZC1hcGlcIilcbiAgaG90QVBJLmluc3RhbGwocmVxdWlyZShcInZ1ZVwiKSwgZmFsc2UpXG4gIGlmICghaG90QVBJLmNvbXBhdGlibGUpIHJldHVyblxuICBtb2R1bGUuaG90LmFjY2VwdCgpXG4gIGlmICghbW9kdWxlLmhvdC5kYXRhKSB7XG4gICAgaG90QVBJLmNyZWF0ZVJlY29yZChcImRhdGEtdi01ZTUxNjc5ZlwiLCBDb21wb25lbnQub3B0aW9ucylcbiAgfSBlbHNlIHtcbiAgICBob3RBUEkucmVsb2FkKFwiZGF0YS12LTVlNTE2NzlmXCIsIENvbXBvbmVudC5vcHRpb25zKVxuICB9XG59KSgpfVxuXG5tb2R1bGUuZXhwb3J0cyA9IENvbXBvbmVudC5leHBvcnRzXG5cblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9hZGRQYXJ0cy52dWVcbi8vIG1vZHVsZSBpZCA9IDEwNlxuLy8gbW9kdWxlIGNodW5rcyA9IDEiLCJtb2R1bGUuZXhwb3J0cz17cmVuZGVyOmZ1bmN0aW9uICgpe3ZhciBfdm09dGhpczt2YXIgX2g9X3ZtLiRjcmVhdGVFbGVtZW50O3ZhciBfYz1fdm0uX3NlbGYuX2N8fF9oO1xuICByZXR1cm4gX2MoJ2VsLXJvdycsIFtfYygnZWwtYnV0dG9uJywge1xuICAgIG5hdGl2ZU9uOiB7XG4gICAgICBcImNsaWNrXCI6IGZ1bmN0aW9uKCRldmVudCkge1xuICAgICAgICBfdm0udmlzaWJsZSA9IHRydWVcbiAgICAgIH1cbiAgICB9XG4gIH0sIFtfdm0uX3YoXCLmt7vliqDpm7bku7ZcIildKSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLWRpYWxvZycsIHtcbiAgICBhdHRyczoge1xuICAgICAgXCJ0aXRsZVwiOiBcIumAieaLqembtuS7tlwiXG4gICAgfSxcbiAgICBtb2RlbDoge1xuICAgICAgdmFsdWU6IChfdm0udmlzaWJsZSksXG4gICAgICBjYWxsYmFjazogZnVuY3Rpb24oJCR2KSB7XG4gICAgICAgIF92bS52aXNpYmxlID0gJCR2XG4gICAgICB9LFxuICAgICAgZXhwcmVzc2lvbjogXCJ2aXNpYmxlXCJcbiAgICB9XG4gIH0sIFtfYygnZm9ybScsIHtcbiAgICBzdGF0aWNDbGFzczogXCJmb3JtLWhvcml6b250YWxcIlxuICB9LCBbX2MoJ2RpdicsIHtcbiAgICBzdGF0aWNDbGFzczogXCJtb2RhbC1ib2R5XCJcbiAgfSwgW19jKCdkaXYnLCB7XG4gICAgc3RhdGljQ2xhc3M6IFwiZm9ybS1ncm91cFwiXG4gIH0sIFtfYygnbGFiZWwnLCB7XG4gICAgc3RhdGljQ2xhc3M6IFwiY29sLXNtLTIgY29udHJvbC1sYWJlbFwiLFxuICAgIGF0dHJzOiB7XG4gICAgICBcImZvclwiOiBcInN0b2NrX2lkXCJcbiAgICB9XG4gIH0sIFtfdm0uX3YoXCLpm7bku7ZcIildKSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2RpdicsIHtcbiAgICBzdGF0aWNDbGFzczogXCJjb2wtc20tMTAgY29sLW1kLTlcIlxuICB9LCBbX2MoJ3NlbGVjdCcsIHtcbiAgICBzdGF0aWNDbGFzczogXCJmb3JtLWNvbnRyb2xcIixcbiAgICBhdHRyczoge1xuICAgICAgXCJpZFwiOiBcInN0b2NrX2NhdGVnb3J5XCJcbiAgICB9XG4gIH0sIFtfYygnb3B0aW9uJywge1xuICAgIGF0dHJzOiB7XG4gICAgICBcInZhbHVlXCI6IFwiMFwiLFxuICAgICAgXCJyZXF1aXJlZFwiOiBcIlwiXG4gICAgfVxuICB9LCBbX3ZtLl92KFwi6K+36YCJ5oup5YiG57G7XCIpXSldKSwgX3ZtLl92KFwiIFwiKSwgX2MoJ3NlbGVjdCcsIHtcbiAgICBzdGF0aWNDbGFzczogXCJmb3JtLWNvbnRyb2xcIixcbiAgICBhdHRyczoge1xuICAgICAgXCJpZFwiOiBcInN0b2NrX2lkXCJcbiAgICB9XG4gIH0sIFtfYygnb3B0aW9uJywge1xuICAgIGF0dHJzOiB7XG4gICAgICBcInZhbHVlXCI6IFwiMFwiLFxuICAgICAgXCJyZXF1aXJlZFwiOiBcIlwiXG4gICAgfVxuICB9LCBbX3ZtLl92KFwi6K+36YCJ5oup6Zu25Lu2XCIpXSldKSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2RpdicsIHtcbiAgICBzdGF0aWNDbGFzczogXCJlcnJvciBzdG9ja19pZF9lcnJvclwiXG4gIH0pXSksIF92bS5fdihcIiBcIiksIF9jKCdsYWJlbCcsIHtcbiAgICBzdGF0aWNDbGFzczogXCJjb2wtc20tMiBjb250cm9sLWxhYmVsXCIsXG4gICAgYXR0cnM6IHtcbiAgICAgIFwiZm9yXCI6IFwidXNlX2Ftb3VudFwiLFxuICAgICAgXCJyZXF1aXJlZFwiOiBcIlwiXG4gICAgfVxuICB9LCBbX3ZtLl92KFwi5L2/55So5pWw6YePXCIpXSksIF92bS5fdihcIiBcIiksIF9jKCdkaXYnLCB7XG4gICAgc3RhdGljQ2xhc3M6IFwiY29sLXNtLTEwIGNvbC1tZC05XCJcbiAgfSwgW19jKCdpbnB1dCcsIHtcbiAgICBzdGF0aWNDbGFzczogXCJmb3JtLWNvbnRyb2xcIixcbiAgICBhdHRyczoge1xuICAgICAgXCJ0eXBlXCI6IFwibnVtYmVyXCIsXG4gICAgICBcIm5hbWVcIjogXCJ1c2VfYW1vdW50XCIsXG4gICAgICBcImlkXCI6IFwidXNlX2Ftb3VudFwiLFxuICAgICAgXCJ2YWx1ZVwiOiBcIlwiLFxuICAgICAgXCJwbGFjZWhvbGRlclwiOiBcIuivt+i+k+WFpeS9v+eUqOaVsOmHj1wiXG4gICAgfVxuICB9KSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2RpdicsIHtcbiAgICBzdGF0aWNDbGFzczogXCJlcnJvciB1c2VfYW1vdW50X2Vycm9yXCJcbiAgfSksIF92bS5fdihcIiBcIiksIF9jKCdwJywge1xuICAgIHN0YXRpY0NsYXNzOiBcInRleHRfYWZ0ZXJfaXducHV0XCJcbiAgfSwgW192bS5fdihcIuayoeacieaCqOWcqOaJvueahOmbtuS7tiDvvJ/or7fkuI7lupPnrqHkurrlkZjogZTns7vmiJbogZTns7vnvZHnq5nnrqHnkIblkZjjgIJcIildKV0pXSldKV0pLCBfdm0uX3YoXCIgXCIpLCBfYygnZWwtY2FzY2FkZXInLCB7XG4gICAgYXR0cnM6IHtcbiAgICAgIFwicGxhY2Vob2xkZXJcIjogXCLmkJzntKLpm7bku7ZcIixcbiAgICAgIFwib3B0aW9uc1wiOiBfdm0ub3B0aW9ucyxcbiAgICAgIFwiZmlsdGVyYWJsZVwiOiBcIlwiXG4gICAgfVxuICB9KSwgX3ZtLl92KFwiIFwiKSwgX2MoJ3NwYW4nLCB7XG4gICAgc3RhdGljQ2xhc3M6IFwiZGlhbG9nLWZvb3RlclwiLFxuICAgIHNsb3Q6IFwiZm9vdGVyXCJcbiAgfSwgW19jKCdlbC1idXR0b24nLCB7XG4gICAgb246IHtcbiAgICAgIFwiY2xpY2tcIjogZnVuY3Rpb24oJGV2ZW50KSB7XG4gICAgICAgIF92bS52aXNpYmxlID0gZmFsc2VcbiAgICAgIH1cbiAgICB9XG4gIH0sIFtfdm0uX3YoXCLlj5bmtohcIildKSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLWJ1dHRvbicsIHtcbiAgICBhdHRyczoge1xuICAgICAgXCJ0eXBlXCI6IFwicHJpbWFyeVwiLFxuICAgICAgXCJpZFwiOiBcImNyZWF0ZV9zdG9ja19zdWJtaXRcIlxuICAgIH0sXG4gICAgb246IHtcbiAgICAgIFwiY2xpY2tcIjogZnVuY3Rpb24oJGV2ZW50KSB7XG4gICAgICAgIF92bS52aXNpYmxlID0gZmFsc2VcbiAgICAgIH1cbiAgICB9XG4gIH0sIFtfdm0uX3YoXCLnoa7orqRcIildKV0sIDEpXSwgMSldLCAxKVxufSxzdGF0aWNSZW5kZXJGbnM6IFtdfVxubW9kdWxlLmV4cG9ydHMucmVuZGVyLl93aXRoU3RyaXBwZWQgPSB0cnVlXG5pZiAobW9kdWxlLmhvdCkge1xuICBtb2R1bGUuaG90LmFjY2VwdCgpXG4gIGlmIChtb2R1bGUuaG90LmRhdGEpIHtcbiAgICAgcmVxdWlyZShcInZ1ZS1ob3QtcmVsb2FkLWFwaVwiKS5yZXJlbmRlcihcImRhdGEtdi01ZTUxNjc5ZlwiLCBtb2R1bGUuZXhwb3J0cylcbiAgfVxufVxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vfi92dWUtbG9hZGVyL2xpYi90ZW1wbGF0ZS1jb21waWxlcj97XCJpZFwiOlwiZGF0YS12LTVlNTE2NzlmXCJ9IS4vfi92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvci5qcz90eXBlPXRlbXBsYXRlJmluZGV4PTAhLi9yZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvYWRkUGFydHMudnVlXG4vLyBtb2R1bGUgaWQgPSAxMTBcbi8vIG1vZHVsZSBjaHVua3MgPSAxIiwiaW1wb3J0IEFkZFBhcnRzIGZyb20gJy4vY29tcG9uZW50cy9hZGRQYXJ0cy52dWUnXG5cbmNvbnN0IGFkZFBhcnRzID0gbmV3IFZ1ZSh7XG4gIGVsOiAnI2FkZC1wYXJ0cycsXG4gIGNvbXBvbmVudHM6IHtcbiAgJ2FkZC1wYXJ0cyc6IEFkZFBhcnRzXG4gIH0sXG4gIHRlbXBsYXRlOiBcIjxhZGQtcGFydHMgOmRhdGFzb3VyY2U9J2RhdGFzb3VyY2UnPjwvYWRkLXBhcnRzPlwiLFxuICBkYXRhOiB7XG4gICAgZGF0YXNvdXJjZTogJy9hamF4L3Byb2R1Y2UvY3JlYXRlL2dldENyZWF0ZVN0b2NrJ1xuICB9XG59KVxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIC4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9jcmVhdGVQcm9kdWNlLmpzIiwiLy8gdGhpcyBtb2R1bGUgaXMgYSBydW50aW1lIHV0aWxpdHkgZm9yIGNsZWFuZXIgY29tcG9uZW50IG1vZHVsZSBvdXRwdXQgYW5kIHdpbGxcbi8vIGJlIGluY2x1ZGVkIGluIHRoZSBmaW5hbCB3ZWJwYWNrIHVzZXIgYnVuZGxlXG5cbm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24gbm9ybWFsaXplQ29tcG9uZW50IChcbiAgcmF3U2NyaXB0RXhwb3J0cyxcbiAgY29tcGlsZWRUZW1wbGF0ZSxcbiAgc2NvcGVJZCxcbiAgY3NzTW9kdWxlc1xuKSB7XG4gIHZhciBlc01vZHVsZVxuICB2YXIgc2NyaXB0RXhwb3J0cyA9IHJhd1NjcmlwdEV4cG9ydHMgPSByYXdTY3JpcHRFeHBvcnRzIHx8IHt9XG5cbiAgLy8gRVM2IG1vZHVsZXMgaW50ZXJvcFxuICB2YXIgdHlwZSA9IHR5cGVvZiByYXdTY3JpcHRFeHBvcnRzLmRlZmF1bHRcbiAgaWYgKHR5cGUgPT09ICdvYmplY3QnIHx8IHR5cGUgPT09ICdmdW5jdGlvbicpIHtcbiAgICBlc01vZHVsZSA9IHJhd1NjcmlwdEV4cG9ydHNcbiAgICBzY3JpcHRFeHBvcnRzID0gcmF3U2NyaXB0RXhwb3J0cy5kZWZhdWx0XG4gIH1cblxuICAvLyBWdWUuZXh0ZW5kIGNvbnN0cnVjdG9yIGV4cG9ydCBpbnRlcm9wXG4gIHZhciBvcHRpb25zID0gdHlwZW9mIHNjcmlwdEV4cG9ydHMgPT09ICdmdW5jdGlvbidcbiAgICA/IHNjcmlwdEV4cG9ydHMub3B0aW9uc1xuICAgIDogc2NyaXB0RXhwb3J0c1xuXG4gIC8vIHJlbmRlciBmdW5jdGlvbnNcbiAgaWYgKGNvbXBpbGVkVGVtcGxhdGUpIHtcbiAgICBvcHRpb25zLnJlbmRlciA9IGNvbXBpbGVkVGVtcGxhdGUucmVuZGVyXG4gICAgb3B0aW9ucy5zdGF0aWNSZW5kZXJGbnMgPSBjb21waWxlZFRlbXBsYXRlLnN0YXRpY1JlbmRlckZuc1xuICB9XG5cbiAgLy8gc2NvcGVkSWRcbiAgaWYgKHNjb3BlSWQpIHtcbiAgICBvcHRpb25zLl9zY29wZUlkID0gc2NvcGVJZFxuICB9XG5cbiAgLy8gaW5qZWN0IGNzc01vZHVsZXNcbiAgaWYgKGNzc01vZHVsZXMpIHtcbiAgICB2YXIgY29tcHV0ZWQgPSBPYmplY3QuY3JlYXRlKG9wdGlvbnMuY29tcHV0ZWQgfHwgbnVsbClcbiAgICBPYmplY3Qua2V5cyhjc3NNb2R1bGVzKS5mb3JFYWNoKGZ1bmN0aW9uIChrZXkpIHtcbiAgICAgIHZhciBtb2R1bGUgPSBjc3NNb2R1bGVzW2tleV1cbiAgICAgIGNvbXB1dGVkW2tleV0gPSBmdW5jdGlvbiAoKSB7IHJldHVybiBtb2R1bGUgfVxuICAgIH0pXG4gICAgb3B0aW9ucy5jb21wdXRlZCA9IGNvbXB1dGVkXG4gIH1cblxuICByZXR1cm4ge1xuICAgIGVzTW9kdWxlOiBlc01vZHVsZSxcbiAgICBleHBvcnRzOiBzY3JpcHRFeHBvcnRzLFxuICAgIG9wdGlvbnM6IG9wdGlvbnNcbiAgfVxufVxuXG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9+L3Z1ZS1sb2FkZXIvbGliL2NvbXBvbmVudC1ub3JtYWxpemVyLmpzXG4vLyBtb2R1bGUgaWQgPSA3XG4vLyBtb2R1bGUgY2h1bmtzID0gMCAxIiwiPHRlbXBsYXRlPlxuICA8ZWwtcm93PlxuICAgIDxlbC1idXR0b24gQGNsaWNrLm5hdGl2ZT1cInZpc2libGUgPSB0cnVlXCI+5re75Yqg6Zu25Lu2PC9lbC1idXR0b24+XG4gICAgPGVsLWRpYWxvZyB2LW1vZGVsPVwidmlzaWJsZVwiIHRpdGxlPVwi6YCJ5oup6Zu25Lu2XCI+XG4gICAgICAgICAgICAgICAgICA8Zm9ybSBjbGFzcz1cImZvcm0taG9yaXpvbnRhbFwiPlxuICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJtb2RhbC1ib2R5XCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJmb3JtLWdyb3VwXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8bGFiZWwgZm9yPVwic3RvY2tfaWRcIiBjbGFzcz1cImNvbC1zbS0yIGNvbnRyb2wtbGFiZWxcIj7pm7bku7Y8L2xhYmVsPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImNvbC1zbS0xMCBjb2wtbWQtOVwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxzZWxlY3QgY2xhc3MgPSBcImZvcm0tY29udHJvbFwiIGlkPVwic3RvY2tfY2F0ZWdvcnlcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPG9wdGlvbiB2YWx1ZT0nMCcgcmVxdWlyZWQ+6K+36YCJ5oup5YiG57G7PC9vcHRpb24+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zZWxlY3Q+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHNlbGVjdCBjbGFzcyA9IFwiZm9ybS1jb250cm9sXCIgaWQ9XCJzdG9ja19pZFwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8b3B0aW9uIHZhbHVlPScwJyByZXF1aXJlZD7or7fpgInmi6npm7bku7Y8L29wdGlvbj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L3NlbGVjdD5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPVwiZXJyb3Igc3RvY2tfaWRfZXJyb3JcIj48L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGxhYmVsIGZvcj1cInVzZV9hbW91bnRcIiBjbGFzcz1cImNvbC1zbS0yIGNvbnRyb2wtbGFiZWxcIiByZXF1aXJlZD7kvb/nlKjmlbDph488L2xhYmVsPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImNvbC1zbS0xMCBjb2wtbWQtOVwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxpbnB1dCB0eXBlPVwibnVtYmVyXCIgY2xhc3M9XCJmb3JtLWNvbnRyb2xcIiBuYW1lPVwidXNlX2Ftb3VudFwiIGlkPVwidXNlX2Ftb3VudFwiIHZhbHVlPVwiXCIgcGxhY2Vob2xkZXI9XCLor7fovpPlhaXkvb/nlKjmlbDph49cIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPVwiZXJyb3IgdXNlX2Ftb3VudF9lcnJvclwiPjwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwIGNsYXNzPVwidGV4dF9hZnRlcl9pd25wdXRcIj7msqHmnInmgqjlnKjmib7nmoTpm7bku7Yg77yf6K+35LiO5bqT566h5Lq65ZGY6IGU57O75oiW6IGU57O7572R56uZ566h55CG5ZGY44CCPC9wPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgPC9mb3JtPlxuICAgICAgICA8ZWwtY2FzY2FkZXIgcGxhY2Vob2xkZXI9XCLmkJzntKLpm7bku7ZcIiA6b3B0aW9ucz1cIm9wdGlvbnNcIiBmaWx0ZXJhYmxlID48L2VsLWNhc2NhZGVyPlxuICAgICAgICA8c3BhbiBzbG90PVwiZm9vdGVyXCIgY2xhc3M9XCJkaWFsb2ctZm9vdGVyXCI+XG4gICAgICAgICAgPGVsLWJ1dHRvbiBAY2xpY2s9XCJ2aXNpYmxlID0gZmFsc2VcIj7lj5bmtog8L2VsLWJ1dHRvbj5cbiAgICAgICAgICA8ZWwtYnV0dG9uIHR5cGU9XCJwcmltYXJ5XCIgQGNsaWNrPVwidmlzaWJsZSA9IGZhbHNlXCIgaWQ9XCJjcmVhdGVfc3RvY2tfc3VibWl0XCI+56Gu6K6kPC9lbC1idXR0b24+XG4gICAgICAgIDwvc3Bhbj5cbiAgICA8L2VsLWRpYWxvZz5cbiA8L2VsLXJvdz5cbjwvdGVtcGxhdGU+XG5cbjxzY3JpcHQ+XG4gIGV4cG9ydCBkZWZhdWx0IHtcbiAgICBwcm9wczogWydkYXRhc291cmNlJ10sXG4gICAgZGF0YSAoKSB7XG4gICAgICByZXR1cm4ge1xuICAgICAgICAgdmlzaWJsZTogZmFsc2UsXG4gICAgICAgICByYXdEYXRhOltcbiAgICAgICAgICAge1wic3RvY2tfaWRcIjoxLFwibW9kZWxcIjpcIjg0Mi1BNVwiLFwiY2F0ZWdvcnlcIjpcIlxcdTZjMzRcXHU2Y2Y1XCIsXCJicmFuZFwiOlwiQ1JJXCIsXCJvcmlnaW5fc2VyaWFsX251bWJlclwiOlwiMmtkNTM3cmtcIixcImZhY3Rvcnlfc2VyaWFsX251bWJlclwiOlwidmpoa1wiLFwicmVtYWluX2Ftb3VudFwiOjE4fSxcbiAgICAgICAgICAge1wic3RvY2tfaWRcIjoyLFwibW9kZWxcIjpcIjY0Qy01MFwiLFwiY2F0ZWdvcnlcIjpcIlxcdTZjMzRcXHU2Y2Y1XCIsXCJicmFuZFwiOlwiRjNcIixcIm9yaWdpbl9zZXJpYWxfbnVtYmVyXCI6XCI1Nnl0clwiLFwiZmFjdG9yeV9zZXJpYWxfbnVtYmVyXCI6XCJ5OGdvaHV2a2pcIixcInJlbWFpbl9hbW91bnRcIjo0N30sXG4gICAgICAgICAgIHtcInN0b2NrX2lkXCI6MyxcIm1vZGVsXCI6XCJDRjk0MDBcIixcImNhdGVnb3J5XCI6XCJcXHU1MzhiXFx1N2YyOVxcdTY3M2FcIixcImJyYW5kXCI6XCJTSUtFXCIsXCJvcmlnaW5fc2VyaWFsX251bWJlclwiOlwiZndndWl2a2pqdnI4OTNcIixcImZhY3Rvcnlfc2VyaWFsX251bWJlclwiOlwiN3I2dHk4b3VpXCIsXCJyZW1haW5fYW1vdW50XCI6M30sXG4gICAgICAgICAgIHtcInN0b2NrX2lkXCI6NCxcIm1vZGVsXCI6XCJDRjYxMDBcIixcImNhdGVnb3J5XCI6XCJcXHU1MzhiXFx1N2YyOVxcdTY3M2FcIixcImJyYW5kXCI6XCJTSUtFXCIsXCJvcmlnaW5fc2VyaWFsX251bWJlclwiOlwiNnI4dDdpb2dqa3JoY3NcIixcImZhY3Rvcnlfc2VyaWFsX251bWJlclwiOlwiOXU4eTdpdHVcIixcInJlbWFpbl9hbW91bnRcIjo4M31dXG4gICAgICAgIC8vICBvcHRpb25zOiBbe1xuICAgICAgICAvLyAgICB2YWx1ZTogJ2NhdGVnb3J5JyxcbiAgICAgICAgLy8gICAgbGFiZWw6ICdjYXRlZ29yeScsXG4gICAgICAgIC8vICAgIGNoaWxkcmVuOiBbe1xuICAgICAgICAvLyAgICAgIHZhbHVlOiAnZmFjdG9yeV9zZXJpYWxfbnVtYmVyJyxcbiAgICAgICAgLy8gICAgICBsYWJlbDogJ25hbWUnXG4gICAgICAgIC8vICAgIH1dXG4gICAgICAgIC8vICB9XSxcbiAgICAgICB9XG4gICAgfSxcbiAgICBjb21wdXRlZDoge1xuICAgICAgb3B0aW9ucyAoKSB7XG4gICAgICAgICAgY29uc3QgZ3JvdXBCeSA9IGZ1bmN0aW9uKHhzLCBrZXkpIHtcbiAgICAgICAgICAgIHJldHVybiB4cy5yZWR1Y2UoZnVuY3Rpb24ocnYsIHgpIHtcbiAgICAgICAgICAgICAgKHJ2W3hba2V5XV0gPSBydlt4W2tleV1dIHx8IFtdKS5wdXNoKHgpO1xuICAgICAgICAgICAgICByZXR1cm4gcnY7XG4gICAgICAgICAgICB9LCB7fSk7XG4gICAgICAgICAgfTtcbiAgICAgICAgICBjb25zdCBjaGlsZHJlbktleVZhbCA9IGZ1bmN0aW9uKGQpe1xuICAgICAgICAgICAgcmV0dXJuIGQucmVkdWNlKGZ1bmN0aW9uKGFjLCB2KXtcbiAgICAgICAgICAgICAgYWMucHVzaCh7IGxhYmVsOiB2Lm1vZGVsLCB2YWx1ZTogdi5zdG9ja19pZH0pXG4gICAgICAgICAgICAgIHJldHVybiBhY1xuICAgICAgICAgICAgfSwgW10pXG4gICAgICAgICAgfTtcbiAgICAgICAgICBjb25zdCBrZXlWYWx1ZSA9IGZ1bmN0aW9uKGQpe1xuICAgICAgICAgICAgcmV0dXJuIE9iamVjdC5rZXlzKGQpLnJlZHVjZShmdW5jdGlvbihhYyx2KXtcbiAgICAgICAgICAgICAgYWMucHVzaCh7XG4gICAgICAgICAgICAgICAgbGFiZWw6IHYsXG4gICAgICAgICAgICAgICAgdmFsdWU6IHYsXG4gICAgICAgICAgICAgICAgY2hpbGRyZW46IGNoaWxkcmVuS2V5VmFsKGRbdl0pXG4gICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgIHJldHVybiBhY1xuICAgICAgICAgICAgfSwgW10pXG4gICAgICAgICAgfVxuICAgICAgICByZXR1cm4ga2V5VmFsdWUoZ3JvdXBCeSh0aGlzLnJhd0RhdGEsJ2NhdGVnb3J5JykpXG4gICAgICB9XG4gICAgfSxcbiAgICBjcmVhdGVkKCkge1xuICAgICAgYXhpb3MuZ2V0KHRoaXMuZGF0YXNvdXJjZSlcbiAgICAgIC50aGVuKHJlc3BvbnNlID0+IHtcbiAgICAgICAgLy8gSlNPTiByZXNwb25zZXMgYXJlIGF1dG9tYXRpY2FsbHkgcGFyc2VkLlxuICAgICAgICB0aGlzLnJhd0RhdGEgPSByZXNwb25zZS5kYXRhXG4gICAgICAgIGNvbnNvbGUubG9nKHRoaXMucmF3RGF0YSlcbiAgICAgIH0pXG4gICAgICAuY2F0Y2goZSA9PiB7XG4gICAgICAgIGNvbnNvbGUuZXJyb3IoZSlcbiAgICAgIH0pXG4gICAgfVxuICB9XG48L3NjcmlwdD5cblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyBhZGRQYXJ0cy52dWU/NjY2Yzg1YTYiXSwic291cmNlUm9vdCI6IiJ9