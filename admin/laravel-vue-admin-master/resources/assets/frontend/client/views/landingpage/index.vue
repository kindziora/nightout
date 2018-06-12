<i18n>
{
  "de": {
    "slogan": "Geld sparen bei den coolsten locations in deiner Nähe.",
    "go" : "Los gehts!",
    "exist" : "schon dabei?",
    "login": "hier einloggen"
  },
  "es": {
    "slogan": "Vouchers para los mejores lugares en tu área.",
    "go" : "¡vamos!",
    "exist" : "tienes cuenta?",
    "login": "Iniciar sesión"
  }
}
</i18n>
<template>
 <div>
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="columns is-vcentered">
          <div class="a column is-5">
            <figure class="is-4by3">
               <gmap-map :center="{lat:latLng.lat , lng:latLng.lng}" :options="mapOptions" :zoom="zoom" style="width: 100%; height: 345px">
                <gmap-marker v-for="m in markers" :key="m.position" :position="{lat:latLng.lat , lng:latLng.lng}" :clickable="true" @click="center=m.position"></gmap-marker>
              </gmap-map>
            </figure>
          </div>
          <div class="b column is-6 is-offset-1">
            <h1 class="title is-2">
              Pirata
            </h1>
            <h2 class="subtitle is-4">
              {{ $t('slogan') }}
            </h2>
            <br>
            <p class="has-text-centered">
              <a class="button is-medium is-info is-outlined">
                {{ $t('go') }}
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="hero-foot">
      <div class="container">
        <div class="tabs is-centered">
          <ul>
            <li><a>{{ $t('exist') }}<router-link :to="{ path: 'login' }" class="is-link"><strong>{{ $t('login') }}</strong></router-link></a></li>
          </ul>
        </div>
      </div>
    </div>
 
 </div>
</template>

<script>
  
  
  import * as VueGoogleMaps from 'vue2-google-maps';
  import router from 'vue-router';
  import Vue from 'vue';
  import VueI18n from 'vue-i18n';
  Vue.use(VueI18n);
  
  Vue.use(VueGoogleMaps, {
    load: {
      libraries: 'places',
      key: 'AIzaSyAS_w6mO7-_me_4L8kY3ikJF261ftyzacU'
    }
  });
  
  export default {
     components: {
        router
      },
    data () {
      return {
          selected: null,
          options: ['bar', 'club', 'cafe', 'restaurant', 'kino', 'sonstiges'],
          zoom: 9,
          latLng: {
            lat: 52.520008,
            lng: 13.404954
          },
          description: 'Berlin',
          center: {
            lat: 52.520008,
            lng: 13.404954
          },
          markers: [{
            
          }],   
          mapOptions: {
            disableDefaultUI: true,
             styles :  [
              {
                "featureType": "poi",
                "elementType": "labels",
                "stylers": [
                  { "visibility": "off" }
                ]
              }
            ]
            
          }
        }
    },
    beforeMount() {
        var me = this;
        navigator.geolocation.getCurrentPosition((pos) => {
          me.latLng.lat = pos.coords.latitude;
          me.latLng.lng = pos.coords.longitude;
        });
        this.$i18n.locale = localStorage.getItem('language') || "de";
      },
      mounted() {
        let me = this;
        window.setTimeout(()=>me.zoom = 11, 2000);
      }
  }
</script>

<style lang="scss" scoped>
  .is-title {
    text-transform: capitalize;
  }
  
  .hero-body {
      padding: 0;
      margin-top:-5px;
  }
  
  .a.column{
    padding-left: 0;
    padding-right: 0;
    margin-top: -21px;
    padding-top: 0;
  }
  .columns{
    margin-right:0;
    margin-left: 0;
  }
</style>
