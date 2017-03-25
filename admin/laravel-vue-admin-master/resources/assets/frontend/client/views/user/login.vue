<template>
  <form action="/login" method="POST">
    <div class="tile is-parent is-6 center-by-margin">
      <article class="tile is-child box">
        <h1 class="title">Hallo!</h1>
        <h2 class="subtitle">Gleich gehts los</h2>
        <div class="block">
          <p class="control has-icon">
            <input class="input" type="email" name="email" placeholder="E-Mail">
            <span class="icon is-small">
                    <i class="fa fa-envelope"></i>
                  </span>
          </p>
          <p class="control has-icon">
            <input class="input" type="password" name="password" placeholder="Password">
            <span class="icon is-small">
                    <i class="fa fa-lock"></i>
                  </span>
          </p>
          <p class="control">
            <button class="button is-success" v-on:click.prevent="onSubmit">
                    Login
                  </button>
          </p>
        </div>
      </article>
    </div>
  </form>
</template>

<script>
  import FormData from 'form-data'
  import router from '../../router'

  export default {
    computed: {
      form_method: function () {
        return this.$el.method.toLowerCase()
      },
      form_action: function () {
        return this.$el.action.toLowerCase()
      }
    },
    methods: {
      onSubmit: function (event) {
        var formData = new FormData(this.$el)
        this.$http[this.form_method](this.form_action, formData)
          .then(this.successCallBack, this.errorCallBack)
      },
      successCallBack: function (response) {
        console.log('AjaxForm submission: SUCCESS')
        router.push({ path: 'Home' })
      },
      errorCallBack: function (response) {
        console.log('AjaxForm submission: ERROR', response)
      }
    }
  }
</script>

<style>
  .center-by-margin {
    margin-left: auto;
    margin-right: auto;
  }
</style>
