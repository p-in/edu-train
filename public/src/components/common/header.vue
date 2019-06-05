<template>
    <el-row class="container">
        <!-- header -->
        <el-col :span="24" class="header">
            <el-col :span="10" class="logo" :class="collapsed?'logo-width':'logo-collapse-width'">
                {{collapsed?'JS':sysName}}
            </el-col>
            <el-col :span="10">
                <div class="tools" @click.prevent="collapse">
                    <i class="el-icon-s-unfold"></i>
                </div>
            </el-col>
            <el-col :span="4" class="userinfo">
                <el-dropdown trigger="hover">
                    <span class="el-dropdown-link userinfo-inner"><img
                            :src="this.sysUserAvatar"/> {{sysUserName}}</span>
                    <el-dropdown-menu slot="dropdown">
                        <el-dropdown-item>我的消息</el-dropdown-item>
                        <el-dropdown-item>设置</el-dropdown-item>
                        <el-dropdown-item divided @click.native="">退出登录</el-dropdown-item>
                    </el-dropdown-menu>
                </el-dropdown>
            </el-col>
        </el-col>
        <!-- 左侧导航 -->
        <el-col :span="24" class="main">
            <aside :class="collapsed?'menu-collapsed':'menu-expanded'">
                <el-menu  class="el-menu-vertical-demo"  unique-opened router
                         background-color="#333" text-color="#fff" active-text-color="#ffd04b" :collapse="collapsed">
                    <template v-for="(item,index) in $router.options.routes" v-if="!item.hidden">
                        <el-submenu :index="index+''" v-if="!item.leaf">
                            <template slot="title">
                                <i :class="item.icon"></i>
                                <span slot="title">{{item.name}}</span>
                            </template>
                            <el-menu-item v-for="child in item.children" :index="child.path" :key="child.path"
                                          v-if="!child.hidden">{{child.name}}
                            </el-menu-item>
                        </el-submenu>
                        <el-menu-item v-if="item.leaf&&item.children.length>0" :index="item.children[0].path"><i
                                :class="item.icon"></i>{{item.children[0].name}}
                        </el-menu-item>
                    </template>
                </el-menu>
            </aside>
            <transition name="fade" mode="out-in">
            <section class="content-container">
                <div class="grid-content bg-purple-light">
                    <el-col :span="24" class="breadcrumb-container">
                        <strong class="title">{{$route.name}}</strong>
                        <el-breadcrumb separator="/" class="breadcrumb-inner">
                            <el-breadcrumb-item v-for="item in $route.matched" :key="item.path">
                                {{ item.name }}
                            </el-breadcrumb-item>
                        </el-breadcrumb>
                    </el-col>
                    <el-col :span="24" class="content-wrapper">
                        <transition name="fade" mode="out-in">
                            <router-view></router-view>
                        </transition>
                    </el-col>
                </div>
            </section>
            </transition>
        </el-col>
    </el-row>
</template>

<script>
  export default {
    name: 'Header',
    data() {
      return {
        collapsed: true,
        sysUserAvatar: '../static/images/user.png',
        sysName: '简书',
        sysUserName: '简跃'
      }
    },
    methods: {
      //折叠导航栏
      collapse: function () {
        this.collapsed = !this.collapsed;
      },
    }
  }
</script>
<style scoped>
    .container {
        height: 100%;
    }

    .el-menu-vertical-demo {
        height: 100%;
    }

    .el-menu-vertical-demo:not(.el-menu--collapse) {
        width: 230px;
    }

    .header {
        height: 60px;
        line-height: 60px;
        background: #05a19c;
        color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, .12), 0 0 6px rgba(0, 0, 0, .04)
    }

    .main {
        display: flex;
        position: absolute;
        top: 60px;
        bottom: 0;
        overflow: hidden;
        height: 100%;
    }

    .main aside {
        width: 230px;
        height: 100%;
    }
    .main aside .el-menu{
        height: 100%;
    }
    .main aside .collapsed {
        width: 60px;
    }
    .main aside .collapsed .item{
        position: relative;
    }
    .main aside .collapsed .submenu{
        position:absolute;
        top:0;
        left:60px;
        z-index:99999;
        height:auto;
        display:none;
    }

    .logo {
        width: 230px;
        height: 60px;
        font-size: 22px;
        padding-left: 20px;
        padding-right: 20px;
        border-color: rgba(238, 241, 146, 0.3);
        border-right-width: 1px;
        border-right-style: solid;
    }

    .tools {
        padding: 0 23px;
        width: 14px;
        height: 60px;
        line-height: 60px;
        cursor: pointer;
    }

    .userinfo {
        text-align: right;
        padding-right: 35px;
        float: right;
    }

    .userinfo .userinfo-inner {
        cursor: pointer;
        color: #fff;
    }

    .userinfo .userinfo-inner img {
        width: 40px;
        height: 40px;
        border-radius: 20px;
        margin: 10px 0 10px 10px;
        float: right;
    }

    .main .content-container {
        margin: 20px 0 0 20px;
        /*background-color: #fff;*/
        flex: 1;
        overflow-y: scroll;
        padding: 20px;
        border-radius: 10px;
        /*box-shadow: 0 2px 4px rgba(0, 0, 0, .12), 0 0 6px rgba(0, 0, 0, .04)*/
    }
    .main .content-container .breadcrumb-container .title{
        width: 200px;
        float: left;
        color: #475669;
    }
    .main .content-container .breadcrumb-container .breadcrumb-inner {
        float: right;
    }
    .main .content-container .content-wrapper {
        text-align: left;
        box-sizing: border-box;
    }

    .logo-collapse-width {
        width: 230px;
    }

    .logo-width {
        width: 60px
    }

    .menu-collapsed {
        flex: 0 0 60px;
        width: 60px;
    }

    .menu-expanded {
        flex: 0 0 230px;
        width: 230px;
    }
</style>