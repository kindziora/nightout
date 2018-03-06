<template>
 <div> 
    
    <div class="field is-grouped">
      <div class="field-label">
        <label class="label">was brauchst du?</label>
      </div>
       
        <div class="select is-fullwidth">
          <select v-model="location" @change="changeFilter()">
              <option value="essen" selected>essen</option>
              <option value="party">party</option>
              <option value="shopping">shopping</option>
            </select>
        </div>

    </div>
    
    <div class="tile is-ancestor" v-model="this.locations">
      <div class="tile is-parent" v-for="p in locations" :value="p">
        <router-link :to="{ path: 'events/' + p.id }">
          <article class="tile is-child box">

            <p class="title">{{p.title}}<span class="tag smallinfo">in {{(1000 % p.id) * 10 }}m</span></p>   
            
            <p class="subtitle">{{p.description}}</p>
            <div class="content has-text-centered">
              
              <figure class="image">
                <img v-bind:src="'/upload/images/300x/' + p.images[0]" />
              </figure>
              
            </div>

          </article>
        </router-link>
      </div>
    </div>
   <infinite-loading @infinite="loadData" ref="infiniteLoading">
      <span slot="no-more">
        alle events geladen!
      </span>
    </infinite-loading>
  </div>
</template>

<script>
  import router from 'vue-router'
  import InfiniteLoading from 'vue-infinite-loading';
  
  const api = '/events/list'
  
  export default {
    components: {
      router,
      InfiniteLoading
    },
    data() {
      return {
        params: {},
        locations: function(me) {
          return [];
          
          let items = localStorage.getItem(router.fullPath)
          return (items)?JSON.parse(items):[] 
        }(this),
        location : 'essen',
        labels: [],
        isloading: false,
        user: JSON.parse(localStorage.getItem('me'))
      }
    },
  
    methods: {
      changeFilter() {
        this.locations = [];
        this.$nextTick(() => {
          this.$refs.infiniteLoading.$emit('$InfiniteLoading:reset');
        });
      },
      loadData($state) {
        $state.isloading = true
        let name = this.$route.params.name;
        
        if(name === "me") {
           name = JSON.parse(localStorage.getItem('me')).name
           router.push({ path: '/events/user/' + name})
        }
        
        this.reqData = {
          user: name,
          latlng : {},
          location : '',
          page: this.locations.length / 5 + 1
        }
        
        this.$http({
          url: api,
          transformResponse: [(data) => {
            return JSON.parse(data)
          }],
          params: this.reqData
        }).then((response) => {

            if (response.data.data.length) {
              
              this.locations = this.locations.concat(response.data.data);
              
              for (var i in this.locations) {
                this.locations[i].images = typeof this.locations[i].images === "string"? JSON.parse(this.locations[i].images):this.locations[i].images
              }
              $state.isloading = false
              localStorage.setItem(router.fullPath, JSON.stringify(this.locations))
              $state.loaded();
              if (this.locations.length === response.data.total) {
                $state.complete();
              }
            } else {
              $state.complete();
            } 
            
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
  .smallinfo{
    font-size:12px;
    background-color:lightgray;
    float: right;
  }
  
  label{
    line-height: 32px;
  }
  .field-label, .select{
    flex:1;
  } 
  
  .box {
    box-shadow: 0 0 0 1px #d1d4d6!important;
  }
</style>
