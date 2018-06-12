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
           
            <div class="columns is-gapless is-mobile" id="filter">
              <div class="column filter" @click="openWhatModal()">
                 {{ $t('what') }}
              </div>
              <div class="column filter">
                <p class=""><vb-switch type="success" :value="today" v-model="today" size="small"></vb-switch> {{$t('Heute')}}</p>
                <datepicker placeholder="Datum wählen" :config="{ mode: 'range' }"></datepicker>
              </div>
              <div class="column filter">
                 {{ $t('filter') }}
              </div>
            </div>
            
            <figure class="is-4by3">
              <div id ="what">
                <div class="tile ">
                  <div class="block styles-box">
                    <ul>
                      <li v-for="(category,i) in categories">
                        <vb-switch :value="categories[i].name" v-model="categories[i].active"></vb-switch> {{category.name}}
                     </li>
                  </ul>
                  </div>
                </div>
                <hr/>
                 <div class="tile ">
                  <div class="block styles-box check-with-text" >
                      <vb-switch type="success" :value="isdeal" v-model="isdeal"></vb-switch> nur deals
                  </div>
                </div> 
              </div> 
               <gmap-map :center="{lat:latLng.lat , lng:latLng.lng}" :zoom="zoom" :options="mapOptions" style="width: 100%; height: 500px">
                <gmap-marker v-for="(m, index ) in markers" :key="index" :position="m.position" :icon="m.icon" :clickable="true" @click="center=m.position"></gmap-marker>
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
            <li><a>{{ $t('missing') }}<router-link :to="{ path: 'events/create' }" class="is-link"><strong>{{ $t('create') }}</strong></router-link></a></li>
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
import VbSwitch from 'vue-bulma-switch';
import Datepicker from 'vue-bulma-datepicker';
Vue.use(VueI18n);

////////////////////////////////WHAT MODAL//////////////////////////////////////
import whatModal from './modals/what';
const whatModalComponent = Vue.extend(whatModal);
const createWhatModal = (propsData = {
  visible: true
}) => {
  return new whatModalComponent({
    el: document.createElement('div'),
    propsData
  })
};
////////////////////////////////WHEN MODAL//////////////////////////////////////
import whenModal from './modals/filter';
const whenModalComponent = Vue.extend(whenModal);
const createWhenModal = (propsData = {
  visible: true
}) => {
  return new whenModalComponent({
    el: document.createElement('div'),
    propsData
  })
};

Vue.use(VueGoogleMaps, {
  load: {
    libraries: 'places',
    key: 'AIzaSyAS_w6mO7-_me_4L8kY3ikJF261ftyzacU'
  }
});

export default {
   components: {
      router,
      VbSwitch,
      Datepicker
    },
    methods: { 
      openWhenModal () {
        const whenModal = this.whenModal || (this.whenModal = createWhenModal({
          title: this.$i18n.t('Wann?'),
          categories: this.categories
        }));
        whenModal.$children[0].active();
      },
       openWhatModal () {
        const whatModal = this.whatModal || (this.whatModal = createWhatModal({
          title: this.$i18n.t('Was ist dein Ding?'),
          categories: this.categories
        }));
        whatModal.$children[0].active();
      }
    },
  data () {
    return {
        selected: null,
        categories: [{name:"party", active : true}, {name:"essen", active : false}, {name:"shopping", active : false}, {name:"services", active : true}],
        zoom: 9,
        today: true,
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
            position: {
              lat: 52.520008,
              lng: 13.404954
            },
            icon:{ url: '../assets/img/party.png'}
          }, 
          {
            position: {
              lat: 52.420008,
              lng: 13.504954
            },
             icon: { url: '../assets/img/party.png'}
          }
        ] 
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
 
label.switch {
    vertical-align: sub;
}

#filter .switch.is-small {
    --height: 15px;
}

#filter .filter{
   flex:1;
   border: 1px solid #f4f5f5;
   line-height: 25px;
   text-transform: uppercase;
}
.column{
  padding: 0;
  margin-top: -21px;
}

.flatpickr-input{
  display:none;
}

#filter{
  margin-bottom:0;
}
.columns{
  margin:0;
}

#what{
    float: left;
    position: absolute;
    z-index: 1;
    background: rgba(255, 255, 255, 0.64);
    text-align: left;
    padding: 0.9rem;
    font-size: 1rem;
}

</style>

<style>
  .check-with-text{
    font-size: x-large;
  }
  
  label.switch{
    vertical-align: middle;
  }    
 
</style>