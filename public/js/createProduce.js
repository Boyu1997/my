webpackJsonp([2],{

/***/ 103:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(16)(
  /* script */
  __webpack_require__(79),
  /* template */
  __webpack_require__(106),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "/Users/victor/dev/my/resources/assets/js/components/addParts.vue"
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

/***/ 106:
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
  }, [_c('el-cascader', {
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

/***/ 109:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(33);


/***/ }),

/***/ 16:
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

/***/ 33:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_addParts_vue__ = __webpack_require__(103);
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

/***/ 79:
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
      rawData: [{ "stock_id": 1, "model": "842-A5", "category": "\u6C34\u6CF5", "brand": "CRI", "origin_serial_number": "2kd537rk", "factory_serial_number": "vjhk", "remain_amount": 18 }, { "stock_id": 2, "model": "64C-50", "category": "\u6C34\u6CF5", "brand": "F3", "origin_serial_number": "56ytr", "factory_serial_number": "y8gohuvkj", "remain_amount": 47 }]
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
  // methods: {
  //   getData
  // }
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

},[109]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvYWRkUGFydHMudnVlIiwid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9hZGRQYXJ0cy52dWU/MjkzYSIsIndlYnBhY2s6Ly8vLi9+L3Z1ZS1sb2FkZXIvbGliL2NvbXBvbmVudC1ub3JtYWxpemVyLmpzP2Q0ZjMiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9jcmVhdGVQcm9kdWNlLmpzIiwid2VicGFjazovLy9hZGRQYXJ0cy52dWUiXSwibmFtZXMiOlsiYWRkUGFydHMiLCJWdWUiLCJlbCIsImNvbXBvbmVudHMiLCJBZGRQYXJ0cyIsInRlbXBsYXRlIiwiZGF0YSIsImRhdGFzb3VyY2UiXSwibWFwcGluZ3MiOiI7Ozs7O0FBQUE7QUFDQTtBQUNBLHdCQUFxSjtBQUNySjtBQUNBLHlCQUF5RztBQUN6RztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSwrRUFBK0UsaURBQWlELElBQUk7QUFDcEksbUNBQW1DOztBQUVuQztBQUNBLFlBQWlCO0FBQ2pCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0EsQ0FBQzs7QUFFRDs7Ozs7Ozs7QUMzQkEsZ0JBQWdCLG1CQUFtQixhQUFhLDBCQUEwQjtBQUMxRTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNILENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDOzs7Ozs7Ozs7Ozs7Ozs7QUNuREE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxtQ0FBbUM7QUFDbkMsS0FBSztBQUNMO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7Ozs7QUNsREE7O0FBRUEsSUFBTUEsV0FBVyxJQUFJQyxHQUFKLENBQVE7QUFDdkJDLE1BQUksWUFEbUI7QUFFdkJDLGNBQVk7QUFDWixpQkFBYSxnRUFBQUM7QUFERCxHQUZXO0FBS3ZCQyxZQUFVLGtEQUxhO0FBTXZCQyxRQUFNO0FBQ0pDLGdCQUFZO0FBRFI7QUFOaUIsQ0FBUixDQUFqQixDOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUNrQ0E7VUFFQTt3QkFDQTs7ZUFFQTtlQUNBLHVLQUNBLDZLQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUE7QUFmQTtBQWdCQTs7O2dDQUVBOzhDQUNBOzBDQUNBOytDQUNBO2lCQUNBO1dBQ0E7QUFDQTtzREFDQTt5Q0FDQTs2Q0FDQTtpQkFDQTtXQUNBO0FBQ0E7MENBQ0E7c0RBQ0E7O21CQUVBO21CQUNBO3VDQUVBO0FBSkE7aUJBS0E7V0FDQTtBQUNBOzRDQUNBO0FBRUE7QUExQkE7QUEyQkE7QUFDQTtBQUNBOztBQUNBOzttQkFDQSxxQ0FDQTtBQUNBOytCQUNBO3dCQUNBO0FBQ0EsMEJBQ0E7b0JBQ0E7QUFDQTtBQUNBO0FBNURBLEciLCJmaWxlIjoiL2pzL2NyZWF0ZVByb2R1Y2UuanMiLCJzb3VyY2VzQ29udGVudCI6WyJ2YXIgQ29tcG9uZW50ID0gcmVxdWlyZShcIiEuLi8uLi8uLi8uLi9ub2RlX21vZHVsZXMvdnVlLWxvYWRlci9saWIvY29tcG9uZW50LW5vcm1hbGl6ZXJcIikoXG4gIC8qIHNjcmlwdCAqL1xuICByZXF1aXJlKFwiISFiYWJlbC1sb2FkZXI/e1xcXCJjYWNoZURpcmVjdG9yeVxcXCI6dHJ1ZSxcXFwicHJlc2V0c1xcXCI6W1tcXFwiZW52XFxcIix7XFxcIm1vZHVsZXNcXFwiOmZhbHNlLFxcXCJ0YXJnZXRzXFxcIjp7XFxcImJyb3dzZXJzXFxcIjpbXFxcIj4gMiVcXFwiXSxcXFwidWdsaWZ5XFxcIjp0cnVlfX1dXX0hLi4vLi4vLi4vLi4vbm9kZV9tb2R1bGVzL3Z1ZS1sb2FkZXIvbGliL3NlbGVjdG9yP3R5cGU9c2NyaXB0JmluZGV4PTAhLi9hZGRQYXJ0cy52dWVcIiksXG4gIC8qIHRlbXBsYXRlICovXG4gIHJlcXVpcmUoXCIhIS4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi90ZW1wbGF0ZS1jb21waWxlci9pbmRleD97XFxcImlkXFxcIjpcXFwiZGF0YS12LTVlNTE2NzlmXFxcIn0hLi4vLi4vLi4vLi4vbm9kZV9tb2R1bGVzL3Z1ZS1sb2FkZXIvbGliL3NlbGVjdG9yP3R5cGU9dGVtcGxhdGUmaW5kZXg9MCEuL2FkZFBhcnRzLnZ1ZVwiKSxcbiAgLyogc2NvcGVJZCAqL1xuICBudWxsLFxuICAvKiBjc3NNb2R1bGVzICovXG4gIG51bGxcbilcbkNvbXBvbmVudC5vcHRpb25zLl9fZmlsZSA9IFwiL1VzZXJzL3ZpY3Rvci9kZXYvbXkvcmVzb3VyY2VzL2Fzc2V0cy9qcy9jb21wb25lbnRzL2FkZFBhcnRzLnZ1ZVwiXG5pZiAoQ29tcG9uZW50LmVzTW9kdWxlICYmIE9iamVjdC5rZXlzKENvbXBvbmVudC5lc01vZHVsZSkuc29tZShmdW5jdGlvbiAoa2V5KSB7cmV0dXJuIGtleSAhPT0gXCJkZWZhdWx0XCIgJiYga2V5ICE9PSBcIl9fZXNNb2R1bGVcIn0pKSB7Y29uc29sZS5lcnJvcihcIm5hbWVkIGV4cG9ydHMgYXJlIG5vdCBzdXBwb3J0ZWQgaW4gKi52dWUgZmlsZXMuXCIpfVxuaWYgKENvbXBvbmVudC5vcHRpb25zLmZ1bmN0aW9uYWwpIHtjb25zb2xlLmVycm9yKFwiW3Z1ZS1sb2FkZXJdIGFkZFBhcnRzLnZ1ZTogZnVuY3Rpb25hbCBjb21wb25lbnRzIGFyZSBub3Qgc3VwcG9ydGVkIHdpdGggdGVtcGxhdGVzLCB0aGV5IHNob3VsZCB1c2UgcmVuZGVyIGZ1bmN0aW9ucy5cIil9XG5cbi8qIGhvdCByZWxvYWQgKi9cbmlmIChtb2R1bGUuaG90KSB7KGZ1bmN0aW9uICgpIHtcbiAgdmFyIGhvdEFQSSA9IHJlcXVpcmUoXCJ2dWUtaG90LXJlbG9hZC1hcGlcIilcbiAgaG90QVBJLmluc3RhbGwocmVxdWlyZShcInZ1ZVwiKSwgZmFsc2UpXG4gIGlmICghaG90QVBJLmNvbXBhdGlibGUpIHJldHVyblxuICBtb2R1bGUuaG90LmFjY2VwdCgpXG4gIGlmICghbW9kdWxlLmhvdC5kYXRhKSB7XG4gICAgaG90QVBJLmNyZWF0ZVJlY29yZChcImRhdGEtdi01ZTUxNjc5ZlwiLCBDb21wb25lbnQub3B0aW9ucylcbiAgfSBlbHNlIHtcbiAgICBob3RBUEkucmVsb2FkKFwiZGF0YS12LTVlNTE2NzlmXCIsIENvbXBvbmVudC5vcHRpb25zKVxuICB9XG59KSgpfVxuXG5tb2R1bGUuZXhwb3J0cyA9IENvbXBvbmVudC5leHBvcnRzXG5cblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9hZGRQYXJ0cy52dWVcbi8vIG1vZHVsZSBpZCA9IDEwM1xuLy8gbW9kdWxlIGNodW5rcyA9IDIiLCJtb2R1bGUuZXhwb3J0cz17cmVuZGVyOmZ1bmN0aW9uICgpe3ZhciBfdm09dGhpczt2YXIgX2g9X3ZtLiRjcmVhdGVFbGVtZW50O3ZhciBfYz1fdm0uX3NlbGYuX2N8fF9oO1xuICByZXR1cm4gX2MoJ2VsLXJvdycsIFtfYygnZWwtYnV0dG9uJywge1xuICAgIG5hdGl2ZU9uOiB7XG4gICAgICBcImNsaWNrXCI6IGZ1bmN0aW9uKCRldmVudCkge1xuICAgICAgICBfdm0udmlzaWJsZSA9IHRydWVcbiAgICAgIH1cbiAgICB9XG4gIH0sIFtfdm0uX3YoXCLmt7vliqDpm7bku7ZcIildKSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLWRpYWxvZycsIHtcbiAgICBhdHRyczoge1xuICAgICAgXCJ0aXRsZVwiOiBcIumAieaLqembtuS7tlwiXG4gICAgfSxcbiAgICBtb2RlbDoge1xuICAgICAgdmFsdWU6IChfdm0udmlzaWJsZSksXG4gICAgICBjYWxsYmFjazogZnVuY3Rpb24oJCR2KSB7XG4gICAgICAgIF92bS52aXNpYmxlID0gJCR2XG4gICAgICB9LFxuICAgICAgZXhwcmVzc2lvbjogXCJ2aXNpYmxlXCJcbiAgICB9XG4gIH0sIFtfYygnZWwtY2FzY2FkZXInLCB7XG4gICAgYXR0cnM6IHtcbiAgICAgIFwicGxhY2Vob2xkZXJcIjogXCLmkJzntKLpm7bku7ZcIixcbiAgICAgIFwib3B0aW9uc1wiOiBfdm0ub3B0aW9ucyxcbiAgICAgIFwiZmlsdGVyYWJsZVwiOiBcIlwiXG4gICAgfVxuICB9KSwgX3ZtLl92KFwiIFwiKSwgX2MoJ3NwYW4nLCB7XG4gICAgc3RhdGljQ2xhc3M6IFwiZGlhbG9nLWZvb3RlclwiLFxuICAgIHNsb3Q6IFwiZm9vdGVyXCJcbiAgfSwgW19jKCdlbC1idXR0b24nLCB7XG4gICAgb246IHtcbiAgICAgIFwiY2xpY2tcIjogZnVuY3Rpb24oJGV2ZW50KSB7XG4gICAgICAgIF92bS52aXNpYmxlID0gZmFsc2VcbiAgICAgIH1cbiAgICB9XG4gIH0sIFtfdm0uX3YoXCLlj5bmtohcIildKSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLWJ1dHRvbicsIHtcbiAgICBhdHRyczoge1xuICAgICAgXCJ0eXBlXCI6IFwicHJpbWFyeVwiLFxuICAgICAgXCJpZFwiOiBcImNyZWF0ZV9zdG9ja19zdWJtaXRcIlxuICAgIH0sXG4gICAgb246IHtcbiAgICAgIFwiY2xpY2tcIjogZnVuY3Rpb24oJGV2ZW50KSB7XG4gICAgICAgIF92bS52aXNpYmxlID0gZmFsc2VcbiAgICAgIH1cbiAgICB9XG4gIH0sIFtfdm0uX3YoXCLnoa7orqRcIildKV0sIDEpXSwgMSldLCAxKVxufSxzdGF0aWNSZW5kZXJGbnM6IFtdfVxubW9kdWxlLmV4cG9ydHMucmVuZGVyLl93aXRoU3RyaXBwZWQgPSB0cnVlXG5pZiAobW9kdWxlLmhvdCkge1xuICBtb2R1bGUuaG90LmFjY2VwdCgpXG4gIGlmIChtb2R1bGUuaG90LmRhdGEpIHtcbiAgICAgcmVxdWlyZShcInZ1ZS1ob3QtcmVsb2FkLWFwaVwiKS5yZXJlbmRlcihcImRhdGEtdi01ZTUxNjc5ZlwiLCBtb2R1bGUuZXhwb3J0cylcbiAgfVxufVxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vfi92dWUtbG9hZGVyL2xpYi90ZW1wbGF0ZS1jb21waWxlcj97XCJpZFwiOlwiZGF0YS12LTVlNTE2NzlmXCJ9IS4vfi92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvci5qcz90eXBlPXRlbXBsYXRlJmluZGV4PTAhLi9yZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvYWRkUGFydHMudnVlXG4vLyBtb2R1bGUgaWQgPSAxMDZcbi8vIG1vZHVsZSBjaHVua3MgPSAyIiwiLy8gdGhpcyBtb2R1bGUgaXMgYSBydW50aW1lIHV0aWxpdHkgZm9yIGNsZWFuZXIgY29tcG9uZW50IG1vZHVsZSBvdXRwdXQgYW5kIHdpbGxcbi8vIGJlIGluY2x1ZGVkIGluIHRoZSBmaW5hbCB3ZWJwYWNrIHVzZXIgYnVuZGxlXG5cbm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24gbm9ybWFsaXplQ29tcG9uZW50IChcbiAgcmF3U2NyaXB0RXhwb3J0cyxcbiAgY29tcGlsZWRUZW1wbGF0ZSxcbiAgc2NvcGVJZCxcbiAgY3NzTW9kdWxlc1xuKSB7XG4gIHZhciBlc01vZHVsZVxuICB2YXIgc2NyaXB0RXhwb3J0cyA9IHJhd1NjcmlwdEV4cG9ydHMgPSByYXdTY3JpcHRFeHBvcnRzIHx8IHt9XG5cbiAgLy8gRVM2IG1vZHVsZXMgaW50ZXJvcFxuICB2YXIgdHlwZSA9IHR5cGVvZiByYXdTY3JpcHRFeHBvcnRzLmRlZmF1bHRcbiAgaWYgKHR5cGUgPT09ICdvYmplY3QnIHx8IHR5cGUgPT09ICdmdW5jdGlvbicpIHtcbiAgICBlc01vZHVsZSA9IHJhd1NjcmlwdEV4cG9ydHNcbiAgICBzY3JpcHRFeHBvcnRzID0gcmF3U2NyaXB0RXhwb3J0cy5kZWZhdWx0XG4gIH1cblxuICAvLyBWdWUuZXh0ZW5kIGNvbnN0cnVjdG9yIGV4cG9ydCBpbnRlcm9wXG4gIHZhciBvcHRpb25zID0gdHlwZW9mIHNjcmlwdEV4cG9ydHMgPT09ICdmdW5jdGlvbidcbiAgICA/IHNjcmlwdEV4cG9ydHMub3B0aW9uc1xuICAgIDogc2NyaXB0RXhwb3J0c1xuXG4gIC8vIHJlbmRlciBmdW5jdGlvbnNcbiAgaWYgKGNvbXBpbGVkVGVtcGxhdGUpIHtcbiAgICBvcHRpb25zLnJlbmRlciA9IGNvbXBpbGVkVGVtcGxhdGUucmVuZGVyXG4gICAgb3B0aW9ucy5zdGF0aWNSZW5kZXJGbnMgPSBjb21waWxlZFRlbXBsYXRlLnN0YXRpY1JlbmRlckZuc1xuICB9XG5cbiAgLy8gc2NvcGVkSWRcbiAgaWYgKHNjb3BlSWQpIHtcbiAgICBvcHRpb25zLl9zY29wZUlkID0gc2NvcGVJZFxuICB9XG5cbiAgLy8gaW5qZWN0IGNzc01vZHVsZXNcbiAgaWYgKGNzc01vZHVsZXMpIHtcbiAgICB2YXIgY29tcHV0ZWQgPSBPYmplY3QuY3JlYXRlKG9wdGlvbnMuY29tcHV0ZWQgfHwgbnVsbClcbiAgICBPYmplY3Qua2V5cyhjc3NNb2R1bGVzKS5mb3JFYWNoKGZ1bmN0aW9uIChrZXkpIHtcbiAgICAgIHZhciBtb2R1bGUgPSBjc3NNb2R1bGVzW2tleV1cbiAgICAgIGNvbXB1dGVkW2tleV0gPSBmdW5jdGlvbiAoKSB7IHJldHVybiBtb2R1bGUgfVxuICAgIH0pXG4gICAgb3B0aW9ucy5jb21wdXRlZCA9IGNvbXB1dGVkXG4gIH1cblxuICByZXR1cm4ge1xuICAgIGVzTW9kdWxlOiBlc01vZHVsZSxcbiAgICBleHBvcnRzOiBzY3JpcHRFeHBvcnRzLFxuICAgIG9wdGlvbnM6IG9wdGlvbnNcbiAgfVxufVxuXG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9+L3Z1ZS1sb2FkZXIvbGliL2NvbXBvbmVudC1ub3JtYWxpemVyLmpzXG4vLyBtb2R1bGUgaWQgPSAxNlxuLy8gbW9kdWxlIGNodW5rcyA9IDEgMiIsImltcG9ydCBBZGRQYXJ0cyBmcm9tICcuL2NvbXBvbmVudHMvYWRkUGFydHMudnVlJ1xuXG5jb25zdCBhZGRQYXJ0cyA9IG5ldyBWdWUoe1xuICBlbDogJyNhZGQtcGFydHMnLFxuICBjb21wb25lbnRzOiB7XG4gICdhZGQtcGFydHMnOiBBZGRQYXJ0c1xuICB9LFxuICB0ZW1wbGF0ZTogXCI8YWRkLXBhcnRzIDpkYXRhc291cmNlPSdkYXRhc291cmNlJz48L2FkZC1wYXJ0cz5cIixcbiAgZGF0YToge1xuICAgIGRhdGFzb3VyY2U6ICcvYWpheC9wcm9kdWNlL2NyZWF0ZS9nZXRDcmVhdGVTdG9jaydcbiAgfVxufSlcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3Jlc291cmNlcy9hc3NldHMvanMvY3JlYXRlUHJvZHVjZS5qcyIsIjx0ZW1wbGF0ZT5cbiAgPGVsLXJvdz5cbiAgICA8ZWwtYnV0dG9uIEBjbGljay5uYXRpdmU9XCJ2aXNpYmxlID0gdHJ1ZVwiPua3u+WKoOmbtuS7tjwvZWwtYnV0dG9uPlxuICAgIDxlbC1kaWFsb2cgdi1tb2RlbD1cInZpc2libGVcIiB0aXRsZT1cIumAieaLqembtuS7tlwiPlxuICAgICAgICAgICAgICAgICAgPCEtLSA8Zm9ybSBjbGFzcz1cImZvcm0taG9yaXpvbnRhbFwiPlxuICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJtb2RhbC1ib2R5XCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJmb3JtLWdyb3VwXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8bGFiZWwgZm9yPVwic3RvY2tfaWRcIiBjbGFzcz1cImNvbC1zbS0yIGNvbnRyb2wtbGFiZWxcIj7pm7bku7Y8L2xhYmVsPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImNvbC1zbS0xMCBjb2wtbWQtOVwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxzZWxlY3QgY2xhc3MgPSBcImZvcm0tY29udHJvbFwiIGlkPVwic3RvY2tfY2F0ZWdvcnlcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPG9wdGlvbiB2YWx1ZT0nMCcgcmVxdWlyZWQ+6K+36YCJ5oup5YiG57G7PC9vcHRpb24+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zZWxlY3Q+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHNlbGVjdCBjbGFzcyA9IFwiZm9ybS1jb250cm9sXCIgaWQ9XCJzdG9ja19pZFwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8b3B0aW9uIHZhbHVlPScwJyByZXF1aXJlZD7or7fpgInmi6npm7bku7Y8L29wdGlvbj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L3NlbGVjdD5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPVwiZXJyb3Igc3RvY2tfaWRfZXJyb3JcIj48L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGxhYmVsIGZvcj1cInVzZV9hbW91bnRcIiBjbGFzcz1cImNvbC1zbS0yIGNvbnRyb2wtbGFiZWxcIiByZXF1aXJlZD7kvb/nlKjmlbDph488L2xhYmVsPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImNvbC1zbS0xMCBjb2wtbWQtOVwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxpbnB1dCB0eXBlPVwibnVtYmVyXCIgY2xhc3M9XCJmb3JtLWNvbnRyb2xcIiBuYW1lPVwidXNlX2Ftb3VudFwiIGlkPVwidXNlX2Ftb3VudFwiIHZhbHVlPVwiXCIgcGxhY2Vob2xkZXI9XCLor7fovpPlhaXkvb/nlKjmlbDph49cIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPVwiZXJyb3IgdXNlX2Ftb3VudF9lcnJvclwiPjwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwIGNsYXNzPVwidGV4dF9hZnRlcl9pd25wdXRcIj7msqHmnInmgqjlnKjmib7nmoTpm7bku7Yg77yf6K+35LiO5bqT566h5Lq65ZGY6IGU57O75oiW6IGU57O7572R56uZ566h55CG5ZGY44CCPC9wPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgPC9mb3JtPiAtLT5cbiAgICAgICAgPGVsLWNhc2NhZGVyIHBsYWNlaG9sZGVyPVwi5pCc57Si6Zu25Lu2XCIgOm9wdGlvbnM9XCJvcHRpb25zXCIgZmlsdGVyYWJsZSA+PC9lbC1jYXNjYWRlcj5cbiAgICAgICAgPHNwYW4gc2xvdD1cImZvb3RlclwiIGNsYXNzPVwiZGlhbG9nLWZvb3RlclwiPlxuICAgICAgICAgIDxlbC1idXR0b24gQGNsaWNrPVwidmlzaWJsZSA9IGZhbHNlXCI+5Y+W5raIPC9lbC1idXR0b24+XG4gICAgICAgICAgPGVsLWJ1dHRvbiB0eXBlPVwicHJpbWFyeVwiIEBjbGljaz1cInZpc2libGUgPSBmYWxzZVwiIGlkPVwiY3JlYXRlX3N0b2NrX3N1Ym1pdFwiPuehruiupDwvZWwtYnV0dG9uPlxuICAgICAgICA8L3NwYW4+XG4gICAgPC9lbC1kaWFsb2c+XG4gPC9lbC1yb3c+XG48L3RlbXBsYXRlPlxuXG48c2NyaXB0PlxuICBleHBvcnQgZGVmYXVsdCB7XG4gICAgcHJvcHM6IFsnZGF0YXNvdXJjZSddLFxuICAgIGRhdGEgKCkge1xuICAgICAgcmV0dXJuIHtcbiAgICAgICAgIHZpc2libGU6IGZhbHNlLFxuICAgICAgICAgcmF3RGF0YTpbXG4gICAgICAgICAgIHtcInN0b2NrX2lkXCI6MSxcIm1vZGVsXCI6XCI4NDItQTVcIixcImNhdGVnb3J5XCI6XCJcXHU2YzM0XFx1NmNmNVwiLFwiYnJhbmRcIjpcIkNSSVwiLFwib3JpZ2luX3NlcmlhbF9udW1iZXJcIjpcIjJrZDUzN3JrXCIsXCJmYWN0b3J5X3NlcmlhbF9udW1iZXJcIjpcInZqaGtcIixcInJlbWFpbl9hbW91bnRcIjoxOH0sXG4gICAgICAgICAgIHtcInN0b2NrX2lkXCI6MixcIm1vZGVsXCI6XCI2NEMtNTBcIixcImNhdGVnb3J5XCI6XCJcXHU2YzM0XFx1NmNmNVwiLFwiYnJhbmRcIjpcIkYzXCIsXCJvcmlnaW5fc2VyaWFsX251bWJlclwiOlwiNTZ5dHJcIixcImZhY3Rvcnlfc2VyaWFsX251bWJlclwiOlwieThnb2h1dmtqXCIsXCJyZW1haW5fYW1vdW50XCI6NDd9XVxuICAgICAgICAgIC8vICB7XCJzdG9ja19pZFwiOjMsXCJtb2RlbFwiOlwiQ0Y5NDAwXCIsXCJjYXRlZ29yeVwiOlwiXFx1NTM4YlxcdTdmMjlcXHU2NzNhXCIsXCJicmFuZFwiOlwiU0lLRVwiLFwib3JpZ2luX3NlcmlhbF9udW1iZXJcIjpcImZ3Z3VpdmtqanZyODkzXCIsXCJmYWN0b3J5X3NlcmlhbF9udW1iZXJcIjpcIjdyNnR5OG91aVwiLFwicmVtYWluX2Ftb3VudFwiOjN9LFxuICAgICAgICAgIC8vICB7XCJzdG9ja19pZFwiOjQsXCJtb2RlbFwiOlwiQ0Y2MTAwXCIsXCJjYXRlZ29yeVwiOlwiXFx1NTM4YlxcdTdmMjlcXHU2NzNhXCIsXCJicmFuZFwiOlwiU0lLRVwiLFwib3JpZ2luX3NlcmlhbF9udW1iZXJcIjpcIjZyOHQ3aW9namtyaGNzXCIsXCJmYWN0b3J5X3NlcmlhbF9udW1iZXJcIjpcIjl1OHk3aXR1XCIsXCJyZW1haW5fYW1vdW50XCI6ODN9XVxuICAgICAgICAvLyAgb3B0aW9uczogW3tcbiAgICAgICAgLy8gICAgdmFsdWU6ICdjYXRlZ29yeScsXG4gICAgICAgIC8vICAgIGxhYmVsOiAnY2F0ZWdvcnknLFxuICAgICAgICAvLyAgICBjaGlsZHJlbjogW3tcbiAgICAgICAgLy8gICAgICB2YWx1ZTogJ2ZhY3Rvcnlfc2VyaWFsX251bWJlcicsXG4gICAgICAgIC8vICAgICAgbGFiZWw6ICduYW1lJ1xuICAgICAgICAvLyAgICB9XVxuICAgICAgICAvLyAgfV0sXG4gICAgICAgfVxuICAgIH0sXG4gICAgY29tcHV0ZWQ6IHtcbiAgICAgIG9wdGlvbnMgKCkge1xuICAgICAgICAgIGNvbnN0IGdyb3VwQnkgPSBmdW5jdGlvbih4cywga2V5KSB7XG4gICAgICAgICAgICByZXR1cm4geHMucmVkdWNlKGZ1bmN0aW9uKHJ2LCB4KSB7XG4gICAgICAgICAgICAgIChydlt4W2tleV1dID0gcnZbeFtrZXldXSB8fCBbXSkucHVzaCh4KTtcbiAgICAgICAgICAgICAgcmV0dXJuIHJ2O1xuICAgICAgICAgICAgfSwge30pO1xuICAgICAgICAgIH07XG4gICAgICAgICAgY29uc3QgY2hpbGRyZW5LZXlWYWwgPSBmdW5jdGlvbihkKXtcbiAgICAgICAgICAgIHJldHVybiBkLnJlZHVjZShmdW5jdGlvbihhYywgdil7XG4gICAgICAgICAgICAgIGFjLnB1c2goeyBsYWJlbDogdi5tb2RlbCwgdmFsdWU6IHYuc3RvY2tfaWR9KVxuICAgICAgICAgICAgICByZXR1cm4gYWNcbiAgICAgICAgICAgIH0sIFtdKVxuICAgICAgICAgIH07XG4gICAgICAgICAgY29uc3Qga2V5VmFsdWUgPSBmdW5jdGlvbihkKXtcbiAgICAgICAgICAgIHJldHVybiBPYmplY3Qua2V5cyhkKS5yZWR1Y2UoZnVuY3Rpb24oYWMsdil7XG4gICAgICAgICAgICAgIGFjLnB1c2goe1xuICAgICAgICAgICAgICAgIGxhYmVsOiB2LFxuICAgICAgICAgICAgICAgIHZhbHVlOiB2LFxuICAgICAgICAgICAgICAgIGNoaWxkcmVuOiBjaGlsZHJlbktleVZhbChkW3ZdKVxuICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICByZXR1cm4gYWNcbiAgICAgICAgICAgIH0sIFtdKVxuICAgICAgICAgIH1cbiAgICAgICAgcmV0dXJuIGtleVZhbHVlKGdyb3VwQnkodGhpcy5yYXdEYXRhLCdjYXRlZ29yeScpKVxuICAgICAgfVxuICAgIH0sXG4gICAgLy8gbWV0aG9kczoge1xuICAgIC8vICAgZ2V0RGF0YVxuICAgIC8vIH1cbiAgICBjcmVhdGVkKCkge1xuICAgICAgYXhpb3MuZ2V0KHRoaXMuZGF0YXNvdXJjZSlcbiAgICAgIC50aGVuKHJlc3BvbnNlID0+IHtcbiAgICAgICAgLy8gSlNPTiByZXNwb25zZXMgYXJlIGF1dG9tYXRpY2FsbHkgcGFyc2VkLlxuICAgICAgICB0aGlzLnJhd0RhdGEgPSByZXNwb25zZS5kYXRhXG4gICAgICAgIGNvbnNvbGUubG9nKHRoaXMucmF3RGF0YSlcbiAgICAgIH0pXG4gICAgICAuY2F0Y2goZSA9PiB7XG4gICAgICAgIGNvbnNvbGUuZXJyb3IoZSlcbiAgICAgIH0pXG4gICAgfVxuICB9XG48L3NjcmlwdD5cblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyBhZGRQYXJ0cy52dWU/ZGMwYjYxNGUiXSwic291cmNlUm9vdCI6IiJ9