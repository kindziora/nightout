<template>
  <footer class="footer">
    <div class="container">
      <div class="content has-text-centered">
        <p class="social">
          <a :href="'https://github.com/' + repository">
            <span class="icon">
              <i class="fa fa-github"></i>
            </span>
          </a>
          <a href="https://twitter.com/pira">
            <span class="icon">
              <i class="fa fa-twitter"></i>
            </span>
          </a>
        </p>
        <p>pirata by Alexander Kindziora <a :href="'https://github.com/' + repository + '/blob/master/LICENSE'">{{ license }}</a>.</p>
      </div>
    </div>
  </footer>
</template>

<script>
export default {

  data () {
    return this.$store.state.pkg
  }

}
</script>

<style lang="scss">
@import '~bulma/sass/utilities/mixins';

.footer {
  margin-left: 180px;
  
  @include mobile() {
    margin-left: 0;
  }
  
  .social a {
    border-bottom: none !important;
  }

  .fa.fa-heart {
    color: red;
  }
}
</style>
<style src="../../assets/css/bulmaswatch.min.css"></style>