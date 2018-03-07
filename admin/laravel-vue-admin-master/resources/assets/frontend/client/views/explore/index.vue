<i18n>
{
  "de": {
    "what" : "Was?",
    "when" : "Wann?",
    "filter" : "Filter",
    "missing": "nicht dabei?",
    "create": "hier anlegen"
  },
  "es": {
    "what" : "que?",
    "when" : "cuando?",
    "filter" : "filtro",
    "missing": "no esta?",
    "create": "crear aqui"
  }
}
</i18n>
<template>
 <div>
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="columns is-vcentered">
          <div class="column is-5">
            <div class="buttons has-addons">
              <span class="button"> {{ $t('what') }}</span>
              <span class="button">{{ $t('when') }}</span>
              <span class="button">{{ $t('filter') }}</span>
            </div>
            
            <figure class="is-4by3">
               <gmap-map :center="{lat:latLng.lat , lng:latLng.lng}" :zoom="zoom" :options="mapOptions" style="width: 100%; height: 500px">
                <gmap-marker v-for="m in markers" :key="m.position" :position="{lat:latLng.lat , lng:latLng.lng}" :clickable="true" @click="center=m.position"></gmap-marker>
              </gmap-map>
            </figure>
          </div>
      </div>
    </div>
  </div>
  
    <div class="hero-foot">
      <div class="container">
        <div class="tabs is-centered">
          <ul class="xx-small">
            <li><a>{{ $t('missing') }}<router-link :to="{ path: 'event/create' }" class="is-link"><strong>{{ $t('create') }}</strong></router-link></a></li>
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
.xx-small {
  font-size: xx-small;
}
.buttons.has-addons{
   margin:0;
}
.buttons.has-addons .button{
  flex:1;
  border-color: #e1ece9;
  margin:0;
}

.column{
  padding-top: 0;
  margin-top: -21px;
}

</style>
