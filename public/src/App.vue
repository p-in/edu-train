<template>
  <div id="app">
        <Header></Header>
  </div>
</template>

<script>
import Header from '@/components/common/header'

export default {
    name: 'App',
    components: {
        Header
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
    background-color: #eee;
}

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  position: absolute;
  color: #2c3e50;
  width: 100%;
  overflow: hidden;
}
</style>
