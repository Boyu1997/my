<template>
    <el-table :data="data" border style="width: 100%">
        <el-table-column v-for="header in headers" :prop="header.prop" :label="header.lable" sortable>
        </el-table-column>
        <el-table-column
          label=""
          width="100">
          <template scope="scope">
            <el-button type="text" icon='view' size="small"></el-button>
            <el-button type="text" icon='edit' size="small"></el-button>
          </template>
        </el-table-column>
    </el-table>
</template>

<script>
    export default {
        props: ['url'],
        data () {
            return {
                headers: [],
                data:[],
            }
        },
        created() {
            axios.get(this.url)
                .then(response => {
                    // JSON responses are automatically parsed.
                    this.headers = response.data.headers;
                    this.data = response.data.data;
                })
                .catch(e => {
                    console.error(e)
                })
        }
    }
</script>
