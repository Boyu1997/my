webpackJsonp([1],{

/***/ 104:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(16)(
  /* script */
  __webpack_require__(80),
  /* template */
  __webpack_require__(105),
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

/***/ 105:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', [_c('h1', [_vm._v("库存概览")]), _vm._v(" "), _c('el-button', {
    attrs: {
      "type": "text",
      "icon": "document"
    }
  }, [_vm._v("新建记录")]), _vm._v(" "), _c('el-button', {
    attrs: {
      "type": "text",
      "icon": "date"
    }
  }, [_vm._v("按月查看")]), _vm._v(" "), _c('el-button', {
    attrs: {
      "type": "text",
      "icon": "check"
    }
  }, [_vm._v("正在生产")]), _vm._v(" "), _c('el-button', {
    attrs: {
      "type": "text",
      "icon": "search"
    }
  }, [_vm._v("搜索")]), _vm._v(" "), _c('el-table', {
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
            "icon": "view",
            "size": "small"
          }
        }), _vm._v(" "), _c('el-button', {
          attrs: {
            "type": "text",
            "icon": "edit",
            "size": "small"
          }
        })]
      }]
    ])
  })], 1)], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-235cb4ff", module.exports)
  }
}

/***/ }),

/***/ 110:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(34);


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

/***/ 34:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_stockOverview_vue__ = __webpack_require__(104);
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

/***/ 80:
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

},[110]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvc3RvY2tPdmVydmlldy52dWUiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9jb21wb25lbnRzL3N0b2NrT3ZlcnZpZXcudnVlPzljMzIiLCJ3ZWJwYWNrOi8vLy4vfi92dWUtbG9hZGVyL2xpYi9jb21wb25lbnQtbm9ybWFsaXplci5qcyIsIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3N0b2NrT3ZlcnZpZXcuanMiLCJ3ZWJwYWNrOi8vL3N0b2NrT3ZlcnZpZXcudnVlIl0sIm5hbWVzIjpbImFkZFBhcnRzIiwiVnVlIiwiZWwiLCJjb21wb25lbnRzIiwiU3RvY2tPdmVydmlldyIsInRlbXBsYXRlIiwiZGF0YSIsImRhdGFzb3VyY2UiXSwibWFwcGluZ3MiOiI7Ozs7O0FBQUE7QUFDQTtBQUNBLHdCQUFxSjtBQUNySjtBQUNBLHlCQUF5RztBQUN6RztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSwrRUFBK0UsaURBQWlELElBQUk7QUFDcEksbUNBQW1DOztBQUVuQztBQUNBLFlBQWlCO0FBQ2pCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0EsQ0FBQzs7QUFFRDs7Ozs7Ozs7QUMzQkEsZ0JBQWdCLG1CQUFtQixhQUFhLDBCQUEwQjtBQUMxRTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNULE9BQU87QUFDUDtBQUNBLEdBQUc7QUFDSCxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQzs7Ozs7Ozs7Ozs7Ozs7O0FDckZBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsbUNBQW1DO0FBQ25DLEtBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7Ozs7Ozs7Ozs7O0FDbERBOztBQUVBLElBQU1BLFdBQVcsSUFBSUMsR0FBSixDQUFRO0FBQ3ZCQyxNQUFJLE9BRG1CO0FBRXZCQyxjQUFZO0FBQ1osc0JBQWtCLHFFQUFBQztBQUROLEdBRlc7QUFLdkJDLFlBQVUsNERBTGE7QUFNdkJDLFFBQU07QUFDSkMsZ0JBQVk7QUFEUjtBQU5pQixDQUFSLENBQWpCLEM7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQ2lEQTtBQUNBO1VBRUE7QUFDQTtBQUNBO0FBQ0E7d0JBQ0E7O1lBRUEsdUtBQ0EsNktBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQTtBQWRBO0FBZUE7OztrREFFQTt5QkFDQTsyQkFDQTtBQUVBO0FBTEE7O0FBTUE7O21CQUNBLHFDQUNBO0FBQ0E7NEJBQ0E7d0JBQ0E7QUFDQSwwQkFDQTtvQkFDQTtBQUNBO0FBQ0E7QUF0Q0EsRyIsImZpbGUiOiIvanMvc3RvY2tPdmVydmlldy5qcyIsInNvdXJjZXNDb250ZW50IjpbInZhciBDb21wb25lbnQgPSByZXF1aXJlKFwiIS4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9jb21wb25lbnQtbm9ybWFsaXplclwiKShcbiAgLyogc2NyaXB0ICovXG4gIHJlcXVpcmUoXCIhIWJhYmVsLWxvYWRlcj97XFxcImNhY2hlRGlyZWN0b3J5XFxcIjp0cnVlLFxcXCJwcmVzZXRzXFxcIjpbW1xcXCJlbnZcXFwiLHtcXFwibW9kdWxlc1xcXCI6ZmFsc2UsXFxcInRhcmdldHNcXFwiOntcXFwiYnJvd3NlcnNcXFwiOltcXFwiPiAyJVxcXCJdLFxcXCJ1Z2xpZnlcXFwiOnRydWV9fV1dfSEuLi8uLi8uLi8uLi9ub2RlX21vZHVsZXMvdnVlLWxvYWRlci9saWIvc2VsZWN0b3I/dHlwZT1zY3JpcHQmaW5kZXg9MCEuL3N0b2NrT3ZlcnZpZXcudnVlXCIpLFxuICAvKiB0ZW1wbGF0ZSAqL1xuICByZXF1aXJlKFwiISEuLi8uLi8uLi8uLi9ub2RlX21vZHVsZXMvdnVlLWxvYWRlci9saWIvdGVtcGxhdGUtY29tcGlsZXIvaW5kZXg/e1xcXCJpZFxcXCI6XFxcImRhdGEtdi0yMzVjYjRmZlxcXCJ9IS4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvcj90eXBlPXRlbXBsYXRlJmluZGV4PTAhLi9zdG9ja092ZXJ2aWV3LnZ1ZVwiKSxcbiAgLyogc2NvcGVJZCAqL1xuICBudWxsLFxuICAvKiBjc3NNb2R1bGVzICovXG4gIG51bGxcbilcbkNvbXBvbmVudC5vcHRpb25zLl9fZmlsZSA9IFwiL1VzZXJzL3ZpY3Rvci9kZXYvbXkvcmVzb3VyY2VzL2Fzc2V0cy9qcy9jb21wb25lbnRzL3N0b2NrT3ZlcnZpZXcudnVlXCJcbmlmIChDb21wb25lbnQuZXNNb2R1bGUgJiYgT2JqZWN0LmtleXMoQ29tcG9uZW50LmVzTW9kdWxlKS5zb21lKGZ1bmN0aW9uIChrZXkpIHtyZXR1cm4ga2V5ICE9PSBcImRlZmF1bHRcIiAmJiBrZXkgIT09IFwiX19lc01vZHVsZVwifSkpIHtjb25zb2xlLmVycm9yKFwibmFtZWQgZXhwb3J0cyBhcmUgbm90IHN1cHBvcnRlZCBpbiAqLnZ1ZSBmaWxlcy5cIil9XG5pZiAoQ29tcG9uZW50Lm9wdGlvbnMuZnVuY3Rpb25hbCkge2NvbnNvbGUuZXJyb3IoXCJbdnVlLWxvYWRlcl0gc3RvY2tPdmVydmlldy52dWU6IGZ1bmN0aW9uYWwgY29tcG9uZW50cyBhcmUgbm90IHN1cHBvcnRlZCB3aXRoIHRlbXBsYXRlcywgdGhleSBzaG91bGQgdXNlIHJlbmRlciBmdW5jdGlvbnMuXCIpfVxuXG4vKiBob3QgcmVsb2FkICovXG5pZiAobW9kdWxlLmhvdCkgeyhmdW5jdGlvbiAoKSB7XG4gIHZhciBob3RBUEkgPSByZXF1aXJlKFwidnVlLWhvdC1yZWxvYWQtYXBpXCIpXG4gIGhvdEFQSS5pbnN0YWxsKHJlcXVpcmUoXCJ2dWVcIiksIGZhbHNlKVxuICBpZiAoIWhvdEFQSS5jb21wYXRpYmxlKSByZXR1cm5cbiAgbW9kdWxlLmhvdC5hY2NlcHQoKVxuICBpZiAoIW1vZHVsZS5ob3QuZGF0YSkge1xuICAgIGhvdEFQSS5jcmVhdGVSZWNvcmQoXCJkYXRhLXYtMjM1Y2I0ZmZcIiwgQ29tcG9uZW50Lm9wdGlvbnMpXG4gIH0gZWxzZSB7XG4gICAgaG90QVBJLnJlbG9hZChcImRhdGEtdi0yMzVjYjRmZlwiLCBDb21wb25lbnQub3B0aW9ucylcbiAgfVxufSkoKX1cblxubW9kdWxlLmV4cG9ydHMgPSBDb21wb25lbnQuZXhwb3J0c1xuXG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9yZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvc3RvY2tPdmVydmlldy52dWVcbi8vIG1vZHVsZSBpZCA9IDEwNFxuLy8gbW9kdWxlIGNodW5rcyA9IDEiLCJtb2R1bGUuZXhwb3J0cz17cmVuZGVyOmZ1bmN0aW9uICgpe3ZhciBfdm09dGhpczt2YXIgX2g9X3ZtLiRjcmVhdGVFbGVtZW50O3ZhciBfYz1fdm0uX3NlbGYuX2N8fF9oO1xuICByZXR1cm4gX2MoJ2RpdicsIFtfYygnaDEnLCBbX3ZtLl92KFwi5bqT5a2Y5qaC6KeIXCIpXSksIF92bS5fdihcIiBcIiksIF9jKCdlbC1idXR0b24nLCB7XG4gICAgYXR0cnM6IHtcbiAgICAgIFwidHlwZVwiOiBcInRleHRcIixcbiAgICAgIFwiaWNvblwiOiBcImRvY3VtZW50XCJcbiAgICB9XG4gIH0sIFtfdm0uX3YoXCLmlrDlu7rorrDlvZVcIildKSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLWJ1dHRvbicsIHtcbiAgICBhdHRyczoge1xuICAgICAgXCJ0eXBlXCI6IFwidGV4dFwiLFxuICAgICAgXCJpY29uXCI6IFwiZGF0ZVwiXG4gICAgfVxuICB9LCBbX3ZtLl92KFwi5oyJ5pyI5p+l55yLXCIpXSksIF92bS5fdihcIiBcIiksIF9jKCdlbC1idXR0b24nLCB7XG4gICAgYXR0cnM6IHtcbiAgICAgIFwidHlwZVwiOiBcInRleHRcIixcbiAgICAgIFwiaWNvblwiOiBcImNoZWNrXCJcbiAgICB9XG4gIH0sIFtfdm0uX3YoXCLmraPlnKjnlJ/kuqdcIildKSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLWJ1dHRvbicsIHtcbiAgICBhdHRyczoge1xuICAgICAgXCJ0eXBlXCI6IFwidGV4dFwiLFxuICAgICAgXCJpY29uXCI6IFwic2VhcmNoXCJcbiAgICB9XG4gIH0sIFtfdm0uX3YoXCLmkJzntKJcIildKSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLXRhYmxlJywge1xuICAgIHN0YXRpY1N0eWxlOiB7XG4gICAgICBcIndpZHRoXCI6IFwiMTAwJVwiXG4gICAgfSxcbiAgICBhdHRyczoge1xuICAgICAgXCJkYXRhXCI6IF92bS5kYXRhLFxuICAgICAgXCJzdHJpcGVcIjogXCJcIlxuICAgIH1cbiAgfSwgW19jKCdlbC10YWJsZS1jb2x1bW4nLCB7XG4gICAgYXR0cnM6IHtcbiAgICAgIFwicHJvcFwiOiBcIm1vZGVsXCIsXG4gICAgICBcImxhYmVsXCI6IFwi5ZCN56ewXCJcbiAgICB9XG4gIH0pLCBfdm0uX3YoXCIgXCIpLCBfYygnZWwtdGFibGUtY29sdW1uJywge1xuICAgIGF0dHJzOiB7XG4gICAgICBcInByb3BcIjogXCJjYXRlZ29yeVwiLFxuICAgICAgXCJsYWJlbFwiOiBcIuexu+Wei1wiXG4gICAgfVxuICB9KSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLXRhYmxlLWNvbHVtbicsIHtcbiAgICBhdHRyczoge1xuICAgICAgXCJwcm9wXCI6IFwiYnJhbmRcIixcbiAgICAgIFwibGFiZWxcIjogXCLlk4HniYxcIlxuICAgIH1cbiAgfSksIF92bS5fdihcIiBcIiksIF9jKCdlbC10YWJsZS1jb2x1bW4nLCB7XG4gICAgYXR0cnM6IHtcbiAgICAgIFwicHJvcFwiOiBcImZhY3Rvcnlfc2VyaWFsX251bWJlclwiLFxuICAgICAgXCJsYWJlbFwiOiBcIuW6j+WIl+WPt1wiXG4gICAgfVxuICB9KSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLXRhYmxlLWNvbHVtbicsIHtcbiAgICBhdHRyczoge1xuICAgICAgXCJwcm9wXCI6IFwicmVtYWluX2Ftb3VudFwiLFxuICAgICAgXCJsYWJlbFwiOiBcIuWJqeS9meaVsOmHj1wiLFxuICAgICAgXCJzb3J0YWJsZVwiOiBcIlwiXG4gICAgfVxuICB9KSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLXRhYmxlLWNvbHVtbicsIHtcbiAgICBhdHRyczoge1xuICAgICAgXCJsYWJlbFwiOiBcIlwiLFxuICAgICAgXCJ3aWR0aFwiOiBcIjEwMFwiXG4gICAgfSxcbiAgICBzY29wZWRTbG90czogX3ZtLl91KFtcbiAgICAgIFtcImRlZmF1bHRcIiwgZnVuY3Rpb24oc2NvcGUpIHtcbiAgICAgICAgcmV0dXJuIFtfYygnZWwtYnV0dG9uJywge1xuICAgICAgICAgIGF0dHJzOiB7XG4gICAgICAgICAgICBcInR5cGVcIjogXCJ0ZXh0XCIsXG4gICAgICAgICAgICBcImljb25cIjogXCJ2aWV3XCIsXG4gICAgICAgICAgICBcInNpemVcIjogXCJzbWFsbFwiXG4gICAgICAgICAgfVxuICAgICAgICB9KSwgX3ZtLl92KFwiIFwiKSwgX2MoJ2VsLWJ1dHRvbicsIHtcbiAgICAgICAgICBhdHRyczoge1xuICAgICAgICAgICAgXCJ0eXBlXCI6IFwidGV4dFwiLFxuICAgICAgICAgICAgXCJpY29uXCI6IFwiZWRpdFwiLFxuICAgICAgICAgICAgXCJzaXplXCI6IFwic21hbGxcIlxuICAgICAgICAgIH1cbiAgICAgICAgfSldXG4gICAgICB9XVxuICAgIF0pXG4gIH0pXSwgMSldLCAxKVxufSxzdGF0aWNSZW5kZXJGbnM6IFtdfVxubW9kdWxlLmV4cG9ydHMucmVuZGVyLl93aXRoU3RyaXBwZWQgPSB0cnVlXG5pZiAobW9kdWxlLmhvdCkge1xuICBtb2R1bGUuaG90LmFjY2VwdCgpXG4gIGlmIChtb2R1bGUuaG90LmRhdGEpIHtcbiAgICAgcmVxdWlyZShcInZ1ZS1ob3QtcmVsb2FkLWFwaVwiKS5yZXJlbmRlcihcImRhdGEtdi0yMzVjYjRmZlwiLCBtb2R1bGUuZXhwb3J0cylcbiAgfVxufVxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vfi92dWUtbG9hZGVyL2xpYi90ZW1wbGF0ZS1jb21waWxlcj97XCJpZFwiOlwiZGF0YS12LTIzNWNiNGZmXCJ9IS4vfi92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvci5qcz90eXBlPXRlbXBsYXRlJmluZGV4PTAhLi9yZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvc3RvY2tPdmVydmlldy52dWVcbi8vIG1vZHVsZSBpZCA9IDEwNVxuLy8gbW9kdWxlIGNodW5rcyA9IDEiLCIvLyB0aGlzIG1vZHVsZSBpcyBhIHJ1bnRpbWUgdXRpbGl0eSBmb3IgY2xlYW5lciBjb21wb25lbnQgbW9kdWxlIG91dHB1dCBhbmQgd2lsbFxuLy8gYmUgaW5jbHVkZWQgaW4gdGhlIGZpbmFsIHdlYnBhY2sgdXNlciBidW5kbGVcblxubW9kdWxlLmV4cG9ydHMgPSBmdW5jdGlvbiBub3JtYWxpemVDb21wb25lbnQgKFxuICByYXdTY3JpcHRFeHBvcnRzLFxuICBjb21waWxlZFRlbXBsYXRlLFxuICBzY29wZUlkLFxuICBjc3NNb2R1bGVzXG4pIHtcbiAgdmFyIGVzTW9kdWxlXG4gIHZhciBzY3JpcHRFeHBvcnRzID0gcmF3U2NyaXB0RXhwb3J0cyA9IHJhd1NjcmlwdEV4cG9ydHMgfHwge31cblxuICAvLyBFUzYgbW9kdWxlcyBpbnRlcm9wXG4gIHZhciB0eXBlID0gdHlwZW9mIHJhd1NjcmlwdEV4cG9ydHMuZGVmYXVsdFxuICBpZiAodHlwZSA9PT0gJ29iamVjdCcgfHwgdHlwZSA9PT0gJ2Z1bmN0aW9uJykge1xuICAgIGVzTW9kdWxlID0gcmF3U2NyaXB0RXhwb3J0c1xuICAgIHNjcmlwdEV4cG9ydHMgPSByYXdTY3JpcHRFeHBvcnRzLmRlZmF1bHRcbiAgfVxuXG4gIC8vIFZ1ZS5leHRlbmQgY29uc3RydWN0b3IgZXhwb3J0IGludGVyb3BcbiAgdmFyIG9wdGlvbnMgPSB0eXBlb2Ygc2NyaXB0RXhwb3J0cyA9PT0gJ2Z1bmN0aW9uJ1xuICAgID8gc2NyaXB0RXhwb3J0cy5vcHRpb25zXG4gICAgOiBzY3JpcHRFeHBvcnRzXG5cbiAgLy8gcmVuZGVyIGZ1bmN0aW9uc1xuICBpZiAoY29tcGlsZWRUZW1wbGF0ZSkge1xuICAgIG9wdGlvbnMucmVuZGVyID0gY29tcGlsZWRUZW1wbGF0ZS5yZW5kZXJcbiAgICBvcHRpb25zLnN0YXRpY1JlbmRlckZucyA9IGNvbXBpbGVkVGVtcGxhdGUuc3RhdGljUmVuZGVyRm5zXG4gIH1cblxuICAvLyBzY29wZWRJZFxuICBpZiAoc2NvcGVJZCkge1xuICAgIG9wdGlvbnMuX3Njb3BlSWQgPSBzY29wZUlkXG4gIH1cblxuICAvLyBpbmplY3QgY3NzTW9kdWxlc1xuICBpZiAoY3NzTW9kdWxlcykge1xuICAgIHZhciBjb21wdXRlZCA9IE9iamVjdC5jcmVhdGUob3B0aW9ucy5jb21wdXRlZCB8fCBudWxsKVxuICAgIE9iamVjdC5rZXlzKGNzc01vZHVsZXMpLmZvckVhY2goZnVuY3Rpb24gKGtleSkge1xuICAgICAgdmFyIG1vZHVsZSA9IGNzc01vZHVsZXNba2V5XVxuICAgICAgY29tcHV0ZWRba2V5XSA9IGZ1bmN0aW9uICgpIHsgcmV0dXJuIG1vZHVsZSB9XG4gICAgfSlcbiAgICBvcHRpb25zLmNvbXB1dGVkID0gY29tcHV0ZWRcbiAgfVxuXG4gIHJldHVybiB7XG4gICAgZXNNb2R1bGU6IGVzTW9kdWxlLFxuICAgIGV4cG9ydHM6IHNjcmlwdEV4cG9ydHMsXG4gICAgb3B0aW9uczogb3B0aW9uc1xuICB9XG59XG5cblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL34vdnVlLWxvYWRlci9saWIvY29tcG9uZW50LW5vcm1hbGl6ZXIuanNcbi8vIG1vZHVsZSBpZCA9IDE2XG4vLyBtb2R1bGUgY2h1bmtzID0gMSAyIiwiaW1wb3J0IFN0b2NrT3ZlcnZpZXcgZnJvbSAnLi9jb21wb25lbnRzL3N0b2NrT3ZlcnZpZXcudnVlJ1xuXG5jb25zdCBhZGRQYXJ0cyA9IG5ldyBWdWUoe1xuICBlbDogJyNtYWluJyxcbiAgY29tcG9uZW50czoge1xuICAnc3RvY2stb3ZlcnZpZXcnOiBTdG9ja092ZXJ2aWV3XG4gIH0sXG4gIHRlbXBsYXRlOiBcIjxzdG9jay1vdmVydmlldyA6ZGF0YXNvdXJjZT0nZGF0YXNvdXJjZSc+PC9zdG9jay1vdmVydmlldz5cIixcbiAgZGF0YToge1xuICAgIGRhdGFzb3VyY2U6ICcvYWpheC9wcm9kdWNlL2NyZWF0ZS9nZXRDcmVhdGVTdG9jaydcbiAgfVxufSlcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3Jlc291cmNlcy9hc3NldHMvanMvc3RvY2tPdmVydmlldy5qcyIsIjx0ZW1wbGF0ZT5cbiAgPGRpdj5cbiAgPGgxPuW6k+WtmOamguiniDwvaDE+XG4gIDxlbC1idXR0b24gdHlwZT1cInRleHRcIiBpY29uPVwiZG9jdW1lbnRcIj7mlrDlu7rorrDlvZU8L2VsLWJ1dHRvbj5cbiAgPGVsLWJ1dHRvbiB0eXBlPVwidGV4dFwiIGljb249XCJkYXRlXCI+5oyJ5pyI5p+l55yLPC9lbC1idXR0b24+XG4gIDxlbC1idXR0b24gdHlwZT1cInRleHRcIiBpY29uPVwiY2hlY2tcIj7mraPlnKjnlJ/kuqc8L2VsLWJ1dHRvbj5cbiAgPGVsLWJ1dHRvbiB0eXBlPVwidGV4dFwiIGljb249XCJzZWFyY2hcIj7mkJzntKI8L2VsLWJ1dHRvbj5cbiAgPGVsLXRhYmxlXG4gICAgOmRhdGE9XCJkYXRhXCJcbiAgICBzdHJpcGVcbiAgICBzdHlsZT1cIndpZHRoOiAxMDAlXCI+XG4gICAgPGVsLXRhYmxlLWNvbHVtblxuICAgICAgcHJvcD1cIm1vZGVsXCJcbiAgICAgIGxhYmVsPVwi5ZCN56ewXCI+XG4gICAgPC9lbC10YWJsZS1jb2x1bW4+XG4gICAgPGVsLXRhYmxlLWNvbHVtblxuICAgICAgcHJvcD1cImNhdGVnb3J5XCJcbiAgICAgIGxhYmVsPVwi57G75Z6LXCI+XG4gICAgPC9lbC10YWJsZS1jb2x1bW4+XG4gICAgPGVsLXRhYmxlLWNvbHVtblxuICAgICAgcHJvcD1cImJyYW5kXCJcbiAgICAgIGxhYmVsPVwi5ZOB54mMXCJcbiAgICAgID5cbiAgICAgIDwhLS0gPHRlbXBsYXRlIHNjb3BlPVwic2NvcGVcIj5cbiAgICAgICAgPGVsLXRhZ1xuICAgICAgICAgIHR5cGU9J3ByaW1hcnknXG4gICAgICAgICAgY2xvc2UtdHJhbnNpdGlvbj57e3Njb3BlLnJvdy50YWd9fTwvZWwtdGFnPlxuICAgICAgPC90ZW1wbGF0ZT4gLS0+XG4gICAgPC9lbC10YWJsZS1jb2x1bW4+XG4gICAgPGVsLXRhYmxlLWNvbHVtblxuICAgICAgcHJvcD1cImZhY3Rvcnlfc2VyaWFsX251bWJlclwiXG4gICAgICBsYWJlbD1cIuW6j+WIl+WPt1wiPlxuICAgIDwvZWwtdGFibGUtY29sdW1uPlxuICAgIDxlbC10YWJsZS1jb2x1bW5cbiAgICAgIHByb3A9XCJyZW1haW5fYW1vdW50XCJcbiAgICAgIGxhYmVsPVwi5Ymp5L2Z5pWw6YePXCJcbiAgICAgIHNvcnRhYmxlPlxuICAgIDwvZWwtdGFibGUtY29sdW1uPlxuICAgIDxlbC10YWJsZS1jb2x1bW5cbiAgICAgIGxhYmVsPVwiXCJcbiAgICAgIHdpZHRoPVwiMTAwXCI+XG4gICAgICA8dGVtcGxhdGUgc2NvcGU9XCJzY29wZVwiPlxuICAgICAgICA8ZWwtYnV0dG9uIHR5cGU9XCJ0ZXh0XCIgaWNvbj0ndmlldycgc2l6ZT1cInNtYWxsXCI+PC9lbC1idXR0b24+XG4gICAgICAgIDxlbC1idXR0b24gdHlwZT1cInRleHRcIiBpY29uPSdlZGl0JyBzaXplPVwic21hbGxcIj48L2VsLWJ1dHRvbj5cbiAgICAgIDwvdGVtcGxhdGU+XG4gICAgPC9lbC10YWJsZS1jb2x1bW4+XG4gIDwvZWwtdGFibGU+XG48L2Rpdj5cbjwvdGVtcGxhdGU+XG5cbjxzY3JpcHQ+XG4gIC8vIGltcG9ydCBzdG9ja092ZXJ2aWV3VGFibGUgZnJvbSAnLi9zdG9ja092ZXJ2aWV3VGFibGUudnVlJ1xuICBleHBvcnQgZGVmYXVsdCB7XG4gICAgcHJvcHM6IFsnZGF0YXNvdXJjZSddLFxuICAgIC8vIGNvbXBvbmVudHM6IHtcbiAgICAvLyAgICd0YWJsZS1vdmVydmlldyc6IHN0b2NrT3ZlcnZpZXdUYWJsZVxuICAgIC8vIH0sXG4gICAgZGF0YSAoKSB7XG4gICAgICByZXR1cm4ge1xuICAgICAgICAgZGF0YTpbXG4gICAgICAgICAgIHtcInN0b2NrX2lkXCI6MSxcIm1vZGVsXCI6XCI4NDItQTVcIixcImNhdGVnb3J5XCI6XCJcXHU2YzM0XFx1NmNmNVwiLFwiYnJhbmRcIjpcIkNSSVwiLFwib3JpZ2luX3NlcmlhbF9udW1iZXJcIjpcIjJrZDUzN3JrXCIsXCJmYWN0b3J5X3NlcmlhbF9udW1iZXJcIjpcInZqaGtcIixcInJlbWFpbl9hbW91bnRcIjoxOH0sXG4gICAgICAgICAgIHtcInN0b2NrX2lkXCI6MixcIm1vZGVsXCI6XCI2NEMtNTBcIixcImNhdGVnb3J5XCI6XCJcXHU2YzM0XFx1NmNmNVwiLFwiYnJhbmRcIjpcIkYzXCIsXCJvcmlnaW5fc2VyaWFsX251bWJlclwiOlwiNTZ5dHJcIixcImZhY3Rvcnlfc2VyaWFsX251bWJlclwiOlwieThnb2h1dmtqXCIsXCJyZW1haW5fYW1vdW50XCI6NDd9XVxuICAgICAgICAgIC8vICB7XCJzdG9ja19pZFwiOjMsXCJtb2RlbFwiOlwiQ0Y5NDAwXCIsXCJjYXRlZ29yeVwiOlwiXFx1NTM4YlxcdTdmMjlcXHU2NzNhXCIsXCJicmFuZFwiOlwiU0lLRVwiLFwib3JpZ2luX3NlcmlhbF9udW1iZXJcIjpcImZ3Z3VpdmtqanZyODkzXCIsXCJmYWN0b3J5X3NlcmlhbF9udW1iZXJcIjpcIjdyNnR5OG91aVwiLFwicmVtYWluX2Ftb3VudFwiOjN9LFxuICAgICAgICAgIC8vICB7XCJzdG9ja19pZFwiOjQsXCJtb2RlbFwiOlwiQ0Y2MTAwXCIsXCJjYXRlZ29yeVwiOlwiXFx1NTM4YlxcdTdmMjlcXHU2NzNhXCIsXCJicmFuZFwiOlwiU0lLRVwiLFwib3JpZ2luX3NlcmlhbF9udW1iZXJcIjpcIjZyOHQ3aW9namtyaGNzXCIsXCJmYWN0b3J5X3NlcmlhbF9udW1iZXJcIjpcIjl1OHk3aXR1XCIsXCJyZW1haW5fYW1vdW50XCI6ODN9XVxuICAgICAgICAvLyAgb3B0aW9uczogW3tcbiAgICAgICAgLy8gICAgdmFsdWU6ICdjYXRlZ29yeScsXG4gICAgICAgIC8vICAgIGxhYmVsOiAnY2F0ZWdvcnknLFxuICAgICAgICAvLyAgICBjaGlsZHJlbjogW3tcbiAgICAgICAgLy8gICAgICB2YWx1ZTogJ2ZhY3Rvcnlfc2VyaWFsX251bWJlcicsXG4gICAgICAgIC8vICAgICAgbGFiZWw6ICduYW1lJ1xuICAgICAgICAvLyAgICB9XVxuICAgICAgICAvLyAgfV0sXG4gICAgICAgfVxuICAgIH0sXG4gICAgbWV0aG9kczoge1xuICAgICAgZmlsdGVyQnJhbmQodmFsdWUsIHJvdykge1xuICAgICAgICBjb25zb2xlLmxvZyh2YWx1ZSwgcm93KVxuICAgICAgICByZXR1cm4gcm93LmJyYW5kID09PSB2YWx1ZTtcbiAgICAgIH1cbiAgICB9LFxuICAgIGNyZWF0ZWQoKSB7XG4gICAgICBheGlvcy5nZXQodGhpcy5kYXRhc291cmNlKVxuICAgICAgLnRoZW4ocmVzcG9uc2UgPT4ge1xuICAgICAgICAvLyBKU09OIHJlc3BvbnNlcyBhcmUgYXV0b21hdGljYWxseSBwYXJzZWQuXG4gICAgICAgIHRoaXMuZGF0YSA9IHJlc3BvbnNlLmRhdGFcbiAgICAgICAgY29uc29sZS5sb2codGhpcy5kYXRhKVxuICAgICAgfSlcbiAgICAgIC5jYXRjaChlID0+IHtcbiAgICAgICAgY29uc29sZS5lcnJvcihlKVxuICAgICAgfSlcbiAgICB9XG4gIH1cbjwvc2NyaXB0PlxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHN0b2NrT3ZlcnZpZXcudnVlPzViNjRkZWZhIl0sInNvdXJjZVJvb3QiOiIifQ==