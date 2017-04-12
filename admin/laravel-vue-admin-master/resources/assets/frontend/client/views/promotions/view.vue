<template>
  <div>
    <div class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-6">
            <div class="image is-2by2">
              <img :src="this.promotion.images" />
            </div>
          </div>
          <div class="column is-5 is-offset-1">
            <div class="title is-2">{{this.promotion.name}}</div>
            <p class="title is-3 has-text-muted"> {{this.promotion.type}} $ 39.95</p>
            <hr>
            <br>
            <div class="columns">
              <div class="column is-three-quarters">
                <rating class="promo-rating" kind="growRotate" :items="items" :value="3"></rating>
              </div>
              <div class="column">
                <a class="show-all" href="#">show all</a>
              </div>
              <div class="column">
                <strong class="reviews">41 Reviews</strong>
              </div>
            </div>
            <br>
            <p>{{this.promotion.description}}</p>
            <br>
            <br>
            <p class="">
              <a href="#">
                <i class="fa fa-minus cart-icon"></i>
              </a>
              &nbsp;
              <input type="text" name="" class="input has-text-centered" value="1" style="width:40px;"> &nbsp;
              <a href="#">
                <i class="fa fa-plus cart-icon"></i>
              </a>
              &nbsp; &nbsp; &nbsp;
              <a class="button is-primary">Add to cart</a>
            </p>
            <br>
            <table class="table">
              <tbody>
                <tr>
                  <td class="has-text-right">
                    <strong>Item ID</strong>
                  </td>
                  <td>1234</td>
                </tr>
                <tr>
                  <td class="has-text-right">
                    <strong>Seller</strong>
                  </td>
                  <td>jsmith</td>
                </tr>
                <tr>
                  <td class="has-text-right">
                    <strong>Added</strong>
                  </td>
                  <td>3 days ago</td>
                </tr>
                <tr>
                  <td class="has-text-right">
                    <strong>Views</strong>
                  </td>
                  <td>3</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="tabs">
          <ul>
            <li class="is-active"><a>Overview</a></li>
            <li><a>Details</a></li>
            <li><a>Reviews</a></li>
            <li><a>Shipping Calculator</a></li>
          </ul>
        </div>
        <div class="box">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula magna, tempus sed nisi in, convallis porttitor quam. Quisque auctor nisl metus, quis rhoncus mi molestie non. Phasellus ornare nisi et lobortis lacinia. Mauris quis dolor vulputate,
            malesuada lacus at, gravida ipsum. Nam a viverra mi. Aenean at consequat libero, in porta diam. In id ipsum nec purus mattis blandit quis sed nisi. Suspendisse nulla tellus, viverra eu urna ut, mollis pulvinar sem. Pellentesque habitant morbi
            tristique senectus et netus et malesuada fames ac turpis egestas. Proin non magna sagittis, facilisis augue sed, ultricies felis. Mauris at neque sed nisl mollis aliquet. Etiam lacinia auctor dolor, sed condimentum odio efficitur a.
          </p><br>
          <p>
  
            Sed at risus enim. Nunc aliquet tellus a purus blandit lobortis. Duis condimentum sapien sed orci ornare mollis. Praesent eleifend ante magna, quis commodo risus pellentesque in. Donec eget porta leo. Sed vel dictum est. Ut dui lorem, volutpat vel risus
            in, dictum euismod ex. Aenean laoreet dapibus nulla, nec viverra massa feugiat vitae. Vestibulum elementum nec nisi dictum rhoncus. Nam placerat mi eu tortor tincidunt commodo. Duis posuere, sapien a laoreet dapibus, elit tortor laoreet est,
            eget dapibus dui justo vitae ipsum. Praesent sed augue nec leo hendrerit iaculis sit amet efficitur ante. Nunc ac maximus mauris. Sed luctus erat id elit tempor, a aliquam lacus sodales.
          </p><br>
          <p>
  
            Suspendisse sodales metus justo, ullamcorper iaculis purus interdum in. Sed ultricies enim felis, in interdum urna malesuada a. Morbi id ligula vel leo elementum dignissim quis vel purus. Donec iaculis, est ac maximus vestibulum, sapien mi lacinia urna,
            at laoreet felis lectus nec urna. Fusce egestas, neque vitae blandit scelerisque, leo arcu pellentesque risus, et volutpat neque nunc id massa. Aenean dapibus leo vel purus malesuada, eu ultrices nulla consequat. Duis erat orci, lobortis sed
            dictum id, pretium a nibh. Mauris pharetra ligula consequat gravida ornare.
          </p><br>
          <p>
  
            Sed a gravida sapien. Nam malesuada feugiat nunc, eu varius risus suscipit non. Nulla vitae odio fermentum, varius ligula et, iaculis enim. Mauris tempor in dolor non aliquet. Pellentesque ac mauris a augue tempus pharetra. Nulla facilisi. Vivamus sit
            amet lacus sagittis, ullamcorper nisi sit amet, consequat eros. Sed faucibus nulla vitae erat tristique ornare.
          </p><br>
          <p>
  
            Nullam sit amet magna ipsum. In tincidunt tincidunt tellus. Duis maximus vulputate elit sit amet auctor. Vestibulum a nunc consectetur, accumsan arcu eu, dapibus est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
            Donec vitae massa eget nulla gravida porta eu et sem. Sed in lorem id lectus auctor lobortis sed vel libero. Nam dapibus risus eu sodales consectetur. Fusce luctus sollicitudin ante et sodales. Curabitur eget justo turpis. Vestibulum vel nunc
            tellus. Morbi accumsan urna nibh, at malesuada odio faucibus accumsan.
          </p>
  
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <div class="content has-text-centered">
          <p>
            <strong>Bulma</strong> by <a href="http://jgthms.com">Jeremy Thomas</a>. The source code is licensed
            <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC ANS 4.0</a>.
          </p>
          <p>
            <a class="icon" href="https://github.com/jgthms/bulma">
              <i class="fa fa-github"></i>
            </a>
          </p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
  import router from '../../router'
  import Rating from 'vue-bulma-rating'
  
  const api = '/promotion/'
  
  export default {
    components: {
      router,
      Rating
    },
    data() {
      return {
        params: {},
        promotion: {
          title: "tz"
        },
        locations: [],
        labels: [],
        isloading: false,
        user: JSON.parse(localStorage.getItem('me')),
        value: 3,
        items: [{
            title: '5 Stars',
            value: 5
          },
          {
            title: '4 Stars',
            value: 4
          },
          {
            title: '3 Stars',
            value: 3
          },
          {
            title: '2 Stars',
            value: 2
          },
          {
            title: '1 Star',
            value: 1
          }
        ]
      }
    },
  
    methods: {
      loadData() {
        this.isloading = true
        let name = this.$route.params.name;
  
        this.$http({
          url: api + name,
          transformResponse: [(data) => {
            return JSON.parse(data)
          }],
          params: {}
        }).then((response) => {
          this.promotion = response.data
  
          this.promotion.images = JSON.parse(this.promotion.images);
  
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
  
  .card-user-name {
    font-size: 18px;
    font-weight: 700;
    line-height: 21px;
  }
  
  .card-user-name a {
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
    height: 20px;
  }
  
  .trending .trend-title {
    padding-bottom: 10px;
  }
  
  .trending .trend-hashtag {
    padding-bottom: 8px;
  }
</style>
