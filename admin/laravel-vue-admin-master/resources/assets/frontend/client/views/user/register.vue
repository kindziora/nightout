<template>
  <form action="/register" method="POST">
    <div class="tile is-parent is-12 center-by-margin">
      <article class="tile is-child box">
        <h1 class="title">Anmelden!</h1>
        <h2 class="subtitle">Gleich gehts los</h2>
        <div class="block">

         <div class="msg"></div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">E-Mail</label>
            </div>
            <div class="control">
              <input class="input is-danger" type="email" name="email" placeholder="E-Mail">
            </div>
          </div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Username</label>
            </div>
            <div class="control">
              <input class="input" type="text" name="name" placeholder="dieser Name ist für alle sichtbar">
            </div>
          </div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Passwort</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input class="input" type="password" name="password" placeholder="Password">
              </p>
              <p class="control is-expanded">
                <input class="input" type="password" name="password_confirmation" placeholder="Password nochmal">
              </p>
            </div>
          </div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Name</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input class="input" type="text" name="vorname" placeholder="Hans">
              </p>
              <p class="control is-expanded">
                <input class="input" type="text" name="nachname" placeholder="Müller">
              </p>
            </div>
          </div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Bild</label>
            </div>
            <div class="control">
              <input id="file" name="image[]" type="file" accept="image/*">
            </div>
          </div>
  
          <p class="control">
            <button class="button is-success" v-on:click.prevent="onSubmit">
                              starten
                            </button>
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
    duration: 4500,
    container: '.msg'
  }) => {
    return new NotificationComponent({
      el: document.createElement('div'),
      propsData
    })
  }


  export default {
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
          .catch(function(error){
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
        console.log(response);

        openNotification({
          title: 'Hinweis ',
          message: response.data,
          type: "error" 
        })



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
