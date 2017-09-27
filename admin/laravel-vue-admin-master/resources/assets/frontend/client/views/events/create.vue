<template>
  <form action="/event/create" method="POST">
    <div class="tile is-parent">
      <article class="tile is-child box">
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
           
          <div v-if="error.title" class="control is-horizontal">
            <div class="control-label"></div>
                <p v-for="err in error.title" class="control is-grouped help is-danger">{{err}}</p>
          </div>
            
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Beschreibung</label>
            </div>
            <div class="control">
              <textarea class="textarea" name="description" placeholder="Beschreibe das Event..."></textarea>
            </div>
          </div>
  
          <div v-if="error.description" class="control is-horizontal">
            <div class="control-label"></div>
                <p v-for="err in error.description" class="control is-grouped help is-danger">{{err}}</p>
          </div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Location</label>
            </div>
            <div class="control is-grouped">
              <div class="select is-fullwidth">
                <p class="control is-expanded">
                  <v-select 
                  :debounce="250" 
                  v-model="location"
                   :on-search="getOptions"
                    :options="options" 
                    placeholder="Location finden..."
                     label="title">
                  </v-select>
                </p>
                <input class="input hidden" type="text" name="location"
                 v-model="location" />
              </div>
            </div>
          </div>
          
          <div v-if="error.location" class="control is-horizontal">
            <div class="control-label"></div>
                <p v-for="err in error.location" class="control is-grouped help is-danger">{{err}}</p>
          </div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Datum</label>
            </div>
            <div class="control is-grouped">
              <p class="control is-expanded">
                <datepicker placeholder="von" :config="{ enableTime: true, time_24hr: true, dateFormat: 'Y-m-d H:i' }" name="from"></datepicker>
                <p v-for="err in error.from" class="help is-danger">{{err}}</p>
              </p>
              <p class="control is-expanded">
                <datepicker placeholder="bis" :config="{ enableTime: true, time_24hr: true, dateFormat: 'Y-m-d H:i' }" name="to"></datepicker>
                <p v-for="err in error.to" class="help is-danger">{{err}}</p>
              </p>
            </div>
          </div>
  
          <div class="control is-horizontal">
            <div class="control-label">
              <label class="label">Bild</label>
            </div>
            <div class="control">
              <input id="file" name="image" type="file" accept="image/*" v-on:change="onFileChange">
               <img :src="image" class="img-responsive" id="img">
                <p v-for="err in error.image" class="help is-danger">{{err}}</p>
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
  import VbSwitch from 'vue-bulma-switch'

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
      Datepicker,
      VbSwitch
    },
    data() {
      return {
        title: "",
        error: [],
        image: "",
        location: null,
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
        return this.location != null ? parseInt(this.location.id):0;
      }
    },
    methods: {
      onFileChange(e) {
          let files = e.target.files || e.dataTransfer.files;
          if (!files.length)
              return;
          this.createImage(files[0]);
      },
      createImage(file) {
          let reader = new FileReader();
          let vm = this;
          reader.onload = (e) => {
              vm.image = e.target.result;
          };
          reader.readAsDataURL(file);
      },
      getOptions(search, loading) {
        loading(true)
        this.$http.get('https://nightout-akindziora.c9users.io/locations/list', {
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
  
        this.$http[this.form_method](this.form_action, formData)
          .then(this.successCallBack, this.errorCallBack)
      },
      successCallBack: function(response) {
        openNotification({
          title: 'Event ' + response.data.title,
          message: 'Wurde erfolgreich angelegt.',
          type: "success"
        })
      },
      errorCallBack: function(response) {
        this.$data.error = response.response.data 
        console.log('AjaxForm submission: ERROR', response.response.data)
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
