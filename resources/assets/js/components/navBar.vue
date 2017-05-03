<template>
  <el-menu theme="dark" default-active='1' mode="horizontal">
    <el-row type='flex' justify="space-between">
      <el-col>
        <el-menu-item index="1" disabled>{{ title }}</el-menu-item>
      </el-col>
      <el-submenu index="2">
        <template slot="title">{{ username }}</template>
        <el-menu-item index="2-1">item one</el-menu-item>
        <el-menu-item index="2-2">item two</el-menu-item>
        <el-menu-item index="2-3">logout</el-menu-item>
      </el-submenu>
    </el-row>
  </el-menu>
</template>

<script>
    export default {
      props: ['title','username'],
      mounted() {
          console.log('Component mounted.')
      }
    }
</script>
