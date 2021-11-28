import './bootstrap'
import Vue from 'vue'
import ArticleTagsInput from './components/ArticleTagsInput'
import ArticleLike from './components/ArticleLike'
import FollowButton from './components/FollowButton'

const app = new Vue({
  el: '#app',
  components: {
    ArticleLike,
    ArticleTagsInput,
    FollowButton,
  }
})
