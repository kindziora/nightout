<template>
  <form action="/event/create" method="POST">
    <div class="tile is-parent">
      <article class="tile is-child box">
        <h1 class="title">Ereignis anlegen</h1>
        <div class="block">
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Titel</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input class="input" type="text" name="title" placeholder="Wie heißt das Event...">
              </p>
            </div>
          </div>
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Beschreibung</label>
            </div>
            <div class="control">
              <textarea class="textarea" name="description" placeholder="Beschreibe das Event..."></textarea>
            </div>
          </div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Datum</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <datepicker placeholder="von" :config="{ enableTime: true, time_24hr: true, dateFormat: 'Y-m-d H:i' }" name="von"></datepicker>
              </p>
              <p class="control is-expanded">
                <datepicker placeholder="bis" :config="{ enableTime: true, time_24hr: true, dateFormat: 'Y-m-d H:i' }" name="bis"></datepicker>
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
  
        </div>
  
        <div class="control is-horizontal">
          <div class="control-label">
            <label class="label">Location</label>
          </div>
          <div class="control is-grouped">
            <div class="select is-fullwidth">
              <p class="control is-expanded">
                <v-select :debounce="250" 
                :on-search="getOptions" 
                :options="options"
                 placeholder="Location finden..." label="title" name="location_id">
                </v-select>
              </p>
            </div>
          </div>
        </div>
  
        <div class="control is-horizontal">
          <div class="control-label">
            <label class="label">&nbsp;</label>
          </div>
          <div class="control">
            <button class="button is-primary" v-on:click.prevent="onSubmit">Submit</button>
            <button class="button is-link">Cancel</button>
          </div>
        </div>
      </article>
    </div>
  </form>
</template>

<script>
  import FormData from 'form-data'
  import router from 'vue-router'
  import vSelect from "vue-select"
  import * as VueGoogleMaps from 'vue2-google-maps';
  import Vue from 'vue';
  import Notification from 'vue-bulma-notification'
  import Datepicker from 'vue-bulma-datepicker'

  const NotificationComponent = Vue.extend(Notification)
  
  const openNotification = (propsData = {
    title: '',
    message: '',
    type: '',
    direction: '',
    duration: 4500,
    container: '.notifications'
  }) => {
    return new NotificationComponent({
      el: document.createElement('div'),
      propsData
    })
  }
  
  Vue.use(VueGoogleMaps, {
    load: {
      libraries: 'places',
      key: 'AIzaSyAS_w6mO7-_me_4L8kY3ikJF261ftyzacU'
    }
  });
  
  export default {
    beforeMount() {
      var me = this;
      navigator.geolocation.getCurrentPosition((pos) => {
        me.latLng.lat = pos.coords.latitude;
        me.latLng.lng = pos.coords.longitude;
      })
    },
    components: {
      vSelect,
      Notification,
      Datepicker
    },
    data() {
      return {
        selected: null,
        options: [],
        zoom: 8,
        latLng: {
          lat: 10,
          lng: 10
        },
        description: 'Berlin',
        center: {
          lat: 10.0,
          lng: 10.0
        },
        markers: [{
  
        }]
      }
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
      getOptions(search, loading) {
        loading(true)
        this.$http.get('https://lo.cal/locations/list', {
          name: search
        }).then(resp => {
          this.options = resp.data.data 
          loading(false)
        })
      },
      onSubmit: function(event) {
        var formData = new FormData(this.$el)
  
        formData.append('images', JSON.stringify(["bild1"]))
        formData.append('creator_id', JSON.parse(localStorage.getItem("me")).id)
  
        this.$http[this.form_method](this.form_action, formData)
          .then(this.successCallBack, this.errorCallBack)
      },
      successCallBack: function(response) {
        openNotification({
          title: 'Location ' + response.data.title,
          message: 'Wurde erfolgreich angelegt.',
          type: "success"
        })
      },
      errorCallBack: function(response) {
        console.log('AjaxForm submission: ERROR', response)
      },
      setDescription(description) {
        this.description = description;
      },
      updateChild(e) {
        this.latLng = {
          lat: e.geometry.location.lat(),
          lng: e.geometry.location.lng(),
        };
  
  
      }
  
    }
  }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css">
  
</style>

<style>
  .center-by-margin {
    margin-left: auto;
    margin-right: auto;
  }
  
  .multiselect__select {
    padding: 16px 0;
  }
  
  .hidden {
    display: none;
  }
</style>
