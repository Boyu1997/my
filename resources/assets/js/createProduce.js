import AddParts from './components/addParts.vue'

const addParts = new Vue({
  el: '#add-parts',
  components: {
  'add-parts': AddParts
  },
  template: "<add-parts :datasource='datasource'></add-parts>",
  data: {
    datasource: '/ajax/produce/create/getCreateStock'
  }
})
