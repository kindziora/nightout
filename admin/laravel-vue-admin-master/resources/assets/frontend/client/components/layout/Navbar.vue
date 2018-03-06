<template>
  <section class="hero is-bold app-navbar animated" :class="{ slideInDown: show, slideOutDown: !show }">
    <div class="hero-head">
      <nav class="nav">
        
        <div class="nav-left">
          <a class="nav-item is-hidden-tablet" @click="toggleSidebar(!sidebar.opened)">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </a>
           <a class="nav-item is-tab" href="/user/news">
            <i class="fa fa-star"></i>
          </a>
        </div>
        <div class="nav-center">
     
        </div>
        <div class="nav-right is-flex">
          
          <router-link :to="{ path: 'events' }"  class="nav-item is-tab">
            <i class="fa fa-bell-o"> </i>
          </router-link>
          
       <expanding v-if="user">
          <router-link :to="{ path: 'logout' }" class="nav-item is-tab">
              <i class="fa fa-sign-out"> </i>
         </router-link> 
       </expanding>
         
        
           
        </div>
     
      </nav>
    </div>
  </section>
</template>

<script>
  import Tooltip from 'vue-bulma-tooltip'
  
  import router from 'vue-router'
  
  import {
    mapGetters,
    mapActions
  } from 'vuex'
  
  export default {
  
    components: {
      Tooltip,
      router
    },
  
    props: {
      show: Boolean
    },
  
    computed: mapGetters({
      pkginfo: 'pkg',
      sidebar: 'sidebar'
    }),
  
    methods: mapActions([
      'toggleSidebar'
    ])
  }
</script>


<style lang="scss">
  @import '~bulma/sass/utilities/variables';
  .app-navbar {
    position: fixed;
    min-width: 100%;
    z-index: 1024;
    box-shadow: 0 2px 3px rgba(17, 17, 17, 0.1), 0 0 0 1px rgba(17, 17, 17, 0.1);
    .container {
      margin: auto 10px;
    }
    .nav-right {
      align-items: stretch;
      align-items: stretch;
      flex: 1;
      justify-content: flex-end;
      overflow: hidden;
      overflow-x: auto;
      white-space: nowrap;
    }
  }
  
  .hero-brand {
    .vue {
      margin-left: 10px;
      color: #fff;
    }
    .admin {
      color: #28374B;
    }
  }
</style>
