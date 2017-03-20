<template>
  <div>


<div class="tile is-ancestor" v-model="this.locations">
      <div class="tile is-parent" v-for="p in locations" :value="p">
        <article class="tile is-child box">
          <p class="title">{{p.title}}</p>
          <p class="subtitle">{{p.description}}</p>
          <div class="content">
          
          <img :src="p.images[1]" />
          
          </div>
          
        </article>
      </div>
 </div>
    
    <div class="tile is-ancestor">
      <div class="tile is-parent is-8">
        <article class="tile is-child box">
        <p class="title control" :class="{'is-loading': isloading}">
          Price History of {{params.symbol}}
          <span class="subtitle help is-danger is-5">
            This demo only works under Development env
          </span>
        </p>
        <chart :type="'line'" :data="stockData" :options="options"></chart>
      </article>
      </div>
      <div class="tile is-parent is-4">
        <article class="tile is-child box">
          <div class="block">
            <p class="title is-5">Request Params</p>
            <a href="https://github.com/markitondemand/DataApis" class="link">Markit On Demand - Market Data APIs</a>
          </div>
          <div class="block">
            <div class="control is-horizontal">
              <div class="control-label">
                <label class="label">Symbol</label>
              </div>
              <div class="control">
                <div class="select is-fullwidth">
                  <select v-model="params.symbol">
                    <option v-for="s in symbols" :value="s">{{s}}</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="control is-horizontal">
              <div class="control-label">
                <label class="label">Days</label>
              </div>
              <div class="control is-fullwidth">
                  <input class="input" min="0" max="720" type="number" v-model="params.numberOfDays">
              </div>
            </div>
            <div class="control is-horizontal">
              <div class="control-label">
                <label class="label">Period</label>
              </div>
              <div class="control">
                <div class="select is-fullwidth">
                  <select v-model="params.dataPeriod">
                    <option v-for="p in periods" :value="p">{{p}}</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="control is-horizontal">
              <div class="control-label">
                <label class="label"></label>
              </div>
              <div class="control">
                <button class="button is-primary" :class="{'is-loading': isloading}" @click="loadData">Refresh</button>
              </div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</template>

<script>
import Chart from 'vue-bulma-chartjs'

const api = '/locations/list'

export default {
  components: {
    Chart
  },
  data () {
    return {
      params: {
        symbol: 'AAPL',
        numberOfDays: 450,
        dataPeriod: 'Month'
      },
      symbols: ['AAPL', 'MSFT', 'JNJ', 'GOOG'],
      periods: ['Day', 'Week', 'Month', 'Quarter', 'Year'],
      locations: [],
      labels: [],
      isloading: false,
      options: {
        legend: { display: false },
        animation: { duration: 0 },
        scales: {
          xAxes: [{
            type: 'time',
            time: {
              unit: 'month'
            }
          }]
        }
      }
    }
  },

  computed: {
    stockData () {
      return {
        labels: this.labels,
        datasets: [{
          fill: false,
          lineTension: 0.25,
          data: this.data,
          label: 'Close price',
          pointBackgroundColor: '#1fc8db',
          pointBorderWidth: 1
        }]
      }
    }
  },
  methods: {
    loadData () {
      this.isloading = true
      this.$http({
        url: api,
        transformResponse: [(data) => {
          return JSON.parse(data)
        }],
        params: {
          parameters: {
            Normalized: false,
            NumberOfDays: parseInt(this.params.numberOfDays),
            DataPeriod: this.params.dataPeriod,
            Elements: [{'Symbol': this.params.symbol, 'Type': 'price', 'Params': ['c']}]
          }
        }
      }).then((response) => {
        this.locations = response.data.data

        for (var i in this.locations) {
          this.locations[i].images = JSON.parse(this.locations[i].images)
        }
        this.isloading = false
      }).catch((error) => {
        console.log(error)
      })
    }
  },
  mounted () {
    this.loadData()
  }
}
</script>

<style scoped>
</style>
