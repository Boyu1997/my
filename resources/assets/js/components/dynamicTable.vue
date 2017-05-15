// identical as overviewTable.vue

<template>
    <el-table :data="data.items" border style="width: 100%">
        <el-table-column v-for="header in Object.keys(data.headers)" :key="header.id" :prop="header" :label="data.headers[header]" sortable>
        </el-table-column>
        <el-table-column
          label=""
          width="100">
          <template scope="scope">
            <!--<el-button type="text" icon='view' size="small"></el-button>-->
            <el-button type="text" icon='edit' size="small" @click="action('edit', scope.row)">编辑</el-button>
          </template>
        </el-table-column>
    </el-table>
</template>

<script>
    export default {
      props: {
        data: {
          type: Object,
          default: () => {
            return {
              headers: {
                stock_id: '库存编码',
                model: '型号',
                category: '类型',
                brand: '品牌',
                factory_serial_number: '工厂序列号',
                remain_amount: '剩余数量',
                quantity: '需要数量'
              },
              items: [
                {
                  brand: 'KGEF',
                  category: '铜管',
                  factory_serial_number: 'ghojk5trgv',
                  model: 'KK-4',
                  quantity: 16,
                  remain_amount: 3,
                  stock_id: 3
                }
              ]
            }
          }
        }
      },
      data () {
        return {}
      },
      methods: {
        action (type, e) {
          console.log(type, e)
        }
      }
    }
</script>
