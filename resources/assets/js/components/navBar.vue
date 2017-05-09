<template>
  <el-menu theme="dark" default-active='1' mode="horizontal" @select="handleSelect">
    <el-row type='flex' justify="end">
      <el-col>
        <el-menu-item index="1" disabled>{{ title }}</el-menu-item>
      </el-col>
      </el-col>
      <el-submenu index="2">
        <template slot="title">{{ username }}</template>
        <el-menu-item index="logout">logout</el-menu-item>
        <form id="logout-form" action="/logout" method="POST" style="display: none;">
          <input name="_token" :value='csrfToken'></input>
        </form>
      </el-submenu>
      </el-col>
    </el-row>
  </el-menu>
</template>

<script>
    export default {
      props: ['title','username'],
      data(){
        return {
          csrfToken: window.Laravel.csrfToken
        }
      },
      methods: {
        handleSelect (index, indexPath) {
          if(index=='logout'){
            event.preventDefault();
            document.getElementById('logout-form').submit();
          }
        }
      }
    }
</script>
