import AddParts from './components/addParts.vue'

const addParts = new Vue({
  el: '#add-parts',
  components: {
  'add-parts-btn': AddParts
  },
  template: "<add-parts-btn></add-parts-btn>",
})
