<template>
    <div>
        <h1 class='h2'>新建生产</h1>
        <el-form ref="form" :model="form" label-width="120px">
            <el-form-item label="型号" prop="model">
                <el-input v-model="form.model" >
                </el-input>
            </el-form-item>
            <el-form-item label="序列号" prop="serialNumber">
                <el-input v-model="form.serialNumber">
                </el-input>
            </el-form-item>

            <el-form-item label="开始日期" prop="startDate">
                <el-date-picker v-model="form.startDate" type="date"> </el-date-picker>
            </el-form-item>

            <el-form-item label="结束日期" prop="endDate">
                <el-date-picker v-model="form.endDate" type="date"> </el-date-picker>
            </el-form-item>

            <el-form-item label="生产者" prop="producer">
                <drop-down v-model="form.producer" url="/ajax/produce/create/getProducer"></drop-down>
            </el-form-item>

            
            <el-form-item prop="components">
                <dynamic-table :data="componentsTableData"/>
                <el-button @click="modal.visible=true">添加零件</el-button>
                <el-dialog v-model="modal.visible" title="添加零件">
                    <el-form :model="modalForm" label-width="60px" :inline="true">
                        <el-form-item label="零件">
                            <drop-down url="/ajax/produce/create/getCreateStock" v-model="modalForm.component"></drop-down>
                        </el-form-item>
                        <el-form-item label="数量">
                            <el-input-number v-model="modalForm.quantity"></el-input-number>
                        </el-form-item>
                    </el-form>
                    <span slot="footer">
                        <el-button @click="modal.visible = false">取消</el-button>
                        <el-button @click="saveModal([],modalForm)" type="primary">创建</el-button>
                    </span>
                </el-dialog>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
import SmallModal from './smallModal.vue'
import DropDown from './dropDown.vue'
import DynamicTable from './dynamicTable.vue'
export default {
  data () {
    return {
      form: {
        model: 'who knows',
        serialNumber: 'asdcsdcwe',
        startDate: '2017-05-04',
        endDate: '2017-06-04',
        producer: 'LeoJamel',
        components: {
          5: {
            brand: 'KGEF',
            category: '铜管',
            factory_serial_number: 'ghojk5trgv',
            model: 'KK-4',
            quantity: 16,
            remain_amount: 3,
            stock_id: 5
          }
        }
      },
      modal: {
        visible: false
      },
      modalForm: {
        component: [''],
        quantity: 16
      },
      componentTableHeaders: {
        stock_id: '库存编码',
        model: '型号',
        category: '类型',
        brand: '品牌',
        factory_serial_number: '工厂序列号',
        remain_amount: '剩余数量',
        quantity: '需要数量'
      }
    }
  },
  methods: {
    saveModal (data) {
      console.log(data)
      const componentInfo = data.component.slice().pop()
      const stock_id = componentInfo.stock_id
      const tableInfo = Object.assign({}, componentInfo, {quantity: data.quantity})
      Vue.set(this.form.components, stock_id, tableInfo)
      this.modal.visible = false
    }
  },
  computed: {
    componentsTableData: function () {
      return {
        headers: this.componentTableHeaders,
        items: Object.keys(this.form.components).map((v) => { return this.form.components[v] })
      }
    }
  },
  components: {
    'drop-down': DropDown,
    'small-modal': SmallModal,
    'dynamic-table': DynamicTable
  }
}
</script>

<style>

</style>
