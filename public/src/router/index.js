import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import User from '@/components/user/Index'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: '首页',
      component: Home,
      icon: 'el-icon-s-home',
    },
    {
      path: '/',
      name:'用户管理',
      component: User,
      icon: 'el-icon-user-solid',
      children: [
        {
          path: '/user-list',
          name:'用户列表',
          component: User,
        }
      ]
    }

  ]
})
