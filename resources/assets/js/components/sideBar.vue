<template>
    <el-menu mode="vertical" :default-active='activeIndex'>
      <el-menu-item-group v-for="group in data" title="" :key="group.id">
        <el-menu-item :index="url" v-for="(url, label) in group" :key="url.id" @click="openUrl(url)">{{label}}</el-menu-item>
      </el-menu-item-group>
    </el-menu>
</template>

<script>
    export default {
        props: {
            url: {
                type: String,
                default: '/ajax/privilege/getNavigation'
            },
        },
        data(){
            return {
                data: {"group_1":{"\u9996\u9875":"\/"},
                    "group_2":{"\u91c7\u8d2d":"\/purchase","\u5de5\u8d44":"\/wage","\u51fa\u5dee":"\/travel"}}
            }
        },
        computed: {
            activeIndex(){
                return '/'+window.location.pathname.split('/')[1]
            }
        },
        methods: {
            openUrl (url) {
                window.location = url;
            }
        },
        mounted() {
            axios.get(this.url)
            .then(response => {
                this.data = response.data
            })
            .catch(e => {
                console.error(e)
            })
        }
    }
</script>
