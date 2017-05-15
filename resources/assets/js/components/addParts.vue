<template>
  <el-row>
    
  </el-row>
  <el-row>
    <el-button @click.native="visible = true">添加零件</el-button>
    <el-dialog v-model="visible" title="选择零件">
        <el-cascader placeholder="搜索零件" :options="options" filterable ></el-cascader>
        <span slot="footer" class="dialog-footer">
          <el-button @click="visible = false">取消</el-button>
          <el-button type="primary" @click="visible = false" id="create_stock_submit">确认</el-button>
        </span>
    </el-dialog>
 </el-row>
</template>

<script>
  export default {
    props: ['url'],
    data () {
      return {
         visible: false,
         rawData:[{"stock_id":1,"model":"842-A5","category":"\u6c34\u6cf5","brand":"CRI","origin_serial_number":"2kd537rk","factory_serial_number":"vjhk","remain_amount":18}]
       }
    },
    computed: {
      options () {
          const groupBy = function(xs, key) {
            return xs.reduce(function(rv, x) {
              (rv[x[key]] = rv[x[key]] || []).push(x);
              return rv;
            }, {});
          };
          const childrenKeyVal = function(d){
            return d.reduce(function(ac, v){
              ac.push({ label: v.model, value: v.stock_id})
              return ac
            }, [])
          };
          const keyValue = function(d){
            return Object.keys(d).reduce(function(ac,v){
              ac.push({
                label: v,
                value: v,
                children: childrenKeyVal(d[v])
              })
              return ac
            }, [])
          }
        return keyValue(groupBy(this.rawData,'category'))
      }
    },
    // methods: {
    //   getData
    // }
    created() {
      axios.get(this.url)
      .then(response => {
        // JSON responses are automatically parsed.
        this.rawData = response.data.data
        console.log(this.rawData)
      })
      .catch(e => {
        console.error(e)
      })
    }
  }
</script>
