<template>
  <div>
    <h2 class="tile">von {{this.$route.params.name}}</h2>
  
    <div class="tile is-ancestor" v-model="this.locations">
      <div class="tile is-parent" v-for="p in locations" :value="p">
      <router-link :to="{ path: 'location/' + p.id }">
          <article class="tile is-child box">
            <p class="title">{{p.title}}</p>
            <p class="subtitle">{{p.description}}</p>
            <div class="content">
    
              <img :src="p.images[1]" />
    
            </div>
    
          </article>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
  import Chart from 'vue-bulma-chartjs'
  import router from '../../router'
  
  const api = '/locations/list'
  
  export default {
    components: {
      Chart,
      router
    },
    data() {
      return {
        params: {},
        locations: [],
        labels: [],
        isloading: false,
        user: JSON.parse(localStorage.getItem('me'))
      }
    },
  
    methods: {
      loadData() {
        this.isloading = true
        let name = this.$route.params.name;
        
        if(name === "me") {
           name = JSON.parse(localStorage.getItem('me')).name
           router.push({ path: '/locations/user/' + name})
        }
        
        this.$http({
          url: api,
          transformResponse: [(data) => {
            return JSON.parse(data)
          }],
          params: {
            user: name,
            latlng : {}
          }
        }).then((response) => {
          this.locations = response.data.data
  
          for (var i in this.locations) {
            this.locations[i].images = JSON.parse(this.locations[i].images)
          }
          this.isloading = false
  
        }).catch((error) => {
          console.log(error)
        })
      }
    },
    mounted() {
      this.loadData()
    }
  }
</script>

<style scoped>
  
</style>
