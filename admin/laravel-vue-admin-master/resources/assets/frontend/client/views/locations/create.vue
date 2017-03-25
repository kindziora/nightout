<template>
  <form action="/location/create" method="POST">
      <div class="tile is-parent">
        <article class="tile is-child box">
          <h1 class="title">Location anlegen</h1>
          <div class="block">

            <div class="control is-horizontal">
              <div class="control-label">
                <label class="label">Name</label>
              </div>
              <div class="control is-grouped">
                <p class="control is-expanded">
                  <input class="input" type="text" name="title" placeholder="Wie heißt die Location...">
                </p>
              </div>
            </div>
            <div class="control is-horizontal">
              <div class="control-label">
                <label class="label">Was?</label>
              </div>
              <div class="control">
                <textarea class="textarea" placeholder="Beschreibe deine Lokation..."></textarea>
              </div>
            </div>


            <div class="control is-horizontal">
              <div class="control-label">
                <label class="label">Wo?</label>
                {{latLng.lat}},
                {{latLng.lng}}
              </div>
              <div class="control">
                 <gmap-autocomplete
                 class="input"
                  :value="description"
                  @place_changed="updateChild($event)"
                  :options="{ 
                    strictBounds: true
                  }">
                </gmap-autocomplete>
              </div>
            </div>

            <div class="control is-horizontal">
              <div class="control-label">
                <label class="label"></label>
              </div>
              <div class="control">
                <gmap-map
                  :center="center"
                  :zoom="7"
                  style="width: 100%; height: 300px"
                >
                <gmap-marker
                  v-for="m in markers"
                  :position="m.position"
                  :clickable="true"
                  :draggable="true"
                  @click="center=m.position"
                ></gmap-marker>
              </gmap-map>

              </div>
            </div>
            

          </div>

            <div class="control is-horizontal">
              <div class="control-label">
                <label class="label">Art</label>
              </div>
              <div class="control is-grouped">
                <div class="select is-fullwidth">
                    <p class="control is-expanded">
                      <multiselect name="location_types"
                        :options="options"
                        :multiple="true"
                        :close-on-select="true"
                        placeholder="..bar, club"
                        :hide-selected="true"
                        :limit="3"
                        >
                      </multiselect>
                    </p>
                </div>
              </div>
            </div>

            <div class="control is-horizontal">
              <div class="control-label">
                <label class="label">&nbsp;</label>
              </div>
              <div class="control">
                <button class="button is-primary">Submit</button>
                <button class="button is-link">Cancel</button>
              </div>
            </div>
        </article>
      </div>
  </form>
</template>

<script>
  import FormData from 'form-data'
  import router from '../../router'
  import Multiselect from 'vue-multiselect'
  import * as VueGoogleMaps from 'vue2-google-maps';

  import Vue from 'vue';

  Vue.use(VueGoogleMaps, {
    load: {
      libraries: 'places',
      key: 'AIzaSyAS_w6mO7-_me_4L8kY3ikJF261ftyzacU'
    }
  });

    export default {
       mounted () {
            var me = this;
            navigator.geolocation.getCurrentPosition((pos) => {
                me.latLng.lat = pos.coords.latitude;
                me.latLng.lng = pos.coords.longitude;

                console.log(pos);
            })
        },
        components: { Multiselect },
        data () {
            return {
              selected: null,
              options: ['bar', 'club', 'cafe'],
              latLng: {
              },
              description: 'Berlin',
              center: {lat: 10.0, lng: 10.0},
              markers: [{
                position: {lat: 10.0, lng: 10.0}
              }, {
                position: {lat: 11.0, lng: 11.0}
              }]
            }
        },
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
          },
          setDescription(description) {
            this.description = description;
          },
          updateChild(e) {
         console.log(this);
            this.latLng = {
              lat: e.geometry.location.lat(),
              lng: e.geometry.location.lng(),
            };


          }

        }
      } 

 

  
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
  .center-by-margin {
    margin-left: auto;
    margin-right: auto;
  }
  .multiselect__select {
    padding: 16px 0;
  }
</style>
