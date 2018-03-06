<template>
 <div>
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="columns is-vcentered">
          <div class="column is-5">
            <figure class="is-4by3">
               <gmap-map :center="{lat:latLng.lat , lng:latLng.lng}" :zoom="zoom" style="width: 100%; height: 300px">
                <gmap-marker v-for="m in markers" :key="m.position" :position="{lat:latLng.lat , lng:latLng.lng}" :clickable="true" :draggable="true" @click="center=m.position"></gmap-marker>
              </gmap-map>
            </figure>
          </div>
          <div class="column is-6 is-offset-1">
            <h1 class="title is-2">
              Pirata
            </h1>
            <h2 class="subtitle is-4">
              Gutscheine für die coolsten locations in deiner Nähe.
            </h2>
            <br>
            <p class="has-text-centered">
              <a class="button is-medium is-info is-outlined">
                Los gehts!
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
            <li><a>schon dabei? <a>hier einloggen</a></a></li>
          </ul>
        </div>
      </div>
    </div>
 
 </div>
</template>

<script>

import Vue from 'vue';
import * as VueGoogleMaps from 'vue2-google-maps';

  Vue.use(VueGoogleMaps, {
    load: {
      libraries: 'places',
      key: 'AIzaSyAS_w6mO7-_me_4L8kY3ikJF261ftyzacU'
    }
  });

export default {
  data () {
    return {
        selected: null,
        options: ['bar', 'club', 'cafe', 'restaurant', 'kino', 'sonstiges'],
        zoom: 11.5,
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
  
        }]
      }
  },
  beforeMount() {
      var me = this;
      navigator.geolocation.getCurrentPosition((pos) => {
        me.latLng.lat = pos.coords.latitude;
        me.latLng.lng = pos.coords.longitude;
      })
    },
}
</script>

<style lang="scss" scoped>
.is-title {
  text-transform: capitalize;
}

.hero-body, .section {
    padding: 0rem 1.5rem;
}
</style>
