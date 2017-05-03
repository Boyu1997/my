<template>
  <el-row>
    <el-button @click.native="visible = true">添加零件</el-button>
    <el-dialog v-model="visible" title="选择零件">
                  <form class="form-horizontal">
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
                  </form>
        <el-cascader placeholder="Try searching: Guide" :options="options" filterable ></el-cascader>
        <span slot="footer" class="dialog-footer">
          <el-button @click="visible = false">取消</el-button>
          <el-button type="primary" @click="visible = false" id="create_stock_submit">确认</el-button>
        </span>
    </el-dialog>
 </el-row>
</template>

<script>
  export default {
    data: function() {
      return {
         visible: false,
         options: [{
           value: 'category1',
           label: 'Category',
           children: [{
             value: 'item1',
             label: 'item 1'
           }]
         }],
           props: {
             label: 'label',
             value: 'label',
             children: 'parts'
         }
       }
    }
  }
</script>
