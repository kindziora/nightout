<template>
  <card-modal :visible="visible" @close="close" :title="title" >
       <div class="tile is-parent is-4">
        <div class="block styles-box">
          <ul>
            <li v-for="category in categories">
              <p>
                <vb-switch checked type="primary" :value="category.name" v-model="checkedCategories"></vb-switch> {{category.name}}
              </p>
          </li>
        </ul>
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
    checkedCategories : Array,
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
