<template>
    <el-row>
        <el-button @click.native="visible=true">{{title}}</el-button>
        <el-dialog v-model="visible" :title="title">
            <slot></slot>
            <span slot="footer">
                <el-button @click="visible = false">取消</el-button>
                <el-button type="primary">创建</el-button>
            </span>
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
