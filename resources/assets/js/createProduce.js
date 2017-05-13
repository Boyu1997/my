import AddParts from './components/addParts.vue'

const addParts = new Vue({
    el: '#add-parts',
    components: {
        'add-parts': AddParts
    },
    template: "<add-parts :url='url'></add-parts>",
    data: {
        url: '/ajax/stock/overview'
    }
})
