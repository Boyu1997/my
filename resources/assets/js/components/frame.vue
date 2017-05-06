<template lang="html">
  <div>
    <nav-bar title='app.title' username='app.username'></nav-bar>
    <el-row>
      <el-cow :span:'4'>
        <side-bar></side-bar>
      </el-cow>
      <el-cow :span:'20'>
        {{ slot }}
      </el-cow>
    </el-row>
  </div>
</template>

<script>
import navBar from './navBar.vue'
import sideBar from './sideBar.vue'
export default {
  props: [appState],
  data () {
    return {
      appState: {
        currentView: '/',
      }
    }
  },
  components: {
    'nav-bar': navBar,
    'side-bar': sideBar
  }
  // computed: {},
  // methods: {}
}
</script>

<style lang="css">
</style>
