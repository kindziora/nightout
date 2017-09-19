import lazyLoading from './lazyLoading'

export default {
  name: 'Promotions',
  path: '/promotions',
  meta: {
    icon: 'fa-heart-o',
    expanded: true,
    link: 'promotions/index.vue'
  },
  component: lazyLoading('promotions', true),

  children: [
    {
      name: 'anlegen',
      path: 'create',
      component: lazyLoading('promotions/create'),
      meta: {
        link: 'promotions/create.vue',
        icon: 'fa-plus'
      }
    }
  ]
}
