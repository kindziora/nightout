import Vue from 'vue'
import Router from 'vue-router'
import menuModule from 'vuex-store/modules/menu'
Vue.use(Router)

export default new Router({
  mode: 'hash', // Demo is living in GitHub.io, so required!
  linkActiveClass: 'is-active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      name: 'Home',
      path: '/',
      component: require('../views/Home')
    },
    {
      name: 'login',
      path: '/login',
      component: require('../views/user/login')
    },
    {
      name: 'register',
      path: '/register',
      component: require('../views/user/register')
    },
    {
      name: 'Locations',
      path: '/locations/user/:name',
      component: require('../views/locations/index'),
      props: true 
    },
    {
      name: 'Location anlegen',
      path: '/locations/create',
      component: require('../views/locations/create')
    },
    {
      name: 'Location ansehen',
      path: '/locations/:name',
      component: require('../views/locations/view')
    },
    {
      name: 'Event anlegen',
      path: '/events/create',
      component: require('../views/events/create')
    },
    {
      name: 'Event ansehen',
      path: '/events/:name',
      component: require('../views/events/view')
    },
    {
      name: 'Promotion',
      path: '/promotions/create',
      component: require('../views/promotions/create')
    },
    {
      name: 'Promotion',
      path: '/promotions/:name',
      component: require('../views/promotions/view')
    },
    {
      name: 'Promotions',
      path: '/promotions',
      component: require('../views/promotions/index')
    },
    {
      name: 'Veranstalter ansehen',
      path: '/organizer/:name',
      component: require('../views/user/organizer/view')
    },
    ...generateRoutesFromMenu(menuModule.state.items),
    {
      path: '*',
      redirect: '/'
    }
  ]
})

// Menu should have 2 levels.
function generateRoutesFromMenu (menu = [], routes = []) {
  for (let i = 0, l = menu.length; i < l; i++) {
    let item = menu[i]
    if (item.path) {
      routes.push(item)
    }
    if (!item.component) {
      generateRoutesFromMenu(item.children, routes)
    }
  }
  return routes
}
