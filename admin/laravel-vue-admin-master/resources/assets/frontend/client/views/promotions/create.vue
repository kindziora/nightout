<template>
  <form action="/promotion/create" method="POST">
    <div class="tile is-parent">
      <article class="tile is-child box">
        <h1 class="title">Gutschein anlegen</h1>
        <div class="block">
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Titel</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <input class="input" type="text" name="title" placeholder="Wie heißt die Aktion...">
              </p>
            </div>
          </div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Beschreibung</label>
            </div>
            <div class="control">
              <textarea class="textarea" name="description" placeholder="Beschreibe die Aktion..."></textarea>
            </div>
          </div>
  
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">für Event</label>
            </div>
            <div class="control is-grouped">
              <div class="select is-fullwidth">
                <p class="control is-expanded">
                  <v-select :debounce="250" v-model="event" :on-search="getOptions" :options="options" placeholder="Event finden..." label="title">
                  </v-select>
                </p>
                <input class="input hidden" type="text" name="event" v-model="event" />
              </div>
            </div>
          </div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">bei Location</label>
            </div>
            <div class="control is-grouped">
              <div class="select is-fullwidth">
                <p class="control is-expanded">
                  <v-select :debounce="250" v-model="location" :on-search="getOptions" :options="options" placeholder="Location finden..." label="title">
                  </v-select>
                </p>
                <input class="input hidden" type="text" name="location" v-model="location" />
              </div>
            </div>
          </div>
  
  
  
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Zeitliche Begrenzung</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <datepicker placeholder="von" :config="{ enableTime: true, time_24hr: true, dateFormat: 'Y-m-d H:i' }" name="from"></datepicker>
              </p>
              <p class="control is-expanded">
                <datepicker placeholder="bis" :config="{ enableTime: true, time_24hr: true, dateFormat: 'Y-m-d H:i' }" name="to"></datepicker>
              </p>
            </div>
          </div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Gutscheine Begrenzen</label>
            </div>
            <div class="control">
              <input id="limit" class="input" name="limit" type="number" placeholder="1 oder 100000" pattern="[0-9]" />
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
        location: null,
        event: null,
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
        console.log(this);
        return this.$el.action.toLowerCase()
      },
      location_id: function() {
        return parseInt(this.location.id);
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
        formData.set('location_id', this.location_id)
        formData.set('event_id', this.event_id)
  
        this.$http[this.form_method](this.form_action, formData)
          .then(this.successCallBack, this.errorCallBack)
      },
      successCallBack: function(response) {
        openNotification({
          title: 'Promotion ' + response.data.title,
          message: 'Wurde erfolgreich angelegt.',
          type: "success"
        })
      },
      errorCallBack: function(response) {
        console.log('AjaxForm submission: ERROR', response)
      },
      setDescription(description) {
        this.description = description;
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
