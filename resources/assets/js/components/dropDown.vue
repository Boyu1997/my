<template>
    <el-cascader placeholder="请搜索" :options="options" v-model="value" filterable ></el-cascader>
</template>

<script>
export default {
    //props: ['url'],
    data () {
        return {
            url: "ajax/produce/create/getCreateStock",
            options: [],
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

<script>
export default {
    props: {
        url: {
            type: String,
            default: ""
        },
    },
    data () {
        return {
            value: [],
            rawData:[]
        }
    },
    computed: {
        options () {
            const map = function(d){
                var ac = []
                var last_layer = false
                for (var k in d) {
                    if (d.hasOwnProperty(k) && d.constructor === Object) {
                        ac.push({
                            label: k,
                            value: k,
                            children: map(d[k])
                        })
                    }
                    else {
                        last_layer = true
                    }
                }
                if (last_layer) {
                    for (var v in d) {
                        ac.push({
                            label: d[v]['lable'],
                            value: d[v]['value']
                        })
                    }
                }
                return ac
            }

            return map(this.rawData)
        }
    },
    // methods: {
    //   getData
    // }
    created() {
        axios.get(this.url)
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
