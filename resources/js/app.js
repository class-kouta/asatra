// require('./bootstrap');

import './bootstrap'
import Vue from 'vue'
import PostNice from './components/PostNice'

const app = new Vue({
  el: '#app',
  components: {
    PostNice,
  }
})
