<template>

  <el-table
    :data="data"
    stripe
    style="width: 100%">
    <el-table-column
      prop="model"
      label="名称">
    </el-table-column>
    <el-table-column
      prop="category"
      label="类型">
    </el-table-column>
    <el-table-column
      prop="brand"
      label="品牌"
      >
      <!-- <template scope="scope">
        <el-tag
          type='primary'
          close-transition>{{scope.row.tag}}</el-tag>
      </template> -->
    </el-table-column>
    <el-table-column
      prop="factory_serial_number"
      label="序列号">
    </el-table-column>
    <el-table-column
      prop="remain_amount"
      label="剩余数量"
      sortable>
    </el-table-column>
    <el-table-column
      label=""
      width="100">
      <template scope="scope">
        <el-button type="text" size="small">查看</el-button>
        <el-button type="text" size="small">编辑</el-button>
      </template>
    </el-table-column>
  </el-table>
</template>

<script>
  // import stockOverviewTable from './stockOverviewTable.vue'
  export default {
    props: ['datasource'],
    // components: {
    //   'table-overview': stockOverviewTable
    // },
    data () {
      return {
         data:[
           {"stock_id":1,"model":"842-A5","category":"\u6c34\u6cf5","brand":"CRI","origin_serial_number":"2kd537rk","factory_serial_number":"vjhk","remain_amount":18},
           {"stock_id":2,"model":"64C-50","category":"\u6c34\u6cf5","brand":"F3","origin_serial_number":"56ytr","factory_serial_number":"y8gohuvkj","remain_amount":47}]
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
       }
    },
    methods: {
      filterBrand(value, row) {
        console.log(value, row)
        return row.brand === value;
      }
    },
    created() {
      axios.get(this.datasource)
      .then(response => {
        // JSON responses are automatically parsed.
        this.data = response.data
        console.log(this.data)
      })
      .catch(e => {
        console.error(e)
      })
    }
  }
</script>
