

<template>
  <div id="app">
      <leftNav></leftNav>
      <div class="main">
          <router-view></router-view>
      </div>
  </div>
</template>

<script>
import leftNav from '@/components/common/leftNav'

export default {
    name: 'App',
    components: {
        leftNav
    }
}
</script>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: Helvetica Neue, Helvetica, PingFang SC, Hiragino Sans GB, Microsoft YaHei, SimSun, sans-serif;
    font-size: 14px;
    -webkit-font-smoothing: antialiased;
}

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  position: absolute;
  color: #2c3e50;
  width: 100%;
}
.main{
    float:left;
    width:95%;
    background-color: #EFF2F7;
    height:100%;
    overflow: auto;

}
</style>
