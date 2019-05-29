<template>
    <el-row class="container">
        <!-- header -->
        <el-col :span="24" class="header">
            <el-col :span="10" class="logo" :class="collapsed?'logo-width':'logo-collapse-width'">
                {{collapsed?'':sysName}}
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
                        <el-dropdown-item divided @click.native="logout">退出登录</el-dropdown-item>
                    </el-dropdown-menu>
                </el-dropdown>
            </el-col>
        </el-col>
        <!-- 左侧导航 -->
        <el-col class="main">
            <aside :class="collapsed?'menu-collapsed':'menu-expanded'">
                <el-menu  class="el-menu-vertical-demo"  unique-opened router
                         background-color="#000" text-color="#fff" active-text-color="#ffd04b" :collapse="collapsed">
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
                            1234
                            <router-view></router-view>
                        </transition>
                    </el-col>
                </div>
            </section>
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

    .main {
        height: 100%;
    }

    .el-menu-vertical-demo {
        height: 100%;
    }

    .el-menu-vertical-demo:not(.el-menu--collapse) {
        width: 200px;
    }

    .header {
        height: 60px;
        line-height: 60px;
        background: #fff;
        color: #333;

    }

    .main aside {
        flex: 0 0 230px;
        width: 230px;
        height: 100%;
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
        flex: 1;
        overflow-y: scroll;
        padding: 20px;
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