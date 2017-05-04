import StockOverview from './components/stockOverview.vue'

const addParts = new Vue({
  el: '#main',
  components: {
  'stock-overview': StockOverview
  },
  template: "<stock-overview :datasource='datasource'></stock-overview>",
  data: {
    datasource: '/ajax/produce/create/getCreateStock'
  }
})
