import OverviewTable from './components/overviewTable.vue';

new Vue({
    el: '#main',
    components: {
        'overview-table': OverviewTable
    },
    data: {
        url: '/ajax/stock/getInfo'
    }
});
