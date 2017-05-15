/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// # load environment
require('./bootstrap')

import Vue from 'vue'
window.Vue = Vue

// # load plugins
// ## load element ui
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-default/index.css'
Vue.use(ElementUI)

//## load vue-charts
import 'chart.js'
import 'hchs-vue-charts'
Vue.use(VueCharts)


// load app files
import NavBar from './components/navBar.vue'
import SideBar from './components/sideBar.vue'
import OverviewTable from './components/overviewTable.vue'
import SmallModal from './components/smallModal.vue'
import DropDown from './components/dropDown.vue'
import ProduceCreate from './components/produceCreate.vue'

// initialize Vue environment
const app = new Vue({
    el: '#app',
    components: {
        'nav-bar': NavBar,
        'side-bar': SideBar,
        'overview-table': OverviewTable,
        'drop-down': DropDown,
        'small-modal': SmallModal,
        'produce-create': ProduceCreate
    },
})


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });