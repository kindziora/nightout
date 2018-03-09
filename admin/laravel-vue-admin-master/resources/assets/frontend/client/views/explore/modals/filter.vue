<template>
  <card-modal :visible="visible" @close="close" :title="title" id="what">
       <div class="tile is-parent is-4">
        <div class="block styles-box">
          <ul>
            <li v-for="(category,i) in categories" class="check-with-text">
              <vb-switch :value="categories[i].name" v-model="categories[i].active"></vb-switch> {{category.name}}
           </li>
        </ul>
        </div>
      </div>
      <hr/>
       <div class="tile is-parent is-4">
        <div class="block styles-box check-with-text" >
            <vb-switch type="success" :value="isdeal" v-model="isdeal"></vb-switch> nur deals
        </div>
      </div>
  </card-modal>
</template>

<script>
import { CardModal } from 'vue-bulma-modal'
import VbSwitch from 'vue-bulma-switch';
  
export default {
  components: {
    CardModal,
    VbSwitch
  },

  props: {
    visible: Boolean,
    isdeal: Boolean,
    categories: Array,
    title : String
  },

  methods: {
    close () {
      this.$emit('close')
    }
  }
}
</script>
