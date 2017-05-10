<template>
    <el-menu mode="vertical" default-active="1" class="el-menu-vertical-demo">

      <el-menu-item-group v-for="group in data" title="" :key="group.id">
        <el-menu-item index="1" v-for="(url, label) in group" :key="url.id" @click="openUrl(url)">{{label}}</el-menu-item>
      </el-menu-item-group>
    </el-menu>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            axios.get(this.url)
            .then(response => {
                this.data = response.data
            })
            .catch(e => {
                console.error(e)
            }) 
        },
        data(){
            return {
                url: '/ajax/privilege/getNavigation',
                data: {"group_1":{"\u9996\u9875":"\/"},
                    "group_2":{"\u91c7\u8d2d":"\/purchase","\u5de5\u8d44":"\/wage","\u51fa\u5dee":"\/travel"}}
            }
        },
        methods: {
            openUrl (url) {
                window.location = url;
                console.log(url)
            }
        }
    }
</script>
