<template>
  <form action="/register" method="POST">
    <div class="tile is-parent is-6 center-by-margin">
      <article class="tile is-child box">
        <h1 class="title">Anmelden!</h1>
        <h2 class="subtitle">Gleich gehts los</h2>
        <div class="block">
  
          <div class="field">
            <label class="label">Email</label>
            <p class="control has-icon has-icon-right">
              <input v-bind:class="{ 'is-warning': error.email }" class="input" type="email" name="email" placeholder="E-Mail">
              <span v-if="error.email" class="icon is-small">
                              <i class="fa fa-warning"></i>
                            </span>
            </p>
            <p v-for="err in error.email" class="help is-danger">{{err}}</p>
  
          </div>
  
          <div class="field">
            <label class="label">Username</label>
            <p class="control has-icon has-icon-right">
              <input v-bind:class="{ 'is-warning': error.name }" class="input" type="text" name="name" placeholder="dieser Name ist für alle sichtbar">
              <span v-if="error.name" class="icon is-small">
                              <i class="fa fa-warning"></i>
                            </span>
            </p>
            <p v-for="err in error.name" class="help is-danger">{{err}}</p>
          </div>
  
          <div class="field">
            <label class="label">Passwort</label>
            <p class="control has-icon has-icon-right">
              <input v-bind:class="{ 'is-warning': error.password }" class="input" type="Password" name="password" placeholder="Password">
              <span v-if="error.password" class="icon is-small">
                              <i class="fa fa-warning"></i>
                            </span>
            </p>
            <p v-for="err in error.password" class="help is-danger">{{err}}</p>
          </div>

          <div class="field">
            <label class="label">Passwort wiederholen</label>
            <p class="control has-icon has-icon-right">
              <input v-bind:class="{ 'is-warning': error.password_confirmation }" class="input" type="Password" name="password_confirmation" placeholder="Password nochmal">
              <span v-if="error.password_confirmation" class="icon is-small">
                              <i class="fa fa-warning"></i>
                            </span>
            </p>
            <p v-for="err in error.password_confirmation" class="help is-danger">{{err}}</p>
          </div>

          <div class="control">
            <label class="label">Bild</label>
            <div class="control">
              <input id="file" name="image[]" type="file" accept="image/*">
            </div>
          </div>
  
          <p class="control">
            <button class="button is-success" v-on:click.prevent="onSubmit">starten</button>
          </p>
  
        </div>
  
  
      </article>
    </div>
  </form>
</template>

<script>
  import FormData from 'form-data'
  import router from 'vue-router'
  import Vue from 'vue';
  import Notification from 'vue-bulma-notification'
  
  const NotificationComponent = Vue.extend(Notification)
  
  const openNotification = (propsData = {
    title: '',
    message: '',
    type: '',
    direction: '',
    duration: 14500
  }) => {
    return new NotificationComponent({
      el: document.createElement('div'),
      propsData
    })
  }
  
  
  export default {
    data() {
      return {
        error: {},
      }
    },
    components: {
      Notification
    },
    computed: {
      form_method: function() {
        return this.$el.method.toLowerCase()
      },
      form_action: function() {
        return this.$el.action.toLowerCase()
      }
    },
    methods: {
      onSubmit: function(event) {
        var formData = new FormData(this.$el)
        this.$http[this.form_method](this.form_action, formData)
          .then(this.successCallBack, this.errorCallBack)
          .catch(function(error) {
            console.log(error);
          })
      },
      successCallBack: function(response) {
        console.log('AjaxForm submission: SUCCESS')
  
        openNotification({
          title: 'Dein Account ' + response.data.title,
          message: 'Wurde erfolgreich angelegt.',
          type: "success"
        })
  
        localStorage.setItem("me", JSON.stringify(response.data))
  
        router.push({
          path: 'Home'
        })
      },
      errorCallBack: function(response) {
        this.$data.error = response.response.data
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
