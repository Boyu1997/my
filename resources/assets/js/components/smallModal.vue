<template>
    <el-row>
        <el-button @click.native="visible=true">添加零件</el-button>
        <el-dialog v-model="visible" :title="title">
            <slot></slot>
        </el-dialog>
    </el-row>
</template>

<script>
    export default {
        props: ['title'],
        data () {
            return {
                visible: false
            }
        }
    }
</script>
