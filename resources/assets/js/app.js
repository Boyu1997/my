
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'

window.Vue = Vue

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-default/index.css';

Vue.use(ElementUI);

// import App from './App.vue';
import NavBar from './components/navBar.vue'
import SideBar from './components/sideBar.vue'

// const app = new Vue({
//   el: '#app',
//   render: h => h(App)
// });

const sideBar = new Vue({
  el: '#side-bar',
  render: h => h(SideBar)
})

const navBar = new Vue({
  el: '#nav-bar',
  components: {
  'nav-bar': NavBar
  },
  template: "<nav-bar :title='app.title' :username='app.username'></nav-bar>",
  data: {
    app: {
      'title': appstate.title,
      'username': appstate.username,
    }
  }
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
