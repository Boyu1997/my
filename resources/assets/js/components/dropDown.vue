<template>
    <el-cascader 
    placeholder="请搜索" 
    :options="options"
    ref="cascader"
    :value="currentValue"
    expand-trigger="hover"
    @change="updateValue($event)"
    filterable />
</template>

<script>
export default {
    props: {
        url: {
            type: String,
            default: ""
        },
        value: {
        }
    },
    data () {
        return {
            rawData:[]
        }
    },
    methods: {
        updateValue ($event){
            this.$emit('input', $event)
        }
    },
    computed: {
        currentValue (){
            return []
        },
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
                            label: d[v]['label'],
                            value: d[v]['value']
                        })
                    }
                }
                return ac
            }

            return map(this.rawData)
        }
    },
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
