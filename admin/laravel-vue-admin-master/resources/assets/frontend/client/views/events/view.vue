<template>
  <div> 
<div class="columns">
        <div class="column is-3">
          <div class="card is-fullwidth">
            <header class="card-header">
            </header>
            <div class="card-content">
              <a class="card-avatar">
                <img src="http://placehold.it/128x128" class="card-avatar-img">
              </a>

              <div class="card-user">
                <div class="card-user-name">
                  <a href="#">{{this.$route.params.name}}</a>
                </div>
                <span>
                  <a href="#"><span>{{this.$route.params.description}}</span></a>
                </span>
              </div>

              <div class="card-stats">
                <ul class="card-stats-list">
                  <li class="card-stats-item">
                    <a href="#" title="9.840 Events">
                      <span class="card-stats-key">Events</span>
                      <span class="card-stats-val">23</span>
                    </a>
                  </li>
                  <li class="card-stats-item">
                    <a href="#/following" title="885 Following">
                      <span class="card-stats-key">visitors</span>
                      <span class="card-stats-val">0</span>
                    </a>
                  </li>
                  <li class="card-stats-item">
                    <a href="#">
                      <span class="card-stats-key">Watchers</span>
                      <span class="card-stats-val">0</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="spacer"></div>
          <div class="box trending">
            <p class="trend-title"><span class="title is-5">Trends</span> · <a href="#">change</a></p>
            <p class="trend-hashtag"><a href="#">#hashtag1</a><br>13k statuses</p>
            <p class="trend-hashtag"><a href="#">#hashtag2</a><br>29k statuses</p>
          </div>
        </div>
        <div class="column is-6">
          
          <div class="box">
            <article class="media">
              <div class="media-left">
                <figure class="image is-64x64">
                  <img src="http://placehold.it/128x128" alt="Image">
                </figure>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>John Smith</strong> <small>@johnsmith</small> <small style="float:right;">31m</small>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                  </p>
                </div>
                <nav class="level">
                  <div class="level-left">
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-reply"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-heart"></i></span>
                    </a>
                  </div>
                </nav>
              </div>
            </article>
            <article class="media">
              <div class="media-left">
                <figure class="image is-64x64">
                  <img src="http://placehold.it/128x128" alt="Image">
                </figure>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>John Smith</strong> <small>@johnsmith</small> <small style="float:right;">31m</small>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                  </p>
                </div>
                <nav class="level">
                  <div class="level-left">
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-reply"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-heart"></i></span>
                    </a>
                  </div>
                </nav>
              </div>
            </article>
            <article class="media">
              <div class="media-left">
                <figure class="image is-64x64">
                  <img src="http://placehold.it/128x128" alt="Image">
                </figure>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>John Smith</strong> <small>@johnsmith</small> <small style="float:right;">31m</small>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                  </p>
                </div>
                <nav class="level">
                  <div class="level-left">
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-reply"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-heart"></i></span>
                    </a>
                  </div>
                </nav>
              </div>
            </article>
            <article class="media">
              <div class="media-left">
                <figure class="image is-64x64">
                  <img src="http://placehold.it/128x128" alt="Image">
                </figure>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>John Smith</strong> <small>@johnsmith</small> <small style="float:right;">31m</small>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                  </p>
                </div>
                <nav class="level">
                  <div class="level-left">
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-reply"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-heart"></i></span>
                    </a>
                  </div>
                </nav>
              </div>
            </article>
            <article class="media">
              <div class="media-left">
                <figure class="image is-64x64">
                  <img src="http://placehold.it/128x128" alt="Image">
                </figure>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>John Smith</strong> <small>@johnsmith</small> <small style="float:right;">31m</small>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                  </p>
                </div>
                <nav class="level">
                  <div class="level-left">
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-reply"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-heart"></i></span>
                    </a>
                  </div>
                </nav>
              </div>
            </article>
            <article class="media">
              <div class="media-left">
                <figure class="image is-64x64">
                  <img src="http://placehold.it/128x128" alt="Image">
                </figure>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>John Smith</strong> <small>@johnsmith</small> <small style="float:right;">31m</small>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                  </p>
                </div>
                <nav class="level">
                  <div class="level-left">
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-reply"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-heart"></i></span>
                    </a>
                  </div>
                </nav>
              </div>
            </article>
            <article class="media">
              <div class="media-left">
                <figure class="image is-64x64">
                  <img src="http://placehold.it/128x128" alt="Image">
                </figure>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>John Smith</strong> <small>@johnsmith</small> <small style="float:right;">31m</small>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                  </p>
                </div>
                <nav class="level">
                  <div class="level-left">
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-reply"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-heart"></i></span>
                    </a>
                  </div>
                </nav>
              </div>
            </article>
            <article class="media">
              <div class="media-left">
                <figure class="image is-64x64">
                  <img src="http://placehold.it/128x128" alt="Image">
                </figure>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>John Smith</strong> <small>@johnsmith</small> <small style="float:right;">31m</small>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                  </p>
                </div>
                <nav class="level">
                  <div class="level-left">
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-reply"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-heart"></i></span>
                    </a>
                  </div>
                </nav>
              </div>
            </article>
            <article class="media">
              <div class="media-left">
                <figure class="image is-64x64">
                  <img src="http://placehold.it/128x128" alt="Image">
                </figure>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>John Smith</strong> <small>@johnsmith</small> <small style="float:right;">31m</small>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                  </p>
                </div>
                <nav class="level">
                  <div class="level-left">
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-reply"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                    </a>
                    <a class="level-item">
                      <span class="icon is-small"><i class="fa fa-heart"></i></span>
                    </a>
                  </div>
                </nav>
              </div>
            </article>
          </div>
        </div>
        <div class="column is-3">
          <div class="box">
            <p><span class="title is-5">Who to follow</span> · <a href="#">Refresh</a> · <a href="#">View All</a></p>
            <hr>
            <div class="columns">
              <div class="column is-3 is-marginless">
                <div class="image">
                  <img src="https://placehold.it/200x200">
                </div>
              </div>
              <div class="column is-9">
                <p>
                  <a href="#">
                    <strong>John Smith</strong>
                    @jsmith
                  </a> 
                  <a href="#">
                    <i class="fa fa-times"></i>
                  </a>
                </p>
                <a class="button is-primary is-small">
                  <span>
                    + Follow
                  </span>
                </a>
              </div>
            </div>
            <div class="columns">
              <div class="column is-3 is-marginless">
                <div class="image">
                  <img src="https://placehold.it/200x200">
                </div>
              </div>
              <div class="column is-9">
                <p>
                  <a href="#">
                    <strong>Jane Smith</strong>
                    @janesmith
                  </a> 
                  <a href="#">
                    <i class="fa fa-times"></i>
                  </a>
                </p>
                <a class="button is-primary is-small">
                  <span>
                    + Follow
                  </span>
                </a>
              </div>
            </div>
            <div class="columns">
              <div class="column is-3 is-marginless">
                <div class="image">
                  <img src="https://placehold.it/200x200">
                </div>
              </div>
              <div class="column is-9">
                <p>
                  <a href="#">
                    <strong>Mike Scott</strong>
                    @mscott
                  </a> 
                  <a href="#">
                    <i class="fa fa-times"></i>
                  </a>
                </p>
                <a class="button is-primary is-small">
                  <span>
                    + Follow
                  </span>
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>




    <div class="tile is-ancestor" v-model="this.locations">
      <div class="tile is-parent" v-for="p in locations" :value="p">
        <article class="tile is-child box">
          <p class="title">{{p.title}}</p>
          <p class="subtitle">{{p.description}}</p>
          <div class="content">
  
            <img :src="p.images[1]" />
  
          </div>
  
        </article>
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
  .section.main {
  background-color: #f5f8fa;
}
.card-header {
    background-image: url("http://placehold.it/600x200");
    background-position: 0 50%;
    background-size: 100% auto;
    border-bottom: 1px solid #e1e8ed;
    border-radius: 4px 4px 0 0;
    height: 95px;
    width: 100%;
}
.card-content {
    padding: 0px;
}
.card-avatar {
  background-color: #fff;
  border-radius: 6px;
  display: inline-block !important;
  float: left;
  margin: -30px 5px 0 8px;
  max-width: 100%;
  padding: 1px;
  vertical-align: bottom;
}
.card-avatar-img {
  border: 2px solid #fff;
  border-radius: 7px;
  box-sizing: border-box;
  color: #fff;
  height: 72px;
  width: 72px;
}
.card-user {
    margin: 5px 0 0;
}
.card-user-name{
    font-size: 18px;
    font-weight: 700;
    line-height: 21px;
}
.card-user-name a{
    color: inherit !important;
}
.card-stats {
    margin-left: 11px;
    padding: 10px 0;
}
.card-stats-list {
    box-sizing: border-box;
    display: table;
    margin: 0;
    min-width: 100%;
    padding: 0;
    table-layout: auto;
}
ul.card-stats-list {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.card-stats-item {
    display: table-cell;
    padding: 0;
    vertical-align: top;
}
.card-stats-item a:hover {
    text-decoration: none;
}
.card-stats-val {
    display: block;
    font-size: 18px;
    font-weight: 500;
    transition: color 0.15s ease-in-out 0s;
}
.card-stats-key {
    color: #8899a6;
    font-size: 10px;
    letter-spacing: 0.02em;
    overflow: hidden;
    text-transform: uppercase;
    transition: color 0.15s ease-in-out 0s;
}
.spacer {
  height:20px;
}

.trending .trend-title {
  padding-bottom: 10px;
}

.trending .trend-hashtag {
  padding-bottom: 8px;
}
</style>
