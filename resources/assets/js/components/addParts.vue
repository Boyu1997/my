<template>
  <el-row>
    <el-button @click.native="visible = true">添加零件</el-button>
    <el-dialog v-model="visible" title="选择零件">
                  <!-- <form class="form-horizontal">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="stock_id" class="col-sm-2 control-label">零件</label>
                              <div class="col-sm-10 col-md-9">
                                  <select class = "form-control" id="stock_category">
                                      <option value='0' required>请选择分类</option>
                                  </select>
                                  <select class = "form-control" id="stock_id">
                                      <option value='0' required>请选择零件</option>
                                  </select>
                                  <div class="error stock_id_error"></div>
                              </div>
                              <label for="use_amount" class="col-sm-2 control-label" required>使用数量</label>
                              <div class="col-sm-10 col-md-9">
                                  <input type="number" class="form-control" name="use_amount" id="use_amount" value="" placeholder="请输入使用数量">
                                  <div class="error use_amount_error"></div>
                                  <p class="text_after_iwnput">没有您在找的零件 ？请与库管人员联系或联系网站管理员。</p>
                              </div>
                          </div>
                      </div>
                  </form> -->
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
    props: ['datasource'],
    data () {
      return {
         visible: false,
         rawData:[
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
      axios.get(this.datasource)
      .then(response => {
        // JSON responses are automatically parsed.
        this.rawData = response.data
        console.log(this.rawData)
      })
      .catch(e => {
        console.error(e)
      })
    }
  }
</script>
